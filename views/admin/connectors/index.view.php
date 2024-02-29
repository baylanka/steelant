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
                <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal"
                        data-bs-target="#createConnector">Create Connector
                </button>
            </div>
        </div>
        <div class="card-body p-3">
            <table class="table table-striped">
                <thead>
                <tr class="text-center">
                    <th>Name</th>
                    <th>Steel grade</th>
                    <th>Steel thickness</th>
                    <th>Standard length</th>
                    <th>Weight</th>
                    <th>Max. tensile strength</th>
                    <th style="width: 40px"></th>
                </tr>
                </thead>
                <tbody>

                <tr class="align-middle text-center">
                    <td>LV200</td>
                    <td>S355J2</td>
                    <td>9 mm</td>
                    <td>11.8 m +0/-100 mm</td>
                    <td>25.3 kg/m</td>
                    <td>2552 kN/m (FEM)</td>
                    <td>
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
                <tr class="align-middle text-center">
                    <td>MF63</td>
                    <td>S355J2</td>
                    <td>12 mm</td>
                    <td>8 m, 11.8 m</td>
                    <td>4.76 kg/m</td>
                    <td>2552 kN/m (FEM)</td>
                    <td>
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
                <tr class="align-middle text-center">
                    <td>LLS170</td>
                    <td>S355J2</td>
                    <td>8 mm</td>
                    <td>8 m, 11.8 m</td>
                    <td>17.63 kg/m</td>
                    <td> -</td>
                    <td>
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
                <tr class="align-middle text-center">
                    <td>MF180a</td>
                    <td>S355J2</td>
                    <td>12 mm</td>
                    <td>8 m, 11,8 m</td>
                    <td>
                        <select class="m-1">
                            <option selected>M90</option>
                            <option value="1">F40</option>
                        </select>
                        4.76 kg/m
                    </td>
                    <td>3419 kN/m</td>
                    <td>
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
                <tr class="align-middle text-center">
                    <td>LLS135</td>
                    <td>S355J2</td>
                    <td>9 mm</td>
                    <td>8 m, 11.8 m</td>
                    <td>17.66 kg/m</td>
                    <td> -</td>
                    <td>
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
                <tr class="align-middle text-center">
                    <td>LLS90</td>
                    <td>S355J2</td>
                    <td>9 mm</td>
                    <td>8 m, 11.8 m</td>
                    <td>17.66 kg/m</td>
                    <td> -</td>
                    <td>
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
                <tr class="align-middle text-center">
                    <td>MF75</td>
                    <td>S355J2</td>
                    <td>12 mm</td>
                    <td>8 m, 11.8 m</td>
                    <td>
                        <select class="m-1">
                            <option selected>M60</option>
                            <option value="1">F40</option>
                        </select>
                        4.76 kg/m
                    </td>
                    <td>3419 kN/m</td>
                    <td>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Connector</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form>




                    <div class="row">
                        <div class="col-12 mt-3">
                            <select class="form-select w-100" aria-label="Default select example" name="category">
                                <option selected disabled>Select Category</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-12 d-flex justify-content-between mt-5">
                            <label for="name" class="align-items-center">Name </label>
                            <input name="name" type="text" class="form-control w-50 align-items-center" placeholder="Connector name" id="name"/>
                        </div>
                        <div class="col-12 d-flex justify-content-between mt-3">
                            <label for="steel_grade" class="align-items-center">Steel Grade</label>
                            <input name="steel_grade" type="text" class="form-control w-50 align-items-center" placeholder="Steel Grade" id="name"/>
                        </div>

                        <hr class="mt-3">

                        <div class="col-12 d-flex justify-content-between mt-3">
                            <label class="align-items-center">Steel Thickness</label>
                            <div class="w-50 gap-1">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control">
                                    <span class="input-group-text" placeholder="Steel Thickness">mm</span>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control">
                                    <span class="input-group-text" placeholder="Steel Thickness">inch</span>
                                </div>

                            </div>
                        </div>

                        <hr class="mt-3">

                        <div class="col-12 d-flex justify-content-between mt-3">
                            <label class="align-items-center">Weight</label>
                            <div class="w-75 gap-1">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control ml-1" placeholder="label">
                                    <input type="text" class="form-control">
                                    <span class="input-group-text" placeholder="Weight">kg/m</span>
                                    <button type="button" class="btn btn-danger"><i class="bi bi-dash-lg"></i></button>
                                    <button type="button" class="btn btn-primary"><i class="bi bi-plus-lg"></i></button>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control ml-1" placeholder="label">
                                    <input type="text" class="form-control">
                                    <span class="input-group-text" placeholder="Weight">lbs/ft</span>
                                    <button type="button" class="btn btn-danger"><i class="bi bi-dash-lg"></i></button>
                                    <button type="button" class="btn btn-primary"><i class="bi bi-plus-lg"></i></button>
                                </div>

                            </div>
                        </div>

                        <hr class="mt-3">

                        <div class="col-12 d-flex justify-content-between mt-3">
                            <label class="align-items-center">Standard length</label>
                            <div class="w-50 gap-1">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control">
                                    <span class="input-group-text" placeholder="Steel Thickness">mm</span>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control">
                                    <span class="input-group-text" placeholder="Steel Thickness">inch</span>
                                </div>

                            </div>
                        </div>

                    </div>


                    <label for="steel-thickness" class="form-label">Max. tensile strength :</label>
                    <div class="row mb-3 w-100" id="steel-thickness">

                        <div class="input-group mb-1">
                            <input type="text" class="form-control">
                            <span class="input-group-text" placeholder="Recipient's username">kN/m</span>
                        </div>

                        <div class="d-flex gap-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
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
                            <input type="text" class="form-control" aria-label="name" id="name" name="name" value="Lv200">
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
    //Place your javascript logics here
</script>
<?php require_once basePath("views/admin/layout/lower_template.php"); ?>

