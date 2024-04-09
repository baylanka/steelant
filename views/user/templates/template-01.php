<?php

use model\Template;

?>
<div class="row my-5 w-100">

    <div class="col-12 col-md-4 col-xxl-4">
        <dl>
            <dt class="color-blue mb-2"><?= $connector->name ?? 'Connector Name' ?></dt>

            <dd class="custom-dd custom-font">Steel
                grade: <?= empty($connector->grade) ? '---' : $connector->grade ?></dd>
            <dd class="custom-dd custom-font">Steel
                thickness: <?= empty($connector->getThicknessOfLang()) ? '---' : $connector->getThicknessOfLang() ?></dd>
            <dd class="custom-dd custom-font">Standard
                length: <?= empty($connector->getLengthOfLang()) ? '---' : $connector->getLengthOfLang() ?></dd>
            <dd class="custom-dd custom-font">Max. tensile
                strength: <?= empty($connector->getMaxTensileStrengthByLang()) ? '---' : $connector->getMaxTensileStrengthByLang() ?></dd>

            <?php if (empty(sizeof($connector->getWeightArrayOfLang()))): ?>
                <dd class="custom-dd custom-font">Weight: ---</dd>
            <?php else: ?>
                <?php foreach ($connector->getWeightArrayOfLang() as $key => $value): ?>
                    <dd class="custom-dd custom-font">Weight <?= $key === 'general' ? '' : $key ?>: <?= $value ?></dd>
                <?php endforeach; ?>
            <?php endif; ?>
            <dd class="my-4 custom-font">Description: <?= empty($connector->getDescriptionOfLang())
                    ? '---' : $connector->getDescriptionOfLang() ?></dd>

            <?php foreach ($connector->getDownloadableFiles() as $fileArray): ?>
                <dd class="custom-dd custom-font"><a href="<?= $fileArray['file_asset_path'] ?>"
                                                     class="link color-black" download><?= $fileArray['title'] ?></a>
                </dd>
            <?php endforeach; ?>

            <dd class="custom-dd custom-font request-connector-btn" data-id="<?= $connector->id ?>"
                style="cursor: pointer;"><a class="link color-black">Request this connector</a>
            </dd>
            <dd class="custom-dd custom-font d-flex align-middle gap-3" data-id="<?= $connector->id ?>">
                <a href="#" class="link color-black">Remember this connector</a>
                <img class="align-self-center" src="<?= assets("themes/user/img/star.png") ?>" height="15"/>
            </dd>

        </dl>
    </div>

    <div class="col-12 col-md-1 col-xl-1 col-xxl-1 "></div>

    <div class="col-12 col-md-7 col-xl-7 col-xxl-6 d-flex flex-column margin-top-sm">
        <div class="row justify-content-start">

            <?php

            $imageContainerSize01 = "col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4";

            ?>

            <!--

                You can duplicate the elements between 'Duplicate element Start' and 'Duplicate element End' to create additional image containers.
                For resizing purposes, use variables like 'imageContainerSize01' to specify different container sizes and make them responsive.

                Within this section, you'll find 'Duplicate element - for title' and 'Duplicate element - for image'.
                You can choose to include or remove the title if needed for each image.

                Also, consider adding the following line for each 'Duplicate element':
                $imageAttr = $connector->getImageAttributes(1);
                add the number by order of 'Duplicate element'

            -->

            <!-- ///////  Image 01  /////// -->
            <?php
            $placeHolder = 1;
            $headingPlaceHolder = "head-01";
            $imageAttr = $connector->getImageAttributes($placeHolder);
            ?>
            <!--Duplicate element Start-->
            <div class="template-img-container <?= $imageContainerSize01 ?>">

                <!--Duplicate element - for title Start-->
                <?php
                $imageTitleExists = !empty($imageAttr->title);
                if ($mode === Template::MODE_VIEW): ?>
                    <span class="color-blue <?= $imageTitleExists ? '' : 'invisible' ?>"><?= $imageAttr->title ?></span>
                    <br>
                <?php else: ?>
                    <?php if ($imageTitleExists): ?>
                        <div class=" d-flex align-middle gap-2">
                            <input class="img-heading form-control" type="text" data-heading="<?=$headingPlaceHolder?>"
                                   data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                                   placeholder="Heading"
                                   name="<?= $imageAttr->titleFieldName ?>" value="<?= $imageAttr->title ?>">
                        </div>
                        <br>
                    <?php else: ?>
                        <span class="color-blue template-img-heading" data-heading="<?=$headingPlaceHolder?>">Heading</span><br>
                    <?php endif ?>
                <?php endif; ?>
                <!--Duplicate element - for title End-->


                <!--Duplicate element - for image End-->

                <img class="img-fluid template-img <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                     data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                     alt="<?= $imageAttr->media_name ?>"
                     src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-180-180.png") ?>"/>

                <a class="remove-image-btn btn btn-sm btn-danger
                    <?= (empty($imageAttr->src) || $mode === Template::MODE_VIEW) ? 'd-none' : ' ' ?> position-absolute mx-1"
                   data-toggle="tooltip" title="reset image">
                    <i class="bi bi-arrow-counterclockwise"></i>
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







            <!-- ///////  Image 02  /////// -->

            <?php
            $headingPlaceHolder = "head-02";
            $placeHolder = 2;
            $imageAttr = $connector->getImageAttributes($placeHolder);
            ?>
            <div class="template-img-container <?= $imageContainerSize01 ?>">


                <!--Duplicate element - for title Start-->
                <?php
                $imageTitleExists = !empty($imageAttr->title);
                if ($mode === Template::MODE_VIEW): ?>
                    <span class="color-blue <?= $imageTitleExists ? '' : 'invisible' ?>"><?= $imageAttr->title ?></span>
                    <br>
                <?php else: ?>
                    <?php if ($imageTitleExists): ?>
                        <div class=" d-flex align-middle gap-2">
                            <input class="img-heading form-control" type="text" data-heading="<?=$headingPlaceHolder?>"
                                   data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                                   placeholder="Heading"
                                   name="<?= $imageAttr->titleFieldName ?>" value="<?= $imageAttr->title ?>">
                        </div>
                        <br>
                    <?php else: ?>
                        <span class="color-blue template-img-heading" data-heading="<?=$headingPlaceHolder?>">Heading</span><br>
                    <?php endif ?>
                <?php endif; ?>
                <!--Duplicate element - for title End-->


                <!--Duplicate element - for image End-->
                <img class="img-fluid template-img <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                     data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                     alt="<?= $imageAttr->media_name ?>"
                     src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-180-180.png") ?>"/>

                <a class="remove-image-btn btn btn-sm btn-danger
                    <?= (empty($imageAttr->src) || $mode === Template::MODE_VIEW) ? 'd-none' : ' ' ?> position-absolute mx-1"
                   data-toggle="tooltip" title="reset image">
                    <i class="bi bi-arrow-counterclockwise"></i>
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







            <!-- ///////  Image 03  /////// -->

            <?php
            $headingPlaceHolder = "head-03";
            $placeHolder = 3;
            $imageAttr = $connector->getImageAttributes($placeHolder);
            ?>
            <div class="template-img-container <?= $imageContainerSize01 ?>">

                <!--Duplicate element - for title Start-->
                <?php
                $imageTitleExists = !empty($imageAttr->title);
                if ($mode === Template::MODE_VIEW): ?>
                    <span class="color-blue <?= $imageTitleExists ? '' : 'invisible' ?>"><?= $imageAttr->title ?></span>
                    <br>
                <?php else: ?>
                    <?php if ($imageTitleExists): ?>
                        <div class=" d-flex align-middle gap-2">
                            <input class="img-heading form-control" type="text" data-heading="<?=$headingPlaceHolder?>"
                                   data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                                   placeholder="Heading"
                                   name="<?= $imageAttr->titleFieldName ?>" value="<?= $imageAttr->title ?>">
                        </div>
                        <br>
                    <?php else: ?>
                        <span class="color-blue template-img-heading" data-heading="<?=$headingPlaceHolder?>">Heading</span><br>
                    <?php endif ?>
                <?php endif; ?>
                <!--Duplicate element - for title End-->


                <!--Duplicate element - for image End-->
                <img class="img-fluid template-img <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                     data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                     alt="<?= $imageAttr->media_name ?>"
                     src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-180-180.png") ?>"/>

                <a class="remove-image-btn btn btn-sm btn-danger
                    <?= (empty($imageAttr->src) || $mode === Template::MODE_VIEW) ? 'd-none' : ' ' ?> position-absolute mx-1"
                   data-toggle="tooltip" title="reset image">
                    <i class="bi bi-arrow-counterclockwise"></i>
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

        </div>

        <div class="row mt-2 justify-content-end">





            <!-- ///////  Image 04  /////// -->

            <?php
            $placeHolder = 4;
            $imageAttr = $connector->getImageAttributes($placeHolder);
            ?>
            <div class="template-img-container <?= $imageContainerSize01 ?>">

                <!--Duplicate element - for image End-->
                <img
                        class="img-fluid template-img <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                        data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                        alt="<?= $imageAttr->media_name ?>"
                        src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-180-180.png") ?>"/>

                <a class="remove-image-btn btn btn-sm btn-danger
                    <?= (empty($imageAttr->src) || $mode === Template::MODE_VIEW) ? 'd-none' : ' ' ?> position-absolute mx-1"
                   data-toggle="tooltip" title="reset image">
                    <i class="bi bi-arrow-counterclockwise"></i>
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








            <!-- ///////  Image 05  /////// -->
            <?php
            $placeHolder = 5;
            $imageAttr = $connector->getImageAttributes($placeHolder);
            ?>
            <div class="template-img-container <?= $imageContainerSize01 ?>">

                <!--Duplicate element - for image End-->
                <img class="img-fluid template-img <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                     data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                     alt="<?= $imageAttr->media_name ?>"
                     src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-180-180.png") ?>"/>

                <a class="remove-image-btn btn btn-sm btn-danger
                   <?= (empty($imageAttr->src) || $mode === Template::MODE_VIEW) ? 'd-none' : ' ' ?> position-absolute mx-1"
                   data-toggle="tooltip" title="reset image">
                    <i class="bi bi-arrow-counterclockwise"></i>
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










            <!-- ///////  Image 06  /////// -->

            <?php
            $placeHolder = 6;
            $imageAttr = $connector->getImageAttributes($placeHolder);
            ?>
            <div class="template-img-container <?= $imageContainerSize01 ?>">

                <!--Duplicate element - for image End-->
                <img class="img-fluid template-img <?= ($mode === Template::MODE_VIEW && empty($imageAttr->src)) ? 'invisible' : '' ?>"
                     data-default="<?= is_null($imageAttr->src) ? 'true' : 'false' ?>"
                     alt="<?= $imageAttr->media_name ?>"
                     src="<?= $imageAttr->src ?? assets("themes/user/img/img-size-180-180.png") ?>"/>

                <a class="remove-image-btn btn btn-sm btn-danger
                    <?= (empty($imageAttr->src) || $mode === Template::MODE_VIEW) ? 'd-none' : ' ' ?> position-absolute mx-1"
                   data-toggle="tooltip" title="reset image">
                    <i class="bi bi-arrow-counterclockwise"></i>
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

</div>