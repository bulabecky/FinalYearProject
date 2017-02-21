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

      $insert = mysqli_query($con,"INSERT INTO comments(name, comment, post_time) VALUES ('$name','$comment', CURRENT_TIMESTAMP)");

      $id=mysqli_insert_id($insert);

        $select=mysqli_query($con,"select name,comment,post_time from comments where name='$name' and comment='$comment' and id='$id'");
        if (!$select) {
          die('Could not select:' . mysqli_error());
      }
        
        while ($row = mysqli_fetch_row($select)) {
        $name = $row[0];
        $comment = $row[1];
        $datetime = $row[2];
        
        ?>

        <div class="comment_div"> 
          <p class="name">Posted By:<?php echo $name;?></p>
            <p class="comment"><?php echo $comment;?></p> 
          <p class="time"><?php echo $datetime;?></p>
        </div>
      <?php
      }

      mysqli_close($con) or die(mysqli_error());
        
      }
?>
