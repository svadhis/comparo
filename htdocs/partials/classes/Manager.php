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

    public static function getOperatorLogo($operatorName)
    {
        $stripped = str_replace(' ', '', $operatorName);
        $imageConv = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $stripped);
        $operatorLogo = '../assets/images/logo/operators/' . strtolower($imageConv) . '.jpg';

        if (!file_exists($operatorLogo)) {
            $operatorLogo = '../assets/images/logo/operators/default.jpg';
        }

        return $operatorLogo;
    }

    public static function locationsOptions($selectedLocation)
    {
        $locations = self::getAllLocations();
        foreach ($locations as $location) {
            $selected = $selectedLocation == $location['id'] ? 'selected ' : ' ';
            echo '<option ' . $selected . 'value="' . $location['id'] . '">' . $location['name'] . '</option>';
        }
    }

    public static function getAllDestinations()
    {
        $query = self::$db->query('SELECT * FROM destinations');

        $destinations = $query->fetchAll();

        return $destinations;
    }

    public static function getOperator($operatorId)
    {
        $query = self::$db->prepare('SELECT * FROM tour_operators
                                    WHERE id = :operatorId');

        $query->execute(array(
            ':operatorId'   =>  $operatorId
        ));

        $operator = $query->fetch();

        return $operator;
    }

    public static function getDestination($destinationId)
    {
        $query = self::$db->prepare('SELECT * FROM destinations
                                    WHERE id = :destinationId');

        $query->execute(array(
            ':destinationId'   =>  $destinationId
        ));

        $destination = $query->fetch();

        return $destination;
    }

    public static function getOperatorsByDestination($locationId)
    {
        $query = self::$db->prepare('SELECT * FROM destinations
                                    INNER JOIN tour_operators
                                    ON destinations.idTourOperator = tour_operators.id
                                    WHERE destinations.idLocation=:idLocation
                                    ORDER BY tour_operators.isPremium DESC, destinations.price');

        $query->execute(array(
            ':idLocation'   =>  $locationId
        ));

        $operatorsByDestination = $query->fetchAll();

        return $operatorsByDestination;
    }

    public static function getDestinationsByOperator($operatorId)
    {
        $query = self::$db->prepare('SELECT * FROM tour_operators
                                    INNER JOIN destinations
                                    ON tour_operators.id = destinations.idTourOperator
                                    WHERE tour_operators.id=:operatorId');

        $query->execute(array(
            ':operatorId'   =>  $operatorId
        ));

        $destinationsByOperator = $query->fetchAll();

        return $destinationsByOperator;
    }

    public static function createReview($idOperator, $message, $author)
    {
        $query = self::$db->prepare('INSERT INTO reviews (message, author, idTourOperator)
                                    values (:message, :author, :idTourOperator)');

        $query->execute(array(
            ':message'          =>  $message,
            ':author'           =>  $author,
            ':idTourOperator'   =>  $idOperator
        ));
    }

    public static function getReviewsByOperator($operatorId)
    {
        $query = self::$db->prepare('SELECT * FROM reviews
                                    INNER JOIN tour_operators
                                    ON reviews.idTourOperator = tour_operators.id
                                    WHERE reviews.idTourOperator=:idTourOperator
                                    ORDER BY reviews.id DESC
                                    LIMIT 10');

        $query->execute(array(
            ':idTourOperator'   =>  $operatorId
        ));

        $reviewByOperator = $query->fetchAll();

        return $reviewByOperator;
    }

    public static function getReviewsNumberByOperator($operatorId)
    {
        $query = self::$db->prepare('SELECT COUNT(*) AS count FROM reviews
                                    WHERE idTourOperator=:idTourOperator');

        $query->execute(array(
            ':idTourOperator'   =>  $operatorId
        ));

        $reviewNumberByOperator = $query->fetch();

        return $reviewNumberByOperator['count'];
    }

    public static function getAllOperators()
    {
        $query = self::$db->query('SELECT * FROM tour_operators');

        $operators = $query->fetchAll();

        return $operators;
    }

    public static function setOperatorPremium()
    { }

    public static function createOperator(array $operator)
    {
        $query = self::$db->prepare('INSERT INTO tour_operators (name, link, isPremium)
                                    values (:name, :link, :isPremium)');

        $query->execute(array(
            ':name'          =>  $operator['name'],
            ':link'          =>  $operator['link'],
            ':isPremium'     =>  $operator['isPremium']
        ));
    }

    public static function updateOperator(array $operator)
    {
        $query = self::$db->prepare('UPDATE tour_operators
                                    SET name = :name, link = :link, isPremium = :isPremium
                                    WHERE id = :id');

        $query->execute(array(
            ':name'          =>  $operator['name'],
            ':link'          =>  $operator['link'],
            ':isPremium'     =>  $operator['isPremium'],
            ':id'            =>  $operator['id']
        ));
    }

    public static function createDestination(array $destination)
    {
        $query = self::$db->prepare('INSERT INTO destinations (idLocation, price, description, idTourOperator)
                                    values (:idLocation, :price, :description, :idTourOperator)');

        $query->execute(array(
            ':idLocation'       =>  $destination['location'],
            ':price'            =>  $destination['price'],
            ':description'      =>  $destination['description'],
            ':idTourOperator'   =>  $destination['idOperator']
        ));
    }

    public static function updateDestination(array $destination)
    {
        $query = self::$db->prepare('UPDATE destinations
                                    SET idLocation = :idLocation, price = :price, description = :description, idTourOperator = :idTourOperator
                                    WHERE id = :id');

        $query->execute(array(
            ':idLocation'       =>  $destination['location'],
            ':price'            =>  $destination['price'],
            ':description'      =>  $destination['description'],
            ':idTourOperator'   =>  $destination['idOperator'],
            ':id'               =>  $destination['id']
        ));
    }

    public static function submitgrade($idOperator, $grade)
    {
        // Get operator's grade
        $query = self::$db->prepare('SELECT gradeCount, grade
                                    FROM tour_operators
                                    WHERE id = :idTourOperator');

        $query->execute(array(
            ':idTourOperator'   =>  $idOperator
        ));

        $operator = $query->fetch();

        // Calculate new grade
        $newGrade = ($operator['gradeCount'] * $operator['grade'] + $grade) / ($operator['gradeCount'] + 1);

        // Update table
        $query2 = self::$db->prepare('UPDATE tour_operators
                                    SET grade = :grade, gradeCount = gradeCount + 1
                                    WHERE id = :idTourOperator');

        $query2->execute(array(
            ':grade'            =>  $newGrade,
            ':idTourOperator'   =>  $idOperator
        ));

        return $newGrade;
    }
}
