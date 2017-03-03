<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cosán Ceol</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css1/bootstrap1.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css1/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
</head>

<body>
   <button type="button" class="btn btn-lg btn-dark" onclick="window.location.href='http://cosanceol.tk/index.php'" >Home
</button> 
  <body onload="load()">
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

    $q = "SELECT user_id FROM users WHERE username='$filtered_username_variable'";
    $r = mysqli_query ($con, $q);

    if (mysqli_num_rows($r) == 0) { // No: of rows returned. 0 results, Hence the username is Available.
            $query = "INSERT into `users` (username, password, email, trn_date) VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
            //code to INSERT into Database

    } else { // The username is not available, print error message.

                echo "<h3>Uh-oh, This username has already been registered.<br/>Click here to <a href='login.php'>Login</a></h3>";

    }
}

//         $query = "INSERT into `users` (username, password, email, trn_date)
// VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
//         $result = mysqli_query($con,$query);
//         if($result){
//             echo "<div class='form'>
// <h3>You are registered successfully.</h3>
// <br/>Click here to <a href='login.php'>Login</a></div>";
//         }
//     }else{
?>
<div class="form">
<h1 style="color:white;">Registration</h1>
<form name="registration" action="" method="post" id=formI>
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
<script type="text/javascript">
    var form = document.getElementById('formID'); // form has to have ID: <form id="formID">
form.noValidate = true;
form.addEventListener('submit', function(event) { // listen for form submitting
        if (!event.target.checkValidity()) {
            event.preventDefault(); // dismiss the default functionality
            alert('Please, fill the form'); // error message
        }
    }, false);

</script>
</div>
<?php } ?>
</body>
</html>