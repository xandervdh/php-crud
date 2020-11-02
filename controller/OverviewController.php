<?php
declare(strict_types=1);

class OverviewController {
    public function render()
    {

        $classLoader = new ClassLoader();
        $classes = $classLoader->getClasses();

        require 'view/overview.php';

    }

}