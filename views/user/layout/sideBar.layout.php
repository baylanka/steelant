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
                <a class="nav-link" target="_blank"
                   aria-current="page" href="https://steelant.eu/">
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

            <li class="nav-item">
                <a class="nav-link">
                    User information
                </a>
                <ul style="list-style-type: none;">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            About Steelwall
                        </a>
                    </li>
                    <li class="nav-item" href="#">
                        <a class="nav-link">
                            Newsletter
                        </a>
                    </li>
                    <li class="nav-item" href="#">
                        <a class="nav-link">
                            Register
                        </a>
                    </li>
                    <li class="nav-item" href="#">
                        <a class="nav-link">
                            Divisions
                        </a>
                    </li>
                    <li class="nav-item" href="#">
                        <a class="nav-link">
                            Languages and measures
                        </a>
                    </li>
                    <li class="nav-item" href="#">
                        <a class="nav-link">
                            Favorites
                        </a>
                    </li>
                    <li class="nav-item" href="#">
                        <a class="nav-link">
                            Contact
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link">
                    Legal advice
                </a>
                <ul style="list-style-type: none;">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Imprint
                        </a>
                    </li>
                    <li class="nav-item" href="#">
                        <a class="nav-link">
                            Privacy policy
                        </a>
                    </li>
                    <li class="nav-item" href="#">
                        <a class="nav-link">
                            General terms and conditi ons
                        </a>
                    </li>

                </ul>
            </li>
        </ul>


    </div>
</div>