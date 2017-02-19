<?php
include("login/db.php");
if(isset;($_POST['submit']))
{
	$name=$_POST['namename'];
	$job=$_POST['job'];
	$message=$_POST['message'];
	$insert=mysqli_query("insert into commenttable(name,job,message)values('$name','$job','$message')")or die(mysqli_error());
	header("Location:comment.php");
	}
?>