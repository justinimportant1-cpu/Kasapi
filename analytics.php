<?php
declare(strict_types=1);
require __DIR__ . '/includes/config.php';
render_header([
    'title'       => 'Analytics',
    'description' => 'A futuristic command center for member engagement — participation growth, retention, event performance, and group activity in real time.',
]);
?>
<section class="page-hero">
    <div class="container">
        <p class="eyebrow reveal"><span class="eyebrow__dot"></span>Analytics command center</p>
        <h1 class="reveal-blur" data-split>See your community grow, in real time.</h1>
        <p class="lede reveal">Engagement isn't a feeling — it's measurable. Track participation, retention, events, and group activity, and let the numbers guide your next move.</p>
    </div>
</section>

<section class="section section--tight" id="dashCharts">
    <div class="container">
        <div class="kpis reveal-stagger">
            <div class="kpi"><div class="n"><span data-count="1560">0</span></div><div class="l">Active members</div><div class="trend">▲ 23% this quarter</div></div>
            <div class="kpi"><div class="n"><span data-count="88">0</span><span class="suf">%</span></div><div class="l">Member retention</div><div class="trend">▲ 6 pts YoY</div></div>
            <div class="kpi"><div class="n"><span data-count="132">0</span></div><div class="l">Avg. event attendance</div><div class="trend">▲ 41% vs. last year</div></div>
            <div class="kpi"><div class="n"><span data-count="2300">0</span></div><div class="l">Monthly interactions</div><div class="trend">▲ 3.4× baseline</div></div>
        </div>
        <div class="dash reveal">
            <div class="dash__head">
                <h3>Participation &amp; retention</h3>
                <div class="dash__legend">
                    <span><i style="background:#8B5CF6"></i>Active members</span>
                    <span><i style="background:#06B6D4"></i>Interactions</span>
                </div>
            </div>
            <div class="dash__charts">
                <div id="chartGrowth"></div>
                <div id="chartRetention"></div>
            </div>
            <div style="margin-top:24px"><div id="chartEvents"></div></div>
        </div>
    </div>
</section>
<?php render_footer(); ?>
