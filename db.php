<?php
	$dbhost="localhost";
	$dbuser="root";
	$dbpass='';
	$dbname="quize";
	
	$connection=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	
	if($connection->connect_error){
		die('Connection Failed :'.$connection->connect_error);
	}
?>