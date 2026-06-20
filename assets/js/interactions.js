/* =====================================================================
   KASAPI · interactions.js — feature constellation, detail panels,
   hero float-card mouse depth, tilt. UI behaviour layer.
   ===================================================================== */
(() => {
  'use strict';
  const K = window.Kasapi || { onReady: (f) => f(), finePointer: true, reduceMotion: false };

  K.onReady(() => {
    buildConstellation();
    featurePanel();
    heroDepth();
    tiltCards();
    heroFeed();
    brandThemes();
    growTabs();
    videoModal();
  });

  /* ---- Hero live activity feed: notifications slide in, then cycle ---- */
  function heroFeed() {
    const feed = document.getElementById('heroFeed');
    if (!feed) return;
    const notes = [...feed.children];
    if (K.reduceMotion) { notes.forEach((n) => n.classList.add('in')); return; }
    let i = 0;
    const reveal = () => {
      if (i < notes.length) { notes[i].classList.add('in'); i++; setTimeout(reveal, 700); }
      else cycle();
    };
    // continuously rotate the top note to keep the app feeling alive
    function cycle() {
      setInterval(() => {
        const first = feed.firstElementChild;
        first.classList.remove('in');
        setTimeout(() => {
          feed.appendChild(first);
          requestAnimationFrame(() => first.classList.add('in'));
        }, 480);
      }, 2600);
    }
    new IntersectionObserver((ents, o) => ents.forEach((en) => {
      if (en.isIntersecting) { reveal(); o.disconnect(); }
    }), { threshold: .3 }).observe(feed);
  }

  /* ---- Brand ownership: live theme/logo/name swapping ---- */
  function brandThemes() {
    const swatches = document.getElementById('brandSwatches');
    if (!swatches) return;
    const logo = document.getElementById('brandLogo');
    const name = document.getElementById('brandName');
    const barName = document.getElementById('brandBarName');
    const glow = document.getElementById('brandGlow');
    const btns = [...swatches.querySelectorAll('button')];
    const apply = (btn) => {
      btns.forEach((b) => b.classList.toggle('is-active', b === btn));
      const grad = btn.style.background;
      if (logo) { logo.style.background = grad; logo.textContent = btn.dataset.mono; }
      if (name) name.textContent = btn.dataset.name;
      if (barName) barName.textContent = btn.dataset.name;
      if (glow) glow.style.background = `radial-gradient(closest-side, ${accent(btn.dataset.brand)}, transparent 72%)`;
      if (window.gsap && !K.reduceMotion) {
        window.gsap.fromTo('#brandScreen .phone__app', { autoAlpha: .4, y: 8 }, { autoAlpha: 1, y: 0, duration: .45, ease: 'power3.out' });
      }
    };
    const accent = (k) => ({ purple: 'rgba(139,92,246,.55)', teal: 'rgba(20,184,166,.55)', amber: 'rgba(245,158,11,.5)', indigo: 'rgba(99,102,241,.55)' }[k] || 'rgba(139,92,246,.5)');
    btns.forEach((b) => b.addEventListener('click', () => apply(b)));
    // auto-cycle when in view (stops once a user interacts)
    let auto = true, idx = 0;
    btns.forEach((b) => b.addEventListener('click', () => { auto = false; }));
    if (!K.reduceMotion) {
      new IntersectionObserver((ents) => ents.forEach((en) => {
        if (en.isIntersecting && auto) {
          en.target._t ||= setInterval(() => { if (!auto) return; idx = (idx + 1) % btns.length; apply(btns[idx]); }, 2400);
        }
      }), { threshold: .4 }).observe(swatches);
    }
  }

  /* ---- Three paths: tabs that crossfade copy + swap phone screen ---- */
  function growTabs() {
    const wrap = document.getElementById('growTabs');
    if (!wrap) return;
    const btns = [...wrap.querySelectorAll('.tabs__btn')];
    const panels = [...wrap.querySelectorAll('.tabs__panel')];
    const views = [...wrap.querySelectorAll('#tabPhone .phone__view')];
    const select = (key) => {
      btns.forEach((b) => { const on = b.dataset.tab === key; b.classList.toggle('is-active', on); b.setAttribute('aria-selected', String(on)); });
      panels.forEach((p) => p.classList.toggle('is-active', p.dataset.panel === key));
      views.forEach((v) => v.classList.toggle('is-active', v.dataset.view === key));
    };
    btns.forEach((b) => b.addEventListener('click', () => select(b.dataset.tab)));
    // keyboard arrows
    wrap.querySelector('.tabs__nav')?.addEventListener('keydown', (e) => {
      const i = btns.findIndex((b) => b.classList.contains('is-active'));
      if (e.key === 'ArrowRight') { e.preventDefault(); btns[(i + 1) % btns.length].focus(); btns[(i + 1) % btns.length].click(); }
      if (e.key === 'ArrowLeft')  { e.preventDefault(); btns[(i - 1 + btns.length) % btns.length].focus(); btns[(i - 1 + btns.length) % btns.length].click(); }
    });
  }

  /* ---- Watch Demo video modal ---- */
  function videoModal() {
    const modal = document.getElementById('videoModal');
    if (!modal) return;
    const video = document.getElementById('modalVideo');
    const close = document.getElementById('modalClose');
    const open = () => {
      modal.classList.add('is-open'); modal.setAttribute('aria-hidden', 'false');
      document.body.style.overflow = 'hidden'; K.lenis?.stop?.();
      video?.play?.().catch(() => {});
    };
    const hide = () => {
      modal.classList.remove('is-open'); modal.setAttribute('aria-hidden', 'true');
      document.body.style.overflow = ''; K.lenis?.start?.();
      if (video) { video.pause(); }
    };
    document.querySelectorAll('[data-video]').forEach((b) => b.addEventListener('click', open));
    close?.addEventListener('click', hide);
    modal.addEventListener('click', (e) => { if (e.target === modal) hide(); });
    addEventListener('keydown', (e) => { if (e.key === 'Escape' && modal.classList.contains('is-open')) hide(); });
  }

  /* ---- Feature constellation: place nodes on a ring + draw links ---- */
  function buildConstellation() {
    const wrap = document.querySelector('.constellation');
    if (!wrap) return;
    const nodes = [...wrap.querySelectorAll('.node')];
    const svg = wrap.querySelector('.constellation__svg');
    if (!nodes.length || !svg) return;

    const place = () => {
      const r = wrap.getBoundingClientRect();
      const cx = r.width / 2, cy = r.height / 2;
      const radius = Math.min(r.width, r.height) * 0.40;
      svg.setAttribute('viewBox', `0 0 ${r.width} ${r.height}`);
      let lines = '';
      nodes.forEach((node, i) => {
        const ang = (i / nodes.length) * Math.PI * 2 - Math.PI / 2;
        const x = cx + Math.cos(ang) * radius;
        const y = cy + Math.sin(ang) * radius;
        node.style.left = x + 'px';
        node.style.top = y + 'px';
        node.style.transform = 'translate(-50%,-50%)';
        node.dataset.x = x; node.dataset.y = y;
        lines += `<line x1="${cx}" y1="${cy}" x2="${x}" y2="${y}" stroke="url(#cgrad)" stroke-width="1" class="flow-line" opacity=".4"/>`;
        // ring-to-ring connection
        const n2 = (i + 1) % nodes.length;
        const a2 = (n2 / nodes.length) * Math.PI * 2 - Math.PI / 2;
        lines += `<line x1="${x}" y1="${y}" x2="${cx + Math.cos(a2) * radius}" y2="${cy + Math.sin(a2) * radius}" stroke="rgba(148,163,184,.18)" stroke-width="1"/>`;
      });
      svg.innerHTML =
        `<defs><linearGradient id="cgrad" x1="0" y1="0" x2="1" y2="1">
           <stop offset="0" stop-color="#8B5CF6"/><stop offset="1" stop-color="#06B6D4"/>
         </linearGradient></defs>` + lines;
    };
    place();
    addEventListener('resize', place, { passive: true });

    // gentle ambient float per node
    if (!K.reduceMotion) {
      nodes.forEach((n, i) => {
        n.animate(
          [{ marginTop: '0px' }, { marginTop: '-10px' }, { marginTop: '0px' }],
          { duration: 4200 + i * 260, iterations: Infinity, easing: 'ease-in-out' }
        );
      });
    }
  }

  /* ---- Clicking a node updates the detail panel ---- */
  function featurePanel() {
    const wrap = document.querySelector('.constellation');
    const panel = document.querySelector('.feat-panel__card');
    if (!wrap || !panel) return;
    const nodes = [...wrap.querySelectorAll('.node')];
    const icoEl = panel.querySelector('.feat-panel__ico');
    const titleEl = panel.querySelector('h3');
    const descEl = panel.querySelector('p');

    const set = (node) => {
      nodes.forEach((n) => n.classList.toggle('is-active', n === node));
      const ico = node.querySelector('.node__dot').innerHTML;
      if (icoEl) icoEl.innerHTML = ico;
      if (titleEl) titleEl.textContent = node.dataset.title || node.querySelector('.node__label').textContent;
      if (descEl) descEl.textContent = node.dataset.desc || '';
      if (window.gsap && !K.reduceMotion) {
        window.gsap.fromTo(panel, { y: 12, autoAlpha: .4 }, { y: 0, autoAlpha: 1, duration: .5, ease: 'power3.out' });
      }
    };
    nodes.forEach((n) => {
      n.setAttribute('tabindex', '0');
      n.setAttribute('role', 'button');
      n.addEventListener('click', () => set(n));
      n.addEventListener('mouseenter', () => set(n));
      n.addEventListener('keydown', (e) => { if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); set(n); } });
    });
    if (nodes[0]) set(nodes[0]);
  }

  /* ---- Hero float-cards react to mouse (depth parallax) ---- */
  function heroDepth() {
    if (!K.finePointer || K.reduceMotion) return;
    const hero = document.querySelector('.hero');
    const layers = hero?.querySelectorAll('[data-depth]');
    if (!hero || !layers?.length) return;
    let tx = 0, ty = 0, cx = 0, cy = 0;
    hero.addEventListener('mousemove', (e) => {
      const r = hero.getBoundingClientRect();
      tx = (e.clientX - r.left) / r.width - .5;
      ty = (e.clientY - r.top) / r.height - .5;
    });
    const render = () => {
      cx += (tx - cx) * 0.06; cy += (ty - cy) * 0.06;
      layers.forEach((l) => {
        const d = parseFloat(l.dataset.depth) || 20;
        l.style.transform = `translate(${-cx * d}px,${-cy * d}px)`;
      });
      requestAnimationFrame(render);
    };
    requestAnimationFrame(render);
  }

  /* ---- 3D tilt on [data-tilt] cards ---- */
  function tiltCards() {
    if (!K.finePointer || K.reduceMotion) return;
    document.querySelectorAll('[data-tilt]').forEach((el) => {
      el.style.transformStyle = 'preserve-3d';
      el.addEventListener('mousemove', (e) => {
        const r = el.getBoundingClientRect();
        const px = (e.clientX - r.left) / r.width - .5;
        const py = (e.clientY - r.top) / r.height - .5;
        el.style.transform = `perspective(800px) rotateY(${px * 8}deg) rotateX(${-py * 8}deg)`;
      });
      el.addEventListener('mouseleave', () => { el.style.transform = ''; });
    });
  }
})();
