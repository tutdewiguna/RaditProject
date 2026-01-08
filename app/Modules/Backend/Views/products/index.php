<?= $this->extend('Backend\Views\templates\content') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4 pt-3 px-3">
    <div>
        <h1 class="h3 mb-1 fw-bold">Products</h1>
        <p class="text-secondary small mb-0">Manage your product catalog</p>
    </div>
    <a href="<?= base_url('admin/products/create'); ?>" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Add Product
    </a>
</div>

<div class="px-3">
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">Product</th>
                            <th>Categories</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $p): ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <?php if (!empty($p['image'])): ?>
                                            <img src="<?= base_url($p['image']) ?>" class="rounded bg-light me-3"
                                                style="width: 40px; height: 40px; object-fit: cover;">
                                        <?php else: ?>
                                            <div class="rounded bg-light me-3 d-flex align-items-center justify-content-center text-secondary"
                                                style="width: 40px; height: 40px;">
                                                <i class="bi bi-image"></i>
                                            </div>
                                        <?php endif; ?>
                                        <div>
                                            <div class="fw-bold"><?= esc($p['name']) ?></div>
                                            <div class="small text-secondary">ID: #<?= $p['id'] ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td><span
                                        class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill fw-normal"><?= $p['category_id'] ?></span>
                                </td>
                                <td class="fw-medium"><?= format_rupiah($p['price']) ?></td>
                                <td>
                                    <?php if ($p['stock'] > 10): ?>
                                        <span class="status-badge success">In Stock (<?= $p['stock'] ?>)</span>
                                    <?php elseif ($p['stock'] > 0): ?>
                                        <span class="status-badge warning">Low Stock (<?= $p['stock'] ?>)</span>
                                    <?php else: ?>
                                        <span class="status-badge danger">Out of Stock</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="btn-group">
                                        <a href="<?= base_url('admin/products/edit/' . $p['id']); ?>"
                                            class="btn btn-sm btn-secondary mx-1">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="<?= base_url('admin/products/delete/' . $p['id']); ?>"
                                            class="btn btn-sm btn-danger mx-1"
                                            onclick="return confirm('Delete this product?')">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php if (empty($products)): ?>
                <div class="text-center p-5">
                    <p class="text-secondary">No products found.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>