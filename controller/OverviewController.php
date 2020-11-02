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

        else if ($_GET["page"]=="student"){



        }

        else {

           $overview = $connection->getTeachers();

        }


        require $view;

    }

}