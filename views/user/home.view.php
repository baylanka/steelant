<?php require_once "layout/start.layout.php" ?>

<!--body section-->
<div class="jumbotron">

    <img src="<?= assets("themes/user/img/hero-image.png") ?>" class="w-100"/>

        <!--categories section-->
        <div class="row w-100 p-5">

            <div class="col-12 col-md-4 d-flex p-0">
                <div class="col-12 col-md-12 row" style="gap:1.8%;">

                    <div class="col-3">
                        <img src="<?= assets("themes/user/img/category/Earth-work.png") ?>" height="60"/>
                    </div>
                    <div class="col-7">
                        <dl>
                            <p class="category-name">Cofferdam</p>
                            <dt class="color-blue mb-2">LARSSEN</dt>
                            <dd><a href="<?=
                                get_url_by_lang([
                                        "de"=> "/cofferdam/larssen/corner-connectors",
                                        "fr" => "/cofferdam/larssen/Connecteurs-d-angle",
                                        "en" => "/cofferdam/larssen/corner-connectors"
                                ]);
                                 ?>?id=1" class="link color-black">Corner connectors</a></dd>
                            <dd><a href="<?= url("/cofferdam/larssen/omega-corner-connectors") ?>?id=2" class="link color-black">Omega corner connectors</a></dd>
                            <dd><a href="<?= url("/cofferdam/larssen/t-connectors") ?>?id=3" class="link color-black">T connectors</a></dd>
                            <dd><a href="<?= url("/cofferdam/larssen/cross-connectors") ?>?id=4" class="link color-black">Cross connectors</a></dd>
                            <dd><a href="<?= url("/cofferdam/larssen/weld-on-connectors") ?>?id=5" class="link color-black">Weld-on connectors</a></dd>

                            <dt class="color-blue mt-4 mb-2">BALL + SOCKET</dt>
                            <dd><a href="<?= url("/cofferdam/ball+socket/us-corner-connectors") ?>?id=6" class="link color-black">US Corner connectors</a></dd>
                            <dd><a href="<?= url("/cofferdam/ball+socket/us-t-connectors") ?>?id=7" class="link color-black">US T connectors</a></dd>
                            <dd><a href="<?= url("/cofferdam/ball+socket/us_-ross-connectors") ?>?id=8" class="link color-black">US Cross connectors</a></dd>
                            <dd><a href="<?= url("/cofferdam/ball+socket/mf-weld-on-connectors") ?>?id=9" class="link color-black">MF weld-on connectors</a></dd>

                            <dt class="color-blue mt-4 mb-2">COLD FORMED</dt>
                            <dd><a href="<?= url("/cofferdam/cold-formed/cf-corner-connector") ?>?id=10" class="link color-black">CF corner connector</a></dd>
                            <dd><a href="<?= url("/cofferdam/cold-formed/cf-weld-on-connector") ?>?id=11" class="link color-black">CF weld-on connector</a></dd>
                        </dl>

                    </div>
                    <div class="col-2"></div>

                </div>
            </div>

            <div class="col-12 col-md-8 d-flex flex-wrap">

                <div class="col-12 col-md-6 col-xxl-6 row gap-3">

                    <div class="col-3">
                        <img src="<?= assets("themes/user/img/category/Pipe-pile-steel-walls.png") ?>" height="60"/>
                    </div>
                    <div class="col-7 p-0">
                        <dl>
                            <p class="category-name">Pipe pile steel walls</p>
                            <dd><a href="<?= url("/pipe-pile-steel-walls/mf") ?>?id=12" class="link color-black">MF</a></dd>
                            <dd><a href="<?= url("/pipe-pile-steel-walls/mdf") ?>?id=13" class="link color-black">MDF</a></dd>
                            <dd><a href="<?= url("/pipe-pile-steel-walls/lpb") ?>?id=14" class="link color-black">LPB</a></dd>
                            <dd><a href="<?= url("/pipe-pile-steel-walls/fd") ?>?id=15" class="link color-black">FD</a></dd>
                        </dl>

                    </div>
                    <div class="col-2"></div>

                </div>

                <div class="col-12 col-md-6 col-xxl-6 row gap-3">

                    <div class="col-3">
                        <img src="<?= assets("themes/user/img/category/H-pile-steel-walls.png") ?>" height="60"/>
                    </div>
                    <div class="col-7 p-0">
                        <dl>
                            <p class="category-name">H-pile walls</p>
                            <dd><a href="<?= url("/h-pile-walls/mf") ?>?id=22" class="link color-black">MF</a></dd>
                            <dd><a href="<?= url("/h-pile-walls/mdf") ?>?id=23" class="link color-black">MDF</a></dd>
                            <dd><a href="<?= url("/h-pile-walls/fd") ?>?id=24" class="link color-black">FD</a></dd>
                        </dl>

                    </div>
                    <div class="col-2"></div>

                </div>

                <div class="col-12 col-md-6 col-xxl-6 row gap-3">

                    <div class="col-3">
                        <img src="<?= assets("themes/user/img/category/For-DTH-driving-method.png") ?>" height="60"/>
                    </div>
                    <div class="col-7 p-0">
                        <dl>
                            <p class="category-name">DTH driving method</p>
                            <dd><a href="<?= url("/dth-driving-method/mf-dth") ?>?id=16" class="link color-black">MF DTH</a></dd>
                        </dl>
                    </div>
                    <div class="col-2"></div>

                </div>


                <div class="col-12 col-md-6 col-xxl-6 row gap-3">

                    <div class="col-3">
                        <img src="<?= assets("themes/user/img/category/H-pile-combined-walls.png") ?>" height="60"/>
                    </div>
                    <div class="col-7 p-0">
                        <dl>
                            <p class="category-name">H-pile + sheet pile
                                combined walls</p>
                            <dd><a href="<?= url("/h-pile+sheet-pile-combined-walls/lpb-(larssen)") ?>?id=25" class="link color-black">LPB (Larssen)</a></dd>
                            <dd><a href="<?= url("/h-pile+sheet-pile-combined-walls/mf-(ball+socket)") ?>?id=26" class="link color-black">MF (Ball + Socket)</a></dd>
                            <dd><a href="<?= url("/h-pile+sheet-pile-combined-walls/mdf-(ball+socket)") ?>?id=27" class="link color-black">MDF (Ball + Socket)</a></dd>
                        </dl>

                    </div>
                    <div class="col-2"></div>

                </div>

                <div class="col-12 col-md-6 col-xxl-6 row gap-3">

                    <div class="col-3">
                        <img src="<?= assets("themes/user/img/category/Pipe-pile-combined-walls.png") ?>" height="60"/>
                    </div>
                    <div class="col-7 p-0">
                        <dl>
                            <p class="category-name">Pipe pile + sheet pile combined walls</p>
                            <dd><a href="<?= url("/pipe-pile+sheet-pile-combined-walls/l-(larssen)") ?>?id=17" class="link color-black">L (Larssen)</a></dd>
                            <dd><a href="<?= url("/pipe-pile+sheet-pile-combined-walls/lpb-(larssen)") ?>?id=18" class="link color-black">LPB (Larssen)</a></dd>
                            <dd><a href="<?= url("/pipe-pile+sheet-pile-combined-walls/mf-(ball+socket)") ?>?id=19" class="link color-black">MF (Ball + Socket)</a></dd>
                            <dd><a href="<?= url("/pipe-pile+sheet-pile-combined-walls/mdf-(ball+socket)") ?>?id=20" class="link color-black">MDF (Ball + Socket)</a></dd>
                            <dd><a href="<?= url("/pipe-pile+sheet-pile-combined-walls/cf-(cold-formed)") ?>?id=21" class="link color-black">CF (Cold Formed)</a></dd>
                        </dl>

                    </div>
                    <div class="col-2"></div>

                </div>

                <div class="col-12 col-md-6 col-xxl-6 row gap-3">

                    <div class="col-3">
                        <img src="<?= assets("themes/user/img/category/Cell-structures.png") ?>" height="60"/>
                    </div>
                    <div class="col-7 p-0">
                        <dl>
                            <p class="category-name">Cell structures</p>
                            <dd><a href="<?= url("/cell-structures/fsc") ?>?id=28" class="link color-black">FSC</a></dd>
                        </dl>

                    </div>
                    <div class="col-2"></div>

                </div>

            </div>

        </div>
        <!--categories section-->


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
                <img src="<?= assets("themes/user/img/gallery-4.png") ?>" class="img-fluid h-100 w-100">
            </div>

            <div class="col-sm-12 col-md-4 mt-3 col-lg-4">
                <img src="<?= assets("themes/user/img/gallery-5.png") ?>" class="img-fluid h-100 w-100">
            </div>

            <div class="col-sm-12 col-md-8 mt-3 col-lg-8">
                <img src="<?= assets("themes/user/img/gallery-7.png") ?>" class="img-fluid h-100 w-100">
            </div>


            <div class="col-sm-12 col-md-4 mt-3 col-lg-4">
                <img src="<?= assets("themes/user/img/gallery-6.png") ?>" class="img-fluid h-100 w-100">
            </div>


        </div>


</div>


<?php require_once "layout/end.layout.php" ?>
