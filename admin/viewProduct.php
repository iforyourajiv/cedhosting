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
  <div class="container mt--3">
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
                  <th scope="col" class="sort text-center">Sub Category ID</th>
                </tr>
              </thead>
              <tbody class="list text-dark">
      
                    <td class="text-center">frkehf;</td>
                    <td class="text-center">dklejdrf;lef</td>
                  </tr>
      
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