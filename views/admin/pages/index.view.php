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
                                        <a class="dropdown-item" type="button" data-id="<?= $leaf_category->id?>">
                                            View <i class="bi bi-eye float-end"></i>
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






<?php require_once basePath("views/admin/layout/middle_template.php") ?>
<?php require_once basePath("views/admin/layout/scripts.php"); ?>
<script>

</script>
<?php require_once basePath("views/admin/layout/lower_template.php"); ?>

