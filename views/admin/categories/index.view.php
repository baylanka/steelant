<?php

use helpers\translate\Translate;
use helpers\pools\LanguagePool;

?>
<?php require_once basePath("views/admin/layout/upper_template.php") ?>
<!--Place Your Content Here-->
<div class="row">
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title"></h3>
            <div class="float-end">
                <button id="add-main-category" class="btn btn-sm btn-primary">Add Main Category</button>
            </div>
        </div> <!-- /.card-header -->
        <div class="card-body p-3">
            <table class="table table-borderless" id="categories-tbl">
                <thead>
                <tr class="text-center">
                    <th>Thumbnail</th>
                    <th>German</th>
                    <th>English</th>
                    <th>French</th>
                    <th>Status</th>
                    <th style="width: 40px"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($categories as $category): ?>
                    <?php
                    $rowColors = [
                        'table-success',
                        'table-primary',
                        'table-warning',
                        'table-info',
                        'table-light',
                        'table-secondary',
                        'table-danger',
                    ];
                    $rowColorClass = $rowColors[($category->level - 1)] ?? $rowColors[(sizeof($rowColors) - 1)];
                    ?>
                    <tr
                            class="align-middle text-center <?= $rowColorClass ?>"
                            data-id="<?= $category->id ?>"
                            data-parentid="<?=$category->parent_category_id?>"
                    >
                        <td>
                            <?php if($category->level === 1): ?>
                                <img class="img-thumbnail"
                                     src="<?= $category->getThumbnailUrl() ?>"
                                     alt="<?= $category->getThumbnailImageName() ?>"
                                     title="<?= $category->getThumbnailImageName() ?>"
                                     width="60"/>
                            <?php endif; ?>
                        </td>
                        <td><?= $category->getNameByLang(LanguagePool::GERMANY()->getLabel()) ?></td>
                        <td><?= $category->getNameByLang(LanguagePool::ENGLISH()->getLabel()) ?></td>
                        <td><?= $category->getNameByLang(LanguagePool::FRENCH()->getLabel()) ?></td>
                        <td>
                            <?=
                                    $category->isPublished()
                                        ? '<span class="badge text-bg-success">published</span>'
                                        : '<span class="badge text-bg-warning">non-published</span>';
                            ?>
                        </td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item add-sub-category" data-id="<?=$category->id?>" href="#">Add sub category</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item update-category" data-id="<?=$category->id?>" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item delete-category" data-id="<?=$category->id?>" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div> <!-- /.card-body -->
    </div>
</div>
<div class="modal fade" id="category-modal" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
</div>





<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form action="#"  id="sub-category-store-frm">
                    <input type="hidden" name="parent_id" value=""/>
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

                        <div class="col-12 d-flex justify-content-between mt-3">
                            <label for="published_radio_btn" class="form-label align-middle">Visibility</label>

                            <div class="d-flex w-50 justify-content-evenly">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="visibility" value=""
                                           id="published_radio_btn"
                                    >
                                    <label class="form-check-label" for="published_radio_btn">
                                        Public
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="visibility" value=""
                                           id="unpublished_radio_btn">
                                    <label class="form-check-label" for="unpublished_radio_btn">
                                        Private
                                    </label>
                                </div>
                            </div>

                        </div>


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

                        <div class="col-12 d-flex justify-content-between mt-3 sub-cat-title-inp">
                            <label for="title_de"
                                   class="align-items-center">Title (in Germany)</label>
                            <input name="title[de]"
                                   type="text" class="form-control w-75 align-items-center"
                                   placeholder="Title (in Germany)"
                                   id="title_de"
                                   value=""
                            />
                        </div>
                        <div class="col-12 d-flex justify-content-between mt-3 sub-cat-title-inp">
                            <label for="title_en">Title (in English)</label>
                            <input name="title[en]"
                                   type="text" class="form-control w-75"
                                   id="title_en"
                                   placeholder="Title (in English)"
                                   value=""
                            />
                        </div>
                        <div class="col-12 d-flex justify-content-between mt-3 sub-cat-title-inp">
                            <label for="title_fr">Title (in French)</label>
                            <input name="title[fr]"
                                   type="text" class="form-control w-75"
                                   id="title_fr"
                                   placeholder="Title (in French)"
                                   value=""
                            />
                        </div>

                        <hr class="mt-3">


                        <div class="col-12 d-flex justify-content-between mt-3 row">

                            <div class="col-6 img-block">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon3">Thumbnail image</span>
                                    <input type="file" accept="image/png, image/gif, image/jpeg, image/jpg"
                                           name="icon" class="form-control img-load" id="basic-url" aria-describedby="basic-addon3">
                                </div>
                                <img src="#" class="load-image d-none" width="100" height="100">
                            </div>

                            <div class="col-6 img-block">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon3">Banner image</span>
                                    <input type="file" accept="image/png, image/gif, image/jpeg, image/jpg" name="banner" class="form-control img-load" id="basic-url" aria-describedby="basic-addon3">
                                </div>
                                <img src="#" class="load-image d-none" width="250" height="100">
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
</div>




