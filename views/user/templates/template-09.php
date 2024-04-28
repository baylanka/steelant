<?php
use model\Template;
use model\Media;
use helpers\pools\StandardLengthTypePool;
use helpers\services\ConnectorService;
use helpers\translate\Translate;
?>


<?php
$imageContainerSize01 = "col-12 col-md-4 col-xxl-4 d-flex flex-column margin-bottom-sm";
$imageContainerSize02 = "col-6 col-md-2 col-xxl-2 d-flex flex-column margin-bottom-sm";
$imageContainerSize03 = "col-12 col-md-8 col-xxl-8 d-flex flex-column margin-bottom-sm";
?>

<div class="row my-5 justify-content-end" id="<?= $connector->id ?>">

    <div class="col-12 col-md-4 col-xxl-4 margin-bottom-sm">

        <dl>
            <dt class="color-blue mb-2"><?= $connector->name ?? 'Connector Name' ?></dt>
            <?php if (!empty($connector->getSubtitleOfLang())): ?>
                <dd class="custom-dd custom-font mb-4">
                    <?= $connector->getSubtitleOfLang() ?>
                </dd>
            <?php endif; ?>
            <dd class="custom-dd custom-font"><?= Translate::get("template_context", "steel_grade", $language) ?>
                : <?= empty($connector->grade) ? '---' : $connector->grade ?></dd>
            <dd class="custom-dd custom-font"><?= Translate::get("template_context", "steel_thickness", $language) ?>
                :
            </dd>
            <dd class="custom-dd custom-font">
                <?php if ($connector->standardLengthType == StandardLengthTypePool::FIXED_SINGLE_VALUE): ?>
                    <?= Translate::get("template_context", "standard_length", $language) ?>:
                    <?= empty($connector->getLengthOfLang()) ? '---' : $connector->getLengthOfLang() ?>

                <?php elseif ($connector->standardLengthType == StandardLengthTypePool::FIXED_MULTIPLE_VALUES): ?>
                    <?= Translate::get("template_context", "standard_lengths", $language) ?>:
                    <?= empty($connector->getLengthOfLang()) ? '---' : $connector->getLengthOfLang() ?>

                <?php elseif ($connector->standardLengthType == StandardLengthTypePool::VARIABLE_VALUES): ?>
                    <?= Translate::get("template_context", "standard_length_variable", $language) ?> &nbsp;
                    <?= empty($connector->getLengthOfLang()) ? '---' : $connector->getLengthOfLang() ?>

                <?php endif ?>
            </dd>
            <?php if (empty(sizeof($connector->getWeightArrayOfLang()))): ?>
                <dd class="custom-dd custom-font"><?= Translate::get("template_context", "weight", $language) ?>: ---</dd>
            <?php else: ?>
                <?php foreach ($connector->getWeightArrayOfLang() as $key => $value): ?>
                    <dd class="custom-dd custom-font"><?= Translate::get("template_context", "weight", $language) ?> <?= $key === 'general' ? '' : $key ?>
                        : <?= $value ?></dd>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php if (!empty($connector->getMaxTensileStrengthByLang())): ?>
                <dd class="custom-dd custom-font"><?= Translate::get("template_context", "max_tensile_strength", $language) ?>
                    : <?= $connector->getMaxTensileStrengthByLang() ?></dd>
            <?php endif; ?>

            <?php if (!empty($connector->getPressureLoadOfLang())): ?>
                <dd class="custom-dd custom-font"><?= Translate::get("template_context", "pressure_load", $language) ?>
                    : <?= $connector->getPressureLoadOfLang() ?></dd>
            <?php endif; ?>

            <?php if (!empty($connector->getDeformationPathOfLang())): ?>
                <dd class="custom-dd custom-font"><?= Translate::get("template_context", "deformation_path", $language) ?>
                    : <?= $connector->getDeformationPathOfLang() ?></dd>
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
        </dl>

    </div>


    <div class="<?= $imageContainerSize01 ?>">


        <!-- ///////  Image 01  /////// -->
        <?php
        $placeHolder = 1;
        $headingPlaceHolder = "head-01";
        $imageAttr = $connector->getImageAttributes($placeHolder);
        ?>
        <div class="template-img-container <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'remove-on-sm' : '' ?>">

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



            <?php if (($imageAttr->type && $imageAttr->type == Media::TYPE_IMAGE) || $mode === Template::MODE_EDIT): ?>

                <img class="img-fluid template-img convertable_image3 <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                     data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                     alt="<?= $imageAttr->media_name ?>"
                    <?php if ($imageAttr->src && $imageAttr->type == Media::TYPE_VIDEO): ?>
                        src="<?= assets("themes/user/img/selected_video.png") ?>"
                    <?php else: ?>
                        src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-280-180.png") ?>"
                    <?php endif; ?>
                     style="aspect-ratio : 8 / 4;object-fit: cover; margin-top:0.8rem;"
                />

            <?php else: ?>

                <video class="img-fluid template-img convertable_image3 <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                       data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                       alt="<?= $imageAttr->media_name ?>"
                       style="aspect-ratio : 8 / 4;object-fit: cover; margin-top:0.8rem;" controls autoplay muted>
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
        <!-- ///////  Image 01  /////// -->


        <!-- ///////  Image 02  /////// -->
        <?php
        $placeHolder = 2;
        $imageAttr = $connector->getImageAttributes($placeHolder);
        ?>
        <div class="template-img-container mt-2 <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'remove-on-sm' : '' ?>">

            <?php if (($imageAttr->type && $imageAttr->type == Media::TYPE_IMAGE) || $mode === Template::MODE_EDIT): ?>

                <img class="img-fluid template-img convertable_image3 <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                     data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                     alt="<?= $imageAttr->media_name ?>"
                    <?php if ($imageAttr->src && $imageAttr->type == Media::TYPE_VIDEO): ?>
                        src="<?= assets("themes/user/img/selected_video.png") ?>"
                    <?php else: ?>
                        src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-280-180.png") ?>"
                    <?php endif; ?>
                     style="aspect-ratio : 8 / 4;object-fit: cover; margin-top:0.8rem;"
                />

            <?php else: ?>

                <video class="img-fluid template-img convertable_image3 <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                       data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                       alt="<?= $imageAttr->media_name ?>"
                       style="aspect-ratio : 8 / 4;object-fit: cover; margin-top:0.8rem;" controls autoplay muted>
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
        $headingPlaceHolder = "head-3";
        $imageAttr = $connector->getImageAttributes($placeHolder);
        ?>
        <div class="template-img-container mt-5 remove-on-sm <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'remove-on-sm' : '' ?>">

            <!--Duplicate element - for title Start-->
            <?php
            $imageTitleExists = !empty($imageAttr->title);
            if ($mode === Template::MODE_VIEW): ?>
                <span class="color-blue fw-bold <?= $imageTitleExists ? '' : 'invisible' ?>"><?= $imageAttr->title ?></span>
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

                <img class="img-fluid template-img convertable_image3  <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                     data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                     alt="<?= $imageAttr->media_name ?>"
                    <?php if ($imageAttr->src && $imageAttr->type == Media::TYPE_VIDEO): ?>
                        src="<?= assets("themes/user/img/selected_video.png") ?>"
                    <?php else: ?>
                        src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-280-180.png") ?>"
                    <?php endif; ?>
                     style="aspect-ratio : 8 / 4;object-fit: cover; margin-top:0.8rem;"
                />

            <?php else: ?>

                <video class="img-fluid template-img convertable_image3 <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                       data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                       alt="<?= $imageAttr->media_name ?>"
                       style="aspect-ratio : 8 / 4;object-fit: cover; margin-top:0.8rem;" controls autoplay muted>
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

    </div>

    <div class="<?= $imageContainerSize02 ?>">


        <!-- ///////  Image 04  /////// -->
        <?php
        $headingPlaceHolder = "head-4";
        $placeHolder = 4;
        $imageAttr = $connector->getImageAttributes($placeHolder);
        ?>
        <div class="template-img-container  <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'remove-on-sm' : '' ?>">

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


            <?php if (($imageAttr->type && $imageAttr->type == Media::TYPE_IMAGE) || $mode === Template::MODE_EDIT): ?>

                <img class="img-fluid template-img convert_by_image3 <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                     data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                     alt="<?= $imageAttr->media_name ?>"
                    <?php if ($imageAttr->src && $imageAttr->type == Media::TYPE_VIDEO): ?>
                        src="<?= assets("themes/user/img/selected_video.png") ?>"
                    <?php else: ?>
                        src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-280-180.png") ?>"
                    <?php endif; ?>
                     style="aspect-ratio : 1 / 1;object-fit: cover; margin-top:0.8rem;"
                />

            <?php else: ?>

                <video class="img-fluid template-img convert_by_image3 <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                       data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                       alt="<?= $imageAttr->media_name ?>"
                       style="aspect-ratio : 1 / 1;object-fit: cover; margin-top:0.8rem;" controls autoplay muted>
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


        <!-- ///////  Image 05  /////// -->
        <?php
        $placeHolder = 5;
        $imageAttr = $connector->getImageAttributes($placeHolder);
        ?>
        <div class="template-img-container mt-2  <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'remove-on-sm' : '' ?>">

            <?php if (($imageAttr->type && $imageAttr->type == Media::TYPE_IMAGE) || $mode === Template::MODE_EDIT): ?>

                <img class="img-fluid template-img  <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                     data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                     alt="<?= $imageAttr->media_name ?>"
                    <?php if ($imageAttr->src && $imageAttr->type == Media::TYPE_VIDEO): ?>
                        src="<?= assets("themes/user/img/selected_video.png") ?>"
                    <?php else: ?>
                        src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-280-180.png") ?>"
                    <?php endif; ?>
                     style="aspect-ratio : 1 / 1;object-fit: cover; margin-top:0.8rem;"
                />

            <?php else: ?>

                <video class="img-fluid template-img <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                       data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                       alt="<?= $imageAttr->media_name ?>"
                       style="aspect-ratio : 1 / 1;object-fit: cover; margin-top:0.8rem;" controls autoplay muted>
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
        <!-- ///////  Image 05  /////// -->


        <!-- ///////  Image 06  /////// -->
        <?php
        $headingPlaceHolder = "head-6";
        $placeHolder = 6;
        $imageAttr = $connector->getImageAttributes($placeHolder);
        ?>
        <div class="template-img-container mt-5  <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'remove-on-sm' : '' ?>">

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

                <img class="img-fluid template-img  <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                     data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                     alt="<?= $imageAttr->media_name ?>"
                    <?php if ($imageAttr->src && $imageAttr->type == Media::TYPE_VIDEO): ?>
                        src="<?= assets("themes/user/img/selected_video.png") ?>"
                    <?php else: ?>
                        src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-280-180.png") ?>"
                    <?php endif; ?>
                     style="aspect-ratio : 1 / 1;object-fit: cover; margin-top:0.8rem;"
                />

            <?php else: ?>

                <video class="img-fluid template-img <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                       data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                       alt="<?= $imageAttr->media_name ?>"
                       style="aspect-ratio : 1 / 1;object-fit: cover; margin-top:0.8rem;" controls autoplay muted>
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
        <!-- ///////  Image 06  /////// -->


        <!-- ///////  Image 07  /////// -->
        <?php
        $placeHolder = 7;
        $imageAttr = $connector->getImageAttributes($placeHolder);
        ?>
        <div class="template-img-container mt-2  <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'remove-on-sm' : '' ?>">

            <?php if (($imageAttr->type && $imageAttr->type == Media::TYPE_IMAGE) || $mode === Template::MODE_EDIT): ?>

                <img class="img-fluid template-img  <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                     data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                     alt="<?= $imageAttr->media_name ?>"
                    <?php if ($imageAttr->src && $imageAttr->type == Media::TYPE_VIDEO): ?>
                        src="<?= assets("themes/user/img/selected_video.png") ?>"
                    <?php else: ?>
                        src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-280-180.png") ?>"
                    <?php endif; ?>
                     style="aspect-ratio : 1 / 1;object-fit: cover; margin-top:0.8rem;"
                />

            <?php else: ?>

                <video class="img-fluid template-img <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                       data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                       alt="<?= $imageAttr->media_name ?>"
                       style="aspect-ratio : 1 / 1;object-fit: cover; margin-top:0.8rem;" controls autoplay muted>
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

        <!-- ///////  Image 07  /////// -->


    </div>

    <div class="<?= $imageContainerSize02 ?>">


        <!-- ///////  Image 08  /////// -->
        <?php
        $headingPlaceHolder = "head-08";
        $placeHolder = 8;
        $imageAttr = $connector->getImageAttributes($placeHolder);
        ?>
        <div class="template-img-container  <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'remove-on-sm' : '' ?>">

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


            <?php if (($imageAttr->type && $imageAttr->type == Media::TYPE_IMAGE) || $mode === Template::MODE_EDIT): ?>

                <img class="img-fluid template-img  <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                     data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                     alt="<?= $imageAttr->media_name ?>"
                    <?php if ($imageAttr->src && $imageAttr->type == Media::TYPE_VIDEO): ?>
                        src="<?= assets("themes/user/img/selected_video.png") ?>"
                    <?php else: ?>
                        src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-280-180.png") ?>"
                    <?php endif; ?>
                     style="aspect-ratio : 1 / 1;object-fit: cover; margin-top:0.8rem;"
                />

            <?php else: ?>

                <video class="img-fluid template-img <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                       data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                       alt="<?= $imageAttr->media_name ?>"
                       style="aspect-ratio : 1 / 1;object-fit: cover; margin-top:0.8rem;" controls autoplay muted>
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
        <!-- ///////  Image 08  /////// -->


        <!-- ///////  Image 09  /////// -->
        <?php
        $placeHolder = 9;
        $imageAttr = $connector->getImageAttributes($placeHolder);
        ?>
        <div class="template-img-container mt-2  <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'remove-on-sm' : '' ?>">

            <?php if (($imageAttr->type && $imageAttr->type == Media::TYPE_IMAGE) || $mode === Template::MODE_EDIT): ?>

                <img class="img-fluid template-img <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                     data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                     alt="<?= $imageAttr->media_name ?>"
                    <?php if ($imageAttr->src && $imageAttr->type == Media::TYPE_VIDEO): ?>
                        src="<?= assets("themes/user/img/selected_video.png") ?>"
                    <?php else: ?>
                        src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-280-180.png") ?>"
                    <?php endif; ?>
                     style="aspect-ratio : 1 / 1;object-fit: cover; margin-top:0.8rem;"
                />

            <?php else: ?>

                <video class="img-fluid template-img <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                       data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                       alt="<?= $imageAttr->media_name ?>"
                       style="aspect-ratio : 1 / 1;object-fit: cover; margin-top:0.8rem;" controls autoplay muted>
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
        <!-- ///////  Image 09  /////// -->



        <!-- ///////  Image 10  /////// -->
        <?php
        $headingPlaceHolder = "head-10";
        $placeHolder = 10;
        $imageAttr = $connector->getImageAttributes($placeHolder);
        ?>
        <div class="template-img-container mt-5  <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'remove-on-sm' : '' ?>">
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

                <img class="img-fluid template-img  <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                     data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                     alt="<?= $imageAttr->media_name ?>"
                    <?php if ($imageAttr->src && $imageAttr->type == Media::TYPE_VIDEO): ?>
                        src="<?= assets("themes/user/img/selected_video.png") ?>"
                    <?php else: ?>
                        src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-280-180.png") ?>"
                    <?php endif; ?>
                     style="aspect-ratio : 1 / 1;object-fit: cover; margin-top:0.8rem;"
                />

            <?php else: ?>

                <video class="img-fluid template-img <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                       data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                       alt="<?= $imageAttr->media_name ?>"
                       style="aspect-ratio : 1 / 1;object-fit: cover; margin-top:0.8rem;" controls autoplay muted>
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
        <!-- ///////  Image 10  /////// -->


        <!-- ///////  Image 11  /////// -->
        <?php
        $placeHolder = 11;
        $imageAttr = $connector->getImageAttributes($placeHolder);
        ?>
        <div class="template-img-container mt-2  <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'remove-on-sm' : '' ?>">

            <?php if (($imageAttr->type && $imageAttr->type == Media::TYPE_IMAGE) || $mode === Template::MODE_EDIT): ?>

                <img class="img-fluid template-img  <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                     data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                     alt="<?= $imageAttr->media_name ?>"
                    <?php if ($imageAttr->src && $imageAttr->type == Media::TYPE_VIDEO): ?>
                        src="<?= assets("themes/user/img/selected_video.png") ?>"
                    <?php else: ?>
                        src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-280-180.png") ?>"
                    <?php endif; ?>
                     style="aspect-ratio : 1 / 1;object-fit: cover; margin-top:0.8rem;"
                />

            <?php else: ?>

                <video class="img-fluid template-img <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                       data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                       alt="<?= $imageAttr->media_name ?>"
                       style="aspect-ratio : 1 / 1;object-fit: cover; margin-top:0.8rem;" controls autoplay muted>
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
        <!-- ///////  Image 11  /////// -->

    </div>

    <div class="<?= $imageContainerSize03 ?>">


        <!-- ///////  Image 12  /////// -->
        <?php
        $placeHolder = 12;
        $imageAttr = $connector->getImageAttributes($placeHolder);
        ?>
        <div class="template-img-container mt-2 <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'remove-on-sm' : '' ?>">

            <?php if (($imageAttr->type && $imageAttr->type == Media::TYPE_IMAGE) || $mode === Template::MODE_EDIT): ?>

                <img class="img-fluid template-img  <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                     data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                     alt="<?= $imageAttr->media_name ?>"
                    <?php if ($imageAttr->src && $imageAttr->type == Media::TYPE_VIDEO): ?>
                        src="<?= assets("themes/user/img/selected_video.png") ?>"
                    <?php else: ?>
                        src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-280-180.png") ?>"
                    <?php endif; ?>
                     style="aspect-ratio : 8 / 4;object-fit: cover; margin-top:0.8rem; background-color:white !important;"
                />

            <?php else: ?>

                <video class="img-fluid template-img  <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                       data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                       alt="<?= $imageAttr->media_name ?>"
                       style="aspect-ratio : 8 / 4;object-fit: cover; margin-top:0.8rem; background-color:white !important;" controls autoplay muted>
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
        <!-- ///////  Image 12  /////// -->

    </div>

    <div class="col-12 col-md-8 col-xxl-8 d-flex flex-column margin-bottom-sm">


        <span class="color-blue">Conclusion</span>
        <br/>
        <p><?= $connector->getFooterOfLang() ?></p>
    </div>

</div>