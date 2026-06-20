<?php
declare(strict_types=1);
require __DIR__ . '/includes/config.php';

$PROMO = 'https://kasapiapp.com/wp-content/uploads/2026/04/promo.mp4';

render_header([
    'title'       => 'Launch Your Own Branded Mobile App for Members',
    'description' => 'Move beyond Facebook and give your members a dedicated space they actually use between events. Kasapi is a modern, AI-enabled platform that turns membership lists into thriving communities.',
    'body_class'  => 'page-home',
]);

/* Small inline icons reused on this page */
$PLAY = '<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M8 5v14l11-7z"/></svg>';
?>

<!-- ====================== 1 · HERO ====================== -->
<section class="hero" id="top" data-sec="Home">
    <div class="hero__media">
        <img class="hero__img" data-parallax="0.1"
             src="<?= e(asset('images/hero-community.jpg')) ?>"
             alt="A diverse group of members connecting over a shared meal — a living Kasapi community"
             fetchpriority="high" decoding="async" width="1950" height="1300">
        <div class="hero__scrim"></div>
        <canvas class="hero__net" data-net="dense" aria-hidden="true"></canvas>
    </div>

    <div class="container hero__inner">
        <div class="hero__grid">
            <div class="hero__copy">
                <?= kp_eyebrow('Branded community apps', ['attrs' => ' data-hero-rise']) ?>
                <h1 class="hero__title">
                    <span class="line"><span>Launch Your Own</span></span>
                    <span class="line"><span class="text-grad">Branded Mobile App</span></span>
                    <span class="line"><span>for Members</span></span>
                </h1>
                <p class="hero__lede" data-hero-rise>Move beyond Facebook and give your members a dedicated space they actually use between events — a true home where people connect, participate, and keep coming back.</p>
                <div class="hero__actions" data-hero-rise>
                    <?= kp_btn('Move Beyond Facebook', $SITE['demo_url'], ['lg' => true]) ?>
                    <?= kp_btn('Watch Demo', '#', [
                        'variant' => 'ghost', 'lg' => true, 'tag' => 'button',
                        'arrow' => false, 'icon' => $PLAY, 'attrs' => 'data-video="' . e($PROMO) . '"',
                    ]) ?>
                </div>
                <div class="hero__proof" data-hero-rise>
                    <div class="hero__avatars" aria-hidden="true">
                        <span style="background:linear-gradient(135deg,#8B5CF6,#6366F1)">SR</span>
                        <span style="background:linear-gradient(135deg,#14B8A6,#06B6D4)">JN</span>
                        <span style="background:linear-gradient(135deg,#6366F1,#A855F7)">AO</span>
                        <span style="background:linear-gradient(135deg,#F59E0B,#EF4444)">MK</span>
                    </div>
                    <p>Communities of every kind are already building their home on Kasapi.</p>
                </div>
            </div>

            <!-- Floating UI + live notifications + a supporting (not primary) live phone -->
            <div class="hero__stage" aria-hidden="true">
                <svg class="hero__links" viewBox="0 0 400 460" preserveAspectRatio="none" aria-hidden="true">
                    <defs>
                        <linearGradient id="heroLink" x1="0" y1="0" x2="1" y2="1">
                            <stop offset="0" stop-color="#8B5CF6"/><stop offset="1" stop-color="#06B6D4"/>
                        </linearGradient>
                    </defs>
                    <line class="flow-line" x1="70" y1="60" x2="250" y2="150" stroke="url(#heroLink)" stroke-width="1.4"/>
                    <line class="flow-line" x1="250" y1="150" x2="120" y2="330" stroke="url(#heroLink)" stroke-width="1.4"/>
                    <line class="flow-line" x1="120" y1="330" x2="320" y2="400" stroke="url(#heroLink)" stroke-width="1.4"/>
                </svg>

                <?= kp_float_card([
                    'class' => 'float-card--a', 'depth' => 34, 'tone' => 'teal',
                    'icon'  => kp_icon('M3 4h18v18H3z|M3 10h18|M8 2v4|M16 2v4', 20, 2),
                    'title' => 'Event RSVP', 'sub' => 'Summer Mixer · confirmed',
                ]) ?>
                <?= kp_float_card([
                    'class' => 'float-card--b', 'depth' => 28, 'tone' => 'indigo',
                    'icon'  => kp_icon('M16 11a4 4 0 1 0-4-4 4 4 0 0 0 4 4z|M4 21v-1a6 6 0 0 1 12 0', 20, 2),
                    'title' => 'New member', 'sub' => 'Sarah joined · Women in Tech',
                ]) ?>
                <?= kp_float_card([
                    'class' => 'float-card--c', 'depth' => 40,
                    'icon'  => kp_icon('M12 2a7 7 0 0 0-4 12.7V17a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v-2.3A7 7 0 0 0 12 2z|M9 22h6', 20, 2),
                    'title' => 'AI insight', 'sub' => '3 members to re-engage',
                ]) ?>

                <?php
                $heroFeed = '<div class="phone__app">'
                    . '<div class="phone__hd"><span class="lg">K</span><span class="nm">Community</span></div>'
                    . '<div class="feed" id="heroFeed">'
                    . '<div class="feed-note"><span class="av" style="background:#8B5CF6">SR</span><span class="tx"><b>Sarah joined</b><span>Women in Tech Alliance</span></span></div>'
                    . '<div class="feed-note"><span class="av" style="background:#06B6D4">EV</span><span class="tx"><b>RSVP confirmed</b><span>Summer Mixer · tonight</span></span></div>'
                    . '<div class="feed-note"><span class="av" style="background:#6366F1">GD</span><span class="tx"><b>New discussion</b><span>Mentorship group · 12 replies</span></span></div>'
                    . '<div class="feed-note"><span class="av" style="background:#14B8A6">AI</span><span class="tx"><b>AI recommendation</b><span>Invite 8 members to Pitch Night</span></span></div>'
                    . '</div></div>';
                echo kp_phone($heroFeed, ['class' => 'phone--hero', 'depth' => 22, 'bar' => 'Kasapi']);
                ?>
            </div>
        </div>
    </div>

    <a class="hero__cue" href="#tagline">Scroll
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 5v14"/><path d="M19 12l-7 7-7-7"/></svg>
    </a>
