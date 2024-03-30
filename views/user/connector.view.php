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
                <div class="col-7">
                    <dl>
                        <p class="category-name">Cofferdam</p>
                        <dt class="color-blue mb-2">LARSSEN</dt>
                        <dd><a href="<?= url("/connector") ?>?id=1" class="link <?= $_GET["id"] == 1 ? "selected" : "color-black" ?>">Corner connectors</a></dd>
                        <dd><a href="<?= url("/connector") ?>?id=2" class="link <?= $_GET["id"] == 2 ? "selected" : "color-black" ?>">Omega corner connectors</a></dd>
                        <dd><a href="<?= url("/connector") ?>?id=3" class="link <?= $_GET["id"] == 3 ? "selected" : "color-black" ?>">T connectors</a></dd>
                        <dd><a href="<?= url("/connector") ?>?id=4" class="link <?= $_GET["id"] == 4 ? "selected" : "color-black" ?>">Cross connectors</a></dd>
                        <dd><a href="<?= url("/connector") ?>?id=5" class="link <?= $_GET["id"] == 5 ? "selected" : "color-black" ?>">Weld-on connectors</a></dd>

                        <dt class="color-blue mt-4 mb-2">BALL + SOCKET</dt>
                        <dd><a href="<?= url("/connector") ?>?id=6" class="link <?= $_GET["id"] == 6 ? "selected" : "color-black" ?>">US Corner connectors</a></dd>
                        <dd><a href="<?= url("/connector") ?>?id=7" class="link <?= $_GET["id"] == 7 ? "selected" : "color-black" ?>">US T connectors</a></dd>
                        <dd><a href="<?= url("/connector") ?>?id=8" class="link <?= $_GET["id"] == 8 ? "selected" : "color-black" ?>">US Cross connectors</a></dd>
                        <dd><a href="<?= url("/connector") ?>?id=9" class="link <?= $_GET["id"] == 9 ? "selected" : "color-black" ?>">MF connectors, weld-ons?</a></dd>

                        <dt class="color-blue mt-4 mb-2">COLD FORMED</dt>
                        <dd><a href="<?= url("/connector") ?>?id=10" class="link <?= $_GET["id"] == 10 ? "selected" : "color-black" ?>">CF corner connector</a></dd>
                        <dd><a href="<?= url("/connector") ?>?id=11" class="link <?= $_GET["id"] == 11 ? "selected" : "color-black" ?>">CF weld-on connector</a></dd>
                    </dl>

                </div>
                <div class="col-2"></div>

            </div>

            <div class="col-12 col-md-8 d-flex flex-wrap">

                <div class="col-12 col-md-6 col-xxl-6 row gap-3">

                    <div class="col-3">
                        <img src="<?= assets("themes/user/img/category/Pipe-pile-steel-walls.png") ?>" height="60"/>
                    </div>
                    <div class="col-7 p-0">
                        <dl>
                            <p class="category-name">Pipe pile steel walls</p>
                            <dd><a href="<?= url("/connector") ?>?id=11" class="link <?= $_GET["id"] == 11 ? "selected" : "color-black" ?>">MF</a></dd>
                            <dd><a href="<?= url("/connector") ?>?id=12" class="link <?= $_GET["id"] == 12 ? "selected" : "color-black" ?>">MDF</a></dd>
                            <dd><a href="<?= url("/connector") ?>?id=13" class="link <?= $_GET["id"] == 13 ? "selected" : "color-black" ?>">LPB</a></dd>
                            <dd><a href="<?= url("/connector") ?>?id=14" class="link <?= $_GET["id"] == 14 ? "selected" : "color-black" ?>">FD</a></dd>
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
                            <dd><a href="<?= url("/connector") ?>?id=21" class="link <?= $_GET["id"] == 21 ? "selected" : "color-black" ?>">MF</a></dd>
                            <dd><a href="<?= url("/connector") ?>?id=22" class="link <?= $_GET["id"] == 22 ? "selected" : "color-black" ?>">MDF</a></dd>
                            <dd><a href="<?= url("/connector") ?>?id=23" class="link <?= $_GET["id"] == 23 ? "selected" : "color-black" ?>">FD</a></dd>
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
                            <dd><a href="<?= url("/connector") ?>?id=15" class="link <?= $_GET["id"] == 15 ? "selected" : "color-black" ?>">MF DTH</a></dd>
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
                            <dd><a href="<?= url("/connector") ?>?id=24" class="link <?= $_GET["id"] == 24 ? "selected" : "color-black" ?>">LPB (Larssen)</a></dd>
                            <dd><a href="<?= url("/connector") ?>?id=25" class="link <?= $_GET["id"] == 25 ? "selected" : "color-black" ?>">MF (Ball + Socket)</a></dd>
                            <dd><a href="<?= url("/connector") ?>?id=26" class="link <?= $_GET["id"] == 26 ? "selected" : "color-black" ?>">MDF (Ball + Socket)</a></dd>
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
                            <dd><a href="<?= url("/connector") ?>?id=16" class="link <?= $_GET["id"] == 16 ? "selected" : "color-black" ?>">L (Larssen)</a></dd>
                            <dd><a href="<?= url("/connector") ?>?id=17" class="link <?= $_GET["id"] == 17 ? "selected" : "color-black" ?>">LPB (Larssen)</a></dd>
                            <dd><a href="<?= url("/connector") ?>?id=18" class="link <?= $_GET["id"] == 18 ? "selected" : "color-black" ?>">MF (Ball + Socket)</a></dd>
                            <dd><a href="<?= url("/connector") ?>?id=19" class="link <?= $_GET["id"] == 19 ? "selected" : "color-black" ?>">MDF (Ball + Socket)</a></dd>
                            <dd><a href="<?= url("/connector") ?>?id=20" class="link <?= $_GET["id"] == 20 ? "selected" : "color-black" ?>">CF (Cold Formed)</a></dd>
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
                            <dd><a href="<?= url("/connector") ?>?id=27" class="link <?= $_GET["id"] == 27 ? "selected" : "color-black" ?>">FSC</a></dd>
                        </dl>

                    </div>
                    <div class="col-2"></div>

                </div>

            </div>

        </div>
        <!--categories section-->


        <?php require_once "layout/sub_nav.layout.php" ?>


        <div class="divider"></div>

        <h4 class="connector-heading my-5" id="heading">Corner connectors suitable for Larssen steel sheet piles</h4>

        <div class="divider"></div>

        <!--1-->

        <?php require basePath("/views/templates/template-01.php") ?>

        <!--1-->

        <div class="divider"></div>

        <!--2-->

        <?php require basePath("/views/templates/template-02.php") ?>

        <!--2-->

        <div class="divider"></div>


        <!--3-->

        <?php require basePath("/views/templates/template-03.php") ?>

        <!--3-->


        <div class="divider"></div>


        <!--4-->

        <?php require basePath("/views/templates/template-04.php") ?>

        <!--4-->


        <div class="divider"></div>


        <!--5-->

        <?php require basePath("/views/templates/template-05.php") ?>


        <!--5-->


        <div class="divider"></div>


        <!--6-->


        <?php require basePath("/views/templates/template-06.php") ?>


        <!--6-->


        <div class="divider"></div>


        <!--7-->

        <?php require basePath("/views/templates/template-07.php") ?>

        <!--7-->

    </div>


</div>
<!--body section-->


<?php require_once "layout/end.layout.php" ?>

<script>

    $(document).on("click",".request-connector",async function (){
        const id = $(this).attr('data-id');
        let path = `order/request?id=`+id+"&lang=<?= $_SESSION["lang"] ?>";
        let login = true;
        try {
            if(login){
                await loadModal(baseModal, path);

                let today = new Date();
                let yyyy = today.getFullYear();
                let mm = String(today.getMonth() + 1).padStart(2, '0'); // Adding 1 because getMonth() returns 0-based index
                let dd = String(today.getDate()).padStart(2, '0');
                let formattedDate = yyyy + '-' + mm + '-' + dd;

                $(".datepicker").attr("min",formattedDate)

            }else{
                window.location.href = "<?= url("/login") ?>";
            }
        } catch (err) {
            toast.error("An error occurred while attempting to open the create connector.. " + err);
        }
    });

    $(document).ready(function (){
        $('html, body').animate({
            scrollTop: $('#heading').offset().top
        }, 'slow');

    });
</script>

