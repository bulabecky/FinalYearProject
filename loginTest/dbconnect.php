<?php
  $DBhost = "178.62.80.200";
  $DBuser = "root";
  $DBpass = "";
  $DBname = "FYP";
  
  $DBcon = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);
    
     if ($DBcon->connect_errno) {
         die("ERROR : -> ".$DBcon->connect_error);
     }
?>