</section>

<!-- ====================== 2 · TAGLINE BAR ====================== -->
<section class="tagline-bar" id="tagline" aria-label="What Kasapi is">
    <canvas class="tagline-bar__net" data-net aria-hidden="true"></canvas>
    <p class="tagline-bar__text">Kasapi is a modern, AI-enabled platform that increases member engagement between events.</p>
</section>

<!-- ====================== 3 · STORY (traveling floating phone) ====================== -->
<section class="story" id="inside" data-sec="Inside" aria-label="Everything your community needs, in one app">
    <div class="container story__inner">
        <div class="story__steps">
            <div class="story__head">
                <?= kp_eyebrow('One app, the whole experience', ['class' => 'reveal']) ?>
                <h2 class="h2 reveal" data-split>Everything Your Community Needs, In One App</h2>
                <p class="lede reveal">Not another database to maintain — a place your members actually want to open every day. Scroll to see it come alive.</p>
            </div>

            <article class="story__step is-active" data-step="events" data-bar="Events"
                     data-note-title="Event RSVP" data-note-sub="Summer Mixer · 48 going" data-tone="teal">
                <span class="story__step-n">01</span>
                <span class="story__step-ico"><?= kp_icon('M3 4h18v18H3z|M3 10h18|M8 2v4|M16 2v4', 24, 2) ?></span>
                <h3>Events people show up for</h3>
                <p>Publish events, sell tickets, take RSVPs and check members in — all from the app they already have in their pocket.</p>
            </article>

            <article class="story__step" data-step="groups" data-bar="Groups"
                     data-note-title="Group activity" data-note-sub="Mentorship · 12 new replies" data-tone="indigo">
                <span class="story__step-n">02</span>
                <span class="story__step-ico"><?= kp_icon('M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2|M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8z', 24, 2) ?></span>
                <h3>Groups that spark belonging</h3>
                <p>Give every interest, chapter and cohort its own space — so conversations keep going long after the event ends.</p>
            </article>

            <article class="story__step" data-step="messaging" data-bar="Messages"
                     data-note-title="New message" data-note-sub="James: see you Thursday!" data-tone="purple">
                <span class="story__step-n">03</span>
                <span class="story__step-ico"><?= kp_icon('M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z', 24, 2) ?></span>
                <h3>Real conversations, in-app</h3>
                <p>Direct messages and group chat keep members connected to each other — not scattered across inboxes and feeds.</p>
            </article>

            <article class="story__step" data-step="activity" data-bar="Activity"
                     data-note-title="New member" data-note-sub="Sarah joined · Women in Tech" data-tone="teal">
                <span class="story__step-n">04</span>
                <span class="story__step-ico"><?= kp_icon('M22 12h-4l-3 9L9 3l-3 9H2', 24, 2) ?></span>
                <h3>A pulse you can feel</h3>
                <p>A living activity feed surfaces who joined, who's going, and what's happening — momentum your members can see.</p>
            </article>

            <article class="story__step" data-step="ai" data-bar="AI Insights"
                     data-note-title="AI insight" data-note-sub="Invite 8 to Pitch Night" data-tone="indigo">
                <span class="story__step-n">05</span>
                <span class="story__step-ico"><?= kp_icon('M12 2a7 7 0 0 0-4 12.7V17a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v-2.3A7 7 0 0 0 12 2z|M9 22h6', 24, 2) ?></span>
                <h3>Intelligence woven throughout</h3>
                <p>AI spots members slipping away, suggests who to invite, and tells you what's working — so you lead with insight, not guesswork.</p>
            </article>
        </div>

        <aside class="story__device" aria-hidden="true">
            <div class="story__sticky">
                <?= kp_float_card([
                    'class' => 'story__note', 'tone' => 'teal',
                    'icon'  => kp_icon('M12 2a7 7 0 0 0 0 14|M12 22v-6', 18, 2),
                    'title' => 'Event RSVP', 'sub' => 'Summer Mixer · 48 going',
                ]) ?>
                <?php
                $storyScreens = '<div class="phone__screens" id="storyPhone">'

                . '<div class="phone__view is-active" data-view="events">'
                . '<div class="phone__hd"><span class="lg">E</span><span class="nm">Upcoming Events</span></div>'
                . '<div class="feed">'
                . '<div class="feed-note in"><span class="av" style="background:#14B8A6">12</span><span class="tx"><b>Summer Mixer</b><span>Thu · 6:00 PM · 48 going</span></span></div>'
                . '<div class="feed-note in"><span class="av" style="background:#8B5CF6">18</span><span class="tx"><b>Founders Roundtable</b><span>Mon · RSVP open</span></span></div>'
                . '<div class="feed-note in"><span class="av" style="background:#6366F1">24</span><span class="tx"><b>Pitch Night</b><span>Wed · 12 spots left</span></span></div>'
                . '</div>'
                . '<div class="phone__row phone__row--cta"><span class="ic">' . kp_icon('M12 5v14|M5 12h14', 14, 2.4) . '</span>Create an event</div>'
                . '</div>'

                . '<div class="phone__view" data-view="groups">'
                . '<div class="phone__hd"><span class="lg" style="background:linear-gradient(135deg,#6366F1,#A855F7)">G</span><span class="nm">Your Groups</span></div>'
                . '<div class="feed">'
                . '<div class="feed-note in"><span class="av" style="background:#8B5CF6">WT</span><span class="tx"><b>Women in Tech</b><span>1,240 members · active now</span></span></div>'
                . '<div class="feed-note in"><span class="av" style="background:#14B8A6">MN</span><span class="tx"><b>Mentorship Circle</b><span>12 new replies</span></span></div>'
                . '<div class="feed-note in"><span class="av" style="background:#6366F1">FG</span><span class="tx"><b>Founders Guild</b><span>+9 members this week</span></span></div>'
                . '</div></div>'

                . '<div class="phone__view" data-view="messaging">'
                . '<div class="phone__hd"><span class="lg" style="background:linear-gradient(135deg,#8B5CF6,#06B6D4)">M</span><span class="nm">Messages</span></div>'
                . '<div class="chat">'
                . '<div class="chat__b chat__b--in">Welcome to the community! 🎉</div>'
                . '<div class="chat__b chat__b--out">Thanks — so glad to be here</div>'
                . '<div class="chat__b chat__b--in">Don\'t miss the mixer Thursday 👀</div>'
                . '<div class="chat__b chat__b--out">Already RSVP\'d ✅</div>'
                . '</div></div>'

                . '<div class="phone__view" data-view="activity">'
                . '<div class="phone__hd"><span class="lg" style="background:linear-gradient(135deg,#14B8A6,#06B6D4)">A</span><span class="nm">Activity</span></div>'
                . '<div class="feed">'
                . '<div class="feed-note in"><span class="av" style="background:#8B5CF6">SR</span><span class="tx"><b>Sarah joined</b><span>Women in Tech Alliance</span></span></div>'
                . '<div class="feed-note in"><span class="av" style="background:#06B6D4">EV</span><span class="tx"><b>RSVP confirmed</b><span>Summer Mixer · tonight</span></span></div>'
                . '<div class="feed-note in"><span class="av" style="background:#6366F1">GD</span><span class="tx"><b>New discussion</b><span>Mentorship · 12 replies</span></span></div>'
                . '</div></div>'

                . '<div class="phone__view" data-view="ai">'
                . '<div class="phone__hd"><span class="lg">AI</span><span class="nm">AI Insights</span></div>'
                . '<div class="feed">'
                . '<div class="feed-note in"><span class="av" style="background:#8B5CF6">↻</span><span class="tx"><b>3 members to re-engage</b><span>Haven\'t opened in 21 days</span></span></div>'
                . '<div class="feed-note in"><span class="av" style="background:#06B6D4">+</span><span class="tx"><b>Invite 8 to Pitch Night</b><span>High match · likely to attend</span></span></div>'
                . '</div>'
                . '<div class="phone__row"><span class="ic">' . kp_icon('M3 3v18h18|M7 14l3-3 3 3 5-6', 14, 2) . '</span><span class="bar"><i style="width:88%"></i></span></div>'
                . '<div class="phone__row" style="background:rgba(20,184,166,.18)">Engagement up 34% this month</div>'
                . '</div>'

                . '</div>';
                echo kp_phone($storyScreens, [
                    'class' => 'phone--travel', 'screen_id' => 'storyScreen',
                    'bar' => 'Events', 'bar_id' => 'storyBar',
                ]);
                ?>
                <div class="story__rail" aria-hidden="true"><span id="storyRail"></span></div>
            </div>
        </aside>
    </div>
