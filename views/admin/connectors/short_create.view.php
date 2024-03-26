<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Connector</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body p-2">
            <form action="<?=url('/admin/connectors')?>">
                <input type="hidden" name="tableLang" value="<?=$tableLang?>">
                <div class="row w-100 p-2">
                        <div class="col-12 mt-3">
                            <select class="form-select w-100 select2" name="category">
                                <option value="0" selected disabled>Select Category</option>
                                <?php foreach ($leafCategories as $leafCategory): ?>
                                    <option value="<?= $leafCategory->id ?>">
                                        <?= $leafCategory->treePathStr ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-12 d-flex justify-content-between mt-3 mb-1">
                            <label for="name" class="align-items-center">
                                Name
                            </label>
                            <input name="name" type="text"
                                   class="form-control w-75 align-items-center"
                                   placeholder="Connector name" id="name"/>
                        </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="store-btn" class="btn btn-primary">Create</button>
        </div>

    </div>
</div>

<script>
    $('button#store-btn').off('click');
    $('button#store-btn').on('click', async function storeConnector(e){
        e.preventDefault();
        const btn = $(this);
        const btnLabel = btn.text();
        loadButton(btn, "saving");
        const form = btn.closest('div.modal-dialog').find('form');
        const URL = form.attr('action');
        const formData = form.serialize();
        try{
            let response = await makeAjaxCall(URL,formData);
            toast.success(response.message);
            //raise an event to close the modal
            const event = new CustomEvent('storeConnectorSuccessEvent',  {
                detail: { connector: response.data }
            });
            document.dispatchEvent(event);
        }catch (err){
            toast.error(err);
        }finally {
            resetButton(btn, btnLabel);
        }
    });
</script>