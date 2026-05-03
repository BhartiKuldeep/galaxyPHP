<section class="hero" style="grid-template-columns:1fr;">
    <div class="card">
        <h1>Server error</h1>
        <p class="muted"><?= e($message ?? 'Something went wrong.') ?></p>
        <?php if (!empty($trace)): ?><pre><?= e($trace) ?></pre><?php endif; ?>
        <a class="btn btn-primary" href="/">Go home</a>
    </div>
</section>
