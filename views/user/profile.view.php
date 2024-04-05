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
                    <img src="<?= assets("themes/user/img/user-icon.png") ?>" height="80"/>
                </div>
                <div class="col-md-2">
                    <dl>
                        <h4 class="color-blue selected">Profile</h4>
                    </dl>

                </div>

            </div>


        </div>
        <!--categories section-->


        <?php require_once "layout/sub_nav.layout.php" ?>
        <?php

        $user = $_SESSION["user"];

        ?>

        <div class="divider"></div>

        <div class="row justify-content-start my-5">
            <div class="col-12 col-md-6">

                <form action="<?= url("/user/update") ?>" method="POST" class="update-form">


                    <div class="form-group">
                        <label class="form-control-placeholder required-field" for="name">
                            <?= Translate::get("register_page", "your_name") ?>
                        </label>
                        <div class="d-flex">
                            <div class="input-group-prepend w-25">
                                <select class="form-select" name="title" aria-label="Default select example">
                                    <option <?= $user->title == "Dr." ? "selected" : "" ?> value="Dr.">Dr.</option>
                                    <option <?= $user->title == "Mr." ? "selected" : "" ?> value="Mr.">Mr.</option>
                                    <option <?= $user->title == "Mrs." ? "selected" : "" ?> value="Mrs.">Mrs.</option>
                                </select></div>
                            <input type="text" class="form-control" name="name" value="<?= $user->name ?>"
                                   placeholder="<?= strtoupper(Translate::get("register_page", "your_name")) ?>">

                        </div>

                    </div>

                    <div class="form-group mt-4">
                        <label class="form-control-placeholder required-field" for="position">
                            <?= Translate::get("register_page", "job_position") ?>
                        </label>
                        <input type="text" class="form-control" name="job_position" value="<?= $user->job_position ?>"
                               placeholder="<?= strtoupper(Translate::get("register_page", "job_position")) ?>">
                    </div>
                    <div class="form-group mt-4">
                        <label class="form-control-placeholder" for="division">
                            <?= Translate::get("register_page", "division") ?>
                        </label>
                        <input type="text" class="form-control" name="division" value="<?= $user->division ?>"
                               placeholder="<?= strtoupper(Translate::get("register_page", "division")) ?>">
                    </div>
                    <div class="form-group mt-4">
                        <label class="form-control-placeholder" for="comp-name">
                            <?= Translate::get("register_page", "company_name") ?>
                        </label>
                        <input type="text" class="form-control" name="company_name" value="<?= $user->company_name ?>"
                               placeholder="<?= strtoupper(Translate::get("register_page", "company_name")) ?>">
                    </div>
                    <div class="form-group mt-4">
                        <label class="form-control-placeholder required-field" for="country-state">
                            <?= Translate::get("register_page", "country_state") ?>
                        </label>
                        <input type="text" class="form-control" name="country_or_state"
                               value="<?= $user->country_or_state ?>"
                               placeholder="<?= strtoupper(Translate::get("register_page", "country_state")) ?>">
                    </div>
                    <div class="form-group mt-4">
                        <label class="form-control-placeholder" for="email">
                            <?= Translate::get("register_page", "website") ?>
                        </label>
                        <input type="text" class="form-control" name="website" value="<?= $user->website ?>"
                               placeholder="<?= strtoupper(Translate::get("register_page", "website")) ?>">
                    </div>
                    <div class="form-group mt-4">
                        <label class="form-control-placeholder" for="phone">
                            <?= Translate::get("register_page", "phone") ?>
                        </label>
                        <input type="text" class="form-control" name="phone" value="<?= $user->phone ?>"
                               placeholder="<?= strtoupper(Translate::get("register_page", "phone")) ?>">
                    </div>
                    <div class="form-group mt-4">
                        <label class="form-control-placeholder required-field" for="email">
                            <?= Translate::get("common", "email") ?>
                        </label>
                        <input type="text" class="form-control" name="email" value="<?= $user->email ?>"
                               placeholder="<?= strtoupper(Translate::get("common", "email")) ?>">
                    </div>

                    <p class="text-danger error-msg"></p>
                    <p class="text-success success-msg"></p>

                    <div class="w-100 d-flex mt-5">
                        <button type="submit" class="form-control btn btn-primary background-blue px-3 w-25">
                            Update
                        </button>
                    </div>
                </form>

            </div>
        </div>


        <div class="divider"></div>


        <div class="row justify-content-start my-5">
            <div class="col-12 col-md-6">

                <form action="<?= url("/user/update/password") ?>" class="update-password-form">


                    <div class="form-group mt-4">
                        <label class="form-control-placeholder required-field" for="old_password">
                            Old password
                        </label>
                        <input type="password" class="form-control" name="old_password" id="old_password">
                    </div>
                    <div class="form-group mt-4">
                        <label class="form-control-placeholder required-field" for="new_password">
                            New password
                        </label>
                        <input type="password" class="form-control" name="new_password" id="new_password">
                    </div>
                    <div class="form-group mt-4">
                        <label class="form-control-placeholder required-field" for="verify_password">
                            Verify password
                        </label>
                        <input type="password" class="form-control" name="verify_password" id="verify_password">
                    </div>

                    <p class="text-danger error-msg"></p>
                    <p class="text-success success-msg"></p>

                    <div class="w-100 d-flex mt-5">
                        <button type="submit" class="form-control btn btn-primary background-blue px-3 w-25">
                            Update
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>

