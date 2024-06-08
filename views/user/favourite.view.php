<?php

require_once "layout/start.layout.php";

use helpers\translate\Translate;
use helpers\services\RouterService;
global $env;

?>
<!--body section-->
<div class="jumbotron w-100 m-0">


    <div class="responsive-wrap">
        <!--categories section-->
        <div class="row w-100 mt-4">


            <div class="col-12 col-md-4 col-xxl-4 row gap-3">
                <div class="col-md-2 me-3">
                    <img src="<?= assets("themes/user/img/favourite-icon.png") ?>" height="80"/>
                </div>
                <div class="col-md-2">
                    <dl>
                        <h4 class="selected"><?= Translate::get("favourites_page", "favourites") ?></h4>
                    </dl>

                </div>

            </div>


        </div>
        <!--categories section-->


        <?php require_once "layout/sub_nav.layout.php" ?>


        <div class="divider"></div>

        <h4 class="connector-heading my-3"><?= Translate::get("favourites_page", "your_request") ?></h4>

        <div class="divider"></div>


        <div class="table-responsive">
            <table class="table border-primary mt-3 mb-5 w-100">
                <thead>
                <tr>
<!--                    <th scope="col"-->
<!--                        class="color-blue font-weight-700"></th>-->

                    <th scope="col"
                        class="color-blue font-weight-700"><?= Translate::get("favourites_page", "project_name") ?></th>

<!--                    <th scope="col"-->
<!--                        class="color-blue font-weight-700">--><?php //= Translate::get("favourites_page", "status") ?><!--</th>-->
                    <th scope="col"
                        class="color-blue font-weight-700"><?= Translate::get("favourites_page", "connector_name") ?></th>


                    <th scope="col"
                        class="color-blue font-weight-700"><?= Translate::get("favourites_page", "date_time_of_request") ?></th>
                    <th scope="col"
                        class="color-blue font-weight-700"><?= Translate::get("favourites_page", "amount") ?></th>
                    <th scope="col"
                        class="color-blue font-weight-700"><?= Translate::get("favourites_page", "location") ?></th>
                    <th scope="col"
                        class="color-blue font-weight-700"><?= Translate::get("favourites_page", "country_state") ?></th>
                    <th scope="col" class="color-blue font-weight-700"></th>
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
                    <tr>
<!--                        <td>--><?php //= $env["ORDER_ID_PREFIX"].$order->id ?><!--</td>-->
                        <td class=""><?= $order->project ?></td>
<!--                        <td class=""><span-->
<!--                                    class="badge bg---><?php //= getStatusColorCode($order->status) ?><!--"> --><?php //= $order->status ?><!--</span>-->
<!--                        </td>-->
                        <td class=""><?= $order->connector_name ?></td>
                        <td class="">
                            <?php
                                $date = date_create($order->created_at);
                                echo date_format($date, "Y-m-d / h:m");
                            ?>
                        </td>
                        <td class="">500 running m</td>
                        <td class="">Hamburg</td>
                        <td class=""><?= $order->country ?></td>
                        <td class=" d-flex justify-content-end gap-4">
                            <i class="bi bi-trash3-fill text-danger delete_request" data-id="<?= $order->id ?>" data-toggle="tooltip" title="Delete"></i>
                            <a href="<?= RouterService::getCategoryPageRoute( $order->leaf_category_id) ?>#<?= $order->connector_id ?>"><i class="bi bi-box-arrow-up-right" data-toggle="tooltip" title="View"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        </div>


        <div class="divider mt-5"></div>

        <h4 class="connector-heading my-3"><?= Translate::get("favourites_page", "favourite_connectors") ?></h4>

        <div class="divider"></div>

        <div class="table-responsive">
            <table class="table border-primary mt-3 mb-5 w-100">
                <thead>
                <tr>

                    <th scope="col"
                        class="color-blue font-weight-700" style="width: 15%;"><?= Translate::get("favourites_page", "connector_name") ?></th>
                    <th scope="col"
                        class="color-blue font-weight-700"><?= Translate::get("favourites_page", "seen_on_date_or_time") ?></th>

                    <th scope="col" class="color-blue font-weight-700 text-center align-self-end"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($favourites as $favourite): ?>
                <tr>
                    <td><?= $favourite->connector_name ?></td>
                    <td>
                        <?php
                            $date = date_create($favourite->created_at);
                            echo date_format($date, "Y-m-d / h:m");
                        ?>
                    </td>
                    <td class="text-center d-flex justify-content-end gap-4">
                        <i class="bi bi-trash3-fill text-danger delete_favourite" data-toggle="tooltip" title="Delete" data-id="<?= $favourite->id ?>"></i>
                        <a href="<?= RouterService::getCategoryPageRoute( $favourite->leaf_category_id) ?>#<?= $favourite->connector_id ?>"><i class="bi bi-box-arrow-up-right" data-toggle="tooltip" title="View"></i></a>
                    </td>
                </tr>

                <?php endforeach; ?>

                </tbody>
            </table>
        </div>

    </div>

</div>
<!--body section-->

<?php require_once "layout/end.layout.php" ?>

<script>
    $(document).on("click", ".delete_request", async function (e) {

        const notice = `
                <p class="text-danger"><b><?= Translate::get("favourites_page","delete_message") ?><b><p>
            `;
        if (!await isConfirmToProcess(notice, 'warning',"<?= Translate::get("alert","are_you_sure") ?>","<?= Translate::get("common","confirm") ?>","<?= Translate::get("common","cancel") ?>")) {
            return;
        }

        let id = $(this).attr("data-id");
        try {
            let response = await makeAjaxCall(`<?= url('/order/request/delete') . "?id=" ?>${id}`, {},"GET");
            toast.success(response.message);
           $(this).closest("tr").remove();
        } catch (err) {
            err = JSON.parse(err);
            toast.error(err.message);

        }
    });



    $(document).on("click", ".delete_favourite", async function (e) {

        const notice = `
                <p class="text-danger"><b><?= Translate::get("favourites_page","delete_message") ?><b><p>
            `;
        if (!await isConfirmToProcess(notice, 'warning',"<?= Translate::get("alert","are_you_sure") ?>","<?= Translate::get("common","confirm") ?>","<?= Translate::get("common","cancel") ?>")) {
            return;
        }

        let id = $(this).attr("data-id");
        try {
            let response = await makeAjaxCall(`<?= url('/connector/favourite/delete') . "?id=" ?>${id}`, {},"GET");
            toast.success(response.message);
            $(this).closest("tr").remove();
        } catch (err) {
            err = JSON.parse(err);
            toast.error(err.message);

        }
    });
</script>
