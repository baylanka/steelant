<?php require_once "layout/start.layout.php" ?>

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
                        <h4 class="color-blue selected">Favourites</h4>
                    </dl>

                </div>

            </div>


        </div>
        <!--categories section-->


        <?php require_once "layout/sub_nav.layout.php" ?>


        <div class="divider"></div>

        <h4 class="connector-heading my-3">Your requests</h4>

        <div class="divider"></div>


        <div class="table-responsive">
            <table class="table border-primary mt-3 mb-5 w-100">
                <thead>
                <tr>
                    <th scope="col" class="color-blue font-weight-700">Project name</th>
                    <th scope="col" class="color-blue font-weight-700">Connector name</th>
                    <th scope="col" class="color-blue font-weight-700">Date / Time of request</th>
                    <th scope="col" class="color-blue font-weight-700">Amount (running m)</th>
                    <th scope="col" class="color-blue font-weight-700">Location</th>
                    <th scope="col" class="color-blue font-weight-700">Country / State</th>
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
                    <td class="text-center d-flex gap-4"><i class="bi bi-trash3-fill text-danger"  data-toggle="tooltip" title="Delete"></i> <i class="bi bi-box-arrow-up-right" data-toggle="tooltip" title="View"></i></td>
                </tr>
                <tr>
                    <td>Berlin harbour</td>
                    <td>MF63</td>
                    <td>2024-01-29 / 12:34 h</td>
                    <td>300 running m</td>
                    <td>Hamburg</td>
                    <td>Germany</td>
                    <td class="text-center d-flex gap-4"><i class="bi bi-trash3-fill text-danger"  data-toggle="tooltip" title="Delete"></i> <i class="bi bi-box-arrow-up-right" data-toggle="tooltip" title="View"></i></td>
                </tr>

                </tbody>
            </table>

        </div>


        <div class="divider mt-5"></div>

        <h4 class="connector-heading my-3">Favourite connectors</h4>

        <div class="divider"></div>

        <div class="table-responsive">
            <table class="table border-primary mt-3 mb-5 w-100">
                <thead>
                <tr>
                    <th scope="col" class="color-blue font-weight-700">Project name</th>
                    <th scope="col" class="color-blue font-weight-700">Connector name</th>
                    <th scope="col" class="color-blue font-weight-700">Date / Time of request</th>
                    <th scope="col" class="color-blue font-weight-700">Amount (running m)</th>
                    <th scope="col" class="color-blue font-weight-700">Location</th>
                    <th scope="col" class="color-blue font-weight-700">Country / State</th>
                    <th scope="col" class="color-blue font-weight-700 text-center"></th>
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
                    <td class="text-center d-flex gap-4"><i class="bi bi-trash3-fill text-danger"  data-toggle="tooltip" title="Delete"></i> <i class="bi bi-box-arrow-up-right" data-toggle="tooltip" title="View"></i></td>
                </tr>
                <tr>
                    <td>Berlin harbour</td>
                    <td>MF63</td>
                    <td>2024-01-29 / 12:34 h</td>
                    <td>300 running m</td>
                    <td>Hamburg</td>
                    <td>Germany</td>
                    <td class="text-center d-flex gap-4"><i class="bi bi-trash3-fill text-danger"  data-toggle="tooltip" title="Delete"></i> <i class="bi bi-box-arrow-up-right" data-toggle="tooltip" title="View"></i></td>
                </tr>

                </tbody>
            </table>
        </div>

    </div>

</div>
<!--body section-->

<?php require_once "layout/end.layout.php" ?>
