<?php
function hasCategoryId($value, $array) {
    foreach ($array as $innerArray) {
        if (isset($innerArray->relevant_category_id) && $innerArray->relevant_category_id == $value) {
            return true;
        }
    }
    return false;
}


function getIndex($value, $array)
{
    foreach ($array as $index => $innerArray) {
        if (isset($innerArray->relevant_category_id) && $innerArray->relevant_category_id == $value) {
            return $index;
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

                                        </th>
                                        <th class="text-left">
                                            Pages
                                        </th>
                                        <th>
                                            <div class="float-end">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary background-blue ml-4 update-btn">Update</button>

                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($leaf_categories as $leaf_category): ?>
                                    <?php
                                        $matchedCategoryId = hasCategoryId($leaf_category->id, $pages);
                                        $index = getIndex($leaf_category->id, $pages);
                                    ?>
                                    <tr class="align-middle">
                                        <td>
                                            <input type="checkbox" class="form-check-input page-selector" name="relevant_pages[]"
                                                   value="<?= $leaf_category->id ?>" <?= $matchedCategoryId ? 'checked': ''?>>
                                        </td>
                                        <td class="text-left">
                                            <?= $leaf_category->treePathStr ?>
                                        </td>
                                        <td>
                                            <label>
                                                Title JSON:
                                                <textarea class="form-control" name="title_json[]" <?=$matchedCategoryId ? '':'disabled' ?>><?=$matchedCategoryId ? $pages[$index]->title : '{}' ?></textarea>
                                            </label>
                                            <label>
                                                Description JSON:
                                                <textarea class="form-control" name="description_json[]"  <?=$matchedCategoryId ? '': 'disabled'?>><?=$matchedCategoryId ? $pages[$index]->description : '{}' ?></textarea>
                                            </label>
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
    $(document).off('change', '.page-selector');
    $(document).on('change', '.page-selector', function(){
        debugger
        const pageSelectorChkBox = $(this);
        if(pageSelectorChkBox.is(':checked')){
            pageSelectorChkBox.closest('tr').find('textarea').prop("disabled", false);
        }else{
            pageSelectorChkBox.closest('tr').find('textarea').val('{}');
            pageSelectorChkBox.closest('tr').find('textarea').prop("disabled", true);
        }
    });

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

