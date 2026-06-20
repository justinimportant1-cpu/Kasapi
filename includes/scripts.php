<?php
/**
 * Script loader. Heavy libs are pulled from CDNs and deferred; our own
 * modules load last. Three.js / Swiper / ApexCharts are loaded lazily by
 * the modules that need them (see main.js loadScript helper) so they never
 * block first paint.
 */
declare(strict_types=1);
?>
<!-- GSAP core + plugins (animation backbone) -->
<script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>

<!-- Lenis smooth scroll -->
<script defer src="https://cdn.jsdelivr.net/npm/lenis@1.1.13/dist/lenis.min.js"></script>

<!-- App modules (ES order matters: main first, it boots the rest) -->
<script defer src="<?= e(asset('js/main.js')) ?>"></script>
<script defer src="<?= e(asset('js/animations.js')) ?>"></script>
<script defer src="<?= e(asset('js/interactions.js')) ?>"></script>
<script defer src="<?= e(asset('js/webgl.js')) ?>"></script>
<script defer src="<?= e(asset('js/carousel.js')) ?>"></script>
</body>
</html>
