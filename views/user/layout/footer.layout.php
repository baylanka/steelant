<?php

use helpers\services\ContentService;
use helpers\services\RequestService;
use helpers\translate\Translate;

?>
<div class="footer fixed-bottom position-relative mt-5 w-100 alignment-full-padding">

    <div class="row">
        <div class="col-12 col-md-12">
            <h5 class="color-custom-light disclaimer-text"><?= Translate::get("home_footer", "disclaimer") ?></h5>

            <p class="color-custom-light mb-4">
                <?= Translate::get("home_footer", "disclaimer_text") ?>
            </p>
        </div>
    </div>


    <div class="divider-white mt-5"></div>


    <div class="row mt-5">
        <div class="col-12 col-md-4">
            <h5 class="color-custom-light">SteelWall</h5>

            <ul class="footer-content-ul color-custom-light">
                <li><a href="<?= url("/about") ?>?lang=<?= Translate::getLang() ?>"
                       class="text-decoration-none  <?= RequestService::isRequestedRoute("/about") ? "selected" : "color-custom-light" ?>">
                        <?= Translate::get("home_nav", "about_steelwall") ?>
                    </a>
                </li>
                <li>
                    <a href="<?= url("/register") ?>?lang=<?= Translate::getLang() ?>"
                       class="text-decoration-none <?= RequestService::isRequestedRoute("/register") ? "selected" : "color-custom-light" ?>">
                        <?= Translate::get("common", "register") ?>
                    </a>
                </li>
                <li>
                    <a href="<?= url("/newsletter") ?>?lang=<?= Translate::getLang() ?>"
                       class="text-decoration-none <?= RequestService::isRequestedRoute("/newsletter") ? "selected" : "color-custom-light" ?>">
                        <?= Translate::get("home_nav", "newsletter") ?>
                    </a>
                </li>
            </ul>

            <h5 class="mt-5 color-custom-light">
                <?= Translate::get("home_nav", "legal_advice") ?>
            </h5>

            <ul class="footer-content-ul color-custom-light">
                <li>
                    <a href="<?= url("/imprint") ?>?lang=<?= Translate::getLang() ?>"
                       class="text-decoration-none <?= RequestService::isRequestedRoute("/imprint") ? "selected" : "color-custom-light" ?>">
                        <?= Translate::get("home_nav", "imprint") ?>
                    </a>
                </li>
                <li>
                    <a href="<?= url("/privacy") ?>?lang=<?= Translate::getLang() ?>"
                       class="text-decoration-none <?= RequestService::isRequestedRoute("/privacy") ? "selected" : "color-custom-light" ?>">
                        <?= Translate::get("home_nav", "privacy_policy") ?>
                    </a>
                </li>
                <li>
                    <a href="<?= url("/general/terms&condition") ?>?lang=<?= Translate::getLang() ?>"
                       class="text-decoration-none <?= RequestService::isRequestedRoute("/general/terms&condition") ? "selected" : "color-custom-light" ?>">
                        <?= Translate::get("home_nav", "general_terms_and_conditions") ?>
                    </a>
                </li>
            </ul>
        </div>

        <div class="col-12 col-md-2 col-xxl-2 footer-nav-list-padding-2x">
            <a href="https://www.steelwall.eu" class="text-decoration-none color-custom-light mb-4">
                <h5>steelwall.eu</h5>
            </a>

            <ul class="footer-content-ul color-custom-light">
                <li>
                    <?= Translate::get("home_footer", "africa") ?>
                </li>
                <li>
                    <?= Translate::get("home_footer", "asia") ?>
                </li>
                <li>
                    <?= Translate::get("home_footer", "australia") ?>
                </li>
                <li>
                    <?= Translate::get("home_footer", "europe") ?>
                </li>
                <li>
                    <?= Translate::get("home_footer", "india") ?>
                </li>
                <li>
                    <?= Translate::get("home_footer", "japan") ?>
                </li>
                <li>
                    <?= Translate::get("home_footer", "caribbean") ?>
                </li>
                <li>
                    <?= Translate::get("home_footer", "new_zealand") ?>
                </li>
                <li>
                    <?= Translate::get("home_footer", "oceania") ?>
                </li>
                <li>
                    <?= Translate::get("home_footer", "south_america") ?>
                </li>
                <li>
                    <?= Translate::get("home_footer", "south_east_asia") ?>
                </li>
            </ul>
        </div>


        <div class="col-12 col-md-2 col-xxl-2 footer-nav-list-padding">
            <a href="https://www.steelwallus.com" class="text-decoration-none color-custom-light mb-4">
                <h5>steelwallus.com</h5>
            </a>

            <ul class="footer-content-ul color-custom-light">
                <li>
                    <?= Translate::get("home_footer", "north_america") ?>
                </li>
            </ul>
        </div>


        <div class="col-12 col-md-2 col-xxl-2 footer-nav-list-padding">
            <a href="https://mf-pipe.com/" target="_blank" class="text-decoration-none color-custom-light mb-4">
                <h5>mf-pipe.com</h5>
            </a>
            <ul class="footer-content-ul color-custom-light">
                <li>
                    <?= Translate::get("home_footer", "about_mf_pipe") ?>
                </li>
            </ul>
        </div>

    </div>

    <div class="row">
        <div class="col-12 col-md-4">

            <p class="color-custom-light">
                <?= Translate::get("home_footer", "last_website_update") ?> <?= ContentService::getLastUpdatedDate()?><br/>
                Copyrighted property of<br/>
                Steelwall ISH GmbH, all rights reserved.<br/>
                Connectors designed by Richard Heindl
            </p>
        </div>

    </div>

</div>

