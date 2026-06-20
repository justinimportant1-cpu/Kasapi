<?php
declare(strict_types=1);
require __DIR__ . '/includes/config.php';

$PROMO = 'https://kasapiapp.com/wp-content/uploads/2026/04/promo.mp4';

render_header([
    'title'       => 'Turn Your Members Into an Active Community',
    'description' => 'Whether you\'re growing an organization, launching a new community, or moving beyond Facebook groups, Kasapi helps you create your own branded mobile app where people connect, participate, and keep coming back.',
    'body_class'  => 'page-home',
]);
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
                <p class="eyebrow" data-hero-rise><span class="eyebrow__dot"></span>Branded community apps</p>
                <h1 class="hero__title">
                    <span class="line"><span>Turn Your</span></span>
                    <span class="line"><span>Members Into an</span></span>
                    <span class="line"><span class="text-grad">Active Community</span></span>
                </h1>
                <p class="hero__lede" data-hero-rise>Whether you're growing an organization, launching a new community, or moving beyond Facebook groups, we help you create your own branded mobile app where people connect, participate, and keep coming back.</p>
                <div class="hero__actions" data-hero-rise>
                    <a class="btn btn--primary btn--lg" href="<?= e($SITE['demo_url']) ?>" data-magnetic>
                        <span>Get Started</span>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
                    </a>
                    <button class="btn btn--ghost btn--lg" data-video="<?= e($PROMO) ?>" data-magnetic>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M8 5v14l11-7z"/></svg>
                        <span>Watch Demo</span>
                    </button>
                </div>
            </div>

            <!-- Floating UI + live phone over the people -->
            <div class="hero__stage" aria-hidden="true">
                <div class="float-card float-card--a" data-depth="34">
                    <span class="ico ico--teal"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg></span>
                    <div><div class="ttl">Event RSVP</div><div class="sub">Summer Mixer · confirmed</div></div>
                </div>
                <div class="float-card float-card--c" data-depth="40">
                    <span class="ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a7 7 0 0 0-4 12.7V17a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v-2.3A7 7 0 0 0 12 2z"/><path d="M9 22h6"/></svg></span>
                    <div><div class="ttl">AI insight</div><div class="sub">3 members to re-engage</div></div>
                </div>

                <div class="phone" data-depth="22" style="position:absolute;bottom:-6%;right:0;width:clamp(190px,15vw,230px);margin:0">
                    <div class="phone__glow"></div>
                    <div class="phone__frame" data-tilt>
                        <div class="phone__notch"></div>
                        <div class="phone__screen">
                            <div class="phone__bar"><span>9:41</span><span>Kasapi</span></div>
                            <div class="phone__app">
                                <div class="phone__hd"><span class="lg">K</span><span class="nm">Community</span></div>
                                <div class="feed" id="heroFeed">
                                    <div class="feed-note"><span class="av" style="background:#8B5CF6">SR</span><span class="tx"><b>Sarah joined</b><span>Women in Tech Alliance</span></span></div>
                                    <div class="feed-note"><span class="av" style="background:#06B6D4">EV</span><span class="tx"><b>RSVP confirmed</b><span>Summer Mixer · tonight</span></span></div>
                                    <div class="feed-note"><span class="av" style="background:#6366F1">GD</span><span class="tx"><b>New discussion</b><span>Mentorship group · 12 replies</span></span></div>
                                    <div class="feed-note"><span class="av" style="background:#14B8A6">AI</span><span class="tx"><b>AI recommendation</b><span>Invite 8 members to Pitch Night</span></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

