<?= $this->extend('Backend\Views\templates\content') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4 pt-3 px-3">
    <div>
        <h1 class="h3 mb-1 fw-bold">News & Articles</h1>
        <p class="text-secondary small mb-0">Manage content for the journal</p>
    </div>
    <a href="<?= base_url('admin/news/create'); ?>" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Add News
    </a>
</div>

<div class="px-3">
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Article</th>
                            <th>Published</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($news as $n): ?>
                            <tr>
                                <td class="ps-4 text-secondary">#<?= $n['id']; ?></td>
                                <td>
                                    <div class="d-flex align-items-start">
                                        <div class="rounded bg-light me-3 overflow-hidden"
                                            style="width: 50px; height: 35px;">
                                            <?php if (!empty($n['image'])): ?>
                                                <img src="<?= base_url($n['image']) ?>"
                                                    style="width: 100%; height: 100%; object-fit: cover;">
                                            <?php else: ?>
                                                <div
                                                    class="w-100 h-100 d-flex align-items-center justify-content-center text-secondary bg-secondary-subtle">
                                                    <i class="bi bi-file-text"></i></div>
                                            <?php endif; ?>
                                        </div>
                                        <div>
                                            <div class="fw-bold mb-1"><?= esc($n['title']); ?></div>
                                            <div class="small text-secondary text-truncate" style="max-width: 300px;">
                                                Slug: <?= $n['slug']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><?= date('M d, Y', strtotime($n['created_at'])); ?></td>
                                <td class="text-end pe-4">
                                    <a href="<?= base_url('admin/news/edit/' . $n['id']); ?>"
                                        class="btn btn-sm btn-secondary mx-1"><i class="bi bi-pencil"></i></a>
                                    <a href="<?= base_url('admin/news/delete/' . $n['id']); ?>"
                                        class="btn btn-sm btn-danger mx-1" onclick="return confirm('Delete this news?')"><i
                                            class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($news)): ?>
                            <tr>
                                <td colspan="4" class="text-center p-4 text-secondary">No news content found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>