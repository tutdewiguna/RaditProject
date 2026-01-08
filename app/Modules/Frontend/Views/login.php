<?= $this->extend('Frontend\Views\templates\content') ?>

<?= $this->section('content') ?>
    
    <div class="section bg-transparent min-vh-100 p-0 m-0 d-flex">
        <div class="vertical-middle">
            <div class="container py-5">
                <div class="card mx-auto rounded-0 border-0" style="max-width: 400px;">
                    <div class="card-body" style="padding: 40px; border: 1px solid #EEE;">
                        <form id="login-form" name="login-form" class="mb-0" action="<?= base_url('/login') ?>" method="post">
                            <?= csrf_field() ?>
                            <h3>Login to your Account</h3>

                            <div class="row">
                                <div class="col-12 form-group">
                                    <label for="login-form-username">email:</label>
                                    <input type="text" id="login-form-username" name="email" value="" class="form-control not-dark" />
                                </div>

                                <div class="col-12 form-group">
                                    <label for="login-form-password">Password:</label>
                                    <input type="password" id="login-form-password" name="password" value="" class="form-control not-dark" />
                                </div>

                                <div class="col-12 form-group mb-0">
                                    <button class="button button-3d button-black m-0" id="login-form-submit" name="login-form-submit" value="login">Login</button>
                                    <a href="<?= base_url('/register') ?>" class="float-end">Register?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>