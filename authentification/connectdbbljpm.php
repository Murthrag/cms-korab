<?php
	$servername = "mysql57.websupport.sk";
	$username = "Murthrag";
	$password = "kokbab.umi";
	$dbname = "Murthrag";

	$conn = mysqli_connect("mysql57.websupport.sk", "Murthrag", "kokbab.umi", "Murthrag", 3311);
	// Check connection
	if ($conn->connect_error) {
		die("Nepodarilo sa pripojit: " . mysqli_connect_error());
	} 
	
	//echo "<center>Connected successfully</center><br>";	
?>
