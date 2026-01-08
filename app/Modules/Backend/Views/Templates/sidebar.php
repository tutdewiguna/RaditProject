<!--begin::Sidebar-->
<aside class="app-sidebar bg-white shadow-none border-end">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand bg-white border-bottom">
        <a href="<?= base_url('admin') ?>"
            class="brand-link d-flex align-items-center justify-content-center text-decoration-none">
            <span class="brand-text fw-bold fs-4 text-dark">Outfi<span style="color: #666;">TR</span> Admin</span>
        </a>
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper p-2">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column gap-1" data-lte-toggle="treeview" role="navigation">

                <li class="nav-item">
                    <a href="<?= base_url('admin/home') ?>" class="nav-link">
                        <i class="nav-icon bi bi-grid-1x2-fill"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-header text-uppercase text-secondary fw-bold fs-7 mt-3 mb-1 px-3">Store Management</li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/orders') ?>" class="nav-link">
                        <i class="nav-icon bi bi-bag-check-fill"></i>
                        <p>Orders</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/products') ?>" class="nav-link">
                        <i class="nav-icon bi bi-box-seam-fill"></i>
                        <p>Products</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/categories') ?>" class="nav-link">
                        <i class="nav-icon bi bi-tags-fill"></i>
                        <p>Categories</p>
                    </a>
                </li>

                <li class="nav-header text-uppercase text-secondary fw-bold fs-7 mt-3 mb-1 px-3">Content</li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/news') ?>" class="nav-link">
                        <i class="nav-icon bi bi-newspaper"></i>
                        <p>News / Blog</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->