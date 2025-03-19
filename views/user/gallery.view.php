<?php
require_once "layout/start.layout.php";
use helpers\translate\Translate;
?>

<!--body section-->
<div class="jumbotron w-100 m-0">


    <div class="responsive-wrap alignment-full-padding">
        <!--categories section-->
        <div class="row w-100 mt-4">


            <div class="col-12 col-md-4 col-xxl-4 row gap-3">
                <div class="col-md-2 me-3">
                    <img src="<?= assets("themes/user/img/gallery-icon.png") ?>" height="80" alt="steelwall_gallery_icon"/>
                </div>
                <div class="col-md-2">
                    <h4 class="selected"><?= Translate::get("gallery_page","gallery") ?></h4>
                </div>
            </div>

            <div class="col-12 col-md-8 col-xxl-8 row gap-3 padding-left-2point6">
                <div class="col-12 col-md-6 col-xxl-6">
                    <dl>
                        <dd><a href="<?= url("/gallery") ?>?page=1&lang=<?=Translate::getLang()?>" class="link selected"><?= Translate::get("gallery_page","pipe_pile_walls") ?></a></dd>
                        <dd><a href="<?= url("/gallery") ?>?page=2&lang=<?=Translate::getLang()?>" class="link color-black"><?= Translate::get("gallery_page","pipe_pile_sheet_pile_combined_walls") ?></a></dd>
                        <dd><a href="<?= url("/gallery") ?>?page=3&lang=<?=Translate::getLang()?>" class="link color-black"><?= Translate::get("gallery_page","DTH_driving_method") ?></a></dd>
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


        <hr/>

        <h4 class="connector-heading my-4"><?= Translate::get("gallery_page","pipe_pile_walls") ?></h4>

        <hr/>

        <div class="row justify-content-between mb-5" id="gallery-container">


            <div class="col-sm-12 col-md-12 mt-3 col-lg-12 padding-none-mobile">
                <img src="<?= assets("themes/user/img/gallery-13-c.jpg") ?>" class="img-fluid h-100 w-100" alt="steelwall_<?= Translate::get("gallery_page","pipe_pile_walls") ?>_gallery_image_13">
            </div>

            <div class="col-sm-12 col-md-12 col-lg-12 margin-top-35px padding-none-mobile">
                <img src="<?= assets("themes/user/img/gallery-14-c.jpg") ?>" class="img-fluid h-100 w-100" alt="steelwall_<?= Translate::get("gallery_page","pipe_pile_walls") ?>_gallery_image_14">
            </div>

            <div class="col-sm-12 col-md-12 col-lg-12 margin-top-35px padding-none-mobile">
                <img data-src="<?= assets("themes/user/img/gallery-15-c.jpg") ?>" class="img-fluid h-100 w-100" alt="steelwall_<?= Translate::get("gallery_page","pipe_pile_walls") ?>_gallery_image_15" loading="lazy">
            </div>



            <div class="col-sm-12 col-md-8 col-lg-8 margin-top-35px padding-none-mobile padding-right-15-pixel">
                <img data-src="<?= assets("themes/user/img/gallery-16-c.jpg") ?>" class="img-fluid h-100 w-100" alt="steelwall_<?= Translate::get("gallery_page","pipe_pile_walls") ?>_gallery_image_16" loading="lazy">
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4 margin-top-35px padding-none-mobile padding-left-4point5-pixel">
                <img data-src="<?= assets("themes/user/img/gallery-8-c.jpg") ?>" class="img-fluid h-100 w-100" alt="steelwall_<?= Translate::get("gallery_page","pipe_pile_walls") ?>_gallery_image_8" loading="lazy">
            </div>







            <div class="col-sm-12 col-md-4 col-lg-4 margin-top-35px padding-none-mobile">
                <img data-src="<?= assets("themes/user/img/gallery-12-c.jpg") ?>" class="img-fluid h-100 w-100" alt="steelwall_<?= Translate::get("gallery_page","pipe_pile_walls") ?>_gallery_image_12" loading="lazy">
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4 margin-top-35px padding-none-mobile padding-right-15-pixel">
                <img data-src="<?= assets("themes/user/img/gallery-17-c.jpg") ?>" class="img-fluid h-100 w-100" alt="steelwall_<?= Translate::get("gallery_page","pipe_pile_walls") ?>_gallery_image_17" loading="lazy">
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4 margin-top-35px padding-none-mobile padding-left-4point5-pixel">
                <img data-src="<?= assets("themes/user/img/gallery-10-c.jpg") ?>" class="img-fluid h-100 w-100" alt="steelwall_<?= Translate::get("gallery_page","pipe_pile_walls") ?>_gallery_image_10" loading="lazy">
            </div>



            <div class="col-sm-12 col-md-12 col-lg-12 margin-top-35px padding-none-mobile">
                <img data-src="<?= assets("themes/user/img/gallery-18-c.jpg") ?>" class="img-fluid h-100 w-100" alt="steelwall_<?= Translate::get("gallery_page","pipe_pile_walls") ?>_gallery_image_18" loading="lazy">
            </div>



        </div>

        <h4 class="connector-heading"><?= Translate::get("common","related_section") ?></h4>
        <br>
        <hr/>

        <div class="col-12 col-md-4 col-xxl-4 row gap-3  align-middle my-4">
            <div class="col-md-3">
                <img data-src="<?= assets("themes/user/img/copyright-icon.png") ?>" height="80" alt="copyright" loading="lazy"/>
            </div>
            <div class="col-md-2 d-flex flex-column justify-content-evenly">
                <h6 class="color-blue m-0">
                    <?= Translate::get("common","copyright") ?>
                    </dl>

            </div>

        </div>

        <hr class="mb-5"/>


    </div>


</div>

<!--body section-->

<?php require_once "layout/end.layout.php" ?>
