<?php
 use \model\AdOnContent;
?>
<div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="home-tab">
    <div class="row w-100 p-5">


        <div class="col-12 d-flex justify-content-between mt-5">
            <?php if(!empty($fixed_category)): ?>
                <input type="hidden" name="category" value="<?=$fixed_category?>"/>
            <?php endif; ?>

            <select class="form-select w-100 select2"
                <?php if(empty($fixed_category)): ?>
                    name="category"
                <?php else:?>
                    disabled
                <?php endif ?>
            >
                <option value="0" selected disabled>Select Category</option>
                <?php foreach ($leafCategories as $leafCategory): ?>
                    <option
                            value="<?= $leafCategory->id ?>"
                        <?=
                                $ad_on_content->categoryId == $leafCategory->id
                            ? 'selected' : ''
                        ?>
                    >
                        <?= $leafCategory->treePathStr ?>
                    </option>
                <?php endforeach; ?>
            </select>

        </div>

        <div class="col-12 d-flex justify-content-between mt-3">
            <label for="basic-url" class="form-label align-middle">Visibility</label>

            <div class="d-flex w-50 justify-content-start gap-5">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="visibility" value="<?= AdOnContent::PUBLISHED ?>"
                           id="published-radio-btn"
                            <?= $ad_on_content->isPublished ? 'checked':'' ?>
                    >
                    <label class="form-check-label" for="published-radio-btn">
                        Public
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="visibility" value="<?= AdOnContent::UNPUBLISHED ?>"
                           id="unpublished-radio-btn"
                            <?= $ad_on_content->isPublished ? '':'checked' ?>
                    >
                    <label class="form-check-label" for="unpublished-radio-btn">
                        Private
                    </label>
                </div>
            </div>

        </div>

        <div class="col-12 d-flex justify-content-between mt-5">
            <label for="title" class="align-items-center">
                Title (in Germany)
            </label>
            <input name="title_de" type="text" value="<?=$ad_on_content->title_de?>"
                   class="form-control w-50 align-items-center"
                   placeholder="Title (in Germany)"/>
        </div>
        <div class="col-12 d-flex justify-content-between mt-3">
            <label for="title" class="align-items-center">
                Title (in French)
            </label>
            <input name="title_fr" type="text" value="<?=$ad_on_content->title_fr?>"
                   class="form-control w-50 align-items-center"
                   placeholder="Title (in French)"/>
        </div>
        <div class="col-12 d-flex justify-content-between mt-3">
            <label for="title" class="align-items-center">
                Title (in English UK)
            </label>
            <input name="title_en_gb" type="text" value="<?=$ad_on_content->title_en_gb?>"
                   class="form-control w-50 align-items-center"
                   placeholder="Title (in English UK)"/>
        </div>
        <div class="col-12 d-flex justify-content-between mt-3 mb-5">
            <label for="title" class="align-items-center">
                Title (in English US)
            </label>
            <input name="title_en_us" type="text" value="<?=$ad_on_content->title_en_us?>"
                   class="form-control w-50 align-items-center"
                   placeholder="Title (in English US)"/>
        </div>


        <div class="col-12 d-flex justify-content-between mt-5 mb-5 description-container">
            <label for="title" class="align-items-center">
                Description (in Germany)
            </label>
        </div>
        <textarea name="description_de" class="form-control description">
                    <?=htmlentities($ad_on_content->description_de)?>
                </textarea>


        <div class="col-12 d-flex justify-content-between mt-5 mb-5 description-container">
            <label for="title" class="align-items-center">
                Description (in French)
            </label>
        </div>
        <textarea name="description_fr" class="form-control description">
                    <?=htmlentities($ad_on_content->description_fr)?>
                </textarea>


        <div class="col-12 d-flex justify-content-between mt-5 mb-5 description-container">
            <label for="title" class="align-items-center">
                Description (in English UK)
            </label>
        </div>
        <textarea name="description_en_gb" class="form-control description">
                    <?=htmlentities($ad_on_content->description_en_gb)?>
                </textarea>

        <div class="col-12 d-flex justify-content-between mt-5 mb-5 description-container">
            <label for="title" class="align-items-center">
                Description (in English US)
            </label>

        </div>
        <textarea name="description_en_us" class="form-control description">
                    <?=htmlentities($ad_on_content->description_en_us)?>
                </textarea>

    </div>

    <div class="d-flex justify-content-end gap-2 px-5">
        <a class="btn btn-secondary next"><i class="bi bi-arrow-right"></i></a>
    </div>


</div>

