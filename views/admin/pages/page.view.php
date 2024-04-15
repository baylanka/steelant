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
                        <th>type</th>
                        <th>name</th>
                        <th>status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="contents">
                        <?php foreach ($contents as $index => $content): ?>
                            <tr class="text-center" data-id="<?=$content->id?>">
                                    <td>
                                        <i class="bi bi-list"></i>
                                    </td>

                                    <td class="order">
                                        <?=($index+1)?>
                                    </td>

                                    <td>
                                        <?=$content->getContentLabel()?>
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
<script>
    const modalId = 'base-modal';

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
                        childrens[i].getElementsByClassName("order")[0].textContent = count.toString().padStart(3,"0");
                    }
                    document.getElementById("save-changes").removeAttribute("disabled");
                }

            });
        }
    }

    function getConnectorRow(connector, rowNumber = null)
    {
        rowNumber = rowNumber === null ? $('#contents').find('tr').length + 1 : rowNumber;
        rowNumber = rowNumber.toString().padStart(3,"0");
        return `
                        <tr class="text-center" data-id="${connector.contentId}">
                                <td>
                                    <i class="bi bi-list"></i>
                                </td>
                                <td class="order">
                                    ${rowNumber}
                                </td>

                                <td>
                                     ${connector.name}
                                </td>

                                <td>

                                    <span class="badge text-bg-secondary">
                                        connector
                                    </span>
                                </td>



                                <td>
                                    <span class="badge ${connector.isPublished ? 'text-bg-success': 'text-bg-warning'}">
                                         ${connector.isPublished ? 'published': 'non-published'}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item connector-view" href="#"
                                                    data-id="${connector.id}">
                                                    View <i class="bi bi-exclamation-circle float-end"></i></a>
                                            </li>

                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>

                                            <li><a class="dropdown-item connector-edit" href="#"
                                                   data-id="${connector.id}">
                                                    Edit <i class="bi bi-pencil float-end"></i></a>
                                            </li>

                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>

                                            <li><a class="dropdown-item connector-delete" href="#"
                                                   data-id="${connector.id}">
                                                    Delete <i class="bi bi-trash3 float-end"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                        </tr>

        `;
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

    $(document).on("click", ".connector-edit", async function (e) {
        e.preventDefault();
        const connectorId = $(this).attr('data-id');
        await getConnectorEditModal(connectorId);
    });

    $(document).on("click", ".connector-view", async function (e) {
        e.preventDefault();
        const connectorId = $(this).attr('data-id');
        let path = `admin/connectors/templates?id=${connectorId}`;
        try {
            const modal = await loadModal(modalId, path);

        } catch (err) {
            toast.error("An error occurred while attempting to open the view connector.. " + err);
        }
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
                lst.push($(this).attr('data-id'));
                if(iCount === totalTags){
                    resolve(lst);
                    return false;
                }
            });
        });
    }
</script>
<?php require_once basePath("views/admin/layout/lower_template.php"); ?>

