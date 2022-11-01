<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Services\TemplateRenderer;

class Home implements ControllerInterface
{
    private TemplateRenderer $templateRenderer;

    public function __construct(TemplateRenderer $templateRenderer)
    {
        $this->templateRenderer = $templateRenderer;
    }

    public function handle()
    {
      return $this->templateRenderer->render('homeTemplate.php');
    }
}