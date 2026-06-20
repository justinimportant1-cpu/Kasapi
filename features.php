<?php
declare(strict_types=1);
require __DIR__ . '/includes/config.php';
render_header([
    'title'       => 'Features',
    'description' => 'Profiles, groups, events, messaging, announcements, resources, directory, jobs, payments, analytics, and AI — everything in one platform.',
]);
$features = [
    ['profiles','Member Profiles','Rich, living identities with interests, history, groups, and connections.','M16 11a4 4 0 1 0-4-4 4 4 0 0 0 4 4zM4 21v-1a6 6 0 0 1 12 0v1'],
    ['groups','Groups & Communities','Sub-communities where shared passions turn into real belonging.','M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8z'],
    ['events','Events & Ticketing','Create, sell, RSVP, and check members in — all in one flow.','M3 4h18v18H3zM3 10h18M8 2v4M16 2v4'],
    ['messaging','Messaging','Direct and group conversations that keep members talking.','M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z'],
    ['announcements','Announcements','Reach everyone instantly with on-brand, targeted updates.','M3 11l19-9-9 19-2-8-8-2z'],
    ['resources','Resources','A knowledge hub of documents, links, and learning that compounds.','M4 19.5A2.5 2.5 0 0 1 6.5 17H20M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5z'],
    ['directory','Business Directory','A searchable directory of members and businesses.','M21 21l-4.3-4.3M11 18a7 7 0 1 0 0-14 7 7 0 0 0 0 14z'],
    ['jobs','Jobs & Opportunities','Share roles, referrals, and opportunities within the community.','M3 7h18v13H3zM8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2'],
    ['payments','Payments','Collect dues, ticket sales, and memberships seamlessly.','M2 7h20v12H2zM2 11h20M6 15h4'],
    ['analytics','Analytics','Real-time engagement intelligence for organizers.','M3 3v18h18M7 14l3-3 3 3 5-6'],
    ['announcements2','Workflows','Automate the busywork so your team can focus on people.','M12 2v4M12 18v4M4.9 4.9l2.8 2.8M16.3 16.3l2.8 2.8M2 12h4M18 12h4'],
    ['ai','AI Everywhere','Intelligence woven into every workflow on the platform.','M12 2a7 7 0 0 0-4 12.7V17a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v-2.3A7 7 0 0 0 12 2z'],
];
?>
<section class="page-hero">
    <div class="container">
        <p class="eyebrow reveal"><span class="eyebrow__dot"></span>Features</p>
        <h1 class="reveal-blur" data-split>More than a member list. A living community.</h1>
        <p class="lede reveal">Your members don't need another database. They need a place they want to open every day — to meet, join, attend, share, and help each other.</p>
    </div>
</section>

<section class="section section--tight">
    <div class="container">
        <div class="grid grid--3 reveal-stagger">
            <?php foreach ($features as [$id,$t,$d,$p]): ?>
            <article class="card" id="<?= e($id) ?>" data-tilt>
                <div class="card__ico"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="<?= e($p) ?>"/></svg></div>
                <h3><?= e($t) ?></h3>
                <p><?= e($d) ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php render_footer(); ?>
