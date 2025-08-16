<?php

class Connection
{
    public static function connect()
    {
        try {
            // Detect environment
            if ($_SERVER['SERVER_NAME'] === "localhost") {
                // Local connection
                $host = "localhost";
                $db   = "posystem";
                $user = "root";
                $pass = "";
            } else {
                // Live server connection
                $host = "localhost";
                $db   = "boosdsbd_posystem";
                $user = "boosdsbd_Bismark2025";
                $pass = "Image@1321@@@";
            }

            $link = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $link->exec("SET NAMES utf8mb4");

            return $link;

        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
}
