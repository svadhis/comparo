<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>*</title>
</head>
<style>


</style>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <!-- navbar logo noir-->
        <a class="navbar-brand" href="index.php">
            <img src="../assets/images/logo/logorond80.png" alt="obligatoire" width="50px" height="50px">
        </a></nav>



    <!-- logo oiseu grand-->
    <div class="logotextoiseau">
        <a href="../">
            <img class="logotext" src="../assets/images/logo/logotextfinal03062019.png" alt="logotext">
        </a>
    </div>
    </nav>



    <div class="direction mt-5">
        <h3 class="massive text-center"> Opérateur </h3>
    </div>

    </div>


    <div class="container">


        <?php
        include '../../partials/scripts/set-manager.php';

        $operator = Admin::setEditOperatorPage($_GET['operator']);

        $isPremium = Admin::setIsPremium($operator);

        $inputData = $operator->id() == 0 ? 'placeholder' : 'value';

        $buttonText = $operator->id() == 0 ? "Créer l'opérateur" : "Mettre à jour l'opérateur";

        // Get destinations
        $destinations = Manager::getDestinationsByOperator($operator->id());

        $allDestinations = Admin::createDestinations($destinations);

        $destinationsTable = Admin::listDestinationsByOperator($allDestinations, $operator->id());

        // Show destinations if editing
        $destinations = $operator->id() == 'new' ? '' : '<div class="col-sm-12 offset-md-2 col-md-5 rounded fondcouleur cadreshadow p-3">
                                                        ' . $destinationsTable . '
                                                        </div>';

        $formCol = $operator->id() == 'new' ? 'offset-md-3 col-md-6' : 'col-md-5';

        ?>

        <!-- nouvel operateur -->
        <!-- <div class="row mt-4">
            <div class="col-4"> -->

        <div class="container my-5 ">
            <div class="row">

                <div class="col-sm-12 <?= $formCol ?> rounded fondcouleur operatorcards p-3">


                    <form action="edit-operator.php" method="get">
                        <div class="form-group">
                            <label for="usr">Nom :</label>
                            <input type="text" class="form-control" id="usr" name="name" <?= $inputData ?>="<?= $operator->name() ?>">

                            <div class="premium mt-4">
                                <div class="d-inline ">
                                    <div class='operatorpremium'>
                                        Premium
                                    </div>
                                </div>
                                <!-- option premium-->
                                <!-- <div class="d-flex justify-content-center"> -->
                                <div class="point mt-3">
                                    <label class="radio-inline"><input type="radio" name="premium" value="1" <?= $isPremium['yes'] ?>>oui</label>
                                    <label class="radio-inline"><input type="radio" name="premium" value="0" <?= $isPremium['no'] ?>>non</label>
                                </div>
                            </div>
                            <!-- </div> -->
                        </div> <!-- liens-->


                        <div class="liens mt-4S">
                            <div class="form-group">
                                <label for="usr">Lien:</label>
                                <input type="text" class="form-control" id="usr" name="link" <?= $inputData ?>="<?= $operator->link() ?>">
                            </div>
                        </div>

                        <input type="hidden" name="id" value="<?= $operator->id() ?>">

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg mb-4 rajoutdestination"><?= $buttonText ?></button>
                        </div>
                    </form>
                </div>

                <?= $destinations ?>

            </div>
            <!-- bouton-->
            <!-- <button type="button" class="btn btn-primary active">Ajouter</button> -->


            <!-- <div class="form-group">
                    <label for="comment">Ajouter une destination:</label>
                    <textarea class="form-control" rows="5" id="comment"></textarea>
                </div> -->



        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>