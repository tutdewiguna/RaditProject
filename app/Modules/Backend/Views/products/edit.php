<?= $this->extend('Backend\Views\templates\content') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4 pt-3 px-3">
    <div>
        <h1 class="h3 mb-1 fw-bold">Edit Product</h1>
        <p class="text-secondary small mb-0">Update product details and inventory</p>
    </div>
    <div>
        <a href="<?= base_url('admin/products'); ?>" class="btn btn-outline-secondary me-2">Back to List</a>
    </div>
</div>

<div class="px-3">
    <form action="<?= base_url('admin/products/update/' . $product['id']); ?>" method="post"
        enctype="multipart/form-data">
        <div class="row g-4">
            <!-- Left Column: Product Info -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h6 class="mb-0 fw-bold">Product Information</h6>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary">Product Name</label>
                            <input type="text" name="name" class="form-control" value="<?= esc($product['name']); ?>"
                                required>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-secondary">Category</label>
                                <select name="category_id" class="form-select" required>
                                    <?php foreach ($categories as $c): ?>
                                        <option value="<?= $c['id']; ?>" <?= $c['id'] == $product['category_id'] ? 'selected' : '' ?>>
                                            <?= esc($c['name']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-secondary">Price (IDR)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-secondary border-end-0">Rp</span>
                                    <input type="number" name="price" class="form-control border-start-0"
                                        value="<?= esc($product['price']); ?>" required>
                                </div>
                                <div class="form-text small">Stored as integer, displayed with currency format.</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary">Stock Quantity</label>
                            <input type="number" name="stock" class="form-control w-50"
                                value="<?= esc($product['stock']); ?>" required>
                        </div>

                        <div class="mb-0">
                            <label class="form-label small fw-bold text-secondary">Description</label>
                            <textarea name="description" class="form-control"
                                rows="8"><?= esc($product['description']); ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Media & Actions -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white py-3">
                        <h6 class="mb-0 fw-bold">Product Image</h6>
                    </div>
                    <div class="card-body p-4 text-center">
                        <div class="mb-3 rounded bg-light d-flex align-items-center justify-content-center overflow-hidden position-relative"
                            style="height: 250px; width: 100%;">
                            <?php if (!empty($product['image'])): ?>
                                <img src="<?= base_url($product['image']); ?>" alt="Product Image"
                                    class="w-100 h-100 object-fit-contain p-2">
                            <?php else: ?>
                                <div class="text-secondary">
                                    <i class="bi bi-box-seam fs-1 opacity-25"></i>
                                    <p class="small mb-0 mt-2">No image set</p>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mt-3">
                            <label for="prodImageUpload" class="btn btn-outline-primary btn-sm w-100">
                                <i class="bi bi-upload me-1"></i> Replace Image
                            </label>
                            <input type="file" id="prodImageUpload" name="image" class="d-none" accept="image/*"
                                onchange="previewProdImage(this)">
                            <div class="form-text small mt-2">Recommended: Square jpg/png</div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary fw-bold">Update Product</button>
                            <a href="<?= base_url('admin/products'); ?>" class="btn btn-light text-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function previewProdImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var container = input.parentElement.previousElementSibling;
                container.innerHTML = '<img src="' + e.target.result + '" class="w-100 h-100 object-fit-contain p-2">';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<?= $this->endSection() ?>