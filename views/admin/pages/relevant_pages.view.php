<?php
function hasCategoryId($value, $array) {
    foreach ($array as $innerArray) {
        if (isset($innerArray->relevant_category_id) && $innerArray->relevant_category_id == $value) {
            return true;
        }
    }
    return false;
}
?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Relevant Pages of:</h5>
            <small class="ms-2"><?=$heading?></small>

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body p-2">

            <div class="row">

                        <form id="relevant-page-frm">
                            <input type="hidden" name="id" value="<?=$categoryId?>"/>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" class="form-check-input master-checker">
                                    </th>
                                    <th class="text-left">
                                        Pages
                                        <div class="float-end">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary background-blue ml-4 update-btn">Update</button>

                                        </div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($leaf_categories as $leaf_category): ?>
                                    <tr class="align-middle">
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="relevant_pages[]"
                                                   value="<?= $leaf_category->id ?>" <?= hasCategoryId($leaf_category->id, $pages_ids) ? 'checked': ''?>>
                                        </td>
                                        <td class="text-left">
                                            <?= $leaf_category->treePathStr ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>

                            </table>
                        </form>
            </div>
        </div>


        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary background-blue update-btn">Update</button>
        </div>

    </div>
</div>

<script>
    $(document).off("click", ".update-btn");
    $(document).on("click", ".update-btn", async function (e) {
        e.preventDefault();

        const btn = $(this);
        const btnLabel = btn.text();
        loadButton(btn, "updating");
        const form = $('#relevant-page-frm');
        const URL = `${getBaseUrl()}/admin/update/relevant_pages`;
        const formData = form.serialize();
        try {
            let response = await makeAjaxCall(URL, formData);
            toast.success(response.message);
            // raise an event to close the modal
            const event = new CustomEvent('updateRelevantPagesEvent', {
                detail: { connector: response.data }
            });
            document.dispatchEvent(event);
        } catch (err) {
            toast.error(err);
        } finally {
            resetButton(btn, btnLabel);
        }
    });

</script>

