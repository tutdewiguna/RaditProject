<?= $this->extend('Frontend\Templates\Content') ?>

<?= $this->section('content') ?>

<div class="container section">

    <!-- Breadcrumb -->
    <div style="margin-bottom: 24px; font-size: 13px; text-transform: uppercase; color: var(--color-text-secondary);">
        <a href="<?= base_url() ?>">Home</a>
        <span style="margin: 0 8px;">/</span>
        <a href="<?= base_url('shop') ?>">Shop</a>
        <span style="margin: 0 8px;">/</span>
        <span style="color: var(--color-text);"><?= esc($product['name']) ?></span>
    </div>

    <!-- Product Grid -->
    <div class="grid grid-2" style="gap: 40px;">

        <!-- Image Column -->
        <div
            style="background-color: var(--color-bg-alt); padding: 40px; display: flex; align-items: center; justify-content: center;">
            <?php if (!empty($product['image'])): ?>
                <img src="<?= base_url($product['image']) ?>" alt="<?= esc($product['name']) ?>"
                    style="max-height: 600px; width: auto; mix-blend-mode: multiply;">
            <?php else: ?>
                <img src="https://via.placeholder.com/500" alt="<?= esc($product['name']) ?>">
            <?php endif; ?>
        </div>

        <!-- Details Column -->
        <div style="padding-top: 20px;">
            <h1 style="font-size: 2.5rem; margin-bottom: 16px; font-weight: 400;"><?= esc($product['name']) ?></h1>
            <div style="font-size: 1.5rem; margin-bottom: 24px; font-weight: 500;">
                <?= format_rupiah($product['price']) ?>
            </div>

            <div style="margin-bottom: 32px; color: var(--color-text-secondary); line-height: 1.8;">
                <p><?= esc($product['description']) ?></p>
            </div>

            <!-- Alerts -->
            <?php if (session()->has('message')): ?>
                <div
                    style="background: #ecfdf5; color: #065f46; padding: 12px; margin-bottom: 16px; border: 1px solid #a7f3d0; font-size: 14px;">
                    <?= session('message') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->has('error')): ?>
                <div
                    style="background: #fef2f2; color: #991b1b; padding: 12px; margin-bottom: 16px; border: 1px solid #fecaca; font-size: 14px;">
                    <?= session('error') ?>
                </div>
            <?php endif; ?>

            <!-- Add to Cart Form -->
            <form action="<?= base_url('cart/add') ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">

                <div class="form-group" style="width: 100px;">
                    <label for="quantity" class="form-label">Quantity</label>
                    <select class="form-control" name="quantity" id="quantity">
                        <?php for ($i = 1; $i <= min($product['stock'], 10); $i++): ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>

                <div style="margin-top: 24px;">
                    <button type="submit" class="btn btn-primary btn-block" style="max-width: 320px; padding: 16px;">Add
                        to Bag</button>

                    <?php if ($product['stock'] < 5): ?>
                        <p style="margin-top: 12px; font-size: 12px; color: #dc2626;">Only <?= $product['stock'] ?> left in
                            stock</p>
                    <?php endif; ?>
                </div>
            </form>

            <!-- Meta -->
            <div
                style="margin-top: 48px; padding-top: 24px; border-top: 1px solid var(--color-border); font-size: 13px; color: var(--color-text-secondary);">
                <p>SKU: <?= $product['id'] ?></p>
                <p>Category: <?= isset($product['category_slug']) ? ucfirst($product['category_slug']) : 'General' ?>
                </p>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>