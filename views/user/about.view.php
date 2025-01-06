<?php

require_once "layout/start.layout.php";
use helpers\translate\Translate;
?>


<!--body section-->
<div class="jumbotron">

    <img src="<?= assets("themes/user/img/hero-image-about-page-c.jpg") ?>" class="w-100" loading="eager" alt="steelwall-hero"/>

    <div class="responsive-wrap alignment-full-padding">
        <h5 class="connector-heading mt-4 selected margin-bottom-7rem">
            <?= Translate::get("about_page","about_steel_wall") ?>
        </h5>


        <hr/>
        <h5 class="connector-heading my-4">
            <?= Translate::get("about_page","more_than_25_years_of_experience_in_creating_connectors_for_steel_walls") ?>
        </h5>
        <hr/>

        <div class="row justify-content-start mt-5">
            <div class="col-12 col-md-12">
                <p style="font-size: 0.9rem;" class="mb-3">
                    <?= Translate::get("about_page","paragraph_01") ?>
                </p>
                <p  style="font-size: 0.9rem;" class="mb-3">
                    <?= Translate::get("about_page","paragraph_02") ?>
                </p>
                <p style="font-size: 0.9rem;" class="mb-3">
                    <?= Translate::get("about_page","paragraph_03") ?>
                </p>
                <p style="font-size: 0.9rem;" class="mb-3">
                    <?= Translate::get("about_page","paragraph_04") ?>
                </p>
            </div>
        </div>
    </div>


    <div class="row alignment-full-padding m-0 bg-white justify-content-between" id="gallery-container">


        <div class="col-sm-12 col-md-4 mt-3 col-lg-4 p-0 only-desktop-square-width">
            <img data-src="<?= assets("themes/user/img/gallery-1-c.jpg") ?>" data-srcset="3x" srcset="<?= assets("themes/user/img/gallery-1-c.jpg") ?> 3x" class="img-fluid h-100 w-100" loading="lazy" alt="steelwall-gallery">
        </div>


        <div class="col-sm-12 col-md-8 mt-3 col-lg-8 only-desktop-rectangle-custom-padding">
            <img data-src="<?= assets("themes/user/img/gallery-2-c.jpg") ?>" data-srcset="3x" srcset="<?= assets("themes/user/img/gallery-2-c.jpg") ?> 3x" class="img-fluid h-100 w-100" loading="lazy" alt="steelwall-gallery">
        </div>


        <div class="col-sm-12 col-md-4 col-lg-4 p-0 only-desktop-square-width margin-top-35px">
            <img data-src="<?= assets("themes/user/img/gallery-3-c.jpg") ?>" data-srcset="3x" srcset="<?= assets("themes/user/img/gallery-3-c.jpg") ?> 3x" class="img-fluid h-100 w-100" loading="lazy" alt="steelwall-gallery">
        </div>


        <div class="col-sm-12 col-md-4 col-lg-4  p-0 only-desktop-square-width margin-top-35px">
            <img data-src="<?= assets("themes/user/img/gallery-4-c.jpg") ?>" data-srcset="3x" srcset="<?= assets("themes/user/img/gallery-4-c.jpg") ?> 3x" class="img-fluid h-100 w-100" loading="lazy" alt="steelwall-gallery">
        </div>

        <div class="col-sm-12 col-md-4 col-lg-4  p-0 only-desktop-square-width margin-top-35px">
            <img data-src="<?= assets("themes/user/img/gallery-5-c.jpg") ?>" data-srcset="3x"  srcset="<?= assets("themes/user/img/gallery-5-c.jpg") ?> 3x" class="img-fluid h-100 w-100" loading="lazy" alt="steelwall-gallery">
        </div>

        <div class="col-sm-12 col-md-8  col-lg-8  only-desktop-rectangle-custom-padding-right margin-top-35px">
            <img data-src="<?= assets("themes/user/img/gallery-7-c.jpg") ?>" data-srcset="3x" srcset="<?= assets("themes/user/img/gallery-7-c.jpg") ?> 3x" class="img-fluid h-100 w-100" loading="lazy" alt="steelwall-gallery">
        </div>


        <div class="col-sm-12 col-md-4 col-lg-4 p-0 only-desktop-square-width margin-top-35px">
            <img data-src="<?= assets("themes/user/img/gallery-6-c.jpg") ?>" data-srcset="3x" srcset="<?= assets("themes/user/img/gallery-6-c.jpg") ?> 3x" class="img-fluid h-100 w-100" loading="lazy" alt="steelwall-gallery">
        </div>


    </div>

</div>


<?php require_once "layout/end.layout.php" ?>
