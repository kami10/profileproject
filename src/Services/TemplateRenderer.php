<?php

namespace App\Services;

use App\Interfaces\ControllerInterface;

class TemplateRenderer
{

    public function render(string $filename)
    {
        //var_dump($filename);die;
        return include __DIR__ . '/../Templates/'. $filename;
    }
}