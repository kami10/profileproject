<?php

session_start();
require '../vendor/autoload.php';

use App\Interfaces\ControllerInterface;
use App\Interfaces\MiddlewareInterface;
use App\System\Router;
use App\System\ServiceManager;

$address = $_GET['path'] ?? 'home';

$config = include __DIR__ . '/../config/global.php';
$serviceManager = new ServiceManager($config);

$router = $serviceManager->get(Router::class);
/** @var ControllerInterface $controller */
$controller = $router->run($address);
if ($controller instanceof MiddlewareInterface) {
    return $controller->process();
}
echo $controller->handle();
