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
                <li><a href="<?= url("/about") ?>"
                       class="text-decoration-none  <?= RequestService::isRequestedRoute("/about") ? "selected" : "color-custom-light" ?>">
                        <?= Translate::get("home_nav", "about_steelwall") ?>
                    </a>
                </li>
                <li>
                    <a href="<?= url("/register") ?>"
                       class="text-decoration-none <?= RequestService::isRequestedRoute("/register") ? "selected" : "color-custom-light" ?>">
                        <?= Translate::get("common", "register") ?>
                    </a>
                </li>
                <li>
                    <a href="<?= url("/newsletter") ?>"
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
                    <a href="<?= url("/imprint") ?>"
                       class="text-decoration-none <?= RequestService::isRequestedRoute("/imprint") ? "selected" : "color-custom-light" ?>">
                        <?= Translate::get("home_nav", "imprint") ?>
                    </a>
                </li>
                <li>
                    <a href="<?= url("/privacy&policy") ?>"
                       class="text-decoration-none <?= RequestService::isRequestedRoute("/privacy&policy") ? "selected" : "color-custom-light" ?>">
                        <?= Translate::get("home_nav", "privacy_policy") ?>
                    </a>
                </li>
                <li>
                    <a href="<?= url("/general/terms&condition") ?>"
                       class="text-decoration-none <?= RequestService::isRequestedRoute("/general/terms&condition") ? "selected" : "color-custom-light" ?>">
                        <?= Translate::get("home_nav", "general_terms_and_conditions") ?>
                    </a>
                </li>
            </ul>
        </div>

        <div class="col-12 col-md-2 col-xxl-2">
            <h4 class="mb-4 color-custom-light">steelwall.eu</h4>

            <ul style="list-style-type: none; padding-left: 0;">

                <li><a href="<?= url("/contact") ?>#eu" class="text-decoration-none color-custom-light">Africa</a></li>
                <li><a href="<?= url("/contact") ?>#eu" class="text-decoration-none color-custom-light">Asia</a></li>
                <li><a href="<?= url("/contact") ?>#eu" class="text-decoration-none color-custom-light">Australia</a>
                </li>
                <li><a href="<?= url("/contact") ?>#eu" class="text-decoration-none color-custom-light">Caribbean</a>
                </li>
                <li><a href="<?= url("/contact") ?>#eu" class="text-decoration-none color-custom-light">Europe</a></li>
                <li><a href="<?= url("/contact") ?>#eu" class="text-decoration-none color-custom-light">India</a></li>
                <li><a href="<?= url("/contact") ?>#eu" class="text-decoration-none color-custom-light">New Zealand</a>
                </li>
                <li><a href="<?= url("/contact") ?>#eu" class="text-decoration-none color-custom-light">South
                        America</a></li>
                <li><a href="<?= url("/contact") ?>#eu" class="text-decoration-none color-custom-light">South East
                        Asia</a></li>
            </ul>
        </div>


        <div class="col-12 col-md-2 col-xxl-2">
            <h4 class="mb-4 color-custom-light">steelwallus.com</h4>

            <ul style="list-style-type: none; padding-left: 0;">
                <li><a href="<?= url("/contact") ?>#north-america" class="text-decoration-none color-custom-light">North
                        America</a></li>
            </ul>
        </div>


        <div class="col-12 col-md-2 col-xxl-2">
            <h4 class="mb-4 color-custom-light">MF-pipe.com</h4>

            <ul style="list-style-type: none; padding-left: 0;">
                <li><a href="https://mf-pipe.com/" target="_blank" class="text-decoration-none color-custom-light">MF-Pipe
                        is a division of SteelWall</a></li>
            </ul>
        </div>

    </div>

    <div class="row">
        <div class="col-6 col-md-4">

            <p class="color-custom-light">
                Last website update: 01. Mar. 2024<br/>
                Copyright by SteelWall ISH GmbH<br/>
                Connectors designed by Richard Heindl
            </p>
        </div>

    </div>

</div>

