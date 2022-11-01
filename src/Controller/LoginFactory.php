<?php

namespace App\Controller;

use App\Interfaces\FactoryInterface;
use App\Services\DBService;
use App\Services\TemplateRenderer;
use App\System\ServiceManager;

class LoginFactory implements FactoryInterface
{

    public function __invoke(ServiceManager $serviceManager)
    {
        $dbService = $serviceManager->get(DBService::class);
        $templateRenderer = $serviceManager->get(TemplateRenderer::class);
        return new Login($dbService, $templateRenderer);
    }
}