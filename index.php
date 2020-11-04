<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'model/ClassLoader.php';
require 'model/ClassModel.php';
require 'model/Connection.php';
require 'model/Student.php';
require 'model/Teacher.php';

if (isset($_GET['create'])) {
    require 'controller/CreateController.php';
    $controller = new CreateController();
} elseif (isset($_GET['profile'])) {
    require 'controller/ProfileController.php';
    $controller = new ProfileController();
} elseif (isset($_GET['page'])) {
    require 'controller/OverviewController.php';
    $controller = new OverviewController();
}elseif (isset($_GET['edit'])){
    require 'controller/EditController.php';
    $controller = new EditController();
}else {
    require 'controller/HomeController.php';
    $controller = new HomeController();
}

$controller->render();