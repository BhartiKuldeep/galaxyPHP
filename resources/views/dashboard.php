<section class="hero" style="grid-template-columns:1fr; padding-bottom:1rem;">
    <div>
        <span class="badge">Welcome, <?= e($user['name'] ?? 'Builder') ?></span>
        <h1>Your dashboard</h1>
        <p class="muted">This page is protected by auth middleware and powered by repositories.</p>
        <div class="actions">
            <a class="btn btn-primary" href="/notes/create">Create note</a>
            <a class="btn btn-secondary" href="/notes">View all notes</a>
        </div>
    </div>
</section>

<section class="grid grid-3">
    <div class="card"><h3>Total notes</h3><p style="font-size:2rem;margin:.25rem 0;"><?= e($stats['total']) ?></p></div>
    <div class="card"><h3>Published</h3><p style="font-size:2rem;margin:.25rem 0;"><?= e($stats['published']) ?></p></div>
    <div class="card"><h3>Drafts</h3><p style="font-size:2rem;margin:.25rem 0;"><?= e($stats['drafts']) ?></p></div>
</section>

<section class="card" style="margin-top:1rem;">
    <h2>Recent notes</h2>
    <?php if ($recentNotes === []): ?>
        <p class="muted">No notes yet. Create your first note.</p>
    <?php else: ?>
        <table class="table">
            <thead><tr><th>Title</th><th>Status</th><th>Updated</th></tr></thead>
            <tbody>
            <?php foreach ($recentNotes as $note): ?>
                <tr>
                    <td><a href="/notes/<?= e($note['id']) ?>/edit"><?= e($note['title']) ?></a></td>
                    <td><?= e($note['status']) ?></td>
                    <td><?= e($note['updated_at']) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</section>
