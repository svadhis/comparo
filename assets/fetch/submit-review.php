<?php

include '../../partials/scripts/set-manager.php';

if ($_GET['message'] != '' && $_GET['author'] != '') {
    Manager::createReview($_GET['operatorid'], $_GET['message'], $_GET['author']);
    $reviewsNumber = Manager::getReviewsNumberByOperator($_GET['operatorid']);
    $reviews = Manager::getReviewsByOperator($_GET['operatorid']);
    $allReviews = Ifc::createReviews($reviews);
    echo Ifc::setReviewsTable($allReviews) . '|' . $reviewsNumber;
} else {
    echo 'nok';
}
