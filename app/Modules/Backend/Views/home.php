<?= $this->extend('Backend\Views\templates\content') ?>

<?php 
    $name = session()->get('name');
?>

<?= $this->section('content') ?>
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6"><h3 class="mb-0">Home</h3></div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <p>Halo <?= $name; ?>, selamat datang di halaman admin</p>
        </div>
    </div>
<?= $this->endSection() ?>