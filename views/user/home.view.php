<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <title>Steel Wall</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css"
          integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous"/>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:wght@700&display=swap");

        :root {
            --blue: #1d357c;
            --white: #ffffff;
            --cyan: #00d6bb;
        }


        * {
            font-family: "Lato", sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
            margin: 0;
            padding: 0;
        }

        .selected {
            color: var(--cyan) !important;
        }

        .color-blue {
            color: var(--blue);
        }

        .color-white {
            color: var(--white);
        }

        .link {
            text-decoration: none;
            color: black;
        }

        /* NAV */
        .navbar {
            background-color: var(--white);
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

        .secondary-nav {
            background-color: var(--blue);
            color: white;
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .secondary-nav a {
            font-weight: 400;
            justify-content: space-evenly;
            color: white;
        }

        .secondary-nav a:hover {
            color: white;
        }

        /* NAV */

        /*LANDING IMAGE*/

        .footer {
            /*display: none;*/
            margin-top: 10%;
            color: white;
            background-color: var(--blue);
            padding: 5%;
        }

        .footer .disclaimer-text {
            padding-right: 15%;
        }

        .divider {
            height: 1px;
            width: 100%;
            background-color: #ffffff;
        }


        .category-name {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--blue);
        }


        @media (max-width: 575.98px) {
            .reveal-on-sm{
                visibility: visible !important;
            }


            .remove-on-sm {
                display: none;
            }


            .footer .disclaimer-text {
                padding-right: 0%;
            }

            .nav-logo{
                display: flex;
                flex-wrap: wrap;
                justify-content: space-around;
            }
        }

        @media (max-width: 768px) {
            .reveal-on-sm{
                visibility: visible !important;
            }
            .remove-on-sm {
                display: none;
            }


            .footer .disclaimer-text {
                padding-right: 0%;
            }
        }

        @media (min-width: 576px) {


        }

        @media (min-width: 768px) {

        }

        @media (min-width: 992px) {

        }

        @media (min-width: 1200px) {

        }
    </style>
</head>
<body>
<!--navbar section-->
<nav class="navbar fixed-top position-relative">

    <div class="container-fluid">
        <div class="text-center row position-relative reveal-on-sm p-2 invisible">
            <div class="col-4 mt-5 text-center">
                <img src="<?= assets("themes/user/img/menu.png") ?>"
                     type="button"
                     data-bs-toggle="offcanvas"
                     data-bs-target="#offcanvasNavbar"
                     aria-controls="offcanvasNavbar"
                     aria-label="Toggle navigation"
                     height="30"
                     alt="menu-image"
                /><br/>
                <span class="nav-text">Menu</span>
            </div>
        </div>

        <div class="nav-logo w-50">
            <img src="<?= assets("themes/user/img/logo.jpg") ?>" alt="SteelWall-logo"/>
            <h5>Schlossprofile für Spundwandbauwerke</h5>
        </div>

        <div class="text-center row position-relative reveal-on-sm p-2 invisible">

            <div class="col-md-4 mt-5 text-center">
                <img src="<?= assets("themes/user/img/user.png") ?>" height="30"/><br/>
                <span class="nav-text">Login</span>
            </div>

        </div>

        <div class="offcanvas offcanvas-start"
             tabindex="-1"
             id="offcanvasNavbar"
             aria-labelledby="offcanvasNavbarLabel">

            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
            </div>


            <div class="offcanvas-body">

                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link selected" aria-current="page" href="#">Connectors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Downloads</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sealant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Log-in</a>
                    </li>
                </ul>


            </div>
        </div>
    </div>

    <div class="secondary-nav remove-on-sm justify-content-between">
<div class="invisible">
 test
</div>
        <div class="nav">
            <a class="nav-link selected" aria-current="page" href="#">Connectors</a>
            <a class="nav-link" aria-current="page" href="#">Downloads</a>
            <a class="nav-link" aria-current="page" href="#">Gallery</a>
            <a class="nav-link" aria-current="page" href="#">Sealant</a>
            <a class="nav-link" aria-current="page" href="#">Contact</a>
        </div>

        <div class="invisible">
            test
        </div>
    </div>

</nav>
<!--navbar section-->


<!--body section-->
<div class="jumbotron w-100 p-0 m-0">

    <img src="<?= assets("themes/user/img/hero-image.png") ?>" class="w-100"/>

    <!--categories section-->
    <div class="row w-100 p-5">

        <div class="col-12 col-md-4 d-flex p-0">
            <div class="col-12 col-md-12 row" style="gap:1.8%;">

                <div class="col-3">
                    <img src="<?= assets("themes/user/img/category/Earth-work.png") ?>" height="60"/>
                </div>
                <div class="col-7">
                    <dl>
                        <p class="category-name">Earthwork</p>
                        <dt class="color-blue mb-2">LARSSEN</dt>
                        <dd><a href="#" class="link">Corner connectors</a></dd>
                        <dd><a href="#" class="link">Omega corner connectors</a></dd>
                        <dd><a href="#" class="link">T connectors</a></dd>
                        <dd><a href="#" class="link">Cross connectors</a></dd>
                        <dd><a href="#" class="link">Weld-on connectors</a></dd>

                        <dt class="color-blue mt-4 mb-2">BALL + SOCKET</dt>
                        <dd><a href="#" class="link">US Corner connectors</a></dd>
                        <dd><a href="#" class="link">US T connectors</a></dd>
                        <dd><a href="#" class="link">US Cross connectors</a></dd>
                        <dd><a href="#" class="link">MF connectors, weld-ons?</a></dd>

                        <dt class="color-blue mt-4 mb-2">COLD FORMED</dt>
                        <dd><a href="#" class="link">CF corner connector</a></dd>
                        <dd><a href="#" class="link">CF weld-on connector</a></dd>
                    </dl>

                </div>
                <div class="col-2"></div>

            </div>
        </div>

        <div class="col-12 col-md-8 d-flex flex-wrap">

            <div class="col-12 col-md-6 col-xxl-4 row gap-3">

                <div class="col-3">
                    <img src="<?= assets("themes/user/img/category/Pipe-pile-steel-walls.png") ?>" height="60"/>
                </div>
                <div class="col-7 p-0">
                    <dl>
                        <p class="category-name">Pipe pile steel walls</p>
                        <dd><a href="#" class="link">MF</a></dd>
                        <dd><a href="#" class="link">MDF</a></dd>
                        <dd><a href="#" class="link">LPB</a></dd>
                        <dd><a href="#" class="link">FD</a></dd>
                    </dl>

                </div>
                <div class="col-2"></div>

            </div>

            <div class="col-12 col-md-6 col-xxl-4 row gap-3">

                <div class="col-3">
                    <img src="<?= assets("themes/user/img/category/H-pile-steel-walls.png") ?>" height="60"/>
                </div>
                <div class="col-7 p-0">
                    <dl>
                        <p class="category-name">H-pile steel walls</p>
                        <dd><a href="#" class="link">MF</a></dd>
                        <dd><a href="#" class="link">MDF</a></dd>
                        <dd><a href="#" class="link">FD</a></dd>
                    </dl>

                </div>
                <div class="col-2"></div>

            </div>

            <div class="col-12 col-md-6 col-xxl-4 row gap-3">

                <div class="col-3">
                    <img src="<?= assets("themes/user/img/category/For-DTH-driving-method.png") ?>" height="60"/>
                </div>
                <div class="col-7 p-0">
                    <dl>
                        <p class="category-name">For DTH driving method</p>
                        <dd><a href="#" class="link">MF DTH</a></dd>
                    </dl>
                </div>
                <div class="col-2"></div>

            </div>


            <div class="col-12 col-md-6 col-xxl-4 row gap-3">

                <div class="col-3">
                    <img src="<?= assets("themes/user/img/category/H-pile-combined-walls.png") ?>" height="60"/>
                </div>
                <div class="col-7 p-0">
                    <dl>
                        <p class="category-name">H-pile combined walls</p>
                        <dd><a href="#" class="link">LPB (Larssen)</a></dd>
                        <dd><a href="#" class="link">MF (Ball + Socket)</a></dd>
                        <dd><a href="#" class="link">MDF (Ball + Socket)</a></dd>
                    </dl>

                </div>
                <div class="col-2"></div>

            </div>

            <div class="col-12 col-md-6 col-xxl-4 row gap-3">

                <div class="col-3">
                    <img src="<?= assets("themes/user/img/category/Pipe-pile-combined-walls.png") ?>" height="60"/>
                </div>
                <div class="col-7 p-0">
                    <dl>
                        <p class="category-name">Pipe pile combined walls</p>
                        <dd><a href="#" class="link">L (Larssen)</a></dd>
                        <dd><a href="#" class="link">LPB (Larssen)</a></dd>
                        <dd><a href="#" class="link">MF (Ball + Socket)</a></dd>
                        <dd><a href="#" class="link">MDF (Ball + Socket)</a></dd>
                        <dd><a href="#" class="link">CF (Cold Formed)</a></dd>
                    </dl>

                </div>
                <div class="col-2"></div>

            </div>

            <div class="col-12 col-md-6 col-xxl-4 row gap-3">

                <div class="col-3">
                    <img src="<?= assets("themes/user/img/category/Cell-structures.png") ?>" height="60"/>
                </div>
                <div class="col-7 p-0">
                    <dl>
                        <p class="category-name">Cell structures</p>
                        <dd><a href="#" class="link">FSC</a></dd>
                    </dl>

                </div>
                <div class="col-2"></div>

            </div>

        </div>

    </div>
    <!--categories section-->

    <div class="row w-100 p-5">


        <div class="col-sm-12 col-md-4 mt-3 col-lg-4">
            <img src="<?= assets("themes/user/img/gallery-1.png") ?>" class="img-fluid h-100 w-100">
        </div>


        <div class="col-sm-12 col-md-8 mt-3 col-lg-8">
            <img src="<?= assets("themes/user/img/gallery-2.png") ?>" class="img-fluid h-100 w-100">
        </div>


        <div class="col-sm-12 col-md-4 mt-3 col-lg-4">
            <img src="<?= assets("themes/user/img/gallery-1.png") ?>" class="img-fluid h-100 w-100">
        </div>


        <div class="col-sm-12 col-md-4 mt-3 col-lg-4">
            <img src="<?= assets("themes/user/img/gallery-1.png") ?>" class="img-fluid h-100 w-100">
        </div>

        <div class="col-sm-12 col-md-4 mt-3 col-lg-4">
            <img src="<?= assets("themes/user/img/gallery-1.png") ?>" class="img-fluid h-100 w-100">
        </div>

        <div class="col-sm-12 col-md-8 mt-3 col-lg-8">
            <img src="<?= assets("themes/user/img/gallery-2.png") ?>" class="img-fluid h-100 w-100">
        </div>


        <div class="col-sm-12 col-md-4 mt-3 col-lg-4">
            <img src="<?= assets("themes/user/img/gallery-1.png") ?>" class="img-fluid h-100 w-100">
        </div>


    </div>


</div>
<!--body section-->


<!--footer section-->
<div class="nav footer fixed-bottom position-relative">
    <h4>Disclaimer</h4>

    <p class="disclaimer-text">
        SteelWall connectors generally comply with the European standards and
        are manufactured by certified steel processing companies. All figures
        are approximate and may vary. Bar twists are possible up to 2 mm per
        meter. Tolerance of steel thickness Â±1 mm. Length tolerance up to Â±200
        mm. Degree details refer to the connector bar axes. Welding base of LPB
        and FD clutches can be straight or bevelled. We reserve the right to
        make technical changes. We refer to DIN EN 12063. Please check the sheet
        pile interlocks with a physical sample section of the desired connector
        for compatibility.
    </p>

    <span class="divider mt-5 mb-5"></span>

    <div class="row w-100">
        <div class="col-6 col-md-3">
            <h4>SteelWall</h4>

            <ul style="list-style-type: none; padding-left: 0;">
                <li><a href="#" class="text-decoration-none color-white">Imprint</a></li>
                <li><a href="#" class="text-decoration-none color-white">Privacy policy</a></li>
                <li><a href="#" class="text-decoration-none color-white">General terms and conditions</a></li>
                <li><a href="#" class="text-decoration-none color-white">Subscribe / unsubsribe newsletter</a></li>
                <li><a href="#" class="text-decoration-none color-white">Register</a></li>
            </ul>
        </div>

        <div class="col-6 col-md-2">
            <h4 class="mb-4">steelwall.eu</h4>

            <ul style="list-style-type: none; padding-left: 0;">

                <li><a href="#" class="text-decoration-none color-white">Africa</a></li>
                <li><a href="#" class="text-decoration-none color-white">Asia</a></li>
                <li><a href="#" class="text-decoration-none color-white">Europe</a></li>
                <li><a href="#" class="text-decoration-none color-white">India</a></li>
                <li><a href="#" class="text-decoration-none color-white">South America</a></li>

            </ul>
        </div>

        <div class="col-6 col-md-2">
            <h4 class="mb-4">steelwallus.com</h4>

            <ul style="list-style-type: none; padding-left: 0;">
                <li><a href="#" class="text-decoration-none color-white">North America</a></li>
                <li><a href="#" class="text-decoration-none color-white">Caribbean</a></li>
                <li><a href="#" class="text-decoration-none color-white">South East Asia</a></li>
                <li><a href="#" class="text-decoration-none color-white">Australia</a></li>
                <li><a href="#" class="text-decoration-none color-white">New Zealand</a></li>
            </ul>
        </div>


        <div class="col-6 col-md-5">
            <h4 class="mb-4">Follow Us</h4>

            <ul style="list-style-type: none; padding-left: 0;">
                <li><a href="#" class="text-decoration-none color-white">Facebook</a></li>
                <li><a href="#" class="text-decoration-none color-white">Instagram</a></li>
                <li><a href="#" class="text-decoration-none color-white">Youtube</a></li>
            </ul>
        </div>

    </div>


    <div class="row w-100">
        <div class="col-12 col-md-6">

            <ul style="list-style-type: none; padding-left: 0;">
                <li>Last website update: 08. Feb. 2024</li>
                <li>Copyright by SteelWall ISH GmbH</li>
                <li>Connectors designed by Richard Heindl</li>
            </ul>
        </div>


    </div>


</div>
<!--footer section-->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"
></script>
</body>
</html>
