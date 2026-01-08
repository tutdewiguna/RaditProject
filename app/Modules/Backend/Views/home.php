<?= $this->extend('Backend\Views\templates\content') ?>

<?php
$name = session()->get('name');
?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4 pt-3 px-3">
    <div>
        <h1 class="h3 mb-1 fw-bold">Dashboard</h1>
        <p class="text-secondary small mb-0">Overview of your store performance</p>
    </div>
    <div>
        <span class="text-secondary small me-2"><?= date('l, d F Y') ?></span>
    </div>
</div>

<div class="px-3">
    <!-- Welcome Card -->
    <div class="card bg-white border-0 shadow-sm mb-4">
        <div class="card-body d-flex align-items-center p-4">
            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center me-3"
                style="width: 50px; height: 50px;">
                <i class="bi bi-person fs-3 text-secondary"></i>
            </div>
            <div>
                <h4 class="mb-1">Welcome back, <?= esc($name) ?>!</h4>
                <p class="text-secondary mb-0 small">Here's what's happening in your store today.</p>
            </div>
        </div>
    </div>

    <!-- Stats Grid (Placeholders as explicitly requested not to change controller logic) -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="rounded bg-primary-subtle p-2 me-2">
                            <i class="bi bi-bag-check text-primary"></i>
                        </div>
                        <span class="text-secondary small fw-bold">TOTAL ORDERS</span>
                    </div>
                    <h3 class="mb-0 fw-bold">1,254</h3>
                    <small class="text-success"><i class="bi bi-arrow-up"></i> +12% this month</small>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="rounded bg-success-subtle p-2 me-2">
                            <i class="bi bi-currency-dollar text-success"></i>
                        </div>
                        <span class="text-secondary small fw-bold">REVENUE</span>
                    </div>
                    <h3 class="mb-0 fw-bold">Rp 45.2M</h3>
                    <small class="text-success"><i class="bi bi-arrow-up"></i> +5% this month</small>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="rounded bg-warning-subtle p-2 me-2">
                            <i class="bi bi-box-seam text-warning"></i>
                        </div>
                        <span class="text-secondary small fw-bold">low stock</span>
                    </div>
                    <h3 class="mb-0 fw-bold">5</h3>
                    <small class="text-danger">Action needed</small>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="rounded bg-info-subtle p-2 me-2">
                            <i class="bi bi-people text-info"></i>
                        </div>
                        <span class="text-secondary small fw-bold">CUSTOMERS</span>
                    </div>
                    <h3 class="mb-0 fw-bold">3,400</h3>
                    <small class="text-secondary">Total registered</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <h5 class="mb-3 fw-bold">Quick Actions</h5>
    <div class="row g-3">
        <div class="col-md-3">
            <a href="<?= base_url('admin/products/create') ?>"
                class="card border-0 shadow-sm text-decoration-none h-100 hover-shadow transition">
                <div class="card-body text-center p-4">
                    <div class="mb-3"><i class="bi bi-plus-circle fs-2 text-primary"></i></div>
                    <h6 class="text-dark fw-bold">Add Product</h6>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?= base_url('admin/news/create') ?>"
                class="card border-0 shadow-sm text-decoration-none h-100 hover-shadow transition">
                <div class="card-body text-center p-4">
                    <div class="mb-3"><i class="bi bi-pencil-square fs-2 text-success"></i></div>
                    <h6 class="text-dark fw-bold">Write News</h6>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?= base_url('admin/orders') ?>"
                class="card border-0 shadow-sm text-decoration-none h-100 hover-shadow transition">
                <div class="card-body text-center p-4">
                    <div class="mb-3"><i class="bi bi-list-check fs-2 text-warning"></i></div>
                    <h6 class="text-dark fw-bold">Manage Orders</h6>
                </div>
            </a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>