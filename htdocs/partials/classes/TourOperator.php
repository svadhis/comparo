<?php

class TourOperator
{
    private $id;
    private $name;
    private $logo;
    private $gradeCount;
    private $grade;
    private $link;
    private $isPremium;

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

    public function name()
    {
        return $this->name;
    }

    public function logo()
    {
        return $this->logo;
    }

    public function gradeCount()
    {
        return $this->gradeCount;
    }

    public function grade()
    {
        return $this->grade;
    }

    public function link()
    {
        return $this->link;
    }

    public function isPremium()
    {
        return $this->isPremium;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setlogo($logo)
    {
        $this->logo = $logo;
    }

    public function setGradeCount($gradeCount)
    {
        $this->gradeCount = $gradeCount;
    }

    public function setGrade($grade)
    {
        $this->grade = $grade;
    }

    public function setLink($link)
    {
        $this->link = $link;
    }

    public function setIsPremium(int $isPremium)
    {
        $this->isPremium = $isPremium;
    }
}
