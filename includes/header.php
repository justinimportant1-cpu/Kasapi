<?php
/**
 * Document head + opening body. Expects $page (set by render_header) and
 * globals $SITE, $BRAND. SEO-friendly, accessible, performance-minded.
 */
declare(strict_types=1);
/** @var array $page */ /** @var array $SITE */ /** @var array $BRAND */
$pageTitle = $page['title'] === $SITE['tagline']
    ? $SITE['name'] . ' — ' . $SITE['tagline']
    : $page['title'] . ' · ' . $SITE['name'];
$canonical = rtrim($SITE['url'], '/') . '/' . ltrim(basename($_SERVER['SCRIPT_NAME'] ?? ''), '/');
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="<?= e($BRAND['midnight']) ?>">

    <title><?= e($pageTitle) ?></title>
    <meta name="description" content="<?= e($page['description']) ?>">
    <link rel="canonical" href="<?= e($canonical) ?>">

    <!-- Open Graph / social -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?= e($SITE['name']) ?>">
    <meta property="og:title" content="<?= e($pageTitle) ?>">
    <meta property="og:description" content="<?= e($page['description']) ?>">
    <meta property="og:locale" content="<?= e($SITE['locale']) ?>">
    <meta property="og:image" content="<?= e($SITE['url'] . '/' . $page['og_image']) ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="<?= e($SITE['twitter']) ?>">

    <!-- Structured data -->
    <script type="application/ld+json">
    {"@context":"https://schema.org","@type":"Organization","name":"<?= e($SITE['name']) ?>","url":"<?= e($SITE['url']) ?>","description":"<?= e($SITE['description']) ?>","logo":"<?= e($SITE['logo']) ?>"}
    </script>

    <!-- Flip no-js → js as early as possible -->
    <script>document.documentElement.classList.remove('no-js');document.documentElement.classList.add('js');</script>

    <!-- Fonts: Space Grotesk (display) + Inter (body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon -->
    <link rel="icon" href="favicon.ico" sizes="any">

    <!-- Preload the hero image (LCP) on the homepage only -->
    <?php if (is_current('index.php')): ?>
    <link rel="preload" as="image" href="<?= e(asset('images/hero-community.jpg')) ?>" fetchpriority="high">
    <?php endif; ?>

    <!-- Styles -->
    <link rel="stylesheet" href="<?= e(asset('css/style.css')) ?>">
    <link rel="stylesheet" href="<?= e(asset('css/animations.css')) ?>">
    <link rel="stylesheet" href="<?= e(asset('css/responsive.css')) ?>">
</head>
<body class="<?= e($page['body_class']) ?>" data-page="<?= e(basename($_SERVER['SCRIPT_NAME'] ?? 'index.php', '.php')) ?>">

<!-- Skip link (a11y) -->
<a class="skip-link" href="#main">Skip to content</a>

<!-- Cinematic page loader -->
<div class="loader" id="loader" aria-hidden="true">
    <div class="loader__mark">
        <span class="loader__dot"></span><span class="loader__dot"></span><span class="loader__dot"></span>
    </div>
    <div class="loader__bar"><span></span></div>
    <div class="loader__pct">0</div>
</div>

<!-- Scroll progress -->
<div class="scroll-progress" id="scrollProgress" aria-hidden="true"></div>

<!-- Ambient aurora field, fixed behind everything -->
<div class="aurora" aria-hidden="true">
    <span class="aurora__blob aurora__blob--1"></span>
    <span class="aurora__blob aurora__blob--2"></span>
    <span class="aurora__blob aurora__blob--3"></span>
    <span class="aurora__grain"></span>
</div>
