<?php

use Slim\App;
return function (App $app){
$setting= $app->getContainer()->get('setting');

$app->addErrorMiddleware(true ,true ,true);
$app->addErrorMiddleware($setting['displayError'],$setting['logError'] ,$setting['logErrorDetails']);


};
