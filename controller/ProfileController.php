<?php
declare(strict_types=1);

class ProfileController
{
    public function viewChanger()
    {
        if ($_GET['profile'] == 'class'){
            return 'view/profileClass.php';
        } elseif ($_GET['profile'] == 'student'){
            return 'view/profileStudent.php';
        } else{
            return 'view/profileTeacher.php';
        }
    }
    public function render()
    {
        $view = $this->viewChanger();
        $connection = new Connection();
        $id = $_GET['user'];
        $profile = [];
        if ($_GET['profile'] == 'class'){
            $classLoader = new ClassLoader();
            $classes = $classLoader->getClasses();
            foreach ($classes as $class){
                if ($class->getId() == $id){
                    $profile = $class;
                }
            }
        } elseif ($_GET['profile'] == 'student'){
            $profile = $connection->getStudent($id);
        } else{
            $profile = $connection->getTeacherProfile($id);
            $students = $connection->getStudents($profile['classes_id']);
        }

        require $view;
    }
}