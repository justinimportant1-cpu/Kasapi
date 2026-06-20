/* =====================================================================
   KASAPI · animations.js — GSAP reveals, split text, counters, marquee,
   pinned member-journey, parallax. Degrades to IntersectionObserver
   reveals when GSAP is unavailable.
   ===================================================================== */
(() => {
  'use strict';
  const K = window.Kasapi || { onReady: (f) => f(), reduceMotion: false };

  K.onReady(() => {
    const reduce = K.reduceMotion;
    const gsap = window.gsap;
    const ST = window.ScrollTrigger;
    if (gsap && ST && !reduce) gsap.registerPlugin(ST);

    cloneMarquee();
    if (gsap && ST && !reduce) {
      gsapReveals(gsap, ST);
      splitHeadlines(gsap, ST);
      counters(gsap, ST);
      parallax(gsap, ST);
      memberJourney(gsap, ST);
      eventBars(gsap, ST);
    } else {
      observerReveals();        // fallback (also covers reduced-motion)
      counters(null, null);
      eventBars(null, null);
    }
  });

  /* ---- duplicate marquee tracks for seamless loop ---- */
  function cloneMarquee() {
    document.querySelectorAll('.marquee__track').forEach((t) => {
      t.innerHTML += t.innerHTML; // 2× content → translateX(-50%) loops seamlessly
    });
  }

  /* ---- GSAP scroll reveals ---- */
  function gsapReveals(gsap, ST) {
    gsap.utils.toArray('.reveal').forEach((el) => {
      gsap.fromTo(el, { y: 30, autoAlpha: 0 }, {
        y: 0, autoAlpha: 1, duration: 1, ease: 'power3.out',
        scrollTrigger: { trigger: el, start: 'top 86%' },
      });
    });
    gsap.utils.toArray('.reveal-stagger').forEach((group) => {
      gsap.fromTo(group.children, { y: 26, autoAlpha: 0 }, {
        y: 0, autoAlpha: 1, duration: .8, ease: 'power3.out', stagger: .09,
        scrollTrigger: { trigger: group, start: 'top 84%' },
      });
    });
    gsap.utils.toArray('.reveal-blur').forEach((el) => {
      gsap.fromTo(el, { autoAlpha: 0, filter: 'blur(14px)', scale: 1.03 }, {
        autoAlpha: 1, filter: 'blur(0px)', scale: 1, duration: 1.1, ease: 'power3.out',
        scrollTrigger: { trigger: el, start: 'top 85%' },
      });
    });
  }

  /* ---- Split headlines into masked lines/words ---- */
  function splitHeadlines(gsap, ST) {
    document.querySelectorAll('[data-split]').forEach((el) => {
      const words = el.textContent.trim().split(/\s+/);
      el.innerHTML = words.map((w) =>
        `<span class="split-line"><span class="split-word">${w}&nbsp;</span></span>`
      ).join('');
      el.style.opacity = 1;
      gsap.fromTo(el.querySelectorAll('.split-word'),
        { yPercent: 115 },
        { yPercent: 0, duration: 1, ease: 'power4.out', stagger: .06,
          scrollTrigger: { trigger: el, start: 'top 88%' } });
    });

    // Hero headline plays immediately (above the fold) once boot finishes.
    const hero = document.querySelector('.hero__title');
    if (hero) {
      const spans = hero.querySelectorAll('.line>span');
      if (spans.length) gsap.fromTo(spans, { yPercent: 115 },
        { yPercent: 0, duration: 1.1, ease: 'power4.out', stagger: .12, delay: .15 });
    }
    // Hero supporting elements
    gsap.fromTo('.hero [data-hero-rise]', { y: 26, autoAlpha: 0 },
      { y: 0, autoAlpha: 1, duration: 1, ease: 'power3.out', stagger: .12, delay: .5 });
  }

  /* ---- Count-up numbers ---- */
  function counters(gsap, ST) {
    const fmt = (v, dec) => {
      const n = dec ? v.toFixed(dec) : Math.round(v).toLocaleString();
      return n;
    };
    document.querySelectorAll('[data-count]').forEach((el) => {
      const target = parseFloat(el.dataset.count);
      const dec = (el.dataset.count.split('.')[1] || '').length;
      const suffix = el.dataset.suffix || '';
      const prefix = el.dataset.prefix || '';
      const run = () => {
        const dur = 1600, t0 = performance.now();
        const step = (now) => {
          const p = Math.min(1, (now - t0) / dur);
          const eased = 1 - Math.pow(1 - p, 3);
          el.textContent = prefix + fmt(target * eased, dec) + suffix;
          if (p < 1) requestAnimationFrame(step);
        };
        requestAnimationFrame(step);
      };
      if (K.reduceMotion) { el.textContent = prefix + fmt(target, dec) + suffix; return; }
      if (gsap && ST) {
        ST.create({ trigger: el, start: 'top 90%', once: true, onEnter: run });
      } else {
        new IntersectionObserver((ents, o) => ents.forEach((en) => {
          if (en.isIntersecting) { run(); o.disconnect(); }
        }), { threshold: .4 }).observe(el);
      }
    });
  }

  /* ---- Parallax depth on [data-parallax] ---- */
  function parallax(gsap, ST) {
    document.querySelectorAll('[data-parallax]').forEach((el) => {
      const depth = parseFloat(el.dataset.parallax) || 0.15;
      gsap.to(el, {
        yPercent: -depth * 100,
        ease: 'none',
        scrollTrigger: { trigger: el.closest('section') || el, start: 'top bottom', end: 'bottom top', scrub: true },
      });
    });
  }

  /* ---- Pinned horizontal member journey ---- */
  function memberJourney(gsap, ST) {
    const section = document.querySelector('.journey');
    const track = section?.querySelector('.journey__track');
    const railFill = section?.querySelector('.journey__rail span');
    if (!section || !track) return;
    const scrollLen = () => track.scrollWidth - window.innerWidth + 120;
    const tl = gsap.to(track, {
      x: () => -scrollLen(),
      ease: 'none',
      scrollTrigger: {
        trigger: section,
        start: 'top top',
        end: () => '+=' + scrollLen(),
        scrub: 1,
        pin: true,
        anticipatePin: 1,
        invalidateOnRefresh: true,
        onUpdate: (self) => { if (railFill) railFill.style.width = (self.progress * 100) + '%'; },
      },
    });
    // subtle per-stage pop
    gsap.utils.toArray('.journey .stage').forEach((st) => {
      gsap.fromTo(st, { scale: .94, autoAlpha: .55 }, {
        scale: 1, autoAlpha: 1, ease: 'power2.out',
        scrollTrigger: { trigger: st, containerAnimation: tl, start: 'left 80%', end: 'left 40%', scrub: true },
      });
    });
  }

  /* ---- Animate event progress bars on view ---- */
  function eventBars() {
    document.querySelectorAll('.event-bar span,.dash [data-bar]').forEach((el) => {
      const to = el.dataset.fill || el.style.getPropertyValue('--fill') || '70%';
      const play = () => { el.style.width = to; };
      new IntersectionObserver((ents, o) => ents.forEach((en) => {
        if (en.isIntersecting) { play(); o.disconnect(); }
      }), { threshold: .3 }).observe(el);
    });
  }

  /* ---- Fallback reveals (no GSAP / reduced motion) ---- */
  function observerReveals() {
    const els = document.querySelectorAll('.reveal,.reveal-stagger,.reveal-blur,[data-split]');
    if (K.reduceMotion) { els.forEach((el) => el.classList.add('is-in')); document.querySelectorAll('[data-split]').forEach(e=>e.style.opacity=1); return; }
    const io = new IntersectionObserver((ents) => ents.forEach((en) => {
      if (en.isIntersecting) { en.target.classList.add('is-in'); io.unobserve(en.target); }
    }), { threshold: .15 });
    els.forEach((el) => io.observe(el));
  }
})();
