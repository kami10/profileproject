<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Services\DBService;

class RegisterValidation implements ControllerInterface
{
    private DBService $DBService;

    public function __construct(DBService $DBService)
    {
        $this->DBService = $DBService;
    }

    public function checkUserInputs(string $username, string $password, string $email, int $number)
    {
        $password = md5($password);
        $this->DBService->addMember($username, $password, $email, $number);
    }

    public function handle()
    {

    }
}