<?php

use helpers\translate\Translate;

?>
<?php require_once basePath("views/admin/layout/upper_template.php") ?>
<!--Place Your Content Here-->
<div class="row">
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title"></h3>
            <div class="float-end">
                <button id="add-main-category" class="btn btn-sm btn-primary">Add Main Category</button>
            </div>
        </div> <!-- /.card-header -->
        <div class="card-body p-3">
            <table class="table table-borderless">
                <thead>
                <tr class="text-center">
                    <th>Thumbnail</th>
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
                    $rowColorClass = $rowColors[($category->level - 1)] ?? $rowColors[(sizeof($rowColors) - 1)];
                    ?>
                    <tr class="align-middle text-center <?= $rowColorClass ?>">
                        <td>
                            <img class="img-thumbnail" src="<?= assets("/admin/img/no-image.png") ?>"/>
                        </td>
                        <td><?= $category->getDeName() ?></td>
                        <td><?= $category->getEnName() ?></td>
                        <td><?= $category->getFrName() ?></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Add sub category</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>

                <tr class="align-middle text-center table-success">
                    <td>
                        <img class="img-thumbnail" width="50" src="<?= assets("/img/admin/no-image.png") ?>"/>
                    </td>
                    <td class="ps-3">Earthwork</td>
                    <td class="ps-3">Earthwork</td>
                    <td class="ps-3">Earthwork</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Add sub category</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle text-center table-primary">
                    <td>
                        <img class="img-thumbnail" width="50" src="<?= assets("/img/admin/no-image.png") ?>"/>
                    </td>
                    <td class="ps-3">LARSSEN</td>
                    <td class="ps-3">LARSSEN</td>
                    <td class="ps-3">LARSSEN</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Add sub category</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle text-center table-warning">
                    <td>
                        <img class="img-thumbnail" width="50" src="<?= assets("/img/admin/no-image.png") ?>"/>
                    </td>
                    <td class="ps-3">Corner connectors</td>
                    <td class="ps-3">Corner connectors</td>
                    <td class="ps-3">Corner connectors</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Add sub category</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle text-center table-warning">
                    <td>
                        <img class="img-thumbnail" width="50" src="<?= assets("/img/admin/no-image.png") ?>"/>
                    </td>
                    <td class="ps-3">Omega corner connectors</td>
                    <td class="ps-3">Omega corner connectors</td>
                    <td class="ps-3">Omega corner connectors</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Add sub category</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle text-center table-warning">
                    <td>
                        <img class="img-thumbnail" width="50" src="<?= assets("/img/admin/no-image.png") ?>"/>
                    </td>
                    <td class="ps-3">T connectors</td>
                    <td class="ps-3">T connectors</td>
                    <td class="ps-3">T connectors</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Add sub category</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle text-center table-warning">
                    <td>
                        <img class="img-thumbnail" width="50" src="<?= assets("/img/admin/no-image.png") ?>"/>
                    </td>
                    <td class="ps-3">Cross connectors</td>
                    <td class="ps-3">Cross connectors</td>
                    <td class="ps-3">Cross connectors</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Add sub category</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle text-center table-warning">
                    <td>
                        <img class="img-thumbnail" width="50" src="<?= assets("/img/admin/no-image.png") ?>"/>
                    </td>
                    <td class="ps-3">Weld-on connectors</td>
                    <td class="ps-3">Weld-on connectors</td>
                    <td class="ps-3">Weld-on connectors</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Add sub category</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle text-center table-primary">
                    <td>
                        <img class="img-thumbnail" width="50" src="<?= assets("/img/admin/no-image.png") ?>"/>
                    </td>
                    <td class="ps-3">BALL + SOCKET</td>
                    <td class="ps-3">BALL + SOCKET</td>
                    <td class="ps-3">BALL + SOCKET</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Add sub category</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle text-center table-warning">
                    <td>
                        <img class="img-thumbnail" width="50" src="<?= assets("/img/admin/no-image.png") ?>"/>
                    </td>
                    <td class="ps-3">US Corner connectors</td>
                    <td class="ps-3">US Corner connectors</td>
                    <td class="ps-3">US Corner connectors</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Add sub category</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle text-center table-warning">
                    <td>
                        <img class="img-thumbnail" width="50" src="<?= assets("/img/admin/no-image.png") ?>"/>
                    </td>
                    <td class="ps-3">US T connectors</td>
                    <td class="ps-3">US T connectors</td>
                    <td class="ps-3">US T connectors</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Add sub category</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle text-center table-warning">
                    <td>
                        <img class="img-thumbnail" width="50" src="<?= assets("/img/admin/no-image.png") ?>"/>
                    </td>
                    <td class="ps-3">US Cross connectors</td>
                    <td class="ps-3">US Cross connectors</td>
                    <td class="ps-3">US Cross connectors</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Add sub category</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle text-center table-warning">
                    <td>
                        <img class="img-thumbnail" width="50" src="<?= assets("/img/admin/no-image.png") ?>"/>
                    </td>
                    <td class="ps-3">MF connectors, weld-ons?</td>
                    <td class="ps-3">MF connectors, weld-ons?</td>
                    <td class="ps-3">MF connectors, weld-ons?</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Add sub category</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle text-center table-primary">
                    <td>
                        <img class="img-thumbnail" width="50" src="<?= assets("/img/admin/no-image.png") ?>"/>
                    </td>
                    <td class="ps-3">COLD FORMED</td>
                    <td class="ps-3">COLD FORMED</td>
                    <td class="ps-3">COLD FORMED</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Add sub category</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle text-center table-warning">
                    <td>
                        <img class="img-thumbnail" width="50" src="<?= assets("/img/admin/no-image.png") ?>"/>
                    </td>
                    <td class="ps-3">CF corner connector</td>
                    <td class="ps-3">CF corner connector</td>
                    <td class="ps-3">CF corner connector</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Add sub category</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle text-center table-warning">
                    <td>
                        <img class="img-thumbnail" width="50" src="<?= assets("/img/admin/no-image.png") ?>"/>
                    </td>
                    <td class="ps-3">CF weld-on connector</td>
                    <td class="ps-3">CF weld-on connector</td>
                    <td class="ps-3">CF weld-on connector</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Add sub category</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle text-center table-success">
                    <td>
                        <img class="img-thumbnail" width="50" src="<?= assets("/img/admin/no-image.png") ?>"/>
                    </td>
                    <td class="ps-3">Pipe pile steel walls</td>
                    <td class="ps-3">Pipe pile steel walls</td>
                    <td class="ps-3">Pipe pile steel walls</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Add sub category</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle text-center table-primary">
                    <td>
                        <img class="img-thumbnail" width="50" src="<?= assets("/img/admin/no-image.png") ?>"/>
                    </td>
                    <td class="ps-3">MF</td>
                    <td class="ps-3">MF</td>
                    <td class="ps-3">MF</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Add sub category</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle text-center table-primary">
                    <td>
                        <img class="img-thumbnail" width="50" src="<?= assets("/img/admin/no-image.png") ?>"/>
                    </td>
                    <td class="ps-3">MDF</td>
                    <td class="ps-3">MDF</td>
                    <td class="ps-3">MDF</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Add sub category</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle text-center table-primary">
                    <td>
                        <img class="img-thumbnail" width="50" src="<?= assets("/img/admin/no-image.png") ?>"/>
                    </td>
                    <td class="ps-3">LPB</td>
                    <td class="ps-3">LPB</td>
                    <td class="ps-3">LPB</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Add sub category</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle text-center table-primary">
                    <td>
                        <img class="img-thumbnail" width="50" src="<?= assets("/img/admin/no-image.png") ?>"/>
                    </td>
                    <td class="ps-3">FD</td>
                    <td class="ps-3">FD</td>
                    <td class="ps-3">FD</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Add sub category</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle text-center table-success">
                    <td>
                        <img class="img-thumbnail" width="50" src="<?= assets("/img/admin/no-image.png") ?>"/>
                    </td>
                    <td class="ps-3">For DTH driving method</td>
                    <td class="ps-3">For DTH driving method</td>
                    <td class="ps-3">For DTH driving method</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Add sub category</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle text-center table-primary">
                    <td>
                        <img class="img-thumbnail" width="50" src="<?= assets("/img/admin/no-image.png") ?>"/>
                    </td>
                    <td class="ps-3">MF DTH</td>
                    <td class="ps-3">MF DTH</td>
                    <td class="ps-3">MF DTH</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Add sub category</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div> <!-- /.card-body -->
    </div>
</div>
<div class="modal fade" id="category-modal" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
</div>
<?php require_once basePath("views/admin/layout/middle_template.php") ?>
<?php require_once basePath("views/admin/layout/scripts.php"); ?>
<script>
    //Place your javascript logics here
    $(function () {
        const modalId = 'category-modal';
        $('button#add-main-category').click(async function (event) {
            let path = "admin/categories/main/store";
            await loadModal(modalId, path)
        })

    });

</script>
<?php require_once basePath("views/admin/layout/lower_template.php"); ?>

