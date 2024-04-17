<?php
    use \model\Template;
?>
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
                    <tr  class="no-template-alert">
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
                            <td>
                                <span class="badge
                                                <?=$template->isConnectorTemplate()
                                                                ?'text-bg-secondary'
                                                                : 'text-bg-primary'
                                                                ?>
                                            "
                                >
                                    <?=$template->getTypeStr()?>
                                </span>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item delete-template" data-id="<?=$template->id?>" href="#">Delete</a></li>
                                        <li><a class="dropdown-item edit-template" data-id="<?=$template->id?>" href="#">Edit Type</a></li>
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
    function getTemplateRow(template, rowNo) {
        const typeClass = template.type === Number("<?=Template::TYPE_CONNECTOR?>") ?
                                'text-bg-secondary': 'text-bg-primary';
        return `
                <tr
                    class="align-middle text-center template-row"
                    data-id="${template.id}"
                >
                        <td>${rowNo}</td>
                        <td>
                            <img class="img-thumbnail"
                                 src="${template.thumbnail_url}"
                                 alt="${template.thumbnail_name}"
                                 title="${template.thumbnail_name}"
                                 width="250"/>
                        </td>
                        <td>
                            <span class="badge ${typeClass}">${template.typeStr}</span>
                        </td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item delete-template" data-id="${template.id}" href="#">Delete</a></li>
                                    <li><a class="dropdown-item edit-template" data-id="${template.id}" href="#">Edit Type</a></li>
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
            $(`#${modalId} .select2`).select2({
                dropdownParent: $(`#${modalId}`),
                theme: 'bootstrap-5',
            });
            resetButton(btn, loadingBtnText);
            $(document).off('storedTemplateEvent');
            $(document).on('storedTemplateEvent', function (event) {
                modal.hide();
                const template = event.originalEvent.detail.template;
                let existingRowCount = $('#template-tbl tbody tr.template-row').length;
                const newRowNo = existingRowCount+1;
                const templateRowElement = getTemplateRow(template,newRowNo);
                $('table#template-tbl tbody').append(templateRowElement);
                const noTemplateAlert = $('.no-template-alert');
                if(noTemplateAlert.length > 0){
                    noTemplateAlert.remove();
                }
            });
        } catch (err) {
            toast.error("add template function is broken down. " + err);
        }
    });

    $(document).on('click', 'a.delete-template', async function (event) {
        event.preventDefault();
        const notice = `
                Before delete the template, system will check its usage. If it is not used. then only it can be deleted!
            `;
        if (!await isConfirmToProcess(notice, 'warning')) {
            return;
        }

        const templateId = $(this).attr('data-id');
        const data = {};
        const path = `${getBaseUrl()}/admin/templates/destroy?id=${templateId}`;
        try {
            const response = await makeAjaxCall(path, data, 'DELETE');
            $(this).closest('tr').remove()
            toast.success(response.message);
        } catch (err) {
            toast.error(err);
        }
    });

    $(document).on('click', 'a.edit-template', async function (event) {
        let modal;
        const btn = $(this);
        const trTag = btn.closest('tr');
        const templateId = btn.attr('data-id');
        const path = "admin/templates/type/edit?id=" + templateId;
        try {
            modal = await loadModal(modalId, path);
            $(`#${modalId} .select2`).select2({
                dropdownParent: $(`#${modalId}`),
                theme: 'bootstrap-5',
            });
            $(document).off('updatedTemplateTypeEvent');
            $(document).on('updatedTemplateTypeEvent', function (event) {
                modal.hide();
                const template = event.originalEvent.detail.template;
                let existingRowCount = $('#template-tbl tbody tr.template-row').length;
                const templateRowElement = getTemplateRow(template,existingRowCount);
                const trTagParent = trTag.prev();
                if(trTagParent.length === 0){
                    const tbody = trTag.closest('tbody');
                    trTag.remove();
                    tbody.append(templateRowElement);
                    return
                }

                trTag.remove();
                trTagParent.after(templateRowElement);
            });
        } catch (err) {
            toast.error("edit template function is broken down. " + err);
        }
    });
</script>
<?php require_once basePath("views/admin/layout/lower_template.php"); ?>

