<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8 >
<title>Chestionare | online | Sibiu | </title>
<link rel="stylesheet" href="stil_1.css" />


</head>

<body>
<!-- seventa php validare forma -->
<?php
// utilizatorul scris dupa egal
$util = $_GET['utilizator'];

include 'functii_conexiune.php';
// defineste variabile și seteaza la valori goale

// conectare in baza de date
 $conn = conectare_mysql();

	// curata variabile de atacuri sql injectio si XSS (cross site sripting)
//	$sql = "SELECT * FROM utilizatori where nume='$name' and e_mail='$email' and parola='$passw_md5' ";
//	$result = $conn->query($sql);
//	if ($result->num_rows == 0)
//		$foundErr = "utilizator NEGASIT,  Nume,parola sau E-mail ERONAT";
//	if ($result->num_rows == 1)
//		$foundErr = "Am gasit";
 
?>
 
 

<div id="wrapper">
<div id="header">
<h1>Chestionare on-line </h1>
</div>
 
<div id="left-column">
<h2 style="text-align:center" >  Navigare  </h2>
<ul id="navbar">
<!--<li><a href="#">Chestionare</a></li>
<li><a href="#">Administrare</a></li>-->
<li><a href="index.php">Home</a></li> 
<li><a href="CVbun.php">CV Turbureanu</a></li>
</ul>
</div>
 
<div id="right-column">
<h3 style="text-align:right" >Sunteti conectat ca si <span class="error"> <?php echo $util ?> </span></h3>
<!--<h3 style="text-align:right" >Alegeti chestionarul dorit </h3>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Nume Utilizator: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br>
  Adresa E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br>
  Parola: <input type="password" size="10" name="passw" value="    "> 
  <span class="error">* <?php echo $passwErr?></span>
  <br>   <input id="input" type="submit" name="submit" value="Trimite">  
</form> -->

<?php
// echo '<h3 class="error">'.$foundErr."</h3>";
?>

</div>
 <div id="push"></div>
<div id="footer">
<p>Copyright 2016 Turbureanu Georgiana</p>
</div>
</div><!--aici se termina wrapperul-->

</body>
</html>
