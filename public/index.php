<?php


use Slim\Factory\AppFactory;

use DI\Container;

require __DIR__.'/../vendor/autoload.php';
$container = new Container;
$routes = require __DIR__.'/../app/routes.php';
$setting = require __DIR__.'/../app/setting.php';
$setting($container);
AppFactory::setContainer($container);
$app = AppFactory::create();
$routes($app);
$app->addErrorMiddleware(true , true , true);

$app->run();


?>