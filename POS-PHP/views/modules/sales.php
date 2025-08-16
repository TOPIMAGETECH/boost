<?php

// Redirect special profile users to home
if (isset($_SESSION["profile"]) && $_SESSION["profile"] == "Special") {
  echo '<script>window.location = "home";</script>';
  return;
}

// Attempt to download XML
$xml = ControllerSales::ctrDownloadXML();
if ($xml && !empty($_GET["xml"])) {
  // Sanitize filename
  $fileName = basename($_GET["xml"]);

  // Move the generated XML file to xml/ folder
  if (@rename($fileName . ".xml", "xml/" . $fileName . ".xml")) {
    echo '<a class="btn btn-block btn-success openXML" file="xml/' . $fileName . '.xml" href="sales">
                The XML file has been created successfully
                <span class="fa fa-times pull-right"></span>
              </a>';
  }
}
?>
<div class="content-wrapper">

  <section class="content-header">
    <h1>Sales Management</h1>
    <ol class="breadcrumb">
      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <a href="create-sale">
          <button class="btn btn-success">
            <i class="fa fa-plus"></i> Add Sale
          </button>
        </a>

        <button type="button" class="btn btn-primary pull-right" id="daterange-btn">
          <span><i class="fa fa-calendar"></i> Date Range</span>
          <i class="fa fa-caret-down"></i>
        </button>

      </div>

      <div class="box-body">
        <table class="table table-bordered table-hover table-striped dt-responsive tables" width="100%">
          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Bill</th>
              <th>Customer</th>
              <th>Seller</th>
              <th>Payment Method</th>
              <th>Net Cost</th>
              <th>Total Cost</th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Date filters
            $initialDate = $_GET["initialDate"] ?? null;
            $finalDate = $_GET["finalDate"] ?? null;

            // Get sales data
            $answer = ControllerSales::ctrSalesDatesRange($initialDate, $finalDate);

            foreach ($answer as $key => $value) {
              echo '<tr>
            <td>' . ($key + 1) . '</td>
            <td>' . htmlspecialchars($value["code"]) . '</td>';

              $customerAnswer = ControllerCustomers::ctrShowCustomers("id", $value["idCustomer"]);
              $customerName = is_array($customerAnswer) && isset($customerAnswer["name"])
                ? $customerAnswer["name"]
                : "Unknown Customer";
              echo '<td>' . htmlspecialchars($customerName) . '</td>';

              $userAnswer = ControllerUsers::ctrShowUsers("id", $value["idSeller"]);
              $sellerName = is_array($userAnswer) && isset($userAnswer["name"])
                ? $userAnswer["name"]
                : "Unknown Seller";
              echo '<td>' . htmlspecialchars($sellerName) . '</td>

          <td>' . htmlspecialchars($value["paymentMethod"]) . '</td>
          <td>$ ' . number_format($value["netPrice"], 2) . '</td>
          <td>$ ' . number_format($value["totalPrice"], 2) . '</td>
          <td>' . htmlspecialchars($value["saledate"]) . '</td>

          <td>
            <div class="btn-group">
              <a class="btn btn-success" href="index.php?route=sales&xml=' . urlencode($value["code"]) . '">xml</a>
              <button class="btn btn-warning btnPrintBill" saleCode="' . htmlspecialchars($value["code"]) . '">
                <i class="fa fa-print"></i>
              </button>';
              if (isset($_SESSION["profile"]) && $_SESSION["profile"] == "Administrator") {
                echo '<button class="btn btn-primary btnEditSale" idSale="' . intval($value["id"]) . '">
                <i class="fa fa-pencil"></i>
              </button>
              <button class="btn btn-danger btnDeleteSale" idSale="' . intval($value["id"]) . '">
                <i class="fa fa-trash"></i>
              </button>';
              }
              echo '    </div>
          </td>
        </tr>';
            }

            ?>
          </tbody>
        </table>

        <?php
        // Handle sale deletion
        $deleteSale = new ControllerSales();
        $deleteSale->ctrDeleteSale();
        ?>
      </div>

    </div>
  </section>

</div>