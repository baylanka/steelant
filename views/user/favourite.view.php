<?php require_once "layout/start.layout.php" ?>

<!--body section-->
<div class="jumbotron w-100 p-0 m-0">

    <!--categories section-->
    <div class="row w-100 mt-4">


        <div class="col-12 col-md-4 col-xxl-4 row gap-3">
            <div class="col-md-3">
                <img src="<?= assets("themes/user/img/favourite-icon.png") ?>" height="100"/>
            </div>
            <div class="col-md-2">
                <dl>
                    <h4 class="color-blue selected">Favourites</h4>
                </dl>

            </div>

        </div>


    </div>
    <!--categories section-->


    <div class="d-flex w-100 justify-content-end mb-2 my-3">

        <div class="text-center end-0">
            <img src="<?= assets("themes/user/img/home.png") ?>" height="30">
            <br/>
            <span class="nav-text">Home</span>
        </div>


    </div>

    <div class="divider"></div>

    <h4 class="connector-heading my-3">Your requests</h4>

    <div class="divider"></div>

    <div class="d-flex justify-content-around my-4">

        <div>
            <h6 class="color-blue font-weight-700"> Project name</h6>
        </div>
        <div>
            <h6 class="color-blue font-weight-700"> Connector name</h6>
        </div>
        <div>
            <h6 class="color-blue font-weight-700"> Date / Time of request</h6>
        </div>
        <div>
            <h6 class="color-blue font-weight-700"> Amount (running m)</h6>
        </div>
        <div>
            <h6 class="color-blue font-weight-700"> Location</h6>
        </div>
        <div>
            <h6 class="color-blue font-weight-700"> Country / State</h6>
        </div>
        <div>
            <h6 class="color-blue font-weight-700"> Delete</h6>
        </div>
    </div>


    <div class="divider mb-5"></div>

    <div class="d-flex justify-content-around my-4">

        <div>
            <p> Hamburg harbour</p>
        </div>
        <div>
            <p> MF64</p>
        </div>
        <div>
            <p> 2024-02-29 / 12:34 h</p>
        </div>
        <div>
            <p> 500 running m</p>
        </div>
        <div>
            <p> Hamburg</p>
        </div>
        <div>
            <p> Germany</p>
        </div>
        <div>
            <p> Delete</p>
        </div>
    </div>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
        </tr>
        </tbody>
    </table>



</div>
<!--body section-->

<?php require_once "layout/end.layout.php" ?>
