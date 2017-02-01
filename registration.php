<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <!DOCTYPE html>
<html>
  <head>
      <link href="bootstrap.min.css" rel="stylesheet">	
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     
     <title>Cosan Ceol</title>
  </head>
  <body>
 
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
     
      <a class="navbar-brand" href="#"><img src="logo.png" class="img-thumbnail" width="45"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.html">Home <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ulster <span class="caret"></span></a>
          <ul class="dropdown-menu">
			  <li><a href="antrim.html">Antrim</a></li>
			  <li><a href="#">Armagh</a></li>
			  <li><a href="#">Cavan</a></li>
			  <li><a href="#">Derry</a></li>
			  <li><a href="donegal.html">Donegal</a></li>
			  <li><a href="#">Down</a></li>
			  <li><a href="#">Fermanagh</a></li>
			  <li><a href="#">Monaghan</a></li>
			  <li><a href="#">Tyrone</a></li>
         </ul>
            <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Munster <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Clare</a></li>
            <li><a href="#">Cork</a></li>
            <li><a href="#">Kerry</a></li>
            <li><a href="#">Limerick</a></li>
            <li><a href="#">Tipperary</a></li>
            <li><a href="#">Waterford</a></li>
          </ul>
          </li>
           <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Leinster<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Carlow</a></li>
            <li><a href="#">Dublin</a></li>
            <li><a href="#">Kildare</a></li>
            <li><a href="#">Kilkenny</a></li>
            <li><a href="#">Laois</a></li>
            <li><a href="#">Longford</a></li>
            <li><a href="#">Louth</a></li>
            <li><a href="#">Meath</a></li>
            <li><a href="#">Offaly</a></li>
            <li><a href="#">Westmeath</a></li>
            <li><a href="#">Wexford</a></li>
            <li><a href="#">Wicklow</a></li>
          </ul>
          </li>
           <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Connacht <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Galway</a></li>
            <li><a href="#">Leitrim</a></li>
            <li><a href="#">Mayo</a></li>
            <li><a href="#">Roscommon</a></li>
            <li><a href="#">Sligo</a></li>
          </ul>
          </li>
          </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="registration.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username); 
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date)
VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php } ?>
</body>
</html>