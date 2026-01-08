<?= $this->extend('Backend\Views\templates\content') ?>

<?php 
    $name = session()->get('name');
?>

<?= $this->section('content') ?>
<h1>Categories List</h1>
<a href="<?= base_url('admin/categories/create'); ?>" class="btn btn-primary">Add Category</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $c): ?>
        <tr>
            <td><?= $c['id']; ?></td>
            <td><?= $c['name']; ?></td>
            <td><?= $c['slug']; ?></td>
            <td>
                <a href="<?= base_url('admin/categories/edit/'.$c['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="<?= base_url('admin/categories/delete/'.$c['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this category?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
  <?= $this->endSection() ?>
