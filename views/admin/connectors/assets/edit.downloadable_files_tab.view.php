<?php
    use helpers\pools\LanguagePool;
?>
<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="w-100 d-flex justify-content-end my-5 add-file-container d-none"><button class="btn btn-sm btn-primary add-new-download-container">Add File Selector</button></div>

    <div class="download-jumbotron w-100 d-flex flex-wrap justify-content-center gap-3 my-5">
        <?php if (sizeof($connector->downloadableFiles) === 0): ?>
            <div class="download-container w-75 p-4">
                <div class="input-group w-100 mb-3 justify-content-center">

                    <label class="btn btn-light">
                        <i class="bi bi-folder2-open"></i>
                    </label>

                    <input type="file" class="form-control w-50 bg-light download-file" name="downloadable[0]">


                    <button type="button" class="btn btn-danger remove-download-container">
                        <i class="bi bi-dash"></i>
                    </button>
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
                <div class="input-group w-100 mb-0 justify-content-center">
                    <label class="btn btn-light">
                        <i class="bi bi-folder2-open"></i>
                    </label>

                    <input type="file" class="form-control w-50 bg-light download-file">
                    <input type="hidden"
                           value="<?= $content['file_asset_path'] ?>"
                           name="downloadable_src[<?=$index?>]">
                    <button type="button" class="btn btn-danger remove-download-container">
                        <i class="bi bi-dash"></i>
                    </button>
                    <button type="button" class="btn btn-primary add-new-download-container">
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

<script>
    $(document).off("change", ".download-label-visible");
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

    $(document).off("click", ".add-new-download-container");
    $(document).on("click", ".add-new-download-container", function (e) {
        e.preventDefault();
        const downloadableContent = getDownloadableFileContent();
        $("div.download-jumbotron").append(downloadableContent);
        setDownloadName();
        $('.add-file-container').addClass('d-none');
    });


    $(document).off("click", "button.remove-download-container")
    $(document).on("click", "button.remove-download-container", function () {
        $(this).closest("div.download-container").remove();

        const remainingContainers =  $('div.download-container').length;
        if(remainingContainers >= 1){
            setDownloadName();
        }else{
            $('.add-file-container').removeClass('d-none');
        }

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
                                    <button type="button" class="btn btn-danger remove-download-container">
                                      <i class="bi bi-dash"></i>
                                   </button>
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
</script>
