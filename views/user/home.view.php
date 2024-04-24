<?php
    use helpers\services\RouterService;
    use helpers\services\CategoryService;
?>

<?php require_once "layout/start.layout.php"; ?>

<!--body section-->
<div class="jumbotron">

    <img src="<?= assets("themes/user/img/hero-image.png") ?>" srcset="<?= assets("themes/user/img/hero-image.png") ?> 3x" class="w-100 banner-image"/>

        <!--categories section-->
        <div class="row w-100 px-4 py-5">

            <div class="col-12 col-md-4 col-xxl-4 row gap-3">

                <div class="col-4 col-md-3 col-xl-3 col-xxl-3">
                    <img src="<?= CategoryService::getParentCategory(3)->getThumbnailUrl(); ?>" height="80"/>
                </div>
                <div class="col-7 col-md-7 col-xl-7 col-xxl-7">
                    <dl><p class="category-name">Cofferdam</p>
                        <dt class="color-blue mb-2">LARSSEN</dt>
                        <dd class="category-item"><a href="<?= RouterService::getCategoryPageRoute(3) ?>#heading" class="link color-black category-item-text">Corner connectors</a></dd>
                        <dd class="category-item"><a href="<?= RouterService::getCategoryPageRoute(4) ?>#heading" class="link color-black category-item-text">Omega corner connectors</a></dd>
                        <dd class="category-item"><a href="<?= RouterService::getCategoryPageRoute(5) ?>#heading" class="link color-black category-item-text">T connectors</a></dd>
                        <dd class="category-item"><a href="<?= RouterService::getCategoryPageRoute(6) ?>#heading" class="link color-black category-item-text">Cross connectors</a></dd>
                        <dd class="category-item"><a href="<?= RouterService::getCategoryPageRoute(7) ?>#heading" class="link color-black category-item-text">Weld-on connectors</a></dd>

                        <dt class="color-blue mt-4 mb-2">BALL + SOCKET</dt>
                        <dd class="category-item"><a href="<?= RouterService::getCategoryPageRoute(9) ?>#heading" class="link color-black category-item-text">US Corner connectors</a></dd>
                        <dd class="category-item"><a href="<?= RouterService::getCategoryPageRoute(10) ?>#heading" class="link color-black category-item-text">US T connectors</a></dd>
                        <dd class="category-item"><a href="<?= RouterService::getCategoryPageRoute(11) ?>#heading" class="link color-black category-item-text">US Cross connectors</a></dd>
                        <dd class="category-item"><a href="<?= RouterService::getCategoryPageRoute(12) ?>#heading" class="link color-black category-item-text">MF weld-on connectors</a></dd>

                        <dt class="color-blue mt-4 mb-2">COLD FORMED</dt>
                        <dd class="category-item"><a href="<?= RouterService::getCategoryPageRoute(14) ?>#heading" class="link color-black category-item-text">CF corner connector</a></dd>
                        <dd class="category-item"><a href="<?= RouterService::getCategoryPageRoute(15) ?>#heading" class="link color-black category-item-text">CF weld-on connector</a></dd>
                    </dl>

                </div>

            </div>

            <div class="col-12 col-md-4 col-xxl-4 row gap-3">

                <div class="col-4 col-md-3 col-xl-3 col-xxl-3 item-height-200">
                    <img src="<?= CategoryService::getParentCategory(17)->getThumbnailUrl(); ?>" height="80"/>
                </div>
                <div class="col-7 col-md-7 col-xl-7 col-xxl-7 item-height-200">
                    <dl>
                        <p class="category-name">Pipe pile steel walls</p>
                        <dd class="category-item"><a href="<?= RouterService::getCategoryPageRoute(17) ?>#heading" class="link color-black category-item-text">MF</a></dd>
                        <dd class="category-item"><a href="<?= RouterService::getCategoryPageRoute(18) ?>#heading" class="link color-black category-item-text">MDF</a></dd>
                        <dd class="category-item"><a href="<?= RouterService::getCategoryPageRoute(19) ?>#heading" class="link color-black category-item-text">LPB</a></dd>
                        <dd class="category-item"><a href="<?= RouterService::getCategoryPageRoute(20) ?>#heading" class="link color-black category-item-text">FD</a></dd>
                    </dl>

                </div>


                <div class="col-4 col-md-3 col-xl-3 col-xxl-3 item-height-200">
                    <img src="<?= CategoryService::getParentCategory(22)->getThumbnailUrl(); ?>" height="80"/>
                </div>
                <div class="col-7 col-md-7 col-xl-7 col-xxl-7 item-height-200">
                    <dl>
                        <p class="category-name">DTH driving method</p>
                        <dd class="category-item"><a href="<?= RouterService::getCategoryPageRoute(22) ?>#heading" class="link color-black category-item-text">MF DTH</a></dd>
                    </dl>

                </div>


                <div class="col-4 col-md-3 col-xl-3 col-xxl-3 item-height-200">
                    <img src="<?= CategoryService::getParentCategory(24)->getThumbnailUrl(); ?>" height="80"/>
                </div>
                <div class="col-7 col-md-7 col-xl-7 col-xxl-7 item-height-200">
                    <dl>
                        <p class="category-name">Pipe pile + sheet pile combined walls</p>
                        <dd class="category-item"><a href="<?= RouterService::getCategoryPageRoute(24) ?>#heading" class="link color-black category-item-text">L (Larssen)</a></dd>
                        <dd class="category-item"><a href="<?= RouterService::getCategoryPageRoute(25) ?>#heading" class="link color-black category-item-text">LPB (Larssen)</a></dd>
                        <dd class="category-item"><a href="<?= RouterService::getCategoryPageRoute(26) ?>#heading" class="link color-black category-item-text">MF (Ball + Socket)</a></dd>
                        <dd class="category-item"><a href="<?= RouterService::getCategoryPageRoute(27) ?>#heading" class="link color-black category-item-text">MDF (Ball + Socket)</a></dd>
                        <dd class="category-item"><a href="<?= RouterService::getCategoryPageRoute(28) ?>#heading" class="link color-black category-item-text">CF (Cold Formed)</a></dd>
                    </dl>

                </div>





            </div>

            <div class="col-12 col-md-4 col-xxl-4 row gap-3">

                <div class="col-4 col-md-3 col-xl-3 col-xxl-3 item-height-200">
                    <img src="<?= CategoryService::getParentCategory(30)->getThumbnailUrl(); ?>" height="80"/>
                </div>
                <div class="col-7 col-md-7 col-xl-7 col-xxl-7 item-height-200">
                    <dl>
                        <p class="category-name">H-pile walls</p>
                        <dd class="category-item"><a href="<?= RouterService::getCategoryPageRoute(30) ?>#heading" class="link color-black category-item-text">MF</a></dd>
                        <dd class="category-item"><a href="<?= RouterService::getCategoryPageRoute(31) ?>#heading" class="link color-black category-item-text">MDF</a></dd>
                        <dd class="category-item"><a href="<?= RouterService::getCategoryPageRoute(32) ?>#heading" class="link color-black category-item-text">FD</a></dd>
                    </dl>

                </div>



                <div class="col-4 col-md-3 col-xl-3 col-xxl-3 item-height-200">
                    <img src="<?= CategoryService::getParentCategory(34)->getThumbnailUrl(); ?>" height="80"/>
                </div>
                <div class="col-7 col-md-7 col-xl-7 col-xxl-7 item-height-200">
                    <dl>
                        <p class="category-name">H-pile + sheet pile
                            combined walls</p>
                        <dd class="category-item"><a href="<?= RouterService::getCategoryPageRoute(34) ?>#heading" class="link color-black category-item-text">LPB (Larssen)</a></dd>
                        <dd class="category-item"><a href="<?= RouterService::getCategoryPageRoute(35) ?>#heading" class="link color-black category-item-text">MF (Ball + Socket)</a></dd>
                        <dd class="category-item"><a href="<?= RouterService::getCategoryPageRoute(36) ?>#heading" class="link color-black category-item-text">MDF (Ball + Socket)</a></dd>
                    </dl>

                </div>



                <div class="col-4 col-md-3 col-xl-3 col-xxl-3 item-height-200">
                    <img src="<?= CategoryService::getParentCategory(38)->getThumbnailUrl(); ?>" height="80"/>
                </div>
                <div class="col-7 col-md-7 col-xl-7 col-xxl-7 item-height-200">
                    <dl>
                        <p class="category-name">Cell structures</p>
                        <dd class="category-item">
                            <a href="<?= RouterService::getCategoryPageRoute(38) ?>#heading" class="link color-black category-item-text">
                                FSC
                            </a>
                        </dd>
                    </dl>

                </div>
            </div>

        </div>
        <!--categories section-->


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
