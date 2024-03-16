<?php
use \model\Template;
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Template</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
            <form action="<?= url('/admin/templates/store') ?>">
                <div class="row img-block justify-content-between">
                    <div class="col input-group mb-3 w-50 ps-2 pe-0">
                        <span class="input-group-text" id="basic-addon3">Thumbnail image</span>
                        <input type="file" accept="image/png, image/gif, image/jpeg, image/jpg"
                               name="thumbnail" class="form-control img-load"
                               id="thumbnail-file" aria-describedby="basic-addon3">
                    </div>
                    <div class="col ps-0">
                        <img src="#" class="img-thumbnail load-image d-none" width="60" height="60">
                    </div>
                </div>
                <div class="row  mb-3">
                    <div class="col-3">
                        <label for="template-file" class="form-label align-middle">Template</label>
                    </div>
                    <div class="col-9">
                        <input type="file" accept=".php"
                               name="template" class="form-control w-100"
                               id="template-file" aria-describedby="basic-addon3">
                    </div>
                </div>
                <div class="row  mb-3 ">
                    <div class="col-3">
                        <label for="template-type" class="form-label align-middle">Type</label>
                    </div>
                    <div class="col-9" id="test">
                        <select name="type" id="template-type" class="form-control w-100 select2">
                            <option value="<?=Template::TYPE_CONNECTOR?>">Connector Template</option>
                            <option value="<?=Template::TYPE_ADD_ON?>">Add on Template</option>
                        </select>
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

    $(document).off("click", ".clear-img");
    $(document).on("click", ".clear-img", function () {
        $(this).closest("div.img-block").find("img.load-image").addClass('d-none');
        $(this).closest("div.img-block").find("input.img-load").removeClass('d-none');
        $(this).closest("div.img-block").find("input.img-load").val('');
        $(this).remove();
    })


    $('button#store-btn').off('click');
    $('button#store-btn').on('click', async function storeMainCategory(e) {
        e.preventDefault();
        const btn = $(this);
        const btnLabel = btn.text();
        loadButton(btn, "saving");
        const form = btn.closest('div.modal-dialog').find('form');
        try {
            let response = await makePostFileRequest(form);
            toast.success(response.message);
            //raise an event to close the modal
            const event = new CustomEvent('storedTemplateEvent', {
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
