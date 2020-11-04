<?php
declare(strict_types=1);

class ProfileController
{
    private Connection $connection;
    private int $id;

    public function __construct()
    {
        $this->connection = new Connection();
    }


    public function viewChanger()
    {
        if ($_GET['profile'] == 'class') {
            return 'view/profileClass.php';
        } elseif ($_GET['profile'] == 'student') {
            return 'view/profileStudent.php';
        } else {
            return 'view/profileTeacher.php';
        }
    }

    public function render()
    {
        $view = $this->viewChanger();
        $id = $_GET['user'];

        if ($_GET['profile'] == 'class') {
            $this->Delete();
            $classLoader = new ClassLoader();
            $classes = $classLoader->getClasses();
            foreach ($classes as $class) {
                if ($class->getId() == $id) {
                    $profile = $class;
                }
                $teacher = $this->connection->getTeacher($profile->getId());
                $students = $this->connection->getStudents($profile->getId());
            }
        } elseif ($_GET['profile'] == 'student') {
            $this->Delete();
            $profile = $this->connection->getStudentProfile($id);
            $teacher = $this->connection->getTeacher($profile['classes_id']);
            $class = $this->connection->getClass($profile['classes_id']);

        } else {
            $this->Delete();
            $profile = $this->connection->getTeacherProfile($id);
            $students = $this->connection->getStudents($profile['classes_id']);
            $class = $this->connection->getClass($profile['classes_id']);
        }

        require $view;
    }

    public function Delete(){

        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            $this->id = intval($_POST["id"]);
            $entity = $_GET["profile"];

            //teacher cannot be removed if he is still assigned to a class

            if ($entity =='teacher'){

                //if teacher class id is not class id



                $teacherProfile = $this->connection->getTeacherProfile($this->id);

                if(!isset($teacherProfile['classes_id'])){
                    exit;
                }
            }
                $this->connection->Delete($this->id, $entity);


        }

    }
}