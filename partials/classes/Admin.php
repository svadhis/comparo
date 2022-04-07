<?php

class Admin
{
    public static function createOperators($operators)
    {

        $allOperators = array();

        // Table of operator objects
        foreach ($operators as $operator) {
            array_push($allOperators, new TourOperator($operator));
        }

        return $allOperators;
    }

    public static function createDestinations($destinations)
    {

        $allDestinations = array();

        // Table of operator objects
        foreach ($destinations as $destination) {
            array_push($allDestinations, new Destination($destination));
        }

        return $allDestinations;
    }

    public static function listOperators($operators)
    {
        $operatorsTable = ' <table class="table formulairecolor rounded">
                                <thead class="bg-white">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Premium</th>
                                        <th scope="col">Lien</th>
                                    </tr>
                                </thead>
                                <tbody class="">';

        $i = 1;
        foreach ($operators as $operator) {
            // Is premium ?
            if ($operator->isPremium() == 1) {
                $premium = 'Oui';
            } else {
                $premium = 'Non';
            }

            $link = '<a class="black" href="pages/operator.php?operator=' . $operator->id() . '">';

            $operatorsTable .= '<tr>
                                    <th scope="row">' . $link . $i . '</a></th>
                                    <td><b>' . $link . ucwords($operator->name()) . '</b></a></td>
                                    <td>' . $link . $premium . '</a></td>
                                    <td>' . $link . $operator->link() . '</a></td>
                                </tr>';

            $i++;
        }

        $operatorsTable .= '</tbody>
                        </table>';

        return $operatorsTable;
    }

    public static function listDestinationsByOperator($destinations, $operatorId)
    {

        $destinationsTable = ' <table class="table formulairecolor rounded">
                                <thead class="bg-white">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Destination</th>
                                        <th scope="col">Prix</th>
                                        <th scope="col">Description</th>
                                    </tr>
                                </thead>
                                <tbody class="">';

        $i = 1;
        foreach ($destinations as $destination) {

            $link = '<a class="black" href="destination.php?operator=' . $destination->idTourOperator() . '&id=' . $destination->id() . '">';

            $locationName = Manager::getLocationByDestination($destination->idLocation());

            $destinationsTable .= '<tr>
                                    <th scope="row">' . $link . $i . '</a></th>
                                    <td><b>' . $link . $locationName . '</b></a></td>
                                    <td>' . $link . $destination->price() . '</a></td>
                                    <td>' . $link . $destination->description() . '</a></td>
                                </tr>';

            $i++;
        }

        $destinationsTable .= '</tbody>
                        </table>

                        <form action="destination.php" method="get">

                            <input type="hidden" name="operator" value="' . $operatorId . '">
                            <input type="hidden" name="id" value="new">
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-light btn-lg mb-4 rajoutdestination">Ajouter une destination</button>
                            </div>
                        </form>';

        return $destinationsTable;
    }

    public static function setIsPremium($operator)
    {
        $isPremium = array(
            'yes'   =>  '',
            'no'    =>  ''
        );

        if ($operator->isPremium() == 1) {
            $isPremium['yes'] = 'checked';
        } else {
            $isPremium['no'] = 'checked';
        }

        return $isPremium;
    }

    public static function setEmptyOperator()
    {
        $emptyOperator = array(
            'id'        =>  0,
            'name'      =>  "Nom de l'opérateur",
            'link'      =>  "Site web de l'opérateur",
            'isPremium' =>  0
        );

        return $emptyOperator;
    }

    public static function setEmptyDestination()
    {
        $emptyDestination = array(
            'id'            =>  0,
            'idLocation'    =>  1,
            'price'         =>  0,
            'description'   =>  "Description"
        );

        return $emptyDestination;
    }

    public static function setOperatorsPage()
    {
        $operators = Manager::getAllOperators();

        $allOperators = self::createOperators($operators);

        return self::listOperators($allOperators);
    }

    public static function setEditOperatorPage($operatorId)
    {
        if ($operatorId == 'new') {
            $operator = self::setEmptyOperator();
        } else {
            $operator = Manager::getOperator($operatorId);
        }

        $operator = new TourOperator($operator);

        return $operator;
    }

    public static function setEditDestinationPage($destinationId)
    {
        if ($destinationId == 'new') {
            $destination = self::setEmptyDestination();
        } else {
            $destination = Manager::getDestination($destinationId);
        }

        $destination = new Destination($destination);

        return $destination;
    }
}
