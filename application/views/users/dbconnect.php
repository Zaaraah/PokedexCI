<?php

	// this will avoid mysql_connect() deprecation error, 
	error_reporting( ~E_ALL & ~E_DEPRECATED &  ~E_NOTICE );
	// I strongly suggest you to use PDO or MySQLi.
	
	// define('DBHOST', 'localhost');
	// define('DB_USERNAME', 'root');
   // define('DB_PASSWORD', 'root');
   // define('DB_DATABASE', 'dbtest');
   // $conn= mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', 'root');
	define('DBNAME', 'pokedb');

	$conn = new mysqli(DBHOST,DBUSER,DBPASS,DBNAME);
	
	if ( !$conn ) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
?>