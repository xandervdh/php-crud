<?php


class EditController
{
    private $connection;
    private $class;

    /**
     * CreateClassController constructor.
     */
    public function __construct()
    {
        $this->connection = new Connection();
    }

    public function viewChanger()
    {
        if ($_GET['edit'] == 'class') {
            $this->class = $this->connection->getClass($_GET['user']);
            return 'view/editClass.php';

        } elseif ($_GET['edit'] == 'student') {
            $this->class = $this->connection->getStudentProfile($_GET['user']);
            return 'view/editStudent.php';

        } else {
            $this->class = $this->connection->getTeacherProfile($_GET['user']);
            return 'view/editTeacher.php';
        }
    }

    public function render()
    {
        $view = $this->viewChanger();
        global $className, $location, $class, $studentName, $email, $teacherName;
        global $classNameErrMess, $locationErrMess, $classErrMess, $studentNameErrMess, $emailErrMess, $teacherNameErrMess;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($_GET['edit'] == 'class') {


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
                    $this->connection->insertClass($_POST['classname'], $_POST['location']);
                }

            } elseif ($_GET['edit'] == 'student') {


                if (!empty($_POST['studentname'])) {
                    $studentName = $_POST['studentname'];

                } else {
                    $studentNameErrMess = 'Student name is required';
                }

                if (!empty($_POST['email'])) {
                    $email = $_POST['email'];
                    $this->validateEmail($email, 'students');

                } else {
                    $emailErrMess = 'Email is required';
                }

                if (!empty($_POST['class'])) {
                    $class = $_POST['class'];

                } else {
                    $classErrMess = 'Class is required';
                }

                if (empty($studentNameErrMess) && empty($emailErrMess) && empty($classErrMess)) {
                    $this->connection->insertStudent($_POST['studentname'], $_POST['email'], $_POST['class']);
                }

            } else {


                if (!empty($_POST['teachername'])) {
                    $teacherName = $_POST['teachername'];

                } else {
                    $teacherNameErrMess = 'Teacher name is required';
                }

                if (!empty($_POST['email'])) {
                    $email = $_POST['email'];
                    $this->validateEmail($email, 'teachers');

                } else {
                    $emailErrMess = 'Email is required';
                }

                if (!empty($_POST['class'])) {
                    $class = $_POST['class'];

                } else {
                    $classErrMess = 'Class is required';
                }

                if (empty($teacherNameErrMess) && empty($emailErrMess) && empty($classErrMess)) {
                    $this->connection->insertTeacher($_POST['teachername'], $_POST['email'], $_POST['class']);
                }
            }
        }

        require $view;
    }

    public function validateEmail($email, $table)
    {
        global $emailErrMess;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErrMess = 'Email is invalid';

        }else{
            if($this->connection->checkEmailInDB($email, $table)){
                $emailErrMess = 'Email is already in use';
            }
        }
    }

}