<?php
    use model\Connector;
    use helpers\pools\StandardLengthTypePool;
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
            <label for="name" class="align-items-center required-field">
                Name
            </label>
            <input name="name" type="text"
                   class="form-control w-50 align-items-center" value="<?= $connector->name ?? ''?>"
                   placeholder="Connector name" id="name"/>
        </div>

        <div class="col-12 d-flex justify-content-between mt-3">
            <label for="basic-url" class="form-label align-middle required-field">Visibility</label>

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
            <label for="steel_grade" class="align-items-center required-field">
                Steel Grade
            </label>
            <input name="grade" type="text" value="<?=$connector->grade?>"
                   class="form-control w-50 align-items-center"
                   placeholder="Steel Grade" id="steel_grade"/>
        </div>

        <hr class="mt-3">

        <div class="col-12 d-flex justify-content-between mt-3">
            <label for="subtitle_de" class="align-items-center">
                Subtitle (in Germany)
            </label>
            <input name="subtitle_de" type="text" value="<?=$connector->subtitle_de?>"
                   class="form-control w-50 align-items-center"
                   placeholder="i.e: Für Larssen-Spundbohlen (U-, Z-, Hut-Typ)" id="subtitle_de"/>
        </div>

        <div class="col-12 d-flex justify-content-between mt-3">
            <label for="subtitle_en_gb" class="align-items-center">
                Subtitle (in English UK)
            </label>
            <input name="subtitle_en_gb" type="text" value="<?=$connector->subtitle_en_gb?>"
                   class="form-control w-50 align-items-center"
                   placeholder="i.e: For Larssen sheet piles (U, Z, Hat-type)" id="subtitle_en_gb"/>
        </div>

        <div class="col-12 d-flex justify-content-between mt-3">
            <label for="subtitle_fr" class="align-items-center">
                Subtitle (in French)
            </label>
            <input name="subtitle_fr" type="text" value="<?=$connector->subtitle_fr?>"
                   class="form-control w-50 align-items-center"
                   placeholder="i.e: Pour palplanches Larssen (type U, Z, chapeau)" id="subtitle_fr"/>
        </div>

        <div class="col-12 d-flex justify-content-between mt-3">
            <label for="subtitle_en_us" class="align-items-center">
                Subtitle (in English US)
            </label>
            <input name="subtitle_en_us" type="text" value="<?=$connector->subtitle_en_us?>"
                   class="form-control w-50 align-items-center"
                   placeholder="i.e: For Larssen sheet piles (U, Z, Hat-type)" id="subtitle_en_us"/>
        </div>

        <hr class="mt-3">

        <div class="col-12 d-flex justify-content-between mt-3">

            <label class="align-items-center  required-field">
                Steel Thickness
            </label>

            <div class="w-50 gap-1 thickness-jumbo-container">
                <?php
                    $thicknessIArray = $connector->thickness_i;
                    $thicknessMArray = $connector->thickness_m;
                ?>
                <?php if(sizeof($thicknessMArray) <= 1): ?>
                    <div class="p-3 mt-3 container">

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="5 mm"
                                   name="thickness_metrics[]"
                                   value='<?=array_values($thicknessMArray)[0] ?? ''?>'>
                            <span class="input-group-text">metrics</span>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="5 inch"
                                   name="thickness_imperial[]"
                                   value='<?=array_values($thicknessIArray)[0]?? ''?>'>
                            <span class="input-group-text">imperial</span>
                        </div>


                        <div class="input-group justify-content-end mb-3">
                            <button type="button" class="btn btn-light show-label-btn">
                                <i class="bi bi-arrow-bar-left"></i>
                            </button>

                            <input type="text" class="form-control ml-1  label"
                                   placeholder="label" name="thickness_label[]">
                            <span class="input-group-text">label</span>
                        </div>


                        <div class="input-group justify-content-end">

                            <button type="button" class="btn btn-primary add-new-thickness-btn"><i
                                        class="bi bi-plus-lg"></i></button>
                        </div>

                    </div>
                <?php else: ?>
                    <?php $i=-1; ?>
                    <?php foreach ($thicknessMArray as $key => $value): ?>
                        <?php $i++ ?>
                        <div class="p-3 mt-3 container">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="thickness_metrics[]"
                                       placeholder="ie: 49 kg/m"
                                       value='<?=$value?>'
                                >
                                <span class="input-group-text">metrics</span>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="thickness_imperial[]"
                                       placeholder="ie: 15lbs/ft"
                                       value='<?=$thicknessIArray[$key]?>'
                                >
                                <span class="input-group-text">imperial</span>
                            </div>

                            <div class="input-group justify-content-end mb-3">
                                <input type="text" class="form-control ml-1" placeholder="label"
                                       value="<?=$key === 'general' ? '' : $key?>"
                                       name="thickness_label[]"
                                >
                                <span class="input-group-text">label</span>
                            </div>

                            <div class="input-group justify-content-end">
                                <button type="button"
                                        class="btn btn-danger remove-thickness-btn"><i
                                            class="bi bi-dash-lg"></i></button>
                                <button type="button"
                                        class="btn btn-primary add-new-thickness-btn"><i
                                            class="bi bi-plus-lg"></i></button>
                            </div>

                        </div>
                    <?php endforeach ?>
                <?php endif; ?>
            </div>
        </div>

        <hr class="mt-3">

        <div class="col-12 d-flex justify-content-between mt-3">

            <label class="align-items-center required-field">
                Standard length
            </label>

            <div class="w-50 gap-1 length-jumbo-container">
                <?php
                    $lengthIArray = $connector->standardLength_i;
                    $lengthMArray = $connector->standardLength_m;
                    $lengthTypeArray = $connector->standardLengthTypes;
                ?>
                <?php if(sizeof($lengthMArray) <= 1): ?>
                    <div class="p-3 mt-3 container">

                        <div class="w-100 justify-content-start mb-3">
                            <?php
                                $prevSelectedType = array_values($lengthTypeArray)[0] ?? -100;
                            ?>
                            <select class="form-select w-100"  name="standard_length_type[]">
                                <option
                                        value="<?=StandardLengthTypePool::FIXED_SINGLE_VALUE?>"
                                    <?=$prevSelectedType == StandardLengthTypePool::FIXED_SINGLE_VALUE ? 'selected':'' ?>
                                >
                                    Fixed single value. i.e: 12m or 12m (-0.1mm/+0.2mm)
                                </option>
                                <option
                                        value="<?=StandardLengthTypePool::FIXED_MULTIPLE_VALUES?>"
                                    <?=$prevSelectedType == StandardLengthTypePool::FIXED_MULTIPLE_VALUES ? 'selected':'' ?>
                                >
                                    Fixed multi value. i.e: 12m, 14m, 16m
                                </option>
                                <option
                                        value="<?=StandardLengthTypePool::VARIABLE_VALUES?>"
                                    <?=$prevSelectedType == StandardLengthTypePool::VARIABLE_VALUES ? 'selected':'' ?>
                                >
                                    Variable lengths. i.e: 7.6 m - 10.6 m
                                </option>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="standard_length_metrics[]"
                                   placeholder="12 m"
                                   value='<?=array_values($lengthMArray)[0] ?? ''?>'
                            >
                            <span class="input-group-text">metrics</span>
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="standard_length_imperial[]"
                                   placeholder="1.2 ft"
                                   value='<?=array_values($lengthIArray)[0] ?? ''?>'
                            >
                            <span class="input-group-text">imperial</span>
                        </div>


                        <div class="input-group justify-content-end mb-3">
                            <button type="button" class="btn btn-light show-label-btn">
                                <i class="bi bi-arrow-bar-left"></i>
                            </button>

                            <?php
                                $key = array_keys($lengthIArray)[0] ?? '';
                            ?>
                            <input type="text" class="form-control ml-1  label"
                                   placeholder="label" name="standard_length_label[]"
                                   value="<?=$key === 'general' ? '' : $key?>"
                            >
                            <span class="input-group-text">label</span>
                        </div>


                        <div class="input-group justify-content-end">
                            <button type="button" class="btn btn-primary add-new-standard-length-btn">
                                <i class="bi bi-plus-lg"></i>
                            </button>
                        </div>

                    </div>
                <?php else: ?>
                    <?php $i = -1; ?>
                    <?php foreach ($lengthMArray as $key => $value): ?>
                        <?php $i++; ?>
                        <div class="p-3 mt-3 container">
                            <div class="w-100 justify-content-start mb-3">
                                <?php
                                $prevSelectedType = $lengthTypeArray[$i] ?? null;
                                ?>
                                <select class="form-select w-100"  name="standard_length_type[]">
                                    <option
                                            value="<?=StandardLengthTypePool::FIXED_SINGLE_VALUE?>"
                                        <?=$prevSelectedType == StandardLengthTypePool::FIXED_SINGLE_VALUE ? 'selected':'' ?>
                                    >
                                        Fixed single value. i.e: 12m or 12m (-0.1mm/+0.2mm)
                                    </option>
                                    <option
                                            value="<?=StandardLengthTypePool::FIXED_MULTIPLE_VALUES?>"
                                        <?=$prevSelectedType == StandardLengthTypePool::FIXED_MULTIPLE_VALUES ? 'selected':'' ?>
                                    >
                                        Fixed multi value. i.e: 12m, 14m, 16m
                                    </option>
                                    <option
                                            value="<?=StandardLengthTypePool::VARIABLE_VALUES?>"
                                        <?=$prevSelectedType == StandardLengthTypePool::VARIABLE_VALUES ? 'selected':'' ?>
                                    >
                                        Variable lengths. i.e: 7.6 m - 10.6 m
                                    </option>
                                </select>
                            </div>


                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="standard_length_metrics[]"
                                       placeholder="ie: 12m"
                                       value='<?=$value?>'
                                >
                                <span class="input-group-text">metrics</span>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="standard_length_imperial[]"
                                       placeholder="ie: 1.2ft"
                                       value='<?=$lengthIArray[$key]?>'
                                >
                                <span class="input-group-text">imperial</span>
                            </div>

                            <div class="input-group justify-content-end mb-3">
                                <input type="text" class="form-control ml-1" placeholder="label"
                                       value="<?=$key === 'general' ? '' : $key?>"
                                       name="standard_length_label[]"
                                >
                                <span class="input-group-text">label</span>
                            </div>

                            <div class="input-group justify-content-end">
                                <button type="button"
                                        class="btn btn-danger remove-standard-length-btn"><i
                                            class="bi bi-dash-lg"></i></button>
                                <button type="button"
                                        class="btn btn-primary add-new-standard-length-btn"><i
                                            class="bi bi-plus-lg"></i></button>
                            </div>

                        </div>
                    <?php endforeach ?>
                <?php endif; ?>
            </div>
        </div>

        <hr class="mt-3">

        <div class="col-12 d-flex justify-content-between mt-3">

            <label class="align-items-center required-field">
                Weight
            </label>

            <div class="w-50 gap-1 weight-jumbo-container">
                <?php
                $weightIArray = $connector->weights_i;
                $weightMArray = $connector->weights_m;
                ?>
                <?php if(sizeof($weightIArray) <= 1): ?>
                    <div class="p-3 mt-3 container">

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="49 kg/m"
                                   name="weight_metrics[]"
                                   value='<?=array_values($weightMArray)[0] ?? ''?>'>
                            <span class="input-group-text">metrics</span>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="15 lbs/ft"
                                   name="weight_imperial[]"
                                   value='<?=array_values($weightIArray)[0]?? ''?>'>
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
                        <div class="p-3 mt-3 container">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="weight_metrics[]"
                                       placeholder="ie: 49 kg/m"
                                       value='<?=$value?>'
                                >
                                <span class="input-group-text">metrics</span>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="weight_imperial[]"
                                       placeholder="ie: 15lbs/ft"
                                       value='<?=$weightIArray[$key]?>'
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

            <label class="align-items-center">
                Max. tensile strength
            </label>

            <div class="w-50 gap-1 max-tensile-jumbo-container">
                <?php
                $maxTensileIArray = $connector->maxTensile_i;
                $maxTensileMArray = $connector->maxTensile_m;
                ?>
                <?php if(sizeof($maxTensileIArray) <= 1): ?>
                    <div class="p-3 mt-3 container">

                        <div class="input-group mb-3">
                            <input type="text" class="form-control"  placeholder="ie: 2.552 kN/m or 2.552 kN/m (FEM)"
                                   name="max_tensile_strength_m[]"
                                   value='<?=array_values($maxTensileMArray)[0] ?? ''?>'>
                            <span class="input-group-text">metrics</span>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="ie: 19.52 kips/in or 19.52 kips/in (FEM)"
                                   name="max_tensile_strength_i[]"
                                   value='<?=array_values($maxTensileIArray)[0]?? ''?>'>
                            <span class="input-group-text">imperial</span>
                        </div>


                        <div class="input-group justify-content-end mb-3">
                            <button type="button" class="btn btn-light show-label-btn">
                                <i class="bi bi-arrow-bar-left"></i>
                            </button>

                            <input type="text" class="form-control ml-1  label"  placeholder="max.tensile strength label"
                                   name="max_tensile_strength_label[]">
                            <span class="input-group-text">label</span>
                        </div>


                        <div class="input-group justify-content-end">

                            <button type="button" class="btn btn-primary add-new-max-tensile-strength-btn"><i
                                        class="bi bi-plus-lg"></i></button>
                        </div>

                    </div>
                <?php else: ?>
                    <?php $i=-1; ?>
                    <?php foreach ($maxTensileMArray as $key => $value): ?>
                        <?php $i++ ?>
                        <div class="p-3 mt-3 container">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="max_tensile_strength_m[]"
                                       placeholder="ie: 2.552 kN/m or 2.552 kN/m (FEM)"
                                       value='<?=$value?>'
                                >
                                <span class="input-group-text">metrics</span>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="max_tensile_strength_i[]"
                                       placeholder="ie: 19.52 kips/in or 19.52 kips/in (FEM)"
                                       value='<?=$maxTensileIArray[$key]?>'
                                >
                                <span class="input-group-text">imperial</span>
                            </div>

                            <div class="input-group justify-content-end mb-3">
                                <input type="text" class="form-control ml-1" placeholder="label"
                                       value="<?=$key === 'general' ? '' : $key?>"
                                       name="max_tensile_strength_label[]"
                                >
                                <span class="input-group-text">label</span>
                            </div>

                            <div class="input-group justify-content-end">
                                <button type="button"
                                        class="btn btn-danger remove-max-tensile-strength-btn"><i
                                            class="bi bi-dash-lg"></i></button>
                                <button type="button"
                                        class="btn btn-primary add-new-max-tensile-strength-btn"><i
                                            class="bi bi-plus-lg"></i></button>
                            </div>

                        </div>
                    <?php endforeach ?>
                <?php endif; ?>
            </div>
        </div>

        <hr class="mt-3">

        <div class="col-12 d-flex justify-content-between mt-3">
            <label class="align-items-center">Pressure load</label>
            <div class="w-50 gap-1">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="pressure_load_m"
                           value='<?=$connector->pressure_load_m?>'
                           placeholder="ie: 800 kN/m">
                    <span class="input-group-text">metrics</span>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="pressure_load_i"
                           value='<?=$connector->pressure_load_i?>'
                           placeholder="ie: 4.57 kips/in">
                    <span class="input-group-text">imperial</span>
                </div>

            </div>
        </div>

        <hr class="mt-3">

        <div class="col-12 d-flex justify-content-between mt-3">
            <label class="align-items-center">Deformation path</label>
            <div class="w-50 gap-1">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="deformation_path_m"
                           value='<?=$connector->deformation_path_m?>'
                           placeholder="ie: -50 mm/+50mm">
                    <span class="input-group-text">metrics</span>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="deformation_path_i"
                           value='<?= $connector->deformation_path_i?>'
                           placeholder='ie: -2"/+2"'>
                    <span class="input-group-text">imperial</span>
                </div>

            </div>
        </div>

        <hr class="mt-3">

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
            <label for="footer_de" class="align-items-center">
                Footer (in Germany)
            </label>
            <input name="footer_de" type="text" value="<?=$connector->footer_de?>"
                   class="form-control w-50 align-items-center"
                   placeholder="i.e: Auch für Larssen-Spundbohlen (U, Z) geeignet*" id="subtitle_de"/>
        </div>

        <div class="col-12 d-flex justify-content-between mt-3">
            <label for="footer_en_gb" class="align-items-center">
                Footer (in English UK)
            </label>
            <input name="footer_en_gb" type="text" value="<?=$connector->footer_en_gb?>"
                   class="form-control w-50 align-items-center"
                   placeholder="i.e: Also suitable for Larssen sheet piles (U, Z)*" id="footer_en_gb"/>
        </div>

        <div class="col-12 d-flex justify-content-between mt-3">
            <label for="footer_fr" class="align-items-center">
                Footer (in French)
            </label>
            <input name="footer_fr" type="text" value="<?=$connector->footer_fr?>"
                   class="form-control w-50 align-items-center"
                   placeholder="i.e: Convient également aux palplanches Larssen (U, Z)*" id="footer_fr"/>
        </div>

        <div class="col-12 d-flex justify-content-between mt-3">
            <label for="footer_en_us" class="align-items-center">
                Footer (in English US)
            </label>
            <input name="footer_en_us" type="text" value="<?=$connector->footer_en_us?>"
                   class="form-control w-50 align-items-center"
                   placeholder="i.e: Also suitable for Larssen sheet piles (U, Z)*" id="footer_en_us"/>
        </div>

        <hr class="mt-3">
    </div>

    <div class="d-flex justify-content-end gap-2 px-5">
        <a class="btn btn-secondary next"><i class="bi bi-arrow-right"></i></a>
    </div>

