<?php

class Review
{
    private $id;
    private $message;
    private $author;
    private $idTourOperator;

    function __construct(array $review)
    {
        foreach ($review as $key => $value) {
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

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function setIdTourOperator($idTourOperator)
    {
        $this->idTourOperator = $idTourOperator;
    }
}
