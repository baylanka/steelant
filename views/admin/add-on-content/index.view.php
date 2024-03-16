<?php

?>
<?php require_once basePath("views/admin/layout/upper_template.php") ?>
<!--Place Your Content Here-->

<div class="row">
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title"></h3>
            <div class="float-end">
                <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal"
                        data-bs-target="#createConnector">Create Add-on
                </button>
            </div>
        </div>
        <div class="card-body p-3">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="text-left">Title</th>
                    <th class="text-center">status</th>
                    <th style="width: 40px"></th>
                </tr>
                </thead>
                <tbody>

                <tr class="align-middle">
                    <td class="text-left">Privacy & Policy</td>
                    <td class="text-center"><span class="badge text-bg-success">published</span></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                                       data-bs-target="#editConnector">
                                        Edit <i class="bi bi-pencil float-end"></i></a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">
                                        Delete <i class="bi bi-trash3 float-end"></i></a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">
                                        View <i class="bi bi-exclamation-circle float-end"></i></a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle">
                    <td class="text-left">Our Partners</td>
                    <td class="text-center"><span class="badge text-bg-danger">non-published</span></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                                       data-bs-target="#editConnector">
                                        Edit <i class="bi bi-pencil float-end"></i></a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">
                                        Delete <i class="bi bi-trash3 float-end"></i></a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">
                                        View <i class="bi bi-exclamation-circle float-end"></i></a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle">
                    <td class="text-left">Notice 1</td>
                    <td class="text-center"><span class="badge text-bg-success">published</span></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                                       data-bs-target="#editConnector">
                                        Edit <i class="bi bi-pencil float-end"></i></a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">
                                        Delete <i class="bi bi-trash3 float-end"></i></a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">
                                        View <i class="bi bi-exclamation-circle float-end"></i></a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle">
                    <td class="text-left">Notice 2</td>
                    <td class="text-center"><span class="badge text-bg-success">published</span></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                                       data-bs-target="#editConnector">
                                        Edit <i class="bi bi-pencil float-end"></i></a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">
                                        Delete <i class="bi bi-trash3 float-end"></i></a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">
                                        View <i class="bi bi-exclamation-circle float-end"></i></a>
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


