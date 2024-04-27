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
    <dd class="custom-dd custom-font"><?= Translate::get("template_context", "steel_thickness", $language) ?>
        : <?= empty($connector->getThicknessOfLang()) ? '---' : $connector->getThicknessOfLang() ?>
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

    <dd class="custom-dd custom-font mt-4">
        <a class="link color-black"><?= $connector->getFooterOfLang() ?></a>
    </dd>
</dl>



