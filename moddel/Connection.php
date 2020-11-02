<?php
declare(strict_types=1);

class Connection {
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = $this->openDB();
    }

    //get database connection
    public function openDB()
    {
        $dbhost = "localhost";
        $dbuser = "becode";
        $dbpass = "becode123";
        $db = "crud";

        $driverOptions = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        return new PDO('mysql:host=' . $dbhost . ';dbname=' . $db, $dbuser, $dbpass, $driverOptions);
    }

    public function getStudents($id)
    {
        $handler = $this->pdo->prepare('SELECT name, email FROM students WHERE classes_id = :id');
        $handler->bindValue(':id', $id);
        $handler->execute();
        return $handler->fetchAll();
    }

    public function getClassId($name)
    {
        $handler = $this->pdo->prepare('SELECT id FROM classes WHERE name = :name');
        $handler->bindValue(':name', $name);
        $handler->execute();
        return $handler->fetch();
    }

    public function getTeacher($id)
    {
        $handler = $this->pdo->prepare('SELECT name, email FROM teachers WHERE classes_id = :id');
        $handler->bindValue(':id', $id);
        $handler->execute();
        return $handler->fetch();
    }

    public function getClasses()
    {
        $handler = $this->pdo->prepare('SELECT name, location FROM classes');
        $handler->execute();
        return $handler->fetchAll();
    }

    public function getClass($id)
    {
        $handler = $this->pdo->prepare('SELECT name, location FROM classes WHERE id = :id');
        $handler->bindValue(':id', $id);
        $handler->execute();
        return $handler->fetch();
    }

    public function insertData($name, $location)
    {
        $handler = $this->pdo->prepare('INSERT INTO classes (name, location) VALUES (:classname, :location)');
        $handler->bindValue(':classname', $name);
        $handler->bindValue(':location', $location);
        $handler->execute();

    }
}