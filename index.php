<?php
declare(strict_types=1);
require __DIR__ . '/includes/config.php';

render_header([
    'title'       => $SITE['tagline'],
    'description' => $SITE['description'],
    'body_class'  => 'page-home',
]);
?>

<!-- ====================== HERO ====================== -->
<section class="hero" id="top" data-sec="Home">
    <div class="hero__media">
        <img class="hero__img" data-parallax="0.12"
             src="<?= e(asset('images/hero-community.jpg')) ?>"
             alt="A diverse group of members connecting over a shared meal — a living Kasapi community"
             fetchpriority="high" decoding="async" width="1950" height="1300">
        <div class="hero__scrim"></div>
        <canvas class="hero__net" data-net="dense" aria-hidden="true"></canvas>
    </div>

    <div class="container hero__inner">
        <div class="hero__grid">
            <div class="hero__copy">
                <p class="eyebrow" data-hero-rise><span class="eyebrow__dot"></span>AI-powered member engagement</p>
                <h1 class="hero__title">
                    <span class="line"><span>Engage Members.</span></span>
                    <span class="line"><span class="text-grad">Build Community.</span></span>
                    <span class="line"><span>Drive Impact.</span></span>
                </h1>
                <p class="hero__lede" data-hero-rise>Kasapi gives organizations a modern, AI-powered platform to connect members, increase participation, and strengthen communities.</p>
                <div class="hero__actions" data-hero-rise>
                    <a class="btn btn--primary btn--lg" href="<?= e($SITE['demo_url']) ?>" data-magnetic>
                        <span>Request a Demo</span>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
                    </a>
                    <a class="btn btn--ghost btn--lg" href="platform.php" data-magnetic>Explore the Platform</a>
                </div>
                <div class="hero__stats" data-hero-rise>
                    <div class="hero__stat"><span class="n"><span data-count="3.4" data-suffix="×">0</span></span><span class="l">More member participation</span></div>
                    <div class="hero__stat"><span class="n"><span data-count="88" data-suffix="%">0</span></span><span class="l">Member retention</span></div>
                    <div class="hero__stat"><span class="n"><span data-count="12" data-suffix="+">0</span></span><span class="l">Tools in one platform</span></div>
                </div>
            </div>

            <!-- Floating UI elements layered over the people image -->
            <div class="hero__stage" aria-hidden="true">
                <div class="float-card float-card--a" data-depth="34">
                    <span class="ico ico--teal"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></span>
                    <div><div class="ttl">+128 members</div><div class="sub">joined this week</div></div>
                </div>
                <div class="float-card float-card--b" data-depth="52">
                    <span class="ico ico--indigo"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg></span>
                    <div><div class="ttl">Summer Mixer</div><div class="sub">94 RSVPs · live</div></div>
                </div>
                <div class="float-card float-card--c" data-depth="40">
                    <span class="ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a7 7 0 0 0-4 12.7V17a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v-2.3A7 7 0 0 0 12 2z"/><path d="M9 22h6"/></svg></span>
                    <div><div class="ttl">AI insight</div><div class="sub">3 members at risk</div></div>
                </div>
            </div>
        </div>
    </div>

    <a class="hero__cue" href="#trust">Scroll
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 5v14"/><path d="M19 12l-7 7-7-7"/></svg>
    </a>
</section>

<!-- ====================== TRUST MARQUEE ====================== -->
<section class="marquee" id="trust" aria-label="Built for every kind of community">
    <p class="marquee__label">Built for communities of every kind</p>
    <div class="marquee__mask">
        <div class="marquee__track">
            <?php foreach (['Associations','Nonprofits','Chambers of Commerce','Alumni Groups','Clubs','Professional Networks','Faith-Based Organizations','Educational Communities','Business Networks'] as $t): ?>
                <span class="chip"><span class="d"></span><?= e($t) ?></span>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ====================== MEMBER JOURNEY (pinned) ====================== -->
