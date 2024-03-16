<?php require_once basePath("views/admin/layout/upper_template.php") ?>
<!--Place Your Content Here-->
<div class="row">
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title"></h3>
            <div class="float-end">
                <button id="add-template" class="btn btn-sm btn-primary">Upload new Template</button>
            </div>
        </div> <!-- /.card-header -->
        <div class="card-body p-3">
            <table class="table table-borderless" id="template-tbl">
                <thead>
                <tr class="text-center">
                    <th  style="width: 2%">#</th>
                    <th   style="width: 15%">Thumbnail</th>
                    <th>type</th>
                    <th style="width: 15%" >Actions</th>
                </tr>
                </thead>
                <tbody class="text-center">
                <?php if(empty(sizeof($templates))): ?>
                    <tr>
                        <td colspan="4">
                            <div class="alert alert-warning" role="alert">
                                Templates are not found.
                            </div>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($templates as $index => $template): ?>
                        <tr
                                class="align-middle text-center template-row"
                                data-id="<?= $template->id ?>"
                        >
                            <td>
                                <?=($index+1)?>
                            </td>
                            <td>
                                <img class="img-thumbnail"
                                     src="<?= $template->getThumbnailUrl() ?>"
                                     alt="<?= $template->getThumbnailImageName() ?>"
                                     title="<?= $template->getThumbnailImageName() ?>"
                                     width="250"/>
                            </td>
                            <td style="width: 2%">
                                <span class="badge text-bg-info"><?=$template->getTypeDescription()?></span>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item edit-category" data-id="<?=$template->id?>" href="#">Edit</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item delete-category" data-id="<?=$template->id?>" href="#">Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div> <!-- /.card-body -->
    </div>
</div>
<div class="modal fade" id="template-modal" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
</div>
<?php require_once basePath("views/admin/layout/middle_template.php") ?>
<?php require_once basePath("views/admin/layout/scripts.php"); ?>
<script>
    function getTemplateRow(template) {
        let existingRowCount = $('#template-tbl tbody tr.template-row').length;
        return `
                <tr
                    class="align-middle text-center"
                    data-id="${template.id}"
                >
                        <td>${existingRowCount+1}</td>
                        <td>
                            <img class="img-thumbnail"
                                 src="${template.thumbnail_url}"
                                 alt="${template.thumbnail_name}"
                                 title="${template.thumbnail_name}"
                                 width="250"/>
                        </td>
                        <td>
                            <span class="badge text-bg-info">${template.type}</span>
                        </td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item add-sub-category" data-id="${template.id}" href="#">Add sub category</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item edit-category" data-id="${template.id}" href="#">Edit</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item delete-category" data-id="${template.id}" href="#">Delete</a></li>

                                </ul>
                            </div>
                        </td>
                    </tr>

        `;
    }

    const modalId = 'template-modal';
    $('button#add-template').click(async function (event) {
        let path = "admin/templates/create";
        let modal;
        const btn = $(this);
        const loadingBtnText = btn.text();
        try {
            loadButton(btn, "loading ...");
            modal = await loadModal(modalId, path);
            resetButton(btn, loadingBtnText);
            $(document).off('storedTemplateEvent');
            $(document).on('storedTemplateEvent', function (event) {
                modal.hide();
                const template = event.originalEvent.detail.template;
                const templateRowElement = getTemplateRow(template);
                $('table#template-tbl tbody').append(templateRowElement);
            });
        } catch (err) {
            toast.error("add template function is broken down. " + err);
        }
    });


    $(document).on('click', 'a.add-sub-category', async function (event) {
        event.preventDefault();
        const trTag = $(this).closest('tr');
        const categoryId = $(this).attr("data-id");
        const path = `admin/categories/sub/store?parent_id=${categoryId}`;
        let modal;
        try {
            modal = await loadModal(modalId, path);
            $(document).off('storeSubCategorySuccessEvent');
            $(document).on('storeSubCategorySuccessEvent', function (event) {
                const category = event.originalEvent.detail.category;
                const categoryRowElement = getTemplateRow(category);
                trTag.after(categoryRowElement);
                modal.hide();
            });

        } catch (err) {
            toast.error("add sub category functionality is broken down. " + err);
        }

    });

    $(document).on('click', 'a.delete-category', async function (event) {
        event.preventDefault();
        const notice = `
                <p class="text-danger"><b>If you proceed with deleting the category:<b><p>
                <ol class="text-start text-primary">
                    <li>It cannot be undone.</li>
                    <li>Subcategories will be deleted if they exist.</li>
                    <li>All connectors and add-on contents of this category or its subcategories will also be deleted if they exist.</li>
                </ol>
            `;
        if (!await isConfirmToProcess(notice, 'warning')) {
            return;
        }

        const categoryId = $(this).attr('data-id');
        const data = {};
        const path = `${getBaseUrl()}/admin/categories/sub/destroy?id=${categoryId}`;
        try {
            const response = await makeAjaxCall(path, data, 'DELETE');
            removeCategories(categoryId);
            toast.success(response.message);
        } catch (err) {
            toast.error(err);
        }
    });

    $(document).on('click', '.edit-category', async function(e){
        e.preventDefault();
        const categoryId =  $(this).attr("data-id");
        const path = `admin/categories/edit?id=${categoryId}`;
        const trTag = $(this).closest('tr');
        let modal;
        try {
            modal = await loadModal(modalId, path);
            $(document).off('updateCategorySuccessEvent');
            $(document).on('updateCategorySuccessEvent', function (event) {
                modal.hide();
                const category = event.originalEvent.detail.category;
                const categoryRowElement = getTemplateRow(category, true);
                const trTagParent = trTag.prev();
                if(trTagParent.length === 0){
                    const tbody = trTag.closest('tbody');
                    trTag.remove();
                    tbody.prepend(categoryRowElement);
                    return

                }

                trTag.remove();
                trTagParent.after(categoryRowElement);

            });

        } catch (err) {
            toast.error("edit category functionality is broken down. ");
        }

    });

    function removeCategories(categoryId) {
        const categoryRow = $(`tr[data-id="${categoryId}"]`);
        if (categoryRow.length > 0) {
            categoryRow.remove();
        }


        const children = $(`tr[data-parentid="${categoryId}"]`);
        if (children.length === 0) {
            return;
        }
        children.each(function () {
            const childCategoryId = $(this).attr('data-id');
            removeCategories(childCategoryId);
            $(this).remove();
        });

    }
</script>
<?php require_once basePath("views/admin/layout/lower_template.php"); ?>

