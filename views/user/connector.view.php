<?php require_once "layout/start.layout.php" ?>

<!--body section-->
<div class="jumbotron p-0 m-0">

    <img src="<?= assets("themes/user/img/hero-image2.png") ?>" class="w-100"/>

    <div class="responsive-wrap">


        <!--categories section-->
        <div class="row w-100 py-5">


            <div class="col-12 row gap-3 justify-content-between <?= $_GET["id"] > 15 ? "d-none" : "" ?>">
                <div class="col-md-3 col-12 d-flex gap-4">
                    <img src="<?= assets("themes/user/img/category/Earth-work.png") ?>" height="60"/>
                    <p class="category-name">Cofferdam</p>
                </div>

                <div class="col-md-7 col-12 d-flex flex-wrap justify-content-between">
                    <dl>
                        <dt class="color-blue">LARSSEN</dt>
                        <dd><a href="<?= url("/connector") ?>?id=3"
                               class="link <?= $_GET["id"] == 3 ? "selected" : "color-black" ?>">Corner connectors</a>
                        </dd>
                        <dd><a href="<?= url("/connector") ?>?id=4"
                               class="link <?= $_GET["id"] == 4 ? "selected" : "color-black" ?>">Omega corner
                                connectors</a></dd>
                        <dd><a href="<?= url("/connector") ?>?id=5"
                               class="link <?= $_GET["id"] == 5 ? "selected" : "color-black" ?>">T connectors</a></dd>
                        <dd><a href="<?= url("/connector") ?>?id=6"
                               class="link <?= $_GET["id"] == 6 ? "selected" : "color-black" ?>">Cross connectors</a>
                        </dd>
                        <dd><a href="<?= url("/connector") ?>?id=7"
                               class="link <?= $_GET["id"] == 7 ? "selected" : "color-black" ?>">Weld-on connectors</a>
                        </dd>
                    </dl>
                    <dl>
                        <dt class="color-blue">BALL + SOCKET</dt>
                        <dd><a href="<?= url("/connector") ?>?id=9"
                               class="link <?= $_GET["id"] == 9 ? "selected" : "color-black" ?>">US Corner
                                connectors</a></dd>
                        <dd><a href="<?= url("/connector") ?>?id=10"
                               class="link <?= $_GET["id"] == 10 ? "selected" : "color-black" ?>">US T connectors</a>
                        </dd>
                        <dd><a href="<?= url("/connector") ?>?id=11"
                               class="link <?= $_GET["id"] == 11 ? "selected" : "color-black" ?>">US Cross
                                connectors</a>
                        </dd>
                        <dd><a href="<?= url("/connector") ?>?id=12"
                               class="link <?= $_GET["id"] == 12 ? "selected" : "color-black" ?>">MF connectors,
                                weld-ons?</a></dd>
                    </dl>
                    <dl>
                        <dt class="color-blue">COLD FORMED</dt>
                        <dd><a href="<?= url("/connector") ?>?id=14"
                               class="link <?= $_GET["id"] == 14 ? "selected" : "color-black" ?>">CF corner
                                connector</a></dd>
                        <dd><a href="<?= url("/connector") ?>?id=15"
                               class="link <?= $_GET["id"] == 15 ? "selected" : "color-black" ?>">CF weld-on
                                connector</a></dd>
                    </dl>

                </div>


            </div>

            <div class="col-12 row gap-3 justify-content-between <?= $_GET["id"] < 16 || $_GET["id"] > 20 ? "d-none" : "" ?> ">

                <div class="col-md-3 col-12 d-flex gap-4">
                    <img src="<?= assets("themes/user/img/category/Pipe-pile-steel-walls.png") ?>" height="60"/>
                    <p class="category-name">Pipe pile steel walls</p>
                </div>
                <div class="col-md-7 col-12 p-0">
                    <dl>
                        <dd><a href="<?= url("/connector") ?>?id=17"
                               class="link <?= $_GET["id"] == 17 ? "selected" : "color-black" ?>">MF</a></dd>
                        <dd><a href="<?= url("/connector") ?>?id=18"
                               class="link <?= $_GET["id"] == 18 ? "selected" : "color-black" ?>">MDF</a></dd>
                        <dd><a href="<?= url("/connector") ?>?id=19"
                               class="link <?= $_GET["id"] == 19 ? "selected" : "color-black" ?>">LPB</a></dd>
                        <dd><a href="<?= url("/connector") ?>?id=20"
                               class="link <?= $_GET["id"] == 20 ? "selected" : "color-black" ?>">FD</a></dd>
                    </dl>

                </div>
                <div class="col-2"></div>

            </div>

            <div class="col-12 row gap-3 justify-content-between <?= $_GET["id"] != 22 ? "d-none" : "" ?> ">

                <div class="col-md-3 col-12 d-flex gap-4">
                    <img src="<?= assets("themes/user/img/category/For-DTH-driving-method.png") ?>" height="60"/>
                    <p class="category-name">DTH driving method</p>
                </div>
                <div class="col-md-7 col-12 p-0">
                    <dl>
                        <dd><a href="<?= url("/connector") ?>?id=22"
                               class="link <?= $_GET["id"] == 22 ? "selected" : "color-black" ?>">MF DTH</a></dd>
                    </dl>

                </div>
                <div class="col-2"></div>

            </div>


            <div class="col-12 row gap-3 justify-content-between <?= $_GET["id"] < 23 || $_GET["id"] > 28 ? "d-none" : "" ?> ">

                <div class="col-md-3 col-12 d-flex gap-4">
                    <img src="<?= assets("themes/user/img/category/Pipe-pile-combined-walls.png") ?>" height="60"/>
                    <p class="category-name">Pipe pile + sheet pile combined walls</p>
                </div>
                <div class="col-md-7 col-12 p-0">
                    <dl>
                        <dd><a href="<?= url("/connector") ?>?id=24"
                               class="link <?= $_GET["id"] == 24 ? "selected" : "color-black" ?>">L (Larssen)</a>
                        </dd>
                        <dd><a href="<?= url("/connector") ?>?id=25"
                               class="link <?= $_GET["id"] == 25 ? "selected" : "color-black" ?>">LPB (Larssen)</a>
                        </dd>
                        <dd><a href="<?= url("/connector") ?>?id=26"
                               class="link <?= $_GET["id"] == 26 ? "selected" : "color-black" ?>">MF (Ball +
                                Socket)</a></dd>
                        <dd><a href="<?= url("/connector") ?>?id=27"
                               class="link <?= $_GET["id"] == 27 ? "selected" : "color-black" ?>">MDF (Ball +
                                Socket)</a></dd>
                        <dd><a href="<?= url("/connector") ?>?id=28"
                               class="link <?= $_GET["id"] == 28 ? "selected" : "color-black" ?>">CF (Cold
                                Formed)</a></dd>
                    </dl>

                </div>
                <div class="col-2"></div>

            </div>


            <div class="col-12 row gap-3 justify-content-between  <?= $_GET["id"] < 29 || $_GET["id"] > 32 ? "d-none" : "" ?> ">

                <div class="col-md-3 col-12 d-flex gap-4">
                    <img src="<?= assets("themes/user/img/category/H-pile-steel-walls.png") ?>" height="60"/>
                    <p class="category-name">H-pile walls</p>
                </div>
                <div class="col-md-7 col-12 p-0">
                    <dl>
                        <dd><a href="<?= url("/connector") ?>?id=30"
                               class="link <?= $_GET["id"] == 30 ? "selected" : "color-black" ?>">MF</a></dd>
                        <dd><a href="<?= url("/connector") ?>?id=31"
                               class="link <?= $_GET["id"] == 31 ? "selected" : "color-black" ?>">MDF</a></dd>
                        <dd><a href="<?= url("/connector") ?>?id=32"
                               class="link <?= $_GET["id"] == 32 ? "selected" : "color-black" ?>">FD</a></dd>
                    </dl>

                </div>
                <div class="col-2"></div>

            </div>

            <div class="col-12 row gap-3 justify-content-between  <?= $_GET["id"] < 33 || $_GET["id"] > 36 ? "d-none" : "" ?> ">

                <div class="col-md-3 col-12 d-flex gap-4">
                    <img src="<?= assets("themes/user/img/category/H-pile-combined-walls.png") ?>" height="60"/>
                    <p class="category-name">H-pile + sheet pile combined walls</p>
                </div>
                <div class="col-md-5 col-12 p-0">
                    <dl>
                        <dd><a href="<?= url("/connector") ?>?id=34"
                               class="link <?= $_GET["id"] == 34 ? "selected" : "color-black" ?>">LPB (Larssen)</a>
                        </dd>
                        <dd><a href="<?= url("/connector") ?>?id=35"
                               class="link <?= $_GET["id"] == 35 ? "selected" : "color-black" ?>">MF (Ball +
                                Socket)</a></dd>
                        <dd><a href="<?= url("/connector") ?>?id=36"
                               class="link <?= $_GET["id"] == 36 ? "selected" : "color-black" ?>">MDF (Ball +
                                Socket)</a></dd>
                    </dl>

                </div>
                <div class="col-2"></div>

            </div>

            <div class="col-12 row gap-3 justify-content-between  <?= $_GET["id"] != 38 ? "d-none" : "" ?> ">

                <div class="col-md-3 col-12 d-flex gap-4">
                    <img src="<?= assets("themes/user/img/category/Cell-structures.png") ?>" height="60"/>
                    <p class="category-name">Cell structures</p>
                </div>
                <div class="col-md-7 col-12 p-0">
                    <dl>
                        <dd><a href="<?= url("/connector") ?>?id=38"
                               class="link <?= $_GET["id"] == 38 ? "selected" : "color-black" ?>">FSC</a></dd>
                    </dl>

                </div>
                <div class="col-2"></div>

            </div>


        </div>
        <!--categories section-->


        <?php require_once "layout/sub_nav.layout.php" ?>


        <div class="divider"></div>

        <h4 class="connector-heading my-5" id="heading"><?= $title ?></h4>

        <div class="divider"></div>


        <?php foreach ($templates as $template): ?>
            <?= $template ?>
            <div class="divider"></div>
        <?php endforeach; ?>



        <?php require_once basePath("views/user/templates/template-02.php") ?>
    </div>


