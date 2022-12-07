<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "chest_georgiana";
// Create connection
$con =  mysqli_connect($host, $user, $pass, $db);
// Check connection
if (mysqli_connect_errno()) {
    echo"failed to connect:".mysqli_connect_error();
}


$sql = "SELECT id, name FROM adi_test";
$rez = mysqli_query($link,$sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	echo "\n Exemplu citire fisier:\n"; 
	?>
	<table border=1>
	<tr>
		<th>Id</th>
		<th>Name</th>
	</tr 
	<?php
    while(mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td></tr>";
    }
} else {
    echo "0 results";
}
mysqli_close($conn);
?> 


