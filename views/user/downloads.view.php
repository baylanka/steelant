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
                        <h4 class="color-blue"><?= Translate::get("download_page","downloads") ?></h4>
                        <p class="color-blue"><?= Translate::get("download_page","please_register_before_download") ?></p>
                    </dl>

                </div>

            </div>

            <div class="col-12 col-md-7 col-xxl-7 row gap-3 justify-content-end">
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

        <div class="d-flex align-middle w-50 justify-content-between">
            <h6 class="connector-heading my-4"><?= Translate::get("download_page","test_report") ?> I</h6>
            <img src="<?= assets("themes/user/img/pdf.png") ?>" height="25" class="mt-auto mb-auto">
        </div>

        <div class="divider"></div>

        <div class="d-flex align-middle w-50 justify-content-between">
            <h6 class="connector-heading my-4"><?= Translate::get("download_page","test_report") ?> II</h6>
            <img src="<?= assets("themes/user/img/pdf.png") ?>" height="25" class="mt-auto mb-auto">
        </div>

        <div class="divider"></div>

        <div class="d-flex align-middle w-50 justify-content-between">
            <h6 class="connector-heading my-4"><?= Translate::get("download_page","test_report") ?> III</h6>
            <img src="<?= assets("themes/user/img/pdf.png") ?>" height="25" class="mt-auto mb-auto">
        </div>

        <div class="divider mb-5"></div>

        <div class="divider"></div>

        <h4 class="connector-heading my-3"><?= Translate::get("download_page","brochures_and_data_sheets") ?></h4>

        <div class="divider"></div>


        <div class="d-flex align-middle gap-5 my-5 w-100">
            <h6 class="connector-heading"><?= Translate::get("download_page","steelwall_connectors_overview") ?> 2024</h6>

            <span class="d-flex gap-2">
                <img src="<?= assets("themes/user/img/brochures-thumbnail/brocher-de.jpg") ?>" height="250"
                     class="mt-auto mb-auto shadow ">
                <img src="<?= assets("img/flags/de.png") ?>" height="25">
            </span>

        </div>


        <div class="divider"></div>



        <div class="d-flex align-middle gap-5 my-5 w-100">
            <h6 class="connector-heading"><?= Translate::get("download_page","steelwall_connectors_overview") ?> 2024</h6>

            <span class="d-flex gap-2">
                <img src="<?= assets("themes/user/img/brochures-thumbnail/brocher-de.jpg") ?>" height="250"
                     class="mt-auto mb-auto shadow ">
                <img src="<?= assets("img/flags/en-gb.png") ?>" height="25">
            </span>

        </div>


        <div class="divider"></div>



        <div class="d-flex align-middle gap-5 my-5 w-100">
            <h6 class="connector-heading"><?= Translate::get("download_page","steelwall_connectors_overview") ?> 2024</h6>

            <span class="d-flex gap-2">
                <img src="<?= assets("themes/user/img/brochures-thumbnail/brocher-fr.jpg") ?>" height="250"
                     class="mt-auto mb-auto shadow ">
                <img src="<?= assets("img/flags/fr.png") ?>" height="25">
            </span>

        </div>



        <div class="divider"></div>


        <div class="d-flex align-middle gap-5 my-5 w-100">
            <h6 class="connector-heading"><?= Translate::get("download_page","steelwall_connectors_overview") ?> 2024</h6>

            <span class="d-flex gap-2">
                <img src="<?= assets("themes/user/img/brochures-thumbnail/brocher-de.jpg") ?>" height="250"
                     class="mt-auto mb-auto shadow ">
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
