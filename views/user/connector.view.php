<?php require_once "layout/start.layout.php" ?>

<!--body section-->
<div class="jumbotron p-0 m-0">

    <img src="<?= assets("themes/user/img/hero-image2.png") ?>" class="w-100"/>


    <div class="p-5">

        <!--categories section-->
        <div class="row w-100">


            <div class="col-12 col-md-4 col-xxl-4 row gap-3">
                <div class="col-md-2">
                    <img src="<?= assets("themes/user/img/category/Earth-work.png") ?>" height="60"/>
                </div>
                <div class="col-md-1">
                    <dl>
                        <p class="category-name">Earthwork</p>
                    </dl>

                </div>

            </div>

            <div class="col-12 col-md-8 col-xxl-8 row gap-3">
                <div class="col-12 col-md-3 col-xxl-3">
                    <dl>
                        <dt class="color-blue mb-2">LARSSEN</dt>
                        <dd><a href="#" class="link color-black">Corner connectors</a></dd>
                        <dd><a href="#" class="link color-black">Omega corner connectors</a></dd>
                        <dd><a href="#" class="link color-black">T connectors</a></dd>
                        <dd><a href="#" class="link color-black">Cross connectors</a></dd>
                        <dd><a href="#" class="link color-black">Weld-on connectors</a></dd>
                    </dl>

                </div>
                <div class="col-12 col-md-3 col-xxl-3">
                    <dl>
                        <dt class="color-blue mb-2">BALL + SOCKET</dt>
                        <dd><a href="#" class="link color-black">US Corner connectors</a></dd>
                        <dd><a href="#" class="link color-black">US T connectors</a></dd>
                        <dd><a href="#" class="link color-black">US Cross connectors</a></dd>
                        <dd><a href="#" class="link color-black">MF connectors, weld-ons?</a></dd>
                    </dl>

                </div>
                <div class="col-12 col-md-3 col-xxl-3">
                    <dl>
                        <dt class="color-blue mb-2">COLD FORMED</dt>
                        <dd><a href="#" class="link color-black">CF corner connector</a></dd>
                        <dd><a href="#" class="link color-black">CF weld-on connector</a></dd>
                    </dl>

                </div>
            </div>


        </div>
        <!--categories section-->


        <div class="d-flex w-100 justify-content-end px-3 mb-2">

            <div class="text-center end-0">
                <img src="<?= assets("themes/user/img/home.png") ?>" height="30"><br>
                <span class="nav-text">Home</span>
            </div>


        </div>

        <div class="divider"></div>

        <h4 class="connector-heading my-5">Corner connectors suitable for Larssen steel sheet piles</h4>

        <div class="divider"></div>

        <!--1-->

        <?php require basePath("/views/templates/template-01.php")?>

        <!--1-->

        <div class="divider"></div>

        <!--2-->

        <?php require basePath("/views/templates/template-02.php")?>

        <!--2-->

        <div class="divider"></div>


        <!--3-->

        <?php require basePath("/views/templates/template-03.php")?>

        <!--3-->


        <div class="divider"></div>


        <!--4-->

        <?php require basePath("/views/templates/template-04.php")?>

        <!--4-->


        <div class="divider"></div>


        <!--5-->

        <?php require basePath("/views/templates/template-05.php")?>


        <!--5-->


        <div class="divider"></div>


        <!--6-->


        <?php require basePath("/views/templates/template-06.php")?>


        <!--6-->


        <div class="divider"></div>


        <!--7-->

        <?php require basePath("/views/templates/template-07.php")?>

        <!--7-->

    </div>


</div>
<!--body section-->

<?php require_once "layout/end.layout.php" ?>
