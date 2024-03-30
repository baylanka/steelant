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
                                    <?php foreach ($leafCategories as $leafCategory): ?>
                                        <option value="<?= $leafCategory->id ?>">
                                            <?= $leafCategory->treePathStr ?>
                                        </option>
                                    <?php endforeach; ?>
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

                                <div class="w-50 gap-1 weight-jumbo-container">


                                    <div class="p-3 mt-3 weight-container">

                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control">
                                            <span class="input-group-text" placeholder="Weight">metrics</span>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control">
                                            <span class="input-group-text" placeholder="Weight">imperial</span>
                                        </div>


                                        <div class="input-group justify-content-end mb-3">
                                            <button type="button" class="btn btn-light show-label-btn">
                                                <i class="bi bi-arrow-bar-left"></i>
                                            </button>

                                            <input type="text" class="form-control ml-1  label" placeholder="label">
                                            <span class="input-group-text" placeholder="Weight">label</span>
                                        </div>


                                        <div class="input-group justify-content-end">

                                            <button type="button" class="btn btn-primary add-new-weight-btn"><i
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


                        <div class="download-jumbotron w-100 d-flex flex-wrap justify-content-center gap-3 my-5">


                            <div class="download-container w-75 p-4">

                                <div class="input-group w-100 mb-3 justify-content-center">

                                    <label class="btn btn-light">
                                        <i class="bi bi-folder2-open"></i>
                                    </label>

                                    <input type="file" class="form-control w-50 bg-light" name="download-file[]">


                                    <button type="button" class="btn btn-primary add-new-download-container">
                                        <i class="bi bi-plus-lg"></i>
                                    </button>
                                </div>

                                <div class="d-flex flex-wrap gap-3 w-100">


                                    <div class="downloadable">
                                        <div class="input-group w-100">


                                            <label class="btn btn-light">
                                                <img src="<?= assets("img/flags/de.png") ?>"
                                                     height="20" class="flag"/>
                                            </label>

                                            <label class="btn btn-light">
                                                <input class="form-check-input download-label-visible " type="checkbox"
                                                       value="" id="flexCheckDefault">
                                            </label>
                                            <input class="form-control download-label"
                                                   placeholder="Label ( in Germany )" style="display: none;">


                                        </div>
                                    </div>


                                    <div class="downloadable">
                                        <div class="input-group w-100">


                                            <label class="btn btn-light">
                                                <img src="<?= assets("img/flags/en-gb.png") ?>"
                                                     height="20" class="flag"/>
                                            </label>

                                            <label class="btn btn-light">
                                                <input class="form-check-input download-label-visible" type="checkbox"
                                                       value="" id="flexCheckDefault">
                                            </label>
                                            <input class="form-control download-label"
                                                   placeholder="Label ( in English )" style="display: none;">


                                        </div>
                                    </div>


                                    <div class="downloadable">
                                        <div class="input-group w-100">


                                            <label class="btn btn-light">
                                                <img src="<?= assets("img/flags/fr.png") ?>"
                                                     height="20" class="flag"/>
                                            </label>

                                            <label class="btn btn-light">
                                                <input class="form-check-input download-label-visible" type="checkbox"
                                                       value="" id="flexCheckDefault">
                                            </label>
                                            <input class="form-control download-label"
                                                   placeholder="Label ( in French )" style="display: none;">


                                        </div>
                                    </div>

                                    <div class="downloadable">
                                        <div class="input-group w-100">


                                            <label class="btn btn-light">
                                                <img src="<?= assets("img/flags/en-us.png") ?>"
                                                     height="20" class="flag"/>
                                            </label>

                                            <label class="btn btn-light">
                                                <input class="form-check-input download-label-visible" type="checkbox"
                                                       value="" id="flexCheckDefault">
                                            </label>
                                            <input class="form-control download-label"
                                                   placeholder="Label ( in English )" style="display: none;">


                                        </div>
                                    </div>


                                </div>

                            </div>


                        </div>


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
                    <div class="tab-pane fade p-2" id="contact2" role="tabpanel" aria-labelledby="contact2-tab">

                        <nav>
                            <div class="nav nav-tabs justify-content-center mt-5" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-de-tab" data-bs-toggle="tab" data-bs-target="#nav-de" type="button" role="tab" aria-controls="nav-de" aria-selected="true">
                                    <img src="<?= assets("img/flags/de.png") ?>" height="25" class="flag"/>
                                </button>

                                <button class="nav-link" id="nav-uk-tab" data-bs-toggle="tab" data-bs-target="#nav-uk" type="button" role="tab" aria-controls="nav-uk" aria-selected="false">
                                    <img src="<?= assets("img/flags/en-gb.png") ?>" height="25" class="flag"/>
                                </button>
                                <button class="nav-link" id="nav-fr-tab" data-bs-toggle="tab" data-bs-target="#nav-fr" type="button" role="tab" aria-controls="nav-fr" aria-selected="false">
                                    <img src="<?= assets("img/flags/fr.png") ?>" height="25" class="flag"/>
                                </button>

                                <button class="nav-link" id="nav-us-tab" data-bs-toggle="tab" data-bs-target="#nav-us" type="button" role="tab" aria-controls="nav-us" aria-selected="false">
                                    <img src="<?= assets("img/flags/en-us.png") ?>" height="25" class="flag"/>
                                </button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-de" role="tabpanel" aria-labelledby="nav-de-tab">
                                <?php require basePath("/views/templates/template-01.php") ?>
                            </div>
                            <div class="tab-pane fade " id="nav-uk" role="tabpanel" aria-labelledby="nav-uk-tab">
                                <?php require basePath("/views/templates/template-01.php") ?>
                            </div>
                            <div class="tab-pane fade " id="nav-fr" role="tabpanel" aria-labelledby="nav-fr-tab">
                                <?php require basePath("/views/templates/template-01.php") ?>
                            </div>

                            <div class="tab-pane fade " id="nav-us" role="tabpanel" aria-labelledby="nav-us-tab">
                                <?php require basePath("/views/templates/template-01.php") ?>
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


        $("input.label").hide();


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


        // WEIGHT
        $(document).off("click", ".show-label-btn");
        $(document).on("click", ".show-label-btn", function () {

            let input = $(this).closest("div.weight-container").find("input.label");

            if (input.hasClass("showed")) {
                input.hide();
                input.removeClass("showed");
                $(this).html(`<i class="bi bi-arrow-bar-left"></i>`);
            } else {
                input.show();
                input.addClass("showed");
                $(this).html(`<i class="bi bi-arrow-bar-right"></i>`);
            }

        });

        $(document).off("click", ".add-new-weight-btn");
        $(document).on("click", ".add-new-weight-btn", function () {
            $(this).closest("div.weight-jumbo-container").append(`

               <div class="p-3 mt-3 weight-container">

                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control">
                                            <span class="input-group-text" placeholder="Weight">metrics</span>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control">
                                            <span class="input-group-text" placeholder="Weight">imperial</span>
                                        </div>


                                        <div class="input-group justify-content-end mb-3">

                                           <input type="text" class="form-control ml-1" placeholder="label">
                                            <span class="input-group-text" placeholder="Weight">label</span>
                                        </div>


                                        <div class="input-group justify-content-end">
                                            <button type="button" class="btn btn-danger remove-weight-btn"><i
                                                        class="bi bi-dash-lg"></i></button>
                                            <button type="button" class="btn btn-primary add-new-weight-btn"><i
                                                        class="bi bi-plus-lg"></i></button>
                                        </div>

                                    </div>


            `);
        });


        $(document).off("click", ".remove-weight-btn");
        $(document).on("click", ".remove-weight-btn", function () {
            $(this).closest("div.weight-container").remove();
        })
        // WEIGHT


        // DOWNLOADS


        $(document).on("change", ".download-label-visible", function () {

            let label = $(this).closest("div.downloadable").find("input.download-label");

            if ($(this).is(":checked")) {
                label.show("1000");
                label.attr("disabled", false);
            } else {
                label.hide("1000");
                label.attr("disabled", true);
            }

        });


        $(document).on("click", ".add-new-download-container", function () {

            $(this).closest("div.download-jumbotron").append(`
                          <div class="download-container w-75 p-4">

                                <div class="input-group w-100 mb-3 justify-content-center">

                                    <label class="btn btn-light">
                                        <i class="bi bi-folder2-open"></i>
                                    </label>

                                    <input type="file" class="form-control w-50 bg-light" name="download-file[]">


                                    <button type="button" class="btn btn-primary add-new-download-container">
                                        <i class="bi bi-plus-lg"></i>
                                    </button>
                                </div>

                                <div class="d-flex flex-wrap gap-3 w-100">


                                    <div class="downloadable">
                                        <div class="input-group w-100">


                                        <label class="btn btn-light">
                                            <img src="<?= assets("img/flags/de.png") ?>"
                                                 height="20" class="flag"/>
                                        </label>

                                        <label class="btn btn-light">
                                            <input class="form-check-input download-label-visible " type="checkbox" value="" id="flexCheckDefault">
                                        </label>
                                        <input class="form-control download-label" placeholder="Label ( in Germany )" style="display: none;">


                                    </div>
                                    </div>


                                    <div class="downloadable">
                                        <div class="input-group w-100">


                                            <label class="btn btn-light">
                                                <img src="<?= assets("img/flags/en-gb.png") ?>"
                                                     height="20" class="flag"/>
                                            </label>

                                            <label class="btn btn-light">
                                                <input class="form-check-input download-label-visible" type="checkbox" value="" id="flexCheckDefault">
                                            </label>
                                            <input class="form-control download-label" placeholder="Label ( in English )" style="display: none;">


                                        </div>
                                    </div>


                                    <div class="downloadable">
                                        <div class="input-group w-100">


                                            <label class="btn btn-light">
                                                <img src="<?= assets("img/flags/fr.png") ?>"
                                                     height="20" class="flag"/>
                                            </label>

                                            <label class="btn btn-light">
                                                <input class="form-check-input download-label-visible" type="checkbox" value="" id="flexCheckDefault">
                                            </label>
                                            <input class="form-control download-label" placeholder="Label ( in French )" style="display: none;">


                                        </div>
                                    </div>

                                    <div class="downloadable">
                                        <div class="input-group w-100">


                                            <label class="btn btn-light">
                                                <img src="<?= assets("img/flags/en-us.png") ?>"
                                                     height="20" class="flag"/>
                                            </label>

                                            <label class="btn btn-light">
                                                <input class="form-check-input download-label-visible" type="checkbox" value="" id="flexCheckDefault">
                                            </label>
                                            <input class="form-control download-label" placeholder="Label ( in English )" style="display: none;">


                                        </div>
                                    </div>


                                </div>

                            </div>
            `);


            $(this).closest("div.input-group").append(`
               <button type="button" class="btn btn-danger remove-download-container">
                  <i class="bi bi-dash"></i>
               </button>
            `);

            $(this).remove();

        });


        $(document).on("click", "button.remove-download-container", function () {

            $(this).closest("div.download-container").remove();

        });


        // DOWNLOADS


        $(document).on("click", ".set-checked", function () {
            $("input[name=template]").attr("checked", false);
            $(this).find("input[type=radio]").attr("checked", true);

        });


    });



</script>
<script src="<?= assets("js/template-render.js") ?>"></script>
<!--<script src="--><?php //= assets("js/template-render.min.js") ?><!--"></script>-->