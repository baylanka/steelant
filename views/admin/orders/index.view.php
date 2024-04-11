<?php

use helpers\translate\Translate;

?>
<?php require_once basePath("views/admin/layout/upper_template.php") ?>

<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-info">
                <i class="bi bi-border-all text-white"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">Total Orders</span>
                <span class="info-box-number">1,410</span>
            </div>

        </div>

    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-success">
             <i class="bi bi-check-lg text-white"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">Completed</span>
                <span class="info-box-number">410</span>
            </div>

        </div>

    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-warning">
                 <i class="bi bi-arrow-repeat text-white"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">Pending</span>
                <span class="info-box-number">13,648</span>
            </div>

        </div>

    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-danger">
                    <i class="bi bi-x-lg text-white"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">Rejected</span>
                <span class="info-box-number">93,139</span>
            </div>

        </div>

    </div>

</div>

<div class="row mt-4">
    <div class="card mb-4">

        <div class="card-body p-3">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="text-left">Project name</th>
                    <th class="text-center">Requested connector</th>
                    <th class="text-center">Number of piles</th>
                    <th class="text-center">Name of used sheet piles</th>
                    <th class="text-center">Delivery date</th>
                    <th class="text-center" style="width: 40px"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr class="align-middle">
                        <td class="text-left">
                            <?= $order->project ?>
                        </td>
                        <td class="text-center">
                            lv200
                        </td>
                        <td class="text-center">
                            <?= $order->number_of_piles ?>
                        </td>
                        <td class="text-center">
                            tewst
                        </td>
                        <td class="text-center">
                            <?= $order->delivery_date ?>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#?id=<?= $order->id ?>" class="dropdown-item" type="button">
                                            test <i class="bi bi-eye float-end"></i>
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
    //Place your javascript logics here
</script>
<?php require_once basePath("views/admin/layout/lower_template.php"); ?>

