<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cantarell&display=swap" rel="stylesheet">
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



    <div class="logotextoiseau">
        <a href="../">
            <img class="logotext" src="../assets/images/logo/logotextfinal03062019.png" alt="logotext">
        </a>
    </div>
    </nav>
    </nav>


    <!-- text trouver-->
    <div class="trouverdestinations">
        <div class="trouvez mt-5">
            <h3 class="massive text-center texteformulaire "> Destinations </h4>
        </div>
    </div>

    <!-- choix de container-->
    <div class="container-fluid col-4 mt-5 rounded hover cadreshadow p-3">


        <?php

        include '../../partials/scripts/set-manager.php';

        $destination = Admin::setEditDestinationPage($_GET['id']);

        $locationName = Manager::getLocationByDestination($destination->idLocation());

        $inputData = $destination->id() == 0 ? 'placeholder' : 'value';

        $buttonText = $destination->id() == 0 ? "Ajouter la destination" : "Mettre à jour la destination";

        ?>


        <!-- choix de destination-->
        <form action="edit-destination.php" method="get">
            <div class="row">
                <div class="col-12 center">
                    <div class="form-group ">
                        <div class="">
                            <label for="usr bg-light">Destination:</label>
                        </div>
                        <select name="location" class="form-control">

                            <?= Manager::locationsOptions($destination->idLocation()) ?>

                        </select>

                        <div class="form-group mt-4">
                            <label for="usr mt-1">Description:</label>
                            <input type="text" class="form-control" name="description" <?= $inputData ?>="<?= $destination->description() ?>">
                        </div>
                    </div>
                    <!--prix-->
                    <div class="liens mt-4">
                        <div class="form-group">
                            <label for="usr">Prix:</label>
                            <input type="text" class="form-control" name="price" <?= $inputData ?>="<?= $destination->price() ?>">
                        </div>
                    </div>

                    <!-- bouton-->

                </div>
            </div>

            <input type="hidden" name="id" value="<?= $destination->id() ?>">
            <input type="hidden" name="operatorid" value="<?= $_GET['operator'] ?>">

            <div class="text-center mb-4">
                <button type="submit" class="btn btn-primary btn-lg rajoutdestination"><?= $buttonText ?></button>
            </div>
        </form>
    </div> <!-- essai primium------------------------------------------------------------------------------------>






    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>