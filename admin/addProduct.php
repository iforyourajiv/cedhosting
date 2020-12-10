<?php
include_once '../class/product.class.php';
$product = new Product();

if (isset($_POST['submit'])) {
 $cat_id      = $_POST['cat_id'];
 $subcategory = $_POST['subcategory'];
 $link        = $_POST['link'];
 $check       = $product->addSubCategory($cat_id, $subcategory, $link);
 if ($check) {
  echo "<script>alert('Subcategory Added SuccessFully')</script>";
 } else {
  echo "<script>alert('Something Went Wrong !!! Subcategory Not Added SuccessFully')</script>";
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
                <select name="cat_id" class="form-control text-dark">
                  <?php
$data = $product->fetchSubcategory();
foreach ($data as $element) {
 $pro_id = $element['id'];
 // $pro_parent_id=$element['prod_parent_id'];
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
                  <input class="form-control text-dark" type="text" name="productName"
                    pattern='^([A-Za-z]+ )+[A-Za-z]+$|^[A-Za-z]+$' placeholder="Product Name" required>
                </div>
              </div>
              <div class="form-group">
                <label class="text-light font-weight-bold">Page URL</label>
                <div class="input-group  input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-active-40 text-primary"></i></span>
                  </div>
                  <input class="form-control text-dark" type="text" name="url" placeholder="Enter Link">
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
                  <input class="form-control text-dark" type="text" name="monthlyPrice" placeholder="Monthly Price"
                    required>

                </div>
                <p class="text-white my-auto">This Would Be Monthly Plan</p>
              </div>
              <div class="form-group">
                <label class="text-light font-weight-bold">Enter Annual Price <span class="text-danger">*</span>
                </label>
                <div class="input-group input-group-alternative mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-money-coins text-primary"></i></span>
                  </div>
                  <input class="form-control text-dark" type="text" name="annualprice" placeholder="Annual Price"
                    required>

                </div>
                <p class="text-white my-auto">This Would Be Annual Plan</p>
              </div>
              <div class="form-group">
                <label class="text-light font-weight-bold">SKU <span class="text-danger">*</span> </label>
                <div class="input-group input-group-alternative mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-cloud-upload-96 text-primary"></i></span>
                  </div>
                  <input class="form-control text-dark" type="text" name="sku" placeholder="SKU" required>

                </div>
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
                    <input class="form-control text-dark" type="text" name="webspace" placeholder="Web Space(in GB)"
                      required>

                  </div>
                  <p class="text-white my-auto">Enter 0.5 for 512 MB</p>
                </div>
                <div class="form-group">
                  <label class="text-light font-weight-bold">Bandwidth (in GB) <span class="text-danger">*</span>
                  </label>
                  <div class="input-group input-group-alternative mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-spaceship text-primary"></i></span>
                    </div>
                    <input class="form-control text-dark" type="text" name="bandwith" placeholder="Bandwidth (in GB)"
                      required>

                  </div>
                  <p class="text-white my-auto">Enter 0.5 for 512 MB</p>
                </div>
                <div class="form-group">
                  <label class="text-light font-weight-bold">Free Domain <span class="text-danger">*</span> </label>
                  <div class="input-group input-group-alternative mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-world-2 text-primary"></i></span>
                    </div>
                    <input class="form-control text-dark" type="text" name="freedomain" placeholder="Free Domain"
                      required>

                  </div>
                  <p class="text-white my-auto">Enter 0 if no domain available in this service</p>
                </div>

                <div class="form-group">
                  <label class="text-light font-weight-bold">Language / Technology Support <span
                      class="text-danger">*</span> </label>
                  <div class="input-group input-group-alternative mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-caps-small text-primary"></i></span>
                    </div>
                    <input class="form-control text-dark" type="text" name="language"
                      placeholder="Language / Technology Support " required>

                  </div>
                  <p class="text-white my-auto">Separate by (,) Ex: PHP, MySQL, MongoDB</p>
                </div>
                <div class="form-group">
                  <label class="text-light font-weight-bold">Mailbox <span class="text-danger">*</span> </label>
                  <div class="input-group input-group-alternative mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83 text-primary"></i></span>
                    </div>
                    <input class="form-control text-dark" type="text" name="mailbox" placeholder="Mailbox" required>

                  </div>
                  <p class="text-white my-auto">Enter Number of mailbox will be provided, enter 0 if none</p>
                </div>


                <input type="submit" name="submit" class="btn btn-success" value="Create Now">
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

</body>

</html>