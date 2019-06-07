<?php

class Ifc
{
    public static function getLocationImageByDestination($locationName)
    {
        $locationImage = '../assets/images/destinations/' . $locationName . '.jpg';

        return $locationImage;
    }

    public static function setDestinationsPage()
    {
        $operators = Manager::getAllOperators();

        // Create all operator objects
        foreach ($operators as $operator) {
            $tourOperator = 'operator' . $operator['id'];
            $$tourOperator = new TourOperator($operator);
        }

        // Create location variables
        $locationName = Manager::getLocationByDestination($_GET['location']);
        $locationImage = self::getLocationImageByDestination($locationName);

        // Create all destinations objects
        $destinationsByLocation = Manager::getOperatorsByDestination($_GET['location']);

        foreach ($destinationsByLocation as $destination) {
            $destination = new Destination($destination);

            // Set operator object name, and set card for all destinations
            $operator = 'operator' . $destination->idTourOperator();

            // Get operator's logo
            $operatorLogo = Manager::getOperatorLogo($$operator->name());

            // Get number of reviews for each operator
            $reviewsNumber = Manager::getReviewsNumberByOperator($destination->idTourOperator());

            // Get reviews data for each operator, and create review objects
            $reviews = Manager::getReviewsByOperator($destination->idTourOperator());
            foreach ($reviews as $review) {
                $operatorReview = 'operator' . $destination->idTourOperator() . '-review' . $review['id'];
                $$operatorReview = new Review($review);
            }

            $destination->setCard($$operator, $operatorLogo, $locationImage, $reviewsNumber, $reviews);
        }
    }
}
