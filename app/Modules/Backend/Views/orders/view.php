<?= $this->extend('Backend\Views\templates\content') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4 pt-3 px-3">
    <div>
        <h1 class="h3 mb-1 fw-bold">Order Details #<?= esc($order['id']); ?></h1>
        <p class="text-secondary small mb-0">View order information and status</p>
    </div>
    <div>
        <a href="<?= base_url('admin/orders'); ?>" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Orders
        </a>
    </div>
</div>

<div class="px-3">
    <div class="row g-4">
        <!-- Order Summary & Customer -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h6 class="mb-0 fw-bold">Order Items</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4">Product</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-end pe-4">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Assuming Order model might join product info, otherwise use fallback -->
                                <tr>
                                    <td class="ps-4">
                                        <div class="fw-medium">Product ID: <?= esc($order['product_id']); ?></div>
                                        <!-- If product name is available via join, allow it here later -->
                                    </td>
                                    <td class="text-center">x<?= esc($order['quantity']); ?></td>
                                    <td class="text-end pe-4 fw-bold">
                                        <?= format_rupiah($order['total_price']); ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white border-top-0 p-4 text-end">
                    <div class="d-inline-block text-start">
                        <div class="d-flex justify-content-between mb-2" style="min-width: 200px;">
                            <span class="text-secondary me-4">Subtotal</span>
                            <span class="fw-bold"><?= format_rupiah($order['total_price']); ?></span>
                        </div>
                        <div class="d-flex justify-content-between border-top pt-2">
                            <span class="fw-bold fs-5 me-4">Total</span>
                            <span class="fw-bold fs-5 text-primary"><?= format_rupiah($order['total_price']); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Info -->
        <div class="col-lg-4">
            <!-- Status Card -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h6 class="mb-0 fw-bold">Order Status</h6>
                </div>
                <div class="card-body p-4">
                    <?php
                    $status = ucfirst($order['status']);
                    $statusClass = 'neutral';
                    if (strtolower($status) == 'completed')
                        $statusClass = 'success';
                    else if (strtolower($status) == 'pending')
                        $statusClass = 'warning';
                    else if (strtolower($status) == 'cancelled')
                        $statusClass = 'danger';
                    ?>
                    <div class="d-flex align-items-center mb-3">
                        <span class="status-badge <?= $statusClass ?> fs-6 px-3 py-2"><?= $status ?></span>
                    </div>
                    <div class="small text-secondary">
                        <div class="mb-1"><i class="bi bi-calendar me-2"></i> Created:
                            <?= date('M d, Y H:i', strtotime($order['created_at'])); ?></div>
                        <?php if (!empty($order['updated_at'])): ?>
                            <div><i class="bi bi-clock me-2"></i> Last Updated:
                                <?= date('M d, Y H:i', strtotime($order['updated_at'])); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Customer Card -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h6 class="mb-0 fw-bold">Customer Details</h6>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle bg-light d-flex align-items-center justify-content-center me-3"
                            style="width: 40px; height: 40px;">
                            <i class="bi bi-person text-secondary"></i>
                        </div>
                        <div>
                            <div class="fw-bold">User #<?= esc($order['user_id']); ?></div>
                            <!-- Future: Customer Name -->
                        </div>
                    </div>
                    <!-- Future: Contact info, Shipping Address -->
                    <p class="small text-secondary mb-0">
                        <i class="bi bi-info-circle me-1"></i> Additional customer details can be added here if
                        available in the database join.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>