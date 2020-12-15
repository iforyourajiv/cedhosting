<?php
include_once '../class/product.class.php';
$product = new Product();
$html    = "";
if (isset($_POST['submit'])) {
  $subcat_id    = $_POST['subcat_id'];
  $productName  = trim(preg_replace('/\s+/', ' ',   $_POST['productName']));
  $monthlyPrice = $_POST['monthlyPrice'];
  $annualprice  = $_POST['annualprice'];
  $sku          = $_POST['sku'];

  // these variable Will encode in json
  // *********************************
  $webspace   = $_POST['webspace'];
  $bandwidth   = $_POST['bandwith'];
  $freedomain = $_POST['freedomain'];
  $language   = $_POST['language'];
  $mailbox    = $_POST['mailbox'];
  // *********************************

  $features = array(
    "webspace"   => $webspace, "bandwidth"  => $bandwidth,
    "freedomain" => $freedomain, "language" => $language, "mailbox" => $mailbox,
  );
  $encoded_features = json_encode($features);

  $check = $product->insertProduct($subcat_id, $productName, $monthlyPrice, $annualprice, $sku, $encoded_features);

  if ($check == 1) {
    $html = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Product Added SuccessFully</strong>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span>&times;</span>
  </button>
</div>";
  } elseif ($check == 2) {
    $html = "<div class='alert alert-Warning alert-dismissible fade show' role='alert'>
    <strong>Product Not Added!</strong> Product is Already Exist . Please Try Again.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span>&times;</span>
    </button>
  </div>";
  } else {
    $html = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Error Occured ,Product Not Added</strong>  Please Try Again.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span>&times;</span>
  </button>
</div>";
  }
}

?>

