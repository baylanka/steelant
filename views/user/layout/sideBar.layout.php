<?php
    use helpers\services\RequestService;
    use helpers\translate\Translate;
    use helpers\pools\LanguagePool;
    use helpers\services\RouterService;
?>
<div class="offcanvas offcanvas-start"
     tabindex="-1"
     id="offcanvasNavbar"
     aria-labelledby="offcanvasNavbarLabel" style="z-index:10000;">

    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
            <?= Translate::get("common", "menu") ?>
        </h5>
        <button
                type="button"
                class="btn-close"
                data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
    </div>


    <div class="offcanvas-body">

        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
                <span class="nav-link color-blue" aria-current="page"
                   href="#">
                    Connectors / Categories
                </span>

                <ul style="list-style-type: none;">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= RouterService::getCategoryPageRoute(3) ?>">
                            Cofferdam
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= RouterService::getCategoryPageRoute(17) ?>">
                            Pipe pile steel walls
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= RouterService::getCategoryPageRoute(22) ?>">
                            DTH driving method
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= RouterService::getCategoryPageRoute(24) ?>">
                            Pipe pile + sheet pile combined walls
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= RouterService::getCategoryPageRoute(30) ?>">
                            H-pile walls
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= RouterService::getCategoryPageRoute(34) ?>">
                            H-pile + sheet pile combined walls
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= RouterService::getCategoryPageRoute(36) ?>">
                            Cell structures
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= RequestService::isRequestedRoute("/downloads") ? "selected" : "" ?>"
                   aria-current="page" href="<?= url("/downloads") ?>">
                    <?= Translate::get("home_nav", "downloads") ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= RequestService::isRequestedRoute("/gallery") ? "selected" : "" ?>"
                   aria-current="page" href="<?= url("/gallery") ?>">
                    <?= Translate::get("home_nav", "gallery") ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" target="_blank"
                   aria-current="page" href="https://steelant.eu/">
                    <?= Translate::get("home_nav", "sealant") ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= RequestService::isRequestedRoute("/contact") ? "selected" : "" ?>"
                   aria-current="page" href="<?= url("/contact") ?>">
                    <?= Translate::get("home_nav", "contact") ?>
                </a>
            </li>
            <?php if (isset($_SESSION["auth"]) && $_SESSION["auth"] === true) { ?>
                <li class="nav-item">
                    <a class="nav-link <?= RequestService::isRequestedRoute("/favourite") ? "selected" : "" ?>"
                       href="<?= url("/favourite") ?>">
                        <?= Translate::get("home_nav", "favourites") ?>
                    </a>
                </li>
            <?php } ?>
            <li class="nav-item">


                <?php if (isset($_SESSION["auth"]) && $_SESSION["auth"] === true) { ?>
                    <a class="nav-link" aria-current="page" href="<?= url("/logout") ?>">
                        <?= Translate::get("common", "logout") ?>
                    </a>
                <?php } else { ?>
                    <a class="nav-link <?= RequestService::isRequestedRoute("/login") ? "selected" : "" ?>"
                       aria-current="page" href="<?= url("/login") ?>">
                        <?= Translate::get("common", "login") ?>
                    </a>
                <?php } ?>

            </li>

            <li class="nav-item">
                <span class="nav-link color-blue">
                    <?= Translate::get("home_nav", "user_information") ?>
                </span>
                <ul style="list-style-type: none;">
                    <li class="nav-item">
                        <a class="nav-link <?= RequestService::isRequestedRoute("/about") ? "selected" : "" ?>"
                           href="<?= url("/about") ?>">
                            <?= Translate::get("home_nav", "about_steelwall") ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= RequestService::isRequestedRoute("/newsletter") ? "selected" : "" ?>"
                           href="<?= url("/newsletter") ?>">
                            <?= Translate::get("home_nav", "newsletter") ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= RequestService::isRequestedRoute("/register") ? "selected" : "" ?>"
                           href="<?= url("/register") ?>">
                            <?= Translate::get("common", "register") ?>
                        </a>
                    </li>
                    <li class="nav-item" href="#">
                        <span class="nav-link">
                            <?= Translate::get("home_nav", "languages_and_measures") ?>
                        </span>
                    </li>

                </ul>
            </li>

            <li class="nav-item">
                <span class="nav-link color-blue">
                    <?= Translate::get("home_nav", "legal_advice") ?>
                </span>
                <ul style="list-style-type: none;">
                    <li class="nav-item">
                        <a class="nav-link <?= RequestService::isRequestedRoute("/imprint") ? "selected" : "" ?>"
                           href="<?= url("/imprint") ?>">
                            <?= Translate::get("home_nav", "imprint") ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= RequestService::isRequestedRoute("/privacy") ? "selected" : "" ?>"
                           href="<?= url("/privacy") ?>">
                            <?= Translate::get("home_nav", "privacy_policy") ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= RequestService::isRequestedRoute("/general/terms&condition") ? "selected" : "" ?>"
                           href="<?= url("/general/terms&condition") ?>">
                            <?= Translate::get("home_nav", "general_terms_and_conditions") ?>
                        </a>
                    </li>

                </ul>
            </li>

        </ul>
        <div class="w-100 d-flex justify-content-center mt-5 pt-5 gap-3 align-middle">
            <a
                    href="?lang=<?=LanguagePool::GERMANY()->getLabel()?>"
                    title="<?=LanguagePool::GERMANY()->getLabel()?>"
                    class="lang"
                    data-lang="<?=LanguagePool::GERMANY()->getLabel()?>">
                <img src="<?= assets("img/flags/de.png") ?>" height="25"
                     class="flag
                        <?= isset($_SESSION["lang"]) && $_SESSION["lang"] == LanguagePool::GERMANY()->getLabel()
                            ? "selected-flag" : "" ?>"/>
            </a>
            <a
                    href="?lang=<?=LanguagePool::FRENCH()->getLabel()?>"
                    title="<?=LanguagePool::FRENCH()->getLabel()?>"
                    class="lang"
                    data-lang="<?=LanguagePool::FRENCH()->getLabel()?>">
                <img src="<?= assets("img/flags/fr.png") ?>" height="25"
                     class="flag
                        <?= isset($_SESSION["lang"]) && $_SESSION["lang"] == LanguagePool::FRENCH()->getLabel()
                         ? "selected-flag" : "" ?>"/>
            </a>
            <a
                    href="?lang=<?=LanguagePool::UK_ENGLISH()->getLabel()?>"
                    title="<?=LanguagePool::UK_ENGLISH()->getLabel()?>"
                    class="lang"
                    data-lang="<?=LanguagePool::UK_ENGLISH()->getLabel()?>">
                <img src="<?= assets("img/flags/en-gb.png") ?>" height="25"
                     class="flag
                        <?= isset($_SESSION["lang"]) && $_SESSION["lang"] == LanguagePool::UK_ENGLISH()->getLabel()
                            ? "selected-flag" : "" ?>"/>
            </a>
            <a
                    href="?lang=<?=LanguagePool::US_ENGLISH()->getLabel()?>"
                    title="<?=LanguagePool::US_ENGLISH()->getLabel()?>"
                    class="lang"
                    data-lang="<?=LanguagePool::US_ENGLISH()->getLabel()?>">

                <img src="<?= assets("img/flags/en-us.png") ?>" height="25"
                     class="flag
                        <?= isset($_SESSION["lang"]) && $_SESSION["lang"] == LanguagePool::US_ENGLISH()->getLabel()
                            ? "selected-flag" : "" ?>"/>
            </a>


        </div>

    </div>
</div>