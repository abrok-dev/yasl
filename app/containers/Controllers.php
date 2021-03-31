<?php

namespace Containers;
//require __DIR__.'/../../vendor/autoload.php';
use Controllers\TestController;

use DI\Container;

class Controllers 
{   
    public Container $container;
    public function __construct()
    {
        $this->container = new Container();

        $this->container->set(\TestController::class , function () {
            return new TestController();
        });

    }

    
}





