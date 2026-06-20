/* =====================================================================
   KASAPI · webgl.js
   - Neural-network overlay (2D canvas): hero + final CTA. Cheap, always on.
   - Intelligence core (Three.js, lazy-loaded): the AI section showcase.
   Everything pauses off-screen, respects reduced-motion, and degrades to
   CSS when WebGL is unavailable.
   ===================================================================== */
(() => {
  'use strict';
  const K = window.Kasapi || { onReady: (f) => f(), reduceMotion: false, loadScript: () => Promise.reject() };
  const THREE_CDN = 'https://cdn.jsdelivr.net/npm/three@0.160.0/build/three.min.js';

  K.onReady(() => {
    if (K.reduceMotion) return;            // honour reduced motion: no canvas animation
    document.querySelectorAll('canvas[data-net]').forEach((c) => new NeuralCanvas(c));
    if (webglOK()) initAICore();
  });

  function webglOK() {
    try {
      const c = document.createElement('canvas');
      return !!(window.WebGLRenderingContext && (c.getContext('webgl') || c.getContext('experimental-webgl')));
    } catch { return false; }
  }

  function onScreen(el, cb) {
    const io = new IntersectionObserver((ents) => ents.forEach((e) => cb(e.isIntersecting)), { threshold: 0 });
    io.observe(el);
    return io;
  }

  /* =================================================================
     2D Neural network — particle nodes + proximity links + mouse pull
     ================================================================= */
  class NeuralCanvas {
    constructor(canvas) {
      this.c = canvas;
      this.ctx = canvas.getContext('2d');
      this.dpr = Math.min(window.devicePixelRatio || 1, 2);
      this.mouse = { x: -999, y: -999 };
      this.running = false;
      this.dense = canvas.dataset.net === 'dense';
      this.resize();
      this.seed();
      addEventListener('resize', () => { this.resize(); this.seed(); }, { passive: true });
      const host = canvas.closest('section') || canvas;
      host.addEventListener('mousemove', (e) => {
        const r = this.c.getBoundingClientRect();
        this.mouse.x = e.clientX - r.left; this.mouse.y = e.clientY - r.top;
      });
      host.addEventListener('mouseleave', () => { this.mouse.x = this.mouse.y = -999; });
      onScreen(canvas, (vis) => { this.running = vis; if (vis) this.loop(); });
    }
    resize() {
      const r = this.c.getBoundingClientRect();
      this.w = r.width; this.h = r.height;
      this.c.width = this.w * this.dpr; this.c.height = this.h * this.dpr;
      this.ctx.setTransform(this.dpr, 0, 0, this.dpr, 0, 0);
    }
    seed() {
      const area = this.w * this.h;
      const count = Math.min(this.dense ? 120 : 80, Math.round(area / 14000));
      this.pts = Array.from({ length: count }, () => ({
        x: Math.random() * this.w, y: Math.random() * this.h,
        vx: (Math.random() - .5) * .25, vy: (Math.random() - .5) * .25,
        r: Math.random() * 1.6 + .8,
      }));
    }
    loop() {
      if (!this.running) return;
      const { ctx, pts, w, h } = this;
      ctx.clearRect(0, 0, w, h);
      const linkDist = 130;
      for (let i = 0; i < pts.length; i++) {
        const p = pts[i];
        // mouse attraction
        const mdx = this.mouse.x - p.x, mdy = this.mouse.y - p.y;
        const md = Math.hypot(mdx, mdy);
        if (md < 160) { p.vx += (mdx / md) * 0.02; p.vy += (mdy / md) * 0.02; }
        p.x += p.vx; p.y += p.vy;
        p.vx *= .99; p.vy *= .99;
        if (p.x < 0 || p.x > w) p.vx *= -1;
        if (p.y < 0 || p.y > h) p.vy *= -1;
        // links
        for (let j = i + 1; j < pts.length; j++) {
          const q = pts[j];
          const d = Math.hypot(p.x - q.x, p.y - q.y);
          if (d < linkDist) {
            const a = (1 - d / linkDist) * .5;
            ctx.strokeStyle = `rgba(139,92,246,${a})`;
            ctx.lineWidth = 1;
            ctx.beginPath(); ctx.moveTo(p.x, p.y); ctx.lineTo(q.x, q.y); ctx.stroke();
          }
        }
        // node
        ctx.beginPath();
        ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
        ctx.fillStyle = i % 4 === 0 ? 'rgba(6,182,212,.9)' : 'rgba(167,139,250,.85)';
        ctx.fill();
      }
      requestAnimationFrame(() => this.loop());
    }
  }

  /* =================================================================
     Three.js intelligence core — glowing point sphere + orbiting motes
     ================================================================= */
  function initAICore() {
    const mount = document.querySelector('.ai__canvas');
    if (!mount) return;
    // Only spin up Three.js when the AI section is near the viewport.
    const io = new IntersectionObserver((ents) => {
      if (ents.some((e) => e.isIntersecting)) {
        io.disconnect();
        K.loadScript(THREE_CDN).then(() => buildCore(mount)).catch(() => {/* CSS orb fallback stays */});
      }
    }, { rootMargin: '300px' });
    io.observe(mount.closest('section') || mount);
  }

  function buildCore(mount) {
    const THREE = window.THREE;
    if (!THREE) return;
    const w = mount.clientWidth, h = mount.clientHeight || mount.clientWidth;
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(55, w / h, .1, 100);
    camera.position.z = 5.2;
    const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true, powerPreference: 'high-performance' });
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.setSize(w, h);
    mount.appendChild(renderer.domElement);

    // Point sphere (the "intelligence")
    const N = 1400, pos = new Float32Array(N * 3), col = new Float32Array(N * 3);
    const cA = new THREE.Color('#A78BFA'), cB = new THREE.Color('#22D3EE');
    for (let i = 0; i < N; i++) {
      const phi = Math.acos(2 * Math.random() - 1), theta = 2 * Math.PI * Math.random();
      const rad = 1.7 + (Math.random() - .5) * .12;
      pos[i*3]   = rad * Math.sin(phi) * Math.cos(theta);
      pos[i*3+1] = rad * Math.sin(phi) * Math.sin(theta);
      pos[i*3+2] = rad * Math.cos(phi);
      const c = cA.clone().lerp(cB, Math.random());
      col[i*3] = c.r; col[i*3+1] = c.g; col[i*3+2] = c.b;
    }
    const geo = new THREE.BufferGeometry();
    geo.setAttribute('position', new THREE.BufferAttribute(pos, 3));
    geo.setAttribute('color', new THREE.BufferAttribute(col, 3));
    const mat = new THREE.PointsMaterial({ size: .035, vertexColors: true, transparent: true, opacity: .95, depthWrite: false, blending: THREE.AdditiveBlending });
    const points = new THREE.Points(geo, mat);
    scene.add(points);

    // Inner glow core
    const core = new THREE.Mesh(
      new THREE.SphereGeometry(.9, 32, 32),
      new THREE.MeshBasicMaterial({ color: '#7C3AED', transparent: true, opacity: .25 })
    );
    scene.add(core);

    // Orbiting motes
    const motes = new THREE.Group();
    for (let i = 0; i < 3; i++) {
      const ring = new THREE.Mesh(
        new THREE.TorusGeometry(2.1 + i * .25, .006, 8, 120),
        new THREE.MeshBasicMaterial({ color: i % 2 ? '#06B6D4' : '#8B5CF6', transparent: true, opacity: .5 })
      );
      ring.rotation.x = Math.random() * Math.PI;
      ring.rotation.y = Math.random() * Math.PI;
      motes.add(ring);
    }
    scene.add(motes);

    let mx = 0, my = 0, running = true;
    const host = mount.closest('section');
    host?.addEventListener('mousemove', (e) => {
      const r = host.getBoundingClientRect();
      mx = (e.clientX - r.left) / r.width - .5;
      my = (e.clientY - r.top) / r.height - .5;
    });
    onScreen(mount, (vis) => { running = vis; if (vis) animate(); });

    const clock = new THREE.Clock();
    function animate() {
      if (!running) return;
      const t = clock.getElapsedTime();
      points.rotation.y = t * .12;
      points.rotation.x = Math.sin(t * .2) * .1;
      motes.rotation.y = t * .2;
      motes.rotation.x = t * .1;
      core.scale.setScalar(1 + Math.sin(t * 1.5) * .04);
      camera.position.x += (mx * 1.2 - camera.position.x) * .05;
      camera.position.y += (-my * 1.2 - camera.position.y) * .05;
      camera.lookAt(scene.position);
      renderer.render(scene, camera);
      requestAnimationFrame(animate);
    }

    addEventListener('resize', () => {
      const nw = mount.clientWidth, nh = mount.clientHeight || nw;
      camera.aspect = nw / nh; camera.updateProjectionMatrix(); renderer.setSize(nw, nh);
    }, { passive: true });

    // Hide the CSS fallback orb now that WebGL is live.
    mount.parentElement?.querySelector('.ai__orb')?.style.setProperty('opacity', '0');
  }
})();