<section class="journey section" data-sec="Journey" aria-label="The member journey">
    <div class="journey__viewport">
        <div class="journey__track">
            <div class="journey__intro">
                <p class="eyebrow"><span class="eyebrow__dot"></span>The member journey</p>
                <h2 class="h2" style="margin:18px 0 16px">From a name on a list to an active&nbsp;<span class="text-grad">member for life</span>.</h2>
                <p class="lede">Every thriving community follows the same arc. Kasapi powers every step of it.</p>
            </div>
            <?php
            $stages = [
                ['01','Discover','Members find your community through a beautiful, branded home that feels like it was made just for them.','M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 4l2.4 5.2L20 13l-4.4 1.8L12 20l-1.6-5.2L6 13l5.6-1.8z'],
                ['02','Connect','Rich profiles, groups, and messaging help people find each other and start real relationships.','M16 11a4 4 0 1 0-4-4 4 4 0 0 0 4 4zM8 13a4 4 0 1 0-4-4 4 4 0 0 0 4 4zM2 21v-1a5 5 0 0 1 5-5M22 21v-1a5 5 0 0 0-5-5'],
                ['03','Participate','Events, ticketing, announcements and resources turn passive members into active participants.','M3 4h18v14H3zM8 21h8M12 18v3'],
                ['04','Engage','AI surfaces the right content, nudges, and recommendations to keep members coming back daily.','M12 2a7 7 0 0 0-4 12.7V17a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v-2.3A7 7 0 0 0 12 2zM9 22h6'],
                ['05','Return','Analytics reveal what works, so engagement compounds and members renew, year after year.','M3 12a9 9 0 1 0 9-9M3 12l3-3M3 12l3 3'],
            ];
            $dots = count($stages);
            foreach ($stages as $i => [$n,$title,$desc,$path]): ?>
            <article class="stage" data-tilt>
                <div class="stage__n"><?= e($n) ?></div>
                <div class="stage__ico"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="<?= e($path) ?>"/></svg></div>
                <h3><?= e($title) ?></h3>
                <p><?= e($desc) ?></p>
                <div class="stage__dots"><?php for($d=0;$d<$dots;$d++):?><i<?= $d===$i?' style="background:var(--purple)"':''?>></i><?php endfor;?></div>
            </article>
            <?php endforeach; ?>
        </div>
        <div class="journey__rail"><span></span></div>
    </div>
</section>

<!-- ====================== FEATURE CONSTELLATION ====================== -->
<section class="section" data-sec="Features" aria-label="The Kasapi platform">
    <div class="container">
        <div class="sec-head">
            <p class="eyebrow reveal"><span class="eyebrow__dot"></span>One platform, every tool</p>
            <h2 class="h2 reveal-blur" data-split>Everything your community needs, orbiting one core.</h2>
            <p class="lede reveal" style="margin-inline:auto">Not a pile of feature cards — a connected ecosystem. Hover or tap any node to explore.</p>
        </div>

        <div class="constellation">
            <svg class="constellation__svg" preserveAspectRatio="none" aria-hidden="true"></svg>
            <div class="constellation__core">
                <div><span>Kasapi</span><small>Community OS</small></div>
            </div>
            <?php
            $feats = [
                ['Profiles','Living member identities with interests, history, and connections.','M16 11a4 4 0 1 0-4-4 4 4 0 0 0 4 4zM4 21v-1a6 6 0 0 1 12 0v1'],
                ['Groups','Sub-communities where shared passions turn into belonging.','M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM23 21v-2a4 4 0 0 0-3-3.87'],
                ['Events','Create, sell, RSVP, and check in — all in one flow.','M3 4h18v18H3zM3 10h18M8 2v4M16 2v4'],
                ['Messaging','Real conversations between members, in-app and on time.','M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z'],
                ['Resources','A knowledge hub that compounds value over time.','M4 19.5A2.5 2.5 0 0 1 6.5 17H20M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z'],
                ['Directory','A searchable business & member directory.','M21 21l-4.3-4.3M11 18a7 7 0 1 0 0-14 7 7 0 0 0 0 14z'],
                ['Payments','Dues, tickets, and memberships — collected seamlessly.','M2 7h20v12H2zM2 11h20M6 15h4'],
                ['Jobs','Opportunities and referrals shared within the community.','M3 7h18v13H3zM8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2'],
                ['Analytics','Real-time engagement intelligence for organizers.','M3 3v18h18M7 14l3-3 3 3 5-6'],
                ['AI','Intelligence woven through every workflow.','M12 2a7 7 0 0 0-4 12.7V17a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v-2.3A7 7 0 0 0 12 2zM9 22h6'],
            ];
            foreach ($feats as [$t,$d,$p]): ?>
            <div class="node" data-title="<?= e($t) ?>" data-desc="<?= e($d) ?>">
                <span class="node__dot"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="<?= e($p) ?>"/></svg></span>
                <span class="node__label"><?= e($t) ?></span>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="feat-panel">
            <div class="feat-panel__card reveal">
                <div class="feat-panel__ico"></div>
                <div><h3></h3><p></p></div>
            </div>
        </div>
    </div>
