<?php

session_start();
require '../vendor/autoload.php';

use App\Interfaces\ControllerInterface;
use App\Interfaces\MiddlewareInterface;
use App\System\App;
use App\System\Router;
use App\System\ServiceManager;

$config = include __DIR__ . '/../config/global.php';
$serviceManager = new ServiceManager($config);

/** @var $app */
$app = $serviceManager->get(App::class);
$app->run();


