<?php

use helpers\pools\StandardLengthTypePool;
use helpers\services\ConnectorService;
use helpers\translate\Translate;

?>


<dl>
    <dt class="color-blue mb-2"><?= $connector->name ?? 'Connector Name' ?></dt>
    <?php if (!empty($connector->getSubtitleOfLang())): ?>
        <dd class="custom-dd custom-font mb-4">
            <?= $connector->getSubtitleOfLang() ?>
        </dd>
    <?php endif; ?>
    <dd class="custom-dd custom-font"><?= Translate::get("template_context", "steel_grade", $language) ?>
        : <?= empty($connector->grade) ? '---' : $connector->grade ?></dd>


    <?php if (empty(sizeof(array_values($connector->getThicknessArrayOfLang())))): ?>
        <dd class="custom-dd custom-font">
            <?= Translate::get("template_context", "steel_thickness", $language) ?>: ---
        </dd>
    <?php else: ?>
        <?php foreach ($connector->getThicknessArrayOfLang() as $key => $value): ?>
            <dd class="custom-dd custom-font">
                <?= Translate::get("template_context", "steel_thickness", $language) ?> <?= $key === 'general' ? '' : $key ?>
                : <?= $value ?>
            </dd>
        <?php endforeach; ?>
    <?php endif; ?>


    <?php if (empty(sizeof(array_values($connector->getLengthOfLang())))): ?>
        <dd class="custom-dd custom-font">
            <?= Translate::get("template_context", "standard_length", $language) ?>: ---
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
                <?php if ($type == StandardLengthTypePool::FIXED_SINGLE_VALUE): ?>
                    <?= $label ?> :
                    <?= empty($value) ? '---' : $value ?>

                <?php elseif ($type == StandardLengthTypePool::FIXED_MULTIPLE_VALUES): ?>
                    <?= $label ?> :
                    <?= empty($value) ? '---' : $value ?>

                <?php elseif ($type == StandardLengthTypePool::VARIABLE_VALUES): ?>
                    <?= $label ?> &nbsp;
                    <?= empty($value) ? '---' : $value ?>

                <?php endif ?>
            </dd>
        <?php endforeach; ?>
    <?php endif; ?>


    <?php if (empty(sizeof(array_values($connector->getWeightArrayOfLang())))): ?>
        <dd class="custom-dd custom-font"><?= Translate::get("template_context", "weight", $language) ?>: ---</dd>
    <?php else: ?>
        <?php foreach ($connector->getWeightArrayOfLang() as $key => $value): ?>
            <dd class="custom-dd custom-font"><?= Translate::get("template_context", "weight", $language) ?> <?= $key === 'general' ? '' : $key ?>
                : <?= $value ?></dd>
        <?php endforeach; ?>
    <?php endif; ?>


    <?php if (!empty(sizeof(array_values($connector->getMaxTensileStrengthByLang())))): ?>
        <?php foreach ($connector->getMaxTensileStrengthByLang() as $key => $value): ?>
            <dd class="custom-dd custom-font"><?= Translate::get("template_context", "max_tensile_strength", $language) ?> <?= $key === 'general' ? '' : $key ?>
                : <?= $value ?></dd>
        <?php endforeach; ?>
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
        <dd class="custom-dd custom-font">
            <a href="<?= $fileArray['file_asset_path'] ?>"
                           class="link color-black" download="<?= $fileArray['name'] ?>">
                <?= $fileArray['title'] ?>
            </a>
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



