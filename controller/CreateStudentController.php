<?php


class CreateStudentController
{
    public function render()
    {
        $connection = new Connection();
        global $studentName, $email;
        global $studentNameErrMess, $emailErrMess;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST['studentname'])) {
                $studentName = $_POST['studentname'];

            } else {
                $studentNameErrMess = 'Student name is required';
            }

            if (!empty($_POST['email'])) {
                $email = $_POST['email'];

            } else {
                $emailErrMess = 'Email is required';
            }

            if (empty($classNameErrMess) && empty($locationErrMess)) {
                $connection->insertStudent($_POST['studentname'], $_POST['email']);
            }
        }

        require 'view/createstudent.php';
    }


}