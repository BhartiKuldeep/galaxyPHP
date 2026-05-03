<section class="hero">
    <div class="card">
        <h1>Login</h1>
        <p class="muted">Access your GalaxyPHP dashboard.</p>
        <?php $errors = flash('errors', []); ?>
        <form class="form" method="post" action="/login">
            <?= csrf_field() ?>
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
            <button class="btn btn-primary" type="submit">Login</button>
        </form>
    </div>
    <div>
        <h2>Demo credentials</h2>
        <p class="muted">Seed the app, then use:</p>
        <pre>admin@galaxyphp.test
password</pre>
    </div>
</section>