</section>

<!-- ====================== 4 · EARLY ACCESS BANNER ====================== -->
<section class="section section--tight ea">
    <div class="container">
        <div class="ea__card reveal-blur">
            <span class="ea__badge"><i></i>Limited spots</span>
            <h2>Early Access Now Open</h2>
            <p>We are currently inviting a small number of organizations to preview and help shape the platform before launch.</p>
            <?= kp_btn('Apply for Early Access', $SITE['demo_url'], ['lg' => true, 'class' => 'btn--light']) ?>
        </div>
    </div>
</section>

<!-- ====================== 5 · BRAND OWNERSHIP ====================== -->
<section class="section" data-sec="Brand" aria-label="Your community, your brand, your app">
    <div class="container own__grid">
        <div class="reveal">
            <?= kp_eyebrow('Your community, your brand') ?>
            <h2 class="h2" style="margin:16px 0 18px">Your Community. Your Brand. <span class="text-grad">Your App.</span></h2>
            <p class="lede" style="margin-bottom:22px">Launch a fully branded experience your members can access on their phones — bringing membership into their pockets for ease and convenience.</p>
            <?= kp_checks(['Your logo and colors', 'Your own branded mobile app', 'Your own member experience', 'Your own structure, groups, and content']) ?>
            <div class="brand-swatches" id="brandSwatches" role="group" aria-label="Preview brand themes">
                <button data-brand="purple" data-name="Riverside Club" data-mono="R" style="background:linear-gradient(135deg,#8B5CF6,#6366F1)" class="is-active" aria-label="Purple theme"></button>
                <button data-brand="teal" data-name="Coastal Coalition" data-mono="C" style="background:linear-gradient(135deg,#14B8A6,#06B6D4)" aria-label="Teal theme"></button>
                <button data-brand="amber" data-name="Founders Guild" data-mono="F" style="background:linear-gradient(135deg,#F59E0B,#EF4444)" aria-label="Amber theme"></button>
                <button data-brand="indigo" data-name="Alumni Network" data-mono="A" style="background:linear-gradient(135deg,#6366F1,#A855F7)" aria-label="Indigo theme"></button>
            </div>
            <p class="own__close">This isn't someone else's platform. <span class="text-grad">It's yours.</span></p>
        </div>

        <div class="reveal-blur" style="display:flex;justify-content:center">
            <?php
            $brandScreen = '<div class="phone__app">'
                . '<div class="phone__hd"><span class="lg" id="brandLogo">R</span><span class="nm" id="brandName">Riverside Club</span></div>'
                . '<div class="phone__stat"><div><div class="n">340</div><div class="l">Members</div></div><div><div class="n">12</div><div class="l">Events</div></div></div>'
                . '<div class="phone__row"><span class="ic">' . kp_icon('M16 11a4 4 0 1 0-4-4 4 4 0 0 0 4 4z|M4 21v-1a6 6 0 0 1 12 0', 14, 2) . '</span><span class="bar"><i style="width:70%"></i></span></div>'
                . '<div class="phone__row"><span class="ic">' . kp_icon('M3 4h18v18H3z|M3 10h18', 14, 2) . '</span><span class="bar"><i style="width:48%"></i></span></div>'
                . '<div class="phone__row"><span class="ic">' . kp_icon('M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z', 14, 2) . '</span><span class="bar"><i style="width:86%"></i></span></div>'
                . '</div>';
            echo kp_phone($brandScreen, ['screen_id' => 'brandScreen', 'glow_id' => 'brandGlow', 'bar' => 'Riverside Club', 'bar_id' => 'brandBarName']);
            ?>
        </div>
    </div>
