<?php
declare(strict_types=1);

class OverviewController {

    private $connection;

    public function __construct()
    {

        $this->connection = new Connection();
    }

    public function render()
    {

        if($_GET["page"]=="class"){
            $view = 'view/overview.php';
        }

        else if ($_GET["page"]=="student"){
            $view = 'view/studentOverview.php';
        }

        else {
            $view = 'view/teacherOverview.php';
        }

        $overview = [];


        if($_GET["page"]=="class"){

            $classLoader = new ClassLoader();
            $overview = $classLoader->getClasses();
            $this->Delete();
        }

        elseif ($_GET["page"]=="student"){

            $overview = $this->connection->getAllStudents();
            $this->Delete();

        }

        else {

           $overview = $this->connection->getTeachers();
           $this->Delete();
           
        }


        require $view;

    }

    public function Delete(){

        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            $id = $_POST["id"];
            $entity = $_GET["page"];

            if($entity == "class"){
                $table = "classes";
            }

            //if you remove a class, make sure to remove the link between students and class

            elseif($entity == "student"){
                $table = "students";
            }

            //teacher cannot be removed if he is still assigned to a class

           else{

               //if teacher class id is not class id

                $table = "teachers";

                $teacherProfile = $this->connection->getTeacherProfile($id);

                if(!isset($teacherProfile['classes_id'])){
                    exit;
                }
            }

            $this->connection->Delete($id, $table);


        }

    }

}