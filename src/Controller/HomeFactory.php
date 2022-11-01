<?php

namespace App\Controller;

use App\Interfaces\FactoryInterface;
use App\Services\TemplateRenderer;
use App\System\ServiceManager;

class HomeFactory implements FactoryInterface
{

    public function __invoke(ServiceManager $serviceManager)
    {
        return new Home($serviceManager->get(TemplateRenderer::class));
    }
}