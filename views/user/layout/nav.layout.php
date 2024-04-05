<?php

use helpers\services\RequestService;
use \helpers\translate\Translate;


global $env;
?>
<!--navbar section-->
<nav class="navbar fixed-top position-relative">

    <div class="container-fluid">
        <div class="text-center row position-relative p-2">
            <div class="col-4 mt-5 text-center reveal-on-sm invisible">
                <img src="<?= assets("themes/user/img/menu.png") ?>"
                     type="button"
                     data-bs-toggle="offcanvas"
                     data-bs-target="#offcanvasNavbar"
                     aria-controls="offcanvasNavbar"
                     aria-label="Toggle navigation"
                     height="30"
                     alt="menu-image"
                /><br/>
            </div>

            <div class="w-25 d-flex gap-3 align-middle remove-on-sm invisible">
                <a href="" title="" class="lang">
                    <img src="<?= assets("img/flags/de.png") ?>" height="25"
                         class="flag selected-flag"/>
                </a>
                <a href="" title="" class="lang">
                    <img src="<?= assets("img/flags/en-gb.png") ?>" height="25"
                         class="flag"/>
                </a> <a href="" title="" class="lang">
                    <img src="<?= assets("img/flags/en-us.png") ?>" height="25"
                         class="flag"/>
                </a>
                <a href="" title="" class="lang">
                    <img src="<?= assets("img/flags/fr.png") ?>" height="25"
                         class="flag"/>
                </a>

            </div>
        </div>

        <div class="nav-logo w-50">
            <?php require_once "brand.layout.php" ?>
        </div>

        <div class="text-center row position-relative p-2">

            <div class="col-md-4 mt-5 text-center login-btn" style="display: none;">
                <a class="nav-link"
                   href="<?= isset($_SESSION["auth"]) && $_SESSION["auth"] === true ? url("/profile") : url("/login") ?>">
                    <img src="<?= assets("themes/user/img/user.png") ?>" height="30"/><br/>
                </a>
            </div>

            <div class="w-25 d-flex gap-3 align-middle remove-on-sm">
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

        <?php require_once "sideBar.layout.php" ?>
    </div>


    <div class="secondary-nav remove-on-sm justify-content-between w-100 px-3 ">

        <div class="text-center row position-relative login-nav gap-2 invisible"
             style="align-content: space-around;">


            <?php if (!isset($_SESSION["auth"])) { ?>
                <div class="col-5 text-center d-flex gap-1">
                    <a class="nav-link d-flex gap-1" href="<?= url("/login") ?>">
                        <img src="<?= assets("themes/user/img/user-white.png") ?>" height="20"/>
                        <?= Translate::get("common", "login") ?>
                    </a>
                </div>
            <?php } ?>


            <div class="col-3 text-center d-flex gap-1 <?= isset($_SESSION["auth"]) && $_SESSION["auth"] === true ? "" : "d-none" ?>">
                <?php
                $star_icon = "";
                if (RequestService::isRequestedRoute("/favourite")) {
                    $star_icon = "star-cyan";
                } else {
                    $star_icon = "star-white";
                }
                ?>

                <a href="<?= url("/favourite") ?>"
                   class="text-decoration-none d-flex gap-1 <?= RequestService::isRequestedRoute("/favourite") ? "selected" : "" ?>"
                   data-toggle="tooltip" title="Favourite">
                    <img src="<?= assets("themes/user/img/" . $star_icon . ".png") ?>" class="align-self-center"
                         height="23"/></a>


            </div>

            <?php if (isset($_SESSION["auth"]) && $_SESSION["auth"] === true) { ?>
                <div class="col-3 text-center d-flex gap-1">
                    <a class="nav-link d-flex gap-1" href="<?= url("/profile") ?>" data-toggle="tooltip"
                       title="Profile"><img
                                src="<?= assets("themes/user/img/user-white.png") ?>" class="align-self-center"
                                height="23"/></a>

                </div>
                <div class="col-2 text-center d-flex gap-1">
                    <a class="nav-link d-flex gap-1" href="<?= url("/logout") ?>" data-toggle="tooltip"
                       title="Logout"><img
                                src="<?= assets("themes/user/img/logout-white.png") ?>" class="align-self-center"
                                height="23"/></a>

                </div>

            <?php } ?>

        </div>

        <div class="nav">
            <a class="nav-link <?= RequestService::isRequestedRoute("/") ? "selected" : "" ?>" aria-current="page"
               href="<?= url("/") ?>">
                <?= Translate::get("home_nav", "connectors") ?>
            </a>

            <a class="nav-link <?= RequestService::isRequestedRoute("/downloads") ? "selected" : "" ?>"
               aria-current="page" href="<?= url("/downloads") ?>">
                <?= Translate::get("home_nav", "downloads") ?>
            </a>

            <a class="nav-link <?= RequestService::isRequestedRoute("/gallery") ? "selected" : "" ?>"
               aria-current="page" href="<?= url("/gallery") ?>">
                <?= Translate::get("home_nav", "gallery") ?>
            </a>
            <a class="nav-link" target="_blank" aria-current="page" href="https://steelant.eu/">
                <?= Translate::get("home_nav", "sealant") ?>
            </a>
            <a class="nav-link <?= RequestService::isRequestedRoute("/contact") ? "selected" : "" ?>"
               aria-current="page" href="<?= url("/contact") ?>">
                <?= Translate::get("home_nav", "contact") ?>
            </a>
        </div>

        <div class="text-center row position-relative login-nav gap-2"
             style="align-content: space-around;">


            <?php if (!isset($_SESSION["auth"])) { ?>
                <div class="col-5 text-center d-flex gap-1">
                    <a class="nav-link d-flex gap-1" href="<?= url("/login") ?>">
                        <img src="<?= assets("themes/user/img/user-white.png") ?>" height="20"/>
                        <?= Translate::get("common", "login") ?>
                    </a>
                </div>
            <?php } ?>


            <div class="col-3 text-center d-flex gap-1 <?= isset($_SESSION["auth"]) && $_SESSION["auth"] === true ? "" : "d-none" ?>">
                <?php
                $star_icon = "";
                if (RequestService::isRequestedRoute("/favourite")) {
                    $star_icon = "star-cyan";
                } else {
                    $star_icon = "star-white";
                }
                ?>

                <a href="<?= url("/favourite") ?>"
                   class="text-decoration-none d-flex gap-1 <?= RequestService::isRequestedRoute("/favourite") ? "selected" : "" ?>"
                   data-toggle="tooltip" title="<?= Translate::get("home_nav", "favourites") ?>">
                    <img src="<?= assets("themes/user/img/" . $star_icon . ".png") ?>" class="align-self-center"
                         height="23"/>
                </a>


            </div>

            <?php if (isset($_SESSION["auth"]) && $_SESSION["auth"] === true) { ?>

                <?php
                $user_icon = "";
                if (RequestService::isRequestedRoute("/profile")) {
                    $user_icon = "user-cyan";
                } else {
                    $user_icon = "user-white";
                }
                ?>
                <div class="col-3 text-center d-flex gap-1">
                    <a class="nav-link d-flex gap-1" href="<?= url("/profile") ?>" data-toggle="tooltip"
                       title="<?= Translate::get("home_nav", "profile") ?>">
                        <img src="<?= assets("themes/user/img/" . $user_icon . ".png") ?>" class="align-self-center"
                             height="23"/>
                    </a>
                </div>
                <div class="col-2 text-center d-flex gap-1">
                    <a class="nav-link d-flex gap-1" href="<?= url("/logout") ?>" data-toggle="tooltip" title="<?= Translate::get("common", "logout") ?>">
                        <img src="<?= assets("themes/user/img/logout-white.png") ?>" class="align-self-center"
                             height="23"/>
                    </a>
                </div>

            <?php } ?>

        </div>

    </div>

</nav>
<!--navbar section-->