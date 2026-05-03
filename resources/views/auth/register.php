<section class="hero">
    <div class="card">
        <h1>Create account</h1>
        <p class="muted">Register a new local account.</p>
        <?php $errors = flash('errors', []); ?>
        <form class="form" method="post" action="/register">
            <?= csrf_field() ?>
            <div class="form-row">
                <label for="name">Name</label>
                <input id="name" name="name" value="<?= e(old('name')) ?>" required>
                <?php if (!empty($errors['name'])): ?><span class="error-text"><?= e($errors['name'][0]) ?></span><?php endif; ?>
            </div>
            <div class="form-row">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" value="<?= e(old('email')) ?>" required>
                <?php if (!empty($errors['email'])): ?><span class="error-text"><?= e($errors['email'][0]) ?></span><?php endif; ?>
            </div>
            <div class="form-row">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" required>
                <?php if (!empty($errors['password'])): ?><span class="error-text"><?= e($errors['password'][0]) ?></span><?php endif; ?>
            </div>
            <div class="form-row">
                <label for="password_confirmation">Confirm password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required>
            </div>
            <button class="btn btn-primary" type="submit">Create account</button>
        </form>
    </div>
    <div>
        <span class="badge">For builders</span>
        <h2>Use this as your next PHP base.</h2>
        <p class="muted">Replace the Notes module with your own feature and keep the secure core.</p>
    </div>
</section>
