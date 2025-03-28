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

    .footer-nav-list-padding{
        padding: 10.5px 0 0 10.5px !important;
    }
</style>

<!--body section-->
<div class="jumbotron p-0 m-0">

    <?php
    if ($categoryDTOCollection->hasBanner):
        ?>
        <img src="<?= $categoryDTOCollection->bannerURL ?>"
             alt="<?= $categoryDTOCollection->bannerName ?>" class="w-100 banner-image"/>
    <?php
    endif;
    ?>

    <div class="responsive-wrap alignment-full-padding">


        <!--categories section-->
        <div class="row gap-0">


            <div class="col-md-4 col-12 d-flex gap-3 margin-bottom-sm">
                <img src="<?= $categoryDTOCollection->parentCategory->getThumbnailUrl() ?>" height="80" alt="thumbnail image"/>
                <p class="category-name selected"><?= $categoryDTOCollection->parentCategory->getNameByLang(Translate::getLang()); ?></p>
            </div>


            <?php foreach ($categoryDTOCollection->children as $index => $group): ?>
                <div class="col-12 <?= $categoryDTOCollection->multiLevelExists ? 'col-md-2' : 'col-md-3' ?>">
                    <dl>
                        <?php if (!$categoryDTOCollection->multiLevelExists): ?>
                            <?php if(sizeof($group) > 1): ?>
                                <dd class="color-blue mb-2 font-weight-bold"><?= Translate::get("connector_page", "connector_series") ?></dd>
                            <?php else: ?>
                                <dd class="color-blue mb-2 font-weight-bold"><?= Translate::get("connector_page", "connector") ?></dd>
                            <?php endif; ?>
                        <?php endif ?>
                        <?php foreach ($group as $category): ?>
                            <?php if ($exception_region->isExceptionalRegion($category->id, $language)): ?>
                                <?php continue ?>
                            <?php endif ?>


                            <?php if ($categoryDTOCollection->multiLevelExists && $category->level == 2): ?>
                                <dt class="color-blue mb-2"><?= $category->getNameByLang($language) ?></dt>
                            <?php else: ?>
                                <dd class="category-item custom-font">
                                    <a href="<?= RouterService::getCategoryPageRoute($category->id) ?>"
                                       class="link <?= $_GET["id"] == $category->id ? "selected" : "color-black" ?> category-item-text">
                                        <?= $category->getNameByLang($language) ?>
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

        <hr/>
        <?php if (!empty($categoryDTO->getTitle())): ?>
            <h4 class="connector-heading my-4" id="heading"><?= $categoryDTO->getTitle() ?></h4>

            <hr/>
        <?php endif ?>


        <?php foreach ($templates as $index => $template): ?>
            <?= $template ?>
            <?php if (($index + 1) < sizeof($templates)): ?>
                <hr class="non-margin"/>
            <?php endif; ?>
        <?php endforeach; ?>



        <?php
        $hasNonCategoricalLink = $categoryDTO->id == 22;

        function getPage($language)
        {
            ;
            $title = '';
            $description = '';
            $iconName = Translate::get("gallery_page","gallery");
            switch ($language) {
                case \helpers\pools\LanguagePool::GERMANY()->getLabel():
                    $title = "Verwandte Themen";
                    $description = "$iconName: DTH Bohrverfahren";
                    break;
                case \helpers\pools\LanguagePool::FRENCH()->getLabel():
                    $title = "Thèmes connexes";
                    $description = "$iconName: Procédé d’insertion DTH";
                    break;
                case \helpers\pools\LanguagePool::UK_ENGLISH()->getLabel():
                case \helpers\pools\LanguagePool::US_ENGLISH()->getLabel():
                    $title = "Related chapters";
                    $description = "$iconName: DTH driving method";
                    break;
            }

            return json_decode(json_encode([
                'title' => $title,
                'url' => url('/gallery'),
                'icon_url' => assets("themes/user/img/gallery-icon.png"),
                'icon_name' => $iconName,
                'description' => $description
            ]));

        }
        ?>

        <?php if ($categoryDTO->hasRelevantCategories()): ?>
            <?php
            $pages = $categoryDTO->getRelevantCategories();
            ?>
            <hr/>
            <h4 class="my-3 text-gray"><?= $pages[0]->title ?></h4>
            <hr class="non-margin"/>

            <?php foreach ($pages as $page): ?>
                <div class="col-12 col-md-12 col-xxl-12 d-flex gap-3 flex-wrap align-middle" style="cursor: pointer"
                     data-id="<?= $page->relevant_category_id ?>"
                     onclick="window.location.href='<?= RouterService::getCategoryPageRoute($page->relevant_category_id) ?>'">

                    <img
                            src="<?= $page->category->icon_url ?>"
                            alt="<?= $page->category->icon_name ?>"
                            height="80"/>

                    <div class="d-flex flex-column justify-content-center">
                        <dl class="text-gray m-0 text-bold">
                            <?= $page->description ?>
                        </dl>
                    </div>


                </div>

                <hr class="non-margin"/>

            <?php endforeach; ?>

        <?php elseif($hasNonCategoricalLink): ?>
            <?php $page = getPage($language); ?>
            <hr/>
            <h4 class="my-3 text-gray"><?= $page->title ?></h4>
            <hr class="non-margin"/>

            <div class="col-12 col-md-12 col-xxl-12 d-flex gap-3 flex-wrap align-middle" style="cursor: pointer"
                 onclick="window.location.href='<?= $page->url ?>'">

                <img
                        src="<?= $page->icon_url ?>"
                        alt="<?= $page->icon_name ?>"
                        height="80"/>

                <div class="d-flex flex-column justify-content-center">
                    <dl class="text-gray m-0 text-bold">
                        <?= $page->description ?>
                    </dl>
                </div>


            </div>

            <hr class="non-margin"/>
        <?php else: ?>

            <hr class="mb-5"/>

        <?php endif; ?>
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


        if ($(".convert_by_image").length) {
            let height = $(".convert_by_image").css("height");
            $(".convertable_image").css("height", height)
        }

        if ($(".convert_by_image_2").length) {
            let height = $(".convert_by_image_2").css("height");
            height.replace("px", "");
            height = (parseInt(height) - 20.8) / 2;
            $(".convertable_image_2").css("height", height + "px");
        }

        if ($(".convert_by_image3").length) {
            let height = $(".convert_by_image3").css("height");
            $(".convertable_image3").css("height", height)
        }

        $(document).on("fullscreenchange", "video", function () {
            if ($(this).css("object-fit") === "cover")
                $(this).css("object-fit", "contain");
            else
                $(this).css("object-fit", "cover");

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
        if (!await isConfirmToProcess(notice, 'favourite',
            "",
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

    $(document).ready(function(){
        showManipulatedURLOnDownloadableAnchorTags();
    });
</script>

