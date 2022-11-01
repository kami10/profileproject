<?php

namespace App\System;

use App\Interfaces\ControllerInterface;
use App\Interfaces\MiddlewareInterface;
use Exception;

class Router
{
    public ServiceManager $serviceManager;

    public function __construct(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }

    public function run(string $address)
    {
        $route = $this->serviceManager->get('config')['routes'] ?? [];
        $output = $route[$address] ?? $route['showError'];

        if (is_array($output)) {
            $middleware = $this->serviceManager->get(current($output));
            if ($middleware instanceof MiddlewareInterface) {
                return $middleware;
            }
        } else {
            $controller = $this->serviceManager->get($output);
            if ($controller instanceof ControllerInterface) {
                return $controller;
            }
        }
        throw new Exception('route not found');
    }
}