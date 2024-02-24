<?php
use helpers\translate\Translate;
?>
<?php require_once basePath("views/admin/layout/upper_template.php")?>
<!--Place Your Content Here-->
<div class="row">
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title"></h3>
            <div class="float-end"><button class="btn btn-sm btn-primary">Add Main Category</button></div>
        </div> <!-- /.card-header -->
        <div class="card-body p-3">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th >Thumbnail</th>
                    <th>German</th>
                    <th>English</th>
                    <th>French</th>
                    <th style="width: 40px"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($categories as $category): ?>
                    <?php
                    $rowColors = [
                        'table-success',
                        'table-primary',
                        'table-warning',
                        'table-info',
                        'table-light',
                        'table-secondary',
                        'table-danger',
                    ];
                    $rowColorClass = $rowColors[($category->level-1)] ?? $rowColors[(sizeof($rowColors)-1)];
                    ?>
                    <tr class="align-middle <?= $rowColorClass ?>">
                        <td>
                            <img class="img-thumbnail" src="<?= assets("/admin/img/no-image.png")?>"/>
                        </td>
                        <td><?= $category->getDeName() ?></td>
                        <td><?= $category->getEnName() ?></td>
                        <td><?= $category->getFrName() ?></td>
                        <td>
                            <div class="btn-group"> <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Add sub category</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li> <a class="dropdown-item" href="#">Edit</a> </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr class="align-middle">
                    <td>
                        <img class="img-thumbnail" width="50" src="<?= assets("/img/admin/no-image.png")?>"/>
                    </td>
                    <td  class="ps-3">LARSSEN</td>
                    <td  class="ps-3">LARSSEN</td>
                    <td  class="ps-3">LARSSEN</td>
                    <td>
                        <div class="btn-group"> <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Add sub category</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li> <a class="dropdown-item" href="#">Edit</a> </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <!--                    <tr class="align-middle">-->
                <!--                        <td></td>-->
                <!--                        <td  class="ps-4">Omega corner connectors</td>-->
                <!--                        <td  class="ps-4">Omega corner connectors</td>-->
                <!--                        <td  class="ps-4">Omega corner connectors</td>-->
                <!--                        <td></td>-->
                <!--                    </tr>-->
                <!--                    <tr class="align-middle">-->
                <!--                        <td></td>-->
                <!--                        <td  class="ps-4">T connectors</td>-->
                <!--                        <td  class="ps-4">T connectors</td>-->
                <!--                        <td  class="ps-4">T connectors</td>-->
                <!--                        <td></td>-->
                <!--                    </tr>-->
                <!--                    <tr class="align-middle">-->
                <!--                        <td></td>-->
                <!--                        <td  class="ps-4">Cross connectors</td>-->
                <!--                        <td  class="ps-4">Cross connectors</td>-->
                <!--                        <td  class="ps-4">Cross connectors</td>-->
                <!--                        <td></td>-->
                <!--                    </tr>-->
                </tbody>
            </table>
        </div> <!-- /.card-body -->
    </div>
</div>

<?php require_once basePath("views/admin/layout/middle_template.php") ?>
<?php require_once basePath("views/admin/layout/scripts.php"); ?>
<script>
    //Place your javascript logics here
</script>
<?php require_once basePath("views/admin/layout/lower_template.php"); ?>

