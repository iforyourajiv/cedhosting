<?php
include_once '../class/product.class.php';
$product = new Product();
$html = "";
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $data = $product->fetchSubcategoryforEdit($id);
    foreach ($data as $element) {
        $categoryID = $element['prod_parent_id'];
        $category = $product->fetchCategoryNameForSubCategory($categoryID);
        $subId = $element['id'];
        $name = $element['prod_name'];
        $link = $element['html'];
        $avilability = $element['prod_available'];
    }
}


if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $cat_id = $_POST['cat_id'];
    $subcategory = trim(preg_replace('/\s+/', ' ',  $_POST['subcategory']));
    $link = $_POST['link'];
    $avilability = $_POST['availablity'];
    $check = $product->updateSubCategory($id, $cat_id, $subcategory, $link, $avilability);
    if ($check == 2) {
        echo "<script>window.location.href='createcategory.php?status=2'</script>";
    }
    if ($check == 1) {
        echo "<script>window.location.href='createcategory.php?status=1'</script>";
    } else {
        echo "<script>window.location.href='createcategory.php?status=0'</script>";
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
                        <h2 class="text-light ml-3">Edit Sub-Category</h2>
                        <form action="editSubCategory.php" method="POST" class="col-md-6">
                            <div class="form-group">
                                <label class="text-light">Select Category :</label>
                                <select name="cat_id" class="form-control text-dark">
                                    <option value="<?php echo $categoryID ?>"><?php echo $category ?></option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="text-light font-weight-bold">Sub Category Name<span class="text-danger">*</span></label>
                                <div class="input-group  input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-cloud-upload-96"></i></span>
                                    </div>
                                    <input class="form-control text-dark" type="hidden" value="<?php echo $subId ?>" name="id">
                                    <input class="form-control text-dark" type="text" pattern="^([A-z]+\-\d+(\.\d+)*)$|^([A-z])+$" value="<?php echo $name ?>" name="subcategory" pattern='^([A-Za-z]+ )+[A-Za-z]+$|^[A-Za-z]+$' placeholder="Enter Category Name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-light">Availability</label>
                                <select name="availablity" class="form-control text-dark">
                                    <?php
                                    $statusId      = "";
                                    $statusOption  = "";
                                    $statusId2     = "";
                                    $statusOption2 = "";
                                    if ($avilability == "1") {
                                        $statusId      = "1";
                                        $statusOption  = "Available";
                                        $statusId2     = "0";
                                        $statusOption2 = "Not Available";
                                    } else {
                                        $statusId      = "0";
                                        $statusOption  = "Not Available";
                                        $statusId2     = "1";
                                        $statusOption2 = "Available";
                                    }
                                    ?>
                                    <option value="<?php echo $statusId ?>"> <?php echo $statusOption ?> </option>
                                    <option value="<?php echo $statusId2 ?>"><?php echo $statusOption2 ?></option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label class="text-light font-weight-bold">Link</label>
                                <div class="input-group  input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-cloud-upload-96"></i></span>
                                    </div>
                                    <input class="form-control text-dark" value="<?php echo $link ?>" type="text" name="link" placeholder="Enter Link">
                                </div>
                            </div>

                            <div>
                                <input type="submit" name="update" class="btn btn-primary" value="Update Sub Category">
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