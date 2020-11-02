<?php


class CreateClassController
{
    public function render()
    {
        $connection = new Connection();
        global $className, $location;
        global $classNameErrMess, $locationErrMess;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
            if(empty($classNameErrMess) && empty($locationErrMess)){
                $connection->insertData($_POST['classname'], $_POST['location']);
            }
        }

        require 'view/create.php';
    }

}