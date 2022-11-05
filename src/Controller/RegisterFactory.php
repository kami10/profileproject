<?php

namespace App\Controller;

use App\Interfaces\FactoryInterface;
use App\Services\DBService;
use App\Services\TemplateRenderer;
use App\System\ServiceManager;

class RegisterFactory implements FactoryInterface
{

    public function __invoke(ServiceManager $serviceManager)
    {
        $registerValidation = $serviceManager->get(RegisterValidation::class);
        $templateRenderer = $serviceManager->get(TemplateRenderer::class);
        return new Register($registerValidation, $templateRenderer);
    }
}