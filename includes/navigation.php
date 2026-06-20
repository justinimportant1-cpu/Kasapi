<?php
/**
 * Floating glassmorphism navigation with animated mega-menu,
 * morphing hamburger, active indicator. Expects globals $SITE, $NAV.
 */
declare(strict_types=1);
/** @var array $SITE */ /** @var array $NAV */
?>
<header class="nav" id="nav" data-magnetic-zone>
    <div class="nav__inner">
        <a class="nav__brand" href="index.php" aria-label="<?= e($SITE['name']) ?> home" data-magnetic>
            <img class="nav__logo" src="<?= e($SITE['logo']) ?>" alt="<?= e($SITE['name']) ?>" height="30" width="120" loading="eager" decoding="async">
        </a>

        <nav class="nav__menu" aria-label="Primary">
            <ul class="nav__list">
                <?php foreach ($NAV as $item): ?>
                    <?php $hasMega = !empty($item['mega']); ?>
                    <li class="nav__item<?= $hasMega ? ' has-mega' : '' ?>">
                        <a class="nav__link<?= is_current($item['href']) ? ' is-active' : '' ?>"
                           href="<?= e($item['href']) ?>"
                           <?= $hasMega ? 'aria-haspopup="true" aria-expanded="false"' : '' ?>>
                            <?= e($item['label']) ?>
                            <?php if ($hasMega): ?><span class="nav__caret" aria-hidden="true"></span><?php endif; ?>
                        </a>

                        <?php if ($hasMega): ?>
                        <div class="mega" role="region" aria-label="<?= e($item['label']) ?> menu">
                            <div class="mega__inner">
                                <p class="mega__lede"><?= e($item['mega']['lede']) ?></p>
                                <div class="mega__grid">
                                    <?php foreach ($item['mega']['cols'] as $col): ?>
                                    <div class="mega__col">
                                        <span class="mega__title"><?= e($col['title']) ?></span>
                                        <ul>
                                            <?php foreach ($col['items'] as [$t, $href, $desc]): ?>
                                            <li>
                                                <a href="<?= e($href) ?>" class="mega__link">
                                                    <span class="mega__link-t"><?= e($t) ?></span>
                                                    <span class="mega__link-d"><?= e($desc) ?></span>
                                                </a>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <div class="nav__actions">
            <a class="btn btn--primary nav__cta" href="<?= e($SITE['demo_url']) ?>" data-magnetic>
                <span>Request a Demo</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
            </a>
            <button class="nav__burger" id="navBurger" aria-label="Open menu" aria-expanded="false" aria-controls="mobileMenu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</header>

<!-- Full-screen mobile menu -->
<div class="mobile-menu" id="mobileMenu" aria-hidden="true">
    <nav class="mobile-menu__nav" aria-label="Mobile">
        <ul>
            <li><a href="index.php">Home</a></li>
            <?php foreach ($NAV as $item): ?>
                <li><a href="<?= e($item['href']) ?>"><?= e($item['label']) ?></a></li>
            <?php endforeach; ?>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <a class="btn btn--primary" href="<?= e($SITE['demo_url']) ?>">Request a Demo</a>
    </nav>
</div>

<main id="main">
