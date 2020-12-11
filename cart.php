<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['email'])) {
    if ($_SESSION['usertype'] == 'admin') {
        header("location:admin/index.php");
    } else {
        header("location:index.php");
    }
}

if (!isset($_SESSION['email'])) {
    header('Location:login.php');
}