<body>
  <!-- Sidenav -->
  <?php include './header.php' ?>
  <!-- Header -->
  <!-- Header -->
  <div class="header bg-primary">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                <li class="breadcrumb-item active" aria-current="page">Default</li>
              </ol>
            </nav>
          </div>
        </div>
        <!-- Card stats -->
      </div>
    </div>
  </div>
  <div class="container-fluid mt--3">
    <?php echo $html ?>
    <div class="row">
      <div class="col-sm-12">
        <div class="card bg-default mx-auto col-lg-12">
          <div class="card-body">
            <h1 class="text-light ml-3">Create New Product</h1>
            <h3 class="text-light ml-3">Enter Product Details</h3>
            <hr class="bg-white">
            <form action="addProduct.php" method="POST" class="col-md-6">
              <div class="form-group">
                <label class="text-light">Select Sub Category :<span class="text-danger">*</span></label>
                <select name="subcat_id" class="form-control text-dark">
                  <?php
                  $data = $product->fetchSubcategoryForProduct();
                  foreach ($data as $element) {
                    $pro_id = $element['id'];
                    $pro_name = $element['prod_name'];
                  ?>

                    <option value="<?php echo $pro_id ?>"><?php echo $pro_name ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <label class="text-light font-weight-bold">Enter Product Name <span class="text-danger">*</span></label>
                <div class="input-group  input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-app text-primary"></i></span>
                  </div>
                  <input class="form-control text-dark" type="text" id="productName" pattern='^[a-zA-Z0-9]*[-\s]?[a-zA-Z]+[-\s]?[0-9]*([-\s]?([a-zA-Z0-9]*[-\s]?[a-zA-Z]+[-\s]?[0-9]*)+)*$' onblur="checkempty(this.id)" name="productName" placeholder="Product Name" required>

                </div>
                <small class="text-danger" id="productName1"></small>
              </div>
              <div class="form-group">
                <label class="text-light font-weight-bold">Page URL</label>
                <div class="input-group  input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-active-40 text-primary"></i></span>
                  </div>
                  <input class="form-control text-dark" type="text" id="url" name="url" placeholder="Enter Link">
                </div>
              </div>
              <hr class="bg-white">
              <h2 class="text-light pt-4">Product Description</h2>
              <h5 class="text-light">Enter Product Details</h5>
              <hr class="bg-white">
              <div class="form-group">
                <label class="text-light font-weight-bold">Enter Monthly Price <span class="text-danger">*</span>
                </label>
                <div class="input-group input-group-alternative mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-money-coins text-primary"></i></span>
                  </div>
                  <input class="form-control text-dark" type="text" id="monthlyPrice" pattern='([0-9]+(\.[0-9]+)?)' onblur="checkempty(this.id)" name="monthlyPrice" placeholder="Monthly Price" required>

                </div>
                <small class="text-danger" id="monthlyPrice1"></small>
                <p class="text-white my-auto">This Would Be Monthly Plan</p>
              </div>
              <div class="form-group">
                <label class="text-light font-weight-bold">Enter Annual Price <span class="text-danger">*</span>
                </label>
                <div class="input-group input-group-alternative mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-money-coins text-primary"></i></span>
                  </div>
                  <input class="form-control text-dark" type="text" id="annualprice" pattern='([0-9]+(\.[0-9]+)?)' onblur="checkempty(this.id)" name="annualprice" placeholder="Annual Price" required>

                </div>
                <small class="text-danger" id="annualprice1"></small>
                <p class="text-white my-auto">This Would Be Annual Plan</p>
              </div>
              <div class="form-group">
                <label class="text-light font-weight-bold">SKU <span class="text-danger">*</span> </label>
                <div class="input-group input-group-alternative mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-cloud-upload-96 text-primary"></i></span>
                  </div>
                  <input class="form-control text-dark" type="text" id="sku" pattern="^[a-zA-Z0-9#](?:[a-zA-Z0-9_-]*[a-zA-Z0-9])?$" onblur="checkempty(this.id)" name="sku" placeholder="SKU" required>

                </div>
                <small class="text-danger" id="sku1"></small>
              </div>
              <hr class="bg-white">
              <h2 class="text-light pt-4">Features</h2>
              <hr class="bg-white">
              <div>
                <div class="form-group">
                  <label class="text-light font-weight-bold">Web Space(in GB) <span class="text-danger">*</span>
                  </label>
                  <div class="input-group input-group-alternative mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-bag-17 text-primary"></i></span>
                    </div>
                    <input class="form-control text-dark" type="text" pattern='([0-9]+(\.[0-9]+)?)' id="webspace" maxlength="5" onblur="checkempty(this.id)" name="webspace" placeholder="Web Space(in GB)" required>

                  </div>
                  <small class="text-danger" id="webspace1"></small>
                  <p class="text-white my-auto">Enter 0.5 for 512 MB</p>
                </div>
                <div class="form-group">
                  <label class="text-light font-weight-bold">Bandwidth (in GB) <span class="text-danger">*</span>
                  </label>
                  <div class="input-group input-group-alternative mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-spaceship text-primary"></i></span>
                    </div>
                    <input class="form-control text-dark" type="text" pattern='((\d+)((\.\d{1,2})?))$' maxlength="15" id="bandwidth" onblur="checkempty(this.id)" name="bandwith" placeholder="Bandwidth (in GB)" required>

                  </div>
                  <small class="text-danger" id="bandwidth1"></small>
                  <p class="text-white my-auto">Enter 0.5 for 512 MB</p>
                </div>
                <div class="form-group">
                  <label class="text-light font-weight-bold">Free Domain <span class="text-danger">*</span> </label>
                  <div class="input-group input-group-alternative mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-world-2 text-primary"></i></span>
                    </div>
                    <input class="form-control text-dark" type="text" id="freedomain" pattern="((^[0-9]*$)|(^[A-Za-z]+$))" onblur="checkempty(this.id)" name="freedomain" placeholder="Free Domain" required>

                  </div>
                  <small class="text-danger" id="freedomain1"></small>
                  <p class="text-white my-auto">Enter 0 if no domain available in this service</p>
                </div>

                <div class="form-group">
                  <label class="text-light font-weight-bold">Language / Technology Support <span class="text-danger">*</span> </label>
                  <div class="input-group input-group-alternative mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-caps-small text-primary"></i></span>
                    </div>
                    <input class="form-control text-dark" type="text" pattern="^[a-zA-Z0-9]*[a-zA-Z]+[0-9]*(,?([a-zA-Z0-9]*[a-zA-Z]+[0-9]*)+)*$" id="language" onblur="checkempty(this.id)" name="language" placeholder="Language / Technology Support " required>

                  </div>
                  <small class="text-danger" id="language1"></small>
                  <p class="text-white my-auto">Separate by (,) Ex: PHP, MySQL, MongoDB</p>
                </div>
                <div class="form-group">
                  <label class="text-light font-weight-bold">Mailbox <span class="text-danger">*</span> </label>
                  <div class="input-group input-group-alternative mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83 text-primary"></i></span>
                    </div>
                    <input class="form-control text-dark" type="text" pattern="((^[0-9]*$)|(^[A-Za-z]+$))" id="mailbox" onblur="checkempty(this.id)" name="mailbox" placeholder="Mailbox" required>

                  </div>
                  <small class="text-danger" id="mailbox1"></small>
                  <p class="text-white my-auto">Enter Number of mailbox will be provided, enter 0 if none</p>
                </div>
                <input type="submit" name="submit" id="submit" class="btn btn-success" onClick="javascript: return confirm('Please confirm You Want To Add A Product');" value="Create Now" disabled>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <?php include_once './footer.php' ?>
  </div>
  </div>
  </div>
  <!-- Page content -->

  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="../js/validation.js"></script>



</body>

</html>