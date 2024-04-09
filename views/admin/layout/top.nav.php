<?php
use helpers\translate\Translate;
?>
<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid">

        <ul class="navbar-nav ms-auto">



            <li class="nav-item dropdown language-menu d-none">
                <a class="nav-link" data-bs-toggle="dropdown" href="#">
                    <img src="<?= assets("/img/flags/") ?><?= Translate::getLang() ?>.png" class="language-image rounded-circle shadow" alt="Language Image">

                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-1">

                    <a href="?lang=de" class="dropdown-item p-2">
                        <div class="d-flex">
                            <div class="flex-shrink-0"> <img src="<?= assets("/img/flags/de.png") ?>" alt="User Avatar" class="language-image rounded-circle me-3"> </div>
                            <div class="flex-grow-1">
                                <h4 class="dropdown-item-title">Duestch</h4>

                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="?lang=en" class="dropdown-item p-2">
                        <div class="d-flex">
                            <div class="flex-shrink-0"> <img src="<?= assets("/img/flags/en-us.png") ?>" alt="User Avatar" class="language-image rounded-circle me-3"> </div>
                            <div class="flex-grow-1">
                                <h4 class="dropdown-item-title">English</h4>

                            </div>
                        </div>
                    </a>


                </div>
            </li>

            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img src="<?= assets("themes/admin/img/default-user-img.jpg") ?>" class="user-image rounded-circle shadow" alt="User Image"> <span class="d-none d-md-inline"><?= $_SESSION["user"]->name ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <li class="user-header text-bg-primary background-primary">
                        <img src="<?= assets("themes/admin/img/default-user-img.jpg") ?>" class="rounded-circle shadow" alt="User Image">

                        <p> <?= $_SESSION["user"]->name ?></p>
                    </li>

                    <li class="user-footer d-flex justify-content-center">
                        <a href="<?= url("/logout") ?>" class="btn btn-default btn-flat float-end">Sign out</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>