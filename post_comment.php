<?php

$con = mysqli_connect("localhost","root","Beckyboo4","register");
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }


    if(isset($_POST['user_comm']) && isset($_POST['user_name'])){

      $name = $_POST['user_name'];
      $comment = $_POST['user_comm'];

      $result = mysqli_query($con,"INSERT INTO comments(name, comment, post_time) VALUES ('$name','$comment', CURRENT_TIMESTAMP)");


    }




?>
