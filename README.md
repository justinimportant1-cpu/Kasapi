# Kasapi — Immersive Membership Platform Website

A cinematic, motion-driven marketing site for **Kasapi**, the AI-enabled member
engagement platform. Rebuilt from a single Durable export into a clean, modular
**PHP 8.3+** architecture (no frameworks) with a GSAP + Three.js + Lenis motion system.

> **Core message:** *Engage Members. Build Community. Drive Impact.*

---

## Audit of the original codebase

The supplied ZIP was a single Durable export (`Kasapi Homepage.dc.html` +
`support.js`, a React runtime) — not the requested PHP structure.

| Preserved | Replaced |
|---|---|
| All marketing copy & section narrative | Durable React runtime (`support.js`) |
| Purple brand identity & logo | Monolithic inline-styled single file |
| The hero image (`site.jpeg`) | anime.js → GSAP/ScrollTrigger/Lenis |
| Section flow & SEO intent | Cream/orange theme → dark midnight palette |

**Bottlenecks removed:** React-for-a-static-page, scroll-event parallax jank,
zero lazy-loading, no asset pipeline. **Now:** deferred/lazy libraries,
`requestAnimationFrame` everywhere, IntersectionObserver pausing, off-screen
animation suspension, preloaded LCP hero.

---

## File structure

```
/                       # 10 page entrypoints (index, platform, solutions,
                        #   features, ai, events, analytics, pricing, about, contact)
includes/
  config.php            # site config, nav model, brand tokens, helpers (e, asset, render_*)
  header.php            # <head>, SEO/OG/JSON-LD, fonts, loader, cursor, aurora
  navigation.php        # floating glass nav + animated mega-menu + mobile menu
  footer.php            # final CTA (expanding network) + footer
  scripts.php           # CDN libs (deferred) + app modules
assets/
  css/  style.css · animations.css · responsive.css
  js/   main.js · animations.js · webgl.js · interactions.js · carousel.js
  images/ hero-community.jpg (the mandatory hero) · community-band.jpg
  models/ shaders/ videos/ icons/   # reserved for future 3D/lottie assets
favicon.ico
```

## JavaScript architecture

- **main.js** — boot orchestrator. `window.Kasapi` namespace + ready bus,
  `loadScript`/`loadCSS` lazy loaders, Lenis smooth scroll, custom cursor,
  magnetic buttons, scroll progress, nav state, mobile menu, cinematic loader.
- **animations.js** — GSAP/ScrollTrigger reveals, SplitText-style headline
  masking, count-up numbers, seamless marquee, **pinned horizontal member
  journey**, parallax. Falls back to IntersectionObserver when GSAP is absent.
- **webgl.js** — 2D-canvas neural network (hero + final CTA, always on) and a
  lazy-loaded **Three.js intelligence core** (point-sphere + orbiting rings) for
  the AI section. WebGL-capability checked; CSS orb is the graceful fallback.
- **interactions.js** — feature **constellation** (radial node layout + animated
  connection lines), click/hover detail panel, hero mouse-depth parallax, tilt.
- **carousel.js** — lazy-loaded Swiper **3D coverflow** testimonials and
  ApexCharts analytics dashboards (rendered only as they near the viewport).

## Hero image integration

`assets/images/hero-community.jpg` is the emotional core — full-bleed, faces
intact, headline over the purple negative space on the left. Layered with:
a dual-axis dark scrim for readability, a live `<canvas>` neural network
(mouse-reactive nodes + connection lines), three glassmorphic floating UI cards
(members joined, live event RSVPs, AI insight) with mouse-depth parallax, and a
slow Ken-Burns-style parallax drift on scroll.

## Performance, accessibility, SEO

- **Perf:** libs `defer`red; Three.js/Swiper/ApexCharts lazy-loaded on intersection;
  off-screen canvases pause; `requestAnimationFrame` throttling; preloaded hero LCP;
  CSS containment via fixed-layer aurora; tabular-nums to avoid counter layout shift.
- **A11y:** skip link, focus-visible rings, keyboard-operable nav + constellation
  nodes, ARIA on menus/regions, full `prefers-reduced-motion` path (static reveals,
  no canvas animation, instant counters).
- **SEO:** per-page `<title>`/description, canonical, Open Graph + Twitter cards,
  Organization JSON-LD, semantic landmarks, real crawlable copy.

## Run locally

```bash
php -S 127.0.0.1:8000      # then open http://127.0.0.1:8000/index.php
```
Requires PHP 8.3+. No build step, no dependencies to install — external libraries
load from CDN at runtime.
