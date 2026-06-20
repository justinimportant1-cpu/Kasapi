<?php
declare(strict_types=1);
require __DIR__ . '/includes/config.php';
render_header([
    'title'       => 'Pricing',
    'description' => 'Simple, transparent pricing for communities of every size. Start with early access and grow with Kasapi.',
]);
$plans = [
    ['Launch','Free','to start','For new communities finding their feet.', false,
        ['Branded web experience','Up to 250 members','Groups, events & messaging','Member directory','Community analytics']],
    ['Grow','$0','early access','For organizations ready to activate members.', true,
        ['Everything in Launch','Branded mobile app','Unlimited members','Ticketing & payments','AI announcements & insights','Priority support']],
    ['Scale','Custom','let\'s talk','For large associations & networks.', false,
        ['Everything in Grow','SSO & advanced roles','Custom integrations','Dedicated success manager','Onboarding & migration','SLA & security review']],
];
?>
<section class="page-hero">
    <div class="container">
        <p class="eyebrow reveal"><span class="eyebrow__dot"></span>Pricing</p>
        <h1 class="reveal-blur" data-split>Simple pricing. Built to grow with you.</h1>
        <p class="lede reveal">We're inviting a small number of organizations to shape the platform during early access — so the tools below are free while we build together.</p>
    </div>
</section>

<section class="section section--tight">
    <div class="container">
        <div class="price-grid reveal-stagger">
            <?php foreach ($plans as [$name,$price,$per,$desc,$feat,$items]): ?>
            <article class="price<?= $feat ? ' price--featured' : '' ?>" data-tilt>
                <?php if ($feat): ?><span class="price__badge">Most popular</span><?php endif; ?>
                <span class="price__name"><?= e($name) ?></span>
                <div class="price__price"><?= e($price) ?> <small><?= e($per) ?></small></div>
                <p class="muted"><?= e($desc) ?></p>
                <ul class="checks">
                    <?php foreach ($items as $c): ?>
                    <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><?= e($c) ?></li>
                    <?php endforeach; ?>
                </ul>
                <a class="btn <?= $feat ? 'btn--primary' : 'btn--ghost' ?>" href="<?= e($SITE['demo_url']) ?>" data-magnetic style="justify-content:center">
                    <span><?= $name === 'Scale' ? 'Contact sales' : 'Get started' ?></span>
                </a>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php render_footer(); ?>
