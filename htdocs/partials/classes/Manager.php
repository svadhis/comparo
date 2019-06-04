<?php

class Manager
{
    private static $db;

    public static function setDb($host, $name, $user = 'root', $password = '')
    {
        try {
            self::$db = new PDO('mysql:host=' . $host . ';dbname=' . $name . ';charset=utf8', $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public static function getAllLocations()
    {
        $query = self::$db->query('SELECT * FROM locations');

        $locations = $query->fetchAll();

        return $locations;
    }

    public static function getLocationByDestination($locationId)
    {
        $query = self::$db->prepare('SELECT * FROM locations
                                    WHERE id=:idLocation');

        $query->execute(array(
            ':idLocation'   =>  $locationId
        ));

        $location = $query->fetch();

        return $location['name'];
    }

    public static function locationsOptions()
    {
        $locations = self::getAllLocations();
        foreach ($locations as $location) {
            echo '<option value="' . $location['id'] . '">' . $location['name'] . '</option>';
        }
    }

    public static function getAllDestinations()
    {
        $query = self::$db->query('SELECT * FROM destinations');

        $destinations = $query->fetchAll();

        return $destinations;
    }

    public static function getOperatorsByDestination($locationId)
    {
        $query = self::$db->prepare('SELECT * FROM destinations
                                    WHERE idLocation=:idLocation');

        $query->execute(array(
            ':idLocation'   =>  $locationId
        ));

        $operatorsByDestination = $query->fetchAll();

        return $operatorsByDestination;
    }

    public static function createReview()
    { }

    public static function getReviewByOperator($operatorId)
    {
        $query = self::$db->prepare('SELECT * FROM reviews
                                    INNER JOIN tour_operators ON reviews.idTourOperator = tour_operators.id
                                    WHERE reviews.idTourOperator=:idTourOperator');

        $query->execute(array(
            ':idTourOperator'   =>  $operatorId
        ));

        $reviewByOperator = $query->fetchAll();

        return $reviewByOperator;
    }

    public static function getAllOperators()
    {
        $query = self::$db->query('SELECT * FROM tour_operators');

        $operators = $query->fetchAll();

        return $operators;
    }

    public static function setOperatorPremium()
    { }

    public static function createOperator()
    { }

    public static function createDestination()
    { }
}
