<?php
 

use DI\Container;

return function ( Container $container){
    $container->set('setting' , function (){
        return [
            'displayErrorDetails' => true ,
            'logErrors' => true ,
            'logErrorDetails' => true
        ];
    });

};