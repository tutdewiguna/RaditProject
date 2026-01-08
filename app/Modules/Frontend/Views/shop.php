<?= $this->extend('Frontend\Templates\Content') ?>

<?= $this->section('content') ?>

<div class="container section">
    <div class="section-title">
        <?php if (!empty($keyword)): ?>
            <h2>Search Results</h2>
            <p>Showing results for "
                <?= esc($keyword) ?>"
            </p>
        <?php else: ?>
            <h2>Shop</h2>
            <p>Explore our latest collection.</p>
        <?php endif; ?>
    </div>

    <!-- Filter (Visual only for now if no sidebar data variables) -->
    <div class="flex justify-center gap-4 mb-4" style="margin-bottom: 40px;">
        <a href="<?= base_url('shop') ?>" class="btn btn-sm btn-secondary"
            style="border-color: #000; color: #000;">All</a>
        <!-- We could add categories if available in variables, otherwise keep minimal -->
    </div>

    <div class="grid grid-4 gap-4">
        <?php if (!empty($products) && is_array($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="card-product">
                    <a href="<?= base_url('shop/' . $product['slug']); ?>" class="card-img-wrap">
                        <?php $img = !empty($product['image']) ? $product['image'] : 'https://via.placeholder.com/300x400'; ?>
                        <img src="<?= base_url($img); ?>" alt="<?= esc($product['name']); ?>">
                    </a>
                    <div class="card-info">
                        <h3 class="card-title">
                            <a href="<?= base_url('shop/' . $product['slug']); ?>"><?= esc($product['name']); ?></a>
                        </h3>
                        <div class="card-price"><?= format_rupiah($product['price']); ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div style="grid-column: 1 / -1; text-align: center; padding: 40px; color: #666;">
                <p>No products found in this collection.</p>
                <a href="<?= base_url() ?>" class="btn btn-secondary mt-4">Back Home</a>
            </div>
        <?php endif; ?>
    </div>

    <!-- Pagination (Placeholder if needed) -->
    <div class="flex justify-center mt-4" style="margin-top: 60px;">
        <!-- CodeIgniter Pager links would go here if available -->
    </div>
</div>

<?= $this->endSection() ?>