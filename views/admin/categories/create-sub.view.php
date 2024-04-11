<?php
    use helpers\pools\LanguagePool;
    use model\Category;
    use helpers\services\CategoryService;
?>
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Sub Category</h1>
                &nbsp;
                &nbsp;
                <small class="text-small">
                    <b>
                        (of
                        <?php $i=0; ?>
                        <?php foreach ($categoryTree as $category): ?>
                            <span class="text-primary"> <?= $category->getNameByLang(LanguagePool::ENGLISH()->getLabel()) ?></span>
                            <?= $i != (sizeof($categoryTree)-1) ? "  >>  " : '' ?>
                            <?php $i++; ?>
                        <?php endforeach;?>
                        )
                    </b>
                </small>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
               <form action="<?= url('/admin/categories/sub/store') ?>"  id="sub-category-store-frm">
                   <input type="hidden" name="parent_id" value="<?=$parent_id?>"/>
                   <div class="row">
                       <div class="col-12 d-flex justify-content-between mt-3">
                           <label for="name_de" class="align-items-center">Name (in Germany)</label>
                           <input name="name[de]" type="text" class="form-control w-75 align-items-center" placeholder="Category name" id="name_de"/>
                       </div>
                       <div class="col-12 d-flex justify-content-between mt-3">
                           <label>Name (in English)</label>
                           <input name="name[en]" type="text" class="form-control w-75" placeholder="Category name"/>
                       </div>
                       <div class="col-12 d-flex justify-content-between mt-3">
                           <label>Name (in French)</label>
                           <input name="name[fr]" type="text" class="form-control w-75" placeholder="Category name"/>
                       </div>

                       <hr class="mt-3">
                       <?php
                            $directParent = $categoryTree[sizeof($categoryTree)-1];
                            $isLeafCategoryPublishable = CategoryService::isLeafCategoryPublishable($categoryTree);
                       ?>
                       <div class="col-12 d-flex justify-content-between mt-3">
                           <label for="published_radio_btn" class="form-label align-middle">Visibility</label>

                           <div class="d-flex w-50 justify-content-evenly">
                           <div class="form-check">
                               <input class="form-check-input" type="radio" name="visibility" value="<?= Category::PUBLISHED ?>"
                                      id="published_radio_btn" <?= $isLeafCategoryPublishable ? 'checked' : 'disabled' ?>
                               >
                               <label class="form-check-label" for="published_radio_btn">
                                   Public
                               </label>
                           </div>
                           <div class="form-check">
                               <input class="form-check-input" type="radio" name="visibility" value="<?= Category::UNPUBLISHED ?>"
                                      id="unpublished_radio_btn"
                                         <?= !$isLeafCategoryPublishable ? 'checked' : '' ?>
                                      >
                               <label class="form-check-label" for="unpublished_radio_btn">
                                   Private
                               </label>
                           </div>
                           </div>

                       </div>
                       <?php if(!$isLeafCategoryPublishable): ?>
                            <small class="text-danger" style="width: 50%; font-size:0.7rem;">
                                Parent category is unpublished. For the moment you can only create a sub category,
                                but it can not be published.
                            </small>
                       <?php endif; ?>

                       <hr class="mt-3">

                       <div class="col-12 d-flex justify-content-between mt-3 title-container">
                           <label for="title_enable_btn" class="form-label align-middle">Title</label>

                           <div class="d-flex w-50 justify-content-evenly">
                               <div class="form-check">
                                   <input class="form-check-input" name="title_switch" type="radio" value="enable"
                                          id="title_enable_btn">
                                   <label class="form-check-label" for="title_enable_btn">
                                       Enable
                                   </label>
                               </div>
                               <div class="form-check">
                                   <input class="form-check-input" name="title_switch" type="radio" value="disable"
                                          id="title_disable_btn" checked>
                                   <label class="form-check-label" for="title_disable_btn">
                                       Disable
                                   </label>
                               </div>
                           </div>

                       </div>
                       <small class="text-danger sub-cat-title-desc" style="width: 50%; font-size:0.7rem;">Enable Title: If this is your final category. Otherwise, the front page of this category will be without a title.</small>


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
        $('button#store-btn').off('click');
        $('button#store-btn').on('click', async function storeSubCategory(e){
            e.preventDefault();
            const btn = $(this);
            const btnLabel = btn.text();
            loadButton(btn, "saving ...");
            const form = btn.closest('div.modal-dialog').find('form');
            try{
                let response = await makePostFileRequest(form);
                toast.success(response.message);
                console.log(response.data);
                //raise an event to close the modal
                const event = new CustomEvent('storeSubCategorySuccessEvent', {
                    detail: { category: response.data }
                });
                document.dispatchEvent(event);
            }catch (err){
                toast.error(err);
            }finally {
                resetButton(btn, btnLabel);
            }
        });


        $(document).off("change","[name=title_switch]");
        $(document).on("change","[name=title_switch]",function (){
            const subCategoryTitleDescription = $('.sub-cat-title-desc');
            if($(this).val() === "enable"){
                subCategoryTitleDescription.after(getTitleFields())
                subCategoryTitleDescription.removeClass("text-danger");
                subCategoryTitleDescription.addClass("text-primary");
            }else{
                $('.sub-cat-title-inp').remove();
                subCategoryTitleDescription.addClass("text-danger");
                subCategoryTitleDescription.removeClass("text-primary");
            }

        })


        function getTitleFields()
        {
            return `
                      <div class="col-12 d-flex justify-content-between mt-3 sub-cat-title-inp">
                           <label for="title_<?= LanguagePool::GERMANY()->getLabel()?>"
                                  class="align-items-center">Title (in Germany)</label>
                           <input name="title[<?= LanguagePool::GERMANY()->getLabel()?>]"
                                  type="text" class="form-control w-75 align-items-center"
                                  placeholder="Title (in Germany)"
                                  id="title_<?= LanguagePool::GERMANY()->getLabel()?>"
                                  value="<?= $directParent->getTitleDe()?>"
                           />
                       </div>
                       <div class="col-12 d-flex justify-content-between mt-3 sub-cat-title-inp">
                           <label for="title_<?= LanguagePool::ENGLISH()->getLabel()?>">Title (in English)</label>
                           <input name="title[<?= LanguagePool::ENGLISH()->getLabel()?>]"
                                  type="text" class="form-control w-75"
                                  id="title_<?= LanguagePool::ENGLISH()->getLabel()?>"
                                  placeholder="Title (in English)"
                                  value="<?= $directParent->getTitleEn()?>"
                           />
                       </div>
                       <div class="col-12 d-flex justify-content-between mt-3 sub-cat-title-inp">
                           <label for="title_<?= LanguagePool::FRENCH()->getLabel()?>">Title (in French)</label>
                           <input name="title[<?= LanguagePool::FRENCH()->getLabel()?>]"
                                  type="text" class="form-control w-75"
                                  id="title_<?=LanguagePool::FRENCH()->getLabel()?>"
                                  placeholder="Title (in French)"
                                  value="<?= $directParent->getTitleFr()?>"
                           />
                       </div>

            `;
        }
    </script>
