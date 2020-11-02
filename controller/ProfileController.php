<?php
declare(strict_types=1);

require 'moddel/ClassLoader.php';
require 'moddel/Connection.php';
class ProfileController
{
    public function render()
    {
        $connection = new Connection();
        $id = $_GET['profile'];
        $class = $connection->getClass($id);
        $teacher = $connection->getTeacher($id);
        $students = $connection->getStudents($id);

        require 'view/profileClass.php';
    }
}