<?= $this->extend('Backend\Views\templates\content') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4 pt-3 px-3">
    <div>
        <h1 class="h3 mb-1 fw-bold">Orders</h1>
        <p class="text-secondary small mb-0">Manage customer orders</p>
    </div>
</div>

<div class="px-3">
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">Order ID</th>
                            <th>Customer</th>
                            <th>Items</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th class="text-end pe-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $o): ?>
                            <tr>
                                <td class="ps-4 fw-bold">#<?= $o['id']; ?></td>
                                <td>
                                    <div class="fw-medium">User #<?= $o['user_id']; ?></div>
                                    <!-- Use name if available in query join later -->
                                </td>
                                <td>
                                    Product #<?= $o['product_id']; ?> <span
                                        class="text-secondary">x<?= $o['quantity']; ?></span>
                                </td>
                                <td class="fw-bold"><?= format_rupiah($o['total_price']); ?></td>
                                <td>
                                    <?php
                                    $statusClass = 'neutral';
                                    if (strtolower($o['status']) == 'completed')
                                        $statusClass = 'success';
                                    else if (strtolower($o['status']) == 'pending')
                                        $statusClass = 'warning';
                                    else if (strtolower($o['status']) == 'cancelled')
                                        $statusClass = 'danger';
                                    ?>
                                    <span class="status-badge <?= $statusClass ?>"><?= ucfirst($o['status']); ?></span>
                                </td>
                                <td><?= date('M d, Y', strtotime($o['created_at'] ?? 'now')); ?></td>
                                <td class="text-end pe-4">
                                    <a href="<?= base_url('admin/orders/view/' . $o['id']); ?>"
                                        class="btn btn-sm btn-secondary">View Details</a>
                                    <a href="<?= base_url('admin/orders/delete/' . $o['id']); ?>"
                                        class="btn btn-sm btn-outline-danger ms-1"
                                        onclick="return confirm('Delete this order?')">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($orders)): ?>
                            <tr>
                                <td colspan="7" class="text-center p-4 text-secondary">No orders found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>