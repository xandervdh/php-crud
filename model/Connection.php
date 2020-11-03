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

    public function insertStudent($name, $email, $id)
    {
        $handler = $this->pdo->prepare('INSERT INTO students (name, email, classes_id) VALUES (:studentname, :email, :id)');
        $handler->bindValue(':studentname', $name);
        $handler->bindValue(':email', $email);
        $handler->bindValue(':id', $id);
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

    public function getStudentId($name)
    {
        $handler = $this->pdo->prepare('SELECT id FROM students WHERE :name = name');
        $handler->bindValue(':name', $name);
        $handler->execute();
        return $handler->fetch();
    }

    public function getAllStudents()
    {
        $handler = $this->pdo->prepare('SELECT id, name, email, classes_id FROM students');
        $handler->execute();
        return $handler->fetchAll();
    }


    public function Delete($id, $table)
    {
        $handler = $this->pdo->prepare('DELETE FROM :table WHERE id = :id ');
        $handler->bindValue(':id', $id);
        $handler->bindValue(':table', $table);
        $handler->execute();
        return $handler->fetchAll();
    }

    public function checkEmailInDB($email, $table)
    {
        if($table == 'students'){
            $handler = $this->pdo->prepare('SELECT email FROM students WHERE email = :email');

        } else{
            $handler = $this->pdo->prepare('SELECT email FROM teachers WHERE email = :email');
        }

        $handler->bindValue(':email', $email);

        return $handler->execute();

    }

}