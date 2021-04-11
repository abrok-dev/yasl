<?php

//use App\Container\Controllers;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Routing\RouteContext;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;



return function (App $app){
    $app->get('/' , \MainPageController::class . ':render');
    $app->get('/search' ,\SearchController::class . ':searchData');
    $app->get('/artist/{id_artist}' , \ArtistController::class . ':imageArtistData');
};

