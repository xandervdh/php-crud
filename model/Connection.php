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
        $handler = $this->pdo->prepare('SELECT id, name, email FROM students WHERE classes_id = :id');
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
        $handler = $this->pdo->prepare('SELECT id, name, location FROM classes');
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

    public function insertClass($name, $location)
    {
        $handler = $this->pdo->prepare('INSERT INTO classes (name, location) VALUES (:classname, :location)');
        $handler->bindValue(':classname', $name);
        $handler->bindValue(':location', $location);
        $handler->execute();
    }

    public function insertStudent($name, $email)
    {
        $handler = $this->pdo->prepare('INSERT INTO classes (name, email) VALUES (:studentname, :email)');
        $handler->bindValue(':classname', $name);
        $handler->bindValue(':location', $email);
        $handler->execute();
    }

    public function insertTeacher($name, $email)
    {
        $handler = $this->pdo->prepare('INSERT INTO classes (name, email) VALUES (:teachername, :email)');
        $handler->bindValue(':classname', $name);
        $handler->bindValue(':location', $email);
        $handler->execute();
    }

    public function getTeacherProfile($id)
    {
        $handler = $this->pdo->prepare('SELECT name, email, classes_id FROM teachers WHERE :id = id');
        $handler->bindValue(':id', $id);
        $handler->execute();
        return $handler->fetch();
    }

    public function getTeachers()
    {
        $handler = $this->pdo->prepare('SELECT id, name, email, classes_id FROM teachers');
        $handler->execute();
        return $handler->fetchAll();
    }

    public function getStudentProfile($id)
    {
        $handler = $this->pdo->prepare('SELECT name, email, classes_id FROM students WHERE :id = id');
        $handler->bindValue(':id', $id);
        $handler->execute();
        return $handler->fetch();
    }
}