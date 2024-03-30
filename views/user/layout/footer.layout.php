<?php use helpers\services\RequestService; ?>

<!--footer section-->
<div class="nav footer fixed-bottom position-relative mt-5">
    <h4 class="color-custom-light">Disclaimer</h4>

    <p class="disclaimer-text color-custom-light">
        SteelWall connectors generally comply with the European standards and
        are manufactured by certified steel processing companies. All figures
        are approximate and may vary. Bar twists are possible up to 2 mm per
        meter. Tolerance of steel thickness Â±1 mm. Length tolerance up to Â±200
        mm. Degree details refer to the connector bar axes. Welding base of LPB
        and FD clutches can be straight or bevelled. We reserve the right to
        make technical changes. We refer to DIN EN 12063. Please check the sheet
        pile interlocks with a physical sample section of the desired connector
        for compatibility.
    </p>

    <span class="divider-white mt-5 mb-5"></span>

    <div class="row w-100">
        <div class="col-6 col-md-3">
            <h4 class="color-custom-light">SteelWall</h4>

            <ul style="list-style-type: none; padding-left: 0;">
                <li><a href="<?= url("/about") ?>" class="text-decoration-none  <?= RequestService::isRequestedRoute("/about") ? "selected" : "color-custom-light" ?>">About SteelWall</a></li>
                <li><a href="<?= url("/register") ?>" class="text-decoration-none <?= RequestService::isRequestedRoute("/register") ? "selected" : "color-custom-light" ?>">Registration</a></li>
                <li><a href="<?= url("/newsletter") ?>" class="text-decoration-none <?= RequestService::isRequestedRoute("/newsletter") ? "selected" : "color-custom-light" ?>">Newsletter</a></li>
                <li><a href="#" class="text-decoration-none color-custom-light">Languages and measures</a></li>

            </ul>

            <h4 class="mt-5 color-custom-light">Legal advice</h4>

            <ul style="list-style-type: none; padding-left: 0;">
                <li><a href="<?= url("/imprint") ?>" class="text-decoration-none <?= RequestService::isRequestedRoute("/imprint") ? "selected" : "color-custom-light" ?>">Imprint</a></li>
                <li><a href="<?= url("/privacy&policy") ?>" class="text-decoration-none <?= RequestService::isRequestedRoute("/privacy&policy") ? "selected" : "color-custom-light" ?>">Privacy policy</a></li>
                <li><a href="<?= url("/general/terms&condition") ?>" class="text-decoration-none <?= RequestService::isRequestedRoute("/general/terms&condition") ? "selected" : "color-custom-light" ?>">General terms and conditions</a></li>
            </ul>
        </div>

        <div class="col-6 col-md-2">
            <h4 class="mb-4 color-custom-light">steelwall.eu</h4>

            <ul style="list-style-type: none; padding-left: 0;">

                <li><a href="#" class="text-decoration-none color-custom-light">Africa</a></li>
                <li><a href="#" class="text-decoration-none color-custom-light">Asia</a></li>
                <li><a href="#" class="text-decoration-none color-custom-light">Australia</a></li>
                <li><a href="#" class="text-decoration-none color-custom-light">Caribbean</a></li>
                <li><a href="#" class="text-decoration-none color-custom-light">Europe</a></li>
                <li><a href="#" class="text-decoration-none color-custom-light">India</a></li>
                <li><a href="#" class="text-decoration-none color-custom-light">New Zealand</a></li>
                <li><a href="#" class="text-decoration-none color-custom-light">South America</a></li>
                <li><a href="#" class="text-decoration-none color-custom-light">South East Asia</a></li>
            </ul>
        </div>

        <div class="col-6 col-md-2">
            <h4 class="mb-4 color-custom-light">steelwallus.com</h4>

            <ul style="list-style-type: none; padding-left: 0;">
                <li><a href="#" class="text-decoration-none color-custom-light">North America</a></li>
            </ul>
        </div>


        <div class="col-6 col-md-5">
            <h4 class="mb-4 color-custom-light">MF-pipe.com</h4>

            <ul style="list-style-type: none; padding-left: 0;">
                <li><a href="#" class="text-decoration-none color-custom-light">MF-Pipe is a division of SteelWall</a></li>
            </ul>
        </div>

    </div>


    <div class="row w-100">
        <div class="col-12 col-md-6">

            <p class="color-custom-light">
                Last website update: 01. Mar. 2024<br/>
                Copyright by SteelWall ISH GmbH<br/>
             Connectors designed by Richard Heindl
            </p>
        </div>


    </div>


</div>
<!--footer section-->