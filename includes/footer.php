<?php
/** Site footer with expanding-network background. Expects globals $SITE, $NAV. */
declare(strict_types=1);
/** @var array $SITE */ /** @var array $NAV */
?>
</main><!-- /#main -->

<!-- ============ FINAL CTA ============ -->
<section class="final-cta" id="finalCta" data-sec="Start">
    <canvas class="final-cta__net" id="finalNet" aria-hidden="true"></canvas>
    <div class="final-cta__glow" aria-hidden="true"></div>
    <div class="container final-cta__inner">
        <p class="eyebrow reveal"><span class="eyebrow__dot"></span>Your community is waiting</p>
        <h2 class="final-cta__title" data-split>Ready to Build Your Community?</h2>
        <p class="final-cta__lede reveal">Create your own branded member experience that keeps people connected between events.</p>
        <div class="final-cta__actions reveal">
            <a class="btn btn--primary btn--lg" href="<?= e($SITE['demo_url']) ?>" data-magnetic>
                <span>Get Started</span>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
            </a>
            <a class="btn btn--ghost btn--lg" href="<?= e($SITE['demo_url']) ?>" data-magnetic>Apply for Early Access</a>
        </div>
    </div>
</section>

<footer class="footer">
    <div class="container footer__grid">
        <div class="footer__brand">
            <img src="<?= e($SITE['logo']) ?>" alt="<?= e($SITE['name']) ?>" class="footer__logo" height="34" width="136" loading="lazy" decoding="async">
            <p class="footer__tagline"><?= e($SITE['tagline']) ?></p>
            <p class="footer__copy">A modern, AI-enabled platform that turns membership lists into thriving communities.</p>
        </div>

        <div class="footer__col">
            <span class="footer__head">Platform</span>
            <a href="platform.php">Overview</a>
            <a href="features.php">Features</a>
            <a href="ai.php">AI</a>
            <a href="events.php">Events</a>
            <a href="analytics.php">Analytics</a>
        </div>
        <div class="footer__col">
            <span class="footer__head">Company</span>
            <a href="solutions.php">Solutions</a>
            <a href="pricing.php">Pricing</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
        </div>
        <div class="footer__col">
            <span class="footer__head">Get started</span>
            <a href="<?= e($SITE['demo_url']) ?>">Request a Demo</a>
            <a href="<?= e($SITE['demo_url']) ?>">Early Access</a>
            <a href="https://kasapiapp.com/privacy-policy/">Privacy Policy</a>
            <a href="https://kasapiapp.com/terms-of-use/">Terms of Service</a>
        </div>
    </div>
    <div class="container footer__bottom">
        <p>© <?= e((string) $SITE['year']) ?> <?= e($SITE['name']) ?>. All rights reserved.</p>
        <p class="footer__made">Engage · Connect · Participate · Engage · Return</p>
    </div>
</footer>
