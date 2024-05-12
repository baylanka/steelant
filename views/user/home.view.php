<?php
    use helpers\services\RouterService;
    use helpers\services\CategoryService;
    use helpers\translate\Translate;
    use helpers\repositories\CategoryRepository;
?>

<?php require_once "layout/start.layout.php"; ?>

<!--body section-->
<div class="jumbotron">

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
                            <div class="col-4 col-md-3 col-xl-3 col-xxl-3 <?= $multiRowExists ? 'item-height-200' : '' ?>">
                                <img src="<?= $category->getThumbnailUrl(); ?>" height="80"/>
                            </div>

                            <div class="col-7 col-md-7 col-xl-7 col-xxl-7 <?= $multiRowExists ? 'item-height-200' : '' ?>">
                                    <?php $hasThirdLevels = CategoryRepository::hasThirdLevelsOfChildren($category->id) ?>

                                    <dl>
                                        <p class="category-name"><?php print($category->getNameByLang($language))?></p>
                                        <?php foreach ($category->getChildren() as $index => $child): ?>

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
