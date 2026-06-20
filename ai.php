<?php
declare(strict_types=1);
require __DIR__ . '/includes/config.php';
render_header([
    'title'       => 'AI',
    'description' => 'Kasapi AI is woven through every workflow — announcements, engagement predictions, content generation, recommendations, and automation.',
]);
?>
<section class="page-hero">
    <div class="container">
        <p class="eyebrow reveal"><span class="eyebrow__dot"></span>Kasapi AI</p>
        <h1 class="reveal-blur" data-split>Intelligence that thinks with you.</h1>
        <p class="lede reveal">Not a chatbot bolted on the side — an intelligent layer living inside every workflow, quietly making your community easier to run and more rewarding to belong to.</p>
    </div>
</section>

<section class="section ai">
    <div class="container ai__grid">
        <div class="ai__core">
            <div class="ai__canvas"></div>
            <div class="ai__orb"></div>
            <div class="ai__insight" style="top:12%;left:4%">{ "engagement": "+34%" }</div>
            <div class="ai__insight" style="bottom:16%;right:2%;animation-delay:1.6s"><i></i>Draft announcement</div>
            <div class="ai__insight" style="bottom:6%;left:14%;animation-delay:2.8s"><i></i>3 members to re-engage</div>
        </div>
        <div>
            <h2 class="h2 reveal" style="margin-bottom:18px">AI woven through <span class="text-grad">every workflow</span>.</h2>
            <div class="ai__feats reveal-stagger">
                <?php
                $ai = [
                    ['Smart announcements','Generate on-brand announcements, posts, and emails in seconds.','M3 11l19-9-9 19-2-8-8-2z'],
                    ['Engagement predictions','Spot members likely to lapse before they go quiet — and act.','M3 3v18h18M7 14l3-3 3 3 5-6'],
                    ['Content generation','Turn one idea into events, emails, and posts instantly.','M12 20h9M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4z'],
                    ['Smart recommendations','Surface the right groups, events, and people to each member.','M12 2a7 7 0 0 0-4 12.7V17a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v-2.3A7 7 0 0 0 12 2z'],
                    ['Workflow automation','Automate the busywork so organizers can focus on people.','M12 2v4M12 18v4M4.9 4.9l2.8 2.8M16.3 16.3l2.8 2.8M2 12h4M18 12h4'],
                ];
                foreach ($ai as [$t,$d,$p]): ?>
                <div class="ai-feat">
                    <span class="ai-feat__ico"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="<?= e($p) ?>"/></svg></span>
                    <div><h4><?= e($t) ?></h4><p><?= e($d) ?></p></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php render_footer(); ?>
