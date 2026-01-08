<?= $this->extend('Backend\Views\templates\content') ?>

<?php 
    $name = session()->get('name');
?>

<?= $this->section('content') ?>
 <div class="content-wrapper">
        <section class="content-header">
            <h1>Edit Product</h1>
        </section>

        <section class="content">
            <div class="box box-primary">
                <form action="<?= base_url('admin/products/update/' . $product['id']); ?>" method="post">
                    <div class="box-body">

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?= $product['name']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id" class="form-control" required>
                                <?php foreach ($categories as $c): ?>
                                    <option value="<?= $c['id']; ?>" <?= $c['id'] == $product['category_id'] ? 'selected' : '' ?>>
                                        <?= $c['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" name="price" class="form-control" value="<?= $product['price']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Stock</label>
                            <input type="number" name="stock" class="form-control" value="<?= $product['stock']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control"><?= $product['description']; ?></textarea>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?= base_url('admin/products'); ?>" class="btn btn-default">Cancel</a>
                    </div>
                </form>
            </div>
        </section>
    </div>
        <?= $this->endSection() ?>