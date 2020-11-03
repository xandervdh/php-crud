<?php


class CreateClassController
{
    public function viewChanger()
    {
        if ($_GET['create'] == 'class') {
            return 'view/createClass.php';

        } elseif ($_GET['create'] == 'student') {
            return 'view/createStudent.php';

        } else {
            return 'view/createTeacher.php';
        }
    }

    public function render()
    {
        $view = $this->viewChanger();
        $connection = new Connection();
        global $className, $location, $class, $studentName, $email, $teacherName;
        global $classNameErrMess, $locationErrMess, $classErrMess, $studentNameErrMess, $emailErrMess, $teacherNameErrMess;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($_GET['create'] == 'class') {
                if (!empty($_POST['classname'])) {
                    $className = $_POST['classname'];

                } else {
                    $classNameErrMess = 'Class name is required';
                }
                if (!empty($_POST['location'])) {
                    $location = $_POST['location'];

                } else {
                    $locationErrMess = 'Class location is required';
                }
                if (empty($classNameErrMess) && empty($locationErrMess)) {
                    $connection->insertClass($_POST['classname'], $_POST['location']);
                }

            } elseif ($_GET['create'] == 'student') {
                if (!empty($_POST['studentname'])) {
                    $studentName = $_POST['studentname'];

                } else {
                    $studentNameErrMess = 'Student name is required';
                }

                if (!empty($_POST['email'])) {
                    $email = $_POST['email'];
                    $this->validateEmail($email);

                } else {
                    $emailErrMess = 'Email is required';
                }

                if (!empty($_POST['class'])) {
                    $class = $_POST['class'];

                } else {
                    $classErrMess = 'Class is required';
                }

                if (empty($classNameErrMess) && empty($locationErrMess)) {
                    $connection->insertStudent($_POST['studentname'], $_POST['email']);
                }

            } else {
                if (!empty($_POST['teachername'])) {
                    $teacherName = $_POST['teachername'];

                } else {
                    $teacherNameErrMess = 'Teacher name is required';
                }

                if (!empty($_POST['email'])) {
                    $email = $_POST['email'];
                    $this->validateEmail($email);

                } else {
                    $emailErrMess = 'Email is required';
                }

                if (!empty($_POST['class'])) {
                    $class = $_POST['class'];

                } else {
                    $classErrMess = 'Class is required';
                }

                if (empty($teacherNameErrMess) && empty($emailErrMess)) {
                    $connection->insertTeacher($_POST['teachername'], $_POST['email']);
                }
            }
        }

        require $view;
    }

    public function validateEmail($email)
    {
        global $emailErrMess;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErrMess = 'Email is invalid';

        }
    }
}