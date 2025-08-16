<?php

require_once "../controllers/products.controller.php";
require_once "../models/products.model.php";

require_once "../controllers/categories.controller.php";
require_once "../models/categories.model.php";

class productsTable {

    /*=============================================
      SHOW PRODUCTS TABLE
    =============================================*/ 
    public function showProductsTable() {

        $item = null;
        $value = null;
        $order = "id";

        $products = ControllerProducts::ctrShowProducts($item, $value, $order);

        if (!$products || count($products) === 0) {
            echo json_encode(["data" => []]);
            return;
        }

        $jsonData = ["data" => []];

        for ($i = 0; $i < count($products); $i++) {

            /*=============================================
              IMAGE
            =============================================*/
            $image = "<img src='" . htmlspecialchars($products[$i]["image"], ENT_QUOTES, 'UTF-8') . "' width='40px'>";

            /*=============================================
              CATEGORY
            =============================================*/
            $itemCat = "id";
            $valueCat = $products[$i]["idCategory"];
            $categoryData = ControllerCategories::ctrShowCategories($itemCat, $valueCat);
            $categoryName = $categoryData ? $categoryData["Category"] : "Unknown";

            /*=============================================
              STOCK COLOR
            =============================================*/
            if ($products[$i]["stock"] <= 10) {
                $stock = "<button class='btn btn-danger'>" . $products[$i]["stock"] . "</button>";
            } elseif ($products[$i]["stock"] > 11 && $products[$i]["stock"] <= 15) {
                $stock = "<button class='btn btn-warning'>" . $products[$i]["stock"] . "</button>";
            } else {
                $stock = "<button class='btn btn-success'>" . $products[$i]["stock"] . "</button>";
            }

            /*=============================================
              ACTION BUTTONS
            =============================================*/
            $hiddenProfile = isset($_GET["hiddenProfile"]) ? $_GET["hiddenProfile"] : "";
            if ($hiddenProfile === "Special") {
                $buttons = "<div class='btn-group'>
                    <button class='btn btn-primary btnEditProduct' idProduct='" . $products[$i]["id"] . "' data-toggle='modal' data-target='#modalEditProduct'>
                        <i class='fa fa-pencil'></i>
                    </button>
                </div>";
            } else {
                $buttons = "<div class='btn-group'>
                    <button class='btn btn-primary btnEditProduct' idProduct='" . $products[$i]["id"] . "' data-toggle='modal' data-target='#modalEditProduct'>
                        <i class='fa fa-pencil'></i>
                    </button>
                    <button class='btn btn-danger btnDeleteProduct' idProduct='" . $products[$i]["id"] . "' code='" . htmlspecialchars($products[$i]["code"], ENT_QUOTES, 'UTF-8') . "' image='" . htmlspecialchars($products[$i]["image"], ENT_QUOTES, 'UTF-8') . "'>
                        <i class='fa fa-trash'></i>
                    </button>
                </div>";
            }

            /*=============================================
              ADD ROW TO JSON ARRAY
            =============================================*/
            $jsonData["data"][] = [
                ($i + 1),
                $image,
                htmlspecialchars($products[$i]["code"], ENT_QUOTES, 'UTF-8'),
                htmlspecialchars($products[$i]["description"], ENT_QUOTES, 'UTF-8'),
                htmlspecialchars($categoryName, ENT_QUOTES, 'UTF-8'),
                $stock,
                "$ " . number_format($products[$i]["buyingPrice"], 2),
                "$ " . number_format($products[$i]["sellingPrice"], 2),
                $products[$i]["date"],
                $buttons
            ];
        }

        /*=============================================
          OUTPUT AS JSON
        =============================================*/
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($jsonData, JSON_UNESCAPED_UNICODE);
    }
}

/*=============================================
  ACTIVATE PRODUCTS TABLE
=============================================*/ 
$activateProducts = new productsTable();
$activateProducts->showProductsTable();
