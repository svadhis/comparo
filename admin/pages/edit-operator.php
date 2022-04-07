<?php
include '../../partials/scripts/set-manager.php';

$operator = array(
    'id'        =>  $_GET['id'],
    'name'      =>  $_GET['name'],
    'isPremium' =>  $_GET['premium'],
    'link'      =>  $_GET['link']
);

$operator['id'] == 0 ? Manager::createOperator($operator) : Manager::updateOperator($operator);

header('Location: ../');
