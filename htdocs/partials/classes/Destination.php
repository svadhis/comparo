<?php

class Destination
{
    private $id;
    private $idLocation;
    private $price;
    private $description;
    private $idTourOperator;

    function __construct(array $destination)
    {
        foreach ($destination as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function id()
    {
        return $this->id;
    }

    public function idLocation()
    {
        return $this->idLocation;
    }

    public function price()
    {
        return $this->price;
    }

    public function description()
    {
        return $this->description;
    }

    public function idTourOperator()
    {
        return $this->idTourOperator;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setIdLocation(int $idLocation)
    {
        $this->idLocation = $idLocation;
    }

    public function setPrice(int $price)
    {
        $this->price = $price;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setIdTourOperator(int $idTourOperator)
    {
        $this->idTourOperator = $idTourOperator;
    }

    public function setCard(TourOperator $operator, $locationName, $locationImage)
    {

        /*
        $operator->name(), $operator->grade(), $operator->logo()
        $locationName, $locationImage
        $this->price(), $this->description()

        star, star_border, star_half
        */

        echo '<div class="row">
                <div class="col-3">
                    <img src="../assets/images/destinations/baleare.jpg" width="200px">
                </div>
                <div class="col-3">
                ' . $operator->name() . $locationName . '
                </div>
                <div class="col-3">
                    <i class="material-icons">star</i>
                    <i class="material-icons">star_half</i>
                    <i class="material-icons">star_border</i>
                </div>
            </div>';
    }
}
