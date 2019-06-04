<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300&display=swap" rel="stylesheet"> -->

    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Comparator</title>
</head>

<body>

    <?php

    include '../partials/scripts/set-manager.php';
    include '../partials/layout/navbar.php';

    ?>


    <div class="background">
        <!-- jumbotron-->

    </div>
    <div class=" jumbotron ">
        <div class="card-block">

            <!-- text trouver-->
            <div class="trouvez">
                <p class="massive text-center"> Trouvez votre séjour idéal <br><span class="text-danger"> et</span><br>
                    comparer les prix de différents sites web.</p>
            </div>

            <!--formulaire-->
            <div class="row formulaire">

                <form name="location-form" action="destination.php" method="get" class="col-xs-12 col-md-4 mx-auto">
                    <select onchange="location-form.submit()" name="location" class="form-control form-control-lg">

                        <option selected>Choisissez-votre destination</option>

                        <?= Manager::locationsOptions() ?>

                    </select>
                </form>
            </div>
        </div>

    </div>

    <!--------------------------------------------------------page 2-->
    <div class="destination">
        <h5 class="destination text-center">MALDIVES</h5>
    </div>
    <div class="container">
        <!-----carte generale-->
        <div class="row destinationcards">
            <img class="card-img-top" src="../assets/images/destinations/andalousie.jpg" alt="Card image">
            <div class="card-body">
                <div class="destination col-md-4" text-center>
                    <h6 class="card-title text-center">Club Med</h6>
                </div>
            </div>

            <p class="card-text col-md-4 col-xs-4">Some quick example text to build on the card title and make up the bulk of the card's content.
                t to build on the card title and make up the bulk of the card's content
            </p>
        </div>
    </div>
    <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>













    <!--------------------------------------------------------fin page 2-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>