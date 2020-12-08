<?php

class DbConn
{
 public function connection()
 {
  $conn = mysqli_connect("localhost", "root", "", "cedhosting") or die("Couldn't connect");
  return $conn;
 }
}
