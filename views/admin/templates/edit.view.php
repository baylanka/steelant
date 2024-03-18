<?php
use \model\Template;
?>
<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Template Type</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
            <form action="<?= url('/admin/templates/type/update') ?>">
                <input type="hidden" name="id" value="<?=$template->id?>"/>
                <div class="row  mb-3 ">
                    <div class="col-3">
                        <label for="template-type" class="form-label align-middle">Type</label>
                    </div>
                    <div class="col-9" id="test">
                        <select name="type" id="template-type" class="form-control w-100 select2">
                            <option value="">Select a type</option>
                            <option
                                    value="<?=Template::TYPE_CONNECTOR?>"
                                    <?= $template->type === Template::TYPE_CONNECTOR ? 'selected': '' ?>
                            >Connector Template</option>
                            <option
                                    value="<?=Template::TYPE_ADD_ON?>"
                                    <?= $template->type === Template::TYPE_ADD_ON ? 'selected': '' ?>
                            >Add on Template</option>
                        </select>
                    </div>
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
    $('button#update-btn').on('click', async function updateTemplateType(e) {
        e.preventDefault();
        const btn = $(this);
        const btnLabel = btn.text();
        loadButton(btn, "updating ...");
        const form = btn.closest('div.modal-dialog').find('form');
        const url = form.attr('action');
        const data = form.serialize();
        try {
            let response = await makeAjaxCall(url,data,)
            // let response = await makePostFileRequest(form);
            toast.success(response.message);
            //raise an event to close the modal
            const event = new CustomEvent('updatedTemplateTypeEvent', {
                detail: {template: response.data}
            });
            document.dispatchEvent(event);
        } catch (err) {
            toast.error(err);
        } finally {
            resetButton(btn, btnLabel);
        }
    });
</script>
