<?php

require_once "layout/start.layout.php";
use helpers\translate\Translate;
?>


<!--body section-->
<div class="jumbotron">

    <img src="<?= assets("themes/user/img/hero-image-about-page.png") ?>" class="w-100"/>

    <div class="responsive-wrap">
        <h5 class="connector-heading mt-4 mb-5 selected">
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


    <div class="row pt-5 mb-5" id="gallery-container">


        <div class="col-sm-12 col-md-4 mt-3 col-lg-4">
            <img src="<?= assets("themes/user/img/gallery-1.png") ?>" srcset="<?= assets("themes/user/img/gallery-1.png") ?> 3x" class="img-fluid h-100 w-100">
        </div>


        <div class="col-sm-12 col-md-8 mt-3 col-lg-8">
            <img src="<?= assets("themes/user/img/gallery-2.png") ?>"  srcset="<?= assets("themes/user/img/gallery-2.png") ?> 3x" class="img-fluid h-100 w-100">
        </div>


        <div class="col-sm-12 col-md-4 mt-3 col-lg-4">
            <img src="<?= assets("themes/user/img/gallery-3.png") ?>"  srcset="<?= assets("themes/user/img/gallery-3.png") ?> 3x" class="img-fluid h-100 w-100">
        </div>


        <div class="col-sm-12 col-md-4 mt-3 col-lg-4">
            <img src="<?= assets("themes/user/img/gallery-4.png") ?>"  srcset="<?= assets("themes/user/img/gallery-4.png") ?> 3x" class="img-fluid h-100 w-100">
        </div>

        <div class="col-sm-12 col-md-4 mt-3 col-lg-4">
            <img src="<?= assets("themes/user/img/gallery-5.png") ?>"  srcset="<?= assets("themes/user/img/gallery-5.png") ?> 3x" class="img-fluid h-100 w-100">
        </div>

        <div class="col-sm-12 col-md-8 mt-3 col-lg-8">
            <img src="<?= assets("themes/user/img/gallery-7.png") ?>"  srcset="<?= assets("themes/user/img/gallery-7.png") ?> 3x" class="img-fluid h-100 w-100">
        </div>


        <div class="col-sm-12 col-md-4 mt-3 col-lg-4">
            <img src="<?= assets("themes/user/img/gallery-6.png") ?>"  srcset="<?= assets("themes/user/img/gallery-6.png") ?> 3x" class="img-fluid h-100 w-100">
        </div>


    </div>



</div>


<?php require_once "layout/end.layout.php" ?>
