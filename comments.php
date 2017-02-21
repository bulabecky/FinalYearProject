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

    echo("<script>console.log('FOR THE LOVE OF GAWD WORK');</script>");


    $result = mysqli_query("INSERT INTO comments(id, name, comment, post_time) VALUES ('3','Charlie Boy','BOOOOOOM','2017-02-21 17:26')");
    if (!$result) {
        printf("error: %s\n", mysqli_error($con));
    }

    echo mysql_result($result);

    mysqli_close($conn) or die(mysqli_error());
    ?>
  </div>

</body>
</html>