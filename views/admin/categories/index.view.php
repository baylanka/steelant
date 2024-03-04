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
                    <tr class="align-middle text-center <?= $rowColorClass ?>">
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
                                    <li><a class="dropdown-item edit-category" data-id="<?=$category->id?>" href="#">Edit</a></li>
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
<?php require_once basePath("views/admin/layout/middle_template.php") ?>
<?php require_once basePath("views/admin/layout/scripts.php"); ?>
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
                <tr class="align-middle text-center ${rowColorClass}">
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
                                    <li><a class="dropdown-item edit-category" data-id="${category.id}" href="#">Edit</a></li>
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

        $(document).on('click', 'a.edit-category', function(event){
            event.preventDefault();
            toast.warning("Feature is under the construction.");
        });


</script>
<?php require_once basePath("views/admin/layout/lower_template.php"); ?>

