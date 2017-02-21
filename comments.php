<html>
<head>
<link rel="stylesheet" type="text/css" href="comment_style.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script src="testAjax.js"></script>


</head>

<body>

  <h1>Instant Comment System Using Ajax,PHP and MySQL</h1>

  <form method="post" action="" onsubmit="return post();">
  <textarea id="comment" placeholder="Write Your Comment Here....."></textarea>
  <br>
  <input type="text" id="username" placeholder="Your Name">
  <br>
  <input type="submit" value="Post Comment">
  </form>

  <div id="all_comments">
  <?php
    $con = mysqli_connect("localhost","root","Beckyboo4","register");
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }


    $result = mysqli_query($con,'SELECT name, comment, post_time FROM comments order by post_time desc');
    if (!$result) {
        die('Could not query:' . mysqli_error());
    }

   while ($row = mysqli_fetch_row($result)) {
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
    ?>
  </div>

</body>
</html>