<!-- ====================== 3 · SLIDING HERO PANELS (pinned) ====================== -->
<section class="panels" data-sec="Story" aria-label="What you can build with Kasapi">
    <div class="panels__viewport">
        <div class="panels__track">
            <article class="panel panel--1">
                <div class="panel__bg"></div>
                <div class="panel__copy">
                    <div class="panel__num">01</div>
                    <h2 data-split>Ready to Launch Your Own Community?</h2>
                    <p class="lede">Build your own branded web and mobile experience for your members—without piecing together multiple tools.</p>
                    <a class="btn btn--primary btn--lg" href="<?= e($SITE['demo_url']) ?>" data-magnetic style="margin-top:24px"><span>Launch Your Community</span>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
                    </a>
                </div>
                <div class="panel__stage">
                    <div class="phone">
                        <div class="phone__glow"></div>
                        <div class="phone__frame" data-tilt>
                            <div class="phone__notch"></div>
                            <div class="phone__screen">
                                <div class="phone__bar"><span>9:41</span><span>Your App</span></div>
                                <div class="phone__app">
                                    <div class="phone__hd"><span class="lg">C</span><span class="nm">Your Community</span></div>
                                    <div class="phone__stat"><div><div class="n">1,560</div><div class="l">Members</div></div><div><div class="n">24</div><div class="l">Groups</div></div></div>
                                    <div class="phone__row"><span class="ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M3 10h18"/></svg></span><span class="bar"><i style="width:78%"></i></span></div>
                                    <div class="phone__row"><span class="ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></span><span class="bar"><i style="width:54%"></i></span></div>
                                    <div class="phone__row"><span class="ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 11a4 4 0 1 0-4-4 4 4 0 0 0 4 4zM4 21v-1a6 6 0 0 1 12 0"/></svg></span><span class="bar"><i style="width:90%"></i></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            <article class="panel panel--2">
                <div class="panel__bg"></div>
                <div class="panel__copy">
                    <div class="panel__num">02</div>
                    <h2 data-split>Launch Your Own Branded Mobile App for Members</h2>
                    <p class="lede">Move beyond Facebook and give your members a dedicated space they actually use between events.</p>
                    <a class="btn btn--primary btn--lg" href="solutions.php#facebook" data-magnetic style="margin-top:24px"><span>Move Beyond Facebook</span>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
                    </a>
                </div>
                <div class="panel__stage">
                    <div class="phone">
                        <div class="phone__glow" style="background:radial-gradient(closest-side,rgba(6,182,212,.5),transparent 72%)"></div>
                        <div class="phone__frame" data-tilt>
                            <div class="phone__notch"></div>
                            <div class="phone__screen">
                                <div class="phone__bar"><span>9:41</span><span>Members</span></div>
                                <div class="phone__app">
                                    <div class="phone__hd"><span class="lg" style="background:linear-gradient(135deg,#14B8A6,#06B6D4)">M</span><span class="nm">Your Members</span></div>
                                    <div class="feed">
                                        <div class="feed-note in"><span class="av" style="background:#06B6D4">JR</span><span class="tx"><b>James posted in Founders</b><span>2 min ago</span></span></div>
                                        <div class="feed-note in"><span class="av" style="background:#8B5CF6">AO</span><span class="tx"><b>Amara checked in</b><span>Networking Brunch</span></span></div>
                                        <div class="feed-note in"><span class="av" style="background:#6366F1">+9</span><span class="tx"><b>9 new members</b><span>this week</span></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- ====================== 4 · EARLY ACCESS BANNER ====================== -->
<section class="section section--tight ea">
    <div class="container">
        <div class="ea__card reveal-blur">
            <span class="ea__badge"><i></i>Limited spots</span>
            <h2>Early Access Now Open</h2>
            <p>We are currently inviting a small number of organizations to preview and help shape the platform before launch.</p>
            <a class="btn btn--lg" href="<?= e($SITE['demo_url']) ?>" data-magnetic><span>Apply for Early Access</span>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- ====================== 5 · BRAND OWNERSHIP ====================== -->
<section class="section section--light" data-sec="Brand" aria-label="Your community, your brand, your app">
    <div class="container own__grid">
        <div class="reveal">
            <p class="eyebrow"><span class="eyebrow__dot"></span>Your community, your brand</p>
            <h2 class="h2" style="margin:16px 0 18px">Your Community. Your Brand. <span class="text-grad">Your App.</span></h2>
            <p class="lede" style="margin-bottom:22px">Launch a fully branded experience your members can access on their phones—bringing membership into their pockets for ease and convenience.</p>
            <ul class="checks">
                <?php foreach (['Your logo and colors','Your own branded mobile app','Your own member experience','Your own structure, groups, and content'] as $c): ?>
                <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><?= e($c) ?></li>
                <?php endforeach; ?>
            </ul>
            <div class="brand-swatches" id="brandSwatches" role="group" aria-label="Preview brand themes">
                <button data-brand="purple" data-name="Riverside Club" data-mono="R" style="background:linear-gradient(135deg,#8B5CF6,#6366F1)" class="is-active" aria-label="Purple theme"></button>
                <button data-brand="teal" data-name="Coastal Coalition" data-mono="C" style="background:linear-gradient(135deg,#14B8A6,#06B6D4)" aria-label="Teal theme"></button>
                <button data-brand="amber" data-name="Founders Guild" data-mono="F" style="background:linear-gradient(135deg,#F59E0B,#EF4444)" aria-label="Amber theme"></button>
                <button data-brand="indigo" data-name="Alumni Network" data-mono="A" style="background:linear-gradient(135deg,#6366F1,#A855F7)" aria-label="Indigo theme"></button>
            </div>
            <p class="own__close">This isn't someone else's platform. <span class="text-grad">It's yours.</span></p>
        </div>

        <div class="reveal-blur" style="display:flex;justify-content:center">
            <div class="phone">
                <div class="phone__glow" id="brandGlow"></div>
                <div class="phone__frame" data-tilt>
                    <div class="phone__notch"></div>
                    <div class="phone__screen" id="brandScreen">
                        <div class="phone__bar"><span>9:41</span><span id="brandBarName">Riverside Club</span></div>
                        <div class="phone__app">
                            <div class="phone__hd"><span class="lg" id="brandLogo">R</span><span class="nm" id="brandName">Riverside Club</span></div>
                            <div class="phone__stat">
                                <div><div class="n">340</div><div class="l">Members</div></div>
                                <div><div class="n">12</div><div class="l">Events</div></div>
                            </div>
                            <div class="phone__row"><span class="ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 11a4 4 0 1 0-4-4 4 4 0 0 0 4 4zM4 21v-1a6 6 0 0 1 12 0"/></svg></span><span class="bar"><i style="width:70%"></i></span></div>
                            <div class="phone__row"><span class="ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M3 10h18"/></svg></span><span class="bar"><i style="width:48%"></i></span></div>
                            <div class="phone__row"><span class="ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></span><span class="bar"><i style="width:86%"></i></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====================== 6 · THREE PATHS (tabs) ====================== -->
