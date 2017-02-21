<html>
<head>
<link rel="stylesheet" type="text/css" href="comment_style.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.js" />
<script>
function post()
{
  console.log("POSTING BITCH");
  var comment = document.getElementById("comment").value;
  var name = document.getElementById("username").value;
  if(comment && name)
  {
    $.ajax
    ({
      type: 'post',
      url: 'post_comment.php',
      data: 
      {
         user_comm:comment,
       user_name:name
      },
      success: function (response) 
      {
      document.getElementById("all_comments").innerHTML=response+document.getElementById("all_comments").innerHTML;
      document.getElementById("comment").value="";
        document.getElementById("username").value="";
  
      }
    });
  }
  
  return false;
}
</script>

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
    $password="";
    $databasename="sample";

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