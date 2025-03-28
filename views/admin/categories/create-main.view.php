<?php
 use helpers\pools\LanguagePool;
 use model\Category;
?>
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Main Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
               <form action="<?= url('/admin/categories/main/store') ?>">
                   <div class="row img-block justify-content-between">
                       <div class="col input-group mb-3 w-50 ps-2 pe-0">
                           <span class="input-group-text" id="basic-addon3">Thumbnail image</span>
                           <input type="file" accept="image/png, image/gif, image/jpeg, image/jpg"
                                  name="icon" class="form-control img-load"
                                  id="thumbnail-img" aria-describedby="basic-addon3">
                       </div>
                       <div class="col ps-0">
                           <img src="#" class="img-thumbnail load-image d-none" width="60" height="60">
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-12 d-flex justify-content-between mt-3">
                           <label for="name_[<?=LanguagePool::GERMANY()->getLabel()?>]"
                                  class="align-items-center">Name (in Germany)</label>
                           <input
                                   name="name[<?=LanguagePool::GERMANY()->getLabel()?>]"
                                   type="text" class="form-control w-50 align-items-center"
                                   placeholder="Category name"
                                   id="name_[<?=LanguagePool::GERMANY()->getLabel()?>]"
                                   required
                                   min="5"
                                   max="30"
                           />
                       </div>
                       <div class="col-12 d-flex justify-content-between mt-3">
                           <label for="name_[<?=LanguagePool::ENGLISH()->getLabel()?>]">Name (in English)</label>
                           <input
                                   name="name[<?=LanguagePool::ENGLISH()->getLabel()?>]"
                                   type="text"
                                   class="form-control w-50"
                                   placeholder="Category name"
                                   id="name_[<?=LanguagePool::ENGLISH()->getLabel()?>]"
                                   required
                                   min="5"
                                   max="30"
                           />
                       </div>
                       <div class="col-12 d-flex justify-content-between mt-3">
                           <label for="name_[<?=LanguagePool::FRENCH()->getLabel()?>]">Name (in French)</label>
                           <input
                                   name="name[<?=LanguagePool::FRENCH()->getLabel()?>]"
                                   type="text" class="form-control w-50"
                                   placeholder="Category name"
                                   id="name_[<?=LanguagePool::FRENCH()->getLabel()?>]"
                                   required
                                   min="5"
                                   max="30"
                           />
                       </div>

                       <hr class="mt-3">

                       <div class="col-12 d-flex justify-content-between mt-3">
                           <label for="basic-url" class="form-label align-middle">Visibility</label>

                           <div class="d-flex w-50 justify-content-evenly">
                           <div class="form-check">
                               <input class="form-check-input" type="radio" name="visibility" value="<?= Category::PUBLISHED ?>"
                                      id="published-radio-btn">
                               <label class="form-check-label" for="published-radio-btn">
                                   Public
                               </label>
                           </div>
                           <div class="form-check">
                               <input class="form-check-input" type="radio" name="visibility" value="<?= Category::UNPUBLISHED ?>"
                                      id="unpublished-radio-btn" checked>
                               <label class="form-check-label" for="unpublished-radio-btn">
                                   Private
                               </label>
                           </div>
                           </div>

                       </div>

                       <hr class="mt-3">


                       <div class="d-flex justify-content-between mt-3 row">
                           <div class="col-8 img-block">
                               <div class="input-group mb-3">
                                   <span class="input-group-text" id="basic-addon3">Banner image</span>
                                   <input type="file" accept="image/png, image/gif, image/jpeg, image/jpg"
                                          name="banner" class="form-control img-load"
                                          id="banner-img" aria-describedby="basic-addon3">

                               </div>
                               <div>
                                   <img src="#" class="load-image d-none" height="250" width="750">
                               </div>
                           </div>
                       </div>
                   </div>
               </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="store-btn">Create</button>
            </div>
        </div>
    </div>
    <script>
        $(".img-load").off('change');
        $(".img-load").change(async function () {
            const fileInputTag = $(this);
            const image = await imageToBase64(fileInputTag);
            fileInputTag.closest("div.img-block").find("img.load-image").removeClass('d-none');
            fileInputTag.closest("div.img-block").find("img.load-image").attr('src', image);
            fileInputTag.closest("div.input-group").append(`<button type="button" class="btn btn-danger clear-img"><i class="bi bi-x-lg"></i></button>`);
            fileInputTag.addClass('d-none');
        });

        $(document).off("click",".clear-img");
        $(document).on("click",".clear-img",function () {
            $(this).closest("div.img-block").find("img.load-image").addClass('d-none');
            $(this).closest("div.img-block").find("input.img-load").removeClass('d-none');
            $(this).closest("div.img-block").find("input.img-load").val('');
            $(this).remove();
        })


        $('button#store-btn').off('click');
        $('button#store-btn').on('click', async function storeMainCategory(e){
            e.preventDefault();
            const btn = $(this);
            const btnLabel = btn.text();
            loadButton(btn, "saving");
            const form = btn.closest('div.modal-dialog').find('form');
            try{
                let response = await makePostFileRequest(form);
                toast.success(response.message);
                //raise an event to close the modal
                const event = new CustomEvent('storeMainCategorySuccessEvent', {
                    detail: { category: response.data }
                });
                document.dispatchEvent(event);
            }catch (err){
                toast.error(err);
            }finally {
                resetButton(btn, btnLabel);
            }
        });
    </script>
