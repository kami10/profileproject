<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Services\DBService;
use App\Services\TemplateRenderer;
use http\Client\Request;

class Register implements ControllerInterface
{
    private TemplateRenderer $templateRenderer;
    private RegisterValidation $registerValidation;

    public function __construct(RegisterValidation $registerValidation, TemplateRenderer $templateRenderer)
    {
        $this->templateRenderer = $templateRenderer;
        $this->registerValidation = $registerValidation;
    }

    public function handle()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            $email = $_REQUEST['email'];
            $number = $_REQUEST['number'];

            $this->registerValidation->checkUserInputs($username, $password, $email, $number);
            echo 'added';
        }

        return $this->templateRenderer->render('registerTemplate.php');
    }
}