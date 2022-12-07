<?php
echo"";
$a=$_POST['nume'];
$d=$_POST['prenume'];
$b=$_POST['An'];
$c=$_POST['varsta'];
include "conect.php";
$sql="INSERT INTO studenti (nume,prenume,An,varsta) VALUES ('$a','$d','$b','$c')";
//echo $sql;
//die();
$rez=mysqli_query($conexiune,$sql);
if($rez)
		header("Location:afis.php");
	else
		header("Location:form_insert.php");

?>