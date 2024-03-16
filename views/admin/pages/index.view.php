<?php

use helpers\translate\Translate;

?>
<?php require_once basePath("views/admin/layout/upper_template.php") ?>
<!--Place Your Content Here-->

<div class="row">
    <div class="card mb-4">

        <div class="card-body p-3">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="text-left">Category</th>
                    <th class="text-center">status</th>
                    <th class="text-center" style="width: 40px"></th>
                </tr>
                </thead>
                <tbody>

                <tr class="align-middle">
                    <td class="text-left">Earthwork <i class="bi bi-arrow-right text-success"></i> LARSSEN <i class="bi bi-arrow-right text-success"></i> Corner connectors </td>
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
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle">
                    <td class="text-left">Earthwork <i class="bi bi-arrow-right text-success"></i> LARSSEN <i class="bi bi-arrow-right text-success"></i> Omega corner </td>
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
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle">
                    <td class="text-left">Earthwork <i class="bi bi-arrow-right text-success"></i> BALL + SOCKET <i class="bi bi-arrow-right text-success"></i> US Corner </td>
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
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle">
                    <td class="text-left">Pipe pile steel walls <i class="bi bi-arrow-right text-success"></i> MF </td>
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
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle">
                    <td class="text-left">Pipe pile steel walls <i class="bi bi-arrow-right text-success"></i> MDF </td>
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
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle">
                    <td class="text-left">Pipe pile steel walls <i class="bi bi-arrow-right text-success"></i> FD </td>
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
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle">
                    <td class="text-left">Pipe pile steel walls <i class="bi bi-arrow-right text-success"></i> LPB </td>
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
                <h5 class="modal-title" id="exampleModalLabel">Create Connector</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form>


                    <div class="row">
                        <div class="col-12 mt-3">
                            <select class="form-select w-100 select2" name="category">
                                <option value="0" selected disabled>Select Category</option>
                                <option value="1">Earth Work > LARSSEN > Corner connectors</option>
                                <option value="2">Earth Work > LARSSEN > Omega corner connectors</option>
                                <option value="3">Earth Work > LARSSEN > T connectors</option>
                                <option value="3">ggggg</option>
                                <option value="3">ggggg</option>
                                <option value="3">wwewew</option>
                                <option value="3">ggggg</option>
                                <option value="3">sajaath</option>
                                <option value="3">ggggg</option>

                            </select>
                        </div>


                        <div class="col-12 d-flex justify-content-between mt-5">
                            <label for="name" class="align-items-center">Name </label>
                            <input name="name" type="text" class="form-control w-50 align-items-center" placeholder="Connector name" id="name"/>
                        </div>
                        <div class="col-12 d-flex justify-content-between mt-3">
                            <label for="steel_grade" class="align-items-center">Steel Grade</label>
                            <input name="steel_grade" type="text" class="form-control w-50 align-items-center" placeholder="Steel Grade" id="steel_grade"/>
                        </div>


                        <div class="col-12 d-flex justify-content-between mt-3">
                            <label for="description" class="align-items-center">Description</label>
                            <textarea name="description" type="text" class="form-control w-50" rows="3" placeholder="Description" id="description">

                            </textarea>

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

                    <hr class="mt-3">


                    <div class="col-12 mt-3">


                        <button class="btn w-100"
                                type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseExample"
                                aria-expanded="false" aria-controls="collapseExample">
                            Select Template <br/> <i class="bi bi-chevron-down"></i>                                </button>

                        <div class="collapse" id="collapseExample">
                            <div class="card card-body row flex-row">

                                <div class="form-check col-6">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Template 01
                                    </label>
                                    <img src="<?= assets("themes/user/img/template/template-01.png") ?>" class="w-100"/>
                                </div>
                                <div class="form-check col-6">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Template 02
                                    </label>
                                    <img src="<?= assets("themes/user/img/template/template-02.png") ?>" class="w-100"/>
                                </div>
                                <div class="form-check col-6">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Template 03
                                    </label>
                                    <img src="<?= assets("themes/user/img/template/template-03.png") ?>" class="w-100"/>
                                </div>
                                <div class="form-check col-6">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Template 04
                                    </label>
                                    <img src="<?= assets("themes/user/img/template/template-01.png") ?>" class="w-100"/>
                                </div>
                                <div class="form-check col-6">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Template 05
                                    </label>
                                    <img src="<?= assets("themes/user/img/template/template-01.png") ?>" class="w-100"/>
                                </div>
                                <div class="form-check col-6">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Template 06
                                    </label>
                                    <img src="<?= assets("themes/user/img/template/template-01.png") ?>" class="w-100"/>
                                </div>
                                <div class="form-check col-6">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Template 07
                                    </label>
                                    <img src="<?= assets("themes/user/img/template/template-01.png") ?>" class="w-100"/>
                                </div>

                                <button type="button" class="btn btn-primary my-4">Select</button>


                            </div>
                        </div>
                    </div>

                    <hr class="mt-3">

                    <div class="col-12">
                        <img src="<?= assets("themes/user/img/template/template-03.png") ?>" class="w-100"/
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
    $(document).ready(function (){
        $(".select2").select2({
            dropdownParent: $('#createConnector'),
            theme: 'bootstrap-5'
        });

    });
</script>
<?php require_once basePath("views/admin/layout/lower_template.php"); ?>

