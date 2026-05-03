<?php
$errors = flash('errors', []);
$isEdit = is_array($note);
$titleValue = old('title', $note['title'] ?? '');
$bodyValue = old('body', $note['body'] ?? '');
$statusValue = old('status', $note['status'] ?? 'draft');
?>
<section class="hero" style="grid-template-columns:1fr;">
    <div class="card">
        <h1><?= $isEdit ? 'Edit note' : 'Create note' ?></h1>
        <form class="form" method="post" action="<?= e($action) ?>">
            <?= csrf_field() ?>
            <div class="form-row">
                <label for="title">Title</label>
                <input id="title" name="title" value="<?= e($titleValue) ?>" required>
                <?php if (!empty($errors['title'])): ?><span class="error-text"><?= e($errors['title'][0]) ?></span><?php endif; ?>
            </div>
            <div class="form-row">
                <label for="body">Body</label>
                <textarea id="body" name="body" required><?= e($bodyValue) ?></textarea>
                <?php if (!empty($errors['body'])): ?><span class="error-text"><?= e($errors['body'][0]) ?></span><?php endif; ?>
            </div>
            <div class="form-row">
                <label for="status">Status</label>
                <select id="status" name="status">
                    <option value="draft" <?= $statusValue === 'draft' ? 'selected' : '' ?>>Draft</option>
                    <option value="published" <?= $statusValue === 'published' ? 'selected' : '' ?>>Published</option>
                </select>
            </div>
            <div class="actions">
                <button class="btn btn-primary" type="submit"><?= $isEdit ? 'Update note' : 'Create note' ?></button>
                <a class="btn btn-secondary" href="/notes">Cancel</a>
            </div>
        </form>
    </div>
</section>
