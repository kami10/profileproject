<?php

use App\Controller\Home;
use App\Controller\Login;
use App\Controller\Profile;
use App\Controller\Register;
use App\Middleware\AuthenticationMiddleware;

return [
    'routes' => [
        'home' => Home::class,
        'login' => Login::class,
        'register' => Register::class,
        'profile' => [
            AuthenticationMiddleware::class,
            Profile::class
        ],
    ]
];