<?php

namespace App\System;

use App\Interfaces\ControllerInterface;
use App\Interfaces\MiddlewareInterface;
use Exception;

class Router
{
    private array $route;

    public function __construct(array $route)
    {
        $this->route = $route;
    }

    public function resolve(string $address)
    {
        $routes = $this->route;
        $output = $routes[$address] ?? null;

        if ($output !== null) {
            return $output;
        }
        throw new Exception('route not found');
    }
}