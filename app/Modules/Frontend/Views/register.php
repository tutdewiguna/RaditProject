<?= $this->extend('Frontend\Templates\Content') ?>

<?= $this->section('content') ?>

<div class="container section" style="display: flex; justify-content: center; align-items: center; min-height: 70vh;">
    <div class="auth-box" style="width: 100%; max-width: 420px; padding: 40px; border: 1px solid #e5e5e5;">
        <h3 class="text-center mb-4" style="margin-bottom: 30px;">Create Account</h3>

        <?php if (session()->getFlashdata('errors')): ?>
            <div style="background: #fef2f2; color: #991b1b; padding: 12px; margin-bottom: 24px; font-size: 13px;">
                <ul style="padding-left: 20px; margin: 0;">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>

        <form action="<?= base_url('/register') ?>" method="post">
            <?= csrf_field() ?>

            <div class="form-group">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-4" style="width: 100%;">Register</button>

            <div class="text-center">
                <span style="color: #666; font-size: 14px;">Already have an account?</span>
                <a href="<?= base_url('/login') ?>"
                    style="font-size: 14px; color: #000; text-decoration: underline; margin-left: 5px;">Login</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>