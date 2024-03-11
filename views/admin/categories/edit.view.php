<?php
 use helpers\pools\LanguagePool;
 use model\Category;
?>
<div class="modal-dialog modal-lg" >
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Category</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
            <form action="<?= url('/admin/categories/update') ?>"  id="sub-category-store-frm">
                <input type="hidden" name="id" value="<?= $category->id ?>"/>
                <?php if($category->level == 1): ?>
                     <div class="row img-block justify-content-between">
                        <div class="col input-group mb-3 w-50 ps-2 pe-0">
                            <span class="input-group-text" id="basic-addon3">Thumbnail image</span>
                            <input type="file" accept="image/png, image/gif, image/jpeg, image/jpg"
                                   name="icon"
                                   class="form-control img-load <?= $category->thumbnailExists() ? 'd-none' : '' ?>"
                                   id="thumbnail-img" aria-describedby="basic-addon3">

                            <?php if($category->thumbnailExists()): ?>
                                <button type="button" class="btn btn-danger clear-img"><i class="bi bi-x-lg"></i></button>
                            <?php endif; ?>
                        </div>
                        <div class="col ps-0">
                            <img src="<?= $category->getThumbnailUrl()?>"
                                 class="img-thumbnail load-image  <?= $category->thumbnailExists() ? '' : 'd-none' ?>"
                                 width="60" height="60">
                            <input type="hidden" name="thumbnail_image_tracker" class="image_tracker"
                                   value="previous_state"/>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-12 d-flex justify-content-between mt-3">
                        <label for="name_de" class="align-items-center">Name (in Germany)</label>
                        <input name="name[de]" type="text" class="form-control w-50 align-items-center"
                               placeholder="Category name" id="name_de"
                               value="<?=$category->getNameDe()?>"/>
                    </div>
                    <div class="col-12 d-flex justify-content-between mt-3">
                        <label for="name_en">Name (in English)</label>
                        <input name="name[en]" type="text" class="form-control w-50"
                               placeholder="Category name" id="name_en"
                               value="<?=$category->getNameEn()?>"/>
                    </div>
                    <div class="col-12 d-flex justify-content-between mt-3">
                        <label for="name_fr">Name (in French)</label>
                        <input name="name[fr]" type="text" class="form-control w-50"
                               placeholder="Category name"  id="name_fr"
                               value="<?=$category->getNameFr()?>"/>
                    </div>

                    <hr class="mt-3">

                    <div class="col-12 d-flex justify-content-between mt-3">
                        <label for="published_radio_btn" class="form-label align-middle">Visibility</label>

                        <div class="d-flex w-50 justify-content-evenly">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="visibility"
                                       value="<?= Category::PUBLISHED?>"
                                       id="published_radio_btn"
                                       <?= $category->isPublished() ? 'checked':''?>
                                >
                                <label class="form-check-label" for="published_radio_btn">
                                    Public
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="visibility"
                                       value="<?=Category::UNPUBLISHED?>"
                                       id="unpublished_radio_btn"
                                        <?= $category->isPublished() ? '':'checked'?>
                                >
                                <label class="form-check-label" for="unpublished_radio_btn">
                                    Private
                                </label>
                            </div>
                        </div>

                    </div>
                    <?php if($category->level !== 1 && !$category->isParent()): ?>
                        <hr class="mt-3">
                        <div class="col-12 d-flex justify-content-between mt-3 title-container">
                            <label for="title_enable_btn" class="form-label align-middle">Title</label>

                            <div class="d-flex w-50 justify-content-evenly">
                                <div class="form-check">
                                    <input class="form-check-input" name="title_switch" type="radio" value="enable"
                                           id="title_enable_btn" <?= $category->titleExists() ? 'checked' :'' ?>>
                                    <label class="form-check-label" for="title_enable_btn">
                                        Enable
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="title_switch" type="radio" value="disable"
                                           id="title_disable_btn" <?= $category->titleExists() ? '' :'checked' ?>>
                                    <label class="form-check-label" for="title_disable_btn">
                                        Disable
                                    </label>
                                </div>
                            </div>

                        </div>
                        <small class="<?= $category->titleExists() ? 'text-primary' :'text-danger' ?>  sub-cat-title-desc" style="width: 50%; font-size:0.7rem;">Enable Title: If this is your final category. Otherwise, the front page of this category will be without a title.</small>
                        <?php if($category->titleExists()): ?>
                            <div class="col-12 d-flex justify-content-between mt-3 sub-cat-title-inp">
                                <label for="title_de"
                                       class="align-items-center">Title (in Germany)</label>
                                <input name="title[de]"
                                       type="text" class="form-control w-75 align-items-center"
                                       placeholder="Title (in Germany)"
                                       id="title_de"
                                       value="<?=$category->getTitleDe()?>"
                                />
                            </div>
                            <div class="col-12 d-flex justify-content-between mt-3 sub-cat-title-inp">
                                <label for="title_en">Title (in English)</label>
                                <input name="title[en]"
                                       type="text" class="form-control w-75"
                                       id="title_en"
                                       placeholder="Title (in English)"
                                       value="<?=$category->getTitleEn()?>"
                                />
                            </div>
                            <div class="col-12 d-flex justify-content-between mt-3 sub-cat-title-inp">
                                <label for="title_fr">Title (in French)</label>
                                <input name="title[fr]"
                                       type="text" class="form-control w-75"
                                       id="title_fr"
                                       placeholder="Title (in French)"
                                       value="<?=$category->getTitleFr()?>"
                                />
                            </div>
                         <?php endif; ?>
                    <?php endif; ?>
                    <?php if($category->level === 1): ?>
                        <hr class="mt-3">
                        <div class="d-flex justify-content-between mt-3 row">
                        <div class="col-8 img-block">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">Banner image</span>
                                <input type="file" accept="image/png, image/gif, image/jpeg, image/jpg"
                                       name="banner"
                                       class="form-control img-load  <?= $category->bannerExists() ? 'd-none' : '' ?>"
                                       id="banner-img" aria-describedby="basic-addon3">
                                <?php if($category->bannerExists()): ?>
                                    <button type="button" class="btn btn-danger clear-img"><i class="bi bi-x-lg"></i></button>
                                <?php endif; ?>

                            </div>
                            <div>
                                <img src="<?= $category->getBannerUrl()?>"
                                     class="load-image <?= $category->bannerExists() ? '' : 'd-none' ?>"
                                     height="250" width="750">
                                <input type="hidden" name="banner_image_tracker" class="image_tracker"
                                       value="previous_state"/>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </form>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="update-btn">Update</button>
        </div>
    </div>
