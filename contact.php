<?php
declare(strict_types=1);
require __DIR__ . '/includes/config.php';

/* ---- Minimal, framework-free form handling ---- */
$sent = false;
$errors = [];
$old = ['name' => '', 'email' => '', 'org' => '', 'message' => ''];

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    foreach (array_keys($old) as $k) {
        $old[$k] = trim((string) ($_POST[$k] ?? ''));
    }
    if ($old['name'] === '')                                  $errors['name']    = 'Please tell us your name.';
    if (!filter_var($old['email'], FILTER_VALIDATE_EMAIL))    $errors['email']   = 'A valid email helps us reply.';
    if (mb_strlen($old['message']) < 10)                      $errors['message'] = 'A little more detail, please.';
    if (!$errors) {
        // In production: persist / email here. For now we acknowledge gracefully.
        $sent = true;
        $old = ['name' => '', 'email' => '', 'org' => '', 'message' => ''];
    }
}

render_header([
    'title'       => 'Contact',
    'description' => 'Talk to the Kasapi team about building a thriving community for your organization. Request a demo or join early access.',
]);
?>
<section class="page-hero">
    <div class="container">
        <p class="eyebrow reveal"><span class="eyebrow__dot"></span>Let's talk</p>
        <h1 class="reveal-blur" data-split>Build the community your members deserve.</h1>
        <p class="lede reveal">Tell us about your organization and we'll show you exactly how Kasapi can bring it to life.</p>
    </div>
</section>

<section class="section section--tight">
    <div class="container split">
        <div class="reveal">
            <h2 class="h2" style="margin-bottom:18px">Request a <span class="text-grad">demo</span>.</h2>
            <p class="lede" style="margin-bottom:26px">We're inviting a small number of organizations to preview and help shape the platform before launch. We'd love to hear from you.</p>
            <ul class="checks">
                <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>A personalized walkthrough</li>
                <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>Guidance for your community type</li>
                <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>Early-access pricing</li>
            </ul>
        </div>

        <div class="card reveal" style="padding:clamp(26px,4vw,40px)">
            <?php if ($sent): ?>
                <div role="status" style="text-align:center;padding:30px 0">
                    <div class="card__ico" style="margin:0 auto 18px"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg></div>
                    <h3 style="margin-bottom:8px">Thank you — message received.</h3>
                    <p class="muted">We'll be in touch shortly. Welcome to the community.</p>
                </div>
            <?php else: ?>
                <form class="form" method="post" action="contact.php#main" novalidate>
                    <div class="field">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="<?= e($old['name']) ?>" required>
                        <?php if (isset($errors['name'])): ?><small style="color:#FCA5A5"><?= e($errors['name']) ?></small><?php endif; ?>
                    </div>
                    <div class="field">
                        <label for="email">Work email</label>
                        <input type="email" id="email" name="email" value="<?= e($old['email']) ?>" required>
                        <?php if (isset($errors['email'])): ?><small style="color:#FCA5A5"><?= e($errors['email']) ?></small><?php endif; ?>
                    </div>
                    <div class="field">
                        <label for="org">Organization</label>
                        <input type="text" id="org" name="org" value="<?= e($old['org']) ?>">
                    </div>
                    <div class="field">
                        <label for="message">How can we help?</label>
                        <textarea id="message" name="message" required><?= e($old['message']) ?></textarea>
                        <?php if (isset($errors['message'])): ?><small style="color:#FCA5A5"><?= e($errors['message']) ?></small><?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn--primary" style="justify-content:center" data-magnetic>
                        <span>Request a Demo</span>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
                    </button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php render_footer(); ?>
