<?php

$con = mysqli_connect("localhost","root","Beckyboo4","register");
    // Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

echo('<script>console.log("HELLO MOTTO");</script>');




?>
