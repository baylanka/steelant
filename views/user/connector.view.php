<?php

require_once "layout/start.layout.php";

use helpers\services\CategoryService;
use helpers\services\RouterService;
use helpers\translate\Translate;

?>

<!--body section-->
<div class="jumbotron p-0 m-0">

    <img src="<?= CategoryService::getParentCategory($_GET["id"])->getBannerUrl(); ?>" class="w-100 banner-image"/>

    <div class="responsive-wrap px-4">


        <!--categories section-->
        <div class="row pt-5 gap-0">


            <div class="col-md-4 col-12 d-flex gap-3 margin-bottom-sm">
                <img src="<?= CategoryService::getParentCategory($_GET["id"])->getThumbnailUrl(); ?>" height="80"/>
                <p class="category-name selected"><?= CategoryService::getParentCategory($_GET["id"])->getNameByLang(Translate::getLang()); ?></p>
            </div>
            <div class="col-md-2 col-12 <?= $_GET["id"] > 15 ? "d-none" : "" ?>">
                <dl>
                    <dt class="color-blue mb-2">LARSSEN</dt>
                    <dd class="category-item custom-font">
                        <a href="<?= RouterService::getCategoryPageRoute(3) ?>"
                           class="link <?= $_GET["id"] == 3 ? "selected" : "color-black" ?> category-item-text">Corner connectors</a>
                    </dd>
                    <dd class="category-item custom-font">
                        <a href="<?= RouterService::getCategoryPageRoute(4) ?>"
                           class="link <?= $_GET["id"] == 4 ? "selected" : "color-black" ?> category-item-text">Omega corner
                            connectors</a></dd>
                    <dd class="category-item custom-font">
                        <a href="<?= RouterService::getCategoryPageRoute(5) ?>"
                           class="link <?= $_GET["id"] == 5 ? "selected" : "color-black" ?> category-item-text">T connectors</a></dd>
                    <dd class="category-item custom-font">
                        <a href="<?= RouterService::getCategoryPageRoute(6) ?>"
                           class="link <?= $_GET["id"] == 6 ? "selected" : "color-black" ?> category-item-text">Cross connectors</a>
                    </dd>
                    <dd class="category-item custom-font">
                        <a href="<?= RouterService::getCategoryPageRoute(7) ?>"
                           class="link <?= $_GET["id"] == 7 ? "selected" : "color-black" ?> category-item-text">Weld-on connectors</a>
                    </dd>
                </dl>
            </div>
            <div class="col-md-2 col-12 <?= $_GET["id"] > 15 ? "d-none" : "" ?>">
                <dl>
                    <dt class="color-blue mb-2">BALL + SOCKET</dt>
                    <dd class="category-item custom-font">
                        <a href="<?= RouterService::getCategoryPageRoute(9) ?>"
                           class="link <?= $_GET["id"] == 9 ? "selected" : "color-black" ?> category-item-text">US Corner
                            connectors</a></dd>
                    <dd class="category-item custom-font">
                        <a href="<?= RouterService::getCategoryPageRoute(10) ?>"
                           class="link <?= $_GET["id"] == 10 ? "selected" : "color-black" ?> category-item-text">US T connectors</a>
                    </dd>
                    <dd class="category-item custom-font">
                        <a href="<?= RouterService::getCategoryPageRoute(11) ?>"
                           class="link <?= $_GET["id"] == 11 ? "selected" : "color-black" ?> category-item-text">US Cross
                            connectors</a>
                    </dd>
                    <dd class="category-item custom-font">
                        <a href="<?= RouterService::getCategoryPageRoute(12) ?>"
                           class="link <?= $_GET["id"] == 12 ? "selected" : "color-black" ?> category-item-text">MF connectors,
                            weld-ons</a>
                    </dd>
                </dl>
            </div>
            <div class="col-md-2 col-12 <?= $_GET["id"] > 15 ? "d-none" : "" ?>">
                <dl>
                    <dt class="color-blue mb-2">COLD FORMED</dt>
                    <dd class="category-item custom-font">
                        <a href="<?= RouterService::getCategoryPageRoute(14) ?>"
                           class="link <?= $_GET["id"] == 14 ? "selected" : "color-black" ?> category-item-text">CF corner
                            connector</a>
                    </dd>
                    <dd class="category-item custom-font">
                        <a href="<?= RouterService::getCategoryPageRoute(15) ?>"
                           class="link <?= $_GET["id"] == 15 ? "selected" : "color-black" ?> category-item-text">CF weld-on
                            connector</a>
                    </dd>
                </dl>
            </div>



            <div class="col-md-2 col-12 <?= $_GET["id"] < 16 || $_GET["id"] > 20 ? "d-none" : "" ?>">
                <dl>
                    <dd class="category-item custom-font"><a href="<?= RouterService::getCategoryPageRoute(17) ?>"
                           class="link <?= $_GET["id"] == 17 ? "selected" : "color-black" ?> category-item-text">MF</a></dd>
                    <dd class="category-item custom-font"><a href="<?= RouterService::getCategoryPageRoute(18) ?>"
                           class="link <?= $_GET["id"] == 18 ? "selected" : "color-black" ?> category-item-text">MDF</a></dd>
                    <dd class="category-item custom-font"><a href="<?= RouterService::getCategoryPageRoute(19) ?>"
                           class="link <?= $_GET["id"] == 19 ? "selected" : "color-black" ?> category-item-text">LPB</a></dd>
                    <dd class="category-item custom-font"><a href="<?= RouterService::getCategoryPageRoute(20) ?>"
                           class="link <?= $_GET["id"] == 20 ? "selected" : "color-black" ?> category-item-text">FD</a></dd>
                </dl>
            </div>

            <div class="col-md-2 col-12 <?= $_GET["id"] != 22 ? "d-none" : "" ?>">
                <dl>
                    <dd class="category-item custom-font"><a href="<?= RouterService::getCategoryPageRoute(22) ?>"
                           class="link <?= $_GET["id"] == 22 ? "selected" : "color-black" ?> category-item-text">MF DTH</a></dd>
                </dl>
            </div>

            <div class="col-md-2 col-12 <?= $_GET["id"] < 23 || $_GET["id"] > 28 ? "d-none" : "" ?>">
                <dl>
                    <dd class="category-item custom-font"><a href="<?= RouterService::getCategoryPageRoute(24) ?>"
                           class="link <?= $_GET["id"] == 24 ? "selected" : "color-black" ?> category-item-text">L (Larssen)</a>
                    </dd>
                    <dd class="category-item custom-font"><a href="<?= RouterService::getCategoryPageRoute(25) ?>"
                           class="link <?= $_GET["id"] == 25 ? "selected" : "color-black" ?> category-item-text">LPB (Larssen)</a>
                    </dd>
                    <dd class="category-item custom-font"><a href="<?= RouterService::getCategoryPageRoute(26) ?>"
                           class="link <?= $_GET["id"] == 26 ? "selected" : "color-black" ?> category-item-text">MF (Ball +
                            Socket)</a></dd>
                    <dd class="category-item custom-font"><a href="<?= RouterService::getCategoryPageRoute(27) ?>"
                           class="link <?= $_GET["id"] == 27 ? "selected" : "color-black" ?> category-item-text">MDF (Ball +
                            Socket)</a></dd>
                    <dd class="category-item custom-font"><a href="<?= RouterService::getCategoryPageRoute(28) ?>"
                           class="link <?= $_GET["id"] == 28 ? "selected" : "color-black" ?> category-item-text">CF (Cold
                            Formed)</a></dd>
                </dl>
            </div>

            <div class="col-md-2 col-12 <?= $_GET["id"] < 29 || $_GET["id"] > 32 ? "d-none" : "" ?>">
                <dl>
                    <dd class="category-item custom-font"><a href="<?= RouterService::getCategoryPageRoute(30) ?>"
                           class="link <?= $_GET["id"] == 30 ? "selected" : "color-black" ?> category-item-text">MF</a></dd>
                    <dd class="category-item custom-font"><a href="<?= RouterService::getCategoryPageRoute(31) ?>"
                           class="link <?= $_GET["id"] == 31 ? "selected" : "color-black" ?> category-item-text">MDF</a></dd>
                    <dd class="category-item custom-font"><a href="<?= RouterService::getCategoryPageRoute(32) ?>"
                           class="link <?= $_GET["id"] == 32 ? "selected" : "color-black" ?> category-item-text">FD</a></dd>
                </dl>
            </div>

            <div class="col-md-2 col-12 <?= $_GET["id"] < 33 || $_GET["id"] > 36 ? "d-none" : "" ?>">
                <dl>
                    <dd class="category-item custom-font"><a href="<?= RouterService::getCategoryPageRoute(34) ?>"
                           class="link <?= $_GET["id"] == 34 ? "selected" : "color-black" ?> category-item-text">LPB (Larssen)</a>
                    </dd>
                    <dd class="category-item custom-font"><a href="<?= RouterService::getCategoryPageRoute(35) ?>"
                           class="link <?= $_GET["id"] == 35 ? "selected" : "color-black" ?> category-item-text">MF (Ball +
                            Socket)</a></dd>
                    <dd class="category-item custom-font"><a href="<?= RouterService::getCategoryPageRoute(36) ?>"
                           class="link <?= $_GET["id"] == 36 ? "selected" : "color-black" ?> category-item-text">MDF (Ball +
                            Socket)</a></dd>
                </dl>
            </div>

            <div class="col-md-2 col-12 <?= $_GET["id"] != 38 ? "d-none" : "" ?>">
                <dl>
                    <dd class="category-item custom-font">
                        <a href="<?= RouterService::getCategoryPageRoute(38) ?>"
                           class="link <?= $_GET["id"] == 38 ? "selected" : "color-black" ?> category-item-text">FSC</a>
                    </dd>
                </dl>
            </div>



        </div>
        <!--categories section-->


        <?php require_once "layout/sub_nav.layout.php" ?>

        <div class="divider"></div>

        <h4 class="connector-heading my-4" id="heading"><?= $title ?></h4>

        <div class="divider"></div>


        <?php foreach ($templates as $template): ?>
            <?= $template ?>
            <div class="divider"></div>
        <?php endforeach; ?>


    </div>


