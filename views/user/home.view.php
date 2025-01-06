<?php
use helpers\services\RouterService;
use helpers\services\CategoryService;
use helpers\translate\Translate;
use helpers\repositories\CategoryRepository;
?>
<?php require_once "layout/start.layout.php"; ?>
<!--body section-->
<div class="jumbotron bg-gray">
    <img src="<?= assets("themes/user/img/hero-image-compressed.jpg") ?>" srcset="<?= assets("themes/user/img/hero-image.png") ?> 3x" class="w-100 banner-image" loading="eager" alt="steelwall-hero"/>
    <!--categories section-->
    <div class="row w-100 m-0 alignment-full-padding">
        <?php
        $language = Translate::getLang();
        foreach ($categoryGroups as $index => $group):
            ?>
            <?php $multiRowExists = sizeof($group) > 1; ?>
            <div class="col-12 col-md-4 col-xxl-4 menu-columns flex-gap-responsive p-0 <?= $index == 0 ? "padding-point-3":""?> <?= $index == 1 ? "padding-point-75":""?>">
                <?php foreach($group as $category): ?>
                    <?php if($exception_region->isExceptionalRegion($category->id, $lang)): ?>
                        <?php continue ?>
                    <?php endif ?>
                    <div class="col-4 col-md-3 col-xl-3 col-xxl-3 p-0 <?= $multiRowExists ? 'item-height-200' : '' ?>">
                        <img src="<?= $category->getThumbnailUrl(); ?>" height="80" loading="eager" alt="steelwall-category"/>
                    </div>

                    <div class="col-8 col-md-9 col-xl-9 col-xxl-9 p-0 <?= $multiRowExists ? 'item-height-200' : '' ?>">
                        <?php $hasThirdLevels = CategoryRepository::hasThirdLevelsOfChildren($category->id) ?>

                        <p class="category-name"><?php print($category->getNameByLang($language))?></p>
                        <dl>
                            <?php foreach ($category->getChildren() as $index => $child): ?>
                                <?php  if($exception_region->isExceptionalRegion($child->id, $lang)): ?>
                                    <?php continue ?>
                                <?php endif ?>

                                <?php if($hasThirdLevels): ?>
                                    <dt class="color-blue <?=$index>0? 'mt-4':''?>  mb-2"><?=$child->getNameByLang($language)?></dt>
                                <?php else : ?>
                                    <dd class="category-item">
                                        <a href="<?= RouterService::getCategoryPageRoute($child->id) ?>#heading"
                                           class="link color-black category-item-text"><?=$child->getNameByLang($language)?>
                                        </a>
                                    </dd>
                                <?php endif; ?>

                                <?php foreach ($child->getChildren() as $each): ?>
                                    <?php  if($exception_region->isExceptionalRegion($each->id, $lang)): ?>
                                        <?php continue ?>
                                    <?php endif ?>
                                    <dd class="category-item">
                                        <a href="<?= RouterService::getCategoryPageRoute($each->id) ?>#heading"
                                           class="link color-black category-item-text"><?=$each->getNameByLang($language)?>
                                        </a>
                                    </dd>
                                <?php endforeach; ?>


                            <?php endforeach; ?>
                        </dl>


                    </div>
                <?php endforeach; ?>
            </div>

        <?php endforeach; ?>

    </div>
    <!--categories section-->
    <div class="row alignment-full-padding m-0 bg-white justify-content-between" id="gallery-container">


        <div class="col-sm-12 col-md-4 mt-3 col-lg-4 p-0 only-desktop-square-width">
            <img data-src="<?= assets("themes/user/img/gallery-1-c.jpg") ?>" data-srcset="3x" srcset="<?= assets("themes/user/img/gallery-1-c.jpg") ?> 3x" class="img-fluid h-100 w-100" loading="lazy" alt="steelwall-gallery">
        </div>


        <div class="col-sm-12 col-md-8 mt-3 col-lg-8 only-desktop-rectangle-custom-padding">
            <img data-src="<?= assets("themes/user/img/gallery-2-c.jpg") ?>" data-srcset="3x" srcset="<?= assets("themes/user/img/gallery-2-c.jpg") ?> 3x" class="img-fluid h-100 w-100" loading="lazy" alt="steelwall-gallery">
        </div>


        <div class="col-sm-12 col-md-4 col-lg-4 p-0 only-desktop-square-width margin-top-35px">
            <img data-src="<?= assets("themes/user/img/gallery-3-c.jpg") ?>" data-srcset="3x" srcset="<?= assets("themes/user/img/gallery-3-c.jpg") ?> 3x" class="img-fluid h-100 w-100" loading="lazy" alt="steelwall-gallery">
        </div>


        <div class="col-sm-12 col-md-4 col-lg-4  p-0 only-desktop-square-width margin-top-35px">
            <img data-src="<?= assets("themes/user/img/gallery-4-c.jpg") ?>" data-srcset="3x" srcset="<?= assets("themes/user/img/gallery-4-c.jpg") ?> 3x" class="img-fluid h-100 w-100" loading="lazy" alt="steelwall-gallery">
        </div>

        <div class="col-sm-12 col-md-4 col-lg-4  p-0 only-desktop-square-width margin-top-35px">
            <img data-src="<?= assets("themes/user/img/gallery-5-c.jpg") ?>" data-srcset="3x"  srcset="<?= assets("themes/user/img/gallery-5-c.jpg") ?> 3x" class="img-fluid h-100 w-100" loading="lazy" alt="steelwall-gallery">
        </div>

        <div class="col-sm-12 col-md-8  col-lg-8  only-desktop-rectangle-custom-padding-right margin-top-35px">
            <img data-src="<?= assets("themes/user/img/gallery-7-c.jpg") ?>" data-srcset="3x" srcset="<?= assets("themes/user/img/gallery-7-c.jpg") ?> 3x" class="img-fluid h-100 w-100" loading="lazy" alt="steelwall-gallery">
        </div>


        <div class="col-sm-12 col-md-4 col-lg-4 p-0 only-desktop-square-width margin-top-35px">
            <img data-src="<?= assets("themes/user/img/gallery-6-c.jpg") ?>" data-srcset="3x" srcset="<?= assets("themes/user/img/gallery-6-c.jpg") ?> 3x" class="img-fluid h-100 w-100" loading="lazy" alt="steelwall-gallery">
        </div>


    </div>
</div>
<!--body section-->
<?php require_once "layout/end.layout.php" ?>
