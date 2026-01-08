<?= $this->extend('Frontend\Templates\Content') ?>

<?= $this->section('content') ?>

<div class="container section" style="display: flex; justify-content: center; align-items: center; min-height: 60vh;">
    <div class="auth-box" style="width: 100%; max-width: 420px; padding: 40px; border: 1px solid #e5e5e5;">
        <h3 class="text-center mb-4" style="margin-bottom: 30px;">Login</h3>

        <form action="<?= base_url('/login') ?>" method="post">
            <?= csrf_field() ?>

            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input type="text" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-4" style="width: 100%;">Sign In</button>

            <div class="text-center">
                <a href="<?= base_url('/register') ?>"
                    style="font-size: 14px; color: #666; text-decoration: underline;">Create an account</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>