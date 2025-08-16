<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirect sellers to home
if (!isset($_SESSION["profile"]) || $_SESSION["profile"] === "Seller") {
    echo '<script>window.location = "home";</script>';
    return;
}
?>
<div class="content-wrapper">

  <section class="content-header">
    <h1>Product Management</h1>
    <ol class="breadcrumb">
      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-success" data-toggle="modal" data-target="#addProduct">
          <i class="fa fa-plus"></i> Add Product
        </button>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-hover table-striped dt-responsive productsTable" width="100%">
          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Image</th>
              <th>Code</th>
              <th>Description</th>
              <th>Category</th>
              <th>Stock</th>
              <th>Buying Price</th>
              <th>Selling Price</th>
              <th>Date added</th>
              <th>Actions</th>
            </tr>
          </thead>
        </table>
        <input type="hidden" value="<?php echo htmlspecialchars($_SESSION['profile']); ?>" id="hiddenProfile">
      </div>
    </div>
  </section>
</div>

<!-- Add Product Modal -->
<div id="addProduct" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="POST" enctype="multipart/form-data">
        <div class="modal-header" style="background: #DD4B39; color: #fff">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Product</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">

            <!-- Category -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <select class="form-control input-lg" id="newCategory" name="newCategory" required>
                  <option value="">Select Category</option>
                  <?php
                  $item = null;
                  $value1 = null;
                  $categories = ControllerCategories::ctrShowCategories($item, $value1);
                  if (!empty($categories) && is_array($categories)) {
                      foreach ($categories as $value) {
                          echo '<option value="' . htmlspecialchars($value["id"]) . '">' . htmlspecialchars($value["Category"]) . '</option>';
                      }
                  }
                  ?>
                </select>
              </div>
            </div>

            <!-- Code -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-code"></i></span>
                <input class="form-control input-lg" type="text" id="newCode" name="newCode" placeholder="Add Product Code" required>
              </div>
            </div>

            <!-- Description -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                <input class="form-control input-lg" type="text" id="newDescription" name="newDescription" placeholder="Add Description/Product Name" required>
              </div>
            </div>

            <!-- Stock -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                <input class="form-control input-lg" type="number" id="newStock" name="newStock" placeholder="Add Stock" min="0" required>
              </div>
            </div>

            <!-- Prices -->
            <div class="form-group row">
              <div class="col-xs-12 col-sm-6">
                <div class="input-group"> 
                  <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 
                  <input type="number" class="form-control input-lg" id="newBuyingPrice" name="newBuyingPrice" step="any" min="0" placeholder="Buying Price" required>
                </div>
              </div>

              <div class="col-xs-12 col-sm-6">  
                <div class="input-group"> 
                  <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 
                  <input type="number" class="form-control input-lg" id="newSellingPrice" name="newSellingPrice" step="any" min="0" placeholder="Selling Price" required>
                </div> 

                <br>
                <div class="col-xs-6"> 
                  <div class="form-group">   
                    <label>     
                      <input type="checkbox" class="minimal percentage" checked>
                      Use Percentage
                    </label>
                  </div>
                </div>

                <div class="col-xs-6" style="padding:0">
                  <div class="input-group"> 
                    <input type="number" class="form-control input-lg newPercentage" min="0" value="40" required>
                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Image -->
            <div class="form-group">
              <div class="panel">Upload image</div>
              <input id="newProdPhoto" type="file" class="newImage" name="newProdPhoto">
              <p class="help-block">Maximum size 2Mb</p>
              <img src="views/img/products/default/anonymous.png" class="img-thumbnail preview" alt="" width="100px">
            </div> 

          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save Product</button>
        </div>
      </form>
      <?php
      $createProduct = new ControllerProducts();
      $createProduct->ctrCreateProducts();
      ?> 
    </div>
  </div>
</div>

<!-- Edit Product Modal -->
<div id="modalEditProduct" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header" style="background:#DD4B39; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit product</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">

            <!-- Category -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                <select class="form-control input-lg" name="editCategory" readonly required>
                  <option id="editCategory"></option>
                </select>
              </div>
            </div>

            <!-- Code -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 
                <input type="text" class="form-control input-lg" id="editCode" name="editCode" readonly required>
              </div>
            </div>

            <!-- Description -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 
                <input type="text" class="form-control input-lg" id="editDescription" name="editDescription" required>
              </div>
            </div>

            <!-- Stock -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-check"></i></span> 
                <input type="number" class="form-control input-lg" id="editStock" name="editStock" min="0" required>
              </div>
            </div>

            <!-- Prices -->
            <div class="form-group row">
              <div class="col-xs-12 col-sm-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 
                  <input type="number" class="form-control input-lg" id="editBuyingPrice" name="editBuyingPrice" step="any" min="0" required>
                </div>
              </div>

              <div class="col-xs-12 col-sm-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 
                  <input type="number" class="form-control input-lg" id="editSellingPrice" name="editSellingPrice" step="any" min="0" readonly required>
                </div>
                <br>
                <div class="col-xs-6">
                  <div class="form-group">
                    <label>
                      <input type="checkbox" class="minimal percentage" checked>
                      Use Percentage
                    </label>
                  </div>
                </div>
                <div class="col-xs-6" style="padding:0">
                  <div class="input-group">
                    <input type="number" class="form-control input-lg newPercentage" min="0" value="40" required>
                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Image -->
            <div class="form-group">
              <div class="panel">Upload Image</div>
              <input type="file" class="newImage" name="editImage">
              <p class="help-block">2MB max</p>
              <img src="views/img/products/default/anonymous.png" class="img-thumbnail preview" width="100px">
              <input type="hidden" name="currentImage" id="currentImage">
            </div>

          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save Changes</button>
        </div>
      </form>
      <?php
      $editProduct = new ControllerProducts();
      $editProduct->ctrEditProduct();
      ?>      
    </div>
  </div>
</div>

<?php
$deleteProduct = new ControllerProducts();
$deleteProduct->ctrDeleteProduct();
?>
