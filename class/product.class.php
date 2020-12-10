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

    public function fetchcategory(){
        $query=mysqli_query($this->conn,"SELECT *from tbl_product WHERE prod_parent_id='0' AND prod_available='1'");
        $result=$query->num_rows;
        if($result>0){
            return $query;
        } else {
            return false;
        }
    }

    public function addSubCategory($cat_id,$subcategory,$link){
        $query=mysqli_query($this->conn,"INSERT INTO tbl_product (prod_parent_id,prod_name,link,prod_available,prod_launch_date)
                            VALUES ('$cat_id','$subcategory',NULL,'1',now())");
        if($query){
            return true;
        } else {
            return false;
        }
    }

    public function fetchSubcategory(){
        $query=mysqli_query($this->conn,"SELECT *from tbl_product WHERE prod_parent_id!='0' AND prod_available='1'");
        $result=$query->num_rows;
        if($result>0){
            return $query;
        } else {
            return false;
        }
    }

    public function fetchCategoryNameForSubCategory($categoryID){
        $query=mysqli_query($this->conn,"SELECT prod_name FROM tbl_product WHERE id='$categoryID'");
        $data=mysqli_fetch_assoc($query);
        $categoryName=$data['prod_name'];
        return $categoryName;
    }

    public function fetchNavBar(){
        $query=mysqli_query($this->conn,"SELECT * FROM tbl_product WHERE prod_parent_id='1'");
        $result=$query->num_rows;
        if($result>0){
            return $query;
        } else {
            return false;
        }
    }

 
}
?>