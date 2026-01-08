<header class="header">
    <div class="container flex items-center justify-between">
        <!-- Logo -->
        <div class="logo">
            <a href="<?= base_url() ?>">Outfi<span>TR</span></a>
        </div>

        <!-- Main Nav -->
        <nav class="nav-menu">
            <a href="<?= base_url() ?>" class="nav-link">Home</a>
            <a href="<?= base_url('shop') ?>" class="nav-link">Shop</a>
            <a href="<?= base_url('news') ?>" class="nav-link">News</a>
            <a href="<?= base_url('contact') ?>" class="nav-link">Contact</a>
        </nav>

        <!-- User Icons -->
        <div class="nav-icons">
            <!-- Search Form -->
            <div class="search-wrapper" style="position: relative; display: inline-block;">
                <button type="button" class="nav-icon-link" id="searchToggle"
                    style="background:none; border:none; cursor:pointer;">
                    <i class="fa fa-search"></i>
                </button>
                <form action="<?= base_url('shop') ?>" method="get" id="searchForm"
                    style="display: none; position: absolute; right: 0; top: 100%; background: #fff; border: 1px solid #eee; padding: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); z-index: 1001; width: 250px;">
                    <div style="display: flex;">
                        <input type="text" name="q" placeholder="Search products..."
                            style="width: 100%; border: 1px solid #ddd; padding: 8px; font-size: 14px; outline: none;"
                            required>
                        <button type="submit"
                            style="background: #000; color: #fff; border: none; padding: 0 12px; cursor: pointer;">GO</button>
                    </div>
                </form>
            </div>

            <script>
                document.getElementById('searchToggle').addEventListener('click', function (e) {
                    e.preventDefault();
                    var form = document.getElementById('searchForm');
                    if (form.style.display === 'none') {
                        form.style.display = 'block';
                        form.querySelector('input').focus();
                    } else {
                        form.style.display = 'none';
                    }
                });

                // Close when clicking outside
                document.addEventListener('click', function (e) {
                    var wrapper = document.querySelector('.search-wrapper');
                    if (!wrapper.contains(e.target)) {
                        document.getElementById('searchForm').style.display = 'none';
                    }
                });
            </script>

            <?php if (session()->get('isUserLoggedIn')): ?>
                <div class="relative" style="position: relative; display: inline-block;">
                    <a href="#" class="nav-icon-link">
                        <?= esc(session()->get('username')); ?>
                    </a>
                    <!-- Simple hover dropdown or link to logout directly if JS is minimal. Let's start with a direct link for simplicity or a simple hover structure -->
                    <a href="<?= base_url('logout'); ?>"
                        style="font-size: 12px; margin-left: 10px; text-transform:uppercase;">Logout</a>
                </div>
            <?php else: ?>
                <a href="<?= base_url('/login') ?>" class="nav-icon-link"><i class="fa fa-user"></i></a>
            <?php endif; ?>

            <a href="<?= base_url('cart') ?>" class="nav-icon-link">
                <i class="fa fa-shopping-cart"></i>
                <span class="cart-count"><?= count(session()->get('cart') ?? []) ?></span>
            </a>
        </div>
    </div>
</header>