<?php

namespace App\Services;

use PDO;
use PDOException;

class DBConnection
{
    public function addMember(string $user, string $pass, string $email, int $number)
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=profile_db", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO tbl_registration (`username`, `password`,`email`,`number`)
            VALUES ('$user', '$pass','$email','$number')";
            // use exec() because no results are returned
            $conn->exec($sql);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function isLoggedIn(string $user, string $pass)
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=profile_db", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT id FROM tbl_registration WHERE `username` = '$user' AND `password`='$pass' ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $key => $value) {
                return $value;
            }
        } catch (PDOException $e) {
            return false;
        }
    }
}