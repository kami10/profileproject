<?php

namespace App\Services;

use App\Interfaces\ControllerInterface;

class TemplateRenderer
{

    public function render(string $filename)
    {
        include __DIR__ . '/../Templates/' . $filename;
    }
}