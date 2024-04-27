<?php

use model\Media;
use model\Template;

?>


<?php
$imageContainerSize01 = "col-12 col-md-6 col-xxl-6 d-flex flex-column margin-bottom-sm";
?>

<div class="row my-5" id="<?= $connector->id ?>">

    <div class="col-12 col-md-4 col-xxl-4 margin-bottom-sm">
        <?php
        require basePath("/views/template/text_view.template.php");
        ?>
    </div>


    <?php

    $view_2rd_row = "";
    $view_3rd_row = "";
    $view_4th_row = "";

    $image_2 = $connector->getImageAttributes(2);
    $image_3 = $connector->getImageAttributes(3);
    $image_4 = $connector->getImageAttributes(4);


    if ($mode === Template::MODE_VIEW && empty($image_2->src) && empty($image_6->src))
        $view_2rd_row = "d-none";

    if ($mode === Template::MODE_VIEW && empty($image_3->src) && empty($image_7->src))
        $view_3rd_row = "d-none";

    if ($mode === Template::MODE_VIEW && empty($image_4->src) && empty($image_8->src))
        $view_4th_row = "d-none";
    ?>


    <div class="<?= $imageContainerSize01 ?>">


        <!-- ///////  Image 01  /////// -->
        <?php
        $placeHolder = 1;
        $headingPlaceHolder = "head-01";
        $imageAttr = $connector->getImageAttributes($placeHolder);
        ?>
        <!--Duplicate element Start-->
        <div class="template-img-container  <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'remove-on-sm' : '' ?>">

            <!--Duplicate element - for title Start-->
            <?php
            $imageTitleExists = !empty($imageAttr->title);
            if ($mode === Template::MODE_VIEW): ?>
                <span class="color-blue <?= $imageTitleExists ? '' : 'invisible' ?>"><?= $imageAttr->title ?></span>
                <br>
            <?php else: ?>
                <?php if ($imageTitleExists): ?>
                    <div class=" d-flex align-middle gap-2">
                        <input class="img-heading form-control" type="text"
                               data-heading="<?= $headingPlaceHolder ?>"
                               data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                               placeholder="Heading"
                               name="<?= $imageAttr->titleFieldName ?>" value="<?= $imageAttr->title ?>">
                    </div>
                    <br>
                <?php else: ?>
                    <span class="color-blue template-img-heading"
                          data-heading="<?= $headingPlaceHolder ?>">Heading</span><br>
                <?php endif ?>
            <?php endif; ?>
            <!--Duplicate element - for title End-->


            <?php if (($imageAttr->type && $imageAttr->type == Media::TYPE_IMAGE) || $mode === Template::MODE_EDIT): ?>

                <img class="img-fluid template-img convertable_image <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                     data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                     alt="<?= $imageAttr->media_name ?>"
                    <?php if ($imageAttr->src && $imageAttr->type == Media::TYPE_VIDEO): ?>
                        src="<?= assets("themes/user/img/selected_video.png") ?>"
                    <?php else: ?>
                        src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-280-180.png") ?>"
                    <?php endif; ?>
                     style="aspect-ratio : 8 / 3;object-fit: cover; margin-top:0.8rem;"
                />

            <?php else: ?>

                <video class="img-fluid template-img <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                       data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                       alt="<?= $imageAttr->media_name ?>"
                       style="aspect-ratio : 8 / 3;object-fit: cover; margin-top:0.8rem;" controls autoplay muted>
                    <source src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-280-180.png") ?>"
                            type="video/mp4">
                    Your browser does not support the video tag.
                </video>

            <?php endif; ?>

            <a class="remove-image-btn btn btn-sm btn-danger border border-light
                    <?= (empty($imageAttr->src) || $mode === Template::MODE_VIEW) ? 'd-none' : ' ' ?> position-absolute "
               data-toggle="tooltip" title="reset image" style="margin-left: -2rem;">
                <i class="bi bi-trash3-fill"></i>
            </a>


            <?php if ($mode === Template::MODE_EDIT): ?>
                <br/>
                <input type="file"
                       name="<?= $imageAttr->image_file_name ?>"
                       class="template-img-input d-none" data-width="180" data-height="180">
                <input type="hidden"
                       name="<?= $imageAttr->languageName ?>"
                       value="<?= $connector->language ?>" class="image-language">
                <input type="hidden"
                       name="<?= $imageAttr->placeHolderName ?>"
                       value="<?= $placeHolder ?>" class="image-placeholder">
                <?php if (!empty($imageAttr->file_src)): ?>
                    <input type="hidden" class="file_src"
                           name="<?= $imageAttr->file_src ?>"
                           value="<?= $imageAttr->src ?? '' ?>">
                <?php endif; ?>
            <?php endif; ?>


        </div>
        <!--Duplicate element End-->

        <!-- ///////  Image 01  /////// -->


        <!-- ///////  Image 02  /////// -->

        <?php
        $placeHolder = 2;
        $imageAttr = $connector->getImageAttributes($placeHolder);
        ?>
        <div class="template-img-container mt-2 <?= $view_2rd_row ?> <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'remove-on-sm' : '' ?>">

            <?php if (($imageAttr->type && $imageAttr->type == Media::TYPE_IMAGE) || $mode === Template::MODE_EDIT): ?>

                <img class="img-fluid template-img convertable_image <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                     data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                     alt="<?= $imageAttr->media_name ?>"
                    <?php if ($imageAttr->src && $imageAttr->type == Media::TYPE_VIDEO): ?>
                        src="<?= assets("themes/user/img/selected_video.png") ?>"
                    <?php else: ?>
                        src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-280-180.png") ?>"
                    <?php endif; ?>
                     style="aspect-ratio : 8 / 3;object-fit: cover; margin-top:0.8rem;"
                />

            <?php else: ?>

                <video class="img-fluid template-img <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                       data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                       alt="<?= $imageAttr->media_name ?>"
                       style="aspect-ratio : 8 / 3;object-fit: cover; margin-top:0.8rem;" controls autoplay muted>
                    <source src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-280-180.png") ?>"
                            type="video/mp4">
                    Your browser does not support the video tag.
                </video>

            <?php endif; ?>

            <a class="remove-image-btn btn btn-sm btn-danger border border-light
                    <?= (empty($imageAttr->src) || $mode === Template::MODE_VIEW) ? 'd-none' : ' ' ?> position-absolute "
               data-toggle="tooltip" title="reset image" style="margin-left: -2rem;">
                <i class="bi bi-trash3-fill"></i>
            </a>


            <?php if ($mode === Template::MODE_EDIT): ?>
                <br/>
                <input type="file"
                       name="<?= $imageAttr->image_file_name ?>"
                       class="template-img-input d-none" data-width="180" data-height="180">
                <input type="hidden"
                       name="<?= $imageAttr->languageName ?>"
                       value="<?= $connector->language ?>" class="image-language">
                <input type="hidden"
                       name="<?= $imageAttr->placeHolderName ?>"
                       value="<?= $placeHolder ?>" class="image-placeholder">
                <?php if (!empty($imageAttr->file_src)): ?>
                    <input type="hidden" class="file_src"
                           name="<?= $imageAttr->file_src ?>"
                           value="<?= $imageAttr->src ?? '' ?>">
                <?php endif; ?>
            <?php endif; ?>


        </div>

        <!-- ///////  Image 02  /////// -->

        <!-- ///////  Image 03  /////// -->

        <?php
        $placeHolder = 3;
        $imageAttr = $connector->getImageAttributes($placeHolder);
        ?>
        <div class="template-img-container mt-2 <?= $view_3rd_row ?> <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'remove-on-sm' : '' ?>">

            <?php if (($imageAttr->type && $imageAttr->type == Media::TYPE_IMAGE) || $mode === Template::MODE_EDIT): ?>

                <img class="img-fluid template-img convertable_image <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                     data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                     alt="<?= $imageAttr->media_name ?>"
                    <?php if ($imageAttr->src && $imageAttr->type == Media::TYPE_VIDEO): ?>
                        src="<?= assets("themes/user/img/selected_video.png") ?>"
                    <?php else: ?>
                        src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-280-180.png") ?>"
                    <?php endif; ?>
                     style="aspect-ratio : 8 / 3;object-fit: cover; margin-top:0.8rem;"
                />

            <?php else: ?>

                <video class="img-fluid template-img <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                       data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                       alt="<?= $imageAttr->media_name ?>"
                       style="aspect-ratio : 8 / 3;object-fit: cover; margin-top:0.8rem;" controls autoplay muted>
                    <source src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-280-180.png") ?>"
                            type="video/mp4">
                    Your browser does not support the video tag.
                </video>

            <?php endif; ?>

            <a class="remove-image-btn btn btn-sm btn-danger border border-light
                    <?= (empty($imageAttr->src) || $mode === Template::MODE_VIEW) ? 'd-none' : ' ' ?> position-absolute "
               data-toggle="tooltip" title="reset image" style="margin-left: -2rem;">
                <i class="bi bi-trash3-fill"></i>
            </a>


            <?php if ($mode === Template::MODE_EDIT): ?>
                <br/>
                <input type="file"
                       name="<?= $imageAttr->image_file_name ?>"
                       class="template-img-input d-none" data-width="180" data-height="180">
                <input type="hidden"
                       name="<?= $imageAttr->languageName ?>"
                       value="<?= $connector->language ?>" class="image-language">
                <input type="hidden"
                       name="<?= $imageAttr->placeHolderName ?>"
                       value="<?= $placeHolder ?>" class="image-placeholder">
                <?php if (!empty($imageAttr->file_src)): ?>
                    <input type="hidden" class="file_src"
                           name="<?= $imageAttr->file_src ?>"
                           value="<?= $imageAttr->src ?? '' ?>">
                <?php endif; ?>
            <?php endif; ?>


        </div>

        <!-- ///////  Image 03  /////// -->

        <!-- ///////  Image 04  /////// -->

        <?php
        $placeHolder = 4;
        $imageAttr = $connector->getImageAttributes($placeHolder);
        ?>
        <div class="template-img-container mt-2 <?= $view_4th_row ?> <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'remove-on-sm' : '' ?>">

            <?php if (($imageAttr->type && $imageAttr->type == Media::TYPE_IMAGE) || $mode === Template::MODE_EDIT): ?>

                <img class="img-fluid template-img convertable_image <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                     data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                     alt="<?= $imageAttr->media_name ?>"
                    <?php if ($imageAttr->src && $imageAttr->type == Media::TYPE_VIDEO): ?>
                        src="<?= assets("themes/user/img/selected_video.png") ?>"
                    <?php else: ?>
                        src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-280-180.png") ?>"
                    <?php endif; ?>
                     style="aspect-ratio : 8 / 3;object-fit: cover; margin-top:0.8rem;"
                />

            <?php else: ?>

                <video class="img-fluid template-img <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                       data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                       alt="<?= $imageAttr->media_name ?>"
                       style="aspect-ratio : 8 / 3;object-fit: cover; margin-top:0.8rem;" controls autoplay muted>
                    <source src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-280-180.png") ?>"
                            type="video/mp4">
                    Your browser does not support the video tag.
                </video>

            <?php endif; ?>

            <a class="remove-image-btn btn btn-sm btn-danger border border-light
                    <?= (empty($imageAttr->src) || $mode === Template::MODE_VIEW) ? 'd-none' : ' ' ?> position-absolute "
               data-toggle="tooltip" title="reset image" style="margin-left: -2rem;">
                <i class="bi bi-trash3-fill"></i>
            </a>


            <?php if ($mode === Template::MODE_EDIT): ?>
                <br/>
                <input type="file"
                       name="<?= $imageAttr->image_file_name ?>"
                       class="template-img-input d-none" data-width="180" data-height="180">
                <input type="hidden"
                       name="<?= $imageAttr->languageName ?>"
                       value="<?= $connector->language ?>" class="image-language">
                <input type="hidden"
                       name="<?= $imageAttr->placeHolderName ?>"
                       value="<?= $placeHolder ?>" class="image-placeholder">
                <?php if (!empty($imageAttr->file_src)): ?>
                    <input type="hidden" class="file_src"
                           name="<?= $imageAttr->file_src ?>"
                           value="<?= $imageAttr->src ?? '' ?>">
                <?php endif; ?>
            <?php endif; ?>


        </div>

        <!-- ///////  Image 04  /////// -->


    </div>


</div>