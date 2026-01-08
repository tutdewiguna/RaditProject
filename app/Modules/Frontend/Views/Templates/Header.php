<header class="header trans_300" style="height: 0;">
    <div class="main_nav_container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-right">
                    <div class="logo_container">
                        <a href="index.html" style="color:white">Outfi<span>TR</span></a>
                    </div>
                    <nav class="navbar">
                        <ul class="navbar_menu" style="margin-top: -15px;">
                            <li>
                                <a href="<?= base_url('/')?>" style="color:white; font-size: 20px; font-family:Cormorant Garamond, Georgia, serif;">
                                    HOME
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('shop')?>" style="color:white; font-size: 20px; font-family:Cormorant Garamond, Georgia, serif;">
                                    SHOP
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('contact')?>" style="color:white; font-size: 20px; font-family:Cormorant Garamond, Georgia, serif;">
                                    CONTACT
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('news')?>" style="color:white; font-size: 20px; font-family:Cormorant Garamond, Georgia, serif;">
                                    NEWS
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar_user" style="margin-top: -15px;">
                            <li>
                                <a href="#"><i class="fa fa-search" style="color:white" aria-hidden="true"></i></a>
                            </li>
                            <?php if (session()->get('isUserLoggedIn')) : ?>
    <!-- Jika sudah login -->
    <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="color:white; font-size:20px">
            <?= session()->get('username'); ?>
        </a>
        <div class="dropdown-menu" style="background:#333; border:none;">
            <a class="dropdown-item" href="<?= base_url('logout'); ?>" style="color:white;">Logout</a>
        </div>
    </li>
<?php else : ?>
    <!-- Jika belum login -->
    <li>
        <a href="<?= base_url('/login')?>"><i class="fa fa-user" style="color:white" aria-hidden="true"></i></a>
    </li>
<?php endif; ?>

                            <li class="checkout">
                                <a href="card.html">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="checkout_items" class="checkout_items"></span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
