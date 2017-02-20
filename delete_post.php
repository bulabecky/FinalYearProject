<?php
include('dbcon.php');
$id=$_GET['id'];

mysqli_query("delete from post where post_id='$id'")or die(mysqli_error());
header('location:index.php');



?>