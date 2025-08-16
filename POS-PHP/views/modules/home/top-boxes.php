<?php

$item = null;
$value = null;
$order = "id";

// Create instances of controllers
$salesController = new ControllerSales();
$categoriesController = new ControllerCategories();
$customersController = new ControllerCustomers();
$productsController = new ControllerProducts();

// Get total sales
$sales = $salesController->ctrAddingTotalSales();

// Get total categories
$categories = $categoriesController->ctrShowCategories($item, $value);
$totalCategories = is_array($categories) ? count($categories) : 0;

// Get total customers
$customers = $customersController->ctrShowCustomers($item, $value);
$totalCustomers = is_array($customers) ? count($customers) : 0;

// Get total products
$products = $productsController->ctrShowProducts($item, $value, $order);
$totalProducts = is_array($products) ? count($products) : 0;

?>




<div class="col-lg-3 col-xs-6">
	<!-- Log on to codeastro.com for more projects! -->
  <div class="small-box bg-green">
    
    <div class="inner">
      
      <h3>$<?php echo number_format($sales["total"],2); ?></h3>

      <p>Sales</p>
    
    </div>
    
    <div class="icon">
      
      <i class="ion ion-social-usd"></i>
    
    </div>
    
    <a href="sales" class="small-box-footer">
      
      More info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>
<!-- Log on to codeastro.com for more projects! -->
<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-primary">
    
    <div class="inner">
    
      <h3><?php echo number_format($totalCategories); ?></h3>

      <p>Categories</p>
    
    </div>
    
    <div class="icon">
    
      <i class="ion ion-clipboard"></i>
    
    </div>
    
    <a href="categories" class="small-box-footer">
      
      More info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>
<!-- Log on to codeastro.com for more projects! -->
<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-purple">
    
    <div class="inner">
    
      <h3><?php echo number_format($totalCustomers); ?></h3>

      <p>Customers</p>
  
    </div>
    
    <div class="icon">
    
      <i class="ion ion-person-add"></i>
    
    </div>
    
    <a href="customers" class="small-box-footer">

      More info <i class="fa fa-arrow-circle-right"></i>

    </a>

  </div>

</div>
<!-- Log on to codeastro.com for more projects! -->
<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-red">
  
    <div class="inner">
    
      <h3><?php echo number_format($totalProducts); ?></h3>

      <p>products</p>
    
    </div>
    
    <div class="icon">
      
      <i class="ion ion-ios-cart"></i>
    
    </div>
    
    <a href="products" class="small-box-footer">
      
      More info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>
	<!-- Log on to codeastro.com for more projects! -->
</div>