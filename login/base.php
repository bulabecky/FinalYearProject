<?php
session_start();
 
$dbhost = "178.62.80.200"; // this will ususally be 'localhost', but can sometimes differ
$dbname = "FYP"; // the name of the database that you are going to use for this project
$dbuser = "root"; // the username that you created, or were given, to access your database
$dbpass = "Beckyboo4"; // the password that you created, or were given, to access your database
 
mysqli_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysqli_error());
mysqli_select_db($dbname) or die("MySQL Error: " . mysqli_error());
?>