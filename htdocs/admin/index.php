<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- typo-->
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css?family=Cantarell&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Administration - Comparator</title>
</head>
<style>


</style>

<body>

    <?php

    include '../partials/scripts/set-manager.php';

    ?>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <!-- navbar logo noir-->
        <a class="navbar-brand" href="index.php">
            <img src="../assets/images/logo/logorond80.png" alt="obligatoire" width="50px" height="50px">
        </a></nav>



    <div class="logotextoiseau">
        <img class="logotext" src="../assets/images/logo/logotextfinal03062019.png" alt="logotext">
    </div>
    </nav>





    <div class="direction mt-5">
        <h3 class="massive text-center"> Bienvenue Administrateur </h3>
    </div>




    <!-- formulaire container-->

    <div class="container my-5 rounded fondcouleur cadreshadow">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 tableau administateur mt-4">
                <div class="formulaire">

                    <?= Admin::setOperatorsPage() ?>

                </div>
            </div>
        </div>
        <div class="row text-center">

            <div class="col-9"></div>
            <div class="col-12  d-flex justify-content-end my-3 mr-3">
                <div class="decalage button"> <a class="black" href="pages/operator.php?operator=new"><button type="button custom" class="btn btn-light btn-lg ">Ajouter un opérateur</button></a>
                </div>

            </div>
        </div>






    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>