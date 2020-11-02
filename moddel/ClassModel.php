<?php
declare(strict_types=);

require 'moddel/Student.php';
require 'moddel/Connection.php';

class ClassModel
{
    private Connection $connection;
    private string $name;
    private string $location;
    private string $teacher;
    private array $students = [];

    public function __construct(string $name, string $location)
    {
        $this->connection = new Connection();
        $this->name = $name;
        $this->location = $location;
        $id = $this->connection->getClassId($this->name);
        $students = $this->connection->getStudents($id);
        foreach ($students as $student){
            array_push($this->students, new Student($student['name'], $student['email']));
        }

    }


}