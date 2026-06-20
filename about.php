<?php
declare(strict_types=1);
require __DIR__ . '/includes/config.php';
render_header([
    'title'       => 'About',
    'description' => 'Kasapi exists to turn static membership lists into thriving communities — with a modern, AI-enabled platform built for the people inside.',
]);
?>
<section class="page-hero">
    <div class="container">
        <p class="eyebrow reveal"><span class="eyebrow__dot"></span>About Kasapi</p>
        <h1 class="reveal-blur" data-split>We turn membership lists into thriving communities.</h1>
        <p class="lede reveal">Most organizations have members. Few have community. Kasapi exists to close that gap — giving every organization a modern, AI-enabled platform their members actually love to use.</p>
    </div>
</section>

<section class="section section--tight">
    <div class="container split">
        <div class="reveal">
            <h2 class="h2" style="margin-bottom:18px">Built for the <span class="text-grad">people inside</span> the platform.</h2>
            <p class="lede" style="margin-bottom:18px">A community isn't a database. It's people meeting each other, joining groups, attending events, sharing ideas, helping one another, and becoming part of something bigger.</p>
            <p class="lede">We build software that makes those human moments happen more often — and we measure our success by your members' participation, not vanity metrics.</p>
        </div>
        <div class="media-frame reveal-blur">
            <img src="<?= e(asset('images/hero-community.jpg')) ?>" alt="The Kasapi community" loading="lazy" width="1950" height="1300">
            <div class="media-frame__glow"></div>
        </div>
    </div>
</section>

<section class="section section--tight">
    <div class="container">
        <div class="grid grid--3 reveal-stagger">
            <?php
            $vals = [
                ['Community first','We design for emotion and belonging before features.','M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8L12 21l8.8-8.6a5.5 5.5 0 0 0 0-7.8z'],
                ['AI with purpose','Intelligence that serves people — never replaces them.','M12 2a7 7 0 0 0-4 12.7V17a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v-2.3A7 7 0 0 0 12 2z'],
                ['Truly yours','Your brand, your data, your members — your platform.','M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z'],
            ];
            foreach ($vals as [$t,$d,$p]): ?>
            <article class="card" data-tilt>
                <div class="card__ico"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="<?= e($p) ?>"/></svg></div>
                <h3><?= e($t) ?></h3>
                <p><?= e($d) ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php render_footer(); ?>
