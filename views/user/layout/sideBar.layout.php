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


                <?php if (isset($_SESSION["auth"]) && $_SESSION["auth"] === true) { ?>
                    <a class="nav-link" aria-current="page" href="<?= url("/logout") ?>">
                        Logout
                    </a>
                <?php } else { ?>
                    <a class="nav-link <?= RequestService::isRequestedRoute("/login") ? "selected" : "" ?>"
                       aria-current="page" href="<?= url("/login") ?>">
                        Login
                    </a>
                <?php } ?>

            </li>

            <li class="nav-item">
                <a class="nav-link">
                    User information
                </a>
                <ul style="list-style-type: none;">
                    <li class="nav-item">
                        <a class="nav-link <?= RequestService::isRequestedRoute("/about") ? "selected" : "" ?>" href="<?= url("/about") ?>">
                            About Steelwall
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= RequestService::isRequestedRoute("/newsletter") ? "selected" : "" ?>" href="<?= url("/newsletter") ?>">
                            Newsletter
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= RequestService::isRequestedRoute("/register") ? "selected" : "" ?>" href="<?= url("/register") ?>">
                            Register
                        </a>
                    </li>
                    <li class="nav-item" href="#">
                        <a class="nav-link">
                            Languages and measures
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= RequestService::isRequestedRoute("/favourite") ? "selected" : "" ?>" href="<?= url("/favourite") ?>">
                            Favorites
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= RequestService::isRequestedRoute("/contact") ? "selected" : "" ?>" href="<?= url("/contact") ?>">
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
                        <a class="nav-link <?= RequestService::isRequestedRoute("/imprint") ? "selected" : "" ?>" href="<?= url("/imprint") ?>">
                            Imprint
                        </a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link <?= RequestService::isRequestedRoute("/privacy&policy") ? "selected" : "" ?>" href="<?= url("/privacy&policy") ?>">
                            Privacy policy
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= RequestService::isRequestedRoute("/general/terms&condition") ? "selected" : "" ?>" href="<?= url("/general/terms&condition") ?>">
                            General terms and conditions
                        </a>
                    </li>

                </ul>
            </li>
        </ul>


    </div>
</div>