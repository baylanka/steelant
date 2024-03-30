<?php require_once "layout/start.layout.php" ?>

<!--body section-->
<div class="jumbotron w-100 p-0 m-0">

    <div class="p-3">
        <!--categories section-->
        <div class="row w-100 mt-4">


            <div class="col-12 col-md-4 col-xxl-4 row gap-3">
                <div class="col-md-3">
                    <img src="<?= assets("themes/user/img/news-letter-icon.png") ?>" height="100"/>
                </div>
                <div class="col-md-2">
                    <dl>
                        <h4 class="selected">Newsletter</h4>
                    </dl>

                </div>

            </div>


        </div>
        <!--categories section-->


        <?php require_once "layout/sub_nav.layout.php" ?>


        <div class="divider"></div>

        <h4 class="connector-heading my-3">Subscribe / unsubscribe</h4>

        <div class="divider"></div>


        <p class="mt-5 w-50">
            Advantages of a registration:<br/>
            - Request products easily!<br/>
            - Save your requests and products (Favourites)!<br/>
            - Receive latest connector information via newsletter (approx. 4 times / year)<br/>
        </p>


        <?php

        if (isset($_SESSION["auth"]) && $_SESSION["auth"] == true) { ?>

            <?php if (intval($_SESSION["user"]->newsletter) === 1) { ?>
                <a class="btn btn-primary background-blue my-5">
                    <i class="bi bi-x-lg m-2"></i> Unsubscribe
                </a>
            <?php } else { ?>
                <a class="btn btn-primary background-blue my-5">
                    <i class="bi bi-check2 m-2"></i>Subscribe
                </a>
            <?php } ?>

        <?php } else { ?>

            <a href="<?= url("/login") ?>?redirect=newsletter" class="btn btn-primary background-blue my-5">
                Login to Subscribe
            </a>

        <?php } ?>

    </div>


</div>

<!--body section-->

<?php require_once "layout/end.layout.php" ?>
