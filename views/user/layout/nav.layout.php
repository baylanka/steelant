<?php
use helpers\services\RequestService;
?>
<!--navbar section-->
<nav class="navbar fixed-top position-relative">

    <div class="container-fluid">
        <div class="text-center row position-relative reveal-on-sm p-2 invisible">
            <div class="col-4 mt-5 text-center">
                <img src="<?= assets("themes/user/img/menu.png") ?>"
                     type="button"
                     data-bs-toggle="offcanvas"
                     data-bs-target="#offcanvasNavbar"
                     aria-controls="offcanvasNavbar"
                     aria-label="Toggle navigation"
                     height="30"
                     alt="menu-image"
                /><br/>
                <span class="nav-text">Menu</span>
            </div>
        </div>

        <div class="nav-logo w-50">
            <img src="<?= assets("themes/user/img/logo.jpg") ?>" alt="SteelWall-logo"/>
            <h5>Schlossprofile für Spundwandbauwerke</h5>
        </div>

        <div class="text-center row position-relative p-2">

            <div class="col-md-4 mt-5 text-center login-btn" style="display: none;">
                <img src="<?= assets("themes/user/img/user.png") ?>" height="30"/><br/>
                <span class="nav-text">Login</span>
            </div>


            <div class="dropstart lang-dropdown">
                <img src="<?= assets("themes/user/img/flags/de.png") ?>" height="30" class="dropdown-toggle"
                     data-bs-toggle="dropdown"
                     aria-expanded="false"/><br/>
                <span class="nav-text">Language</span>
                <ul class="dropdown-menu mt-4">
                    <li><a class="dropdown-item d-flex justify-content-start gap-2 align-middle" href="#">
                            <img src="<?= assets("themes/user/img/flags/de.png") ?>" height="25"/>
                            Deustch</a></li>
                    <li><a class="dropdown-item d-flex justify-content-start gap-2 align-middle" href="#">
                            <img src="<?= assets("themes/user/img/flags/uk.png") ?>" height="25"/>
                            English - UK</a></li>
                    <li><a class="dropdown-item d-flex justify-content-start gap-2 align-middle" href="#">
                            <img src="<?= assets("themes/user/img/flags/us.png") ?>" height="25"/>
                            English - USA</a></li>
                    <li><a class="dropdown-item d-flex justify-content-start gap-2 align-middle" href="#">
                            <img src="<?= assets("themes/user/img/flags/fr.png") ?>" height="25"/>
                            French</a></li>
                </ul>
            </div>

        </div>

        <?php require_once "sideBar.layout.php"?>
    </div>

    <div class="secondary-nav remove-on-sm justify-content-between w-100 px-3 ">

        <div class="text-center row position-relative login-nav gap-2 "
             style="align-content: space-around; visibility: hidden !important;">
            <div class="col-4 text-center d-flex gap-1">
                <img src="<?= assets("themes/user/img/user-white.png") ?>" height="20"/><br/>
                <span class="">Login</span>
            </div>
            <div class="col-4 text-center d-flex gap-1">
                <img src="<?= assets("themes/user/img/star-white.png") ?>" height="20"/><br/>
                <span>Favourite</span>
            </div>

        </div>

        <div class="nav">
            <a class="nav-link <?= RequestService::isRequestedRoute("/") ? "selected" : "" ?>" aria-current="page" href="<?= url("/") ?>">Connectors</a>
            <a class="nav-link <?= RequestService::isRequestedRoute("/downloads") ? "selected" : "" ?>" aria-current="page" href="<?= url("/downloads") ?>">Downloads</a>
            <a class="nav-link <?= RequestService::isRequestedRoute("/gallery") ? "selected" : "" ?>" aria-current="page" href="<?= url("/gallery") ?>">Gallery</a>
            <a class="nav-link <?= RequestService::isRequestedRoute("/sealant") ? "selected" : "" ?>" aria-current="page" href="<?= url("/sealant") ?>">Sealant</a>
            <a class="nav-link <?= RequestService::isRequestedRoute("/contact") ? "selected" : "" ?>" aria-current="page" href="https://steelant.eu/">Contact</a>
        </div>

        <div class="text-center row position-relative login-nav gap-2"
             style="align-content: space-around;">
            <div class="col-5 text-center d-flex gap-1">

                <img src="<?= assets("themes/user/img/user-white.png") ?>" height="20"/><br/>
                <a class="nav-link" href="<?= url("/login") ?>">Login </a>

            </div>
            <div class="col-5 text-center d-flex gap-1">
                <img src="<?= assets("themes/user/img/star-white.png") ?>" height="20"/><br/>
                <span>Favourite</span>
            </div>

        </div>

    </div>

</nav>
<!--navbar section-->