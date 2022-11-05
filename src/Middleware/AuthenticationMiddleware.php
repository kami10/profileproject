<?php

namespace App\Middleware;

use App\Controller\Profile;
use App\Interfaces\ControllerInterface;
use App\Interfaces\MiddlewareInterface;
use App\System\ServiceManager;

class AuthenticationMiddleware implements MiddlewareInterface
{
    private ServiceManager $serviceManager;

    public function __construct(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }

    public function process()
    {
        if (!$_SESSION) {
            header("location: " . 'login');
        }
    }
}