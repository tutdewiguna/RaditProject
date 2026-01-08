<?= $this->extend('Frontend\Templates\Content') ?>

<?= $this->section('content') ?>

<div class="container section">

    <h2 style="margin-bottom: 40px;">Shopping Bag</h2>

    <?php if (session()->has('message')): ?>
        <div style="background: #f0fdf4; color: #166534; padding: 12px; margin-bottom: 24px; border: 1px solid #dcfce7;">
            <?= session('message') ?>
        </div>
    <?php endif; ?>

    <?php if (empty($cartItems)): ?>
        <div style="text-align: center; padding: 80px 0;">
            <p style="margin-bottom: 24px; color: #666;">Your bag is currently empty.</p>
            <a href="<?= base_url('shop') ?>" class="btn btn-primary">Start Shopping</a>
        </div>
    <?php else: ?>

        <div style="margin-bottom: 40px; overflow-x: auto;">
            <table class="cart-table" style="min-width: 600px;">
                <thead>
                    <tr>
                        <th style="width: 50%;">Product</th>
                        <th>Quantity</th>
                        <th style="text-align: right;">Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cartItems as $item): ?>
                        <tr>
                            <td>
                                <div style="display: flex; align-items: center;">
                                    <?php if (!empty($item['product']['image'])): ?>
                                        <img src="<?= base_url($item['product']['image']) ?>" alt=""
                                            style="width: 70px; height: 90px; object-fit: cover; background: #f8f8f8; margin-right: 20px;">
                                    <?php else: ?>
                                        <div style="width: 70px; height: 90px; background: #eee; margin-right: 20px;"></div>
                                    <?php endif; ?>
                                    <div>
                                        <a href="<?= base_url('shop/' . $item['product']['slug']) ?>"
                                            style="font-weight: 500; font-size: 14px; text-decoration: none;">
                                            <?= esc($item['product']['name']) ?>
                                        </a>
                                        <div style="font-size: 13px; color: #666; margin-top: 4px;">
                                            <?= format_rupiah($item['product']['price']) ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span
                                    style="display: inline-block; padding: 4px 12px; background: #f9f9f9; border: 1px solid #eee;">
                                    <?= $item['quantity'] ?>
                                </span>
                            </td>
                            <td style="text-align: right; font-weight: 500;">
                                <?= format_rupiah($item['subtotal']) ?>
                            </td>
                            <td style="text-align: right;">
                                <a href="<?= base_url('cart/remove/' . $item['product']['id']) ?>"
                                    style="color: #999; font-size: 18px;" onclick="return confirm('Remove this item?')">
                                    &times;
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Summary -->
        <div style="display: flex; justify-content: flex-end;">
            <div style="width: 100%; max-width: 400px; background: var(--color-bg-alt); padding: 30px;">
                <h4 style="margin-bottom: 20px; font-size: 18px;">Summary</h4>

                <div style="display: flex; justify-content: space-between; margin-bottom: 20px; font-size: 16px;">
                    <span>Subtotal</span>
                    <span style="font-weight: 600;"><?= format_rupiah($total) ?></span>
                </div>

                <p style="font-size: 13px; color: #666; margin-bottom: 24px;">Shipping, taxes, and discounts will be
                    calculated at checkout.</p>

                <a href="<?= base_url('checkout') ?>" class="btn btn-primary btn-block mb-4"
                    style="width: 100%; text-align: center;">Proceed to Checkout</a>

                <div style="text-align: center; margin-top: 16px;">
                    <a href="<?= base_url('shop') ?>"
                        style="font-size: 13px; color: #666; text-decoration: underline;">Continue Shopping</a>
                </div>
            </div>
        </div>

    <?php endif; ?>
</div>

<?= $this->endSection() ?>