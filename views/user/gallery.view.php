<?php
require_once "layout/start.layout.php";
use helpers\translate\Translate;
?>

<!--body section-->
<div class="jumbotron w-100 p-0 m-0">


    <div class="responsive-wrap">
        <!--categories section-->
        <div class="row w-100 mt-4">


            <div class="col-12 col-md-4 col-xxl-4 row gap-3">
                <div class="col-md-2 me-3">
                    <img src="<?= assets("themes/user/img/gallery-icon.png") ?>" height="80"/>
                </div>
                <div class="col-md-2">
                    <dl>
                        <h4 class="selected"><?= Translate::get("gallery_page","gallery") ?></h4>
                    </dl>

                </div>

            </div>

            <div class="col-12 col-md-8 col-xxl-8 row gap-3">
                <div class="col-12 col-md-6 col-xxl-6">
                    <dl>
                        <dd><a href="#" class="link selected"><?= Translate::get("gallery_page","pipe_pile_walls") ?></a></dd>
                        <dd><a href="#" class="link color-black"><?= Translate::get("gallery_page","pipe_pile_sheet_pile_combined_walls") ?></a></dd>
                        <dd><a href="#" class="link color-black"><?= Translate::get("gallery_page","DTH_driving_method") ?></a></dd>
                    </dl>

                </div>
                <div class="col-12 col-md-3 col-xxl-3 d-none">
                    <dl>
                        <dd><a href="#" class="link color-black">H-pile steel walls</a></dd>
                        <dd><a href="#" class="link color-black">H-pile combined walls</a></dd>
                    </dl>

                </div>

            </div>


        </div>
        <!--categories section-->


        <?php require_once "layout/sub_nav.layout.php" ?>


        <div class="divider"></div>

        <h4 class="connector-heading my-3"><?= Translate::get("gallery_page","pipe_pile_walls") ?></h4>


        <div class="row  mb-5" id="gallery-container">


            <div class="col-sm-12 col-md-4 mt-3 col-lg-4">
                <img src="<?= assets("themes/user/img/gallery-1.png") ?>" class="img-fluid h-100 w-100">
            </div>


            <div class="col-sm-12 col-md-8 mt-3 col-lg-8">
                <img src="<?= assets("themes/user/img/gallery-2.png") ?>" class="img-fluid h-100 w-100">
            </div>










            <div class="col-sm-12 col-md-4 mt-3 col-lg-4">
                <img src="<?= assets("themes/user/img/gallery-3.png") ?>" class="img-fluid h-100 w-100">
            </div>

            <div class="col-sm-12 col-md-4 mt-3 col-lg-4">
                <img src="<?= assets("themes/user/img/gallery-8.png") ?>" class="img-fluid h-100 w-100">
            </div>

            <div class="col-sm-12 col-md-4 mt-3 col-lg-4">
                <img src="<?= assets("themes/user/img/gallery-9.png") ?>" class="img-fluid h-100 w-100">
            </div>



            <div class="col-sm-12 col-md-4 mt-3 col-lg-4">
                <img src="<?= assets("themes/user/img/gallery-11.png") ?>" class="img-fluid h-100 w-100">
            </div>

            <div class="col-sm-12 col-md-4 mt-3 col-lg-4">
                <img src="<?= assets("themes/user/img/gallery-10.png") ?>" class="img-fluid h-100 w-100">
            </div>

            <div class="col-sm-12 col-md-4 mt-3 col-lg-4">
                <img src="<?= assets("themes/user/img/gallery-12.png") ?>" class="img-fluid h-100 w-100">
            </div>



        </div>

        <h4 class="connector-heading my-3"><?= Translate::get("common","related_section") ?></h4>

        <div class="divider"></div>

        <div class="col-12 col-md-4 col-xxl-4 row gap-3  align-middle my-4">
            <div class="col-md-3">
                <img src="<?= assets("themes/user/img/copyright-icon.png") ?>" height="80"/>
            </div>
            <div class="col-md-2 d-flex flex-column justify-content-evenly">
                <dl class="color-blue m-0">
                    <?= Translate::get("common","copyright") ?>
                </dl>

            </div>

        </div>

        <div class="divider mb-5"></div>


    </div>


</div>

<!--body section-->

<?php require_once "layout/end.layout.php" ?>