</div>
<!--body section-->

<?php require_once "layout/end.layout.php" ?>

<script>

    $(document).on("submit", ".update-form", async function (e) {
        e.preventDefault();
        const btn = $(this).find("button[type=submit]");
        const btnLabel = btn.text();
        loadButton(btn, "Updating");
        const form = $(this);
        const URL = form.attr('action');
        const formData = form.serialize();
        try {
            let response = await makeAjaxCall(URL, formData);
            $(this).find(".success-msg").text(response.message);
            $(this).find("input").removeClass("is-invalid");
            $(this).find(".error-msg").text("");
            let data = response.data;
            for (let key in data) {
                $(this).find("input[name=" + key + "]").val(data[key]);
            }
            resetButton(btn, btnLabel);
        } catch (err) {
            err = JSON.parse(err);
            $(this).find(".error-msg").text(err.message);
            $("input").removeClass("is-invalid");
            $("input[name=" + err.errors.key + "]").addClass("is-invalid");
            resetButton(btn, btnLabel);
        }
    });

    $(document).on("keyup", "#new_password", function () {
        if ($(this).val().length < 8) {
            $(this).removeClass("is-valid");
            $(this).addClass("is-invalid");
            return;
        }
        $(this).removeClass("is-invalid");
        $(this).addClass("is-valid");

    });

    $(document).on("keyup", "#verify_password", function () {
        if ($(this).val() !== $("#new_password").val()) {
            $(this).removeClass("is-valid");
            $(this).addClass("is-invalid");
            return;
        }
        $(this).removeClass("is-invalid");
        $(this).addClass("is-valid");

    });

    $(document).on("submit", ".update-password-form", async function (e) {
        e.preventDefault();
        $(this).find(".success-msg").text("");
        const btn = $(this).find("button[type=submit]");
        const btnLabel = btn.text();
        loadButton(btn, "Updating");
        const form = $(this);
        const URL = form.attr('action');
        const formData = form.serialize();
        try {
            let response = await makeAjaxCall(URL, formData);
            $(this).find(".success-msg").text(response.message);
            $(this).find(".error-msg").text("");
            $(this).find("input").removeClass("is-valid");
            $(this).find("input").val("");
            resetButton(btn, btnLabel);
        } catch (err) {
            err = JSON.parse(err);
            $(this).find(".error-msg").text(err.message);
            resetButton(btn, btnLabel);
        }
    });

</script>
