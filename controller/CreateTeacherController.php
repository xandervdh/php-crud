<?php


class CreateTeacherController
{
    public function render()
    {
        $connection = new Connection();
        global $teacherName, $email;
        global $teacherNameErrMess, $emailErrMess;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST['teachername'])) {
                $teacherName = $_POST['teachername'];

            } else {
                $teacherNameErrMess = 'Teacher name is required';
            }

            if (!empty($_POST['email'])) {
                $email = $_POST['email'];

            } else {
                $emailErrMess = 'Email is required';
            }

            if (empty($teacherNameErrMess) && empty($emailErrMess)) {
                $connection->insertTeacher($_POST['teachername'], $_POST['email']);
            }
        }

        require 'view/createteacher.php';
    }

}