</div>
<!--body section-->


<?php require_once "layout/end.layout.php" ?>

<script>

    $(document).on("click", ".request-connector", async function () {
        const id = $(this).attr('data-id');
        let path = `order/request?id=` + id + "&lang=<?= $_SESSION["lang"] ?>";
        let authenticated = false;
        <?php if(isset($_SESSION["auth"]) && $_SESSION["auth"] == true){ ?>
        authenticated = true;
        <?php } ?>

        try {
            if (authenticated) {
                await loadModal(baseModal, path);

                let today = new Date();
                let yyyy = today.getFullYear();
                let mm = String(today.getMonth() + 1).padStart(2, '0');
                let dd = String(today.getDate()).padStart(2, '0');
                let formattedDate = yyyy + '-' + mm + '-' + dd;

                $(".datepicker").attr("min", formattedDate)

            } else {
                window.location.href = "<?= url("/login") ?>?redirect=connector?id=<?= $_GET["id"] ?>";
            }
        } catch (err) {
            toast.error("An error occurred while attempting to open the create connector.. " + err);
        }
    });

    $(document).ready(function () {
        $('html, body').animate({
            scrollTop: $('#heading').offset().top
        }, 'slow');

        $(".request-connector-btn").addClass("request-connector");

    });
    $(document).on("submit", ".orderRequestForm", async function (e) {
        e.preventDefault();

        const btn = $(this).find("button[type=submit]");
        const btnLabel = btn.text();
        loadButton(btn, "submitting");
        const form = $(this);
        const URL = form.attr('action');
        const formData = form.serialize();
        try {
            let response = await makeAjaxCall(URL, formData);
            toast.success(response.message);
            location.reload();
        } catch (err) {
            err = JSON.parse(err);
            toast.error(err.message);
            $(".error-msg").text(err.message);
            $("input").removeClass("is-invalid");
            $("input[name=" + err.errors.key + "]").addClass("is-invalid");
        } finally {
            resetButton(btn, btnLabel);
        }
    });
</script>

