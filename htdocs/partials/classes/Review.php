<?php

class Review
{
    private $id;
    private $message;
    private $author;
    private $idTourOperator;

    function __construct()
    { }

    public function id()
    {
        return $this->id;
    }

    public function message()
    {
        return $this->message;
    }

    public function author()
    {
        return $this->author;
    }

    public function idTourOperator()
    {
        return $this->idTourOperator;
    }
}
