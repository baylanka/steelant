<?php

use helpers\translate\Translate;

?>
<?php require_once basePath("views/admin/layout/upper_template.php") ?>
<!--Place Your Content Here-->

<div class="row">
    <div class="card mb-4">

        <div class="card-body p-3">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="text-left">Category</th>
                    <th class="text-center">status</th>
                    <th class="text-center" style="width: 40px"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($leaf_categories as $leaf_category):?>
                    <tr class="align-middle">
                        <td class="text-left">
                            <?= $leaf_category->treePathStr ?>
                        </td>
                        <td class="text-center">
                            <?php if($leaf_category->isPublished): ?>
                                <span class="badge text-bg-success">published</span>
                            <?php else: ?>
                                <span class="badge text-bg-warning">non-published</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?= url("/admin/pages/view") ?>?id=<?= $leaf_category->id?>" class="dropdown-item" type="button" data-id="<?= $leaf_category->id?>">
                                            View <i class="bi bi-eye float-end"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item update-relevant-page" type="button" data-id="<?= $leaf_category->id?>">
                                            Meta Pages <i class="bi bi-pen float-end"></i>
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

<div class="modal fade" id="base-modal" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
</div>




<?php require_once basePath("views/admin/layout/middle_template.php") ?>
<?php require_once basePath("views/admin/layout/scripts.php"); ?>
<script>
    const modalId = 'base-modal';
    $(document).on("click", ".update-relevant-page", async function () {
        const language = "<?=\helpers\translate\Translate::getLang()?>";
        const id = $(this).attr('data-id');
        let path = `admin/update/relevant_pages?tableLang=${language}&id=${id}`;
        try {
            const modal = await loadModal(modalId, path);

            $(document).off('updateRelevantPagesEvent');
            $(document).on('updateRelevantPagesEvent', async function (event) {
                modal.hide();
            });
        } catch (err) {
            toast.error("An error occurred while attempting to open the create connector.. " + err);
        }
    });
</script>
<?php require_once basePath("views/admin/layout/lower_template.php"); ?>

