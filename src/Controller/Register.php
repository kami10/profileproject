<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Services\DBService;
use App\Services\TemplateRenderer;
use http\Client\Request;

class Register implements ControllerInterface
{
    private TemplateRenderer $templateRenderer;
    private DBService $DBService;

    public function __construct(DBService $DBService, TemplateRenderer $templateRenderer)
    {
        $this->templateRenderer = $templateRenderer;
        $this->DBService = $DBService;
    }

    public function handle()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            $email = $_REQUEST['email'];
            $number = $_REQUEST['number'];
            $this->DBService->addMember($username, $password, $email, $number);
            echo 'added';
        }
        return $this->templateRenderer->render('registerTemplate.php');
    }
}