<?php

class Connection
{

    public static function connect()
    {
        try {
            $link = new PDO("mysql:host=localhost;
            dbname=boosdsbd_posystem",
             "boosdsbd_Bismark2025",
             "Image@1321@@@");
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $link->exec("SET NAMES utf8mb4");
            return $link;
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
}