<?php require_once basePath("views/admin/layout/middle_template.php") ?>
<?php require_once basePath("views/admin/layout/scripts.php"); ?>


<script>
    $(".img-load").change(function () {
        const fileInputTag = $(this);
        if (this.files && this.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                fileInputTag.closest("div.img-block").find("img.load-image").removeClass('d-none');
                fileInputTag.closest("div.img-block").find("img.load-image").attr('src', e.target.result);
                fileInputTag.closest("div.input-group").append(`<button type="button" class="btn btn-danger clear-img"><i class="bi bi-x-lg"></i></button>`);
                fileInputTag.addClass('d-none');
            }
            reader.readAsDataURL(this.files[0]);
        }
    });


    $(document).on("click",".clear-img",function () {
        $(this).closest("div.img-block").find("img.load-image").addClass('d-none');
        $(this).closest("div.img-block").find("input.img-load").removeClass('d-none');
        $(this).closest("div.img-block").find("input.img-load").val('');
        $(this).remove();
    })

</script>

<script>
    function getCategoryRow(category, avoid_icon=false)
    {
        const rowColors = [
            'table-success',
            'table-primary',
            'table-warning',
            'table-info',
            'table-light',
            'table-secondary',
            'table-danger',
        ];
        const rowColorClass = rowColors[(category.level - 1)] ?? rowColors[(rowColors.length - 1)];
        const icon = avoid_icon ? "" : `
                                <img class="img-thumbnail"
                                 src="${category.icon_url}"
                                 alt="${category.icon_name}"
                                 title="${category.icon_name}"
                                 width="60"/>
        `;
        return `
                <tr
                    class="align-middle text-center ${rowColorClass}"
                    data-id="${category.id}"
                    data-parentid="${category.parent_category_id}"
                >
                        <td>
                            ${icon}
                        </td>
                        <td>${category.name_de}</td>
                        <td>${category.name_en}</td>
                        <td>${category.name_fr}</td>
                        <td>
                             ${category.is_published === true
                                    ? '<span class="badge text-bg-success">published</span>'
                                    : '<span class="badge text-bg-warning">non-published</span>'
                              }
                        </td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item add-sub-category" data-id="${category.id}" href="#">Add sub category</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item delete-category" data-id="${category.id}" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>

        `;
    }
        const modalId = 'category-modal';
        $('button#add-main-category').click(async function (event) {
            let path = "admin/categories/main/store";
            let modal;
            const btn = $(this);
            const loadingBtnText = btn.text();
            try{
                loadButton(btn, "loading ...");
                modal = await loadModal(modalId, path);
                resetButton(btn, loadingBtnText);
                $(document).off('storeMainCategorySuccessEvent');
                $(document).on('storeMainCategorySuccessEvent', function(event) {
                    modal.hide();
                    const category = event.originalEvent.detail.category;
                    const categoryRowElement = getCategoryRow(category);
                    $('table#categories-tbl tbody').prepend(categoryRowElement);
                });
            }catch(err){
                toast.error("add main category function is broken down. " + err);
            }
        });


        $(document).on('click', 'a.add-sub-category',async function(event){
            event.preventDefault();
            const trTag = $(this).closest('tr');
            const path = "admin/categories/sub/store?parent_id=" + $(this).attr("data-id");
            let modal;
            try{
                modal = await loadModal(modalId, path);
                $(document).off('storeSubCategorySuccessEvent');
                $(document).on('storeSubCategorySuccessEvent', function(event) {
                    const category = event.originalEvent.detail.category;
                    const categoryRowElement = getCategoryRow(category, true);
                    trTag.after(categoryRowElement);
                    modal.hide();
                });

            }catch(err){
                toast.error("add sub category functional is broken down. " + err);
            }

        });

        $(document).on('click', 'a.delete-category', async function(event){
            event.preventDefault();
            const notice = `
                <p class="text-danger"><b>If you proceed with deleting the category:<b><p>
                <ol class="text-start text-primary">
                    <li>It cannot be undone.</li>
                    <li>Subcategories will be deleted if they exist.</li>
                    <li>All connectors and add-on contents of this category or its subcategories will also be deleted if they exist.</li>
                </ol>
            `;
            if(!await isConfirmToProcess(notice, 'warning')){
                return;
            }

            const categoryId = $(this).attr('data-id');
            const data = {};
            const path = `${getBaseUrl()}/admin/categories/sub/destroy?id=${categoryId}`;
            try {
                const response = await makeAjaxCall(path, data, 'DELETE');
                removeCategories(categoryId);
                toast.success(response.message);
            }catch(err){
                toast.error(err);
            }
        });

    function removeCategories(categoryId)
    {
        const categoryRow = $(`tr[data-id="${categoryId}"]`);
        if(categoryRow.length > 0){
            categoryRow.remove();
        }


        const children = $(`tr[data-parentid="${categoryId}"]`);
        if(children.length === 0){
            return;
        }
        children.each(function(){
            const childCategoryId = $(this).attr('data-id');
            removeCategories(childCategoryId);
            $(this).remove();
        });

    }
</script>
<?php require_once basePath("views/admin/layout/lower_template.php"); ?>

