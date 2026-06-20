<?php
/**
 * Kasapi — Reusable UI components (global design system)
 * ------------------------------------------------------------------
 * Small, composable PHP helpers that emit the project's shared markup
 * so every page draws from one cohesive system: buttons, eyebrows,
 * glass float-cards, the recurring phone device, icons and check lists.
 *
 * All helpers RETURN a string (so they compose) — use `echo` at call
 * sites. Output is escaped via e(); icon paths are author-controlled.
 */
declare(strict_types=1);

/* ------------------------------------------------------------------ *
 * Icon — inline, currentColor, consistent stroke. $d is an SVG path.
 * ------------------------------------------------------------------ */
function kp_icon(string $d, int $size = 22, float $sw = 1.9): string
{
    return sprintf(
        '<svg width="%1$d" height="%1$d" viewBox="0 0 24 24" fill="none" stroke="currentColor" '
        . 'stroke-width="%2$s" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">%3$s</svg>',
        $size,
        rtrim(rtrim(number_format($sw, 2, '.', ''), '0'), '.'),
        // allow multi-path icons separated by "|"
        implode('', array_map(fn($p) => '<path d="' . e($p) . '"/>', explode('|', $d)))
    );
}

/** Shared arrow used in CTAs. */
function kp_arrow(int $size = 18): string
{
    return sprintf(
        '<svg width="%1$d" height="%1$d" viewBox="0 0 24 24" fill="none" stroke="currentColor" '
        . 'stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'
        . '<path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>',
        $size
    );
}

/* ------------------------------------------------------------------ *
 * Eyebrow — small uppercase label with a glowing dot.
 * ------------------------------------------------------------------ */
function kp_eyebrow(string $text, array $o = []): string
{
    $cls = trim('eyebrow ' . ($o['class'] ?? ''));
    return '<p class="' . e($cls) . '"' . ($o['attrs'] ?? '') . '>'
        . '<span class="eyebrow__dot"></span>' . e($text) . '</p>';
}

/* ------------------------------------------------------------------ *
 * Button — variant: primary | ghost | light. Magnetic + arrow by default.
 * ------------------------------------------------------------------ */
function kp_btn(string $label, string $href, array $o = []): string
{
    $variant  = $o['variant'] ?? 'primary';
    $lg       = !empty($o['lg']) ? ' btn--lg' : '';
    $extra    = isset($o['class']) ? ' ' . $o['class'] : '';
    $magnetic = $o['magnetic'] ?? true;
    $arrow    = $o['arrow'] ?? true;
    $icon     = $o['icon'] ?? '';
    $tag      = $o['tag'] ?? 'a';
    $attrs    = $o['attrs'] ?? '';

    $cls = 'btn btn--' . e($variant) . $lg . e($extra);
    $href = $tag === 'a' ? ' href="' . e($href) . '"' : '';
    $mag  = $magnetic ? ' data-magnetic' : '';

    return "<$tag class=\"$cls\"$href$mag $attrs>"
        . $icon
        . '<span>' . e($label) . '</span>'
        . ($arrow ? kp_arrow() : '')
        . "</$tag>";
}

/* ------------------------------------------------------------------ *
 * Check list — feature bullets with a cyan check.
 * ------------------------------------------------------------------ */
function kp_checks(array $items, array $o = []): string
{
    $cls = trim('checks ' . ($o['class'] ?? ''));
    $check = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" '
        . 'stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>';
    $out = '<ul class="' . e($cls) . '">';
    foreach ($items as $it) {
        $out .= '<li>' . $check . e($it) . '</li>';
    }
    return $out . '</ul>';
}

/* ------------------------------------------------------------------ *
 * Float card — glassmorphic notification chip layered over media.
 *   $o: icon (svg|''), title, sub, tone (purple|teal|indigo), depth,
 *       class, attrs
 * ------------------------------------------------------------------ */
function kp_float_card(array $o): string
{
    $tone  = $o['tone'] ?? '';
    $toneC = $tone ? ' ico--' . e($tone) : '';
    $depth = isset($o['depth']) ? ' data-depth="' . (int) $o['depth'] . '"' : '';
    $cls   = trim('float-card ' . ($o['class'] ?? ''));
    return '<div class="' . e($cls) . '"' . $depth . ' ' . ($o['attrs'] ?? '') . '>'
        . '<span class="ico' . $toneC . '">' . ($o['icon'] ?? '') . '</span>'
        . '<div><div class="ttl">' . e($o['title'] ?? '') . '</div>'
        . '<div class="sub">' . e($o['sub'] ?? '') . '</div></div></div>';
}

/* ------------------------------------------------------------------ *
 * Phone — the recurring storytelling device. Wraps screen markup in the
 * shared frame (glow, notch, status bar). Pass raw inner screen HTML.
 *   $o: class, glow (css background), bar (right label), tilt (bool),
 *       depth, attrs, sticky (bool — adds floating-travel modifier)
 * ------------------------------------------------------------------ */
function kp_phone(string $screen, array $o = []): string
{
    $cls   = trim('phone ' . ($o['class'] ?? ''));
    $depth = isset($o['depth']) ? ' data-depth="' . (int) $o['depth'] . '"' : '';
    $tilt  = ($o['tilt'] ?? true) ? ' data-tilt' : '';
    $glow  = isset($o['glow'])
        ? ' style="background:' . e($o['glow']) . '"'
        : '';
    $barId  = isset($o['bar_id']) ? ' id="' . e($o['bar_id']) . '"' : '';
    $glowId = isset($o['glow_id']) ? ' id="' . e($o['glow_id']) . '"' : '';
    $bar    = e($o['bar'] ?? 'Kasapi');
    $time   = e($o['time'] ?? '9:41');

    return '<div class="' . e($cls) . '"' . $depth . ' ' . ($o['attrs'] ?? '') . '>'
        . '<div class="phone__glow"' . $glowId . $glow . '></div>'
        . '<div class="phone__frame"' . $tilt . '>'
        . '<div class="phone__notch"></div>'
        . '<div class="phone__screen"' . (isset($o['screen_id']) ? ' id="' . e($o['screen_id']) . '"' : '') . '>'
        . '<div class="phone__bar"><span>' . $time . '</span><span' . $barId . '>' . $bar . '</span></div>'
        . $screen
        . '</div></div></div>';
}

/* ------------------------------------------------------------------ *
 * Section heading — eyebrow + title (+ optional lede), centered.
 * ------------------------------------------------------------------ */
function kp_sec_head(string $eyebrow, string $title, ?string $lede = null, array $o = []): string
{
    $cls = trim('sec-head ' . ($o['class'] ?? ''));
    $out = '<div class="' . e($cls) . '">';
    $out .= kp_eyebrow($eyebrow, ['class' => 'reveal']);
    $out .= '<h2 class="h2 reveal" data-split>' . e($title) . '</h2>';
    if ($lede !== null) {
        $out .= '<p class="lede reveal" style="margin-inline:auto">' . e($lede) . '</p>';
    }
    return $out . '</div>';
}
