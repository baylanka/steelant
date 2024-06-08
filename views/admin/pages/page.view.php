<?php

use helpers\translate\Translate;
use model\CategoryContent;

?>
<?php require_once basePath("views/admin/layout/upper_template.php") ?>
<!--Place Your Content Here-->


<div class="w-100 d-flex justify-content-end gap-2 mb-3">
    <button class="btn btn-sm btn-secondary align-self-start" type="button" id="create-addon">Create
        Ad-on
    </button>
    <button class="btn btn-sm btn-primary align-self-start" type="button" id="create-connector">Create
        Connector
    </button>

</div>
<div class="row">

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-start gap-2">
            <button class="btn btn-sm btn-success align-self-start" type="button" id="save-changes" disabled>
                Save Changes
            </button>

        </div>
        <div class="card-body p-3">
            <?php if(empty(sizeof($contents))): ?>
                <div class="alert alert-danger" role="alert" id="no-connector-alert">
                    <h4 class="alert-heading">No contents!</h4>
                    <p>No content has been created yet within the category to display.</p>
                </div>
            <?php else: ?>
                <table class="table table-striped">
                    <thead>
                    <tr class="text-center">
                        <th style="width: 5%"></th>
                        <th style="width: 15%"># display order</th>
                        <th>name</th>
                        <th>type</th>
                        <th>status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="contents">
                        <?php foreach ($contents as $index => $content): ?>
                            <tr class="text-center" data-content-id="<?=$content->contentId?>">
                                    <td>
                                        <i class="bi bi-list"></i>
                                    </td>

                                    <td class="order">
                                        <?=($index+1)?>
                                    </td>

                                    <td>
                                        <?=$content->label?>
                                    </td>

                                    <td>
                                        <?php
                                            $isConnector = $content->type == CategoryContent::TYPE_CONNECTOR
                                        ?>
                                        <span class="badge <?=$isConnector ?'text-bg-secondary': 'text-bg-primary'?>">
                                            <?=$content->type?>
                                        </span>
                                    </td>



                                    <td>
                                        <?php
                                            $isPublished = $content->isPublished;
                                        ?>
                                        <span class="badge <?=$isPublished ? 'text-bg-success': 'text-bg-warning' ?> ">
                                             <?=$isPublished ? 'published': 'non-published' ?>
                                        </span>

                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item <?=$isConnector?'connector-view' : 'ad-on-view'?> " href="#"
                                                        data-id="<?=$content->id?>">
                                                        View <i class="bi bi-exclamation-circle float-end"></i></a>
                                                </li>

                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>

                                                <li><a class="dropdown-item <?=$isConnector?'connector-edit' : 'ad-on-edit'?> " href="#"
                                                       data-id="<?=$content->id?>">
                                                        Edit <i class="bi bi-pencil float-end"></i></a>
                                                </li>

                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>

                                                <li><a class="dropdown-item <?=$isConnector?'connector-delete' : 'ad-on-delete'?> " href="#"
                                                       data-id="<?=$content->id?>">
                                                        Delete <i class="bi bi-trash3 float-end"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                             </tr>
                         <?php endforeach ?>
                    </tbody>

                </table>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="modal fade" id="base-modal" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
</div>

