<?php

$con = mysqli_connect("localhost","root","Beckyboo4","register");
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }


    if(isset($_POST['user_comm']) && isset($_POST['user_name'])){

      $result = mysqli_query($con,'SELECT name, comment, post_time FROM commments');
        if (!$result) {
            die('Could not query:' . mysqli_error());
        }




    }




?>
