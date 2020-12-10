<?php
include_once '../class/product.class.php';
$product = new Product();
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
      <div class="container-fluid mt-3">
    <h2 class="text-primary ml-3">Add Category/Sub-Category</h2>
    <form class="col-md-4">
    <div class="form-group">
  <label class="text-warning">Select Category :</label>
  <select name="cat_id" class="form-control-md">
  <?php
$data = $product->fetchcategory();
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
<label class="text-dark font-weight-bold">Sub Category Name</label>
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-cloud-upload-96"></i></span>
                    </div>
                    <input class="form-control text-dark display-3" type="text" name="cat_name" pattern='^([A-Za-z]+ )+[A-Za-z]+$|^[A-Za-z]+$' placeholder="Enter Category Name" required>
                  </div>
                </div>
                <div>
                  <button type="button" class="btn btn-primary">Add Sub Category</button>
                </div>
                </form>

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
