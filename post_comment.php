<?php

$con = mysqli_connect("localhost","root","Beckyboo4","register");
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }


    if(isset($_POST['user_comm']) && isset($_POST['user_name'])){
      date_default_timezone_set('Europe/Dublin');
      $date = date("Y-m-d H:i:s");


      $name = $_POST['user_name'];
      $nreformat = $name;
      $name = mysqli_real_escape_string($con,$name);

      $comment = $_POST['user_comm'];
      $creformat = $comment;
      $comment = mysqli_real_escape_string($con,$comment);

      $insert = mysqli_query($con,"INSERT INTO comments(name, comment, post_time) VALUES ('$name','$comment', '$date')");

          
          ?>

          <div class="comment_div"> 
            <p class="name">Posted By: <?php echo $nreformat;?></p>
              <p class="comment"><?php echo $creformat;?></p> 
            <p class="time"><?php echo $date;?></p>
          </div>
          
          <?php
          

          mysqli_close($con) or die(mysqli_error());

      exit;
    }

