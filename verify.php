<?php
include_once './class/user.class.php';
$user =new User();
require_once "Mail.php";
if(isset($_POST['action']))
{
 $option=$_POST['action'];
  if($option=="email"){
    $email=$_POST['email'];
    $html="Please Click On link for Verify Your Email http://localhost/cedhosting/verify.php?email=$email";
    error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_STRICT);
    $host          = "ssl://smtp.gmail.com";
    $username      = "sddrajiv@gmail.com";
    $password      = "Shivam99313";
    $port          = "465";
    $to            = $email;
    $email_from    = $username;
    $email_subject = "Registration Request Approved:";
    $email_body    = $html;
    $email_address = "sddrajiv@gmail.com";
    $headers  = array('From' => $email_from, 'To' => $to, 'Subject' => $email_subject, 'Reply-To' => $email_address);
    $smtp    = Mail::factory('smtp', array('host' => $host, 'port' => $port, 'auth' => true, 'username' => $username, 'password' => $password));
    $mail    = $smtp->send($to, $headers, $email_body);
    if (PEAR::isError($mail)) {
     echo ("<p>" . $mail->getMessage() . "</p>");
    } else {
     echo "Email Sent successfully sent!";
    }
  }
}  


if(isset($_GET['email'])){
  $email=$_GET['email'];
  $check=$user->updateEmail($email);
  if($check){
    echo "<script>alert('Email Varification Completed. Now You Can Login');window.location.href='login.php';</script>";
  } else {
    echo "<script>alert('Something Went Wrong ,Please Verify Again');window.location.href='login.php';</script>";
  }
}




?>