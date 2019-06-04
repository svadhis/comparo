<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Comparator</title>
</head>

<body>

    <?php

    include '../partials/scripts/set-manager.php';
    include '../partials/layout/navbar.php';

    // Create all operator objects
    $operators = Manager::getAllOperators();

    foreach ($operators as $operator) {
        $tourOperator = 'operator' . $operator['id'];
        $$tourOperator = new TourOperator($operator);
    }

    // Create location variables

    $locationName = Manager::getLocationByDestination($_GET['location']);
    $imageConv = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $locationName);
    $locationImage = '../assets/images/destinations/' . $imageConv . '.jpg';

    // Create all destinations objects
    $destinationsByLocation = Manager::getOperatorsByDestination($_GET['location']);

    foreach ($destinationsByLocation as $destination) {
        $destination = new Destination($destination);
        // Set operator object name, and set card for all destinations
        $operator = 'operator' . $destination->idTourOperator();
        $destination->setCard($$operator, $locationName, $locationImage);
    }

    ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>