<?php

namespace App\Services;

class DBService
{
    public function addMember(string $username, string $password, string $email, int $number)
    {
        $connection = new DBConnection();
        $connection->addMember($username, $password, $email, $number);
    }

    public function getMember(string $username, string $password)
    {
        $connection = new DBConnection();
        return $connection->isLoggedIn($username, $password);
    }
}