<html>
<head>
<link rel="stylesheet" type="text/css" href="comment_style.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script src="testAjax.js"></script>


</head>

<body>

  <h1>Instant Comment System Using Ajax,PHP and MySQL</h1>

  <form method="post" action="">
  <textarea id="comment" placeholder="Write Your Comment Here....."></textarea>
  <br>
  <input type="text" id="username" placeholder="Your Name">
  <br>
  <input type="submit" onClick="post()" value="Post Comment">
  </form>

  <div id="all_comments">
  <?php
    $host="localhost";
    $username="root";
    $password="Beckyboo4";
    $databasename="register";

    $connect=mysqli_connect($host,$username,$password);
    $db=mysqli_select_db($databasename);
  
    $comm = mysqli_query("select name,comment,post_time from comments order by post_time desc");
    while($row=mysqli_fetch_array($comm))
    {
    $name=$row['name'];
    $comment=$row['comment'];
      $time=$row['post_time'];
    ?>
  
  <div class="comment_div"> 
    <p class="name">Posted By:<?php echo $name;?></p>
      <p class="comment"><?php echo $comment;?></p> 
    <p class="time"><?php echo $time;?></p>
  </div>
  
    <?php
    }
    ?>
  </div>

</body>
</html>