<?php
    use helpers\translate\Translate;
    use helpers\pools\LanguagePool;
?>
<!doctype html>
<html lang="<?=Translate::getLang()?>">

<?php require_once basePath("views/user/layout/head.layout.php"); ?>

<link rel="stylesheet" href="<?= assets("themes/user/style-2.css") ?>"/>


<body>
<section class="ftco-section">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-6 col-12">
                <div class="wrap">

                    <div class="nav-logo w-100 mt-5">
                        <?php require_once basePath("views/user/layout/brand.layout.php") ?>
                    </div>


                    <div class="login-wrap p-4 p-md-5">

                        <div class="w-100 text-center">
                            <h3 class="mb-4">
                                <?= Translate::get("common", "register") ?>
                            </h3>
                        </div>

                        <ul class="text-center p-0 " style=" list-style-type: none;">
                            <li>
                                <u>
                                    <b>
                                        <?= Translate::get("register_page", "advantages_of_a_registration") ?>
                                    </b>
                                </u>
                            </li>
                            <li>
                                <?= Translate::get("register_page", "request_products_easily") ?>
                            </li>
                            <li>
                                <?= Translate::get("register_page", "save_your_requests_and_products") ?>
                            </li>
                            <li>
                                <?= Translate::get("register_page", "receive_latest_connector_information_via_newsletter") ?>
                            </li>
                        </ul>


                        <form action="<?=url('/register')?>" class="register-form pt-5">


                            <div class="form-group d-flex">
                                <div class="input-group-prepend w-25">
                                    <select class="form-select" name="title" aria-label="Default select example">
                                        <option selected value="Dr.">Dr.</option>
                                        <option value="Mr.">Mr.</option>
                                        <option value="Mrs.">Mrs.</option>
                                    </select></div>
                                <input type="text" class="form-control" name="name"
                                       placeholder="<?= strtoupper(Translate::get("user_info", "your_name")) ?>">
                                <label class="form-control-placeholder required-field" for="name">
                                    <?= Translate::get("user_info", "your_name") ?>
                                </label>

                            </div>

                            <div class="form-group mt-5">
                                <input type="text" class="form-control" name="job_position"
                                       placeholder="<?= strtoupper(Translate::get("user_info", "job_position")) ?>">
                                <label class="form-control-placeholder required-field" for="position">
                                    <?= Translate::get("user_info", "job_position") ?>
                                </label>
                            </div>
                            <div class="form-group mt-5">
                                <input type="text" class="form-control" name="division"
                                       placeholder="<?= strtoupper(Translate::get("user_info", "division")) ?>">
                                <label class="form-control-placeholder" for="division">
                                    <?= Translate::get("user_info", "division") ?>
                                </label>
                            </div>
                            <div class="form-group mt-5">
                                <input type="text" class="form-control" name="company_name"
                                       placeholder="<?= strtoupper(Translate::get("user_info", "company_name")) ?>">
                                <label class="form-control-placeholder" for="comp-name">
                                    <?= Translate::get("user_info", "company_name") ?>
                                </label>
                            </div>
                            <div class="form-group mt-5">
                                <input type="text" class="form-control" name="country_or_state"
                                       placeholder="<?= strtoupper(Translate::get("user_info", "country_state")) ?>">
                                <label class="form-control-placeholder required-field" for="country-state">
                                    <?= Translate::get("user_info", "country_state") ?>
                                </label>
                            </div>
                            <div class="form-group mt-5">
                                <input type="text" class="form-control" name="website"
                                       placeholder="<?= strtoupper(Translate::get("user_info", "website")) ?>">
                                <label class="form-control-placeholder" for="email">
                                    <?= Translate::get("user_info", "website") ?>
                                </label>
                            </div>
                            <div class="form-group mt-5">
                                <input type="text" class="form-control" name="phone"
                                       placeholder="<?= strtoupper(Translate::get("user_info", "phone")) ?>">
                                <label class="form-control-placeholder" for="phone">
                                    <?= Translate::get("user_info", "phone") ?>
                                </label>
                            </div>
                            <div class="form-group mt-5">
                                <input type="text" class="form-control" name="email"
                                       placeholder="<?= strtoupper(Translate::get("user_info", "email")) ?>">
                                <label class="form-control-placeholder required-field" for="email">
                                    <?= Translate::get("user_info", "email") ?>
                                </label>
                            </div>
                            <div class="form-group mt-5">
                                <input id="password" type="password" name="password" class="form-control"
                                       placeholder="<?= strtoupper(Translate::get("common", "password")) ?>">
                                <label class="form-control-placeholder required-field" for="password">
                                    <?= Translate::get("common", "password") ?>
                                </label>
                            </div>
                            <p class="text-danger text-center error-msg"></p>
                            <p class="text-success text-center success-msg"></p>

                            <div class="form-group d-flex gap-1 justify-content-center mb-0 w-100 flex-wrap">

                                <div>
                                    <input type="checkbox" class="form-check-input" name="newsletter_subscribe"
                                           checked>
                                </div>
                                <div>
                                    <span>
                                        <?= Translate::get("register_page", "subscribe_to_newsletter") ?>
                                    </span>
                                </div>
                                <br>
                                <small class="col-12 text-center">
                                    <?= Translate::get("register_page", "by_subscribing_you_will_automatically_receive_our_newsletter") ?>
                                </small>

                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary submit w-100"> <?= Translate::get("common", "register") ?></button>
                            </div>
                        </form>
                        <p class="text-center">
                            <?= Translate::get("register_page", "already_a_member") ?>
                            <a data-toggle="tab" href="<?= url("/login") ?>?lang=<?=Translate::getLang()?>">
                                <?= Translate::get("common", "login") ?>
                            </a></p>

                        <div class="w-100 d-flex justify-content-center mt-1 pt-5 gap-3 align-middle">
                            <a
                                    href="?lang=<?=LanguagePool::GERMANY()->getLabel()?>"
                                    title="<?=LanguagePool::GERMANY()->getLabel()?>"
                                    data-lang="<?=LanguagePool::GERMANY()->getLabel()?>"
                                    class="lang"
                            >
                                <img src="<?= assets("img/flags/de.png") ?>" height="25"
                                     class="flag
                                        <?= isset($_SESSION["lang"]) && $_SESSION["lang"] == LanguagePool::GERMANY()->getLabel()
                                            ? "selected-flag" : "" ?>"/>
                            </a>
                            <a
                                    href="?lang=<?=LanguagePool::UK_ENGLISH()->getLabel()?>"
                                    title="<?=LanguagePool::UK_ENGLISH()->getLabel()?>"
                                    data-lang="<?=LanguagePool::UK_ENGLISH()->getLabel()?>"
                                    class="lang"
                            >
                                <img src="<?= assets("img/flags/en-gb.png") ?>" height="25"
                                     class="flag
                                         <?= isset($_SESSION["lang"]) && $_SESSION["lang"] == LanguagePool::UK_ENGLISH()->getLabel()
                                            ? "selected-flag" : "" ?>"/>
                            </a>
                            <a
                                    href="?lang=<?=LanguagePool::US_ENGLISH()->getLabel()?>"
                                    title="<?=LanguagePool::US_ENGLISH()->getLabel()?>"
                                    data-lang="<?=LanguagePool::US_ENGLISH()->getLabel()?>"
                                    class="lang"
                            >
                                <img src="<?= assets("img/flags/en-us.png") ?>" height="25"
                                     class="flag
                                            <?= isset($_SESSION["lang"]) && $_SESSION["lang"] == LanguagePool::US_ENGLISH()->getLabel()
                                                ? "selected-flag" : "" ?>"/>
                            </a>
                            <a
                                    href="?lang=<?=LanguagePool::FRENCH()->getLabel()?>"
                                    title="<?=LanguagePool::FRENCH()->getLabel()?>"
                                    data-lang="<?=LanguagePool::FRENCH()->getLabel()?>"
                                    class="lang"
                            >
                                <img src="<?= assets("img/flags/fr.png") ?>" height="25"
                                     class="flag
                                            <?= isset($_SESSION["lang"]) && $_SESSION["lang"] == LanguagePool::FRENCH()->getLabel()
                                                ? "selected-flag" : "" ?>"/>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once basePath("views/user/layout/script.layout.php") ?>

<script>
    $(document).on("submit", ".register-form", async function (e) {
        e.preventDefault();

        const btn = $(this).find("button[type=submit]");
        const btnLabel = btn.text();
        loadButton(btn, "Login");
        const form = $(this);
        const URL = form.attr('action');
        const formData = form.serialize();
        try {

            let response = await makeAjaxCall(URL, formData);
            $(".success-msg").text(response.message);

            setTimeout(function () {
                window.location.href = "<?= url("/") ?>?alert=We have sent a verification email to your inbox. Please verify it to gain access to your account.";
            }, 1000)

        } catch (err) {
            err = JSON.parse(err);
            $(".error-msg").text(err.message);
            $("input[type=password]").val("");
            $("input").removeClass("is-invalid");
            $("input[name=" + err.errors.key + "]").addClass("is-invalid");
            resetButton(btn, btnLabel);
        }
    });


    $(document).on("keyup", "#password", function () {
        if ($(this).val().length < 8) {
            $(this).removeClass("is-valid");
            $(this).addClass("is-invalid");
            return;
        }
        $(this).removeClass("is-invalid");
        $(this).addClass("is-valid");

    });
</script>
</body>
</html>

