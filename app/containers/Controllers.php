<?php

namespace Containers;
//require __DIR__.'/../../vendor/autoload.php';
use Controllers\SearchController;
use Controllers\MainPageController;
use DI\Container;

class Controllers 
{   
    public Container $container;
    public function __construct()
    {
        $this->container = new Container();

        $this->container->set(\SearchController::class , function () {
            return new SearchController();
        });
        $this->container->set(\MainPageController::class , function() {
            return new MainPageController();
        });

    }

    
}





