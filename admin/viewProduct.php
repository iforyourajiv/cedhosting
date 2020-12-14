<?php
include_once '../class/product.class.php';
$product = new Product();
$data = $product->fetchProduct();
$html="";
if(isset($_GET['del'])){
  $id=$_GET['del'];
  $check=$product->deleteProduct($id);
  if($check){
    echo "<script>window.location.href='viewProduct.php?status=1'</script>";
   
  } else {
    echo "<script>window.location.href='viewProduct.php?status=0'</script>";
  }
}

if(isset($_GET['status'])){
  $status=$_GET['status'];
  if($status==1){
    $html = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Product Deleted Successfully!</strong>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span>&times;</span>
    </button>
  </div>";
  } else {
    $html = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Production Deletion Failed</strong> Something Wrong on Server . Please Try Again.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span>&times;</span>
    </button>
  </div>";
  }
}

if (isset($_GET['statusforedit'])) {
  $status = $_GET['statusforedit'];
  if ($status == 1) {
    $html = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Product Updated SuccessFully</strong>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span>&times;</span>
  </button>
</div>";
  } else if ($status == 2) {
    $html = "<div class='alert alert-Warning alert-dismissible fade show' role='alert'>
    <strong>Product Not Updated!</strong> Product is Already Exist . Please Try Again.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span>&times;</span>
    </button>
  </div>";
  } else {
    $html = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Error Occured ,Product Not Updated</strong>  Please Try Again.
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
  <div class="container mt--3">
    <?php echo $html ?>
    <div class="row">
      <div class="col">
        <div class="card bg-default text-warning shadow">
          <div class="card-header bg-transparent border-0">
            <h2 class="text-white text-center mb-0">ALL PRODUCTS</h2>
          </div>
          <div class="table-responsive text-warning">
            <table id="subcategoryTable" class="table align-items-center table-dark table-flush">
              <thead class="thead-white">
                <tr>
                  <th scope="col" class="sort text-center">Category</th>
                  <th scope="col" class="sort text-center">Product Name</th>
                  <th scope="col" class="sort text-center">Page URL</th>
                  <th scope="col" class="sort text-center">Monthly Price</th>
                  <th scope="col" class="sort text-center">Annual Price</th>
                  <th scope="col" class="sort text-center">SKU</th>
                  <th scope="col" class="sort text-center">Web Space</th>
                  <th scope="col" class="sort text-center">Bandwidth</th>
                  <th scope="col" class="sort text-center">Free Domain</th>
                  <th scope="col" class="sort text-center">Language/ Technology</th>
                  <th scope="col" class="sort text-center">MailBox</th>
                  <th scope="col" class="sort text-center">Launch Date</th>
                  <th scope="col" class="sort text-center">Available/Unavailable</th>
                  <th scope="col" class="sort text-center">Action</th>

                </tr>
              </thead>
              <tbody class="list text-dark">
                <?php
                if ($data) {
                  foreach ($data as $element) {
                    $productId = $element['id'];
                    $category = $element['prod_parent_id'];
                    $categoryName=$product->fetchSubcategoryName($category);
                    $productName = $element['prod_name'];
                    $link = $element['html'];
                    $monthlyPrice = $element['mon_price'];
                    $annualPrice = $element['annual_price'];
                    $sku = $element['sku'];
                    $description = json_decode($element['description']);
                    $webspace = $description->webspace;
                    $bandwidth = $description->bandwidth;
                    $freeDomain = $description->freedomain;
                    $language = $description->language;
                    $mailbox = $description->mailbox;
                    $launchDate = $element['prod_launch_date'];
                    $availablity = $element['prod_available'];
                    if ($availablity == 1) {
                      $availablity = "Available";
                    } else {
                      $availablity = "Not Available";
                    }
                ?>
                    <tr>
                      <td class="text-center"><?php echo  $categoryName ?></td>
                      <td class="text-center"><?php echo $productName ?></td>
                      <td class="text-center"><?php echo $link ?></td>
                      <td class="text-center">&#x20B9;<?php echo $monthlyPrice ?></td>
                      <td class="text-center">&#x20B9;<?php echo $annualPrice ?></td>
                      <td class="text-center"><?php echo $sku ?></td>
                      <td class="text-center"><?php echo $webspace ?> GB</td>
                      <td class="text-center"><?php echo $bandwidth ?>GB</td>
                      <td class="text-center"><?php echo $freeDomain ?></td>
                      <td class="text-center"><?php echo $language ?></td>
                      <td class="text-center"><?php echo $mailbox ?></td>
                      <td class="text-center"><?php echo $launchDate ?></td>
                      <td class="text-center"><?php echo  $availablity ?></td>
                      <td class="text-center"><a href="editProduct.php?edit=<?php echo $productId ?>" class="btn btn-Warning">Edit</a>
                      <a onClick="javascript: return confirm('Please confirm deletion');" href="viewProduct.php?del=<?php echo $productId ?>" class="btn btn-Danger">Delete</a></td></td>
                    </tr>

                <?php  }
                } ?>
              </tbody>
            </table>
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
  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

  <script>
    $(function() {
      $('#subcategoryTable').DataTable({
        "sPaginationType": "full_numbers"
      });
    })
  </script>
</body>

</html>