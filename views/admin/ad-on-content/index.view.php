<?php

?>
<?php require_once basePath("views/admin/layout/upper_template.php") ?>
<!--Place Your Content Here-->

<div class="row">
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title"></h3>
            <div class="float-end">
                <button class="btn btn-sm btn-primary background-blue" type="button" id="create-ad-on">Create Add-on
                </button>
            </div>
        </div>
        <div class="card-body p-3">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="text-left">Category</th>
                    <th class="text-left">Title</th>
                    <th class="text-center">status</th>
                    <th style="width: 40px"></th>
                </tr>
                </thead>
                <tbody id="addOnTblBody">
                    <?php foreach ($adOnContents as $adOnContent):?>
                        <tr class="align-middle">
                            <td class="text-left"><small><?=$adOnContent->categoryTree?></small></td>
                            <td class="text-left"><?=$adOnContent->title?></td>
                            <td class="text-center">
                                <span class="badge <?=$adOnContent->isPublished ? 'text-bg-success' : 'text-bg-warning'?>">
                                    <?=$adOnContent->isPublished ?'published' : 'non-published' ?>
                                </span>
                            </td>
                            <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item view-adOnContent" href="#"
                                           data-id="<?=$adOnContent->id?>">
                                            View <i class="bi bi-exclamation-circle float-end"></i></a>
                                    </li>

                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>

                                    <li>
                                        <a class="dropdown-item edit-adOnContent" type="button" data-bs-toggle="modal"
                                           data-id="<?=$adOnContent->id?>">
                                                Edit <i class="bi bi-pencil float-end"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>

                                    <li>
                                        <a class="dropdown-item delete-addOnContent" href="#"
                                           data-id="<?=$adOnContent->id?>">
                                                Delete <i class="bi bi-trash3 float-end"></i>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>
    </div>
</div>


<div class="modal fade" id="addOn" tabindex="-1" aria-labelledby="createAddOn" aria-hidden="true">

</div>


<?php require_once basePath("views/admin/layout/middle_template.php") ?>
<?php require_once basePath("views/admin/layout/scripts.php"); ?>
<script src="https://cdn.tiny.cloud/1/39y77bbnodzcw45bboz4dzbi7c07mh4pr5nvitr1hhfj3tm8/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>

<script>
    modalId = "addOn";
    document.addEventListener('focusin', (e) => {
        if (e.target.closest(".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
            e.stopImmediatePropagation();
        }
    });

    $(document).on("click", "#create-ad-on", async function () {
        const language = $('img.selected-flag').closest('a').attr('data-lang');
        let path = `admin/add-on/create?tableLang=${language}`;
        const btn = $(this);
        const loadingBtnText = btn.text();
        try {
            spinnerEnabled();
            loadButton(btn, "loading ...");
            const modal = await loadModal(modalId, path);

            $(document).off('storeAddOnSuccessEvent');
            $(document).on('storeAddOnSuccessEvent', async function (event) {
                modal.hide();
                const addOnContent = event.originalEvent.detail.addon;
                const row = getRow(addOnContent);
                $('tbody#addOnTblBody').append(row);
            });
        } catch (err) {
            toast.error("An error occurred while attempting to open the create add on.. " + err);
        }finally {
            spinnerDisable();
            resetButton(btn, loadingBtnText);
        }
    });

    $(document).on("click", ".view-adOnContent", async function (e) {
        e.preventDefault();
        const adOnId = $(this).attr('data-id');
        let path = `admin/add-on-content/templates?id=${adOnId}`;
        try {
            await loadModal(modalId, path);

        } catch (err) {
            toast.error("An error occurred while attempting to open the view add-on content.. " + err);
        }
    });

    $(document).on('click',".delete-addOnContent", async function(e){
        e.preventDefault();
        const notice = `
                <p class="text-danger"><b>If you proceed with deleting the Add-on content:<b><p>
                <ol class="text-start text-primary">
                    <li>It cannot be undone.</li>
                </ol>
            `;
        if (!await isConfirmToProcess(notice, 'warning')) {
            return;
        }

        const adOnContentId = $(this).attr('data-id');
        let URL = `${getBaseUrl()}/admin/add-on-content/delete?id=${adOnContentId}`;
        const trTag = $(this).closest('tr');
        try {
            spinnerEnabled();
            const response = await makeAjaxCall(URL,{}, 'DELETE');
            toast.success(response.message);
            trTag.remove();
        }catch (err) {
            toast.error("An error occurred while attempting to delete the add-on content.. ");
        }finally {
            spinnerDisable();
        }
    });

    $(document).on("click", ".edit-adOnContent", async function (e) {
        e.preventDefault();
        const adOnContentId = $(this).attr('data-id');
        let path = `admin/add-on-content/edit?id=${adOnContentId}`;
        const trTag = $(`a[data-id="${adOnContentId}"]`).closest('tr');
        try {
            const modal = await loadModal(modalId, path);
            tinymce.init({
                selector: '.description',
                plugins: 'textcolor link lists code',
                toolbar: 'undo redo | formatselect | bold italic underline strikethrough | forecolor backcolor | link unlink | numlist bullist | code',
                content_style: 'body { font-family: Arial, sans-serif; font-size: 14px; }'
            });

            $(document).off('updateAddOnSuccessEvent');
            $(document).on('updateAddOnSuccessEvent', function (event) {
                modal.hide();
                const addOnContent = event.originalEvent.detail.addon;
                const row = getRow(addOnContent);
                const trTagParent = trTag.prev();
                if(trTagParent.length === 0){
                    const tbody = trTag.closest('tbody');
                    trTag.remove();
                    tbody.append(row);
                    return
                }

                trTag.remove();
                trTagParent.after(row);
            });
        } catch (err) {
            toast.error("An error occurred while attempting to open the create connector.. " + err);
        }
    });

    function getRow(adOnContent){

        return `

              <tr class="align-middle">
                    <td class="text-left">${adOnContent.categoryTree}</td>
                    <td class="text-left">${adOnContent.title}</td>
                    <td class="text-center">
                        <span class="badge ${adOnContent.isPublished ?'text-bg-success' : 'text-bg-danger' }">
                            ${adOnContent.isPublished ?'published' : 'non-published' }
                        </span>
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                    <li><a class="dropdown-item view-adOnContent" href="#"
                                           data-id="${adOnContent.id}">
                                            View <i class="bi bi-exclamation-circle float-end"></i></a>
                                    </li>

                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>

                                    <li>
                                        <a class="dropdown-item edit-adOnContent" type="button" data-bs-toggle="modal"
                                           data-id="${adOnContent.id}">
                                                Edit <i class="bi bi-pencil float-end"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>

                                    <li>
                                        <a class="dropdown-item delete-addOnContent" href="#"
                                           data-id="${adOnContent.id}">
                                                Delete <i class="bi bi-trash3 float-end"></i>
                                        </a>
                                    </li>

                                </ul>
                        </div>
                    </td>
                </tr>

        `;
    }
</script>
<?php require_once basePath("views/admin/layout/lower_template.php"); ?>

