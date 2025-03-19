<?php
use \helpers\services\RequestService;
use \helpers\translate\Translate;
use \helpers\pools\LanguagePool;
?>

<?php
global $env;
?>
<!--navbar section-->
<nav class="navbar fixed-top position-relative">

    <div class="container-fluid align-items-base">
        <div class="text-center row position-relative p-2">
            <div class="col-4 mt-5 text-center reveal-on-sm" style="display: none;">
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

            <div class="w-25 d-flex gap-2 align-middle remove-on-sm invisible">
                <a href="" title="" class="">
                    <img src="<?= assets("img/flags/de.png") ?>" height="20" width="20"
                         class="flag selected-flag" alt="lang-de"/>
                </a>
                <a href="" title="" class="">
                    <img src="<?= assets("img/flags/en-gb.png") ?>" height="20" width="20"
                         class="flag" alt="lang-en-gb"/>
                </a> <a href="" title="" class="">
                    <img src="<?= assets("img/flags/en-us.png") ?>" height="20" width="20"
                         class="flag" alt="lang-en-us"/>
                </a>
                <a href="" title="" class="">
                    <img src="<?= assets("img/flags/fr.png") ?>" height="20" width="20"
                         class="flag" alt="lang-fr"/>
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
                    <img src="<?= assets("themes/user/img/user.png") ?>" height="30"  alt="profile"/><br/>
                </a>
            </div>

            <div class="w-25 d-flex gap-2 align-middle remove-on-sm">
                <a href="?lang=<?=LanguagePool::GERMANY()->getLabel()?>"
                   title="<?=LanguagePool::GERMANY()->getLabel()?>"
                   class="lang"
                   data-lang="<?=LanguagePool::GERMANY()->getLabel()?>">
                    <img src="<?= assets("img/flags/de.png") ?>" height="20" width="20"
                         class="flag
                              <?= isset($_SESSION["lang"]) && $_SESSION["lang"] == LanguagePool::GERMANY()->getLabel()
                             ? "selected-flag" : "" ?>"  alt="lang-de"/>
                </a>
                <a href="?lang=<?=LanguagePool::FRENCH()->getLabel()?>"
                   title="<?=LanguagePool::FRENCH()->getLabel()?>"
                   data-lang="<?=LanguagePool::FRENCH()->getLabel()?>"
                   class="lang"
                >
                    <img src="<?= assets("img/flags/fr.png") ?>" height="20" width="20"
                         class="flag
                                <?= isset($_SESSION["lang"]) && $_SESSION["lang"] == LanguagePool::FRENCH()->getLabel()
                             ? "selected-flag" : "" ?>"  alt="lang-fr"/>
                </a>
                <a href="?lang=<?=LanguagePool::UK_ENGLISH()->getLabel()?>"
                   title="<?=LanguagePool::UK_ENGLISH()->getLabel()?>"
                   data-lang="<?=LanguagePool::UK_ENGLISH()->getLabel()?>"
                   class="lang"
                >
                    <img src="<?= assets("img/flags/en-gb.png") ?>" height="20" width="20"
                         class="flag
                               <?= isset($_SESSION["lang"]) && $_SESSION["lang"] == LanguagePool::UK_ENGLISH()->getLabel()
                             ? "selected-flag" : "" ?>" alt="lang-en-gb"/>
                </a>
                <a href="?lang=<?=LanguagePool::US_ENGLISH()->getLabel()?>"
                   title="<?=LanguagePool::US_ENGLISH()->getLabel()?>"
                   data-lang="<?=LanguagePool::US_ENGLISH()->getLabel()?>"
                   class="lang"
                >
                    <img src="<?= assets("img/flags/en-us.png") ?>" height="20" width="20"
                         class="flag
                                <?= isset($_SESSION["lang"]) && $_SESSION["lang"] == LanguagePool::US_ENGLISH()->getLabel()
                             ? "selected-flag" : "" ?>" alt="lang-en-us"/>
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
                        <img src="<?= assets("themes/user/img/user-white.png") ?>" height="20" width="20" alt="profile"/>
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
                         height="23" width="23" alt="favourite"/></a>


            </div>

            <?php if (isset($_SESSION["auth"]) && $_SESSION["auth"] === true) { ?>
                <div class="col-3 text-center d-flex gap-1">
                    <a class="nav-link d-flex gap-1" href="<?= url("/profile") ?>" data-toggle="tooltip"
                       title="Profile"><img
                                src="<?= assets("themes/user/img/user-white.png") ?>" class="align-self-center"
                                height="23" alt="profile"/></a>

                </div>
                <div class="col-2 text-center d-flex gap-1">
                    <a class="nav-link d-flex gap-1" href="<?= url("/logout") ?>" data-toggle="tooltip"
                       title="Logout"><img
                                src="<?= assets("themes/user/img/logout-white.png") ?>" class="align-self-center"
                                height="23" alt="logout"/></a>

                </div>

            <?php } ?>

        </div>

        <div class="nav">
            <a class="nav-link <?= RequestService::isRequestedRoute("/") ? "selected" : "" ?>" aria-current="page"
               href="<?= url("/") ?>?lang=<?=Translate::getLang()?>">
                <?= Translate::get("home_nav", "connectors") ?>
            </a>

            <a class="nav-link <?= RequestService::isRequestedRoute("/downloads") ? "selected" : "" ?>"
               aria-current="page" href="<?= url("/downloads") ?>?lang=<?=Translate::getLang()?>">
                <?= Translate::get("home_nav", "downloads") ?>
            </a>

            <a class="nav-link <?= RequestService::isRequestedRoute("/gallery") ? "selected" : "" ?>"
               aria-current="page" href="<?= url("/gallery") ?>?lang=<?=Translate::getLang()?>">
                <?= Translate::get("home_nav", "gallery") ?>
            </a>
            <a class="nav-link" target="_blank" aria-current="page" href="https://steelant.eu/">
                <?= Translate::get("home_nav", "sealant") ?>
            </a>
            <a class="nav-link <?= RequestService::isRequestedRoute("/contact") ? "selected" : "" ?>"
               aria-current="page" href="<?= url("/contact") ?>?lang=<?=Translate::getLang()?>">
                <?= Translate::get("home_nav", "contact") ?>
            </a>
        </div>

        <div class="text-center row position-relative login-nav gap-2"
             style="align-content: space-around;">


            <?php if (!isset($_SESSION["auth"])) { ?>
                <div class="col-5 text-center d-flex gap-1">
                    <a class="nav-link d-flex gap-1" href="<?= url("/login") ?>?lang=<?=Translate::getLang()?>">
                        <img src="<?= assets("themes/user/img/user-white.png") ?>" height="20" width="20" alt="login-icon"/>
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

                <a href="<?= url("/favourite") ?>?lang=<?=Translate::getLang()?>"
                   class="text-decoration-none d-flex gap-1 <?= RequestService::isRequestedRoute("/favourite") ? "selected" : "" ?>"
                   data-toggle="tooltip" title="<?= Translate::get("home_nav", "favourites") ?>">
                    <img src="<?= assets("themes/user/img/" . $star_icon . ".png") ?>" class="align-self-center"
                         height="23" width="23" alt="profile"/>
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
                    <a class="nav-link d-flex gap-1" href="<?= url("/profile") ?>?lang=<?=Translate::getLang()?>" data-toggle="tooltip"
                       title="<?= Translate::get("home_nav", "profile") ?>">
                        <img src="<?= assets("themes/user/img/" . $user_icon . ".png") ?>" class="align-self-center"
                             height="23" alt="profile"/>
                    </a>
                </div>
                <div class="col-2 text-center d-flex gap-1">
                    <a class="nav-link d-flex gap-1" href="<?= url("/logout") ?>" data-toggle="tooltip" title="<?= Translate::get("common", "logout") ?>">
                        <img src="<?= assets("themes/user/img/logout-white.png") ?>" class="align-self-center"
                             height="23" alt="profile"/>
                    </a>
                </div>

            <?php } ?>

        </div>

    </div>

</nav>
<!--navbar section-->