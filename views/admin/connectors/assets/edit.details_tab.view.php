<?php
    use model\Connector;
?>
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="row w-100 p-5">
        <div class="col-12 mt-3">
            <select class="form-select w-100 select2"
                    <?php if($fixed_category == 0): ?>
                        name="category"
                    <?php else: ?>
                        disabled
                    <?php endif; ?>
            >
                <option value="0" selected disabled>Select Category</option>
                <?php foreach ($leafCategories as $leafCategory): ?>
                    <option value="<?= $leafCategory->id ?>"
                        <?=$leafCategory->id === $connector->categoryId ? 'selected':''?>>
                        <?= $leafCategory->treePathStr ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-12 d-flex justify-content-between mt-5">
            <label for="name" class="align-items-center">
                Name
            </label>
            <input name="name" type="text"
                   class="form-control w-50 align-items-center" value="<?= $connector->name ?? ''?>"
                   placeholder="Connector name" id="name"/>
        </div>

        <div class="col-12 d-flex justify-content-between mt-3">
            <label for="basic-url" class="form-label align-middle">Visibility</label>

            <div class="d-flex w-50 justify-content-start gap-5">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="visibility" value="<?= Connector::PUBLISHED ?>"
                           id="published-radio-btn" <?= $connector->isPublished ? 'checked' : ''?>>
                    <label class="form-check-label" for="published-radio-btn">
                        Public
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="visibility" value="<?= Connector::UNPUBLISHED ?>"
                           id="unpublished-radio-btn"  <?= !$connector->isPublished ? 'checked' : ''?>>
                    <label class="form-check-label" for="unpublished-radio-btn">
                        Private
                    </label>
                </div>
            </div>

        </div>

        <div class="col-12 d-flex justify-content-between mt-3">
            <label for="steel_grade" class="align-items-center">
                Steel Grade
            </label>
            <input name="grade" type="text" value="<?=$connector->grade?>"
                   class="form-control w-50 align-items-center"
                   placeholder="Steel Grade" id="steel_grade"/>
        </div>

        <div class="col-12 d-flex justify-content-between mt-3">
            <label for="description" class="align-items-center">
                Description (in Germany)
            </label>
            <textarea name="description_de" type="text"
                      class="form-control w-50 description" rows="3"
                      placeholder="Description (in Germany)"><?=$connector->description_de?></textarea>
        </div>

        <div class="col-12 d-flex justify-content-between mt-3">
            <label for="description" class="align-items-center">
                Description (in English UK)
            </label>
            <textarea name="description_en_gb" type="text"
                      class="form-control w-50" rows="3"
                      placeholder="Description (in English UK)"><?=$connector->description_en_db?></textarea>
        </div>

        <div class="col-12 d-flex justify-content-between mt-3">
            <label for="description" class="align-items-center">
                Description (in French)
            </label>
            <textarea name="description_fr" type="text"
                      class="form-control w-50" rows="3"
                      placeholder="Description (in French)"><?=$connector->description_fr?></textarea>
        </div>

        <div class="col-12 d-flex justify-content-between mt-3">
            <label for="description" class="align-items-center">
                Description (in English US)
            </label>
            <textarea name="description_en_us" type="text"
                      class="form-control w-50" rows="3"
                      placeholder="Description (in English US)"><?=$connector->description_en_us?></textarea>
        </div>

        <hr class="mt-3">

        <div class="col-12 d-flex justify-content-between mt-3">

            <label class="align-items-center">
                Steel Thickness
            </label>

            <div class="w-50 gap-1">

                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="thickness_metrics"
                           placeholder="5mm (+0.1/-0.5 mm)" value="<?=$connector->thickness_m?>">
                    <span class="input-group-text">
                                                    metrics
                                                </span>
                </div>

                <div class="input-group mb-3">
                    <input type="text" class="form-control"  name="thickness_imperial"
                           placeholder=" 5 inch (+0/-5 inch)" value="<?=$connector->thickness_i?>">
                    <span class="input-group-text">
                                                    imperial
                                                </span>
                </div>

            </div>

        </div>

        <hr class="mt-3">

        <div class="col-12 d-flex justify-content-between mt-3">

            <label class="align-items-center">
                Weight
            </label>

            <div class="w-50 gap-1 weight-jumbo-container">
                <?php
                $weightIArray = $connector->weights_i;
                $weightMArray = $connector->weights_m;
                ?>
                <?php if(sizeof($weightIArray) <= 1): ?>
                    <div class="p-3 mt-3 weight-container">

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="49 kg/m"
                                   name="weight_metrics[]" value="<?=array_values($weightMArray)[0] ?? ''?>">
                            <span class="input-group-text">metrics</span>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="15 lbs/ft"
                                   name="weight_imperial[]" value="<?=array_values($weightIArray)[0]?? ''?>">
                            <span class="input-group-text">imperial</span>
                        </div>


                        <div class="input-group justify-content-end mb-3">
                            <button type="button" class="btn btn-light show-label-btn">
                                <i class="bi bi-arrow-bar-left"></i>
                            </button>

                            <input type="text" class="form-control ml-1  label"  placeholder="label" name="weight_label[]">
                            <span class="input-group-text">label</span>
                        </div>


                        <div class="input-group justify-content-end">

                            <button type="button" class="btn btn-primary add-new-weight-btn"><i
                                    class="bi bi-plus-lg"></i></button>
                        </div>

                    </div>
                <?php else: ?>
                    <?php $i=-1; ?>
                    <?php foreach ($weightMArray as $key => $value): ?>
                        <?php $i++ ?>
                        <div class="p-3 mt-3 weight-container">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="weight_metrics[]"
                                       placeholder="ie: 49 kg/m"
                                       value="<?=$value?>"
                                >
                                <span class="input-group-text">metrics</span>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="weight_imperial[]"
                                       placeholder="ie: 15lbs/ft"
                                       value="<?=$weightIArray[$key]?>"
                                >
                                <span class="input-group-text">imperial</span>
                            </div>

                            <div class="input-group justify-content-end mb-3">
                                <input type="text" class="form-control ml-1" placeholder="label"
                                       value="<?=$key === 'general' ? '' : $key?>"
                                       name="weight_label[]"
                                >
                                <span class="input-group-text">label</span>
                            </div>

                            <div class="input-group justify-content-end">
                                <button type="button"
                                        class="btn btn-danger remove-weight-btn"><i
                                        class="bi bi-dash-lg"></i></button>
                                <button type="button"
                                        class="btn btn-primary add-new-weight-btn"><i
                                        class="bi bi-plus-lg"></i></button>
                            </div>

                        </div>
                    <?php endforeach ?>
                <?php endif; ?>
            </div>
        </div>

        <hr class="mt-3">

        <div class="col-12 d-flex justify-content-between mt-3">
            <label class="align-items-center">Standard length</label>
            <div class="w-50 gap-1">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="standard_length_metrics" placeholder="12 m"
                           value="<?=$connector->standardLength_m ?>"
                    >
                    <span class="input-group-text">metrics</span>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="standard_length_imperial" placeholder="1.2 ft"
                           value="<?=$connector->standardLength_i?>"
                    >
                    <span class="input-group-text">imperial</span>
                </div>

            </div>
        </div>

        <hr class="mt-3">


        <div class="col-12 d-flex justify-content-between mt-3">
            <label class="align-items-center">Max. tensile strength</label>
            <div class="w-50 gap-1">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="max_tensile_strength_m"
                           value="<?=$connector->maxTensile_m?>"
                           placeholder="ie: 2.552 kN/m or 2.552 kN/m (FEM)">
                    <span class="input-group-text">metrics</span>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="max_tensile_strength_i"
                           value="<?=$connector->maxTensile_i?>"
                           placeholder="ie: 19.52 kips/in or 19.52 kips/in (FEM)">
                    <span class="input-group-text">imperial</span>
                </div>

            </div>
        </div>

    </div>

    <div class="d-flex justify-content-end gap-2 px-5">
        <a class="btn btn-secondary next"><i class="bi bi-arrow-right"></i></a>
    </div>

