<?php
declare(strict_types=1);

class ClassLoader
{
    private array $classes = [];

    public function __construct()
    {
        $connection = new Connection();
        $classes = $connection->getClasses();
        foreach ($classes as $class){
            array_push($this->classes, new ClassModel(intval($class['id']), $class["name"], $class["location"]));
        }
    }

    public function getClasses(): array
    {
        return $this->classes;
    }
}