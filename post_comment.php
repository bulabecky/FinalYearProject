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
      $time = CURRENT_TIMESTAMP;

      $insert = mysqli_query($con,"INSERT INTO comments(name, comment, post_time) VALUES ('$name','$comment', $time)");

      

        $select=mysqli_query($con,"select name,comment,post_time from comments where name='$name' and comment='$comment'");
        if (!$select) {
          die('Could not select:' . mysqli_error());
        }
          
          ?>

          <script>console.log("WE ARE HERE");</script>
          <div class="comment_div"> 
            <p class="name">Posted By:<?php echo $name;?></p>
              <p class="comment"><?php echo $comment;?></p> 
            <p class="time"><?php echo $time;?></p>
          </div>
          
          <?php
          

          mysqli_close($con) or die(mysqli_error());

      exit;
    }

