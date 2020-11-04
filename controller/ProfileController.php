<?php
declare(strict_types=1);

class ProfileController
{
    private Connection $connection;
    private int $id;

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
        $connection = new Connection();
        $id = $_GET['user'];

        if ($_GET['profile'] == 'class') {
            $classLoader = new ClassLoader();
            $classes = $classLoader->getClasses();
            foreach ($classes as $class) {
                if ($class->getId() == $id) {
                    $profile = $class;
                }
                $teacher = $connection->getTeacher($profile->getId());
                $students = $connection->getStudents($profile->getId());
                $this->Delete();
            }
        } elseif ($_GET['profile'] == 'student') {
            $profile = $connection->getStudentProfile($id);

            $teacher = $connection->getTeacher($profile['classes_id']);
            $class = $connection->getClass($profile['classes_id']);
            $this->Delete();

        } else {
            $profile = $connection->getTeacherProfile($id);
            $students = $connection->getStudents($profile['classes_id']);
            $class = $connection->getClass($profile['classes_id']);
            $this->Delete();
        }

        require $view;
    }

    public function Delete(){

        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            $this->id = $_POST["id"];
            $entity = $_GET["page"];

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