<section class="section" data-sec="Grow" aria-label="Three ways to grow">
    <div class="container">
        <div class="sec-head">
            <p class="eyebrow reveal"><span class="eyebrow__dot"></span>One platform, one app</p>
            <h2 class="h2 reveal" data-split>One Platform. One App. Three Ways to Grow.</h2>
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
                        <p class="eyebrow"><span class="eyebrow__dot"></span>For existing organizations</p>
                        <h3>Activate the Members You Already Have</h3>
                        <p>You don't need more members—you need more participation.</p>
                        <ul class="checks">
                            <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>Increase member engagement</li>
                            <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>Create interaction between events</li>
                            <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>Bring everything into one place</li>
                            <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>Build a more active organization</li>
                        </ul>
                    </div>
                    <div class="tabs__panel" data-panel="new" role="tabpanel">
                        <p class="eyebrow"><span class="eyebrow__dot"></span>For new communities</p>
                        <h3>Launch a Community From the Ground Up</h3>
                        <p>Have an idea, audience, or mission? We'll help you launch.</p>
                        <ul class="checks">
                            <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>Web and mobile app</li>
                            <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>Groups, events, messaging</li>
                            <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>Branded to your organization</li>
                            <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>Launch quickly</li>
                        </ul>
                    </div>
                    <div class="tabs__panel" data-panel="facebook" role="tabpanel">
                        <p class="eyebrow"><span class="eyebrow__dot"></span>For Facebook groups</p>
                        <h3>Turn Your Facebook Group Into Your Own Platform</h3>
                        <p>Facebook groups are great for getting started—but eventually they become noisy and limiting.</p>
                        <ul class="checks">
                            <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>Your own brand and app</li>
                            <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>Better organization</li>
                            <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>More engagement</li>
                            <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>No distractions</li>
                        </ul>
                    </div>
                </div>

                <div style="display:flex;justify-content:center">
                    <div class="phone">
                        <div class="phone__glow"></div>
                        <div class="phone__frame" data-tilt>
                            <div class="phone__notch"></div>
                            <div class="phone__screen">
                                <div class="phone__bar"><span>9:41</span><span>Kasapi</span></div>
                                <div class="phone__screens" id="tabPhone">
                                    <!-- existing: engagement dashboard -->
                                    <div class="phone__view is-active" data-view="existing">
                                        <div class="phone__hd"><span class="lg">E</span><span class="nm">Engagement</span></div>
                                        <div class="phone__stat"><div><div class="n">+34%</div><div class="l">Participation</div></div><div><div class="n">88%</div><div class="l">Retention</div></div></div>
                                        <div class="phone__row"><span class="ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 3v18h18M7 14l3-3 3 3 5-6"/></svg></span><span class="bar"><i style="width:74%"></i></span></div>
                                        <div class="phone__row"><span class="ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 3v18h18M7 14l3-3 3 3 5-6"/></svg></span><span class="bar"><i style="width:58%"></i></span></div>
                                    </div>
                                    <!-- new: onboarding flow -->
                                    <div class="phone__view" data-view="new">
                                        <div class="phone__hd"><span class="lg" style="background:linear-gradient(135deg,#6366F1,#A855F7)">N</span><span class="nm">Get started</span></div>
                                        <div class="phone__row"><span class="ic">1</span>Name your community</div>
                                        <div class="phone__row"><span class="ic">2</span>Add your brand</div>
                                        <div class="phone__row"><span class="ic">3</span>Invite members</div>
                                        <div class="phone__row" style="background:rgba(139,92,246,.2)"><span class="ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M20 6L9 17l-5-5"/></svg></span>Launch 🚀</div>
                                    </div>
                                    <!-- facebook: migration -->
                                    <div class="phone__view" data-view="facebook">
                                        <div class="phone__hd"><span class="lg" style="background:linear-gradient(135deg,#14B8A6,#06B6D4)">M</span><span class="nm">Migrate</span></div>
                                        <div class="phone__row"><span class="ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 1l4 4-4 4M3 11V9a4 4 0 0 1 4-4h14M7 23l-4-4 4-4M21 13v2a4 4 0 0 1-4 4H3"/></svg></span><span class="bar"><i style="width:92%"></i></span></div>
                                        <div class="phone__row">Importing members… 4,021</div>
                                        <div class="phone__row" style="background:rgba(6,182,212,.18)">Your space — no distractions</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
        <p class="eyebrow reveal" style="margin-bottom:18px"><span class="eyebrow__dot"></span>The community your members deserve</p>
        <h2 data-split>Build the Community Your Members Deserve</h2>
        <p class="reveal">Whether you want to create more engagement, launch a new community, or move beyond Facebook, we'll help you build a platform your members actually use.</p>
        <a class="btn btn--primary btn--lg reveal" href="<?= e($SITE['demo_url']) ?>" data-magnetic><span>Get Started</span>
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
        </a>
    </div>
