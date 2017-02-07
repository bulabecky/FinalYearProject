<?php 
  $con = new mysqli("localhost", "root", "Beckyboo4", "FYP");
 
  if($con->connect_errno > 0){
    die('Unable to connect to database [' . $con->connect_error . ']');
  }
?>