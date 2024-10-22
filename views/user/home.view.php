<?php
    use helpers\services\RouterService;
    use helpers\services\CategoryService;
    use helpers\translate\Translate;
    use helpers\repositories\CategoryRepository;
?>

<?php require_once "layout/start.layout.php"; ?>

<!--body section-->
<div class="jumbotron" style="background-color: #ECEDF5;">

    <img src="<?= assets("themes/user/img/hero-image.png") ?>" srcset="<?= assets("themes/user/img/hero-image.png") ?> 3x" class="w-100 banner-image"/>

        <!--categories section-->
        <div class="row w-100 px-4 py-5">
            <?php
                $language = Translate::getLang();
                foreach ($categoryGroups as $group):
            ?>
                <?php $multiRowExists = sizeof($group) > 1; ?>
                    <div class="col-12 col-md-4 col-xxl-4 row gap-3">
                        <?php foreach($group as $category): ?>
                            <?php if($exception_region->isExceptionalRegion($category->id, $lang)): ?>
                                <?php continue ?>
                            <?php endif ?>
                            <div class="col-4 col-md-3 col-xl-3 col-xxl-3 <?= $multiRowExists ? 'item-height-200' : '' ?>">
                                <img src="<?= $category->getThumbnailUrl(); ?>" height="80"/>
                            </div>

                            <div class="col-8 col-md-8 col-xl-8 col-xxl-8 <?= $multiRowExists ? 'item-height-200' : '' ?>">
                                    <?php $hasThirdLevels = CategoryRepository::hasThirdLevelsOfChildren($category->id) ?>

                                    <dl>
                                        <p class="category-name"><?php print($category->getNameByLang($language))?></p>
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


        <div class="row pt-1 ps-3 pe-3 mb-5" id="gallery-container" style="background-color: white;">


            <div class="col-sm-12 col-md-4 mt-3 col-lg-4 pe-0">
                <img src="<?= assets("themes/user/img/gallery-1.png") ?>" srcset="<?= assets("themes/user/img/gallery-1.png") ?> 3x" class="img-fluid h-100 w-100">
            </div>


            <div class="col-sm-12 col-md-8 mt-3 col-lg-8">
                <img src="<?= assets("themes/user/img/gallery-2.png") ?>"  srcset="<?= assets("themes/user/img/gallery-2.png") ?> 3x" class="img-fluid h-100 w-100">
            </div>


            <div class="col-sm-12 col-md-4 col-lg-4 pe-0" style="margin-top: 35px;">
                <img src="<?= assets("themes/user/img/gallery-3.png") ?>"  srcset="<?= assets("themes/user/img/gallery-3.png") ?> 3x" class="img-fluid h-100 w-100">
            </div>


            <div class="col-sm-12 col-md-4 col-lg-4 pe-0"  style="margin-top: 35px;">
                <img src="<?= assets("themes/user/img/gallery-4.png") ?>"  srcset="<?= assets("themes/user/img/gallery-4.png") ?> 3x" class="img-fluid h-100 w-100">
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4"  style="margin-top: 35px;">
                <img src="<?= assets("themes/user/img/gallery-5.png") ?>"  srcset="<?= assets("themes/user/img/gallery-5.png") ?> 3x" class="img-fluid h-100 w-100">
            </div>

            <div class="col-sm-12 col-md-8  col-lg-8  pe-0"  style="margin-top: 35px;">
                <img src="<?= assets("themes/user/img/gallery-7.png") ?>"  srcset="<?= assets("themes/user/img/gallery-7.png") ?> 3x" class="img-fluid h-100 w-100">
            </div>


            <div class="col-sm-12 col-md-4  col-lg-4"  style="margin-top: 35px;">
                <img src="<?= assets("themes/user/img/gallery-6.png") ?>"  srcset="<?= assets("themes/user/img/gallery-6.png") ?> 3x" class="img-fluid h-100 w-100">
            </div>


        </div>


</div>


<?php require_once "layout/end.layout.php" ?>
