<?php

use helpers\services\RequestService;

?>
<div class="offcanvas offcanvas-start"
     tabindex="-1"
     id="offcanvasNavbar"
     aria-labelledby="offcanvasNavbarLabel" style="z-index:10000;">

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
                <a class="nav-link color-blue" aria-current="page"
                   href="#">
                    Connectors / Categories
                </a>

                <ul style="list-style-type: none;">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= url("/connector?id=1") ?>">
                            Cofferdam
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= url("/connector?id=12") ?>">
                            Pipe pile steel walls
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= url("/connector?id=16") ?>">
                            DTH driving method
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= url("/connector?id=17") ?>">
                            Pipe pile + sheet pile combined walls
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= url("/connector?id=22") ?>">
                            H-pile walls
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= url("/connector?id=25") ?>">
                            H-pile + sheet pile combined walls
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= url("/connector?id=28") ?>">
                            Cell structures
                        </a>
                    </li>
                </ul>
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
            <?php if (isset($_SESSION["auth"]) && $_SESSION["auth"] === true) { ?>
                <li class="nav-item">
                    <a class="nav-link <?= RequestService::isRequestedRoute("/favourite") ? "selected" : "" ?>"
                       href="<?= url("/favourite") ?>">
                        Favorites
                    </a>
                </li>
            <?php } ?>
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
                <a class="nav-link color-blue">
                    User information
                </a>
                <ul style="list-style-type: none;">
                    <li class="nav-item">
                        <a class="nav-link <?= RequestService::isRequestedRoute("/about") ? "selected" : "" ?>"
                           href="<?= url("/about") ?>">
                            About Steelwall
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= RequestService::isRequestedRoute("/newsletter") ? "selected" : "" ?>"
                           href="<?= url("/newsletter") ?>">
                            Newsletter
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= RequestService::isRequestedRoute("/register") ? "selected" : "" ?>"
                           href="<?= url("/register") ?>">
                            Register
                        </a>
                    </li>
                    <li class="nav-item" href="#">
                        <a class="nav-link">
                            Languages and measures
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link color-blue">
                    Legal advice
                </a>
                <ul style="list-style-type: none;">
                    <li class="nav-item">
                        <a class="nav-link <?= RequestService::isRequestedRoute("/imprint") ? "selected" : "" ?>"
                           href="<?= url("/imprint") ?>">
                            Imprint
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= RequestService::isRequestedRoute("/privacy&policy") ? "selected" : "" ?>"
                           href="<?= url("/privacy&policy") ?>">
                            Privacy policy
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= RequestService::isRequestedRoute("/general/terms&condition") ? "selected" : "" ?>"
                           href="<?= url("/general/terms&condition") ?>">
                            General terms and conditions
                        </a>
                    </li>

                </ul>
            </li>

        </ul>
        <div class="w-100 d-flex justify-content-center mt-5 pt-5 gap-3 align-middle">
            <a href="?langStrict=de" title="" class="lang">
                <img src="<?= assets("img/flags/de.png") ?>" height="25"
                     class="flag <?= isset($_SESSION["lang"]) && $_SESSION["lang"] == "de" ? "selected-flag" : "" ?>"/>
            </a>
            <a href="?langStrict=en-gb" title="" class="lang">
                <img src="<?= assets("img/flags/en-gb.png") ?>" height="25"
                     class="flag <?= isset($_SESSION["lang"]) && $_SESSION["lang"] == "en-gb" ? "selected-flag" : "" ?>"/>
            </a>
            <a href="?langStrict=en-us" title="" class="lang">
                <img src="<?= assets("img/flags/en-us.png") ?>" height="25"
                     class="flag <?= isset($_SESSION["lang"]) && $_SESSION["lang"] == "en-us" ? "selected-flag" : "" ?>"/>
            </a>
            <a href="?langStrict=fr" title="" class="lang">
                <img src="<?= assets("img/flags/fr.png") ?>" height="25"
                     class="flag <?= isset($_SESSION["lang"]) && $_SESSION["lang"] == "fr" ? "selected-flag" : "" ?>"/>
            </a>

        </div>

    </div>
</div>