</div>
<script>
    $('button#update-btn').off('click');
    $('button#update-btn').on('click', async function updateCategory(e){
        e.preventDefault();
        const btn = $(this);
        const btnLabel = btn.text();
        loadButton(btn, "updating ...");
        const form = btn.closest('div.modal-dialog').find('form');
        try{
            let response = await makePostFileRequest(form);
            toast.success(response.message);
            //raise an event to close the modal
            const event = new CustomEvent('updateCategorySuccessEvent', {
                detail: { category: response.data }
            });
            document.dispatchEvent(event);
        }catch (err){
            toast.error(err);
        }finally {
            resetButton(btn, btnLabel);
        }
    });


    $(".img-load").off('change');
    $(".img-load").change(async function () {
        const fileInputTag = $(this);
        const imgContainer = fileInputTag.closest("div.img-block");
        const image = await imageToBase64(fileInputTag);
        imgContainer.find("img.load-image").removeClass('d-none');
        imgContainer.find("img.load-image").attr('src', image);
        fileInputTag.closest("div.input-group").append(`<button type="button" class="btn btn-danger clear-img"><i class="bi bi-x-lg"></i></button>`);
        fileInputTag.addClass('d-none');
        imgContainer.find('.image_tracker').val('changed');
    });

    $(document).off("click", ".clear-img");
    $(document).on("click",".clear-img",function () {
        const imgContainer = $(this).closest("div.img-block");
        imgContainer.find("img.load-image").addClass('d-none');
        imgContainer.find("input.img-load").removeClass('d-none');
        imgContainer.find("input.img-load").val('');
        imgContainer.find('.image_tracker').val('deleted');
        $(this).remove();
    })

    $(document).off("change","[name=title_switch]");
    $(document).on("change","[name=title_switch]",function (){
        const subCategoryTitleDescription = $('.sub-cat-title-desc');
        if($(this).val() === "enable"){
            subCategoryTitleDescription.after(getEditTitleFields())
            subCategoryTitleDescription.removeClass("text-danger");
            subCategoryTitleDescription.addClass("text-primary");
        }else{
            $('.sub-cat-title-inp').remove();
            subCategoryTitleDescription.addClass("text-danger");
            subCategoryTitleDescription.removeClass("text-primary");
        }

    })

    function getEditTitleFields()
    {
        return `
                      <div class="col-12 d-flex justify-content-between mt-3 sub-cat-title-inp">
                           <label for="title_<?= LanguagePool::GERMANY()->getLabel()?>"
                                  class="align-items-center">Title (in Germany)</label>
                           <input name="title[<?= LanguagePool::GERMANY()->getLabel()?>]"
                                  type="text" class="form-control w-75 align-items-center"
                                  placeholder="Title (in Germany)"
                                  id="title_<?= LanguagePool::GERMANY()->getLabel()?>"
                                  value="<?=$category->getTitleDe()?>"
                           />
                       </div>
                       <div class="col-12 d-flex justify-content-between mt-3 sub-cat-title-inp">
                           <label for="title_<?= LanguagePool::ENGLISH()->getLabel()?>">Title (in English)</label>
                           <input name="title[<?= LanguagePool::ENGLISH()->getLabel()?>]"
                                  type="text" class="form-control w-75"
                                  id="title_<?= LanguagePool::ENGLISH()->getLabel()?>"
                                  placeholder="Title (in English)"
                                  value="<?=$category->getTitleEn()?>"
                           />
                       </div>
                       <div class="col-12 d-flex justify-content-between mt-3 sub-cat-title-inp">
                           <label for="title_<?= LanguagePool::FRENCH()->getLabel()?>">Title (in French)</label>
                           <input name="title[<?= LanguagePool::FRENCH()->getLabel()?>]"
                                  type="text" class="form-control w-75"
                                  id="title_<?= LanguagePool::FRENCH()->getLabel()?>"
                                  placeholder="Title (in French)"
                                  value="<?=$category->getTitleFr()?>"
                           />
                       </div>

            `;
    }
</script>