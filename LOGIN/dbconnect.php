<?php

	// this will avoid mysql_connect() deprecation error.
	error_reporting( ~E_DEPRECATED & ~E_NOTICE );
	// but I strongly suggest you to use PDO or MySQLi.
	
	define('DBHOST', '178.62.80.200');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBNAME', 'FYP');
	
	$conn = mysqli_connect(DBHOST,DBUSER,DBPASS);
	$dbcon = mysqli_select_db(DBNAME);
	
	if ( !$conn ) {
		die("Connection failed : " . mysqli_error());
	}
	
	if ( !$dbcon ) {
		die("Database Connection failed : " . mysqli_error());
	}