<?= $this->extend('Backend\Views\templates\content') ?>

<?php 
    $name = session()->get('name');
?>

<?= $this->section('content') ?>
<h1>News List</h1>
<a href="<?= base_url('admin/news/create'); ?>" class="btn btn-primary">Add News</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($news as $n): ?>
        <tr>
            <td><?= $n['id']; ?></td>
            <td><?= $n['title']; ?></td>
            <td><?= $n['slug']; ?></td>
            <td><?= $n['created_at']; ?></td>
            <td>
                <a href="<?= base_url('admin/news/edit/'.$n['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="<?= base_url('admin/news/delete/'.$n['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this news?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
  <?= $this->endSection() ?>