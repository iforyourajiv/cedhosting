<?php
include_once './class/user.class.php';
$user = new User();
if(isset($_POST['email'])){
$decryptedEmail=$_REQUEST['email'];
$check=$user->checkEmail($decryptedEmail);
if($check){
    echo "found";
    
} else {
    echo "notfound";
}
}


?>