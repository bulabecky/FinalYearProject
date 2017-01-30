<?php
/*
Author: Javed Ur Rehman
Website: http://www.allphptricks.com/
*/


$con = mysqli_connect("178.62.80.200","root","Beckyboo4","register");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>