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
    require("login/db.php");
    echo("<script>console.log('FOR THE LOVE OF GAWD WORK');</script>");
    $sql = "SELECT * FROM comments";
   
    ?>
  </div>

</body>
</html>