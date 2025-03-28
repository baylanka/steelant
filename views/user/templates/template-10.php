<!-- Ref: Template-10 -->
<?php
use model\Template;
use model\Media;
use helpers\pools\StandardLengthTypePool;
use helpers\services\ConnectorService;
use helpers\translate\Translate;
use helpers\pools\LanguagePool;
?>


<?php
$imageContainerSize01 = "col-12 col-md-4 col-xxl-4 d-flex flex-column margin-bottom-sm";
$imageContainerSize02 = "col-6 col-md-2 col-xxl-2 d-flex flex-column margin-bottom-sm";
?>

<div class="row my-5 justify-content-end" id="<?= $connector->id ?>">

    <div class="col-12 col-md-4 col-xxl-4 margin-bottom-sm">

        <?php
        $spaceApplicable = $language == LanguagePool::FRENCH()->getLabel();
        ?>
        <dl>
            <dt class="color-blue mb-2"><?= $connector->name ?? 'Connector Name' ?></dt>
            <?php if (!empty($connector->getSubtitleOfLang())): ?>
                <dd class="custom-font mb-4">
                    <?= $connector->getSubtitleOfLang() ?>
                </dd>
            <?php endif; ?>
            <dd class="custom-dd custom-font"><?= Translate::get("template_context", "steel_grade", $language) ?><?=$spaceApplicable?" ":''?>: <?= empty($connector->grade) ? '---' : $connector->grade ?></dd>


            <?php if (empty(sizeof(array_values($connector->getThicknessArrayOfLang())))): ?>
                <dd class="custom-dd custom-font">
                    <?= Translate::get("template_context", "steel_thickness", $language) ?><?=$spaceApplicable?" ":''?>: ---
                </dd>
            <?php else: ?>
                <?php foreach ($connector->getThicknessArrayOfLang() as $key => $value): ?>
                    <dd class="custom-dd custom-font">
                        <?= Translate::get("template_context", "steel_thickness", $language) ?><?= $key === 'general' ? '' : " " .$key ?><?=$spaceApplicable?" ":''?>: <?= $value ?>
                    </dd>
                <?php endforeach; ?>
            <?php endif; ?>


            <?php if (empty(sizeof(array_values($connector->getLengthOfLang())))): ?>
                <dd class="custom-dd custom-font">
                    <?= Translate::get("template_context", "standard_length", $language) ?><?=$spaceApplicable?" ":''?>: ---
                </dd>
            <?php else: ?>
                <?php
                $totalLengths = sizeof($connector->getLengthOfLang());
                $i = -1;
                ?>
                <?php foreach ($connector->getLengthOfLang() as $key => $value): ?>
                    <?php
                    $i++;
                    $type = $connector->standardLengthTypes[$i];
                    $customizedLabelExists = !(empty($key) || $key == "general");
                    $label = '';
                    if ($totalLengths > 1) {
                        $label = Translate::get("template_context", "length", $language);
                        if ($customizedLabelExists) {
                            $label .= " {$key}";
                        }
                    } else {
                        if ($type == StandardLengthTypePool::FIXED_SINGLE_VALUE) {
                            $label = Translate::get("template_context", "standard_length", $language);
                        } elseif ($type == StandardLengthTypePool::FIXED_MULTIPLE_VALUES) {
                            $label = Translate::get("template_context", "standard_lengths", $language);
                        } elseif ($type == StandardLengthTypePool::VARIABLE_VALUES) {
                            $label = Translate::get("template_context", "standard_length_variable", $language);
                        }
                    }


                    ?>
                    <dd class="custom-dd custom-font">
                        <?php if ($type == StandardLengthTypePool::FIXED_SINGLE_VALUE): ?><?=$label?><?=$spaceApplicable?" ":''?>: <?= empty($value) ? '---' : $value ?>

                        <?php elseif ($type == StandardLengthTypePool::FIXED_MULTIPLE_VALUES): ?><?=$label?><?=$spaceApplicable?" ":''?>: <?= empty($value) ? '---' : $value ?>

                        <?php elseif ($type == StandardLengthTypePool::VARIABLE_VALUES): ?>
                            <?=$label?>
                            <?= empty($value) ? '---' : $value ?>

                        <?php endif ?>
                    </dd>
                <?php endforeach; ?>
            <?php endif; ?>


            <?php if (empty(sizeof(array_values($connector->getWeightArrayOfLang())))): ?>
                <dd class="custom-dd custom-font"><?= Translate::get("template_context", "weight", $language) ?><?=$spaceApplicable?" ":''?>: ---</dd>
            <?php else: ?>
                <?php foreach ($connector->getWeightArrayOfLang() as $key => $value): ?>
                    <dd class="custom-dd custom-font"><?= Translate::get("template_context", "weight", $language) ?><?= $key === 'general' ? '' : " " . $key ?><?=$spaceApplicable?" ":''?>: <?= $value ?></dd>
                <?php endforeach; ?>
            <?php endif; ?>


            <?php if (!empty(sizeof(array_values($connector->getMaxTensileStrengthByLang())))): ?>
                <?php foreach ($connector->getMaxTensileStrengthByLang() as $key => $value): ?>
                    <?php if(empty($value)) continue; ?>
                    <dd class="custom-dd custom-font"><?= Translate::get("template_context", "max_tensile_strength", $language) ?><?= $key === 'general' ? '' : " " .$key ?><?=$spaceApplicable?" ":''?>: <?= $value ?></dd>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (!empty($connector->getPressureLoadOfLang())): ?>
                <dd class="custom-dd custom-font"><?= Translate::get("template_context", "pressure_load", $language) ?><?=$spaceApplicable?" ":''?>: <?= $connector->getPressureLoadOfLang() ?></dd>
            <?php endif; ?>

            <?php if (!empty($connector->getDeformationPathOfLang())): ?>
                <dd class="custom-dd custom-font"><?= Translate::get("template_context", "deformation_path", $language) ?><?=$spaceApplicable?" ":''?>: <?= $connector->getDeformationPathOfLang() ?></dd>
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


            <?php
            $imageUrl = "";
            $classForFavourite = "";
            $favouriteDirectUrl = "";
            if (isset($_SESSION["auth"])) {
                if (ConnectorService::isFavourite($connector->id)) {
                    $imageUrl = assets("themes/user/img/star.png");
                    $favouriteDirectUrl = url("/favourite");
                } else {
                    $imageUrl = assets("themes/user/img/star-ash.png");
                    $classForFavourite = "add_to_favourite";
                }
            } else {
                $imageUrl = assets("themes/user/img/star-ash.png");
                $favouriteDirectUrl = url("/login");
            }
            ?>


            <dd class="custom-dd custom-font d-flex align-middle gap-3 <?= $classForFavourite ?>"
                data-id="<?= $connector->id ?>">
                <a href="<?= $favouriteDirectUrl ?>"
                   class="link color-black">
                    <?= Translate::get("template_context", "remember_this_connector", $language) ?></a>

                <img class="align-self-center" src="<?= $imageUrl ?>" height="15"/>
            </dd>

            <dd class="custom-dd custom-font mt-4">
                <a class="link color-black"><?= $connector->getFooterOfLang() ?></a>
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


    </div>

    <div class="<?= $imageContainerSize02 ?>">


        <!-- ///////  Image 03  /////// -->
        <?php
        $headingPlaceHolder = "head-3";
        $placeHolder = 3;
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
        <!-- ///////  Image 03  /////// -->


        <!-- ///////  Image 04  /////// -->
        <?php
        $placeHolder = 4;
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
        <!-- ///////  Image 04  /////// -->



    </div>

    <div class="<?= $imageContainerSize02 ?>">


        <!-- ///////  Image 05  /////// -->
        <?php
        $headingPlaceHolder = "head-05";
        $placeHolder = 5;
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
        <!-- ///////  Image 05  /////// -->


        <!-- ///////  Image 06  /////// -->
        <?php
        $placeHolder = 6;
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
        <!-- ///////  Image 06  /////// -->



    </div>

    <div class="<?= $imageContainerSize01 ?>">


        <!-- ///////  Image 7  /////// -->
        <?php
        $placeHolder = 7;
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
                     style="aspect-ratio : 1 / 1;object-fit: cover; margin-top:0.8rem; background-color:white !important;"
                />

            <?php else: ?>

                <video class="img-fluid template-img  <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                       data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                       alt="<?= $imageAttr->media_name ?>"
                       style="aspect-ratio : 1 / 1;object-fit: cover; margin-top:0.8rem; background-color:white !important;" controls autoplay muted>
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
        <!-- ///////  Image 7  /////// -->

    </div>

    <div class="<?= $imageContainerSize01 ?>">


        <!-- ///////  Image 8  /////// -->
        <?php
        $placeHolder = 8;
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
                     style="aspect-ratio : 1 / 1;object-fit: cover; margin-top:0.8rem; background-color:white !important;"
                />

            <?php else: ?>

                <video class="img-fluid template-img  <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                       data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                       alt="<?= $imageAttr->media_name ?>"
                       style="aspect-ratio : 1 / 1;object-fit: cover; margin-top:0.8rem; background-color:white !important;" controls autoplay muted>
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
        <!-- ///////  Image 8  /////// -->

    </div>



</div>