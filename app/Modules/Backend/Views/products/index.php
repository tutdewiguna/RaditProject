
 <?= $this->extend('Backend\Views\templates\content') ?>

<?php 
    $name = session()->get('name');
?>

<?= $this->section('content') ?>
 <div class="content-wrapper">
        <section class="content-header">
            <h1>Products <small>List</small></h1>
            <a href="<?= base_url('admin/products/create'); ?>" class="btn btn-primary">Add Product</a>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Product Table</h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $p): ?>
                                <tr>
                                    <td><?= $p['id']; ?></td>
                                    <td><?= $p['name']; ?></td>
                                    <td><?= $p['category_id']; ?></td>
                                    <td><?= $p['price']; ?></td>
                                    <td><?= $p['stock']; ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/products/edit/' . $p['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?= base_url('admin/products/delete/' . $p['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this product?')">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <?= $this->endSection() ?>