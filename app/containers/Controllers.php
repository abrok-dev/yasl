<?php

namespace Containers;
//require __DIR__.'/../../vendor/autoload.php';
use Controllers\SearchController;
use Controllers\MainPageController;
use Controllers\ArtistController;
use Controllers\AlbumController;
use Controllers\SongController;
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
        $this->container->set(\AlbumController::class , function () {
            return new AlbumController();
        });
        $this->container->set(\ArtistController::class , function () {
            return new ArtistController();
        });
        $this->container->set(\SongController::class , function () {
            return new SongController();
        });

    }

    
}