<?php require_once basePath("views/admin/layout/middle_template.php") ?>
<?php require_once basePath("views/admin/layout/scripts.php"); ?>
<script src="https://cdn.tiny.cloud/1/39y77bbnodzcw45bboz4dzbi7c07mh4pr5nvitr1hhfj3tm8/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
<script>
    const modalId = 'base-modal';

    document.addEventListener('focusin', (e) => {
        if (e.target.closest(".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
            e.stopImmediatePropagation();
        }
    });

    function getContentsTable()
    {
        return `
            <table class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 5%"></th>
                            <th style="width: 15%"># display order</th>
                            <th>name</th>
                            <th>type</th>
                            <th>status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="contents">
                    </tbody>
            </table>
        `;
    }

    function activateSortableRows()
    {
        let contentBody = document.getElementById('contents');
        if(!isEmpty(contentBody)){
            new Sortable(contentBody, {
                onEnd: function (evt) {
                    let childrens = contentBody.children;

                    for (let i = 0; i < childrens.length; i++) {
                        let count = i + 1;
                        childrens[i].getElementsByClassName("order")[0].textContent = count.toString();
                    }
                    document.getElementById("save-changes").removeAttribute("disabled");
                }

            });
        }
    }

    function getContentRow(content,rowNumber, type)
    {
        const editClass = type === "connector" ? "connector-edit" : "ad-on-edit";
        const viewClass = type === "connector" ? "connector-view" : "ad-on-view";
        const deleteClass = type === "connector" ? "connector-delete" : "ad-on-delete";

        return `
                        <tr class="text-center" data-content-id="${content.contentId}">
                                <td>
                                    <i class="bi bi-list"></i>
                                </td>
                                <td class="order">
                                    ${rowNumber}
                                </td>

                                <td>
                                     ${content.label}
                                </td>

                                <td>

                                    <span class="badge text-bg-secondary">
                                        ${type}
                                    </span>
                                </td>



                                <td>
                                    <span class="badge ${content.isPublished ? 'text-bg-success': 'text-bg-warning'}">
                                         ${content.isPublished ? 'published': 'non-published'}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item ${viewClass}" href="#"
                                                    data-id="${content.id}">
                                                    View <i class="bi bi-exclamation-circle float-end"></i></a>
                                            </li>

                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>

                                            <li><a class="dropdown-item ${editClass}" href="#"
                                                   data-id="${content.id}">
                                                    Edit <i class="bi bi-pencil float-end"></i></a>
                                            </li>

                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>

                                            <li><a class="dropdown-item ${deleteClass}" href="#"
                                                   data-id="${content.id}">
                                                    Delete <i class="bi bi-trash3 float-end"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                        </tr>

        `;
    }

    function getConnectorRow(connector, rowNumber = null)
    {
        rowNumber = rowNumber === null ? $('#contents').find('tr').length + 1 : rowNumber;
        return getContentRow(connector, rowNumber, 'connector');
    }

    function getAdOnConnectorRow(adOnConnector, rowNumber = null)
    {
        rowNumber = rowNumber === null ? $('#contents').find('tr').length + 1 : rowNumber;
        return getContentRow(adOnConnector, rowNumber, 'add_on_content');
    }

    async function getConnectorEditModal(connectorId)
    {
        const language = "<?=Translate::getLang()?>";
        let path = `admin/connectors/edit?tableLang=${language}&id=${connectorId}&fixed_category=1`;
        const trTag = $(`a.connector-edit[data-id="${connectorId}"]`).closest('tr');
        try {
            const modal = await loadModal(modalId, path);

            $(document).off('updateCategorySuccessEvent');
            $(document).on('updateCategorySuccessEvent', function (event) {
                modal.hide();
                const connector = event.originalEvent.detail.connector;
                const rowNumber = trTag.find('td.order').text();
                const row = getConnectorRow(connector, rowNumber);
                const trTagParent = trTag.prev();
                if(trTagParent.length === 0){
                    const tbody = trTag.closest('tbody');
                    trTag.remove();
                    tbody.prepend(row);
                    return
                }

                trTag.remove();
                trTagParent.after(row);
            });
        } catch (err) {
            toast.error("An error occurred while attempting to open the create connector.. " + err);
        }
    }

    $(document).ready(function () {
        if($('tbody#contents').length > 0){
            activateSortableRows();
        }
    });

    $(document).on("click", "#create-connector", async function () {
        const language = $('img.selected-flag').closest('a').attr('data-lang');
        let path = `admin/connectors/create?tableLang=${language}&categoryId=<?=$categoryId?>`;
        const btn = $(this);
        const loadingBtnText = btn.text();
        try {
            loadButton(btn, "loading ...");
            const modal = await loadModal(modalId, path);
            resetButton(btn, loadingBtnText);

            $(document).off('storeConnectorSuccessEvent');
            $(document).on('storeConnectorSuccessEvent', async function (event) {
                modal.hide();
                const connector = event.originalEvent.detail.connector;
                const row = getConnectorRow(connector);
                const tbody = $('tbody#contents');
                if(tbody.length === 0){
                    $('.card-body').html(getContentsTable());
                }

                $('tbody#contents').append(row);

                if(tbody.length === 0){
                    activateSortableRows();
                }
                await getConnectorEditModal(connector.id);
            });
        } catch (err) {
            toast.error("An error occurred while attempting to open the create connector.. " + err);
            resetButton(btn, loadingBtnText);
        }
    });

    $(document).on("click", "#create-addon", async function (e) {
        e.preventDefault();
        const language = $('img.selected-flag').closest('a').attr('data-lang');
        let path = `admin/add-on/create?tableLang=${language}&categoryId=<?=$categoryId?>`;
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
                const row = getAdOnConnectorRow(addOnContent);
                const tbody = $('tbody#contents');
                if(tbody.length === 0){
                    $('.card-body').html(getContentsTable());
                }

                $('tbody#contents').append(row);

                if(tbody.length === 0){
                    activateSortableRows();
                }
            });
        } catch (err) {
            toast.error("An error occurred while attempting to open the create add on.. " + err);
        }finally {
            spinnerDisable();
            resetButton(btn, loadingBtnText);
        }
    });

    $(document).on("click", ".connector-edit", async function (e) {
        e.preventDefault();
        const connectorId = $(this).attr('data-id');
        await getConnectorEditModal(connectorId);
    });

    $(document).on("click", ".ad-on-edit", async function (e) {
        e.preventDefault();
        const adOnContentId = $(this).attr('data-id');
        let path = `admin/add-on-content/edit?id=${adOnContentId}&categoryId=<?=$categoryId?>`;
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
                const row = getAdOnConnectorRow(addOnContent);
                const trTagParent = trTag.prev();
                if(trTagParent.length === 0){
                    const tbody = trTag.closest('tbody');
                    trTag.remove();
                    tbody.prepend(row);
                    return
                }

                trTag.remove();
                trTagParent.after(row);
            });
        } catch (err) {
            toast.error("An error occurred while attempting to open the create connector.. " + err);
        }
    });


    $(document).on("click", ".connector-view", async function (e) {
        e.preventDefault();
        const connectorId = $(this).attr('data-id');
        let path = `admin/connectors/templates?id=${connectorId}`;
        try {
            await loadModal(modalId, path);

        } catch (err) {
            toast.error("An error occurred while attempting to open the view connector.. " + err);
        }
    });

    $(document).on("click", ".ad-on-view", async function (e) {
        e.preventDefault();
        const adOnId = $(this).attr('data-id');
        let path = `admin/add-on-content/templates?id=${adOnId}`;
        try {
            await loadModal(modalId, path);

        } catch (err) {
            toast.error("An error occurred while attempting to open the view ad-on content.. " + err);
        }
    });

    $(document).on('click',".ad-on-delete", async function(e){
        e.preventDefault();
        const notice = `
                <p class="text-danger"><b>If you proceed with deleting the Ad-on content:<b><p>
                <ol class="text-start text-primary">
                    <li>It cannot be undone.</li>
                </ol>
            `;
        if (!await isConfirmToProcess(notice, 'warning')) {
            return;
        }

        const adOnContentId = $(this).attr('data-id');
        let URL = `${getBaseUrl()}/admin/add-on-content/delete?id=${adOnContentId}`;
        await deleteElement(URL, $(this));
    });

    $(document).on('click',".connector-delete", async function(e){
        e.preventDefault();
        const notice = `
                <p class="text-danger"><b>If you proceed with deleting the connector content:<b><p>
                <ol class="text-start text-primary">
                    <li>It cannot be undone.</li>
                </ol>
            `;
        if (!await isConfirmToProcess(notice, 'warning')) {
            return;
        }

        const connectorId = $(this).attr('data-id');
        let URL = `${getBaseUrl()}/admin/connectors/delete?id=${connectorId}`;
        await deleteElement(URL, $(this));
    });

    $(document).on('click', '#save-changes', async function(e){
        e.preventDefault();
        spinnerEnabled();
        const btn = $(this);
        const btnText = btn.text();
        loadButton(btn, 'loading ...');
        const tbody = $('tbody#contents');
        const trTags = tbody.find('tr');
        if(tbody.length === 0 || trTags.length === 0){
            return;
        }

        const contentList = await getContentList();
        const data = {
            'content_order' : contentList
        }
        const URL = `${getBaseUrl()}/admin/contents/display_order_update`;
        try{
            const response = await makeAjaxCall(URL, data);
            toast.success(response.message);
            resetButton(btn, btnText);
            btn.attr("disabled", true);
        }catch(err){
            toast.error(err);
        }finally {
            spinnerDisable();
        }


    });

    async function deleteElement(URL, element)
    {
        const trTag = element.closest('tr');
        try {
            spinnerEnabled();
            const response = await makeAjaxCall(URL,{}, 'DELETE');
            toast.success(response.message);
            trTag.remove();
        }catch (err) {
            toast.error("An error occurred while attempting to delete the connector.. ");
        }finally {
            spinnerDisable();
        }
    }

    function getContentList()
    {
        return new Promise((resolve, reject)=>{
            const lst = [];
            const tbody = $('tbody#contents');
            const trTags = tbody.find('tr');
            if(tbody.length === 0 || trTags.length === 0){
                resolve(lst);
                return;
            }

            const totalTags = trTags.length;
            let iCount = 0;
            trTags.each(function(){
                iCount++;
                lst.push($(this).attr('data-content-id'));
                if(iCount === totalTags){
                    resolve(lst);
                    return false;
                }
            });
        });
    }
</script>
<?php require_once basePath("views/admin/layout/lower_template.php"); ?>

