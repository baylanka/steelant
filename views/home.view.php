<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css"
          integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous">


    <style>
        :root {
            --blue: #1d357c;
            --white: #ffffff;
        }

        .navbar {
            background-color: var(--white);
        }

        .navbar-toggler {
            border: none;
        }

        .navbar-toggler i {
            color: var(--blue);
            font-size: 2.5rem;
            font-weight: 800;
        }


        .nav-text {
            color: var(--blue);
            font-size: 0.7rem;
            font-weight: 800;
        }

        .nav-logo {
            text-align: center;
            color: var(--blue);
        }
    </style>

</head>
<body>

<?= $name ?>
<nav class="navbar  fixed-top">
    <div class="container-fluid">

        <div class="w-25">
            <button class="navbar-toggler mt-5" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar"
                    aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <i class="bi bi-list"></i><br/>
                <span class="nav-text">Menu</span>
            </button>
        </div>

        <div class="nav-logo w-50">
            <img src="views/assets/img/logo.jpg" width="300">
            <h4>Schlossprofile für Spundwandbauwerke</h4>
        </div>

        <div class="text-center position-relative mt-5 w-25 p-4">
            <div class="row w-50">
            <div class="col-4"><img src="views/assets/img/user.png" height="30"> <br/><span
                        class="nav-text">Login</span></div>
            <div class="col-4 text-center"><img src="views/assets/img/star.png" height="30"><br/><span class="nav-text">Favourite</span>
            </div>
            <div class="col-4"><img src="views/assets/img/flags/de.png" height="30"><br/><span
                        class="nav-text">Language</span></div>
            </div>
        </div>



        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
             aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex mt-3" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
</nav>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>