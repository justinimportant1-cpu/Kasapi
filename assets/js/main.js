/* =====================================================================
   KASAPI · main.js — boot, smooth scroll, cursor, magnetic, nav, loader
   Vanilla ES. Exposes window.Kasapi for the other modules.
   ===================================================================== */
(() => {
  'use strict';

  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const finePointer  = window.matchMedia('(hover:hover) and (pointer:fine)').matches;

  /* Shared namespace + tiny event bus so modules can react to boot/scroll. */
  const Kasapi = (window.Kasapi = {
    reduceMotion,
    finePointer,
    lenis: null,
    ready: false,
    _cbs: [],
    onReady(fn) { this.ready ? fn() : this._cbs.push(fn); },
    /** Lazy-load an external script once; resolves when loaded. */
    loadScript(src) {
      this._scripts ||= {};
      if (this._scripts[src]) return this._scripts[src];
      return (this._scripts[src] = new Promise((res, rej) => {
        const s = document.createElement('script');
        s.src = src; s.async = true;
        s.onload = res; s.onerror = rej;
        document.head.appendChild(s);
      }));
    },
    /** Lazy-load a stylesheet once. */
    loadCSS(href) {
      if (document.querySelector(`link[href="${href}"]`)) return;
      const l = document.createElement('link');
      l.rel = 'stylesheet'; l.href = href;
      document.head.appendChild(l);
    },
  });

  /* ---------------- Loader ---------------- */
  function runLoader() {
    const loader = document.getElementById('loader');
    if (!loader) return finishBoot();
    const bar = loader.querySelector('.loader__bar span');
    const pct = loader.querySelector('.loader__pct');
    let p = 0;
    const tick = () => {
      p += Math.max(2, (100 - p) * 0.18);
      if (p > 100) p = 100;
      if (bar) bar.style.width = p + '%';
      if (pct) pct.textContent = Math.round(p);
      if (p < 100) requestAnimationFrame(tick);
      else setTimeout(() => { loader.classList.add('is-done'); finishBoot(); }, 220);
    };
    // Wait for window load (or 2.2s cap) before completing the bar.
    let loaded = false;
    window.addEventListener('load', () => { loaded = true; });
    const cap = setTimeout(() => { loaded = true; }, 2200);
    const start = () => {
      requestAnimationFrame(tick);
      const wait = setInterval(() => { if (loaded) { clearInterval(wait); clearTimeout(cap); } }, 60);
    };
    reduceMotion ? (loader.classList.add('is-done'), finishBoot()) : start();
  }

  /* ---------------- Smooth scroll (Lenis) ---------------- */
  function initLenis() {
    if (reduceMotion || !window.Lenis) return;
    const lenis = new window.Lenis({
      duration: 1.15,
      easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
      smoothWheel: true,
    });
    Kasapi.lenis = lenis;
    const raf = (time) => { lenis.raf(time); requestAnimationFrame(raf); };
    requestAnimationFrame(raf);

    // Hand scroll position to ScrollTrigger if present.
    if (window.ScrollTrigger) {
      lenis.on('scroll', window.ScrollTrigger.update);
      window.gsap?.ticker.add((t) => lenis.raf(t * 1000));
      window.gsap?.ticker.lagSmoothing(0);
    }
    // Anchor links use Lenis.
    document.querySelectorAll('a[href^="#"]').forEach((a) => {
      a.addEventListener('click', (e) => {
        const id = a.getAttribute('href');
        if (id.length < 2) return;
        const el = document.querySelector(id);
        if (el) { e.preventDefault(); lenis.scrollTo(el, { offset: -90 }); }
      });
    });
  }

  /* ---------------- Scroll progress + nav state ---------------- */
  function initScrollUI() {
    const bar = document.getElementById('scrollProgress');
    const nav = document.getElementById('nav');
    let ticking = false;
    const update = () => {
      const h = document.documentElement.scrollHeight - window.innerHeight;
      const y = window.scrollY;
      if (bar) bar.style.width = (h > 0 ? (y / h) * 100 : 0) + '%';
      if (nav) nav.classList.toggle('is-scrolled', y > 30);
      ticking = false;
    };
    addEventListener('scroll', () => { if (!ticking) { ticking = true; requestAnimationFrame(update); } }, { passive: true });
    update();
  }

  /* ---------------- Magnetic buttons ---------------- */
  function initMagnetic() {
    if (!finePointer || reduceMotion) return;
    document.querySelectorAll('[data-magnetic]').forEach((el) => {
      const strength = 0.35;
      el.addEventListener('mousemove', (e) => {
        const r = el.getBoundingClientRect();
        const mx = e.clientX - (r.left + r.width / 2);
        const my = e.clientY - (r.top + r.height / 2);
        el.style.transform = `translate(${mx * strength}px,${my * strength}px)`;
      });
      el.addEventListener('mouseleave', () => { el.style.transform = ''; });
    });
  }

  /* ---------------- Mobile menu ---------------- */
  function initMobileMenu() {
    const burger = document.getElementById('navBurger');
    const menu = document.getElementById('mobileMenu');
    if (!burger || !menu) return;
    const toggle = (open) => {
      burger.classList.toggle('is-open', open);
      menu.classList.toggle('is-open', open);
      burger.setAttribute('aria-expanded', String(open));
      menu.setAttribute('aria-hidden', String(!open));
      document.body.style.overflow = open ? 'hidden' : '';
      Kasapi.lenis?.[open ? 'stop' : 'start']?.();
    };
    burger.addEventListener('click', () => toggle(!burger.classList.contains('is-open')));
    menu.querySelectorAll('a').forEach((a) => a.addEventListener('click', () => toggle(false)));
    addEventListener('keydown', (e) => { if (e.key === 'Escape') toggle(false); });
  }

  /* ---------------- Boot ---------------- */
  function finishBoot() {
    if (Kasapi.ready) return;
    Kasapi.ready = true;
    Kasapi._cbs.forEach((fn) => { try { fn(); } catch (e) { console.error(e); } });
    Kasapi._cbs.length = 0;
  }

  function boot() {
    initLenis();
    initScrollUI();
    initMagnetic();
    initMobileMenu();
    runLoader();
  }

  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', boot);
  else boot();
})();
