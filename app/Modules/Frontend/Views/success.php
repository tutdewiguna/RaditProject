<?= $this->extend('Frontend\Templates\Content') ?>

<?= $this->section('content') ?>
<div class="container section">
    <div class="text-center" style="max-width: 600px; margin: 60px auto;">
        <div style="font-size: 64px; color: var(--color-success); margin-bottom: 24px;">
            <i class="fa fa-check-circle"></i>
        </div>
        <h1 style="margin-bottom: 16px;">Order Confirmed</h1>
        <p style="font-size: 18px; color: #555; margin-bottom: 32px;">
            Thank you for your purchase. Your order has been placed successfully and is being processed.
        </p>
        <div class="flex justify-center gap-4">
            <a href="<?= base_url('shop') ?>" class="btn btn-primary">Continue Shopping</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>