</section>

<!-- ====================== 6 · THREE PATHS (tabs) ====================== -->
<section class="section section--light" data-sec="Grow" aria-label="Three ways to grow">
    <div class="container">
        <div class="sec-head">
            <?= kp_eyebrow('One platform, one app', ['class' => 'reveal']) ?>
            <h2 class="h2 reveal" data-split>One Platform. One App. Three Ways to Grow.</h2>
            <p class="lede reveal" style="margin-inline:auto">Every organization is different. Some already have members but struggle to keep them engaged. Others are ready to launch a brand new community. And many have built an audience inside Facebook groups and are ready for something more professional, more organized, and fully their own. No matter where you are, we help you create a true member experience.</p>
        </div>

        <div class="tabs" id="growTabs">
            <div class="tabs__nav" role="tablist" aria-label="Ways to grow">
                <button class="tabs__btn is-active" role="tab" aria-selected="true" data-tab="existing">Existing Organizations</button>
                <button class="tabs__btn" role="tab" aria-selected="false" data-tab="new">New Communities</button>
                <button class="tabs__btn" role="tab" aria-selected="false" data-tab="facebook">Facebook Groups</button>
            </div>

            <div class="tabs__stage">
                <div class="tabs__panels">
                    <div class="tabs__panel is-active" data-panel="existing" role="tabpanel">
                        <?= kp_eyebrow('For existing organizations') ?>
                        <h3>Activate the Members You Already Have</h3>
                        <p>You don't need more members — you need more participation.</p>
                        <?= kp_checks(['Increase member engagement', 'Create interaction between events', 'Bring everything into one place', 'Build a more active organization']) ?>
                    </div>
                    <div class="tabs__panel" data-panel="new" role="tabpanel">
                        <?= kp_eyebrow('For new communities') ?>
                        <h3>Launch a Community From the Ground Up</h3>
                        <p>Have an idea, audience, or mission? We'll help you launch.</p>
                        <?= kp_checks(['Web and mobile app', 'Groups, events, messaging', 'Branded to your organization', 'Launch quickly']) ?>
                    </div>
                    <div class="tabs__panel" data-panel="facebook" role="tabpanel">
                        <?= kp_eyebrow('For Facebook groups') ?>
                        <h3>Turn Your Facebook Group Into Your Own Platform</h3>
                        <p>Facebook groups are great for getting started — but eventually they become noisy and limiting.</p>
                        <?= kp_checks(['Your own brand and app', 'Better organization', 'More engagement', 'No distractions']) ?>
                    </div>
                </div>

                <div style="display:flex;justify-content:center">
                    <?php
                    $tabScreens = '<div class="phone__screens" id="tabPhone">'
                        . '<div class="phone__view is-active" data-view="existing">'
                        . '<div class="phone__hd"><span class="lg">E</span><span class="nm">Engagement</span></div>'
                        . '<div class="phone__stat"><div><div class="n">+34%</div><div class="l">Participation</div></div><div><div class="n">88%</div><div class="l">Retention</div></div></div>'
                        . '<div class="phone__row"><span class="ic">' . kp_icon('M3 3v18h18|M7 14l3-3 3 3 5-6', 14, 2) . '</span><span class="bar"><i style="width:74%"></i></span></div>'
                        . '<div class="phone__row"><span class="ic">' . kp_icon('M3 3v18h18|M7 14l3-3 3 3 5-6', 14, 2) . '</span><span class="bar"><i style="width:58%"></i></span></div>'
                        . '</div>'
                        . '<div class="phone__view" data-view="new">'
                        . '<div class="phone__hd"><span class="lg" style="background:linear-gradient(135deg,#6366F1,#A855F7)">N</span><span class="nm">Get started</span></div>'
                        . '<div class="phone__row"><span class="ic">1</span>Name your community</div>'
                        . '<div class="phone__row"><span class="ic">2</span>Add your brand</div>'
                        . '<div class="phone__row"><span class="ic">3</span>Invite members</div>'
                        . '<div class="phone__row phone__row--cta"><span class="ic">' . kp_icon('M20 6L9 17l-5-5', 14, 2.4) . '</span>Launch 🚀</div>'
                        . '</div>'
                        . '<div class="phone__view" data-view="facebook">'
                        . '<div class="phone__hd"><span class="lg" style="background:linear-gradient(135deg,#14B8A6,#06B6D4)">M</span><span class="nm">Migrate</span></div>'
                        . '<div class="phone__row"><span class="ic">' . kp_icon('M17 1l4 4-4 4|M3 11V9a4 4 0 0 1 4-4h14|M7 23l-4-4 4-4|M21 13v2a4 4 0 0 1-4 4H3', 14, 2) . '</span><span class="bar"><i style="width:92%"></i></span></div>'
                        . '<div class="phone__row">Importing members… 4,021</div>'
                        . '<div class="phone__row" style="background:rgba(6,182,212,.18)">Your space — no distractions</div>'
                        . '</div>'
                        . '</div>';
                    echo kp_phone($tabScreens, ['bar' => 'Kasapi']);
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====================== 7 · MID-PAGE CTA ====================== -->
<section class="mid-cta" data-sec="Build">
    <canvas class="mid-cta__net" data-net="dense" aria-hidden="true"></canvas>
    <div class="mid-cta__glow"></div>
    <div class="container mid-cta__inner">
        <?= kp_eyebrow('The community your members deserve', ['class' => 'reveal', 'attrs' => ' style="margin-bottom:18px"']) ?>
        <h2 data-split>Build the Community Your Members Deserve</h2>
        <p class="reveal">Whether you want to create more engagement, launch a new community, or move beyond Facebook, we'll help you build a platform your members actually use.</p>
        <div class="reveal" style="display:flex;justify-content:center">
            <?= kp_btn('Get Started', $SITE['demo_url'], ['lg' => true]) ?>
        </div>
    </div>
