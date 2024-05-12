<?php
    use helpers\pools\LanguagePool;
?>
<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="w-100 d-flex justify-content-around my-5 add-file-container d-none"><button class="btn btn-sm btn-primary background-blue add-new-download-container">Add File Selector</button></div>

    <div class="download-jumbotron w-100 d-flex flex-wrap justify-content-center gap-3 my-5">
        <?php if (sizeof($connector->downloadableFiles) === 0): ?>
            <div class="download-container w-75 p-4">
                <div class="input-group w-100 mb-3 justify-content-center">

                    <label class="btn btn-light">
                        <i class="bi bi-folder2-open"></i>
                    </label>

                    <input type="file" class="form-control w-50 bg-light download-file" name="downloadable[0]">
                    <input type="hidden" class="form-control w-50 bg-light download-placeholder"
                           name="downloadable_placeholder[0]" value="1">


                    <button type="button" class="btn btn-danger remove-download-container">
                        <i class="bi bi-dash"></i>
                    </button>
                    <button type="button" class="btn btn-primary background-blue add-new-download-container">
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

                            <label class="btn btn-light download-element" style="display:none;" >
                               Display name
                            </label>
                            <input class="form-control download-label download-element" type="text"
                                   data-lang="<?=LanguagePool::GERMANY()->getLabel()?>"
                                   name="downloadable[title][0][<?=LanguagePool::GERMANY()->getLabel()?>]"
                                   placeholder="Label ( in Germany )"
                                   style="display: none;"
                                   disabled="disabled">
                            <label class="btn btn-light download-element" style="display:none;" >
                                File name
                            </label>
                            <input class="form-control file-label download-element" type="text"
                                   data-lang="<?=LanguagePool::GERMANY()->getLabel()?>"
                                   name="downloadable[file_name][0][<?=LanguagePool::GERMANY()->getLabel()?>]"
                                   placeholder="File name ( in Germany )"
                                   style="display: none;"
                                   disabled="disabled">

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
                            <label class="btn btn-light download-element" style="display:none;" >
                                Display name
                            </label>
                            <input class="form-control download-label download-element" type="text"
                                   data-lang="<?=LanguagePool::UK_ENGLISH()->getLabel()?>"
                                   name="downloadable[title][0][<?=LanguagePool::UK_ENGLISH()->getLabel()?>]"
                                   placeholder="Label ( in English (en-gb) )"
                                   style="display: none;"
                                   disabled="disabled"
                            >
                            <label class="btn btn-light download-element" style="display:none;" >
                                File name
                            </label>
                            <input class="form-control file-label download-element" type="text"
                                   data-lang="<?=LanguagePool::UK_ENGLISH()->getLabel()?>"
                                   name="downloadable[file_name][0][<?=LanguagePool::UK_ENGLISH()->getLabel()?>]"
                                   placeholder="File name ( in English (en-gb) )"
                                   style="display: none;"
                                   disabled="disabled">

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
                            <label class="btn btn-light download-element" style="display:none;" >
                                Display name
                            </label>
                            <input class="form-control download-label download-element" type="text"
                                   data-lang="<?=LanguagePool::FRENCH()->getLabel()?>"
                                   name="downloadable[title][0][<?=LanguagePool::FRENCH()->getLabel()?>]"
                                   placeholder="Label ( in French )"
                                   style="display: none;"
                                   disabled="disabled"
                            >
                            <label class="btn btn-light download-element" style="display:none;" >
                                File name
                            </label>
                            <input class="form-control file-label download-element" type="text"
                                   data-lang="<?=LanguagePool::FRENCH()->getLabel()?>"
                                   name="downloadable[file_name][0][<?=LanguagePool::FRENCH()->getLabel()?>]"
                                   placeholder="File name ( in French )"
                                   style="display: none;"
                                   disabled="disabled">

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
                            <label class="btn btn-light download-element" style="display:none;" >
                                Display name
                            </label>
                            <input class="form-control download-label download-element" type="text"
                                   data-lang="<?=LanguagePool::US_ENGLISH()->getLabel()?>"
                                   name="downloadable[title][0][<?=LanguagePool::US_ENGLISH()->getLabel()?>]"
                                   placeholder="Label ( in English )"
                                   style="display: none;"
                                   disabled="disabled"
                            >

                            <label class="btn btn-light download-element" style="display:none;" >
                                File name
                            </label>
                            <input class="form-control file-label download-element" type="text"
                                   data-lang="<?=LanguagePool::US_ENGLISH()->getLabel()?>"
                                   name="downloadable[file_name][0][<?=LanguagePool::US_ENGLISH()->getLabel()?>]"
                                   placeholder="File name ( in English (en-us) )"
                                   style="display: none;"
                                   disabled="disabled">
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php foreach ($connector->downloadableFiles as  $index => $content): ?>
            <div class="download-container w-75 p-4" style="background-color: #c1ffc1">
                <div class="input-group w-100 mb-0 justify-content-center">
                    <label class="btn btn-light">
                        <i class="bi bi-folder2-open"></i>
                    </label>

                    <input type="file" class="form-control w-50 bg-light download-file">
                    <input type="hidden" class="downloadable_src"
                           value="<?= $content['file_asset_path'] ?>"
                           name="downloadable_src[<?=$index?>]">
                    <input type="hidden" class="form-control w-50 bg-light download-placeholder"
                           name="downloadable_placeholder[<?=$index?>]" value="<?=($index+1)?>">
                    <button type="button" class="btn btn-danger remove-download-container">
                        <i class="bi bi-dash"></i>
                    </button>
                    <button type="button" class="btn btn-primary background-blue add-new-download-container">
                        <i class="bi bi-plus-lg"></i>
                    </button>

                </div>
                <div class="row mt-0 previous-file-container">
                    <a href="<?= $content['file_asset_path'] ?>" class="previous-file-download" style="text-decoration:none" download>
                        <small class="text text-danger">Download Chosen File:
                            <span class="file-name"><?=$content['media_name']?></span>
                        </small>
                    </a>
                </div>

                <div class="d-flex flex-wrap gap-3 w-100 mt-3">
                    <div class="downloadable">
                        <div class="input-group w-100">

                            <?php
                            $germany = LanguagePool::GERMANY()->getLabel();
                            $germanyTitleExists = array_key_exists($germany, $content['title'])
                                                    && !empty($content['title'][$germany]);
                            $titleFieldName = "downloadable[title][{$index}][{$germany}]";
                            $fileNameFieldName = "downloadable[file_name][{$index}][{$germany}]";
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

                            <label class="btn btn-light download-element"
                                <?= $germanyTitleExists ? '' :'disabled="disabled"' ?>
                                <?= $germanyTitleExists ? '' :'style="display: none;"' ?>
                            >
                                Display name
                            </label>

                            <input class="form-control download-label download-element" type="text"
                                   data-lang="<?=$germany?>"
                                   name="<?=$titleFieldName?>"
                                   placeholder="Label ( in Germany )"
                                <?= $germanyTitleExists ? '' :'disabled="disabled"' ?>
                                <?= $germanyTitleExists ? '' :'style="display: none;"' ?>
                                   value="<?=$germanyTitleExists? $content['title'][$germany] : '' ?>"
                            >

                            <label class="btn btn-light download-element"
                                <?= $germanyTitleExists ? '' :'style="display: none;"' ?>
                            >
                                File name
                            </label>
                            <input class="form-control file-label download-element" type="text"
                                   data-lang="<?=LanguagePool::GERMANY()->getLabel()?>"
                                   name="<?=$fileNameFieldName?>"
                                   placeholder="File name ( in Germany )"
                                <?= $germanyTitleExists ? '' :'disabled="disabled"' ?>
                                <?= $germanyTitleExists ? '' :'style="display: none;"' ?>
                                   value="<?=$germanyTitleExists? $content['file_name'][$germany] : '' ?>"
                            >
                        </div>
                    </div>
                    <div class="downloadable">
                        <div class="input-group w-100">

                            <?php
                            $englishUk = LanguagePool::UK_ENGLISH()->getLabel();
                            $englishUkTitleExists = array_key_exists($englishUk, $content['title'])
                                                        && !empty($content['title'][$englishUk]);
                            $titleFieldName = "downloadable[title][{$index}][{$englishUk}]";
                            $fileNameFieldName = "downloadable[file_name][{$index}][{$englishUk}]";
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

                            <label class="btn btn-light download-element"
                                <?= $englishUkTitleExists ? '' :'style="display: none;"' ?>
                            >
                                Display name
                            </label>

                            <input class="form-control download-label download-element" type="text"
                                   data-lang="<?=$englishUk?>"
                                   name="<?=$titleFieldName?>"
                                   placeholder="Label ( in English (en-gb) )"
                                <?= $englishUkTitleExists ? '' :'disabled="disabled"' ?>
                                <?= $englishUkTitleExists ? '' :'style="display: none;"' ?>
                                   value="<?=$englishUkTitleExists? $content['title'][$englishUk] : '' ?>"
                            >

                            <label class="btn btn-light file-label download-element"
                                <?= $englishUkTitleExists ? '' :'style="display: none;"' ?>

                            >
                                File name
                            </label>
                            <input class="form-control file-label download-element" type="text"
                                   data-lang="<?=$englishUk?>"
                                   name="<?=$fileNameFieldName?>"
                                   placeholder="File name ( in English (en-gb) )"
                                <?= $englishUkTitleExists ? '' :'disabled="disabled"' ?>
                                <?= $englishUkTitleExists ? '' :'style="display: none;"' ?>
                                   value="<?=$englishUkTitleExists? $content['file_name'][$englishUk] : '' ?>"
                            >


                        </div>
                    </div>
                    <div class="downloadable">
                        <div class="input-group w-100">
                            <?php
                            $french = LanguagePool::FRENCH()->getLabel();
                            $frenchTitleExists = array_key_exists($french, $content['title'])
                                         && !empty($content['title'][$french]);
                            $titleFieldName = "downloadable[title][{$index}][{$french}]";
                            $fileNameFieldName = "downloadable[file_name][{$index}][{$french}]";

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

                            <label class="btn btn-light download-element"
                                <?= $frenchTitleExists ? '' :'style="display: none;"' ?>
                            >
                                Display name
                            </label>

                            <input class="form-control download-label download-element" type="text"
                                   data-lang="<?=$french?>"
                                   name="<?=$titleFieldName?>"
                                   placeholder="Label ( in French )"
                                <?= $frenchTitleExists ? '' :'disabled="disabled"' ?>
                                <?= $frenchTitleExists ? '' :'style="display: none;"' ?>
                                   value="<?=$frenchTitleExists? $content['title'][$french] : '' ?>"
                            >

                            <label class="btn btn-light download-element"
                                <?= $frenchTitleExists ? '' :'style="display: none;"' ?>
                            >
                                File name
                            </label>
                            <input class="form-control file-label download-element" type="text"
                                   data-lang="<?=$french?>"
                                   name="<?=$fileNameFieldName?>"
                                   placeholder="File name ( in French )"
                                <?= $frenchTitleExists ? '' :'disabled="disabled"' ?>
                                <?= $frenchTitleExists ? '' :'style="display: none;"' ?>
                                   value="<?=$frenchTitleExists? $content['file_name'][$french] : '' ?>"
                            >

                        </div>
                    </div>
                    <div class="downloadable">
                        <div class="input-group w-100">
                            <?php
                            $englishUs = LanguagePool::US_ENGLISH()->getLabel();
                            $englishUsTitleExists = array_key_exists($englishUs, $content['title'])
                                                     && !empty($content['title'][$englishUs]);
                            $titleFieldName = "downloadable[title][{$index}][{$englishUs}]";
                            $fileNameFieldName = "downloadable[file_name][{$index}][{$englishUs}]";
                            ?>

                            <label class="btn btn-light">
                                <img src="<?= assets("img/flags/en-us.png") ?>"
                                     height="20" class="flag"/>
                            </label>

                            <label class="btn btn-light">
                                <input class="form-check-input download-label-visible" type="checkbox"
                                    <?= $englishUsTitleExists ? 'checked' :'' ?>
                                       value="" id="flexCheckDefault">
                            </label>

                            <label class="btn btn-light download-element"
                                <?= $englishUsTitleExists ? '' :'style="display: none;"' ?>
                            >
                                Display name
                            </label>

                            <input class="form-control download-label download-element" type="text"
                                   data-lang="<?=$englishUs?>"
                                   name="<?=$titleFieldName?>"
                                   placeholder="Label ( in English (en-us) )"
                                <?= $englishUsTitleExists ? '' :'disabled="disabled"' ?>
                                <?= $englishUsTitleExists ? '' :'style="display: none;"' ?>
                                   value="<?=$englishUsTitleExists? $content['title'][$englishUs] : '' ?>"
                            >

                            <label class="btn btn-light download-element"
                                <?= $englishUsTitleExists ? '' :'style="display: none;"' ?>

                            >
                                File name
                            </label>
                            <input class="form-control file-label download-element" type="text"
                                   data-lang="<?=$englishUk?>"
                                   name="<?=$fileNameFieldName?>"
                                   placeholder="File name ( in English (en-us) )"
                                <?= $englishUsTitleExists ? '' :'disabled="disabled"' ?>
                                <?= $englishUsTitleExists ? '' :'style="display: none;"' ?>
                                   value="<?=$englishUsTitleExists? $content['file_name'][$englishUs] : '' ?>"
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

