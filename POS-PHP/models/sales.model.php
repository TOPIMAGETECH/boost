<?php

require_once 'connection.php';

class ModelSales
{
    /*=============================================
    SHOW SALES
    =============================================*/
    static public function mdlShowSales($table, $item = null, $value = null)
    {
        $allowedTables = ['sales'];
        if (!in_array($table, $allowedTables)) {
            throw new Exception("Invalid table name");
        }

        $allowedColumns = ['id', 'code', 'idCustomer', 'idSeller', 'products', 'tax', 'netPrice', 'totalPrice', 'paymentMethod'];
        if ($item !== null && !in_array($item, $allowedColumns)) {
            throw new Exception("Invalid column name");
        }

        if ($item !== null) {
            $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :value ORDER BY id ASC");
            $paramType = is_numeric($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
            $stmt->bindParam(":value", $value, $paramType);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $stmt = Connection::connect()->prepare("SELECT * FROM $table ORDER BY id ASC");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        $stmt = null;
        return $result;
    }

    /*=============================================
    ADD SALE
    =============================================*/
    static public function mdlAddSale($table, $data)
    {
        $allowedTables = ['sales', 'orders'];
        if (!in_array($table, $allowedTables)) {
            throw new Exception("Invalid table name");
        }

        $sql = "INSERT INTO $table (code, idCustomer, idSeller, products, tax, netPrice, totalPrice, paymentMethod) 
                VALUES (:code, :idCustomer, :idSeller, :products, :tax, :netPrice, :totalPrice, :paymentMethod)";
        $stmt = Connection::connect()->prepare($sql);

        $stmt->bindParam(":code", $data["code"], PDO::PARAM_STR);
        $stmt->bindParam(":idCustomer", $data["idCustomer"], PDO::PARAM_INT);
        $stmt->bindParam(":idSeller", $data["idSeller"], PDO::PARAM_INT);
        $stmt->bindParam(":products", $data["products"], PDO::PARAM_STR);
        $stmt->bindParam(":tax", $data["tax"], PDO::PARAM_STR);
        $stmt->bindParam(":netPrice", $data["netPrice"], PDO::PARAM_STR);
        $stmt->bindParam(":totalPrice", $data["totalPrice"], PDO::PARAM_STR);
        $stmt->bindParam(":paymentMethod", $data["paymentMethod"], PDO::PARAM_STR);

        $success = $stmt->execute();
        $error = $success ? null : $stmt->errorInfo();

        $stmt = null;
        return $success ? "ok" : "error: " . $error[2];
    }

    /*=============================================
    EDIT SALE
    =============================================*/
    static public function mdlEditSale($table, $data)
    {
        $allowedTables = ['sales'];
        if (!in_array($table, $allowedTables)) {
            throw new Exception("Invalid table name");
        }

        $sql = "UPDATE $table 
                SET idCustomer = :idCustomer, 
                    idSeller = :idSeller, 
                    products = :products, 
                    tax = :tax, 
                    netPrice = :netPrice, 
                    totalPrice = :totalPrice, 
                    paymentMethod = :paymentMethod 
                WHERE code = :code";
        $stmt = Connection::connect()->prepare($sql);

        $stmt->bindParam(":code", $data["code"], PDO::PARAM_STR);
        $stmt->bindParam(":idCustomer", $data["idCustomer"], PDO::PARAM_INT);
        $stmt->bindParam(":idSeller", $data["idSeller"], PDO::PARAM_INT);
        $stmt->bindParam(":products", $data["products"], PDO::PARAM_STR);
        $stmt->bindParam(":tax", $data["tax"], PDO::PARAM_STR);
        $stmt->bindParam(":netPrice", $data["netPrice"], PDO::PARAM_STR);
        $stmt->bindParam(":totalPrice", $data["totalPrice"], PDO::PARAM_STR);
        $stmt->bindParam(":paymentMethod", $data["paymentMethod"], PDO::PARAM_STR);

        $success = $stmt->execute();
        $error = $success ? null : $stmt->errorInfo();

        $stmt = null;
        return $success ? "ok" : "error: " . $error[2];
    }

    /*=============================================
    DELETE SALE
    =============================================*/
    static public function mdlDeleteSale($table, $id)
    {
        $allowedTables = ['sales'];
        if (!in_array($table, $allowedTables)) {
            throw new Exception("Invalid table name");
        }

        $stmt = Connection::connect()->prepare("DELETE FROM $table WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        $success = $stmt->execute();
        $error = $success ? null : $stmt->errorInfo();

        $stmt = null;
        return $success ? "ok" : "error: " . $error[2];
    }

    /*=============================================
    SALES BY DATE RANGE
    =============================================*/
    static public function mdlSalesDatesRange($table, $initialDate, $finalDate)
    {
        $allowedTables = ['sales'];
        if (!in_array($table, $allowedTables)) {
            throw new Exception("Invalid table name");
        }

        if ($initialDate === null) {
            $stmt = Connection::connect()->prepare("SELECT * FROM $table ORDER BY id ASC");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } elseif ($initialDate === $finalDate) {
            $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE saledate LIKE :date");
            $likeDate = "%$finalDate%";
            $stmt->bindParam(":date", $likeDate, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $finalDateObj = new DateTime($finalDate);
            $finalDateObj->add(new DateInterval("P1D"));
            $finalPlusOne = $finalDateObj->format("Y-m-d");

            $actualDate = new DateTime();
            $actualDate->add(new DateInterval("P1D"));
            $todayPlusOne = $actualDate->format("Y-m-d");

            if ($finalPlusOne === $todayPlusOne) {
                $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE saledate BETWEEN :start AND :end");
                $stmt->bindParam(":start", $initialDate);
                $stmt->bindParam(":end", $finalPlusOne);
            } else {
                $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE saledate BETWEEN :start AND :end");
                $stmt->bindParam(":start", $initialDate);
                $stmt->bindParam(":end", $finalDate);
            }
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        $stmt = null;
        return $result;
    }

    /*=============================================
    TOTAL SALES
    =============================================*/
    static public function mdlAddingTotalSales($table)
    {
        $allowedTables = ['sales', 'orders'];
        if (!in_array($table, $allowedTables)) {
            throw new Exception("Invalid table name");
        }

        $stmt = Connection::connect()->prepare("SELECT SUM(netPrice) AS total FROM $table");
        $success = $stmt->execute();

        if ($success) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt = null;
            return $result;
        } else {
            $error = $stmt->errorInfo();
            $stmt = null;
            return ["error" => $error[2]];
        }
    }
}
