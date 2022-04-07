<?php

class Ifc
{
    public static function getLocationImageByDestination($locationName)
    {
        $locationImage = '../assets/images/destinations/' . $locationName . '.jpg';

        return $locationImage;
    }

    public static function createOperators(array $operators)
    {
        $allOperators = array();
        foreach ($operators as $operator) {
            $operatorKey = 'operator' . $operator['id'];
            $allOperators[$operatorKey] = new TourOperator($operator);
        }
        return $allOperators;
    }

    public static function createReviews($reviews)
    {
        $allReviews = array();
        foreach ($reviews as $review) {
            /* $operatorReviewKey = 'operator' . $destination->idTourOperator() . '-review' . $review['id'];
        $allReviews[$operatorReviewKey] = new Review($review); */

            array_push($allReviews, new Review($review));
        }

        return $allReviews;
    }

    public static function createDestinations(array $destinationsByLocation, array $allOperators, $locationImage)
    {
        foreach ($destinationsByLocation as $destination) {

            $destination = new Destination($destination);

            // Set operator object name, and set card for all destinations
            $operatorKey = 'operator' . $destination->idTourOperator();

            // Get operator's logo
            $operatorLogo = Manager::getOperatorLogo($allOperators[$operatorKey]->name());

            // Get number of reviews for each operator
            $reviewsNumber = Manager::getReviewsNumberByOperator($destination->idTourOperator());

            // Get reviews data for each operator, and create review objects
            $reviews = Manager::getReviewsByOperator($destination->idTourOperator());

            $allReviews = Ifc::createReviews($reviews);

            self::setDestinationsCards($destination, $allOperators[$operatorKey], $operatorLogo, $locationImage, $reviewsNumber, $allReviews);
        }
    }

    public static function setReviewForm($operator)
    {
        $reviewForm = '
        <h5 class="text-center">Ajouter un avis</h5>
        <form>
            <div class="form-group">
                <label for="name-' . $operator->id() . '">Votre nom</label>
                <input type="text" class="form-control" id="name-' . $operator->id() . '">
            </div>
            <div class="form-group">
                <label for="message-' . $operator->id() . '">Votre avis</label>
                <textarea class="form-control" id="message-' . $operator->id() . '" rows="3"></textarea>
            </div>
            <input type="hidden" name="operator" value="' . $operator->id() . '">
            <button type="button" class="btn btn-primary btn-block" onclick="submitReview(' . $operator->id() . ')"><b>Envoyer</b></button>
        </form>
        ';

        return $reviewForm;
    }

    public static function setReviewsTable($reviews)
    {
        $allReviews = '<table class="table table-striped">
        <tbody>';

        foreach ($reviews as $review) {
            $allReviews .= '<tr>
            <th scope="row">' . $review->author() . '</th>
            <td>' . $review->message() . '</td>
            </tr>';
        }

        $allReviews .= '</tbody>
        </table>';

        return $allReviews;
    }

    public static function setPremiumClass($operator)
    {
        $premiumClass = '';

        if ($operator->isPremium() == 1) {
            $premiumClass = 'premium ';
        }

        return $premiumClass;
    }

    public static function setPremiumLink($operator)
    {
        $premiumLink = ucwords($operator->name());

        if ($operator->isPremium() == 1) {
            $premiumLink = '<a target="_blank" href="' . $operator->link() . '">' . ucwords($operator->name()) . '</a>
                            <img class="premium-logo" src="../assets/images/premium.png" alt="Premium">';
        }

        return $premiumLink;
    }

    public static function setDestinationTitle($locationName)
    {
        $title = '<h3 class="text-center my-3"><b>' . $locationName . '</b></h3>';

        return $title;
    }

