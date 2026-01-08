<!--begin::Header-->
<nav class="app-header navbar navbar-expand bg-body" style="height: 60px;">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list fs-4"></i>
                </a>
            </li>
        </ul>
        <!--end::Start Navbar Links-->

        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">

            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <span class="d-none d-md-inline font-weight-bold"><!-- Current Admin Name --> Admin</span>
                    <i class="bi bi-person-circle fs-5 ms-2"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end"
                    style="border: 1px solid var(--admin-border); box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);">
                    <!--begin::Menu Footer-->
                    <li class="user-footer bg-white p-2">
                        <a href="<?= base_url('logout'); ?>" class="btn btn-danger btn-sm w-100">Sign out</a>
                    </li>
                    <!--end::Menu Footer-->
                </ul>
            </li>
            <!--end::User Menu Dropdown-->
        </ul>
        <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
</nav>
<!--end::Header-->