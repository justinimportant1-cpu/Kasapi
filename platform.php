<?php
declare(strict_types=1);
require __DIR__ . '/includes/config.php';
render_header([
    'title'       => 'Platform',
    'description' => 'One platform that turns a membership list into a living community — profiles, groups, events, messaging, payments, analytics, and AI.',
]);
?>
<section class="page-hero">
    <div class="container">
        <p class="eyebrow reveal"><span class="eyebrow__dot"></span>The platform</p>
        <h1 class="reveal-blur" data-split>One platform. Every tool. A thriving community.</h1>
        <p class="lede reveal">Kasapi brings profiles, groups, events, messaging, resources, payments, analytics, and AI into a single branded experience your members actually want to open.</p>
        <div class="hero__actions reveal" style="justify-content:center;margin-top:30px">
            <a class="btn btn--primary btn--lg" href="<?= e($SITE['demo_url']) ?>" data-magnetic><span>Request a Demo</span></a>
            <a class="btn btn--ghost btn--lg" href="features.php" data-magnetic>See all features</a>
        </div>
    </div>
</section>

<section class="section section--tight">
    <div class="container">
        <div class="grid grid--3 reveal-stagger">
            <?php
            $pillars = [
                ['Engage','Give members a reason to come back daily with feeds, groups, and messaging that feel alive.','M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z'],
                ['Activate','Turn passive members into participants with events, ticketing, announcements, and resources.','M3 4h18v18H3zM3 10h18M8 2v4M16 2v4'],
                ['Grow','Measure what works and let AI compound engagement, retention, and revenue over time.','M3 3v18h18M7 14l3-3 3 3 5-6'],
            ];
            foreach ($pillars as $i=>[$t,$d,$p]): ?>
            <article class="card" data-tilt>
                <span class="card__n">0<?= $i+1 ?></span>
                <div class="card__ico"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="<?= e($p) ?>"/></svg></div>
                <h3><?= e($t) ?></h3>
                <p><?= e($d) ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div class="reveal">
            <p class="eyebrow"><span class="eyebrow__dot"></span>Your brand, your app</p>
            <h2 class="h2" style="margin:16px 0 18px">This isn't someone else's platform. <span class="text-grad">It's yours.</span></h2>
            <p class="lede" style="margin-bottom:22px">Launch a fully branded web and mobile experience — your logo, your colors, your structure — that brings membership into your members' pockets.</p>
            <ul class="checks">
                <?php foreach (['Your logo and colors throughout','Your own branded mobile app','Your own member experience','Your own groups, structure, and content'] as $c): ?>
                <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><?= e($c) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="media-frame reveal-blur">
            <img src="<?= e(asset('images/hero-community.jpg')) ?>" alt="A branded Kasapi community" loading="lazy" width="1950" height="1300">
            <div class="media-frame__glow"></div>
        </div>
    </div>
</section>
<?php render_footer(); ?>
