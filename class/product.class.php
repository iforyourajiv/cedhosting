<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once 'dbcon.php';
class Product
{
    public $conn;

    public function __construct()
    {
        $db         = new Dbconn();
        $this->conn = $db->connection();
    }

    public function fetchcategory()
    {
        $query = mysqli_query($this->conn, "SELECT *from tbl_product WHERE prod_parent_id='0' AND prod_available='1'");
        $result = $query->num_rows;
        if ($result > 0) {
            return $query;
        } else {
            return false;
        }
    }

    public function addSubCategory($cat_id, $subcategory, $link)
    {
        $check = mysqli_query($this->conn, "SELECT prod_name FROM tbl_product WHERE prod_name='$subcategory'");
        $result = $check->num_rows;
        if ($result > 0) {
            return 2; //For Existing Project
        } else {
            $query = mysqli_query($this->conn, "INSERT INTO tbl_product (prod_parent_id,prod_name,html,prod_available,prod_launch_date)
            VALUES ('$cat_id','$subcategory',NULL,'1',now())");
            if ($query) {
                return 1; // For SuccessFull Insertion
            } else {
                return 0; // Some Error Occured
            }
        }
    }

    public function fetchSubcategory()
    {
        $query = mysqli_query($this->conn, "SELECT *from tbl_product WHERE prod_parent_id='1'");
        $result = $query->num_rows;
        if ($result > 0) {
            return $query;
        } else {
            return false;
        }
    }
    public function fetchSubcategoryForProduct()
    {
        $query = mysqli_query($this->conn, "SELECT *from tbl_product WHERE prod_parent_id='1' AND prod_available='1'");
        $result = $query->num_rows;
        if ($result > 0) {
            return $query;
        } else {
            return false;
        }
    }

    public function fetchSubcategoryforEdit($id)
    {
        $query = mysqli_query($this->conn, "SELECT * FROM tbl_product WHERE id='$id'");
        $result = $query->num_rows;
        if ($result > 0) {
            return $query;
        } else {
            return  false;
        }
    }

    public function updateSubCategory($id, $cat_id, $subcategory, $link, $avilability)
    {
        $sql = mysqli_query($this->conn, "SELECT * FROM tbl_product where prod_name='$subcategory' and id!='$id'");
        $result = $sql->num_rows;
        if ($result > 0) {
            return 2; //For Existing Project
        } else {
            $query = mysqli_query($this->conn, "UPDATE tbl_product SET prod_parent_id='$cat_id',prod_name='$subcategory',
            html='$link',prod_available='$avilability' WHERE id='$id'");
            if ($query) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    public function deleteSubCategory($id)
    {
        $query = mysqli_query($this->conn, "DELETE FROM tbl_product WHERE id='$id'");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function fetchCategoryNameForSubCategory($categoryID)
    {
        $query = mysqli_query($this->conn, "SELECT prod_name FROM tbl_product WHERE id='$categoryID'");
        $data = mysqli_fetch_assoc($query);
        $categoryName = $data['prod_name'];
        return $categoryName;
    }

    public function fetchNavBar()
    {
        $query = mysqli_query($this->conn, "SELECT * FROM tbl_product WHERE prod_parent_id='1' AND prod_available='1'");
        $result = $query->num_rows;
        if ($result > 0) {
            return $query;
        } else {
            return false;
        }
    }

    public function insertProduct($subcat_id, $productName, $monthlyPrice, $annualprice, $sku, $encoded_features)
    {
        $check = mysqli_query($this->conn, "SELECT prod_name FROM tbl_product WHERE prod_name='$productName'");
        $result = $check->num_rows;

        if ($result > 0) {
            return 2; //For Existing Project
        } else {
            $queryforProduct = mysqli_query($this->conn, "INSERT INTO tbl_product(prod_parent_id,prod_name,html,
            prod_available,prod_launch_date) 
            VALUES ('$subcat_id','$productName',NULL,'1',now())");
            $productId = $this->conn->insert_id;
            if ($queryforProduct) {
                $queryforProductDescription = mysqli_query($this->conn, "INSERT INTO tbl_product_description(prod_id,description,mon_price,annual_price,sku)
VALUES('$productId','$encoded_features','$monthlyPrice','$annualprice','$sku')");
                if ($queryforProductDescription) {
                    return 1; // For SuccessFull Insertion
                } else {
                    return 0; // Some Error Occured
                }
            } else {
                return 404; //Failed
            }
        }
    }

        public function fetchSubcategoryName($category){
            $query = mysqli_query($this->conn, "SELECT prod_name FROM tbl_product WHERE id='$category'");
            $data = mysqli_fetch_assoc($query);
            $categoryName = $data['prod_name'];
            return $categoryName;
        }


    public function fetchProduct()
    {
        $query = mysqli_query($this->conn, "SELECT tbl_product_description.prod_id,description,mon_price,annual_price,sku,
                            tbl_product.id,prod_parent_id,prod_name,html,prod_available,prod_launch_date 
                            FROM tbl_product_description
                            INNER JOIN tbl_product ON tbl_product_description.prod_id =tbl_product.id");

        if ($query) {
            return $query;
        } else {
            return false;
        }
    }

    public function deleteProduct($id)
    {
        $query = mysqli_query($this->conn, "DELETE tbl_product, tbl_product_description
                                        FROM tbl_product
                                        INNER JOIN tbl_product_description
                                        ON tbl_product.id=tbl_product_description.prod_id
                                        WHERE tbl_product.id='$id'");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function fetchProductForEdit($id){
        $query = mysqli_query($this->conn, "SELECT tbl_product_description.prod_id,description,mon_price,annual_price,sku,
        tbl_product.id,prod_parent_id,prod_name,html,prod_available,prod_launch_date 
        FROM tbl_product_description
        INNER JOIN tbl_product ON tbl_product_description.prod_id =tbl_product.id WHERE tbl_product.id='$id'");

        if ($query) {
        return $query;
        } else {
        return false;
        }
        }

public function updateProduct($id, $subcat_id, $productName,$link, $monthlyPrice, $annualprice, $sku, $encoded_features, $availablity){
    $query=mysqli_query($this->conn,"UPDATE tbl_product_description INNER JOIN tbl_product ON tbl_product_description.prod_id = tbl_product.id 
    SET
    tbl_product.prod_name = '$productName', tbl_product.prod_parent_id ='$subcat_id', tbl_product.html = '$link', tbl_product.prod_available = '$availablity',
    tbl_product_description.description = '$encoded_features', tbl_product_description.mon_price ='$monthlyPrice', tbl_product_description.annual_price = '$annualprice', tbl_product_description.sku = '$sku'
    WHERE tbl_product.id='$id'");
      if ($query) {
        return 1; // For SuccessFull Insertion
    } else {
        return 0; // Some Error Occured
    }
}

}
