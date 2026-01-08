<?= $this->extend('Frontend\Templates\Content') ?>

<?= $this->section('content') ?>

<div class="container section">

    <div style="margin-bottom: 40px;">
        <h2 style="font-size: 2rem;">Checkout</h2>
    </div>

    <?php if (session()->has('errors')): ?>
        <div
            style="background: #fef2f2; color: #991b1b; padding: 16px; margin-bottom: 32px; border: 1px solid #fecaca; font-size: 14px;">
            <ul style="margin: 0; padding-left: 20px;">
                <?php foreach (session('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('checkout/process') ?>" method="post">
        <?= csrf_field() ?>

        <div class="grid grid-2" style="column-gap: 80px; row-gap: 40px;">

            <!-- Billing Details -->
            <div>
                <h4
                    style="margin-bottom: 32px; font-size: 1.25rem; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                    Billing Details</h4>

                <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="name"
                        value="<?= old('name', session()->get('isUserLoggedIn') ? session()->get('name') : '') ?>"
                        placeholder="John Doe" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-control" name="email"
                        value="<?= old('email', session()->get('isUserLoggedIn') ? session()->get('email') : '') ?>"
                        placeholder="john@example.com" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="phone" value="<?= old('phone') ?>"
                        placeholder="+1 234 567 890" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Delivery Address</label>
                    <textarea class="form-control" name="address" rows="4" placeholder="Full address including zip code"
                        required><?= old('address') ?></textarea>
                </div>
            </div>

            <!-- Order Summary & Payment -->
            <div>
                <div style="background: var(--color-bg-alt); padding: 40px; position: sticky; top: 100px;">
                    <h4 style="margin-bottom: 24px; font-size: 1.25rem;">Your Order</h4>

                    <div style="margin-bottom: 24px;">
                        <?php foreach ($cartItems as $item): ?>
                            <div
                                style="display: flex; justify-content: space-between; border-bottom: 1px solid #e5e5e5; padding-bottom: 12px; margin-bottom: 12px;">
                                <div>
                                    <span
                                        style="display: block; font-weight: 500; font-size: 14px;"><?= esc($item['product']['name']) ?></span>
                                    <span style="font-size: 12px; color: #666;">Qty: <?= $item['quantity'] ?></span>
                                </div>
                                <div style="font-size: 14px;"><?= format_rupiah($item['subtotal']) ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div
                        style="display: flex; justify-content: space-between; padding-top: 16px; border-top: 2px solid #000; margin-bottom: 32px; font-size: 1.25rem; font-weight: 600;">
                        <span>Total</span>
                        <span><?= format_rupiah($total) ?></span>
                    </div>

                    <div class="form-group" style="margin-bottom: 24px;">
                        <label class="form-label">Payment Method</label>
                        <div
                            style="padding: 12px; background: #fff; border: 1px solid #ddd; font-size: 14px; color: #555;">
                            Cash on Delivery / Bank Transfer
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block" style="padding: 16px; width: 100%;">Place
                        Order</button>

                    <p style="text-align: center; font-size: 12px; color: #999; margin-top: 16px;">
                        By clicking Place Order, you agree to our Terms.
                    </p>
                </div>
            </div>

        </div>
    </form>
</div>

<?= $this->endSection() ?>