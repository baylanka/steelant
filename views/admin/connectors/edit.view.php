<?php
    use helpers\pools\LanguagePool;
?>
<div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Connector</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body p-2">
            <div class="wizard my-2">

                <ul class="nav nav-tabs justify-content-around" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active rounded-circle mx-auto d-flex align-items-center justify-content-center"
                           id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab"
                           aria-controls="home" aria-selected="true">
                            <i class="bi bi-ui-radios size-20"></i>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                           id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab"
                           aria-controls="contact" aria-selected="false">
                            <i class="bi bi-images size-20"></i>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                           id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab"
                           aria-controls="profile" aria-selected="false">
                            <i class="bi bi-download size-20"></i>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                           id="contact2-tab" data-bs-toggle="tab" data-bs-target="#contact2" type="button" role="tab"
                           aria-controls="contact2" aria-selected="false">
                            <i class="bi bi-card-image size-20"></i>
                        </a>
                    </li>
                </ul>

                <form action="<?= url('/admin/connectors/update') ?>">
                    <input type="hidden" name="id" value="<?=$connector->id?>"/>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row w-100 p-5">
                                    <div class="col-12 mt-3">
                                        <select class="form-select w-100 select2" name="category">
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
                                        <label for="steel_grade" class="align-items-center">
                                            Steel Grade
                                        </label>
                                        <input name="grade" type="text" value="<?=$connector->grade?>"
                                               class="form-control w-50 align-items-center"
                                               placeholder="Steel Grade" id="steel_grade"/>
                                    </div>

                                    <div class="col-12 d-flex justify-content-between mt-3">
                                        <label for="description" class="align-items-center">
                                            Description
                                        </label>
                                        <textarea name="description" type="text"
                                                  class="form-control w-50" rows="3"
                                                  placeholder="Description" id="description"><?=$connector->description?></textarea>
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
                                            <?php if(empty(sizeof($weightIArray))): ?>
                                                <div class="p-3 mt-3 weight-container">

                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control">
                                                        <span class="input-group-text">metrics</span>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control">
                                                        <span class="input-group-text">imperial</span>
                                                    </div>


                                                    <div class="input-group justify-content-end mb-3">
                                                        <button type="button" class="btn btn-light show-label-btn">
                                                            <i class="bi bi-arrow-bar-left"></i>
                                                        </button>

                                                        <input type="text" class="form-control ml-1  label" placeholder="label">
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
                                                <input type="text" class="form-control" name="standard_length_metrics"
                                                       value="<?=$connector->standardLength_m ?>"
                                                >
                                                <span class="input-group-text">metrics</span>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="standard_length_imperial"
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
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                            <div class="row w-100 p-5 flex-row justify-content-around">

                                <?php foreach ($templates as $index=> $template): ?>
                                    <div class="form-check col-5 shadow m-2 p-2 set-checked">
                                        <div class="d-flex justify-content-between p-3">
                                            <label class="form-check-label w-100" for="flexRadioDefault1">
                                                Template <?=str_pad(($index+1),3,"0", STR_PAD_LEFT)?>
                                            </label>
                                            <input class="form-check-input" type="radio" name="template"
                                                   value="<?=$template->id?>"
                                                   id="template"
                                                   <?= $connector->templateId === $template->id ? 'checked' : ''?>>

                                        </div>
                                        <img
                                             src="<?= assets("/themes/user/img/template/template-02.png") ?>"
                                             alt="<?= $template->getThumbnailImageName() ?>"
                                             title="<?= $template->getThumbnailImageName() ?>"
                                             class="w-100"/>
                                    </div>
                                <?php endforeach; ?>

                            </div>

                            <div class="d-flex justify-content-between gap-2 px-5">
                                <a class="btn btn-secondary previous"><i class="bi bi-arrow-left"></i></a>
                                <a class="btn btn-secondary next"><i class="bi bi-arrow-right"></i></a>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                            <div class="download-jumbotron w-100 d-flex flex-wrap justify-content-center gap-3 my-5">
                                <?php if (sizeof($connector->downloadableFiles) === 0): ?>
                                    <div class="download-container w-75 p-4">
                                        <div class="input-group w-100 mb-3 justify-content-center">

                                            <label class="btn btn-light">
                                                <i class="bi bi-folder2-open"></i>
                                            </label>

                                            <input type="file" class="form-control w-50 bg-light" name="downloadable[0]">


                                            <button type="button" class="btn btn-primary add-new-download-container">
                                                <i class="bi bi-plus-lg"></i>
                                            </button>
                                        </div>
                                        <div class="d-flex flex-wrap gap-3 w-100">
                                            <div class="downloadable">
                                                <div class="input-group w-100">

                                                    <label class="btn btn-light">
                                                        <img src="<?= assets("img/flags/de.png") ?>"
                                                             height="20" class="flag"/>
                                                    </label>

                                                    <label class="btn btn-light">
                                                        <input class="form-check-input download-label-visible" type="checkbox"
                                                               value="" id="flexCheckDefault">
                                                    </label>
                                                    <input class="form-control download-label" type="text"
                                                           data-lang="<?=LanguagePool::GERMANY()->getLabel()?>"
                                                           name="downloadable[title][0][<?=LanguagePool::GERMANY()->getLabel()?>]"
                                                           placeholder="Label ( in Germany )"
                                                           style="display: none;"
                                                           disabled="disabled"
                                                    >


                                                </div>
                                            </div>
                                            <div class="downloadable">
                                                <div class="input-group w-100">
                                                    <label class="btn btn-light">
                                                        <img src="<?= assets("img/flags/en-gb.png") ?>"
                                                             height="20" class="flag"/>
                                                    </label>

                                                    <label class="btn btn-light">
                                                        <input class="form-check-input download-label-visible" type="checkbox"
                                                               value="" id="flexCheckDefault">
                                                    </label>
                                                    <input class="form-control download-label" type="text"
                                                           data-lang="<?=LanguagePool::UK_ENGLISH()->getLabel()?>"
                                                           name="downloadable[title][0][<?=LanguagePool::UK_ENGLISH()->getLabel()?>]"
                                                           placeholder="Label ( in English )"
                                                           style="display: none;"
                                                           disabled="disabled"
                                                    >


                                                </div>
                                            </div>
                                            <div class="downloadable">
                                                <div class="input-group w-100">
                                                    <label class="btn btn-light">
                                                        <img src="<?= assets("img/flags/fr.png") ?>"
                                                             height="20" class="flag"/>
                                                    </label>

                                                    <label class="btn btn-light">
                                                        <input class="form-check-input download-label-visible" type="checkbox"
                                                               value="" id="flexCheckDefault">
                                                    </label>
                                                    <input class="form-control download-label" type="text"
                                                           data-lang="<?=LanguagePool::FRENCH()->getLabel()?>"
                                                           name="downloadable[title][0][<?=LanguagePool::FRENCH()->getLabel()?>]"
                                                           placeholder="Label ( in French )"
                                                           style="display: none;"
                                                           disabled="disabled"
                                                    >

                                                </div>
                                            </div>
                                            <div class="downloadable">
                                            <div class="input-group w-100">


                                                <label class="btn btn-light">
                                                    <img src="<?= assets("img/flags/en-us.png") ?>"
                                                         height="20" class="flag"/>
                                                </label>

                                                <label class="btn btn-light">
                                                    <input class="form-check-input download-label-visible" type="checkbox"
                                                           value="" id="flexCheckDefault">
                                                </label>
                                                <input class="form-control download-label" type="text"
                                                       data-lang="<?=LanguagePool::US_ENGLISH()->getLabel()?>"
                                                       name="downloadable[title][0][<?=LanguagePool::US_ENGLISH()->getLabel()?>]"
                                                       placeholder="Label ( in English )"
                                                       style="display: none;"
                                                       disabled="disabled"
                                                >
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php foreach ($connector->downloadableFiles as  $index => $content): ?>
                                    <div class="download-container w-75 p-4">
                                        <a href="<?= $content['file_asset_path'] ?>" download>
                                            <iframe src="<?= $content['file_asset_path'] ?>"
                                                    width="100%"
                                                    title="<?=$content['media_name']?>"
                                            ></iframe>
                                            <a href="<?= $content['file_asset_path'] ?>" class="btn btn-sm btn-primary blue"
                                               target="_blank">View file: <?=$content['media_name']?></a>
                                        </a>
                                        <div class="input-group w-100 mb-3 justify-content-center">

                                            <label class="btn btn-light">
                                                <i class="bi bi-folder2-open"></i>
                                            </label>

                                            <input type="file" class="form-control w-50 bg-light"
                                                   value=""
                                                   name="downloadable[<?=$index?>]">



                                            <button type="button" class="btn btn-primary add-new-download-container">
                                                <i class="bi bi-plus-lg"></i>
                                            </button>
                                        </div>

                                        <div class="d-flex flex-wrap gap-3 w-100">


                                            <div class="downloadable">
                                                <div class="input-group w-100">

                                                    <?php
                                                          $germany = LanguagePool::GERMANY()->getLabel();
                                                          $germanyTitleExists = array_key_exists($germany, $content['title'])
                                                    ?>
                                                    <label class="btn btn-light">
                                                        <img src="<?= assets("img/flags/de.png") ?>"
                                                             height="20" class="flag"/>
                                                    </label>

                                                    <label class="btn btn-light">
                                                        <input class="form-check-input download-label-visible" type="checkbox"
                                                               <?= $germanyTitleExists ? 'checked' :'' ?>
                                                               value="" id="flexCheckDefault">
                                                    </label>
                                                    <input class="form-control download-label" type="text"
                                                           data-lang="<?=LanguagePool::GERMANY()->getLabel()?>"
                                                           name="downloadable[title][<?=$index?>][<?=LanguagePool::GERMANY()->getLabel()?>]"
                                                           placeholder="Label ( in Germany )"
                                                           <?= $germanyTitleExists ? '' :'disabled="disabled"' ?>
                                                           <?= $germanyTitleExists ? '' :'style="display: none;"' ?>
                                                           value="<?=$germanyTitleExists? $content['title'][$germany] : '' ?>"
                                                    >


                                                </div>
                                            </div>


                                            <div class="downloadable">
                                                <div class="input-group w-100">

                                                    <?php
                                                        $englishUk = LanguagePool::UK_ENGLISH()->getLabel();
                                                        $englishUkTitleExists = array_key_exists($englishUk, $content['title'])
                                                    ?>
                                                    <label class="btn btn-light">
                                                        <img src="<?= assets("img/flags/en-gb.png") ?>"
                                                             height="20" class="flag"/>
                                                    </label>

                                                    <label class="btn btn-light">
                                                        <input class="form-check-input download-label-visible" type="checkbox"
                                                                <?= $englishUkTitleExists ? 'checked' :'' ?>
                                                                value="" id="flexCheckDefault">
                                                    </label>
                                                    <input class="form-control download-label" type="text"
                                                           data-lang="<?=LanguagePool::UK_ENGLISH()->getLabel()?>"
                                                           name="downloadable[title][<?=$index?>][<?=LanguagePool::UK_ENGLISH()->getLabel()?>]"
                                                           placeholder="Label ( in English )"
                                                            <?= $englishUkTitleExists ? '' :'disabled="disabled"' ?>
                                                            <?= $englishUkTitleExists ? '' :'style="display: none;"' ?>
                                                           value="<?=$englishUkTitleExists? $content['title'][$englishUk] : '' ?>"
                                                    >


                                                </div>
                                            </div>


                                            <div class="downloadable">
                                                <div class="input-group w-100">
                                                    <?php
                                                        $french = LanguagePool::FRENCH()->getLabel();
                                                        $frenchTitleExists = array_key_exists($french, $content['title'])
                                                    ?>

                                                    <label class="btn btn-light">
                                                        <img src="<?= assets("img/flags/fr.png") ?>"
                                                             height="20" class="flag"/>
                                                    </label>

                                                    <label class="btn btn-light">
                                                        <input class="form-check-input download-label-visible" type="checkbox"
                                                               <?= $frenchTitleExists ? 'checked' :'' ?>
                                                               value="" id="flexCheckDefault">
                                                    </label>
                                                    <input class="form-control download-label" type="text"
                                                           data-lang="<?=LanguagePool::FRENCH()->getLabel()?>"
                                                           name="downloadable[title][<?=$index?>][<?=LanguagePool::FRENCH()->getLabel()?>]"
                                                           placeholder="Label ( in French )"
                                                            <?= $frenchTitleExists ? '' :'disabled="disabled"' ?>
                                                            <?= $frenchTitleExists ? '' :'style="display: none;"' ?>
                                                           value="<?=$frenchTitleExists? $content['title'][$french] : '' ?>"
                                                    >

                                                </div>
                                            </div>

                                            <div class="downloadable">
                                                <div class="input-group w-100">
                                                    <?php
                                                        $englishUs = LanguagePool::US_ENGLISH()->getLabel();
                                                        $englishUsTitleExists = array_key_exists($englishUs, $content['title'])
                                                    ?>

                                                    <label class="btn btn-light">
                                                        <img src="<?= assets("img/flags/en-us.png") ?>"
                                                             height="20" class="flag"/>
                                                    </label>

                                                    <label class="btn btn-light">
                                                        <input class="form-check-input download-label-visible" type="checkbox"
                                                              <?= $frenchTitleExists ? 'checked' :'' ?>
                                                               value="" id="flexCheckDefault">
                                                    </label>
                                                    <input class="form-control download-label" type="text"
                                                           data-lang="<?=LanguagePool::US_ENGLISH()->getLabel()?>"
                                                           name="downloadable[title][0][<?=LanguagePool::US_ENGLISH()->getLabel()?>]"
                                                           placeholder="Label ( in English )"
                                                            <?= $englishUsTitleExists ? '' :'disabled="disabled"' ?>
                                                            <?= $englishUsTitleExists ? '' :'style="display: none;"' ?>
                                                           value="<?=$englishUsTitleExists? $content['title'][$englishUs] : '' ?>"
                                                    >
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                <?php endforeach; ?>
                            </div>


                            <div class="d-flex justify-content-between gap-2 px-5">
                                <a class="btn btn-secondary previous"><i class="bi bi-arrow-left"></i></a>
                                <a class="btn btn-secondary next"><i class="bi bi-arrow-right"></i></a>
                            </div>

                        </div>
                        <div class="tab-pane fade p-2" id="contact2" role="tabpanel" aria-labelledby="contact2-tab">

                            <nav>
                                <div class="nav nav-tabs justify-content-center mt-5" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-de-tab" data-bs-toggle="tab" data-bs-target="#nav-de" type="button" role="tab" aria-controls="nav-de" aria-selected="true">
                                        <img src="<?= assets("img/flags/de.png") ?>" height="25" class="flag"/>
                                    </button>

                                    <button class="nav-link" id="nav-uk-tab" data-bs-toggle="tab" data-bs-target="#nav-uk" type="button" role="tab" aria-controls="nav-uk" aria-selected="false">
                                        <img src="<?= assets("img/flags/en-gb.png") ?>" height="25" class="flag"/>
                                    </button>
                                    <button class="nav-link" id="nav-fr-tab" data-bs-toggle="tab" data-bs-target="#nav-fr" type="button" role="tab" aria-controls="nav-fr" aria-selected="false">
                                        <img src="<?= assets("img/flags/fr.png") ?>" height="25" class="flag"/>
                                    </button>

                                    <button class="nav-link" id="nav-us-tab" data-bs-toggle="tab" data-bs-target="#nav-us" type="button" role="tab" aria-controls="nav-us" aria-selected="false">
                                        <img src="<?= assets("img/flags/en-us.png") ?>" height="25" class="flag"/>
                                    </button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-de" role="tabpanel" aria-labelledby="nav-de-tab">
                                    <?php require basePath("/views/templates/template-01.php") ?>
                                </div>
                                <div class="tab-pane fade " id="nav-uk" role="tabpanel" aria-labelledby="nav-uk-tab">
                                    <?php require basePath("/views/templates/template-01.php") ?>
                                </div>
                                <div class="tab-pane fade " id="nav-fr" role="tabpanel" aria-labelledby="nav-fr-tab">
                                    <?php require basePath("/views/templates/template-01.php") ?>
                                </div>

                                <div class="tab-pane fade " id="nav-us" role="tabpanel" aria-labelledby="nav-us-tab">
                                    <?php require basePath("/views/templates/template-01.php") ?>
                                </div>

                            </div>



                            <div class="d-flex justify-content-start gap-2 px-5">
                                <a class="btn btn-secondary previous"><i class="bi bi-arrow-left"></i></a>
                            </div>

                        </div>

                    </div>
                </form>
            </div>


        </div>


        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="update-btn">Update</button>
        </div>

    </div>
