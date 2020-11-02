<?php
declare(strict_types=1);

class OverviewController {
    public function render()
    {

        $classLoader = new ClassLoader();
        $class = $classLoader->getClasses();

        require 'view/overview.php';

    }

}