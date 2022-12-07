<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8>
<title>Chestionare | online | Sibiu | Turbureanu</title>
<link rel="stylesheet" href="stil_1.css" />


</head>

<body>
<!-- seventa php validare forma -->
<?php
include 'functii_conexiune.php';
// define variables and set to empty values
$nameErr = $emailErr = $verifErr = $foundErr = "";
$name = $email = "";
$passw = $passwErr = "";

include 'verificare_login.php';
$verifErr=verif_login_admin($nameErr,$name,$passwErr,$passw); // verificare date intrare
if ($verifErr=="OK")
 { // verificare existenta in baza de date
	$conn = conectare_mysql();
	// curata variabile de atacuri sql injectio si XSS (cross site sripting)
	$name=curata($name);
	$passw=curata($passw);
	$passw_md5 = md5($passw);
	$sql = "SELECT * FROM utilizatori where nume='$name' and parola='$passw_md5' and tip=1";
	$rez = mysqli_query($link,$sql);
	if (mysqli_num_rows($rez) == 0)
		$foundErr = "Administrator NEGASIT,  Nume sau parola ERONAT";
	if (mysqli_num_rows($rez) == 1)
	  {$foundErr = "Am gasit";
		header('Location: admin.php?utilizator=Admiistartor');}
 }
?>
 
 

<div id="wrapper">
<div id="header">
<h1>Chestionare on-line </h1>
</div>
 
<div id="left-column">
<h2 style="text-align:center" >  Navigare  </h2>
<ul id="navbar">
<li><a href="#">Chestionare</a></li>
<!--<li><a href="#">Administrare</a></li>-->
<li><a href="index.php">Home</a></li> 
<li><a href="CVbun.php">CV Turbureanu</a></li>
</ul>
</div>
 
<div id="right-column">
<h2 style="text-align:center" >Logare Administartor</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Nume Utilizator: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br>
  Parola: <input type="password" size="10" name="passw" value="    "> 
  <span class="error">* <?php echo $passwErr?></span>
  <br>   <input id="input" type="submit" name="submit" value="Trimite">  
</form>

<?php
echo '<h3 class="error">'.$foundErr."</h3>";
?>

</div>
 <div id="push"></div>
<div id="footer">
<p>Copyright 2016 Turbureanu Georgiana</p>
</div>
</div><!--aici se termina wrapperul-->

</body>
</html>