</section>

<!-- ====================== AI EXPERIENCE ====================== -->
<section class="section ai" data-sec="AI" aria-label="AI woven through Kasapi">
    <div class="container ai__grid">
        <div class="ai__core">
            <div class="ai__canvas"></div>
            <div class="ai__orb"></div>
            <div class="ai__insight" style="top:12%;left:4%">{ "engagement": "+34%" }</div>
            <div class="ai__insight" style="bottom:16%;right:2%;animation-delay:1.6s"><i></i>Draft announcement</div>
            <div class="ai__insight" style="bottom:6%;left:14%;animation-delay:2.8s"><i></i>3 members to re-engage</div>
        </div>
        <div>
            <p class="eyebrow reveal"><span class="eyebrow__dot"></span>AI, woven throughout</p>
            <h2 class="h2 reveal" style="margin:16px 0 18px">A platform that <span class="text-grad">thinks with you</span>.</h2>
            <p class="lede reveal" style="margin-bottom:30px">Kasapi's intelligence isn't a chatbot bolted on the side. It lives inside every workflow — quietly making your community easier to run and more rewarding to belong to.</p>
            <div class="ai__feats reveal-stagger">
                <?php
                $ai = [
                    ['Smart announcements','Generate on-brand announcements and posts in seconds.','M3 11l19-9-9 19-2-8-8-2z'],
                    ['Engagement predictions','Spot members likely to lapse before they go quiet.','M3 3v18h18M7 14l3-3 3 3 5-6'],
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

<!-- ====================== EVENTS EXPERIENCE ====================== -->
<section class="section" data-sec="Events" aria-label="Live events">
    <div class="container">
        <div class="sec-head">
            <p class="eyebrow reveal"><span class="eyebrow__dot"></span>Events, alive</p>
            <h2 class="h2 reveal" data-split>Watch participation happen in real time.</h2>
        </div>
        <div class="events__grid">
            <div class="timeline reveal-stagger">
                <div class="tl-item"><div class="t">09:42</div><h4>Sarah purchased 2 tickets</h4><p>Summer Mixer · VIP table</p></div>
                <div class="tl-item"><div class="t">09:44</div><h4>14 new RSVPs</h4><p>Capacity now 78% full</p></div>
                <div class="tl-item"><div class="t">09:51</div><h4>Marcus checked in</h4><p>First-time attendee · welcomed</p></div>
                <div class="tl-item"><div class="t">10:03</div><h4>AI nudge sent</h4><p>22 members reminded — 9 RSVP'd</p></div>
            </div>
            <div class="event-card reveal-blur" data-tilt>
                <div class="event-card__top">
                    <span class="event-card__live"><i></i>Live now</span>
                    <h3 style="font-size:1.4rem;margin-top:10px">Summer Community Mixer</h3>
                    <p class="muted" style="font-size:.9rem">Tonight · 6:30 PM · Rooftop Garden</p>
                </div>
                <div class="event-card__body">
                    <div class="event-stat"><span class="lab">Tickets sold</span><span class="val"><span data-count="186">0</span></span></div>
                    <div class="event-bar"><span data-fill="82%"></span></div>
                    <div class="event-stat"><span class="lab">RSVPs confirmed</span><span class="val"><span data-count="94">0</span></span></div>
                    <div class="event-bar"><span data-fill="64%"></span></div>
                    <div class="event-stat"><span class="lab">Checked in</span><span class="val"><span data-count="41">0</span></span></div>
                    <div class="event-bar"><span data-fill="38%"></span></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====================== ANALYTICS COMMAND CENTER ====================== -->
<section class="section" data-sec="Analytics" aria-label="Analytics command center" id="dashCharts">
    <div class="container">
        <div class="sec-head">
            <p class="eyebrow reveal"><span class="eyebrow__dot"></span>Analytics command center</p>
            <h2 class="h2 reveal" data-split>See engagement grow, in numbers.</h2>
        </div>
        <div class="kpis reveal-stagger">
            <div class="kpi"><div class="n"><span data-count="1560">0</span></div><div class="l">Active members</div><div class="trend">▲ 23% this quarter</div></div>
            <div class="kpi"><div class="n"><span data-count="88">0</span><span class="suf">%</span></div><div class="l">Member retention</div><div class="trend">▲ 6 pts YoY</div></div>
            <div class="kpi"><div class="n"><span data-count="132">0</span></div><div class="l">Avg. event attendance</div><div class="trend">▲ 41% vs. last year</div></div>
            <div class="kpi"><div class="n"><span data-count="2300">0</span></div><div class="l">Monthly interactions</div><div class="trend">▲ 3.4× baseline</div></div>
        </div>
        <div class="dash reveal">
            <div class="dash__head">
                <h3>Participation & retention</h3>
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

<!-- ====================== TESTIMONIALS (3D) ====================== -->
<section class="section testi" data-sec="Loved" aria-label="What organizations say">
    <div class="container">
        <div class="sec-head">
            <p class="eyebrow reveal"><span class="eyebrow__dot"></span>Loved by community builders</p>
            <h2 class="h2 reveal" data-split>This is exactly what our community needed.</h2>
        </div>
    </div>
    <div class="swiper">
        <div class="swiper-wrapper">
            <?php
            $quotes = [
                ['Our members finally have a home between events. Engagement tripled in the first quarter.','Amara Osei','President, Women in Tech Alliance','AO'],
                ['We moved 4,000 people out of a noisy Facebook group into a space that\'s truly ours.','Daniel Reyes','Director, Downtown Chamber','DR'],
                ['The AI nudges alone brought back members we thought we\'d lost for good.','Priya Nandakumar','Engagement Lead, Alumni Network','PN'],
                ['One platform replaced five tools. Our small team finally feels ahead of the work.','Tomás Becker','Operations, Founders Club','TB'],
                ['Renewals are up 18%. Members feel seen, and the analytics prove it.','Grace Whitfield','ED, Coastal Nonprofit Coalition','GW'],
            ];
            foreach ($quotes as [$q,$name,$role,$av]): ?>
            <div class="swiper-slide">
                <div class="t-card">
                    <div class="t-stars">★★★★★</div>
                    <p class="t-card__quote">"<?= e($q) ?>"</p>
                    <div class="t-card__who">
                        <span class="t-card__av"><?= e($av) ?></span>
                        <div><div class="t-card__name"><?= e($name) ?></div><div class="t-card__role"><?= e($role) ?></div></div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<?php render_footer(); ?>
