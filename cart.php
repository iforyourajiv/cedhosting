<?php

include_once './class/product.class.php';
$product = new Product();
if (!isset($_SESSION)) {
    session_start();
}

// if (isset($_SESSION['email'])) {
//     if ($_SESSION['usertype'] == 'admin') {
//         header("location:admin/index.php");
//     } else {
//         header("location:index.php");
//     }
// }
// // if (!isset($_SESSION['email'])) {
// //     header('Location:login.php');
// // }

if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
if (isset($_GET['id'])) {
    $found = false;
    $id = base64_decode($_GET["id"]);
    $data = $product->fetchProductForEdit($id);
    if ($data) {
        foreach ($data as $element) {
            $productId = $element['id'];
            $category = $element['prod_parent_id'];
            $productName = $element['prod_name'];
            $monthlyPrice = $element['mon_price'];
            $annualPrice = $element['annual_price'];
            $sku = $element['sku'];
            $description = json_decode($element['description']);
            $webspace = $description->webspace;
            $bandwidth = $description->bandwidth;
            $freeDomain = $description->freedomain;
            $language = $description->language;
            $mailbox = $description->mailbox;

            foreach ($_SESSION['cart'] as $element => $data) {
                if ($data['productId'] == $id) {
                    $found = true;
                    echo "<script>alert('Product Already in Cart')</script>";
                }
            }
            if (!$found) {
                $item = array(
                    'productId' => $productId, 'parent_id' => $category, 'productName' => $productName,
                    'monthlyPrice' => $monthlyPrice, 'annualPrice' => $annualPrice, 'sku' => $sku,
                    'webspace' => $webspace, 'bandwidth' => $bandwidth, 'freeDomain' => $freeDomain,
                    'language' => $language, 'mailbox' => $mailbox
                );
                array_push($_SESSION['cart'], $item);
            }
        }
    }
}

if (isset($_GET["del"])) {
    $productId = $_GET["del"];
    foreach ($_SESSION['cart'] as $element => $data) {
        if ($data['productId'] ==  $productId) {
            unset($_SESSION['cart'][$element]);
           echo "<script>alert('Product Removed Successfully From Cart ')</script>";
        }

    }
}

?>

<body>
    <!--script-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/swipebox.css">
    <script src="js/jquery.swipebox.min.js"></script>
    <script type="text/javascript">
        jQuery(function($) {
            $(".swipebox").swipebox();
        });
    </script>
    <!--script-->
    <!---header--->
    <?php include './header.php' ?>
    <!---singleblog--->
    <div class="content">
        <h1 class="text-center text-primary"> Cart <i class="fa fa-shopping-cart"></i> </h1>
        <div class="table-responsive text-warning">
            <table id="subcategoryTable" class="table align-items-center table-dark table-flush">
                <thead class="thead-white">
                    <tr>
                        <th scope="col" class="sort text-center text-danger">Category</th>
                        <th scope="col" class="sort text-center text-danger">Product Name</th>
                        <th scope="col" class="sort text-center text-danger">Monthly Price</th>
                        <th scope="col" class="sort text-center text-danger">Annual Price</th>
                        <th scope="col" class="sort text-center text-danger">SKU</th>
                        <th scope="col" class="sort text-center text-danger">Web Space</th>
                        <th scope="col" class="sort text-center text-danger">Bandwidth</th>
                        <th scope="col" class="sort text-center text-danger">Free Domain</th>
                        <th scope="col" class="sort text-center text-danger">Language/ Technology</th>
                        <th scope="col" class="sort text-center text-danger">MailBox</th>
                        <th scope="col" class="sort text-center text-danger">Action</th>

                    </tr>
                </thead>
                <tbody class="list text-dark">
                    <?php
                  if(isset($_SESSION['cart']) && empty($_SESSION['cart'])) {
                   echo "<h2 class='text-center text-warning'>Cart is Empty ,Please Add Product</h2>";
                 }
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $element) {
                            $productId = $element['productId'];
                            $category =  $element['parent_id'];
                            $categoryName = $product->fetchSubcategoryName($category);
                            $productName = $element['productName'];
                            $monthlyPrice = $element['monthlyPrice'];
                            $annualPrice = $element['annualPrice'];
                            $sku = $element['sku'];
                            $webspace = $element['webspace'];
                            $bandwidth = $element['bandwidth'];
                            $freeDomain = $element['freeDomain'];
                            $language = $element['language'];
                            $mailbox = $element['mailbox'];
                    ?>
                            <tr>
                                <td class="text-center text-success"><?php echo $categoryName ?></td>
                                <td class="text-center text-success"><?php echo $productName; ?></td>
                                <td class="text-center text-success">&#x20B9;<?php echo $monthlyPrice; ?></td>
                                <td class="text-center text-success">&#x20B9;<?php echo $annualPrice; ?></td>
                                <td class="text-center text-success"><?php echo $sku; ?></td>
                                <td class="text-center text-success"><?php echo $webspace; ?>GB</td>
                                <td class="text-center text-success"><?php echo $bandwidth; ?>GB</td>
                                <td class="text-center text-success"><?php echo $freeDomain; ?></td>
                                <td class="text-center text-success"><?php echo $language; ?></td>
                                <td class="text-center text-success"><?php echo $mailbox; ?></td>
                                <td><a onClick="javascript: return confirm('Are You Sure Want To Remove item From Cart');" href="cart.php?del=<?php echo $productId ?>" class="btn btn-Danger"><i class="fa fa-trash"></i></a></td>

                            </tr>
                    <?php    }
                    }


                    ?>

                </tbody>
            </table>
        </div>


    </div>
    <!---footer--->
    <?php include './footer.php' ?>
    <!---footer--->
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

</body>

</html>