</section>

<!-- ====================== 8 · ENGAGEMENT ====================== -->
<section class="section section--light" data-sec="More" aria-label="More than just a member list">
    <div class="container">
        <div class="sec-head">
            <?= kp_eyebrow("It's people, not records", ['class' => 'reveal']) ?>
            <h2 class="h2 reveal" data-split>More Than Just a Member List</h2>
            <p class="lede reveal" style="margin-inline:auto">Your members do not need another database. They need a place they actually want to open every day. It's people:</p>
        </div>
        <div class="engage-grid reveal-stagger">
            <?php
            $acts = [
                ['Meeting each other','M16 11a4 4 0 1 0-4-4 4 4 0 0 0 4 4z|M8 13a4 4 0 1 0-4-4 4 4 0 0 0 4 4z|M2 21v-1a5 5 0 0 1 5-5|M22 21v-1a5 5 0 0 0-5-5'],
                ['Joining groups','M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2|M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8z'],
                ['Attending events','M3 4h18v18H3z|M3 10h18|M8 2v4|M16 2v4'],
                ['Sharing ideas','M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z'],
                ['Helping each other','M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8L12 21l8.8-8.6a5.5 5.5 0 0 0 0-7.8z'],
                ['Becoming part of something bigger','M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2z|M12 6l2.4 5.2L20 13l-4.4 1.8L12 20l-1.6-5.2L6 13z'],
            ];
            foreach ($acts as [$t,$p]): ?>
            <div class="engage-cell">
                <span class="ic"><?= kp_icon($p, 22, 1.9) ?></span>
                <h4><?= e($t) ?></h4>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ====================== 9 · USE CASES (bento) ====================== -->
