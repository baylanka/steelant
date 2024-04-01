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
