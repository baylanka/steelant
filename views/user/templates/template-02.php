<?php
    use helpers\services\ConnectorService;
    use helpers\translate\Translate;
    use model\Template;
    use \model\Media;
    use helpers\pools\StandardLengthTypePool;
?>

<?php
    $imageContainerSize01 = "col-6 col-md-3 col-xxl-3 d-flex flex-column margin-bottom-sm";
?>

<div class="row my-5" id="<?= $connector->id ?>">

    <div class="col-12 col-md-4 col-xxl-4 margin-bottom-sm">
        <dl>
            <dt class="color-blue mb-2"><?= $connector->name ?? 'Connector Name' ?></dt>
            <?php if(!empty($connector->getSubtitleOfLang())): ?>
                <dd class="custom-dd custom-font">
                    <?=$connector->getSubtitleOfLang()?>
                </dd>
            <?php endif; ?>
            <dd class="custom-dd custom-font mt-4"><?= Translate::get("template_context", "steel_grade", $language) ?>: <?= empty($connector->grade) ? '---' : $connector->grade ?></dd>
            <dd class="custom-dd custom-font"><?= Translate::get("template_context", "steel_thickness", $language) ?>: <?= empty($connector->getThicknessOfLang()) ? '---' : $connector->getThicknessOfLang() ?>
            </dd>
            <dd class="custom-dd custom-font">
                <?php if ($connector->standardLengthType == StandardLengthTypePool::FIXED_SINGLE_VALUE): ?>
                    <?= Translate::get("template_context", "standard_length", $language) ?>:
                    <?= empty($connector->getLengthOfLang()) ? '---' : $connector->getLengthOfLang() ?>

                <?php elseif($connector->standardLengthType == StandardLengthTypePool::FIXED_MULTIPLE_VALUES):?>
                    <?= Translate::get("template_context", "standard_lengths", $language) ?>:
                    <?= empty($connector->getLengthOfLang()) ? '---' : $connector->getLengthOfLang() ?>

                <?php elseif ($connector->standardLengthType == StandardLengthTypePool::VARIABLE_VALUES): ?>
                    <?= Translate::get("template_context", "standard_length_variable", $language) ?> &nbsp;
                    <?= empty($connector->getLengthOfLang()) ? '---' : $connector->getLengthOfLang() ?>

                <?php endif  ?>
            </dd>

            <?php if (empty(sizeof($connector->getWeightArrayOfLang()))): ?>
                <dd class="custom-dd custom-font"><?= Translate::get("template_context", "weight", $language) ?>: ---</dd>
            <?php else: ?>
                <?php foreach ($connector->getWeightArrayOfLang() as $key => $value): ?>
                    <dd class="custom-dd custom-font"><?= Translate::get("template_context", "weight", $language) ?> <?= $key === 'general' ? '' : $key ?>: <?= $value ?></dd>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (!empty($connector->getMaxTensileStrengthByLang())): ?>
                <dd class="custom-dd custom-font"><?= Translate::get("template_context", "max_tensile_strength", $language) ?>: <?= $connector->getMaxTensileStrengthByLang() ?></dd>
            <?php endif; ?>

            <?php if (!empty($connector->getPressureLoadOfLang())): ?>
                <dd class="custom-dd custom-font"><?= Translate::get("template_context", "pressure_load", $language) ?>: <?= $connector->getPressureLoadOfLang() ?></dd>
            <?php endif; ?>

            <?php if (!empty($connector->getDeformationPathOfLang())): ?>
                <dd class="custom-dd custom-font"><?= Translate::get("template_context", "deformation_path", $language) ?>: <?= $connector->getDeformationPathOfLang() ?></dd>
            <?php endif; ?>


            <dd class="my-3 custom-font"><?= empty($connector->getDescriptionOfLang())
                    ? '' : $connector->getDescriptionOfLang() ?></dd>

            <?php foreach ($connector->getDownloadableFiles() as $fileArray): ?>
                <dd class="custom-dd custom-font"><a href="<?= $fileArray['file_asset_path'] ?>"
                                                     class="link color-black" download><?= $fileArray['title'] ?></a>
                </dd>
            <?php endforeach; ?>

            <dd class="custom-dd custom-font request-connector-btn" data-id="<?= $connector->id ?>"
                style="cursor: pointer;">
                <a class="link color-black"><?= Translate::get("template_context", "request_this_connector", $language) ?></a>
            </dd>
            <dd class="custom-dd custom-font d-flex align-middle gap-3 <?php if (isset($_SESSION["auth"])) {
                if (!ConnectorService::isFavourite($connector->id)): ?>add_to_favourite<?php endif;
            } ?>"
                data-id="<?= $connector->id ?>">
                <a <?php if (!isset($_SESSION["auth"])): ?> href="<?= url("/login") ?>" <?php endif; ?>
                        class="link color-black">
                    <?= Translate::get("template_context", "remember_this_connector", $language) ?></a>
                <?php
                $imageUrl = "";
                if (isset($_SESSION["auth"])) {
                    if (ConnectorService::isFavourite($connector->id)) {
                        $imageUrl = assets("themes/user/img/star.png");
                    } else {
                        $imageUrl = assets("themes/user/img/star-ash.png");
                    }
                } else {
                    $imageUrl = assets("themes/user/img/star-ash.png");
                }
                ?>
                <img class="align-self-center" src="<?= $imageUrl ?>" height="15"/>
            </dd>

            <dd class="custom-dd custom-font mt-4">
                <a class="link color-black"><?= $connector->getFooterOfLang() ?></a>
            </dd>

        </dl>
    </div>




    <?php
    $view_3rd_row = "";

    $image_4 = $connector->getImageAttributes(4);
    $image_5 = $connector->getImageAttributes(5);
    $image_6 = $connector->getImageAttributes(6);
    if ($mode === Template::MODE_VIEW && empty($image_4->src) && empty($image_5->src) && empty($image_6->src))
        $view_3rd_row = "d-none";
    ?>


    <div class="<?= $imageContainerSize01 ?>">

        <?php


        /*
            You can duplicate the elements between 'Duplicate element Start' and 'Duplicate element End' to create additional image containers.
            For resizing purposes, use variables like 'imageContainerSize01' to specify different container sizes and make them responsive.

            Within this section, you'll find 'Duplicate element - for title' and 'Duplicate element - for image'.
            You can choose to include or remove the title if needed for each image.

            Also, consider adding the following line for each 'Duplicate element':
            $imageAttr = $connector->getImageAttributes(1);
            add the number by order of 'Duplicate element'
         */


        ?>


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
                <span class="color-blue <?= $imageTitleExists ? '' : 'invisible' ?>" style="display: block; text-align: center;"><?= empty($imageAttr->title) ? "heading" : $imageAttr->title ?></span>
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

                <img class="img-fluid template-img <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                     data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                     alt="<?= $imageAttr->media_name ?>"
                    <?php if ($imageAttr->src && $imageAttr->type == Media::TYPE_VIDEO): ?>
                        src="<?= assets("themes/user/img/selected_video.png") ?>"
                    <?php else: ?>
                        src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-280-180.png") ?>"
                    <?php endif; ?>
                     style="aspect-ratio : 3 / 2;object-fit: cover; margin-top:0.8rem; margin-top:0.8rem;"
                />

            <?php else: ?>

                <video class="img-fluid template-img <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                       data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                       alt="<?= $imageAttr->media_name ?>"
                       style="aspect-ratio : 3 / 2;object-fit: cover; margin-top:0.8rem; margin-top:0.8rem;" controls autoplay muted>
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
            <!--Duplicate element - for image End-->


        </div>
        <!--Duplicate element End-->

        <!-- ///////  Image 01  /////// -->


        <!-- ///////  Image 04  /////// -->

        <?php
        $placeHolder = 4;
        $imageAttr = $connector->getImageAttributes($placeHolder);
        ?>
        <div class="template-img-container mt-2 <?= $view_3rd_row ?> <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'remove-on-sm' : '' ?>">

            <?php if (($imageAttr->type && $imageAttr->type == Media::TYPE_IMAGE) || $mode === Template::MODE_EDIT): ?>

                <img class="img-fluid template-img <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                     data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                     alt="<?= $imageAttr->media_name ?>"
                    <?php if ($imageAttr->src && $imageAttr->type == Media::TYPE_VIDEO): ?>
                        src="<?= assets("themes/user/img/selected_video.png") ?>"
                    <?php else: ?>
                        src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-280-180.png") ?>"
                    <?php endif; ?>
                     style="aspect-ratio : 3 / 2;object-fit: cover; margin-top:0.8rem; margin-top:0.8rem;"
                />

            <?php else: ?>

                <video class="img-fluid template-img <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                       data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                       alt="<?= $imageAttr->media_name ?>"
                       style="aspect-ratio : 3 / 2;object-fit: cover; margin-top:0.8rem; margin-top:0.8rem;" controls autoplay muted>
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
            <!--Duplicate element - for image End-->

        </div>

        <!-- ///////  Image 04  /////// -->


    </div>


    <div class="<?= $imageContainerSize01 ?>">


        <!-- ///////  Image 02  /////// -->

        <?php
        $headingPlaceHolder = "head-02";
        $placeHolder = 2;
        $imageAttr = $connector->getImageAttributes($placeHolder);
        ?>
        <div class="template-img-container  <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'remove-on-sm' : '' ?>">


            <!--Duplicate element - for title Start-->
            <?php
            $imageTitleExists = !empty($imageAttr->title);
            if ($mode === Template::MODE_VIEW): ?>
                <span class="color-blue <?= $imageTitleExists ? '' : 'invisible' ?>"  style="display: block; text-align: center;"><?= empty($imageAttr->title) ? "heading" : $imageAttr->title ?></span>
            <?php else: ?>
                <?php if ($imageTitleExists): ?>
                    <div class=" d-flex align-middle gap-2">
                        <input class="img-heading form-control text-center" type="text"
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

                <img class="img-fluid template-img <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                     data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                     alt="<?= $imageAttr->media_name ?>"
                    <?php if ($imageAttr->src && $imageAttr->type == Media::TYPE_VIDEO): ?>
                        src="<?= assets("themes/user/img/selected_video.png") ?>"
                    <?php else: ?>
                        src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-280-180.png") ?>"
                    <?php endif; ?>
                     style="aspect-ratio : 3 / 2;object-fit: cover; margin-top:0.8rem; margin-top:0.8rem;"
                />

            <?php else: ?>

                <video class="img-fluid template-img <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                       data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                       alt="<?= $imageAttr->media_name ?>"
                       style="aspect-ratio : 3 / 2;object-fit: cover; margin-top:0.8rem; margin-top:0.8rem;" controls autoplay muted>
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
            <!--Duplicate element - for image End-->


        </div>

        <!-- ///////  Image 02  /////// -->

        <!-- ///////  Image 05  /////// -->
        <?php
        $placeHolder = 5;
        $imageAttr = $connector->getImageAttributes($placeHolder);
        ?>
        <div class="template-img-container mt-2 <?= $view_3rd_row ?> <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'remove-on-sm' : '' ?>">

            <?php if (($imageAttr->type && $imageAttr->type == Media::TYPE_IMAGE) || $mode === Template::MODE_EDIT): ?>

                <img class="img-fluid template-img <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                     data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                     alt="<?= $imageAttr->media_name ?>"
                    <?php if ($imageAttr->src && $imageAttr->type == Media::TYPE_VIDEO): ?>
                        src="<?= assets("themes/user/img/selected_video.png") ?>"
                    <?php else: ?>
                        src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-280-180.png") ?>"
                    <?php endif; ?>
                     style="aspect-ratio : 3 / 2;object-fit: cover; margin-top:0.8rem; margin-top:0.8rem;"
                />

            <?php else: ?>

                <video class="img-fluid template-img <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                       data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                       alt="<?= $imageAttr->media_name ?>"
                       style="aspect-ratio : 3 / 2;object-fit: cover; margin-top:0.8rem; margin-top:0.8rem;" controls autoplay muted>
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
            <!--Duplicate element - for image End-->
        </div>

        <!-- ///////  Image 05  /////// -->

    </div>


    <div class="<?= $imageContainerSize01 ?>">

        <!-- ///////  Image 03  /////// -->

        <?php
        $headingPlaceHolder = "head-03";
        $placeHolder = 3;
        $imageAttr = $connector->getImageAttributes($placeHolder);
        ?>
        <div class="template-img-container  <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'remove-on-sm' : '' ?>">

            <!--Duplicate element - for title Start-->
            <?php
            $imageTitleExists = !empty($imageAttr->title);
            if ($mode === Template::MODE_VIEW): ?>
                <span class="color-blue <?= $imageTitleExists ? '' : 'invisible' ?>"  style="display: block; text-align: center;"><?= empty($imageAttr->title) ? "heading" : $imageAttr->title ?></span>
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

                <img class="img-fluid template-img <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                     data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                     alt="<?= $imageAttr->media_name ?>"
                    <?php if ($imageAttr->src && $imageAttr->type == Media::TYPE_VIDEO): ?>
                        src="<?= assets("themes/user/img/selected_video.png") ?>"
                    <?php else: ?>
                        src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-280-180.png") ?>"
                    <?php endif; ?>
                     style="aspect-ratio : 3 / 2;object-fit: cover; margin-top:0.8rem; margin-top:0.8rem;"
                />

            <?php else: ?>

                <video class="img-fluid template-img <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                       data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                       alt="<?= $imageAttr->media_name ?>"
                       style="aspect-ratio : 3 / 2;object-fit: cover; margin-top:0.8rem; margin-top:0.8rem;" controls autoplay muted>
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
            <!--Duplicate element - for image End-->

        </div>

        <!--///////  Image 03  /////// -->


        <!-- ///////  Image 06  /////// -->

        <?php
        $placeHolder = 6;
        $imageAttr = $connector->getImageAttributes($placeHolder);
        ?>
        <div class="template-img-container  mt-2 <?= $view_3rd_row ?> <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'remove-on-sm' : '' ?>">

            <?php if (($imageAttr->type && $imageAttr->type == Media::TYPE_IMAGE) || $mode === Template::MODE_EDIT): ?>

                <img class="img-fluid template-img <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                     data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                     alt="<?= $imageAttr->media_name ?>"
                    <?php if ($imageAttr->src && $imageAttr->type == Media::TYPE_VIDEO): ?>
                        src="<?= assets("themes/user/img/selected_video.png") ?>"
                    <?php else: ?>
                        src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-280-180.png") ?>"
                    <?php endif; ?>
                     style="aspect-ratio : 3 / 2;object-fit: cover; margin-top:0.8rem; margin-top:0.8rem;"
                />

            <?php else: ?>

                <video class="img-fluid template-img <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                       data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                       alt="<?= $imageAttr->media_name ?>"
                       style="aspect-ratio : 3 / 2;object-fit: cover; margin-top:0.8rem; margin-top:0.8rem;" controls autoplay muted>
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
            <!--Duplicate element - for image End-->

        </div>

        <!-- ///////  Image 06  /////// -->


    </div>


</div>