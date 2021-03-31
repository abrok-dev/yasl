<?php

//use App\Container\Controllers;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Routing\RouteContext;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;



return function (App $app){
    
    $app->get('/search' ,\TestController::class . ':searchData');
    $app->get('/hello', function (Request $request, Response $response) {
        
        $response->getBody()->write("Hello");
    
        return $response;
    });
};

