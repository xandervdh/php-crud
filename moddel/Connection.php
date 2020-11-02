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
        $dbpass = "Becode@123";
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
        $handler = $this->pdo->prepare('SELECT name, email FROM students WHERE student_id_fk = :id');
        $handler->bindValue(':id', $id);
        $handler->execute();
        return $handler->fetchAll();
    }

    public function getClassId($name)
    {
        $handler = $this->pdo->prepare('SELECT id FROM class WHERE name = :name');
        $handler->bindValue(':name', $name);
        $handler->execute();
        return $handler->fetch();
    }
}