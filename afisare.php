<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> Conectare la tabel</title>
	<head>

	<body>
		<h1> Prima inregistrare din tabel </h1>
		<table>
			<tr>
				<td>Nr. crt.</td>
				<td>Nume</td>
				<td>Prenume</td>
				<td>Semigrupa</td>
			</tr>
<?php
	include "conect.php";
	$conexiune=conectare_mysql();
	$i=1;
	$interogare_student= "SELECT * FROM Studenti";
	//$student=mysql_query($interogare_student);
	$student=mysqli_query($conexiune,$interogare_student);
	while($afis_st=mysqli_fetch_array($student))
	//while ($afis_st=mysql_fetch_array($student))
	{
		echo"<tr>
				<td>$i</td>
				<td>".$afis_st['nume']."</td>
				<td>".$afis_st['prenume']."</td>
				<td>".$afis_st['semigrupa']."</td>
			</tr>";
			$i++;
	}
?>
		</table>
		</html>