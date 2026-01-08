 <?= $this->extend('Backend\Views\templates\content') ?>

<?php 
    $name = session()->get('name');
?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Order Detail</h1>
    </section>

    <section class="content">
        <pre><?= print_r($order, true); ?></pre>
        <a href="<?= base_url('admin/orders'); ?>" class="btn btn-default">Back</a>
    </section>
</div>

  <?= $this->endSection() ?>
