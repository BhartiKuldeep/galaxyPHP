<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e(($title ?? 'App') . ' | ' . config('app.name')) ?></title>
    <link rel="stylesheet" href="/assets/css/app.css">
</head>
<body>
    <?php require base_path('resources/views/partials/nav.php'); ?>

    <main class="container">
        <?php require base_path('resources/views/partials/flash.php'); ?>
        <?= $slot ?>
    </main>

    <footer class="footer container">
        Built with <?= e(config('app.name')) ?> v2 by Bharti Kuldeep.
    </footer>

    <script src="/assets/js/app.js"></script>
</body>
</html>
