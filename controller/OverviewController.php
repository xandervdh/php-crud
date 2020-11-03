<?php
declare(strict_types=1);

class OverviewController {
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
        $connection = new Connection();

        if($_GET["page"]=="class"){

            $classLoader = new ClassLoader();
            $overview = $classLoader->getClasses();

        }

        elseif ($_GET["page"]=="student"){

            $overview = $connection->getAllStudents();

        }

        else {

           $overview = $connection->getTeachers();


        }


        require $view;

    }

    public function Delete(){

        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            $id = $_POST["id"];
            $entity = $_GET["page"];





        }

    }

}