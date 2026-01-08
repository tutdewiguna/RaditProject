<?= $this->extend('Frontend\Views\templates\content') ?>

<?= $this->section('content') ?>
    
    <div class="section bg-transparent min-vh-100 p-0 m-0 d-flex">
        <div class="vertical-middle">
            <div class="container py-5">
                <div class="card mx-auto rounded-0 border-0" style="max-width: 400px;">
                    <div class="card-body" style="padding: 40px; border: 1px solid #EEE;">
                        <form id="login-form" name="login-form" class="mb-0" action="<?= base_url('/register') ?>" method="post">
                            <?= csrf_field() ?>
                            <h3>Register your Account</h3>

                            <?php if (session()->getFlashdata('errors')) : ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                            <li><?= esc($error) ?></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            <?php endif ?>

                            <div class="row">
                                <div class="col-12 form-group">
                                    <label for="login-form-name">Name:</label>
                                    <input type="text" id="login-form-name" name="name" value="" class="form-control not-dark" />
                                </div>

                                <div class="col-12 form-group">
                                    <label for="login-form-username">Email:</label>
                                    <input type="text" id="login-form-username" name="email" value="" class="form-control not-dark" />
                                </div>

                                <div class="col-12 form-group">
                                    <label for="login-form-password">Password:</label>
                                    <input type="password" id="login-form-password" name="password" value="" class="form-control not-dark" />
                                </div>

                                <div class="col-12 form-group">
                                    <label for="login-form-password">Confirm Password:</label>
                                    <input type="password" id="login-form-password" name="confirmpassword" value="" class="form-control not-dark" />
                                </div>

                                <div class="col-12 form-group mb-0">
                                    <button class="button button-3d button-black m-0" id="login-form-submit" name="login-form-submit" value="login">Register</button>
                                    <a href="<?= base_url('/login') ?>" class="float-end">Login?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>