</div>


<script>
    $('button#update-btn').off('click');
    $('button#update-btn').on('click', async function updateConnector(e){
        e.preventDefault();
        const btn = $(this);
        const btnLabel = btn.text();
        loadButton(btn, "updating ...");
        const form = btn.closest('div.modal-dialog').find('form');
        try{
            let response = await makePostFileRequest(form);
            toast.success(response.message);
            // raise an event to close the modal
            const event = new CustomEvent('updateCategorySuccessEvent', {
                detail: { connector: response.data }
            });
            document.dispatchEvent(event);
        }catch (err){
            toast.error(err);
        }finally {
            resetButton(btn, btnLabel);
        }
    });

    //triggering next tab
    $(document).off("click", ".next");
    $(document).on("click", ".next", function () {
        let e = $(".nav-tabs .active")
            .closest("li").next("li")
            .find("a")[0];
        if (e) {
            const prevTab = new bootstrap.Tab(e);
            prevTab.show();
        }
    });

    //triggering previous tab
    $(document).off("click", ".previous");
    $(document).on("click", ".previous", function () {
        let e = $(".nav-tabs .active")
            .closest("li").prev("li")
            .find("a")[0];
        if (e) {
            const prevTab = new bootstrap.Tab(e);
            prevTab.show();
        }
    });

    // weight label toggling
    $(document).off("click", ".show-label-btn");
    $(document).on("click", ".show-label-btn", function () {
        debugger
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



    $(document).ready(function () {
        $("input.label").hide();

        $(".select2").select2({
            dropdownParent: $('#' + modalId),
            theme: 'bootstrap-5'
        });



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
        })
        // WEIGHT


        // DOWNLOADS


        $(document).on("change", ".download-label-visible", function () {

            let label = $(this).closest("div.downloadable").find("input.download-label");

            if ($(this).is(":checked")) {
                label.show("1000");
                label.attr("disabled", false);
            } else {
                label.hide("1000");
                label.attr("disabled", true);
            }

        });

        $(document).on("click", ".add-new-download-container", function () {
            const downloadableContent = getDownloadableFileContent();
            $(this).closest("div.download-jumbotron").append(downloadableContent);


            $(this).closest("div.input-group").append(`
               <button type="button" class="btn btn-danger remove-download-container">
                  <i class="bi bi-dash"></i>
               </button>
            `);

            $(this).remove();

            setDownloadName();

        });


        $(document).off("click", "button.remove-download-container")
        $(document).on("click", "button.remove-download-container", function () {
            $(this).closest("div.download-container").remove();
            setDownloadName();
        });


        // DOWNLOADS

        $(document).off("click", ".set-checked");
        $(document).on("click", ".set-checked", function () {
            $("input[name=template]").attr("checked", false);
            $(this).find("input[type=radio]").attr("checked", true);

        });


    });

    function setDownloadName()
    {
        $('div.download-container').each(function(index, element){
            const downloadFileName= `downloadable[${index}]`;
            $(this).find('input.download-file').attr('name',downloadFileName)
            $(this).find('.download-label').each(function(){
                const lang = $(this).attr('data-lang');
                const downloadLabelName = `downloadable[title][${index}][${lang}]`;
                $(this).attr('name', downloadLabelName);
            })
        });
    }

    function getDownloadableFileContent()
    {
        return `
                          <div class="download-container w-75 p-4">
                                <div class="input-group w-100 mb-3 justify-content-center">
                                    <label class="btn btn-light">
                                        <i class="bi bi-folder2-open"></i>
                                    </label>
                                    <input type="file" class="form-control w-50 bg-light download-file">
                                    <button type="button" class="btn btn-primary add-new-download-container">
                                        <i class="bi bi-plus-lg"></i>
                                    </button>
                                </div>

                                <div class="d-flex flex-wrap gap-3 w-100">
                                    <div class="downloadable">
                                        <div class="input-group w-100">
                                            <label class="btn btn-light">
                                                <img src="<?= assets("img/flags/de.png") ?>"
                                                     height="20" class="flag"/>
                                            </label>

                                            <label class="btn btn-light">
                                                <input class="form-check-input download-label-visible " type="checkbox" value="" id="flexCheckDefault">
                                            </label>
                                            <input class="form-control download-label" placeholder="Label ( in Germany )"
                                                    data-lang="<?=LanguagePool::GERMANY()->getLabel()?>"
                                                    style="display: none;" disabled="disabled">


                                        </div>
                                    </div>

                                    <div class="downloadable">
                                        <div class="input-group w-100">
                                            <label class="btn btn-light">
                                                <img src="<?= assets("img/flags/en-gb.png") ?>"
                                                     height="20" class="flag"/>
                                            </label>

                                            <label class="btn btn-light">
                                                <input class="form-check-input download-label-visible" type="checkbox" value="" id="flexCheckDefault">
                                            </label>
                                            <input class="form-control download-label" placeholder="Label ( in English )"
                                                   data-lang="<?=LanguagePool::UK_ENGLISH()->getLabel()?>"
                                                   style="display: none;" disabled="disabled">
                                        </div>
                                    </div>


                                    <div class="downloadable">
                                        <div class="input-group w-100">
                                            <label class="btn btn-light">
                                                <img src="<?= assets("img/flags/fr.png") ?>"
                                                     height="20" class="flag"/>
                                            </label>

                                            <label class="btn btn-light">
                                                <input class="form-check-input download-label-visible" type="checkbox" value="" id="flexCheckDefault">
                                            </label>
                                            <input class="form-control download-label" placeholder="Label ( in French )"
                                                   data-lang="<?=LanguagePool::FRENCH()->getLabel()?>"
                                                   style="display: none;" disabled="disabled">
                                        </div>
                                    </div>

                                    <div class="downloadable">
                                        <div class="input-group w-100">
                                            <label class="btn btn-light">
                                                <img src="<?= assets("img/flags/en-us.png") ?>"
                                                     height="20" class="flag"/>
                                            </label>

                                            <label class="btn btn-light">
                                                <input class="form-check-input download-label-visible" type="checkbox" value="" id="flexCheckDefault">
                                            </label>
                                            <input  class="form-control download-label" placeholder="Label ( in English )"
                                                    data-lang="<?=LanguagePool::US_ENGLISH()->getLabel()?>"
                                                    style="display: none;" disabled="disabled">
                                        </div>
                                    </div>
                                </div>
                            </div>
            `;
    }


</script>
<script src="<?= assets("js/template-render.js") ?>"></script>
<!--<script src="--><?php //= assets("js/template-render.min.js") ?><!--"></script>-->