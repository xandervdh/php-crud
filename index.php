<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'moddel/ClassLoader.php';
require 'moddel/ClassModel.php';
require "moddel/Connection.php";

if (isset($_GET['page'])) {
    require 'controller/CreateClassController.php';
    $controller = new CreateClassController();
} elseif (isset($_GET['user'])) {
    require 'controller/ProfileController.php';
    $controller = new ProfileController();
} else {
    require 'controller/OverviewController.php';
    $controller = new OverviewController();
}

$controller->render();