<div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Connector</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body p-2">


            <div class="wizard my-2">

                <ul class="nav nav-tabs justify-content-around" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active rounded-circle mx-auto d-flex align-items-center justify-content-center"
                           id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab"
                           aria-controls="home" aria-selected="true">
                            <i class="bi bi-ui-radios size-20"></i>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                           id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab"
                           aria-controls="profile" aria-selected="false">
                            <i class="bi bi-download size-20"></i>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                           id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab"
                           aria-controls="contact" aria-selected="false">
                            <i class="bi bi-images size-20"></i>
                        </a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                           id="contact2-tab" data-bs-toggle="tab" data-bs-target="#contact2" type="button" role="tab"
                           aria-controls="contact2" aria-selected="false">
                            <i class="bi bi-card-image size-20"></i>
                        </a>
                    </li>
                </ul>


                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                        <div class="row w-100 p-5">

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
                                <label for="name" class="align-items-center">
                                    Name
                                </label>
                                <input name="name" type="text"
                                       class="form-control w-50 align-items-center"
                                       placeholder="Connector name" id="name"/>
                            </div>

                            <div class="col-12 d-flex justify-content-between mt-3">
                                <label for="steel_grade" class="align-items-center">
                                    Steel Grade
                                </label>
                                <input name="steel_grade" type="text"
                                       class="form-control w-50 align-items-center"
                                       placeholder="Steel Grade" id="steel_grade"/>
                            </div>

                            <div class="col-12 d-flex justify-content-between mt-3">
                                <label for="description" class="align-items-center">
                                    Description
                                </label>
                                <textarea name="description" type="text"
                                          class="form-control w-50" rows="3"
                                          placeholder="Description" id="description">
                                </textarea>
                            </div>

                            <hr class="mt-3">

                            <div class="col-12 d-flex justify-content-between mt-3">

                                <label class="align-items-center">
                                    Steel Thickness
                                </label>

                                <div class="w-50 gap-1">

                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control">
                                        <span class="input-group-text"
                                              placeholder="Steel Thickness">
                                            mm
                                        </span>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control">
                                        <span class="input-group-text"
                                              placeholder="Steel Thickness">
                                            inch
                                        </span>
                                    </div>

                                </div>

                            </div>

                            <hr class="mt-3">

                            <div class="col-12 d-flex justify-content-between mt-3">

                                <label class="align-items-center">
                                    Weight
                                </label>

                                <div class="w-50 gap-1">

                                    <div class="p-3 mt-3" style="border: #c2c1c1 solid 1px; border-radius:10px;">

                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control">
                                            <span class="input-group-text" placeholder="Weight">kg/m</span>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control">
                                            <span class="input-group-text" placeholder="Weight">lbs/ft</span>
                                        </div>

                                        <div class="input-group">
                                            <input type="text" class="form-control ml-1" placeholder="label">
                                            <span class="input-group-text" placeholder="Weight">label</span>
                                            <button type="button" class="btn btn-danger"><i
                                                        class="bi bi-dash-lg"></i></button>
                                            <button type="button" class="btn btn-primary"><i
                                                        class="bi bi-plus-lg"></i></button>
                                        </div>

                                    </div>

                                    <div class="p-3 mt-3" style="border: #c2c1c1 solid 1px; border-radius:10px;">

                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control">
                                            <span class="input-group-text" placeholder="Weight">kg/m</span>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control">
                                            <span class="input-group-text" placeholder="Weight">lbs/ft</span>
                                        </div>

                                        <div class="input-group">
                                            <input type="text" class="form-control ml-1" placeholder="label">
                                            <span class="input-group-text" placeholder="Weight">label</span>
                                            <button type="button" class="btn btn-danger"><i
                                                        class="bi bi-dash-lg"></i></button>
                                            <button type="button" class="btn btn-primary"><i
                                                        class="bi bi-plus-lg"></i></button>
                                        </div>

                                    </div>

                                    <div class="p-3 mt-3" style="border: #c2c1c1 solid 1px; border-radius:10px;">

                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control">
                                            <span class="input-group-text" placeholder="Weight">kg/m</span>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control">
                                            <span class="input-group-text" placeholder="Weight">lbs/ft</span>
                                        </div>

                                        <div class="input-group">
                                            <input type="text" class="form-control ml-1" placeholder="label">
                                            <span class="input-group-text" placeholder="Weight">label</span>
                                            <button type="button" class="btn btn-danger"><i
                                                        class="bi bi-dash-lg"></i></button>
                                            <button type="button" class="btn btn-primary"><i
                                                        class="bi bi-plus-lg"></i></button>
                                        </div>

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

                        <div class="d-flex justify-content-end gap-2 px-5">
                            <a class="btn btn-secondary next"><i class="bi bi-arrow-right"></i></a>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                        downloads

                        <div class="d-flex justify-content-between gap-2 px-5">
                            <a class="btn btn-secondary previous"><i class="bi bi-arrow-left"></i></a>
                            <a class="btn btn-secondary next"><i class="bi bi-arrow-right"></i></a>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                        <div class="row w-100 p-5 flex-row justify-content-around">

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

                        <div class="d-flex justify-content-between gap-2 px-5">
                            <a class="btn btn-secondary previous"><i class="bi bi-arrow-left"></i></a>
                            <a class="btn btn-secondary next"><i class="bi bi-arrow-right"></i></a>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact2-tab">


                        <div class="row w-100 p-5">

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
                                        joints.
                                    </dd>

                                    <dd class="custom-dd"><a href="#" class="link color-black">Data sheet (PDF)</a>
                                    </dd>
                                    <dd class="custom-dd"><a href="#" class="link color-black">DWG ULTRA-S</a></dd>
                                    <dd class="custom-dd"><a href="#" class="link color-black">DWG connector name
                                            02</a></dd>
                                    <dd class="custom-dd"><a href="#" class="link color-black">Test report (PDF)</a>
                                    </dd>
                                    <dd class="custom-dd"><a href="#" class="link color-black">FEM (PDF)</a></dd>
                                    <dd class="custom-dd"><a href="#" class="link color-black">Request this
                                            connector</a></dd>
                                    <dd class="custom-dd d-flex align-middle gap-3">
                                        <a href="#" class="link color-black">Remember this connector</a>
                                        <img class="align-self-center"
                                             src="<?= assets("themes/user/img/star.png") ?>" height="15"/>
                                    </dd>

                                </dl>
                            </div>

                            <div class="col-12 col-md-8 col-xl-8 col-xxl-6 d-flex flex-column margin-top-sm">
                                <div class="row justify-content-start">

                                    <div class="col-6 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                                        <span class="color-blue">Corner connector</span><br>
                                        <img class="img-fluid"
                                             src="<?= assets("themes/user/img/connector-image1.png") ?>"/>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                                        <span class="color-blue">Larssen U</span><br>
                                        <img class="img-fluid"
                                             src="<?= assets("themes/user/img/connector-image2.png") ?>"/>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                                        <span class="color-blue">Larssen Z</span><br>
                                        <img class="img-fluid"
                                             src="<?= assets("themes/user/img/connector-image2.png") ?>"/>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                                        <span class="color-blue">Larssen Hat-type</span><br>
                                        <img class="img-fluid"
                                             src="<?= assets("themes/user/img/connector-image3.png") ?>"/>
                                    </div>

                                </div>

                                <div class="row mt-2 justify-content-center">


                                    <div class="col-6 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                                        <img class="img-fluid"
                                             src="<?= assets("themes/user/img/connector-image1.png") ?>"/>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                                        <img class="img-fluid"
                                             src="<?= assets("themes/user/img/connector-image1.png") ?>"/>
                                    </div>


                                </div>

                            </div>

                        </div>

                        <div class="d-flex justify-content-start gap-2 px-5">
                            <a class="btn btn-secondary previous"><i class="bi bi-arrow-left"></i></a>
                        </div>

                    </div>

                </div>

            </div>


        </div>


        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" disabled>Create</button>
        </div>

    </div>
</div>


<script>

    $(document).ready(function () {


        $(document).off("click", ".next");
        $(document).on("click", ".next", function () {
            let e = $(".nav-tabs .active")
                .closest("li").next("li")
                .find("a")[0];
            if (e) {
                const prevTab = new bootstrap.Tab(e);
                prevTab.show();
            }
        });


        $(document).off("click", ".previous");
        $(document).on("click", ".previous", function () {
            let e = $(".nav-tabs .active")
                .closest("li").prev("li")
                .find("a")[0];
            if (e) {
                const prevTab = new bootstrap.Tab(e);
                prevTab.show();
            }
        });


        $(".select2").select2({
            dropdownParent: $('#' + modalId),
            theme: 'bootstrap-5'
        });

    });

    $(document).on("click", ".set-checked", function () {
        $("input[name=template]").attr("checked", false);
        $(this).find("input[type=radio]").attr("checked", true);

    });
</script>