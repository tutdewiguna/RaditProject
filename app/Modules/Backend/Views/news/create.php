<?= $this->extend('Backend\Views\templates\content') ?>

<?php
$name = session()->get('name');
?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Add News</h1>
    </section>

    <section class="content">
        <div class="box box-primary">
            <form action="<?= base_url('admin/news/store'); ?>" method="post" enctype="multipart/form-data">
                <div class="box-body">

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" name="slug" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>

                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" class="form-control" rows="5"></textarea>
                    </div>

                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="<?= base_url('admin/news'); ?>" class="btn btn-default">Back</a>
                </div>
            </form>
        </div>
    </section>
</div>

<?= $this->endSection() ?>