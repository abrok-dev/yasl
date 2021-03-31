<?php
 
 namespace Containers;
use DI\Container;

class Setting
{

    protected Container $container;

    public function __construct()
    {
        $this->container = new Container();
        $this->container->set('setting' , function (){
            return [
                'displayErrorDetails' => true ,
                'logErrors' => true ,
                'logErrorDetails' => true
            ];
        });
    }

}

 
