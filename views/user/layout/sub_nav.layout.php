<?php
use helpers\translate\Translate;
?>

<div class="row mb-2 justify-content-end">

    <div class="col-3 col-md-1 col-xl-1 col-xxl-1 text-center end-0">
        <a href="<?= url("/") ?>?lang=<?=Translate::getLang()?>">
            <img src="<?= assets("themes/user/img/home.png") ?>" height="30" alt="home-page">
            <br/>
            <a href="<?= url("/") ?>" class="nav-text text-decoration-none"><?= Translate::get("common","home") ?></a>
        </a>
    </div>

</div>