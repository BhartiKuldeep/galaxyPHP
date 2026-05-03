<?php use Galaxy\Core\Auth; ?>
<nav class="nav">
    <div class="container nav-inner">
        <a class="logo" href="/">
            <span class="logo-mark">✦</span>
            <span><?= e(config('app.name')) ?></span>
        </a>
        <div class="nav-links">
            <a href="/">Home</a>
            <?php if (Auth::check()): ?>
                <a href="/dashboard">Dashboard</a>
                <a href="/notes">Notes</a>
                <form method="post" action="/logout" style="display:inline">
                    <?= csrf_field() ?>
                    <button class="link-button" type="submit">Logout</button>
                </form>
            <?php else: ?>
                <a href="/login">Login</a>
                <a href="/register">Register</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
