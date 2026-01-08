<?= $this->extend('Backend\Views\templates\content') ?>

<?php 
    $name = session()->get('name');
?>

<?= $this->section('content') ?>
<h1>Orders List</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Product</th>
            <th>User</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $o): ?>
        <tr>
            <td><?= $o['id']; ?></td>
            <td><?= $o['product_id']; ?></td>
            <td><?= $o['user_id']; ?></td>
            <td><?= $o['quantity']; ?></td>
            <td><?= $o['total']; ?></td>
            <td><?= $o['status']; ?></td>
            <td>
                <a href="<?= base_url('admin/orders/view/'.$o['id']); ?>" class="btn btn-info btn-sm">View</a>
                <a href="<?= base_url('admin/orders/delete/'.$o['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this order?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
  <?= $this->endSection() ?>