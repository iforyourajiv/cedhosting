<?php
if(!isset($_SESSION)){
    session_start();
}

include_once 'dbcon.php';
class User
{
 public $conn;
 public function __construct()
 {
  $db         = new Dbconn();
  $this->conn = $db->connection();
 }

 public function signup($email, $name, $mobile, $question, $answer, $password)
 {
  $validate = mysqli_query($this->conn, "SELECT email,mobile FROM tbl_user where email='$email' OR mobile='$mobile'");
  $result   = $validate->num_rows;
  if ($result > 0) {
   echo "<script>alert('Email Or Mobile Number is Already Exist')</script>";
   echo "<script>window.location.href='account.php';</script>";
  } else {
   $enc_password = md5($password);
   $query        = mysqli_query($this->conn, "INSERT INTO tbl_user (email,name,mobile,active,is_admin,
                   password,security_question,security_answer)
                   VALUES('$email','$name','$mobile','1','0','$enc_password','$question','$answer')");
   if ($query) {
    return true;
   } else {
    return false;
   }
  }
 }


 public function login($email,$password){
     $enc_password=md5($password);
     $query        = mysqli_query($this->conn, "select * from tbl_user where email='$email' and password='$enc_password'");
     $data         = mysqli_fetch_assoc($query);
     $result       = $query->num_rows;
     if($result==1){
         $email=$data['email'];
         $name=$data['name'];
         $email_approved=$data['email_approved'];
         $phone_approved=$data['phone_approved'];
         $active=$data['active'];
         $is_admin=$data['is_admin'];

         if($active=='0'){
             echo "<script>alert('You are Not active,Please Contact To Admin ')</script>";
         } else {
            $_SESSION['username']=$name;
            $_SESSION['email']=$email;
             if($is_admin=='1'){
                 $_SESSION['usertype']='admin';
                 header('Location:admin/index.php');
             } else {
                $_SESSION['usertype']='user';
                header('Location:index.php');
             }
         }

     }

 }

}

