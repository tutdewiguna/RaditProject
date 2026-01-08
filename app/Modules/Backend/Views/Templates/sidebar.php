<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="./index.html" class="brand-link">
        <!--begin::Brand Image-->
        <img
            src="<?= base_url('adminlte/dist/assets/img/AdminLTELogo.png') ?>"
            alt="AdminLTE Logo"
            class="brand-image opacity-75 shadow"
        />
        <!--end::Brand Image-->
        <!--begin::Brand Text-->
        <span class="brand-text fw-light">AdminLTE 4</span>
        <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
        <!--begin::Sidebar Menu-->
        <ul
            class="nav sidebar-menu flex-column"
            data-lte-toggle="treeview"
            role="navigation"
            aria-label="Main navigation"
            data-accordion="false"
            id="navigation"
        >
            <li class="nav-item">
                <a href="./generate/theme.html" class="nav-link active">
                    <i class="nav-icon bi bi-palette"></i>
                    <p>Home</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-speedometer"></i>
                    <p>
                    Master
                    <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                <a href="<?= base_url('admin/products') ?>" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                        <p>Produk</p>
                    </a>
                </li>
                       <li class="nav-item">
                            <a href="<?= base_url('admin/news') ?>" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                             <p>Berita</p>
                             </a>
                        </li>
                     <li class="nav-item">
                        <a href="<?= base_url('admin/categories') ?>" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                         <p>Categori</p>
                        </a>
                        </li>
                       <li class="nav-item">
                        <a href="<?= base_url('admin/orders') ?>" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Order</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->