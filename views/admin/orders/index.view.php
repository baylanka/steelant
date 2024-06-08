<?php

global $env;
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
                <span class="info-box-number">
                    <?= $counts["total_count"] ?>
                </span>
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
                <span class="info-box-number">
                    <?= $counts["total_completed"] ?>
                </span>
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
                <span class="info-box-number">
                      <?= $counts["total_pending"] ?>
                </span>
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
                <span class="info-box-number">
                   <?= $counts["total_rejected"] ?>
                </span>
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

                    <th class="text-left">Id</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Project name</th>
                    <th class="text-center">Requested connector</th>
                    <th class="text-center">Standard Length</th>
                    <th class="text-center">Number of piles</th>
                    <th class="text-center">Name of used sheet piles</th>
                    <th class="text-center">Delivery date</th>
                    <th class="text-center" style="width: 40px"></th>
                </tr>
                </thead>
                <tbody>
                <?php

                function getStatusColorCode($status)
                {
                    switch ($status) {
                        case "completed":
                            return "success";
                        case "pending":
                            return "warning";
                        case "rejected":
                            return "danger";
                    }
                }

                foreach ($orders as $order): ?>
                    <?php
                        $connector = \model\Connector::getById($order->connector_id);
                    ?>
                    <tr class="align-middle">
                        <td class="text-left">
                            <?= $env["ORDER_ID_PREFIX"] . $order->id ?>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-<?= getStatusColorCode($order->status) ?>"> <?= $order->status ?></span>
                        </td>
                        <td class="text-center">
                            <?= $order->project ?>
                        </td>
                        <td class="text-center">
                            <?= $connector->name ?>
                        </td>
                        <td class="text-center">
                            <?= $order->connector_s_length ?>
                        </td>
                        <td class="text-center">
                            <?= $order->number_of_piles ?>
                        </td>
                        <td class="text-center">
                            <?=$order->sheet_pile_name?>
                        </td>
                        <td class="text-center">
                            <?php
                            $date = date_create($order->delivery_date);
                            echo date_format($date, "Y/m/d");
                            ?>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu" style="width: 300px;">
                                    <li>
                                        <a href="#" class="dropdown-item" type="button">
                                            Change status <i class="bi bi-toggle-off float-end"></i>
                                        </a>
                                        <ul class="list-group m-3">
                                            <li class="list-group-item <?= $order->status == "pending" ? "active" : "" ?>" aria-current="true">
                                                <a href="<?= url("/admin/orders/change/status") ?>?id=<?= $order->id ?>&status=<?= \model\Order::STATUS_PENDING ?>">
                                                    <span class="badge bg-warning">pending</span>
                                                </a>
                                            </li>
                                            <li class="list-group-item <?= $order->status == "completed" ? "active" : "" ?>">
                                                <a href="<?= url("/admin/orders/change/status") ?>?id=<?= $order->id ?>&status=<?= \model\Order::STATUS_COMPLETED ?>">
                                                    <span class="badge bg-success">complete</span>
                                                </a>
                                            </li>
                                            <li class="list-group-item <?= $order->status == "rejected" ? "active" : "" ?>">
                                                <a href="<?= url("/admin/orders/change/status") ?>?id=<?= $order->id ?>&status=<?= \model\Order::STATUS_REJECTED ?>">
                                                    <span class="badge bg-danger">reject</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a href="<?= url("/admin/orders/delete") ?>?id=<?= $order->id ?>" class="dropdown-item" type="button">
                                            Delete <i class="bi bi-trash3 text-danger float-end"></i>
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