<div class="modal fade" id="createConnector" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Add-On</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form>

                    <div class="container">
                        <div class="wizard my-2">
                            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                                <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Template">
                                    <a class="nav-link active rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                       href="#step1" id="step1-tab" data-bs-toggle="tab" role="tab"
                                       aria-controls="step1" aria-selected="true">
                                        <i class="bi bi-border-style size-20"></i>
                                    </a>
                                </li>

                                <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Data">
                                    <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                       href="#step2" id="step4-tab" data-bs-toggle="tab" role="tab"
                                       aria-controls="step4" aria-selected="false" title="Step 4">
                                        <i class="bi bi-ui-checks size-20"></i>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content p-5" id="myTabContent">
                                <div class="tab-pane fade show active" role="tabpanel" id="step1"
                                     aria-labelledby="step1-tab">
                                    <div class="row flex-row">

                                        <div class="form-check col-5 shadow m-2 p-2 set-checked">
                                            <div class="d-flex justify-content-between p-3">
                                                <label class="form-check-label w-100" for="flexRadioDefault1">
                                                    Template 01
                                                </label>
                                                <input class="form-check-input" type="radio" name="template"
                                                       id="template">

                                            </div>
                                            <img src="<?= assets("themes/user/img/add-on-template/template-01.png") ?>"
                                                 class="w-100"/>
                                        </div>


                                        <div class="form-check col-5 shadow m-2 p-2 set-checked">

                                            <div class="d-flex justify-content-between p-3">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Template 02
                                                </label>
                                                <input class="form-check-input" type="radio" name="template"
                                                       id="template">
                                            </div>

                                            <img src="<?= assets("themes/user/img/add-on-template/template-02.png") ?>"
                                                 class="w-100"/>
                                        </div>
                                        <div class="form-check col-5 shadow m-2 p-2 set-checked">

                                            <div class="d-flex justify-content-between p-3">

                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Template 03
                                                </label>
                                                <input class="form-check-input" type="radio" name="template"
                                                       id="template">

                                            </div>

                                            <img src="<?= assets("themes/user/img/add-on-template/template-03.png") ?>"
                                                 class="w-100"/>
                                        </div>

                                    </div>
                                    <div class="d-flex justify-content-end gap-2">
                                        <a class="btn btn-primary next">Continue <i class="fas fa-angle-right"></i></a>
                                    </div>
                                </div>


                                <div class="tab-pane fade" role="tabpanel" id="step2" aria-labelledby="step4-tab">

                                    <div class="d-flex justify-content-between m-3">
                                        <label for="name" class="align-items-center">Title </label>
                                        <input name="name" type="text" class="form-control w-50 align-items-center" placeholder="Title" id="title"/>
                                    </div>
                                    <div class="d-flex justify-content-between m-3">
                                        <label for="name" class="align-items-center">Description </label>
                                        <textarea name="name" type="text" class="form-control w-50 align-items-center" placeholder="Description" id="title"></textarea>
                                    </div>


                                    <div class="d-flex justify-content-start gap-2">
                                        <a class="btn btn-secondary previous"><i class="bi bi-arrow-left"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Create</button>
            </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="editConnector" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Connector</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>

                    <div class="row  mb-3 w-100">
                        <div class="col-6">
                            <label for="name" class="form-label">Name :</label>
                            <input type="text" class="form-control" aria-label="name" id="name" name="name"
                                   value="Lv200">
                        </div>

                        <div class="col-6">
                            <label for="steel-grade" class="form-label">Steel grade :</label>
                            <input type="text" class="form-control" aria-label="steel-grade" id="steel-grade"
                                   name="steel-grade" value="S355J2">
                        </div>
                    </div>


                    <label for="steel-thickness" class="form-label">Steel thickness :</label>
                    <div class="row mb-3 w-100" id="steel-thickness">

                        <div class="col-12 d-flex gap-1">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="9">
                                <span class="input-group-text" placeholder="Recipient's username">mm</span>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control">
                                <span class="input-group-text" placeholder="Recipient's username">Tolerance</span>
                            </div>

                        </div>

                        <div class="col-12 d-flex gap-1">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="0.35">
                                <span class="input-group-text" placeholder="Recipient's username">inch</span>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control">
                                <span class="input-group-text" placeholder="Recipient's username">Tolerance</span>
                            </div>

                        </div>

                    </div>


                    <label for="steel-thickness" class="form-label">Weight :</label>
                    <div class="row mb-3 w-100" id="steel-thickness">

                        <div class="col-12 d-flex gap-1">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="25.3">
                                <span class="input-group-text" placeholder="Recipient's username">kg/m</span>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control">
                                <span class="input-group-text" placeholder="Recipient's username">Tolerance</span>
                            </div>

                        </div>

                        <div class="col-12 d-flex gap-1">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="182.99">
                                <span class="input-group-text" placeholder="Recipient's username">lbs/ft</span>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control">
                                <span class="input-group-text" placeholder="Recipient's username">Tolerance</span>
                            </div>

                        </div>

                    </div>


                    <label for="steel-thickness" class="form-label">Standard length :</label>
                    <div class="row mb-3 w-100" id="steel-thickness">

                        <div class="col-12 d-flex gap-1">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="11.8">
                                <span class="input-group-text" placeholder="Recipient's username">m</span>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="+0/-100 mm">
                                <span class="input-group-text" placeholder="Recipient's username">Tolerance</span>
                            </div>

                        </div>

                        <div class="col-12 d-flex gap-1">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="38.71">
                                <span class="input-group-text" placeholder="Recipient's username">inch</span>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="+0/-100 inch">
                                <span class="input-group-text" placeholder="Recipient's username">Tolerance</span>
                            </div>

                        </div>

                    </div>


                    <label for="steel-thickness" class="form-label">Max. tensile strength :</label>
                    <div class="row mb-3 w-100" id="steel-thickness">

                        <div class="input-group mb-1">
                            <input type="text" class="form-control" value="2552 kN/m">
                            <span class="input-group-text">kN/m</span>
                        </div>

                        <div class="d-flex gap-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                                FEM
                            </label>
                        </div>

                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Create</button>
            </div>
            </form>
        </div>
    </div>
</div>


<?php require_once basePath("views/admin/layout/middle_template.php") ?>
<?php require_once basePath("views/admin/layout/scripts.php"); ?>
<script>
    $(document).ready(function () {
        //Enable Tooltips
        var tooltipTriggerList = [].slice.call(
            document.querySelectorAll('[data-bs-toggle="tooltip"]')
        );
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        //Advance Tabs
        $(".next").click(function () {
            const nextTabLinkEl = $(".nav-tabs .active")
                .closest("li")
                .next("li")
                .find("a")[0];
            const nextTab = new bootstrap.Tab(nextTabLinkEl);
            nextTab.show();
        });

        $(".previous").click(function () {
            const prevTabLinkEl = $(".nav-tabs .active")
                .closest("li")
                .prev("li")
                .find("a")[0];
            const prevTab = new bootstrap.Tab(prevTabLinkEl);
            prevTab.show();
        });
    });

    $(document).on("click", ".set-checked", function () {

        $("input[name=template]").attr("checked", false);
        $(this).find("input[type=radio]").attr("checked", true);

    });

</script>
<?php require_once basePath("views/admin/layout/lower_template.php"); ?>

