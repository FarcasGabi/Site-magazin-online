<?php
function conectare_mysql()
 {  // Informatii baza de date
	$host = "localhost"; //aici numele serverului
	$user = "root"; // aici userul
	$passw = ""; //parola
	$db_name = "site"; // numele bazei de date
	// Create connection
	$con =  mysqli_connect($host, $user, $passw, $db_name);
	// Check connection
	if (mysqli_connect_errno()) {
		echo "failed to connect:".mysqli_connect_error();
	 }
	 else { return $con;}
}
?>