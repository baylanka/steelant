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
