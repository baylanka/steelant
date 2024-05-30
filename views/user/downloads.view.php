<?php
require_once "layout/start.layout.php";
use helpers\translate\Translate;
?>

<!--body section-->
<div class="jumbotron w-100 p-0 m-0">

    <img src="<?= assets("themes/user/img/hero-image.png") ?>" class="w-100"/>

    <div class="mt-5 responsive-wrap">


        <!--categories section-->
        <div class="row w-100 justify-content-between">


            <div class="col-12 col-md-5 col-xxl-5 row">
                <div class="col-md-4">
                    <img src="<?= assets("themes/user/img/download-icon.png") ?>" height="80" class="mb-3"/>
                </div>
                <div class="col-md-7">
                    <dl class="pl-3">
                        <h4 class="selected"><?= Translate::get("download_page","downloads") ?></h4>
                        <p class="color-black"><?= Translate::get("download_page","please_register_before_download") ?></p>
                    </dl>

                </div>

            </div>

            <div class="col-12 col-md-7 col-xxl-7 row gap-3 justify-content-end d-none">
                <div class="col-12 col-md-3 col-xxl-3">
                    <dl>
                        <dt><a href="#" class="link color-blue"><?= strtoupper(Translate::get("download_page","test_reports")) ?></a></dt>
                    </dl>
                </div>
                <div class="col-12 col-md-3 col-xxl-3">
                    <dl>
                        <dt><a href="#" class="link color-blue"><?= strtoupper(Translate::get("download_page","brochures")) ?></a></dt>
                    </dl>
                </div>
                <div class="col-12 col-md-3 col-xxl-3">
                    <dl>
                        <dt><a href="#" class="link color-blue"><?= strtoupper(Translate::get("download_page","data_sheets")) ?></a></dt>
                    </dl>
                </div>

            </div>


        </div>
        <!--categories section-->


        <?php require_once "layout/sub_nav.layout.php" ?>

        <div class="divider"></div>

        <h4 class="connector-heading my-3"><?= Translate::get("download_page","test_reports") ?></h4>

        <div class="divider"></div>

        <div class="d-flex align-middle w-100 justify-content-between">
            <h6 class="connector-heading my-4 text-bold"><?= Translate::get("download_page","report_1") ?></h6>
            <a href="<?= isset($_SESSION["auth"]) && $_SESSION["auth"]  ? assets("storage/downloads_assets/2019 Tensile test report SteelWall LPB100-9A.pdf") : url("/login") ?>" class="mt-auto mb-auto" <?= isset($_SESSION["auth"]) ? "download" : "" ?>> <img src="<?= assets("themes/user/img/pdf.png") ?>" height="25"></a>
        </div>

        <div class="divider"></div>

        <div class="d-flex align-middle w-100 justify-content-between">
            <h6 class="connector-heading my-4 text-bold"><?= Translate::get("download_page","report_2") ?></h6>
            <a href="<?= isset($_SESSION["auth"]) && $_SESSION["auth"]  ? assets("storage/downloads_assets/2019 Tensile test report SteelWall MF64 and WOM-S_WOF-S .pdf") : url("/login")  ?>" class="mt-auto mb-auto" <?= isset($_SESSION["auth"]) ? "download" : "" ?>> <img src="<?= assets("themes/user/img/pdf.png") ?>" height="25"></a>
        </div>

        <div class="divider"></div>

        <div class="d-flex align-middle w-100 justify-content-between">
            <h6 class="connector-heading my-4 text-bold"><?= Translate::get("download_page","report_3") ?></h6>
            <a href="<?= isset($_SESSION["auth"]) && $_SESSION["auth"]  ? assets("storage/downloads_assets/20231120 FEM Tensile Test_MDF100_MF130.pdf") : url("/login")  ?>" class="mt-auto mb-auto" <?= isset($_SESSION["auth"]) ? "download" : "" ?>> <img src="<?= assets("themes/user/img/pdf.png") ?>" height="25"></a>
        </div>

        <div class="divider"></div>

        <div class="d-flex align-middle w-100 justify-content-between">
            <h6 class="connector-heading my-4 text-bold"><?= Translate::get("download_page","report_4") ?></h6>
            <a href="<?= isset($_SESSION["auth"]) && $_SESSION["auth"]  ? assets("storage/downloads_assets/F40-IC Tensile Test.pdf") : url("/login")  ?>" class="mt-auto mb-auto" <?= isset($_SESSION["auth"]) ? "download" : "" ?>> <img src="<?= assets("themes/user/img/pdf.png") ?>" height="25"></a>
        </div>

        <div class="divider"></div>

        <div class="d-flex align-middle w-100 justify-content-between">
            <h6 class="connector-heading my-4 text-bold"><?= Translate::get("download_page","report_5") ?></h6>
            <a href="<?= isset($_SESSION["auth"]) && $_SESSION["auth"]  ? assets("storage/downloads_assets/F90 Tensile Test.pdf") : url("/login")  ?>" class="mt-auto mb-auto" <?= isset($_SESSION["auth"]) ? "download" : "" ?>> <img src="<?= assets("themes/user/img/pdf.png") ?>" height="25"></a>
        </div>

        <div class="divider"></div>

        <div class="d-flex align-middle w-100 justify-content-between">
            <h6 class="connector-heading my-4 text-bold"><?= Translate::get("download_page","report_6") ?></h6>
            <a href="<?= isset($_SESSION["auth"]) && $_SESSION["auth"]  ? assets("storage/downloads_assets/SteelWall Tensile- and Twist out tests s2.pdf") : url("/login")  ?>" class="mt-auto mb-auto" <?= isset($_SESSION["auth"]) ? "download" : "" ?>> <img src="<?= assets("themes/user/img/pdf.png") ?>" height="25"></a>
        </div>

        <div class="divider mb-5"></div>

        <div class="divider mt-5"></div>

        <h4 class="connector-heading my-3"><?= Translate::get("download_page","brochures_and_data_sheets") ?></h4>

        <div class="divider"></div>


        <div class="row gap-5 my-5 w-100">
            <h6 class="connector-heading col-md-4 col-12 text-bold">Schlossprofile Übersicht 2024</h6>

            <span class="d-flex gap-2 col-md-6 col-12">
                <a href="<?= isset($_SESSION["auth"]) && $_SESSION["auth"]  ? assets("storage/downloads_assets/2023 12 11 SW Schlossprofile - Übersichten v45-02 lowres DE.pdf") : url("/login")  ?>" class="mt-auto mb-auto" <?= isset($_SESSION["auth"]) ? "download" : "" ?>>
                    <img src="<?= assets("themes/user/img/brochures-thumbnail/brocher-de.jpg") ?>" height="250"
                         class=" shadow ">
                </a>
                <img src="<?= assets("img/flags/de.png") ?>" height="25">
            </span>

        </div>


        <div class="divider"></div>



        <div class="row gap-5 my-5 w-100">
            <h6 class="color-blue col-md-4 col-12 text-bold">Aperçu connecteurs 2024</h6>

            <span class="d-flex gap-2 col-md-6 col-12">
                <a href="<?= isset($_SESSION["auth"]) && $_SESSION["auth"]  ? assets("storage/downloads_assets/2023 12 16 SW Aperçu connecteurs 2024 v19 FR lowres.pdf") : url("/login")  ?>" class="mt-auto mb-auto" <?= isset($_SESSION["auth"]) ? "download" : "" ?>>
                    <img src="<?= assets("themes/user/img/brochures-thumbnail/brocher-fr.jpg") ?>" height="250"
                         class=" shadow ">
                </a>
                <img src="<?= assets("img/flags/fr.png") ?>" height="25">
            </span>

        </div>


        <div class="divider"></div>



        <div class="row gap-5 my-5 w-100">

            <h6 class="connector-heading col-md-4 col-12 text-bold">Connectors overview 2024</h6>

            <span class="d-flex gap-2 col-md-6 col-12">
                <a href="<?= isset($_SESSION["auth"]) && $_SESSION["auth"]  ? assets("storage/downloads_assets/2023 12 19 SW connectors - overview 2024 v39 EN lowres.pdf") : url("/login")  ?>" class="mt-auto mb-auto" <?= isset($_SESSION["auth"]) ? "download" : "" ?>>
                    <img src="<?= assets("themes/user/img/brochures-thumbnail/brocher-en.jpg") ?>" height="250"
                         class=" shadow ">
                </a>
                <img src="<?= assets("img/flags/en-gb.png") ?>" height="25">
            </span>

        </div>



        <div class="divider"></div>


        <div class="row gap-5 my-5 w-100">
            <h6 class="connector-heading col-md-4 col-12 text-bold">Connectors overview 2024</h6>

            <span class="d-flex gap-2 col-md-6 col-12">
                <a href="<?= isset($_SESSION["auth"]) && $_SESSION["auth"]  ? assets("storage/downloads_assets/2024 02 24 SW connectors - overview v37 US lowres.pdf") : url("/login")  ?>" class="mt-auto mb-auto" <?= isset($_SESSION["auth"]) ? "download" : "" ?>>
                    <img src="<?= assets("themes/user/img/brochures-thumbnail/brocher-en.jpg") ?>" height="250"
                         class=" shadow ">
                </a>
                <img src="<?= assets("img/flags/en-us.png") ?>" height="25">
            </span>

        </div>


        <div class="divider"></div>


        <h4 class="connector-heading my-3"><?= Translate::get("common","related_section") ?></h4>


        <div class="divider"></div>


    </div>
</div>
<!--body section-->

<?php require_once "layout/end.layout.php" ?>