<script>

    $(document).ready(function () {
        if($('.download-jumbotron .download-container').length > 0){
            activateSortableRows();
        }
    });

    function activateSortableRows()
    {
        let contentBody = document.querySelector('.download-jumbotron');
        if(!isEmpty(contentBody)){
            new Sortable(contentBody, {
                onEnd: async function (evt) {
                    await setDownloadName();
                }

            });
        }
    }

    $(document).off("change", ".download-file");
    $(document).on("change", ".download-file", async function (e) {
        e.preventDefault();
        spinnerEnabled();
        const fileValue = $(this).val();
        if(isEmpty(fileValue)){
           return;
        }
        const fileName = $(this).val().split('\\').pop();
        const container = $(this).closest('.download-container');

        container.find('.file-label').val(fileName);
        container.css('backgroundColor', '#c1ffc1');
        container.find('.downloadable_src').val('');
        container.find('.previous-file-container').remove();
        await setDownloadName();
        spinnerDisable();
    });

    $(document).off("change", ".download-label-visible");
    $(document).on("change", ".download-label-visible", function () {

        let label = $(this).closest("div.downloadable").find(".download-element");

        if ($(this).is(":checked")) {
            label.show("1000");
            label.attr("disabled", false);
        } else {
            label.hide("1000");
            label.attr("disabled", true);
        }

    });

    $(document).off("click", ".add-new-download-container");
    $(document).on("click", ".add-new-download-container", async function (e) {
        e.preventDefault();
        spinnerEnabled();
        const downloadableContent = getDownloadableFileContent();
        if($(this).closest('div.download-jumbotron').length > 0){
            $(this).closest('.download-container').after(downloadableContent);
        }else{
            $("div.download-jumbotron").append(downloadableContent);
        }

        await setDownloadName();
        $('.add-file-container').addClass('d-none');
        spinnerDisable();
    });


    $(document).off("click", "button.remove-download-container")
    $(document).on("click", "button.remove-download-container", async function () {
        spinnerEnabled();
        $(this).closest("div.download-container").remove();

        const remainingContainers =  $('div.download-container').length;
        if(remainingContainers >= 1){
            await setDownloadName();
        }else{
            $('.add-file-container').removeClass('d-none');
        }
        spinnerDisable();

    });

    $(document).off("click", ".set-checked");
    $(document).on("click", ".set-checked", function () {
        $("input[name=template]").attr("checked", false);
        $(this).find("input[type=radio]").attr("checked", true);

    });

    $(document).off('change', 'input.download-file');
    $(document).on('change', 'input.download-file', function(){
        const previousFileContainer = $(this).closest('div.input-group').next('div.previous-file-container');
        if(previousFileContainer.length === 0){
            return;
        }

        previousFileContainer.remove();
    });

    function getDownloadableFileContent()
    {
        return `
                          <div class="download-container w-75 p-4">
                                <div class="input-group w-100 mb-3 justify-content-center">
                                    <label class="btn btn-light">
                                        <i class="bi bi-folder2-open"></i>
                                    </label>
                                    <input type="file" class="form-control w-50 bg-light download-file">
                                    <input type="hidden" class="form-control w-50 bg-light download-placeholder">
                                    <button type="button" class="btn btn-danger remove-download-container">
                                      <i class="bi bi-dash"></i>
                                   </button>
                                    <button type="button" class="btn btn-primary background-blue add-new-download-container">
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

                                            <label class="btn btn-light download-element" style="display:none;" >
                                                Display name
                                            </label>
                                            <input class="form-control download-label download-element" placeholder="Label ( in Germany )"
                                                    data-lang="<?=LanguagePool::GERMANY()->getLabel()?>"
                                                    style="display: none;" disabled="disabled">

                                             <label class="btn btn-light download-element" style="display:none;" >
                                                File name
                                             </label>
                                            <input class="form-control file-label download-element" type="text"
                                                   data-lang="<?=LanguagePool::GERMANY()->getLabel()?>"
                                                   placeholder="File name ( in Germany )"
                                                   style="display: none;"
                                                   disabled="disabled">

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

                                            <label class="btn btn-light download-element" style="display:none;" >
                                                Display name
                                            </label>
                                            <input class="form-control download-label download-element" placeholder="Label ( in English )"
                                                   data-lang="<?=LanguagePool::UK_ENGLISH()->getLabel()?>"
                                                   style="display: none;" disabled="disabled">

                                            <label class="btn btn-light download-element" style="display:none;" >
                                                File name
                                             </label>
                                            <input class="form-control file-label download-element" type="text"
                                                   data-lang="<?=LanguagePool::UK_ENGLISH()->getLabel()?>"
                                                   placeholder="File name ( in English (en-gb) )"
                                                   style="display: none;"
                                                   disabled="disabled">
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

                                            <label class="btn btn-light download-element" style="display:none;" >
                                                Display name
                                            </label>
                                            <input class="form-control download-label download-element" placeholder="Label ( in French )"
                                                   data-lang="<?=LanguagePool::FRENCH()->getLabel()?>"
                                                   style="display: none;" disabled="disabled">

                                             <label class="btn btn-light download-element" style="display:none;" >
                                                File name
                                             </label>

                                            <input class="form-control file-label download-element" type="text"
                                                   data-lang="<?=LanguagePool::FRENCH()->getLabel()?>"
                                                   placeholder="File name ( in French )"
                                                   style="display: none;"
                                                   disabled="disabled">
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

                                            <label class="btn btn-light download-element" style="display:none;" >
                                                Display name
                                            </label>
                                            <input  class="form-control download-label download-element" placeholder="Label ( in English )"
                                                    data-lang="<?=LanguagePool::US_ENGLISH()->getLabel()?>"
                                                    style="display: none;" disabled="disabled">

                                            <label class="btn btn-light download-element" style="display:none;" >
                                                File name
                                             </label>
                                            <input class="form-control file-label download-element" type="text"
                                                   data-lang="<?=LanguagePool::US_ENGLISH()->getLabel()?>"
                                                   placeholder="File name ( in English (en-us) )"
                                                   style="display: none;"
                                                   disabled="disabled">
                                        </div>
                                    </div>
                                </div>
                            </div>
            `;
    }

    function setDownloadName()
    {
        return new Promise((resolve, reject)=>{

            const totalIterations = $('div.download-container').find('.download-label').length;
            let iterationCount = 0;

            $('div.download-container').each(function(index, element){

                const downloadFileName= `downloadable[${index}]`;
                const downloadFilePlaceholderName = `downloadable_placeholder[${index}]`;
                const downloadFilePlaceholderValue = index+1;
                $(this).find('input.download-file').attr('name',downloadFileName);
                const downloadSrcFieldName = `downloadable_src[${index}]`;
                $(this).find('.downloadable_src').attr('name', downloadSrcFieldName);

                const downloadPlaceholderField = $(this).find('input.download-placeholder');
                downloadPlaceholderField.attr('name',downloadFilePlaceholderName);
                downloadPlaceholderField.val(downloadFilePlaceholderValue);
                $(this).find('.download-label').each(function(){
                    iterationCount++
                    const lang = $(this).attr('data-lang');
                    const downloadLabelName = `downloadable[title][${index}][${lang}]`;
                    $(this).attr('name', downloadLabelName);

                    const downloadFileName = `downloadable[file_name][${index}][${lang}]`;
                    $(this).closest('.downloadable').find('.file-label').attr('name', downloadFileName);
                    if(iterationCount === totalIterations){
                        resolve(true);
                    }
                })
            });


        });

    }
</script>
