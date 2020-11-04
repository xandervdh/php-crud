<?php
declare(strict_types=1);

class Connection
{
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
        $handler = $this->pdo->prepare('SELECT id, name, email, classes_id FROM students WHERE classes_id = :id');
        $handler->bindValue(':id', $id);
        $handler->execute();
        return $handler->fetchAll();
    }

    public function getClassId($name)
    {
        $handler = $this->pdo->prepare('SELECT id FROM classes WHERE name = :name');
        $handler->bindValue(':name', ucfirst($name));
        $handler->execute();
        return $handler->fetch();
    }

    public function getTeacher($id)
    {
        $handler = $this->pdo->prepare('SELECT id, name, email FROM teachers WHERE classes_id = :id');
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
        $handler = $this->pdo->prepare('SELECT id, name, location FROM classes WHERE id = :id');
        $handler->bindValue(':id', $id);
        $handler->execute();
        return $handler->fetch();
    }

    public function insertClass($name, $location)
    {
        $handler = $this->pdo->prepare('INSERT INTO classes (name, location) VALUES (:classname, :location)');
        $handler->bindValue(':classname', ucfirst($name));
        $handler->bindValue(':location', ucfirst($location));
        $handler->execute();
    }

    public function insertStudent($name, $email, $id)
    {
        $className = $this->getClassId($id);
        $handler = $this->pdo->prepare('INSERT INTO students (name, email, classes_id) VALUES (:studentname, :email, :id)');
        $handler->bindValue(':studentname', ucfirst($name));
        $handler->bindValue(':email', $email);
        $handler->bindValue(':id', $className['id']);
        $handler->execute();
    }

    public function insertTeacher($name, $email, $id)
    {
        $className = $this->getClassId($id);
        $handler = $this->pdo->prepare('INSERT INTO teachers (name, email, classes_id) VALUES (:teachername, :email, :id)');
        $handler->bindValue(':teachername', ucfirst($name));
        $handler->bindValue(':email', $email);
        $handler->bindValue(':id', $className['id']);
        $handler->execute();
    }

    public function getTeacherProfile($id)
    {
        $handler = $this->pdo->prepare('SELECT id, name, email, classes_id FROM teachers WHERE :id = id');
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
        $handler = $this->pdo->prepare('SELECT id, name, email, classes_id FROM students WHERE :id = id');
        $handler->bindValue(':id', $id);
        $handler->execute();
        return $handler->fetch();
    }

    public function getStudentId($name)
    {
        $handler = $this->pdo->prepare('SELECT id FROM students WHERE :name = name');
        $handler->bindValue(':name', ucfirst($name));
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
        if($table == "class"){
            $handler = $this->pdo->prepare('UPDATE students SET classes_id = 0 WHERE classes_id = :id ');
            $handler->bindValue(':id', $id);
            $handler->execute();

            $handler = $this->pdo->prepare('UPDATE teachers SET classes_id = 0 WHERE classes_id = :id ');
            $handler->bindValue(':id', $id);
            $handler->execute();

            $handler = $this->pdo->prepare('DELETE FROM classes WHERE id = :id ');
            $handler->bindValue(':id', $id);
            $handler->execute();

        } elseif ($table == "student") {
            $handler = $this->pdo->prepare('DELETE FROM students WHERE id = :id ');
        } else {
            $handler = $this->pdo->prepare('DELETE FROM teachers WHERE id = :id ');
        }

        $handler->bindValue(':id', $id);
        $handler->execute();

    }

    public function checkEmailInDB($email, $table)
    {
        if ($table == 'students') {
            $handler = $this->pdo->prepare('SELECT email FROM students WHERE email = :email');

        } else {
            $handler = $this->pdo->prepare('SELECT email FROM teachers WHERE email = :email');
        }

        $handler->bindValue(':email', $email);
        $handler->execute();
        return $handler->fetch();
    }

    public function editProfile($name, $email, $id)
    {
        $handler = $this->pdo->prepare('UPDATE students SET name = :name, email = :email,  WHERE id = :id');
        $handler->bindValue(':name', $name);
        $handler->bindValue(':email', $email);
        $handler->bindValue(':id', $id);
        $handler->execute();
    }

    public function validateClass($class)
    {
        $handler = $this->pdo->prepare('SELECT id FROM classes WHERE id = :class');
        $handler->bindValue(':class', ucfirst($class));
        $handler->execute();
        return $handler->fetch();
    }

    public function getNameFromId($id)
    {
        $handler = $this->pdo->prepare('SELECT name FROM classes WHERE id = :id');
        $handler->bindValue(':id', $id);
        $handler->execute();
        return $handler->fetch();
    }

}