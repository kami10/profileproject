<?php

namespace App\Controller;

use App\Interfaces\FactoryInterface;
use App\Services\DBService;
use App\System\ServiceManager;

class RegisterValidationFactory implements FactoryInterface
{

    public function __invoke(ServiceManager $serviceManager)
    {
       return new RegisterValidation($serviceManager->get(DBService::class));
    }
}