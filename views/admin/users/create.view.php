<?php

use helpers\translate\Translate;

?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">


        <form action="<?= url("/admin/users/create") ?>" method="POST" class="create-form">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">

                <div class="form-group">
                    <label class="form-control-placeholder required-field" for="position">
                        User Type
                    </label>
                    <select class="form-select" name="type" aria-label="Default select example">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                        <option value="developer">Developer</option>
                    </select>
                </div>
                <div class="form-group mt-4">
                    <label class="form-control-placeholder required-field" for="name">
                        Name
                    </label>
                    <div class="d-flex">
                        <div class="input-group-prepend w-25">
                            <select class="form-select" name="title" aria-label="Default select example">
                                <option value="Dr.">Dr.</option>
                                <option value="Mr.">Mr.</option>
                                <option value="Mrs.">Mrs.</option>
                            </select>
                        </div>
                        <input type="text" class="form-control" name="name">

                    </div>

                </div>

                <div class="form-group mt-4">
                    <label class="form-control-placeholder required-field" for="position">
                        Job / Position
                    </label>
                    <input type="text" class="form-control" name="job_position">
                </div>
                <div class="form-group mt-4">
                    <label class="form-control-placeholder" for="division">
                        Division
                    </label>
                    <input type="text" class="form-control" name="division">
                </div>
                <div class="form-group mt-4">
                    <label class="form-control-placeholder" for="comp-name">
                        Company Name
                    </label>
                    <input type="text" class="form-control" name="company_name">
                </div>
                <div class="form-group mt-4">
                    <label class="form-control-placeholder required-field" for="country-state">
                        Country / State
                    </label>
                    <input type="text" class="form-control" name="country_or_state">
                </div>
                <div class="form-group mt-4">
                    <label class="form-control-placeholder" for="email">
                        Website
                    </label>
                    <input type="text" class="form-control" name="website">
                </div>
                <div class="form-group mt-4">
                    <label class="form-control-placeholder" for="phone">
                        Phone
                    </label>
                    <input type="text" class="form-control" name="phone">
                </div>
                <div class="form-group mt-4">
                    <label class="form-control-placeholder required-field" for="email">
                        Email
                    </label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="form-group mt-5">
                    <label class="form-control-placeholder required-field" for="password">
                        Password
                    </label>
                    <input id="password" type="password" name="password" class="form-control"
                           value="<?= bin2hex(openssl_random_pseudo_bytes(8)) ?>">
                </div>


                <small class="mt-4">Credentials will be sent through the mail.</small>


                <p class="text-danger error-msg"></p>
                <p class="text-success success-msg"></p>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary background-blue">Create</button>
            </div>
        </form>
    </div>
</div>


<script>
    $(document).off("submit", ".create-form");
    $(document).on("submit", ".create-form", async function (e) {
        e.preventDefault();
        const btn = $(this).find("button[type=submit]");
        const btnLabel = btn.text();
        loadButton(btn, "Creating");
        const form = $(this);
        const URL = form.attr('action');
        const formData = form.serialize();
        try {
            let response = await makeAjaxCall(URL, formData);
            $(this).find(".success-msg").text(response.message);
            $(this).find("input").removeClass("is-invalid");
            $(this).find(".error-msg").text("");
            let data = response.data;

            let user_type_color = "";
            switch (data.type) {
                case "admin": 
                    user_type_color = "primary";
                    break;
                case "developer":
                    user_type_color = "secondary";
                    break;
                default:
                    user_type_color = "info";
                    break;
            }

        location.reload();
        } catch (err) {
            err = JSON.parse(err);
            $(this).find(".success-msg").text("");
            $(this).find(".error-msg").text(err.message);
            $("input").removeClass("is-invalid");
            $("input[name=" + err.errors.key + "]").addClass("is-invalid");
            resetButton(btn, btnLabel);
        }
    });
</script>