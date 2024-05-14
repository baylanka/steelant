<?php

require_once "layout/start.layout.php";

use helpers\services\CategoryService;
use helpers\services\RouterService;
use helpers\translate\Translate;

?>
<style>
    .template-img {
        background-color: #eef2f7;
        width: 100% !important;
        display: block;
    }
</style>

<!--body section-->
<div class="jumbotron p-0 m-0">

    <img src="<?= $categoryDTOCollection->bannerURL ?>"
         alt="<?= $categoryDTOCollection->bannerName ?>" class="w-100 banner-image"/>

    <div class="responsive-wrap px-4">


        <!--categories section-->
        <div class="row pt-5 gap-0">


            <div class="col-md-4 col-12 d-flex gap-3 margin-bottom-sm">
                <img src="<?= $categoryDTOCollection->parentCategory->getThumbnailUrl() ?>" height="80"/>
                <p class="category-name selected"><?= $categoryDTOCollection->parentCategory->getNameByLang(Translate::getLang()); ?></p>
            </div>


            <?php foreach ($categoryDTOCollection->children as $group): ?>
                <div class="col-12 <?=$categoryDTOCollection->multiLevelExists ? 'col-md-2': 'col-md-3'?>">
                    <dl>
                        <?php if(!$categoryDTOCollection->multiLevelExists): ?>
                            <dd class="color-blue mb-2 font-weight-bold"><?= Translate::get("connector_page", "connector_series") ?></dd>
                        <?php endif ?>
                        <?php foreach ($group as $category): ?>
                            <?php if($categoryDTOCollection->multiLevelExists && $category->level == 2):?>
                                <dt class="color-blue mb-2"><?=$category->getNameByLang($language)?></dt>
                            <?php else: ?>
                                <dd class="category-item custom-font">
                                    <a href="<?= RouterService::getCategoryPageRoute($category->id) ?>"
                                       class="link <?= $_GET["id"] == $category->id ? "selected" : "color-black" ?> category-item-text">
                                        <?=$category->getNameByLang($language)?>
                                    </a>
                                </dd>
                            <?php endif; ?>

                        <?php endforeach; ?>
                    </dl>
                </div>
            <?php endforeach; ?>

        </div>
        <!--categories section-->


        <?php require_once "layout/sub_nav.layout.php" ?>

        <div class="divider"></div>
        <?php if(!empty($title)): ?>
            <h4 class="connector-heading my-4" id="heading"><?= $title ?></h4>

            <div class="divider"></div>
        <?php endif ?>


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
            let height  = $(".convert_by_image_2").css("height");
            height.replace("px", "");
            height = (parseInt(height) - 20.8)/2;
            $(".convertable_image_2").css("height",height+"px");
        }

        if($(".convert_by_image3").length){
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
        e.preventDefault();
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

