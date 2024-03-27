<?php

use helpers\services\RequestService;

?>
<div class="offcanvas offcanvas-start"
     tabindex="-1"
     id="offcanvasNavbar"
     aria-labelledby="offcanvasNavbarLabel">

    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
        <button
                type="button"
                class="btn-close"
                data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
    </div>


    <div class="offcanvas-body">

        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
                <a class="nav-link <?= RequestService::isRequestedRoute("/") ? "selected" : "" ?>" aria-current="page"
                   href="<?= url("/") ?>">
                    Connectors
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= RequestService::isRequestedRoute("/downloads") ? "selected" : "" ?>"
                   aria-current="page" href="<?= url("/downloads") ?>">
                    Downloads
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= RequestService::isRequestedRoute("/gallery") ? "selected" : "" ?>"
                   aria-current="page" href="<?= url("/gallery") ?>">
                    Gallery
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= RequestService::isRequestedRoute("/sealant") ? "selected" : "" ?>"
                   aria-current="page" href="<?= url("/sealant") ?>">
                    Sealant
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= RequestService::isRequestedRoute("/contact") ? "selected" : "" ?>"
                   aria-current="page" href="<?= url("/contact") ?>">
                    Contact
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= RequestService::isRequestedRoute("/login") ? "selected" : "" ?>"
                   aria-current="page" href="<?= url("/login") ?>">
                    Login
                </a>
            </li>
        </ul>

    </div>
</div>