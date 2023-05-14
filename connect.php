<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$database = "dataonline";	
	$connect = mysqli_connect($host,$user,$pass,$database);
	mysqli_query($connect,"SET NAMES 'utf8'");

	/*if($connect){
		echo "Ket noi : OK";
	}*/
?>