</div>
<!--body section-->


<?php require_once "layout/end.layout.php" ?>

<script>



    $(document).on("click", ".request-connector", async function () {
        const id = $(this).attr('data-id');
        let path = `${getBaseUrl()}/order/request?id=` + id + "&lang=<?= $_SESSION["lang"] ?>";
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
                window.location.href = "<?= url("/login") ?>?redirect=contents?id=<?= $_GET["id"] ?>";
            }
        } catch (err) {
            toast.error("An error occurred while attempting to open the create connector.. " + err);
        }
    });

    $(document).ready(function () {


        $(".request-connector-btn").addClass("request-connector");


        if($(".convert_by_image").length){
            let height  = $(".convert_by_image").css("height");
            $(".convertable_image").css("height",height)
        }

        if($(".convert_by_image_2").length){
            console.log("1");
            let height  = $(".convert_by_image_2").css("height");
            height.replace("px", "");
            height = (parseInt(height) - 20.8)/2;
            $(".convertable_image_2").css("height",height+"px");
        }

        if($(".convert_by_image3").length){
            console.log("2");
            let height  = $(".convert_by_image3").css("height");
            $(".convertable_image3").css("height",height)
        }

        $(document).on("fullscreenchange","video",function () {
            if($(this).css("object-fit") === "cover")
                $(this).css("object-fit","contain");
            else
                $(this).css("object-fit","cover");

        })

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

    $(document).on("click", ".add_to_favourite", async function (e) {

        const notice = `
                <p><b><?= Translate::get("connector_page", "add_to_favourite_message") ?><b><p>
            `;
        if (!await isConfirmToProcess(notice, 'info',
            "<?= Translate::get("alert", "are_you_sure") ?>",
            "<?= Translate::get("common", "confirm") ?>",
            "<?= Translate::get("common", "cancel") ?>")) {
            return;
        }

        let id = $(this).attr("data-id");
        try {
            let response = await makeAjaxCall(`<?= url('/connector/add_to_favourite') . "?id=" ?>${id}`, {}, "GET");
            $(this).find("img").attr("src", "<?= assets("themes/user/img/star.png") ?>");

            toast.success(response.message);
        } catch (err) {
            err = JSON.parse(err);
            toast.error(err.message);

        }
    });
</script>

