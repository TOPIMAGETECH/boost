<?php

require_once "connection.php";

class UsersModel
{

    /*=============================================
    SHOW USER
    =============================================*/
    public static function MdlShowUsers($tableUsers, $item, $value)
    {
        try {
            $pdo = Connection::connect();

            if ($item !== null) {
                $stmt = $pdo->prepare("SELECT * FROM $tableUsers WHERE $item = :$item");
                $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);
                $stmt->execute();

                $result = $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                $stmt = $pdo->prepare("SELECT * FROM $tableUsers");
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

            $stmt = null;
            return $result ?: null; // Avoid bool return

        } catch (PDOException $e) {
            error_log("MdlShowUsers Error: " . $e->getMessage());
            return null;
        }
    }

    /*=============================================
    ADD USER
    =============================================*/
    public static function mdlAddUser($table, $data)
    {
        try {
            $stmt = Connection::connect()->prepare(
                "INSERT INTO $table (name, user, password, profile, photo) 
                 VALUES (:name, :user, :password, :profile, :photo)"
            );

            $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
            $stmt->bindParam(":user", $data["user"], PDO::PARAM_STR);
            $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
            $stmt->bindParam(":profile", $data["profile"], PDO::PARAM_STR);
            $stmt->bindParam(":photo", $data["photo"], PDO::PARAM_STR);

            $success = $stmt->execute();
            $stmt = null;
            return $success ? 'ok' : 'error';

        } catch (PDOException $e) {
            error_log("mdlAddUser Error: " . $e->getMessage());
            return 'error';
        }
    }

    /*=============================================
    EDIT USER
    =============================================*/
    public static function mdlEditUser($table, $data)
    {
        try {
            $stmt = Connection::connect()->prepare(
                "UPDATE $table 
                 SET name = :name, password = :password, profile = :profile, photo = :photo 
                 WHERE user = :user"
            );

            $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
            $stmt->bindParam(":user", $data["user"], PDO::PARAM_STR);
            $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
            $stmt->bindParam(":profile", $data["profile"], PDO::PARAM_STR);
            $stmt->bindParam(":photo", $data["photo"], PDO::PARAM_STR);

            $success = $stmt->execute();
            $stmt = null;
            return $success ? 'ok' : 'error';

        } catch (PDOException $e) {
            error_log("mdlEditUser Error: " . $e->getMessage());
            return 'error';
        }
    }

    /*=============================================
    UPDATE USER
    =============================================*/
    public static function mdlUpdateUser($table, $item1, $value1, $item2, $value2)
    {
        // Whitelist tables and columns to prevent injection
        $allowedTables = ['users'];
        $allowedColumns = ['name', 'user', 'password', 'profile', 'photo'];

        if (!in_array($table, $allowedTables) || 
            !in_array($item1, $allowedColumns) || 
            !in_array($item2, $allowedColumns)) {
            return 'error';
        }

        try {
            $stmt = Connection::connect()->prepare(
                "UPDATE $table SET $item1 = :$item1 WHERE $item2 = :$item2"
            );

            $stmt->bindParam(":$item1", $value1, PDO::PARAM_STR);
            $stmt->bindParam(":$item2", $value2, PDO::PARAM_STR);

            $success = $stmt->execute();
            $stmt = null;
            return $success ? 'ok' : 'error';

        } catch (PDOException $e) {
            error_log("mdlUpdateUser Error: " . $e->getMessage());
            return 'error';
        }
    }

    /*=============================================
    DELETE USER
    =============================================*/
    public static function mdlDeleteUser($table, $data)
    {
        // Whitelist table
        $allowedTables = ['users'];
        if (!in_array($table, $allowedTables)) {
            return 'error';
        }

        try {
            $stmt = Connection::connect()->prepare("DELETE FROM $table WHERE id = :id");
            $stmt->bindParam(":id", $data, PDO::PARAM_INT);

            $success = $stmt->execute();
            $stmt = null;
            return $success ? 'ok' : 'error';

        } catch (PDOException $e) {
            error_log("mdlDeleteUser Error: " . $e->getMessage());
            return 'error';
        }
    }
}
