<aside class="app-sidebar shadow background-primary" data-bs-theme="dark">

    <div class="sidebar-brand">
        <a href="<?= url("admin/dashboard") ?>" class="brand-link">
            <img src="<?= assets("themes/admin/img/logo.jpg") ?>" alt="Steel wall Logo"
                 class="brand-image shadow">
        </a>
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open d-none">
                    <a href="<?= url("admin/dashboard") ?>"
                       class="nav-link">
                        <i class="bi bi-speedometer"></i>
                        <p> Dashboard </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="<?= url("admin/categories") ?>"
                       class="nav-link <?= isRequestedRoute("admin/categories") ? 'active':'' ?>">
                        <i class="bi bi-bookmarks"></i>
                        <p> Categories </p>
                    </a>
                </li>

                <li class="nav-item menu-open">
                    <a href="<?= url("admin/pages") ?>"
                       class="nav-link <?= isRequestedRoute("admin/pages") ? 'active' :'' ?>">
                        <i class="bi bi-window-stack"></i>
                        <p> Pages </p>
                    </a>
                </li>

                <li class="nav-item menu-open">
                    <a href="<?= url("admin/connectors") ?>"
                       class="nav-link <?= isRequestedRoute("admin/connectors") ? 'active':'' ?>">
                        <i class="bi bi-link-45deg"></i>
                        <p> Connectors </p>
                    </a>
                </li>

                <li class="nav-item menu-open">
                    <a href="<?= url("admin/add-on") ?>"
                       class="nav-link <?= isRequestedRoute("admin/add-on") ? 'active' :'' ?>">
                        <i class="bi bi-newspaper"></i>
                        <p> Add-On </p>
                    </a>
                </li>



                <!--                <li class="nav-header">TEMPLATES</li>-->
<!---->
<!--                <li class="nav-item menu-open">-->
<!--                    <a href="/" class="nav-link">-->
<!--                        <i class="bi bi-link-45deg"></i>-->
<!--                        <p> Connectors </p>-->
<!--                    </a>-->
<!--                </li>-->
<!---->
<!--                <li class="nav-item menu-open">-->
<!--                    <a href="/" class="nav-link">-->
<!--                        <i class="bi bi-speedometer"></i>-->
<!--                        <p> Addons </p>-->
<!--                    </a>-->
<!--                </li>-->


            </ul>
        </nav>
    </div>
</aside>