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
            <div class="col-md-7 col-lg-5">
                <div class="wrap">

                    <div class="nav-logo w-100 mt-5">
                        <?php require_once basePath("views/user/layout/brand.layout.php") ?>
                    </div>


                    <div class="login-wrap p-4 p-md-5">

                        <div class="w-100 text-center">
                            <h3 class="mb-4">
                                <?= Translate::get("common","login") ?>
                            </h3>
                        </div>


                        <form action="<?=url('login')?>" class="signin-form">
                            <div class="form-group mt-5 email-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?= isset($_GET['mail']) ? $_GET['mail'] : "" ?>">
                                <label class="form-control-placeholder" for="email">
                                    <?= Translate::get("common","email") ?>
                                </label>

                            </div>

                            <div class="form-group mt-5">
                                <input id="password-field" type="password" name="password" class="form-control"
                                       placeholder="PASSWORD">
                                <label class="form-control-placeholder" for="password">
                                    <?= Translate::get("common","password") ?>
                                </label>
                                <span toggle="#password-field"
                                      class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <p class="text-danger text-center error-msg"></p>
                            <p class="text-success text-center success-msg"></p>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary submit w-100"><?= Translate::get("common","login") ?></button>
                            </div>

<!--                            <div class="w-100 text-center">-->
<!--                                <a href="#">-->
<!--                                    --><?php //= Translate::get("login_page", "forgot_password") ?>
<!--                                </a>-->
<!--                            </div>-->
                        </form>
                        <p class="text-center">
                            <?= Translate::get("login_page", "not_a_member") ?>
                            <a data-toggle="tab" href="<?= url("/register") ?>?lang=<?=Translate::getLang()?>">
                                <?= Translate::get("common", "register") ?>
                            </a>
                        </p>

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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once basePath("views/user/layout/script.layout.php") ?>

<script>

    $(document).on("submit", ".signin-form", async function (e) {
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
                if (response.auth) {
                    switch (response.data.type) {
                        case "admin":
                        case "developer":
                            window.location.href = "<?php

                                if (isset($_GET["redirect"])) {
                                    echo url("/" . $_GET["redirect"]);
                                } else {
                                    echo url("/admin/categories");
                                }

                                ?>";
                            break
                        case "user":
                            window.location.href = "<?php

                                if (isset($_GET["redirect"])) {
                                    echo url("/" . $_GET["redirect"]);
                                } else {
                                    echo url("/");
                                }

                                ?>";
                            break
                    }
                }
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


    <?php if( isset($_GET['mail_verified'])){ ?>

    $(".email-group").append(`<div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 0%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>`);

    $("button[type=submit]").attr("disabled",true);
    let percentage = 0;
    setInterval(function (){

        if(percentage == 100){
            $(".progress").after(` <div class="text-success">Email verified</div>`);
            $(".progress").remove();
            $("input[type=email]").addClass("is-valid");
            $("button[type=submit]").attr("disabled",false);
        }
        percentage += 10;

        if(percentage > 60){
            $(".progress-bar").removeClass("bg-info");
            $(".progress-bar").addClass("bg-success");
        }
        $(".progress-bar").css("width",percentage+"%")
    },300)

    <?php } ?>

</script>
</body>
</html>

