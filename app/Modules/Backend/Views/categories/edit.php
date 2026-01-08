<?= $this->extend('Backend\Views\templates\content') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4 pt-3 px-3">
    <div>
        <h1 class="h3 mb-1 fw-bold">Edit Category</h1>
        <p class="text-secondary small mb-0">Manage product category details</p>
    </div>
    <a href="<?= base_url('admin/categories'); ?>" class="btn btn-outline-secondary">Back to List</a>
</div>

<div class="container-fluid px-3">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <form action="<?= base_url('admin/categories/update/' . $category['id']); ?>" method="post">

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary">Category Name</label>
                            <input type="text" name="name" class="form-control" value="<?= esc($category['name']); ?>"
                                required placeholder="e.g. Men's Wear">
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold text-secondary">Slug</label>
                            <input type="text" name="slug" class="form-control bg-light"
                                value="<?= esc($category['slug']); ?>" required>
                            <div class="form-text small">Used in URL (e.g. /shop/mens-wear)</div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary fw-bold">Update Category</button>
                            <a href="<?= base_url('admin/categories'); ?>"
                                class="btn btn-light text-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>