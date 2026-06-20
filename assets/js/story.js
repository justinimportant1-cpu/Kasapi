/* =====================================================================
   KASAPI · story.js
   - Scroll-driven storytelling: a single floating phone travels through
     the page (sticky) and swaps app screens as each step enters view —
     events → groups → messaging → activity → AI insights.
   - Soft glowing particle field (tsParticles, lazy-loaded on idle).
   Both honour reduced-motion and pause work that isn't on screen.
   ===================================================================== */
(() => {
  'use strict';
  const K = window.Kasapi || { onReady: (f) => f(), reduceMotion: false, loadScript: () => Promise.reject() };
  const TSP_CDN = 'https://cdn.jsdelivr.net/npm/@tsparticles/slim@3.5.0/tsparticles.slim.bundle.min.js';

  K.onReady(() => {
    stickyStory();
    softParticles();
  });

  /* =================================================================
     The travelling phone: one device, many screens, driven by scroll.
     ================================================================= */
  function stickyStory() {
    const section = document.getElementById('inside');
    if (!section) return;
    const steps = [...section.querySelectorAll('.story__step')];
    const views = [...section.querySelectorAll('#storyPhone .phone__view')];
    const bar   = document.getElementById('storyBar');
    const rail  = document.getElementById('storyRail');
    const note  = section.querySelector('.story__note');
    const noteT = note?.querySelector('.ttl');
    const noteS = note?.querySelector('.sub');
    const noteI = note?.querySelector('.ico');
    if (!steps.length || !views.length) return;

    let current = -1;
    const activate = (i) => {
      if (i === current || i < 0 || i >= steps.length) return;
      current = i;
      const step = steps[i];
      const key = step.dataset.step;

      steps.forEach((s, n) => s.classList.toggle('is-active', n === i));
      views.forEach((v) => v.classList.toggle('is-active', v.dataset.view === key));
      if (bar) bar.textContent = step.dataset.bar || 'Kasapi';
      if (rail) rail.style.height = ((i + 1) / steps.length * 100) + '%';

      // Refresh the floating notification beside the phone.
      if (note) {
        if (noteT) noteT.textContent = step.dataset.noteTitle || '';
        if (noteS) noteS.textContent = step.dataset.noteSub || '';
        if (noteI) {
          noteI.className = 'ico' + (step.dataset.tone ? ' ico--' + step.dataset.tone : '');
        }
        if (!K.reduceMotion) {
          note.classList.remove('is-pop');
          // force reflow so the animation re-triggers
          void note.offsetWidth;
          note.classList.add('is-pop');
        }
      }
    };

    // A step is "active" while it sits in the centre band of the viewport.
    const io = new IntersectionObserver((entries) => {
      entries.forEach((en) => {
        if (en.isIntersecting) activate(steps.indexOf(en.target));
      });
    }, { rootMargin: '-45% 0px -45% 0px', threshold: 0 });
    steps.forEach((s) => io.observe(s));

    activate(0);
  }

  /* =================================================================
     Soft glowing particles — ambient, lightweight, capped at 60fps.
     Lazy-loaded so it never touches first paint.
     ================================================================= */
  function softParticles() {
    const host = document.getElementById('particles');
    if (!host || K.reduceMotion) return;
    // Skip on small / coarse devices to protect battery and scroll perf.
    if (window.matchMedia('(max-width: 680px)').matches) return;

    const start = () => K.loadScript(TSP_CDN).then(() => {
      const tsp = window.tsParticles;
      if (!tsp) return;
      tsp.load({
        id: 'particles',
        options: {
          fpsLimit: 60,
          detectRetina: true,
          fullScreen: { enable: false },
          pauseOnBlur: true,
          pauseOnOutsideViewport: true,
          particles: {
            number: { value: 34, density: { enable: true, width: 1200, height: 900 } },
            color: { value: ['#A78BFA', '#22D3EE', '#6366F1', '#F8FAFC'] },
            opacity: {
              value: { min: 0.06, max: 0.45 },
              animation: { enable: true, speed: 0.5, sync: false, startValue: 'random' },
            },
            size: { value: { min: 0.6, max: 2.6 } },
            move: {
              enable: true, speed: 0.45, direction: 'top', random: true, straight: false,
              outModes: { default: 'out' },
            },
          },
        },
      }).catch(() => {});
    }).catch(() => {});

    // Defer to idle so it competes with nothing important.
    if ('requestIdleCallback' in window) requestIdleCallback(start, { timeout: 2500 });
    else setTimeout(start, 1200);
  }
})();
