<?php

declare(strict_types=1);

class Student
{

    private $name;
    private $email;
    private $class;
    private $teacher;

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;

    }


    public function getName()
    {
        return $this->name;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function getClass()
    {
        return $this->class;
    }


    public function getTeacher()
    {
        return $this->teacher;
    }


}