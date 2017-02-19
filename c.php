<?php
include("db.php");
if(isset;($_POST['submit']))
{
	$name=$_POST['namename'];
	$message=$_POST['message'];
	$insert=mysqli_query("insert into commenttable(name,message)values('$name','$message')")or die(mysqli_error());
	header("Location:comment.php");
	}
?>