<?php
declare(strict_types=1);

class OverviewController {

    private $connection;
    private $overview = [];
    private $id;

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




        if($_GET["page"]=="class"){

            $classLoader = new ClassLoader();
            $this->overview = $classLoader->getClasses();
            $this->Delete();
        }

        elseif ($_GET["page"]=="student"){

            $this->overview = $this->connection->getAllStudents();
            $this->Delete();

        }

        else {

           $this->overview = $this->connection->getTeachers();
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