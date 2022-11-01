<?php

use App\Controller\Home;
use App\Controller\HomeFactory;
use App\Controller\Login;
use App\Controller\LoginFactory;
use App\Controller\Profile;
use App\Controller\ProfileFactory;
use App\Controller\Register;
use App\Controller\RegisterFactory;
use App\Controller\ShowError;
use App\Controller\ShowErrorFactory;
use App\Middleware\AuthenticationMiddleware;
use App\Middleware\AuthenticationMiddlewareFactory;
use App\Services\DBService;
use App\Services\TemplateRenderer;
use App\Services\TemplateRendererFactory;
use App\System\Router;
use App\System\RouterFactory;

$routes = include __DIR__ . '/routes.php';

return [
        'factories' => [
            Home::class => HomeFactory::class,
            Router::class => RouterFactory::class,
            TemplateRenderer::class => TemplateRendererFactory::class,
            Login::class => LoginFactory::class,
            Register::class => RegisterFactory::class,
            ShowError::class => ShowErrorFactory::class,
            Profile::class => ProfileFactory::class,
            AuthenticationMiddleware::class => AuthenticationMiddlewareFactory::class,
        ],
        'invokables' => [
            DBService::class => DBService::class,
        ]
    ] + $routes;

