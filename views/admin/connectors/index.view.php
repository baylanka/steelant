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
                        data-bs-target="#createConnector">Create Connector
                </button>
            </div>
        </div>
        <div class="card-body p-3">
            <table class="table table-striped">
                <thead>
                <tr class="text-center">
                    <th>Category</th>
                    <th>Name</th>
                    <th>Steel grade</th>
                    <th>Steel thickness</th>
                    <th>Standard length</th>
                    <th>Weight</th>
                    <!--                    <th>Max. tensile strength</th>-->
                    <th style="width: 40px"></th>
                </tr>
                </thead>
                <tbody>

                <tr class="align-middle">
                    <td class="text-left">Earthwork > LARSSEN > Corner connectors</td>
                    <td class="text-center">LV200</td>
                    <td class="text-center">S355J2</td>
                    <td class="text-center">9 mm</td>
                    <td class="text-center">11.8 m +0/-100 mm</td>
                    <td class="text-center">25.3 kg/m</td>
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
                    <td class="text-left">Earthwork > LARSSEN > Omega corner</td>
                    <td class="text-center">MF63</td>
                    <td class="text-center">S355J2</td>
                    <td class="text-center">12 mm</td>
                    <td class="text-center">8 m, 11.8 m</td>
                    <td class="text-center">4.76 kg/m</td>
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
                    <td class="text-left">Earthwork > BALL + SOCKET > US Corner</td>
                    <td class="text-center">LLS170</td>
                    <td class="text-center">S355J2</td>
                    <td class="text-center">8 mm</td>
                    <td class="text-center">8 m, 11.8 m</td>
                    <td class="text-center">17.63 kg/m</td>
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
                    <td class="text-left">Pipe pile steel walls > MF</td>
                    <td class="text-center">MF180a</td>
                    <td class="text-center">S355J2</td>
                    <td class="text-center">12 mm</td>
                    <td class="text-center">8 m, 11,8 m</td>
                    <td class="text-center">
                        <select class="m-1">
                            <option selected>M90</option>
                            <option value="1">F40</option>
                        </select>
                        4.76 kg/m
                    </td>
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
                <tr class="align-middle">
                    <td class="text-left">Pipe pile steel walls > MDF</td>
                    <td class="text-center">LLS135</td>
                    <td class="text-center">S355J2</td>
                    <td class="text-center">9 mm</td>
                    <td class="text-center">8 m, 11.8 m</td>
                    <td class="text-center">17.66 kg/m</td>
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
                    <td class="text-left">Pipe pile steel walls > FD</td>
                    <td class="text-center">LLS90</td>
                    <td class="text-center">S355J2</td>
                    <td class="text-center">9 mm</td>
                    <td class="text-center">8 m, 11.8 m</td>
                    <td class="text-center">17.66 kg/m</td>
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
                    <td class="text-left">Pipe pile steel walls > LPB</td>
                    <td class="text-center">MF75</td>
                    <td class="text-center">S355J2</td>
                    <td class="text-center">12 mm</td>
                    <td class="text-center">8 m, 11.8 m</td>
                    <td class="text-center">
                        <select class="m-1">
                            <option selected>M60</option>
                            <option value="1">F40</option>
                        </select>
                        4.76 kg/m
                    </td>
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
                <h5 class="modal-title" id="exampleModalLabel">Create Connector</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-2">
                <form>


                    <div class="container">
                        <div class="wizard my-2">
                            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                                <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Details">
                                    <a class="nav-link active rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                       href="#step1" id="step1-tab" data-bs-toggle="tab" role="tab"
                                       aria-controls="step1" aria-selected="true">
                                        <i class="bi bi-ui-checks size-20"></i>
                                    </a>
                                </li>


                                <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Templates">
                                    <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                       href="#step2" id="step4-tab" data-bs-toggle="tab" role="tab"
                                       aria-controls="step4" aria-selected="false" title="Step 4">
                                        <i class="bi bi-images size-20"></i>
                                    </a>
                                </li>


                                <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Template">
                                    <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                       href="#step3" id="step4-tab" data-bs-toggle="tab" role="tab"
                                       aria-controls="step4" aria-selected="false" title="Step 4">
                                        <i class="bi bi-card-image size-20"></i>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content p-5" id="myTabContent">

                                <div class="tab-pane fade show active" role="tabpanel" id="step1"
                                     aria-labelledby="step1-tab">


                                    <div class="row">
                                        <div class="col-12 mt-3">
                                            <select class="form-select w-100 select2" name="category">
                                                <option value="0" selected disabled>Select Category</option>
                                                <option value="1">Earth Work > LARSSEN > Corner connectors</option>
                                                <option value="2">Earth Work > LARSSEN > Omega corner connectors
                                                </option>
                                                <option value="3">Earth Work > LARSSEN > T connectors</option>
                                            </select>
                                        </div>


                                        <div class="col-12 d-flex justify-content-between mt-5">
                                            <label for="name" class="align-items-center">Name </label>
                                            <input name="name" type="text" class="form-control w-50 align-items-center"
                                                   placeholder="Connector name" id="name"/>
                                        </div>
                                        <div class="col-12 d-flex justify-content-between mt-3">
                                            <label for="steel_grade" class="align-items-center">Steel Grade</label>
                                            <input name="steel_grade" type="text"
                                                   class="form-control w-50 align-items-center"
                                                   placeholder="Steel Grade" id="steel_grade"/>
                                        </div>


                                        <div class="col-12 d-flex justify-content-between mt-3">
                                            <label for="description" class="align-items-center">Description</label>
                                            <textarea name="description" type="text" class="form-control w-50" rows="3"
                                                      placeholder="Description" id="description">

                                            </textarea>

                                        </div>

                                        <hr class="mt-3">

                                        <div class="col-12 d-flex justify-content-between mt-3">
                                            <label class="align-items-center">Steel Thickness</label>
                                            <div class="w-50 gap-1">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-text"
                                                          placeholder="Steel Thickness">mm</span>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-text"
                                                          placeholder="Steel Thickness">inch</span>
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
                                                    <button type="button" class="btn btn-danger"><i
                                                                class="bi bi-dash-lg"></i></button>
                                                    <button type="button" class="btn btn-primary"><i
                                                                class="bi bi-plus-lg"></i></button>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control ml-1" placeholder="label">
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-text" placeholder="Weight">lbs/ft</span>
                                                    <button type="button" class="btn btn-danger"><i
                                                                class="bi bi-dash-lg"></i></button>
                                                    <button type="button" class="btn btn-primary"><i
                                                                class="bi bi-plus-lg"></i></button>
                                                </div>

                                            </div>
                                        </div>

                                        <hr class="mt-3">

                                        <div class="col-12 d-flex justify-content-between mt-3">
                                            <label class="align-items-center">Standard length</label>
                                            <div class="w-50 gap-1">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-text"
                                                          placeholder="Steel Thickness">mm</span>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-text"
                                                          placeholder="Steel Thickness">inch</span>
                                                </div>

                                            </div>
                                        </div>

                                        <hr class="mt-3">

                                        <div class="col-12 mt-3">
                                            <label for="steel-thickness" class="form-label">Max. tensile strength
                                                :</label>
                                            <div class="input-group mb-1">
                                                <input type="text" class="form-control">
                                                <span class="input-group-text"
                                                      placeholder="Recipient's username">kN/m</span>
                                            </div>

                                            <div class="d-flex gap-2">
                                                <input class="form-check-input" type="checkbox" value=""
                                                       id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    FEM
                                                </label>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="d-flex justify-content-end gap-2 mt-3">
                                        <a class="btn btn-primary next">Continue <i class="fas fa-angle-right"></i></a>
                                    </div>
                                </div>

                                <div class="tab-pane fade" role="tabpanel" id="step2"
                                     aria-labelledby="step1-tab">
                                    <div class="row flex-row justify-content-around">

                                        <div class="form-check col-5 shadow m-2 p-2 set-checked">
                                            <div class="d-flex justify-content-between p-3">
                                                <label class="form-check-label w-100" for="flexRadioDefault1">
                                                    Template 01
                                                </label>
                                                <input class="form-check-input" type="radio" name="template"
                                                       id="template">

                                            </div>
                                            <img src="<?= assets("themes/user/img/template/template-01.png") ?>"
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

                                            <img src="<?= assets("themes/user/img/template/template-02.png") ?>"
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

                                            <img src="<?= assets("themes/user/img/template/template-03.png") ?>"
                                                 class="w-100"/>
                                        </div>


                                        <div class="form-check col-5 shadow m-2 p-2 set-checked">
                                            <div class="d-flex justify-content-between p-3">

                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Template 04
                                                </label>
                                                <input class="form-check-input" type="radio" name="template"
                                                       id="template">

                                            </div>
                                            <img src="<?= assets("themes/user/img/template/template-01.png") ?>"
                                                 class="w-100"/>
                                        </div>
                                        <div class="form-check col-5 shadow m-2 p-2 set-checked">
                                            <div class="d-flex justify-content-between p-3">

                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Template 05
                                                </label>
                                                <input class="form-check-input" type="radio" name="template"
                                                       id="template">

                                            </div>
                                            <img src="<?= assets("themes/user/img/template/template-01.png") ?>"
                                                 class="w-100"/>
                                        </div>
                                        <div class="form-check col-5 shadow m-2 p-2 set-checked">
                                            <div class="d-flex justify-content-between p-3">

                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Template 06
                                                </label>
                                                <input class="form-check-input" type="radio" name="template"
                                                       id="template">

                                            </div>
                                            <img src="<?= assets("themes/user/img/template/template-02.png") ?>"
                                                 class="w-100"/>
                                        </div>
                                        <div class="form-check col-5 shadow m-2 p-2 set-checked">
                                            <div class="d-flex justify-content-between p-3">

                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Template 07
                                                </label>
                                                <input class="form-check-input" type="radio" name="template"
                                                       id="template">

                                            </div>
                                            <img src="<?= assets("themes/user/img/template/template-03.png") ?>"
                                                 class="w-100"/>
                                        </div>


                                    </div>
                                    <div class="d-flex justify-content-between gap-2">
                                        <a class="btn btn-secondary previous"><i class="bi bi-arrow-left"></i></a>
                                        <a class="btn btn-primary next">Continue <i class="fas fa-angle-right"></i></a>
                                    </div>
                                </div>

                                <div class="tab-pane fade" role="tabpanel" id="step3">


                                    <div class="row my-5 w-100">

                                        <div class="col-12 col-md-4 col-xxl-4">
                                            <dl>
                                                <dt class="color-blue mb-2">ULTRA-S</dt>
                                                <dd class="mb-4">For Larssen sheet piles (U, Z, Hat-type)</dd>

                                                <dd class="custom-dd">Steel grade: S355J2</dd>
                                                <dd class="custom-dd">Steel thickness: 9 mm</dd>
                                                <dd class="custom-dd">Standard length: 11.8 m +0/-100 mm</dd>
                                                <dd class="custom-dd">Weight: 25.3 kg/m</dd>

                                                <dd class="my-5">ULTRA-S corner secti on can be driven individually up to
                                                    a length of 11.8 meters, provided that there are no weld
                                                    joints.</dd>

                                                <dd class="custom-dd"><a href="#" class="link color-black">Data sheet (PDF)</a></dd>
                                                <dd class="custom-dd"><a href="#" class="link color-black">DWG ULTRA-S</a></dd>
                                                <dd class="custom-dd"><a href="#" class="link color-black">DWG connector name 02</a></dd>
                                                <dd class="custom-dd"><a href="#" class="link color-black">Test report (PDF)</a></dd>
                                                <dd class="custom-dd"><a href="#" class="link color-black">FEM (PDF)</a></dd>
                                                <dd class="custom-dd"><a href="#" class="link color-black">Request this connector</a></dd>
                                                <dd class="custom-dd d-flex align-middle gap-3">
                                                    <a href="#" class="link color-black">Remember this connector</a>
                                                    <img class="align-self-center" src="<?= assets("themes/user/img/star.png") ?>" height="15"/>
                                                </dd>

                                            </dl>
                                        </div>

                                        <div class="col-12 col-md-8 col-xl-8 col-xxl-6 d-flex flex-column margin-top-sm">
                                            <div class="row justify-content-start">

                                                <div class="col-6 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                                                    <span class="color-blue">Corner connector</span><br>
                                                    <img class="img-fluid" src="<?= assets("themes/user/img/connector-image1.png") ?>"/>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                                                    <span class="color-blue">Larssen U</span><br>
                                                    <img class="img-fluid" src="<?= assets("themes/user/img/connector-image2.png") ?>"/>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                                                    <span class="color-blue">Larssen Z</span><br>
                                                    <img class="img-fluid" src="<?= assets("themes/user/img/connector-image2.png") ?>"/>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                                                    <span class="color-blue">Larssen Hat-type</span><br>
                                                    <img class="img-fluid" src="<?= assets("themes/user/img/connector-image3.png") ?>"/>
                                                </div>

                                            </div>

                                            <div class="row mt-2 justify-content-center">


                                                <div class="col-6 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                                                    <img class="img-fluid" src="<?= assets("themes/user/img/connector-image1.png") ?>"/>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                                                    <img class="img-fluid" src="<?= assets("themes/user/img/connector-image1.png") ?>"/>
                                                </div>


                                            </div>

                                        </div>

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
                <button type="button" class="btn btn-primary" disabled>Create</button>
            </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="editConnector" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Connector</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-2">
                <form>


                    <div class="container">
                        <div class="wizard my-2">
                            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                                <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Data">
                                    <a class="nav-link active rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                       href="#step1" id="step1-tab" data-bs-toggle="tab" role="tab"
                                       aria-controls="step1" aria-selected="true">
                                        <i class="bi bi-ui-checks size-20"></i>
                                    </a>
                                </li>


                                <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Template">
                                    <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                       href="#step2" id="step4-tab" data-bs-toggle="tab" role="tab"
                                       aria-controls="step4" aria-selected="false" title="Step 4">
                                        <i class="bi bi-border-style size-20"></i>
                                    </a>
                                </li>


                                <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Data">
                                    <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                       href="#step3" id="step4-tab" data-bs-toggle="tab" role="tab"
                                       aria-controls="step4" aria-selected="false" title="Step 4">
                                        <i class="bi bi-ui-checks size-20"></i>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content p-5" id="myTabContent">
                                <div class="tab-pane fade show active" role="tabpanel" id="step1"
                                     aria-labelledby="step1-tab">


                                    <div class="row">
                                        <div class="col-12 mt-3">
                                            <select class="form-select w-100 select2" name="category">
                                                <option value="0" selected disabled>Select Category</option>
                                                <option value="1">Earth Work > LARSSEN > Corner connectors</option>
                                                <option value="2">Earth Work > LARSSEN > Omega corner connectors
                                                </option>
                                                <option value="3">Earth Work > LARSSEN > T connectors</option>
                                            </select>
                                        </div>


                                        <div class="col-12 d-flex justify-content-between mt-5">
                                            <label for="name" class="align-items-center">Name </label>
                                            <input name="name" type="text" class="form-control w-50 align-items-center"
                                                   placeholder="Connector name" id="name"/>
                                        </div>
                                        <div class="col-12 d-flex justify-content-between mt-3">
                                            <label for="steel_grade" class="align-items-center">Steel Grade</label>
                                            <input name="steel_grade" type="text"
                                                   class="form-control w-50 align-items-center"
                                                   placeholder="Steel Grade" id="steel_grade"/>
                                        </div>


                                        <div class="col-12 d-flex justify-content-between mt-3">
                                            <label for="description" class="align-items-center">Description</label>
                                            <textarea name="description" type="text" class="form-control w-50" rows="3"
                                                      placeholder="Description" id="description">

                                            </textarea>

                                        </div>

                                        <hr class="mt-3">

                                        <div class="col-12 d-flex justify-content-between mt-3">
                                            <label class="align-items-center">Steel Thickness</label>
                                            <div class="w-50 gap-1">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-text"
                                                          placeholder="Steel Thickness">mm</span>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-text"
                                                          placeholder="Steel Thickness">inch</span>
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
                                                    <button type="button" class="btn btn-danger"><i
                                                                class="bi bi-dash-lg"></i></button>
                                                    <button type="button" class="btn btn-primary"><i
                                                                class="bi bi-plus-lg"></i></button>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control ml-1" placeholder="label">
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-text" placeholder="Weight">lbs/ft</span>
                                                    <button type="button" class="btn btn-danger"><i
                                                                class="bi bi-dash-lg"></i></button>
                                                    <button type="button" class="btn btn-primary"><i
                                                                class="bi bi-plus-lg"></i></button>
                                                </div>

                                            </div>
                                        </div>

                                        <hr class="mt-3">

                                        <div class="col-12 d-flex justify-content-between mt-3">
                                            <label class="align-items-center">Standard length</label>
                                            <div class="w-50 gap-1">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-text"
                                                          placeholder="Steel Thickness">mm</span>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-text"
                                                          placeholder="Steel Thickness">inch</span>
                                                </div>

                                            </div>
                                        </div>

                                        <hr class="mt-3">

                                        <div class="col-12 mt-3">
                                            <label for="steel-thickness" class="form-label">Max. tensile strength
                                                :</label>
                                            <div class="input-group mb-1">
                                                <input type="text" class="form-control">
                                                <span class="input-group-text"
                                                      placeholder="Recipient's username">kN/m</span>
                                            </div>

                                            <div class="d-flex gap-2">
                                                <input class="form-check-input" type="checkbox" value=""
                                                       id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    FEM
                                                </label>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="d-flex justify-content-end gap-2 mt-3">
                                        <a class="btn btn-primary next">Continue <i class="fas fa-angle-right"></i></a>
                                    </div>
                                </div>


                                <div class="tab-pane fade" role="tabpanel" id="step2"
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
                                            <img src="<?= assets("themes/user/img/template/template-01.png") ?>"
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

                                            <img src="<?= assets("themes/user/img/template/template-02.png") ?>"
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

                                            <img src="<?= assets("themes/user/img/template/template-03.png") ?>"
                                                 class="w-100"/>
                                        </div>


                                        <div class="form-check col-5 shadow m-2 p-2 set-checked">
                                            <div class="d-flex justify-content-between p-3">

                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Template 04
                                                </label>
                                                <input class="form-check-input" type="radio" name="template"
                                                       id="template">

                                            </div>
                                            <img src="<?= assets("themes/user/img/template/template-01.png") ?>"
                                                 class="w-100"/>
                                        </div>
                                        <div class="form-check col-5 shadow m-2 p-2 set-checked">
                                            <div class="d-flex justify-content-between p-3">

                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Template 05
                                                </label>
                                                <input class="form-check-input" type="radio" name="template"
                                                       id="template">

                                            </div>
                                            <img src="<?= assets("themes/user/img/template/template-01.png") ?>"
                                                 class="w-100"/>
                                        </div>
                                        <div class="form-check col-5 shadow m-2 p-2 set-checked">
                                            <div class="d-flex justify-content-between p-3">

                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Template 06
                                                </label>
                                                <input class="form-check-input" type="radio" name="template"
                                                       id="template">

                                            </div>
                                            <img src="<?= assets("themes/user/img/template/template-02.png") ?>"
                                                 class="w-100"/>
                                        </div>
                                        <div class="form-check col-5 shadow m-2 p-2 set-checked">
                                            <div class="d-flex justify-content-between p-3">

                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Template 07
                                                </label>
                                                <input class="form-check-input" type="radio" name="template"
                                                       id="template">

                                            </div>
                                            <img src="<?= assets("themes/user/img/template/template-03.png") ?>"
                                                 class="w-100"/>
                                        </div>


                                    </div>
                                    <div class="d-flex justify-content-end gap-2">
                                        <a class="btn btn-primary next">Continue <i class="fas fa-angle-right"></i></a>
                                    </div>
                                </div>

                                <div class="tab-pane fade" role="tabpanel" id="step3" aria-labelledby="step4-tab">

                                    <div class="d-flex justify-content-between m-3">
                                        <label for="name" class="align-items-center">Title </label>
                                        <input name="name" type="text" class="form-control w-50 align-items-center"
                                               placeholder="Title" id="title"/>
                                    </div>
                                    <div class="d-flex justify-content-between m-3">
                                        <label for="name" class="align-items-center">Description </label>
                                        <textarea name="name" type="text" class="form-control w-50 align-items-center"
                                                  placeholder="Description" id="title"></textarea>
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


<?php require_once basePath("views/admin/layout/middle_template.php") ?>
<?php require_once basePath("views/admin/layout/scripts.php"); ?>
<script>
    $(document).ready(function () {
        $(".select2").select2({
            dropdownParent: $('#createConnector'),
            theme: 'bootstrap-5'
        });

    });


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

