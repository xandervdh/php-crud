<?php
declare(strict_types=1);

class ProfileController
{
    public function render()
    {
        $connection = new Connection();
        $id = $_GET['user'];
        $class = $connection->getClass($id);
        $teacher = $connection->getTeacher($id);
        $students = $connection->getStudents($id);

        require 'view/profileClass.php';
    }
}