<?php

namespace App\Controller;

use App\Interfaces\FactoryInterface;
use App\Services\TemplateRenderer;
use App\System\ServiceManager;

class ProfileFactory implements FactoryInterface
{

    public function __invoke(ServiceManager $serviceManager)
    {
        return new Profile($serviceManager->get(TemplateRenderer::class));
    }
}