</div>
<script>

    function getWeightFields()
    {
        return `

               <div class="p-3 mt-3 container">

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


            `.trim();
    }


    $(document).off("click", ".add-new-weight-btn");
    $(document).on("click", ".add-new-weight-btn", function () {
        $(this).closest("div.weight-jumbo-container").append(getWeightFields());
    });

    function getThicknessFields()
    {
        return `

               <div class="p-3 mt-3 container">

                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="thickness_metrics[]"
                                                                                     placeholder="ie: 5 mm"
                                            >
                                            <span class="input-group-text">metrics</span>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="thickness_imperial[]"
                                                                                    placeholder="ie: 5 inch"
                                            >
                                            <span class="input-group-text">imperial</span>
                                        </div>


                                        <div class="input-group justify-content-end mb-3">

                                           <input type="text" class="form-control ml-1" placeholder="label"
                                                                                        name="thickness_label[]"
                                           >
                                            <span class="input-group-text">label</span>
                                        </div>


                                        <div class="input-group justify-content-end">
                                            <button type="button" class="btn btn-danger remove-thickness-btn"><i
                                                        class="bi bi-dash-lg"></i></button>
                                            <button type="button" class="btn btn-primary add-new-thickness-btn"><i
                                                        class="bi bi-plus-lg"></i></button>
                                        </div>

               </div>


            `.trim();
    }

    $(document).off("click", ".add-new-thickness-btn");
    $(document).on("click", ".add-new-thickness-btn", function () {
        $(this).closest("div.thickness-jumbo-container").append(getThicknessFields());
    });

    function getLengthFields()
    {
        return `
                         <div class="p-3 mt-3 container">
                            <div class="w-100 justify-content-start mb-3">

                                <select class="form-select w-100"  name="standard_length_type[]">
                                    <option
                                            value="<?=StandardLengthTypePool::FIXED_SINGLE_VALUE?>"
                                            selected
                                    >
                                        Fixed single value. i.e: 12m or 12m (-0.1mm/+0.2mm)
                                    </option>
                                    <option
                                            value="<?=StandardLengthTypePool::FIXED_MULTIPLE_VALUES?>"
                                    >
                                        Fixed multi value. i.e: 12m, 14m, 16m
                                    </option>
                                    <option
                                            value="<?=StandardLengthTypePool::VARIABLE_VALUES?>"
                                    >
                                        Variable lengths. i.e: 7.6 m - 10.6 m
                                    </option>
                                </select>
                            </div>


                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="standard_length_metrics[]"
                                       placeholder="ie: 12m"
                                >
                                <span class="input-group-text">metrics</span>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="standard_length_imperial[]"
                                       placeholder="ie: 1.2ft"
                                >
                                <span class="input-group-text">imperial</span>
                            </div>

                            <div class="input-group justify-content-end mb-3">
                                <input type="text" class="form-control ml-1" placeholder="label"
                                       name="standard_length_label[]"
                                >
                                <span class="input-group-text">label</span>
                            </div>

                            <div class="input-group justify-content-end">
                                <button type="button"
                                        class="btn btn-danger remove-standard-length-btn"><i
                                            class="bi bi-dash-lg"></i></button>
                                <button type="button"
                                        class="btn btn-primary add-new-standard-length-btn"><i
                                            class="bi bi-plus-lg"></i></button>
                            </div>

                        </div>
        `;
    }

    $(document).off("click", ".add-new-standard-length-btn");
    $(document).on("click", ".add-new-standard-length-btn", function () {
        $(this).closest("div.length-jumbo-container").append(getLengthFields());
    });

    function getMaxTensileStrength()
    {
        return `

                    <div class="p-3 mt-3 container">

                        <div class="input-group mb-3">
                            <input type="text" class="form-control"  placeholder="ie: 2.552 kN/m or 2.552 kN/m (FEM)"
                                   name="max_tensile_strength_m[]">
                            <span class="input-group-text">metrics</span>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="ie: 19.52 kips/in or 19.52 kips/in (FEM)"
                                   name="max_tensile_strength_i[]">
                            <span class="input-group-text">imperial</span>
                        </div>


                        <div class="input-group justify-content-end mb-3">
                             <input type="text" class="form-control ml-1" placeholder="ma.tensile strength label"
                                    name="max_tensile_strength_label[]">
                             <span class="input-group-text">label</span>
                        </div>

                        <div class="input-group justify-content-end">
                             <button type="button"
                                    class="btn btn-danger remove-max-tensile-strength-btn"><i
                                        class="bi bi-dash-lg"></i></button>
                             <button type="button"
                                     class="btn btn-primary add-new-max-tensile-strength-btn"><i
                                         class="bi bi-plus-lg"></i></button>
                        </div>

                    </div>

        `.trim();
    }
    $(document).off("click", ".add-new-max-tensile-strength-btn");
    $(document).on("click", ".add-new-max-tensile-strength-btn", function () {
        $(this).closest("div.max-tensile-jumbo-container").append(getMaxTensileStrength());
    });

    $(document).off("click", ".remove-weight-btn");
    $(document).off("click", ".remove-thickness-btn");
    $(document).off("click", ".remove-standard-length-btn");
    $(document).off("click", ".remove-max-tensile-strength-btn");
    $(document).on("click", ".remove-weight-btn, .remove-thickness-btn, .remove-standard-length-btn, .remove-max-tensile-strength-btn",
        function () {
        $(this).closest("div.container").remove();
    });


    //label toggling
    $(document).off("click", ".show-label-btn");
    $(document).on("click", ".show-label-btn", function () {
        let input = $(this).closest("div.container").find("input.label");
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