    public static function setDestinationsCards($destination, $operator, $operatorLogo, $locationImage, $reviewsNumber, $reviews)
    {

        // Set premium class

        //-----------------------------------------------------------------------------emilie-----------------------------------------------
        echo '<div class = "cadre hover ' . self::setPremiumClass($operator) . 'mb-3">
                <div id="alert-' . $operator->id() . '" class="alert alert-success hidden" role="alert">
                    Votre note à bien été prise en compte !
                </div>
                <div class="row">
                    <!-----carte generale-->
                    <!-- <div class="row destinationcards">
                        <div class="row ">
                            <div class="col align-self-start"> -->
                    <!-----photos-->
                    <div class="col-md-2">
                        <div class="card-tour">
                            <img class="card-img-top" src="' . $locationImage . '" alt="Card image">
                        </div>
                    </div>



                    <div class="col col-md-10">
                        <div class="card-tour">
                            <div class="row">
                                <div class="col-md-9">
                                    <h5 class="">' . self::setPremiumLink($operator) . '</h5>
                                </div>
                                <div class="col-md-3 text-center">
                                ' . Ifc::gradeStars($operator->id(), $operator->grade()) . '
                                </div>
                                <div class="col-md-9">
                                    <h6 class="description">' . $destination->shortDescription() . '</h6>
                                </div>

                                <div class="col-md-3 text-center">
                                    <h4><span class="badge badge-success">' . $destination->price() . ' €</span></h4>
                                </div>
                                <div class="col-md-9">
                                    <button id="button-' . $operator->id() . '" type="button" class="btn btn-info btn-block prixbouton" data-toggle="collapse" data-target="#collapse-' . $operator->id() . '"><b>Avis des clients (' . $reviewsNumber . ')</b></button>
                                    <div id="collapse-' . $operator->id() . '" class="collapse">
                                        <div id="reviewstable-' . $operator->id() . '">
                                        ' . self::setReviewsTable($reviews) . '
                                        </div>
                                        <div id="reviewform-' . $operator->id() . '">
                                        ' . self::setReviewForm($operator) . '
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 text-center">
                                <img class="operator-logo" src="' . $operatorLogo . '">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
    }


    //-----------------------------------------------------------------------------emilie-----------------------------------------------

    public static function setDestinationsPage()
    {
        $operators = Manager::getAllOperators();

        $allOperators = self::createOperators($operators);

        // Create location variables
        $locationName = Manager::getLocationByDestination($_GET['location']);
        $locationImage = self::getLocationImageByDestination($locationName);

        // Create all destinations objects
        $destinationsByLocation = Manager::getOperatorsByDestination($_GET['location']);

        // Set page title
        echo self::setDestinationTitle($locationName);

        self::createDestinations($destinationsByLocation, $allOperators, $locationImage);
    }

    public static function gradestars($operatorId, $operatorGrade)
    {
        $jsOver = 'onmouseover="setGrade(';
        $jsClick = 'onclick="submitGrade(';
        $grade = '<div id="grade-' . $operatorId . '" class="pointer" onmouseout="getGrade(' . $operatorId . ')">';
        $odd = 0;
        $j = 0;
        for ($i = 1; $i <= round($operatorGrade); $i++) {
            // Set unique id
            if ($i % 2 == 0) {
                $starId = 'star-' . $operatorId . '-' . $i;
                $grade .= '<i id="' . $starId . '" class="pointer material-icons star" ' . $jsOver . $operatorId . ',' . $i . ')" ' . $jsClick . $operatorId . ',' . $i . ')">star</i>';
                $odd = 0;
            } else {
                $starId = 'star-' . $operatorId . '-' . ($i + 1);
                $odd = 1;
            }
            $j++;
        }
        if ($odd == 1) {
            $grade .= '<i id="' . $starId . '" class="pointer material-icons star-half" ' . $jsOver . $operatorId . ',' . ($i + 1) . ')" ' . $jsClick . $operatorId . ',' . $i . ')">star_half</i>';
        }
        for ($j += 2; $j < 12; $j++) {
            if ($j % 2 == 0) {
                $starId = 'star-' . $operatorId . '-' . $j;
                $grade .= '<i id="' . $starId . '" class="pointer material-icons star-border" ' . $jsOver . $operatorId . ',' . $j . ')" ' . $jsClick . $operatorId . ',' . $j . ')">star_border</i>';
            }
        }
        $grade .= '</div>';
        return $grade;
    }
}
