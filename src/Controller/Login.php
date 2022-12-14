<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Services\DBService;
use App\Services\TemplateRenderer;

class Login implements ControllerInterface
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
            $username = $_REQUEST["username"];
            $password = md5($_REQUEST["password"]);

            $result = $this->DBService->getMember($username, $password);

            if ($result) {
                $userId = $result['id'];
                $_SESSION['id'] = $userId;
                header("location: " . 'profile?id=' . $userId);
            } else {
                echo 'login failed';
            }
        }
        return $this->templateRenderer->render('loginTemplate.php');
    }
}