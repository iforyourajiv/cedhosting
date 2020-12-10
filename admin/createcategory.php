<?php
include_once '../class/product.class.php';
$product = new Product();

if (isset($_POST['submit'])) {
$cat_id=$_POST['cat_id'];
$subcategory=$_POST['subcategory'];
$link=$_POST['link'];
$check=$product->addSubCategory($cat_id,$subcategory,$link);
if($check){
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
        <div class="card bg-default mx-auto col-lg-8">
          <div class="card-body">
            <h2 class="text-light ml-3">Add Sub-Category</h2>
            <form action="createcategory.php" method="POST" class="col-md-6">
              <div class="form-group">
                <label class="text-light">Select Category :</label>
                <select name="cat_id" class="form-control text-dark">
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
                <label class="text-light font-weight-bold">Sub Category Name</label>
                <div class="input-group  input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-cloud-upload-96"></i></span>
                  </div>
                  <input class="form-control text-dark" type="text" name="subcategory"
                    pattern='^([A-Za-z]+ )+[A-Za-z]+$|^[A-Za-z]+$' placeholder="Enter Category Name" required>
                </div>
              </div>
              <div class="form-group">
                <label class="text-light font-weight-bold">Link</label>
                <div class="input-group  input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-cloud-upload-96"></i></span>
                  </div>
                  <input class="form-control text-dark" type="text" name="link"
                     placeholder="Enter Link">
                </div>
              </div>
              <div>
                <input type="submit" name="submit" class="btn btn-primary" value="Add Sub Category">
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col">
          <div class="card bg-default text-warning shadow">
            <div class="card-header bg-transparent border-0">
              <h2 class="text-white text-center mb-0">Sub Categories</h2>
            </div>
            <div class="table-responsive text-warning">
              <table id="subcategoryTable" class="table align-items-center table-dark table-flush">
                <thead class="thead-white">
                  <tr>
                    <th scope="col" class="sort text-center">Category</th>
                    <th scope="col" class="sort text-center">Sub Category ID</th>
                    <th scope="col" class="sort text-center">Name</th>
                    <th scope="col" class="sort text-center">Available/Unavailable</th>
                    <th scope="col" class="sort text-center">Lunch Date</th>
                    <th scope="col" class="sort text-center">Action</th>
                  </tr>
                </thead>
                <tbody class="list text-dark">
                  <?php 
                    $data=$product->fetchSubcategory();
                    foreach($data as $element){
                    $categoryID=$element['prod_parent_id'];
                    $category=$product->fetchCategoryNameForSubCategory($categoryID);
                    $SubId=$element['id'];
                    $name=$element['prod_name'];
                    $avilability=$element['prod_available'];
                    $launchDate=$element['prod_launch_date'];
                    if($avilability==1){
                      $avilability="Available";
                    } else {
                      $avilability="Not Available";
                    }
                    ?>
                  <tr>
                    <td class="text-center"><?php echo $category ?></td>
                    <td class="text-center"><?php echo $SubId ?></td>
                    <td class="text-center"><?php echo $name ?></td>
                    <td class="text-center"><?php echo $avilability ?></td>
                    <td class="text-center"><?php echo $launchDate ?></td>
                    <td class="text-center"><a href="#" class="btn btn-Warning">Edit</a><a href="#" class="btn btn-Danger">Delete</a></td>
                    
                  </tr>
                  <?php } ?>
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
  $(function(){
    $('#subcategoryTable').DataTable({
      "sPaginationType": "full_numbers"
  });
  })
  </script>

</body>

</html>