<?php


require __DIR__.'/start.php';
use Slim\Factory\AppFactory;
use Containers\Controllers;


require __DIR__.'/../vendor/autoload.php';
$routes = require __DIR__.'/../app/routes.php';
$controllers = new Controllers;


AppFactory::setContainer($controllers->container);
$app = AppFactory::create();
$routes($app);
$app->addErrorMiddleware(true , true , true);

$app->run();


?>