</div>
<script>
    $(document).off("click", ".add-new-weight-btn");
    $(document).on("click", ".add-new-weight-btn", function () {
        $(this).closest("div.weight-jumbo-container").append(`

               <div class="p-3 mt-3 weight-container">

                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="weight_metrics[]"
                                                                                     placeholder="ie: 49 kg/m"
                                            >
                                            <span class="input-group-text">metrics</span>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="weight_imperial[]"
                                                                                    placeholder="ie: 15 lbs/ft"
                                            >
                                            <span class="input-group-text">imperial</span>
                                        </div>


                                        <div class="input-group justify-content-end mb-3">

                                           <input type="text" class="form-control ml-1" placeholder="label"
                                                                                        name="weight_label[]"
                                           >
                                            <span class="input-group-text">label</span>
                                        </div>


                                        <div class="input-group justify-content-end">
                                            <button type="button" class="btn btn-danger remove-weight-btn"><i
                                                        class="bi bi-dash-lg"></i></button>
                                            <button type="button" class="btn btn-primary add-new-weight-btn"><i
                                                        class="bi bi-plus-lg"></i></button>
                                        </div>

                                    </div>


            `);
    });


    $(document).off("click", ".remove-weight-btn");
    $(document).on("click", ".remove-weight-btn", function () {
        $(this).closest("div.weight-container").remove();
    });

    // weight label toggling
    $(document).off("click", ".show-label-btn");
    $(document).on("click", ".show-label-btn", function () {
        let input = $(this).closest("div.weight-container").find("input.label");
        if (input.hasClass("showed")) {
            input.hide();
            input.removeClass("showed");
            $(this).html(`<i class="bi bi-arrow-bar-left"></i>`);
        } else {
            input.show();
            input.addClass("showed");
            $(this).html(`<i class="bi bi-arrow-bar-right"></i>`);
        }

    });
</script>