<?php

use helpers\translate\Translate;

?>
<?php require_once basePath("views/admin/layout/upper_template.php") ?>
<!--Place Your Content Here-->


<div class="w-100 d-flex justify-content-end gap-2 mb-3">
    <button class="btn btn-sm btn-secondary align-self-start" type="button" id="create-connector">Create
        Add-on
    </button>
    <button class="btn btn-sm btn-primary align-self-start" type="button" id="create-connector">Create
        Connector
    </button>

</div>
<div class="row">

    <div class="card mb-4">


        <div class="card-header d-flex justify-content-start gap-2">

            <button class="btn btn-sm btn-success align-self-start" type="button" id="save-changes" disabled>
                Save Changes
            </button>



        </div>


        <div class="card-body p-3">
            <table class="table table-striped">
                <thead>
                <tr class="text-center">
                    <th></th>
                    <th>order</th>
                    <th>type</th>
                    <th>name</th>
                    <th>status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody id="contents">
                <tr class="text-center">
                    <td>
                        <i class="bi bi-list"></i>
                    </td>
                    <td class="order">
                        01
                    </td>
                    <td>
                        <span class="badge text-bg-secondary">Add-on</span>
                    </td>

                    <td>
                        Lv200
                    </td>

                    <td>

                        <span class="badge text-bg-success">published</span>

                        <!--<span class="badge text-bg-warning">non-published</span>-->

                    </td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#" class="dropdown-item" type="button">
                                        Edit <i class="bi bi-pen float-end"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="text-center">
                    <td>
                        <i class="bi bi-list"></i>
                    </td>
                    <td class="order">
                        02
                    </td>
                    <td>
                        <span class="badge text-bg-primary">Connector</span>
                    </td>
                    <td>
                        Lv2004
                    </td>

                    <td>

                        <span class="badge text-bg-success">published</span>

                        <!--<span class="badge text-bg-warning">non-published</span>-->

                    </td>

                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#" class="dropdown-item" type="button">
                                        Edit <i class="bi bi-pen float-end"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>

                </tr>
                <tr class="text-center">
                    <td>
                        <i class="bi bi-list"></i>
                    </td>
                    <td class="order">
                        03
                    </td>
                    <td>
                        <span class="badge text-bg-secondary">Add-on</span>
                    </td>
                    <td>
                        Lv2006
                    </td>

                    <td>

                        <!--                        <span class="badge text-bg-success">published</span>-->

                        <span class="badge text-bg-warning">non-published</span>

                    </td>

                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#" class="dropdown-item" type="button">
                                        Edit <i class="bi bi-pen float-end"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>


                </tr>
                <tr class="text-center">
                    <td>
                        <i class="bi bi-list"></i>
                    </td>
                    <td class="order">
                        04
                    </td>

                    <td>
                        <span class="badge text-bg-primary">Connector</span>

                    </td>

                    <td>
                        Lv20044
                    </td>

                    <td>

                        <span class="badge text-bg-success">published</span>

                        <!--<span class="badge text-bg-warning">non-published</span>-->

                    </td>

                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#" class="dropdown-item" type="button">
                                        Edit <i class="bi bi-pen float-end"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>

                </tr>


                </tbody>

            </table>

        </div>
    </div>
</div>


<?php require_once basePath("views/admin/layout/middle_template.php") ?>
<?php require_once basePath("views/admin/layout/scripts.php"); ?>
<script>
    let contentBody = document.getElementById('contents');

    new Sortable(contentBody, {

        onEnd: function (evt) {
            console.log(contentBody.children);


            let childrens = contentBody.children;

            for (let i = 0; i < childrens.length; i++) {

                console.log(i);
                let count = i + 1;
                childrens[i].getElementsByClassName("order")[0].textContent = count > 9 ? "" + count : "0" + count;

                document.getElementById("save-changes").removeAttribute("disabled");
            }

            // contentBody.children.forEach(function (){
            //     console.log("dsfd");
            // });
        }

    });

    $("tbody.contents").click(function () {


        alert("sf");
    });
</script>
<?php require_once basePath("views/admin/layout/lower_template.php"); ?>

