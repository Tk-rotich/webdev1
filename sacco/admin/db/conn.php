<?php 
	$hostname_connct = "localhost";
	$database_connct = "sacco";
	$username_connct = "root";
	$password_connct = "";
    
	$connct= mysqli_connect($hostname_connct, $username_connct, $password_connct, $database_connct) or trigger_error(mysql_error(),E_USER_ERROR); 
	

?>