<section class="section section--light" data-sec="Create" aria-label="What you can create with Kasapi">
    <div class="container">
        <div class="sec-head">
            <?= kp_eyebrow('Endless possibilities', ['class' => 'reveal']) ?>
            <h2 class="h2 reveal" data-split>What You Can Create With Kasapi</h2>
        </div>
        <div class="bento reveal-stagger">
            <?php
            // [title, reveal, gradient-class, span-class, icon]
            $bento = [
                ['Professional associations','Engage members between events with groups, resources, and AI nudges.','g1','w2 h2','M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2|M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8z'],
                ['Business communities','A branded home for networking, referrals, and opportunities.','g2','','M3 7h18v13H3z|M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2'],
                ['Networking groups','Introductions, events, and conversations that compound.','g3','','M16 11a4 4 0 1 0-4-4 4 4 0 0 0 4 4z|M4 21v-1a6 6 0 0 1 12 0'],
                ['Nonprofits or member organizations','Rally supporters, volunteers, and donors in one place.','g4','w2','M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8L12 21l8.8-8.6a5.5 5.5 0 0 0 0-7.8z'],
                ['Faith-based organizations','Strengthen community life with groups, events, and giving.','g1','','M12 2v20|M5 9h14|M7 22V9'],
                ['Hobby and interest groups','Give enthusiasts a home for events and belonging.','g3','','M12 2a7 7 0 0 0-4 12.7V17a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v-2.3A7 7 0 0 0 12 2z'],
                ['Private paid communities','Memberships, dues, and premium access built in.','g2','','M2 7h20v12H2z|M2 11h20|M6 15h4'],
                ['Masterminds or premium groups','High-trust groups with messaging, resources, and events.','g4','','M12 2L2 7l10 5 10-5z|M2 17l10 5 10-5|M2 12l10 5 10-5'],
            ];
            foreach ($bento as [$t,$r,$g,$span,$p]): ?>
            <div class="bento__item <?= e($g) ?> <?= e($span) ?>">
                <div class="bento__bg"></div>
                <span class="bento__ic"><?= kp_icon($p, 20, 1.9) ?></span>
                <span class="bento__t"><?= e($t) ?></span>
                <p class="bento__reveal"><?= e($r) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Watch Demo modal -->
<div class="modal" id="videoModal" aria-hidden="true" role="dialog" aria-modal="true" aria-label="Kasapi demo video">
    <div class="modal__box">
        <button class="modal__close" id="modalClose" aria-label="Close video">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><path d="M18 6L6 18M6 6l12 12"/></svg>
        </button>
        <video id="modalVideo" controls playsinline preload="none">
            <source src="<?= e($PROMO) ?>" type="video/mp4">
        </video>
    </div>
</div>

<?php render_footer(); ?>
