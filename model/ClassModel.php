<?php
declare(strict_types=1);

class ClassModel
{
    private Connection $connection;
    private int $id;
    private string $name;
    private string $location;
    private Teacher $teacher;
    private array $students = [];

    public function __construct(int $id, string $name, string $location)
    {
        $this->connection = new Connection();
        $this->name = $name;
        $this->location = $location;
        $this->id = $id;

        $students = $this->connection->getStudents($id);
        foreach ($students as $student) {
            array_push($this->students, new Student($student['name'], $student['email']));
        }

        $teacher = $this->connection->getTeacher($id);
        $this->teacher = new Teacher($teacher['name'], $teacher['email']);

    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getTeacher(): Teacher
    {
        return $this->teacher;
    }

    public function getStudents(): array
    {
        return $this->students;
    }

    public function getId(): int
    {
        return $this->id;
    }
}