<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300&display=swap" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed&display=swap" rel="stylesheet">

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



        <!-- animation----------------------------------------------------------------------->


        <div class="box">
            <h1>Découvrez le monde</h1>
        </div>

        <!-- fin animation----------------------------------------------------------------------->



        <!-- text trouver-->
        <div class="trouvez">
            <div class="card-block hover">

                <h4 class="massive text-center mt-4"><b> Trouvez votre séjour idéal <br><span class="text-danger"> et</span><br>
                        comparer les prix de différents sites web.</b></h4>

                <!--formulaire-->
                <div class="row formulaire selectiondestination mt-4">

                    <form name="location-form" action="destination.php" method="get" class="col-xs-12 col-md-4 mx-auto">
                        <select onchange="location-form.submit()" name="location" class="form-control form-control-lg">

                            <option selected>Choisissez-votre destination</option>

                            <?= Manager::locationsOptions(1) ?>

                        </select>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <div class="footer p-3">
        Emilie & Nico - Simplon
    </div>

    <!-----div de droite---------------------------------->



    <!--------------------------------------------------------fin page 2-->
    <script src="../assets/js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>