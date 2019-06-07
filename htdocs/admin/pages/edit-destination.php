<?php
include '../../partials/scripts/set-manager.php';

$destination = array(
    'id'                =>  $_GET['id'],
    'location'          =>  $_GET['location'],
    'description'       =>  $_GET['description'],
    'price'             =>  $_GET['price'],
    'idOperator'        =>  $_GET['operatorid']
);

$destination['id'] == 0 ? Manager::createDestination($destination) : Manager::updateDestination($destination);

header('Location: ../pages/operator.php?operator=' . $_GET['operatorid']);
