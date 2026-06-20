<?php
/**
 * Kasapi — Global configuration & shared helpers
 * PHP 8.3+ · No framework · Modular includes
 *
 * Single source of truth for site metadata, navigation, brand tokens,
 * and the small set of helpers used across every page.
 */
declare(strict_types=1);

/* ------------------------------------------------------------------ *
 * Environment
 * ------------------------------------------------------------------ */
const KASAPI_ENV  = 'production';            // 'production' | 'development'
const ASSET_VER   = '1.2.0';                 // bump to bust caches

date_default_timezone_set('UTC');

/* ------------------------------------------------------------------ *
 * Site-wide constants
 * ------------------------------------------------------------------ */
$SITE = [
    'name'        => 'Kasapi',
    'tagline'     => 'Engage Members. Build Community. Drive Impact.',
    'description' => 'Kasapi gives organizations a modern, AI-powered platform to connect members, increase participation, and strengthen communities.',
    'url'         => 'https://kasapiapp.com',
    'locale'      => 'en_US',
    'twitter'     => '@kasapiapp',
    'demo_url'    => 'https://kasapiapp.com/early-access/',
    'logo'        => 'https://kasapiapp.com/wp-content/uploads/2026/04/logo-full.png',
    'year'        => (int) date('Y'),
];

/* ------------------------------------------------------------------ *
 * Brand tokens — mirrored in CSS custom properties (style.css :root).
 * Kept here so PHP can emit theme-color / og data consistently.
 * ------------------------------------------------------------------ */
$BRAND = [
    'midnight' => '#050816',
    'navy'     => '#0B1023',
    'purple'   => '#8B5CF6',
    'indigo'   => '#6366F1',
    'teal'     => '#14B8A6',
    'cyan'     => '#06B6D4',
    'white'    => '#F8FAFC',
    'muted'    => '#94A3B8',
];

/* ------------------------------------------------------------------ *
 * Primary navigation.  `mega` entries render an animated mega-menu.
 * ------------------------------------------------------------------ */
$NAV = [
    [
        'label' => 'Platform',
        'href'  => 'platform.php',
        'mega'  => [
            'lede' => 'One platform that turns a membership list into a living community.',
            'cols' => [
                [
                    'title' => 'Engage',
                    'items' => [
                        ['Member Profiles', 'features.php#profiles', 'Rich, living member identities'],
                        ['Groups & Communities', 'features.php#groups', 'Spaces that spark belonging'],
                        ['Messaging', 'features.php#messaging', 'Real conversations, in-app'],
                    ],
                ],
                [
                    'title' => 'Activate',
                    'items' => [
                        ['Events & Ticketing', 'events.php', 'Sell, RSVP, check-in'],
                        ['Announcements', 'features.php#announcements', 'Reach everyone, instantly'],
                        ['Resources', 'features.php#resources', 'Knowledge that compounds'],
                    ],
                ],
                [
                    'title' => 'Grow',
                    'items' => [
                        ['Analytics', 'analytics.php', 'See engagement in real time'],
                        ['AI Workflows', 'ai.php', 'Intelligence woven throughout'],
                        ['Payments', 'features.php#payments', 'Dues, tickets, memberships'],
                    ],
                ],
            ],
        ],
    ],
    [
        'label' => 'Solutions',
        'href'  => 'solutions.php',
        'mega'  => [
            'lede' => 'Built for every kind of community that wants to come alive.',
            'cols' => [
                [
                    'title' => 'Organizations',
                    'items' => [
                        ['Associations', 'solutions.php#associations', 'Professional & trade bodies'],
                        ['Nonprofits', 'solutions.php#nonprofits', 'Mission-driven communities'],
                        ['Chambers of Commerce', 'solutions.php#chambers', 'Local business networks'],
                    ],
                ],
                [
                    'title' => 'Communities',
                    'items' => [
                        ['Alumni Groups', 'solutions.php#alumni', 'Lifelong connection'],
                        ['Clubs', 'solutions.php#clubs', 'Shared passion, organized'],
                        ['Faith-Based', 'solutions.php#faith', 'Congregations that connect'],
                    ],
                ],
                [
                    'title' => 'Networks',
                    'items' => [
                        ['Professional Networks', 'solutions.php#professional', 'Careers & opportunity'],
                        ['Educational', 'solutions.php#education', 'Learning communities'],
                        ['Beyond Facebook', 'solutions.php#facebook', 'Own your community'],
                    ],
                ],
            ],
        ],
    ],
    ['label' => 'Features',  'href' => 'features.php'],
    ['label' => 'AI',        'href' => 'ai.php'],
    ['label' => 'Events',    'href' => 'events.php'],
    ['label' => 'Analytics', 'href' => 'analytics.php'],
    ['label' => 'Pricing',   'href' => 'pricing.php'],
    ['label' => 'About',     'href' => 'about.php'],
];

/* ------------------------------------------------------------------ *
 * Helpers
 * ------------------------------------------------------------------ */

/** Escape for HTML output. */
function e(?string $v): string
{
    return htmlspecialchars((string) $v, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Versioned asset URL (cache-busting). */
function asset(string $path): string
{
    return 'assets/' . ltrim($path, '/') . '?v=' . ASSET_VER;
}

/** Is $file the current page? (active nav state) */
function is_current(string $file): bool
{
    return basename($_SERVER['SCRIPT_NAME'] ?? 'index.php') === basename($file);
}

/**
 * Render the document <head> + open <body> + nav.
 * Pass a $page array: ['title','description','active','og_image'].
 */
function render_header(array $page = []): void
{
    global $SITE, $BRAND, $NAV;
    $page += [
        'title'       => $SITE['tagline'],
        'description' => $SITE['description'],
        'active'      => '',
        'og_image'    => 'assets/images/hero-community.jpg',
        'body_class'  => '',
    ];
    include __DIR__ . '/header.php';
    include __DIR__ . '/navigation.php';
}

/** Render footer + scripts + close document. */
function render_footer(): void
{
    global $SITE, $BRAND, $NAV;
    include __DIR__ . '/footer.php';
    include __DIR__ . '/scripts.php';
}
