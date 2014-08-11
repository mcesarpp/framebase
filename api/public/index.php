<?php

chdir(dirname(__DIR__));

require '/vendor/autoload.php';
require '/src/core/autoloader.php';

autoloader::init();

$app = new \Slim\Slim();

$app->map('/api(/:controller(/:action))', function ($controller = null, $action = null) use ($app) {
    $frontController = new frontController();
    $frontController->resolveRequest($controller, $action, $_REQUEST);
})->via('GET', 'POST');

$app->run();


