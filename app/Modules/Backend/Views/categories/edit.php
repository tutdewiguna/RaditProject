 <?= $this->extend('Backend\Views\templates\content') ?>

<?php 
    $name = session()->get('name');
?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Category</h1>
    </section>

    <section class="content">
        <div class="box box-primary">
            <form action="<?= base_url('admin/categories/update/' . $category['id']); ?>" method="post">
                <div class="box-body">

                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="name" class="form-control"
                               value="<?= $category['name']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" name="slug" class="form-control"
                               value="<?= $category['slug']; ?>" required>
                    </div>

                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('admin/categories'); ?>" class="btn btn-default">Back</a>
                </div>
            </form>
        </div>
    </section>
</div>

  <?= $this->endSection() ?>
