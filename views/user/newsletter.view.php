<?php
 use \helpers\translate\Translate;
?>
<?php require_once "layout/start.layout.php" ?>

<!--body section-->
<div class="jumbotron w-100 p-0 m-0">

    <div class="responsive-wrap">
        <!--categories section-->
        <div class="row w-100 mt-4">


            <div class="col-12 col-md-4 col-xxl-4 row gap-3">
                <div class="col-md-3">
                    <img src="<?= assets("themes/user/img/news-letter-icon-2.png") ?>" height="80"/>
                </div>
                <div class="col-md-2">
                    <dl>
                        <h4 class="selected"><?=Translate::get("news_letter_page" , "newsletter")  ?> </h4>
                    </dl>

                </div>

            </div>


        </div>
        <!--categories section-->


        <?php require_once "layout/sub_nav.layout.php" ?>


         <hr/>

        <?php  if (isset($_SESSION["auth"]) && $_SESSION["auth"] == true) { ?>

            <h4 class="connector-heading my-3"> <?=Translate::get("news_letter_page" , "subscribe_unsubscribe")  ?></h4>

        <?php }else{ ?>

            <h4 class="connector-heading my-3"> <?=Translate::get("news_letter_page" , "why_register")  ?></h4>

        <?php } ?>
         <hr/>


        <div class="row justify-content-start mt-5">
            <div class="col-12 col-md-6">
                <p>
                   <?=Translate::get("news_letter_page" , "advantages_of_a_registration")  ?><br/><br/>
                    - <?=Translate::get("news_letter_page" , "request_products_easily")  ?> <br/>
                    - <?=Translate::get("news_letter_page" , "save_your_requests_and_products")  ?> <br/>
                    - <?=Translate::get("news_letter_page" , "receive_latest_connector_information_via_newsletter")  ?> <br/>
                </p>
            </div>
        </div>


        <?php

        if (isset($_SESSION["auth"]) && $_SESSION["auth"] == true) { ?>


            <?php if (intval($_SESSION["user"]->newsletter) === 1) { ?>
                <a href="<?= url("/newsletter/unsubscribe") ?>" class="btn btn-primary background-blue my-5">
                    <i class="bi bi-x-lg m-2"></i> <?=Translate::get("news_letter_page" , "unsubscribe")  ?>
                </a>
            <?php } else { ?>
                <a href="<?= url("/newsletter/subscribe") ?>" class="btn btn-primary background-blue my-5">
                    <i class="bi bi-check2 m-2"></i> <?=Translate::get("news_letter_page" , "Subscribe")  ?>
                </a>
            <?php } ?>

        <?php } else { ?>

            <a href="<?= url("/register") ?>?redirect=newsletter" class="btn btn-primary background-blue mt-5">
                <?=Translate::get("common" , "register")  ?>
            </a>
            <p class="mt-1">
                <?= Translate::get("register_page", "already_a_member") ?>
                <a data-toggle="tab" href="<?= url("/login") ?>?lang=<?=Translate::getLang()?>">
                    <?= Translate::get("common", "login") ?>
                </a>
            </p>
        <?php } ?>

    </div>


</div>

<!--body section-->

<?php require_once "layout/end.layout.php" ?>
