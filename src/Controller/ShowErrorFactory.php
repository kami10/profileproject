<?php

namespace App\Controller;

use App\Interfaces\FactoryInterface;
use App\System\ServiceManager;

class ShowErrorFactory implements FactoryInterface
{

    public function __invoke(ServiceManager $serviceManager)
    {
        return new ShowError();
    }
}