<section class="hero" style="grid-template-columns:1fr; padding-bottom:1rem;">
    <div>
        <span class="badge">Notes CRUD</span>
        <h1>My notes</h1>
        <p class="muted">Create, update, publish, and delete notes from your protected workspace.</p>
        <a class="btn btn-primary" href="/notes/create">New note</a>
    </div>
</section>

<?php if ($notes === []): ?>
    <div class="card"><p class="muted">No notes yet.</p></div>
<?php else: ?>
    <section class="grid grid-2">
        <?php foreach ($notes as $note): ?>
            <article class="card note-card">
                <div class="note-meta">
                    <span class="badge"><?= e($note['status']) ?></span>
                    <span class="small muted"><?= e($note['updated_at']) ?></span>
                </div>
                <h3><?= e($note['title']) ?></h3>
                <p class="muted"><?= e(strlen((string) $note['body']) > 180 ? substr((string) $note['body'], 0, 180) . '...' : (string) $note['body']) ?></p>
                <div class="actions">
                    <a class="btn btn-secondary" href="/notes/<?= e($note['id']) ?>/edit">Edit</a>
                    <form method="post" action="/notes/<?= e($note['id']) ?>/delete">
                        <?= csrf_field() ?>
                        <button class="btn btn-danger" type="submit" data-confirm="Delete this note?">Delete</button>
                    </form>
                </div>
            </article>
        <?php endforeach; ?>
    </section>
<?php endif; ?>
