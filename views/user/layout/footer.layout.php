<?php

use helpers\services\RequestService;
use helpers\translate\Translate;

?>
<div class="footer fixed-bottom position-relative mt-5 w-100 p-4">

    <div class="row">
        <div class="col-12 col-md-10">
            <h4 class="color-custom-light"><?= Translate::get("home_footer", "disclaimer") ?></h4>

            <p class="color-custom-light mb-4">
                <?= Translate::get("home_footer", "disclaimer_text") ?>
            </p>
        </div>


    </div>


    <div class="divider-white mt-5 mb-3"></div>


    <div class="row">
        <div class="col-12 col-md-4">
            <h4 class="color-custom-light">SteelWall</h4>

            <ul style="list-style-type: none; padding-left: 0;">
                <li><a href="<?= url("/about") ?>?lang=<?=Translate::getLang()?>"
                       class="text-decoration-none  <?= RequestService::isRequestedRoute("/about") ? "selected" : "color-custom-light" ?>">
                        <?= Translate::get("home_nav", "about_steelwall") ?>
                    </a>
                </li>
                <li>
                    <a href="<?= url("/register") ?>?lang=<?=Translate::getLang()?>"
                       class="text-decoration-none <?= RequestService::isRequestedRoute("/register") ? "selected" : "color-custom-light" ?>">
                        <?= Translate::get("common", "register") ?>
                    </a>
                </li>
                <li>
                    <a href="<?= url("/newsletter") ?>?lang=<?=Translate::getLang()?>"
                       class="text-decoration-none <?= RequestService::isRequestedRoute("/newsletter") ? "selected" : "color-custom-light" ?>">
                        <?= Translate::get("home_nav", "newsletter") ?>
                    </a>
                </li>
                <li>
                    <a href="#" class="text-decoration-none color-custom-light">
                        <?= Translate::get("home_nav", "languages_and_measures") ?>
                    </a>
                </li>

            </ul>

            <h4 class="mt-5 color-custom-light">
                <?= Translate::get("home_nav", "legal_advice") ?>
            </h4>

            <ul style="list-style-type: none; padding-left: 0;">
                <li>
                    <a href="<?= url("/imprint") ?>?lang=<?=Translate::getLang()?>"
                       class="text-decoration-none <?= RequestService::isRequestedRoute("/imprint") ? "selected" : "color-custom-light" ?>">
                        <?= Translate::get("home_nav", "imprint") ?>
                    </a>
                </li>
                <li>
                    <a href="<?= url("/privacy&policy") ?>?lang=<?=Translate::getLang()?>"
                       class="text-decoration-none <?= RequestService::isRequestedRoute("/privacy&policy") ? "selected" : "color-custom-light" ?>">
                        <?= Translate::get("home_nav", "privacy_policy") ?>
                    </a>
                </li>
                <li>
                    <a href="<?= url("/general/terms&condition") ?>?lang=<?=Translate::getLang()?>"
                       class="text-decoration-none <?= RequestService::isRequestedRoute("/general/terms&condition") ? "selected" : "color-custom-light" ?>">
                        <?= Translate::get("home_nav", "general_terms_and_conditions") ?>
                    </a>
                </li>
            </ul>
        </div>

        <div class="col-12 col-md-2 col-xxl-2">
            <h4 class="mb-4 color-custom-light">steelwall.eu</h4>

            <ul style="list-style-type: none; padding-left: 0;">

                <li>
                    <a href="<?= url("/contact") ?>?lang=<?=Translate::getLang()?>#eu" class="text-decoration-none color-custom-light">
                        <?= Translate::get("home_footer", "africa") ?>
                    </a>
                </li>
                <li>
                    <a href="<?= url("/contact") ?>?lang=<?=Translate::getLang()?>#eu" class="text-decoration-none color-custom-light">
                        <?= Translate::get("home_footer", "asia") ?>
                    </a>
                </li>
                <li>
                    <a href="<?= url("/contact") ?>?lang=<?=Translate::getLang()?>#eu" class="text-decoration-none color-custom-light">
                        <?= Translate::get("home_footer", "australia") ?>
                    </a>
                </li>
                <li>
                    <a href="<?= url("/contact") ?>?lang=<?=Translate::getLang()?>#eu" class="text-decoration-none color-custom-light">
                        <?= Translate::get("home_footer", "caribbean") ?>
                    </a>
                </li>
                <li>
                    <a href="<?= url("/contact") ?>?lang=<?=Translate::getLang()?>#eu" class="text-decoration-none color-custom-light">
                        <?= Translate::get("home_footer", "europe") ?>
                    </a>
                </li>
                <li>
                    <a href="<?= url("/contact") ?>?lang=<?=Translate::getLang()?>#eu" class="text-decoration-none color-custom-light">
                        <?= Translate::get("home_footer", "india") ?>
                    </a>
                </li>
                <li>
                    <a href="<?= url("/contact") ?>?lang=<?=Translate::getLang()?>#eu" class="text-decoration-none color-custom-light">
                        <?= Translate::get("home_footer", "new_zealand") ?>
                    </a>
                </li>
                <li>
                    <a href="<?= url("/contact") ?>?lang=<?=Translate::getLang()?>#eu" class="text-decoration-none color-custom-light">South
                        <?= Translate::get("home_footer", "south_america") ?>
                    </a>
                </li>
            </ul>
        </div>


        <div class="col-12 col-md-2 col-xxl-2">
            <h4 class="mb-4 color-custom-light">steelwallus.com</h4>

            <ul style="list-style-type: none; padding-left: 0;">
                <li>
                    <a href="<?= url("/contact") ?>?lang=<?=Translate::getLang()?>#north-america" class="text-decoration-none color-custom-light">
                        <?= Translate::get("home_footer", "north_america") ?>
                    </a>
                </li>
                <li>
                    <a href="<?= url("/contact") ?>?lang=<?=Translate::getLang()?>#north-america" class="text-decoration-none color-custom-light">
                        <?= Translate::get("home_footer", "south_east_asia") ?>
                    </a>
                </li>
                <li>
                    <a href="<?= url("/contact") ?>?lang=<?=Translate::getLang()?>#north-america" class="text-decoration-none color-custom-light">
                        <?= Translate::get("home_footer", "japan") ?>
                    </a>
                </li>
                <li>
                    <a href="<?= url("/contact") ?>?lang=<?=Translate::getLang()?>#north-america" class="text-decoration-none color-custom-light">
                        <?= Translate::get("home_footer", "oceania") ?>
                    </a>
                </li>
            </ul>
        </div>


        <div class="col-12 col-md-2 col-xxl-2">
            <h4 class="mb-4 color-custom-light">MF-pipe.com</h4>

            <ul style="list-style-type: none; padding-left: 0;">
                <li>
                    <a href="https://mf-pipe.com/" target="_blank" class="text-decoration-none color-custom-light">
                        <?= Translate::get("home_footer", "about_mf_pipe") ?>
                    </a>
                </li>
            </ul>
        </div>

    </div>

    <div class="row">
        <div class="col-6 col-md-4">

            <p class="color-custom-light">
                <?= Translate::get("home_footer", "last_website_update") ?> 01. Mar. 2024<br/>
                Copyright by SteelWall ISH GmbH<br/>
                Connectors designed by Richard Heindl
            </p>
        </div>

    </div>

</div>

