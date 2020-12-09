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
        $query=mysqli_query($this->conn,"SELECT *from tbl_product WHERE prod_parent_id='1'");
        $result=$query->num_rows;
        if($result>0){
            return $query;
        } else {
            return false;
        }
    }

}
?>