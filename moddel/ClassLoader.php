<?php
declare(strict_types=1);

require 'moddel/Connection.php';
class ClassLoader
{
    private array $classes = [];

    public function __construct()
    {
        $connection = new Connection();
        $classes = $connection->getClasses();
        foreach ($classes as $class){
            array_push($this->classes, new ClassModel($class["name"], $class["location"]));
        }
    }


}