</section>

<!-- ====================== 8 · ENGAGEMENT ====================== -->
<section class="section section--light" data-sec="More" aria-label="More than just a member list">
    <div class="container">
        <div class="sec-head">
            <p class="eyebrow reveal"><span class="eyebrow__dot"></span>It's people, not records</p>
            <h2 class="h2 reveal" data-split>More Than Just a Member List</h2>
            <p class="lede reveal" style="margin-inline:auto">Your members do not need another database. They need a place they actually want to open every day.</p>
        </div>
        <div class="engage-grid reveal-stagger">
            <?php
            $acts = [
                ['Meeting each other','M16 11a4 4 0 1 0-4-4 4 4 0 0 0 4 4zM8 13a4 4 0 1 0-4-4 4 4 0 0 0 4 4zM2 21v-1a5 5 0 0 1 5-5M22 21v-1a5 5 0 0 0-5-5'],
                ['Joining groups','M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8z'],
                ['Attending events','M3 4h18v18H3zM3 10h18M8 2v4M16 2v4'],
                ['Sharing ideas','M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z'],
                ['Helping each other','M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8L12 21l8.8-8.6a5.5 5.5 0 0 0 0-7.8z'],
                ['Becoming part of something bigger','M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 4l2.4 5.2L20 13l-4.4 1.8L12 20l-1.6-5.2L6 13z'],
            ];
            foreach ($acts as [$t,$p]): ?>
            <div class="engage-cell">
                <span class="ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="<?= e($p) ?>"/></svg></span>
                <h4><?= e($t) ?></h4>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ====================== 9 · USE CASES (bento) ====================== -->
<section class="section" data-sec="Create" aria-label="What you can create with Kasapi">
    <div class="container">
        <div class="sec-head">
            <p class="eyebrow reveal"><span class="eyebrow__dot"></span>Endless possibilities</p>
            <h2 class="h2 reveal" data-split>What You Can Create With Kasapi</h2>
        </div>
        <div class="bento reveal-stagger">
            <?php
            // [title, reveal, gradient-class, span-class, icon]
            $bento = [
                ['Professional associations','Engage members between events with groups, resources, and AI nudges.','g1','w2 h2','M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8z'],
                ['Business communities','A branded home for networking, referrals, and opportunities.','g2','','M3 7h18v13H3zM8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2'],
                ['Networking groups','Introductions, events, and conversations that compound.','g3','','M16 11a4 4 0 1 0-4-4 4 4 0 0 0 4 4zM4 21v-1a6 6 0 0 1 12 0'],
                ['Nonprofits','Rally supporters, volunteers, and donors in one place.','g4','w2','M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8L12 21l8.8-8.6a5.5 5.5 0 0 0 0-7.8z'],
                ['Faith communities','Strengthen community life with groups, events, and giving.','g1','','M12 2v20M5 9h14M7 22V9'],
                ['Hobby groups','Give enthusiasts a home for events and belonging.','g3','','M12 2a7 7 0 0 0-4 12.7V17a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v-2.3A7 7 0 0 0 12 2z'],
                ['Private paid communities','Memberships, dues, and premium access built in.','g2','','M2 7h20v12H2zM2 11h20M6 15h4'],
                ['Masterminds','High-trust groups with messaging, resources, and events.','g4','','M12 2L2 7l10 5 10-5zM2 17l10 5 10-5M2 12l10 5 10-5'],
            ];
            foreach ($bento as [$t,$r,$g,$span,$p]): ?>
            <div class="bento__item <?= e($g) ?> <?= e($span) ?>">
                <div class="bento__bg"></div>
                <span class="bento__ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="<?= e($p) ?>"/></svg></span>
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
