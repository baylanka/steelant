<?php
    use helpers\pools\LanguagePool;
?>

<?php $isTemplateEmpty = empty(array_filter(array_values($templates))); ?>
<div class="modal-dialog modal-sm <?=$isTemplateEmpty? '' : 'modal-fullscreen'?>">
    <div class="modal-content">
        <div class="modal-body p-2">
            <?php if($isTemplateEmpty): ?>
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">There is no view selected !</h4>
                    <p>Please update the connector.</p>
                </div>
            <?php else: ?>
                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="de-tab" data-bs-toggle="tab" data-bs-target="#de" type="button" role="tab" aria-controls="de" aria-selected="true">
                            <img src="<?=assets('/img/flags/de.png')?>" height="25">
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="en-gb-tab" data-bs-toggle="tab" data-bs-target="#en-gb" type="button" role="tab" aria-controls="en-gb" aria-selected="false">
                            <img src="<?=assets('/img/flags/en-gb.png')?>" height="25">
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="fr-tab" data-bs-toggle="tab" data-bs-target="#fr" type="button" role="tab" aria-controls="fr" aria-selected="false">
                            <img src="<?=assets('/img/flags/fr.png')?>" height="25">
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="fr-tab2" data-bs-toggle="tab" data-bs-target="#en-us" type="button" role="tab" aria-controls="en-us" aria-selected="false">
                            <img src="<?=assets('/img/flags/en-us.png')?>" height="25">
                        </button>
                    </li>
                </ul>

                <div class="tab-content p-2" id="myTabContent">
                <div class="tab-pane fade show active" id="de" role="tabpanel" aria-labelledby="de-tab">
                    <?=$templates[LanguagePool::GERMANY()->getLabel()] ?>
                </div>
                <div class="tab-pane fade" id="en-gb" role="tabpanel" aria-labelledby="en-gb-tab">
                    <?=$templates[LanguagePool::UK_ENGLISH()->getLabel()] ?>
                </div>
                <div class="tab-pane fade" id="fr" role="tabpanel" aria-labelledby="fr-tab">
                    <?=$templates[LanguagePool::FRENCH()->getLabel()] ?>
                </div>
                <div class="tab-pane fade" id="en-us" role="tabpanel" aria-labelledby="en-us-tab">
                    <?=$templates[LanguagePool::US_ENGLISH()->getLabel()] ?>
                </div>

            </div>
            <?php endif ?>

        </div>


        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>

    </div>
</div>

