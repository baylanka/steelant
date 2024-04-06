<?php

require_once "layout/start.layout.php";

use helpers\translate\Translate;
?>

<!--body section-->
<div class="jumbotron w-100 m-0">


    <div class="responsive-wrap">
        <!--categories section-->
        <div class="row w-100 mt-4">


            <div class="col-12 col-md-4 col-xxl-4 row gap-3">
                <div class="col-md-3">
                    <img src="<?= assets("themes/user/img/favourite-icon.png") ?>" height="80"/>
                </div>
                <div class="col-md-2">
                    <dl>
                        <h4 class="color-blue selected"><?= Translate::get("favourites_page","favourites") ?></h4>
                    </dl>

                </div>

            </div>


        </div>
        <!--categories section-->


        <?php require_once "layout/sub_nav.layout.php" ?>


        <div class="divider"></div>

        <h4 class="connector-heading my-3"><?= Translate::get("favourites_page","your_request") ?></h4>

        <div class="divider"></div>


        <div class="table-responsive">
            <table class="table border-primary mt-3 mb-5 w-100">
                <thead>
                <tr>
                    <th scope="col" class="color-blue font-weight-700"><?= Translate::get("favourites_page","project_name") ?></th>
                    <th scope="col" class="color-blue font-weight-700"><?= Translate::get("favourites_page","connector_name") ?></th>
                    <th scope="col" class="color-blue font-weight-700"><?= Translate::get("favourites_page","date_time_of_request") ?></th>
                    <th scope="col" class="color-blue font-weight-700"><?= Translate::get("favourites_page","amount") ?></th>
                    <th scope="col" class="color-blue font-weight-700"><?= Translate::get("favourites_page","location") ?></th>
                    <th scope="col" class="color-blue font-weight-700"><?= Translate::get("favourites_page","country_state") ?></th>
                    <th scope="col" class="color-blue font-weight-700 text-center"> </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Hamburg harbour</td>
                    <td>MF64</td>
                    <td>2024-02-29 / 12:34 h</td>
                    <td>500 running m</td>
                    <td>Hamburg</td>
                    <td>Germany</td>
                    <td class="text-center d-flex justify-content-end gap-4"><i class="bi bi-trash3-fill text-danger"  data-toggle="tooltip" title="Delete"></i> <i class="bi bi-box-arrow-up-right" data-toggle="tooltip" title="View"></i></td>
                </tr>
                <tr>
                    <td>Berlin harbour</td>
                    <td>MF63</td>
                    <td>2024-01-29 / 12:34 h</td>
                    <td>300 running m</td>
                    <td>Hamburg</td>
                    <td>Germany</td>
                    <td class="text-center d-flex justify-content-end gap-4"><i class="bi bi-trash3-fill text-danger"  data-toggle="tooltip" title="Delete"></i> <i class="bi bi-box-arrow-up-right" data-toggle="tooltip" title="View"></i></td>
                </tr>

                </tbody>
            </table>

        </div>


        <div class="divider mt-5"></div>

        <h4 class="connector-heading my-3"><?= Translate::get("favourites_page","favourite_connectors") ?></h4>

        <div class="divider"></div>

        <div class="table-responsive">
            <table class="table border-primary mt-3 mb-5 w-100">
                <thead>
                <tr>

                    <th scope="col" class="color-blue font-weight-700"><?= Translate::get("favourites_page","connector_name") ?></th>
                    <th scope="col" class="color-blue font-weight-700"><?= Translate::get("favourites_page","seen_on_date_or_time") ?></th>

                    <th scope="col" class="color-blue font-weight-700 text-center align-self-end"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>MF64</td>
                    <td>2024-02-29 / 12:34 h</td>
                    <td class="text-center d-flex justify-content-end gap-4"><i class="bi bi-trash3-fill text-danger"  data-toggle="tooltip" title="Delete"></i> <i class="bi bi-box-arrow-up-right" data-toggle="tooltip" title="View"></i></td>
                </tr>
                <tr>
                    <td>LV200</td>
                    <td>2024-02-29 / 12:34 h</td>
                    <td class="text-center d-flex justify-content-end gap-4"><i class="bi bi-trash3-fill text-danger"  data-toggle="tooltip" title="Delete"></i> <i class="bi bi-box-arrow-up-right" data-toggle="tooltip" title="View"></i></td>
                </tr>

                </tbody>
            </table>
        </div>

    </div>

</div>
<!--body section-->

<?php require_once "layout/end.layout.php" ?>
