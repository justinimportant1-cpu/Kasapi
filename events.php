<?php
declare(strict_types=1);
require __DIR__ . '/includes/config.php';
render_header([
    'title'       => 'Events',
    'description' => 'Create, sell, and run events with ticketing, RSVPs, check-ins, and live participation metrics — all inside your branded community.',
]);
?>
<section class="page-hero">
    <div class="container">
        <p class="eyebrow reveal"><span class="eyebrow__dot"></span>Events &amp; ticketing</p>
        <h1 class="reveal-blur" data-split>Events that fill rooms and build belonging.</h1>
        <p class="lede reveal">From a casual mixer to your annual summit — create, sell, RSVP, check in, and watch participation happen in real time.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="events__grid">
            <div class="timeline reveal-stagger">
                <div class="tl-item"><div class="t">09:42</div><h4>Sarah purchased 2 tickets</h4><p>Summer Mixer · VIP table</p></div>
                <div class="tl-item"><div class="t">09:44</div><h4>14 new RSVPs</h4><p>Capacity now 78% full</p></div>
                <div class="tl-item"><div class="t">09:51</div><h4>Marcus checked in</h4><p>First-time attendee · welcomed</p></div>
                <div class="tl-item"><div class="t">10:03</div><h4>AI nudge sent</h4><p>22 members reminded — 9 RSVP'd</p></div>
                <div class="tl-item"><div class="t">10:18</div><h4>Waitlist opened</h4><p>Event sold out — 31 on waitlist</p></div>
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

<section class="section section--tight">
    <div class="container">
        <div class="grid grid--3 reveal-stagger">
            <?php
            $cards = [
                ['Ticketing & payments','Sell paid or free tickets, tiers, and add-ons with payments built in.','M2 7h20v12H2zM2 11h20M6 15h4'],
                ['RSVPs & waitlists','Track confirmations, manage capacity, and open waitlists automatically.','M9 11l3 3L22 4M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11'],
                ['Check-in & insights','Fast on-site check-in plus live participation metrics afterward.','M3 3v18h18M7 14l3-3 3 3 5-6'],
            ];
            foreach ($cards as [$t,$d,$p]): ?>
            <article class="card" data-tilt>
                <div class="card__ico"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="<?= e($p) ?>"/></svg></div>
                <h3><?= e($t) ?></h3>
                <p><?= e($d) ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php render_footer(); ?>
