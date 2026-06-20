<?php
declare(strict_types=1);
require __DIR__ . '/includes/config.php';
render_header([
    'title'       => 'Solutions',
    'description' => 'Kasapi powers associations, nonprofits, chambers, alumni groups, clubs, faith-based organizations, professional networks, and more.',
]);
$solutions = [
    ['associations','Associations','Professional & trade bodies','Increase participation between events and prove your value at renewal time.','M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8z'],
    ['nonprofits','Nonprofits','Mission-driven communities','Rally supporters, volunteers, and donors around the cause in one place.','M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8L12 21l8.8-8.6a5.5 5.5 0 0 0 0-7.8z'],
    ['chambers','Chambers of Commerce','Local business networks','Connect members, promote local businesses, and run events effortlessly.','M3 21h18M5 21V7l8-4 8 4v14M9 9h.01M9 13h.01M9 17h.01'],
    ['alumni','Alumni Groups','Lifelong connection','Keep graduates connected, mentoring, and giving back for decades.','M22 10L12 5 2 10l10 5 10-5zM6 12v5c3 2 9 2 12 0v-5'],
    ['clubs','Clubs','Shared passion, organized','Give enthusiasts a home for events, conversations, and belonging.','M12 2a7 7 0 0 0-4 12.7V17a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v-2.3A7 7 0 0 0 12 2z'],
    ['faith','Faith-Based','Congregations that connect','Strengthen community life with groups, events, and giving.','M12 2v20M5 9h14M7 22V9'],
    ['professional','Professional Networks','Careers & opportunity','Power introductions, jobs, and knowledge-sharing among peers.','M3 7h18v13H3zM8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2'],
    ['education','Educational','Learning communities','Connect learners, cohorts, and educators beyond the classroom.','M4 19.5A2.5 2.5 0 0 1 6.5 17H20M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5z'],
    ['facebook','Beyond Facebook','Own your community','Move your group into a branded, distraction-free space you control.','M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z'],
];
?>
<section class="page-hero">
    <div class="container">
        <p class="eyebrow reveal"><span class="eyebrow__dot"></span>Solutions</p>
        <h1 class="reveal-blur" data-split>Built for every community that wants to come alive.</h1>
        <p class="lede reveal">Whatever you organize — associations to alumni, chambers to congregations — Kasapi helps you keep members engaged, connected, informed, and active.</p>
    </div>
</section>

<section class="section section--tight">
    <div class="container">
        <div class="grid grid--3 reveal-stagger">
            <?php foreach ($solutions as [$id,$t,$tag,$d,$p]): ?>
            <article class="card" id="<?= e($id) ?>" data-tilt>
                <div class="card__ico"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="<?= e($p) ?>"/></svg></div>
                <span class="muted" style="font-size:.78rem;letter-spacing:.1em;text-transform:uppercase;color:var(--purple)"><?= e($tag) ?></span>
                <h3 style="margin-top:8px"><?= e($t) ?></h3>
                <p><?= e($d) ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php render_footer(); ?>
