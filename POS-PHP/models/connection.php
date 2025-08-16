<?php

class Connection {

    public static function connect() {
        try {
            $link = new PDO("mysql:host=localhost;dbname=posystem", "root", "");
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $link->exec("SET NAMES utf8mb4");
            return $link;
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
}
