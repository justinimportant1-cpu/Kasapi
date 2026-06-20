/* =====================================================================
   KASAPI · carousel.js — 3D testimonial carousel (Swiper, lazy-loaded)
   and ApexCharts dashboards (lazy-loaded). Both only initialise when the
   relevant section approaches the viewport, keeping first paint light.
   ===================================================================== */
(() => {
  'use strict';
  const K = window.Kasapi || { onReady: (f) => f(), loadScript: () => Promise.reject(), loadCSS: () => {}, reduceMotion: false };
  const SWIPER_JS  = 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js';
  const SWIPER_CSS = 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css';
  const APEX_JS    = 'https://cdn.jsdelivr.net/npm/apexcharts@3.49.1/dist/apexcharts.min.js';

  K.onReady(() => {
    lazyInit('.testi .swiper', initTestimonials);
    lazyInit('#dashCharts', initCharts);
  });

  function lazyInit(selector, fn) {
    const el = document.querySelector(selector);
    if (!el) return;
    const io = new IntersectionObserver((ents) => {
      if (ents.some((e) => e.isIntersecting)) { io.disconnect(); fn(el); }
    }, { rootMargin: '300px' });
    io.observe(el);
  }

  /* ---- Testimonials: coverflow 3D ---- */
  function initTestimonials(el) {
    K.loadCSS(SWIPER_CSS);
    K.loadScript(SWIPER_JS).then(() => {
      if (!window.Swiper) return;
      new window.Swiper(el, {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        loop: true,
        speed: 700,
        coverflowEffect: { rotate: 22, stretch: 0, depth: 180, modifier: 1, slideShadows: false },
        autoplay: K.reduceMotion ? false : { delay: 4200, disableOnInteraction: false },
        pagination: { el: el.querySelector('.swiper-pagination'), clickable: true },
        keyboard: { enabled: true },
      });
    }).catch(() => el.classList.add('swiper--static'));
  }

  /* ---- Analytics dashboard charts ---- */
  function initCharts(host) {
    K.loadScript(APEX_JS).then(() => {
      if (!window.ApexCharts) return;
      const grid = 'rgba(148,163,184,.12)', label = '#94A3B8';
      const base = {
        chart: { fontFamily: 'Inter, sans-serif', toolbar: { show: false }, animations: { enabled: !K.reduceMotion, speed: 900 }, foreColor: label, background: 'transparent' },
        grid: { borderColor: grid, strokeDashArray: 4 },
        dataLabels: { enabled: false },
        legend: { show: false },
        tooltip: { theme: 'dark' },
      };

      // Participation growth — area
      const growth = document.querySelector('#chartGrowth');
      if (growth) new window.ApexCharts(growth, {
        ...base,
        chart: { ...base.chart, type: 'area', height: 300 },
        series: [
          { name: 'Active members', data: [320, 410, 505, 640, 820, 1010, 1280, 1560] },
          { name: 'Interactions', data: [210, 380, 520, 760, 1020, 1380, 1820, 2300] },
        ],
        colors: ['#8B5CF6', '#06B6D4'],
        stroke: { curve: 'smooth', width: 3 },
        fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: .4, opacityTo: 0, stops: [0, 100] } },
        xaxis: { categories: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug'], axisBorder: { show: false }, axisTicks: { show: false } },
      }).render();

      // Retention — radial
      const ret = document.querySelector('#chartRetention');
      if (ret) new window.ApexCharts(ret, {
        ...base,
        chart: { ...base.chart, type: 'radialBar', height: 300 },
        series: [88],
        colors: ['#14B8A6'],
        plotOptions: { radialBar: {
          hollow: { size: '62%' },
          track: { background: 'rgba(148,163,184,.12)' },
          dataLabels: {
            name: { color: label, fontSize: '13px', offsetY: 20 },
            value: { color: '#F8FAFC', fontSize: '34px', fontWeight: 700, offsetY: -16, formatter: (v) => v + '%' },
          },
        } },
        fill: { type: 'gradient', gradient: { shade: 'dark', type: 'horizontal', gradientToColors: ['#06B6D4'], stops: [0, 100] } },
        labels: ['Retention'],
      }).render();

      // Event performance — bars
      const ev = document.querySelector('#chartEvents');
      if (ev) new window.ApexCharts(ev, {
        ...base,
        chart: { ...base.chart, type: 'bar', height: 260 },
        series: [{ name: 'Attendance', data: [76, 92, 64, 110, 88, 132] }],
        colors: ['#6366F1'],
        plotOptions: { bar: { borderRadius: 6, columnWidth: '52%' } },
        xaxis: { categories: ['Mixer','Summit','Workshop','Gala','Webinar','Meetup'], axisBorder: { show: false }, axisTicks: { show: false } },
      }).render();
    }).catch(() => {/* leave KPI numbers as the graceful fallback */});
  }
})();
