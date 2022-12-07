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
$nameErr = $emailErr = $verifErr = $existErr =  "";
$name = $email = "";
$passw = $passwErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Numele este obligatoriu";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z 1-9]*$/",$name)) {
      $nameErr = "Doar litere cifre si spatii sunt permise";
    }
  }
   if (empty($_POST["passw"])) {
    $passwErr = "Parola este obligatorie";
  } else {
    $passw = test_input($_POST["passw"]);
	if (strlen($passw) < 4)
	{$passwErr = "parola MAI MICA de 4 caratere";}
    elseif (!preg_match("/^[a-zA-Z1-9]*$/",$passw)) {
		// check if name only contains letters and whitespace
		$passwErr = "Doar litere si cifre sunt permise";
    }
  }
  if (empty($_POST["email"])) {
    $emailErr = "E-mail este obligatoriu";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Format email Invalid";
    }
  }
  if (!(empty($name) || empty($passw) || empty($email))&&(empty($nameErr)&&empty($emailErr)&&empty($passwErr)))
	 $verifErr="OK";
}
 if ($verifErr=="OK")
 { // verificare existenta in baza de date
	$conn = conectare_mysql();
	// curata variabile de atacuri sql injectio si XSS (cross site sripting)
	$name=curata($name);
	$email=curata($email);
	$passw=curata($passw);
	$sql = "SELECT * FROM utilizatori where nume='$name' and e_mail='$email' ";
	$rez = mysqli_query($link,$sql);
	if (mysqli_num_rows($result) == 0)
	  { $passw_md5 = md5($passw);
		$sql_insert = "INSERT INTO `utilizatori`(nume,e_mail,parola) VALUES ('$name','$email','$passw_md5')";
		//$sql_insert = "INSERT INTO `utilizatori`(nume,e_mail,parola) VALUES ('$name','$email','$passw')";
	    $insert =mysqli_query($conn,$sql_insert);}
	if (mysqli_num_rows($result) >= 1)
		$existErr = "Exista un utilizator cu acest nume si e-mail DEJA CREAT";
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
<h2 style="text-align:center" >Creare utilizator</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Nume Utilizator: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr?></span> <span> : numai caractere alfanumerice</span> 
  <br> 
<!--  Adresa E-mail: <input type="text" name="email" value="<?php echo $email;?>"> -->
  Adresa E-mail: <input type="text" name="email" value=" ">
  <span class="error">* <?php echo $emailErr?></span> <span> : adresa de E-mail trebuie sa fie valida></span>
  <br>
<!--  Parola: <input type="password" size="10" name="passw" value="<?php echo $passw;?>">-->
  Parola: <input type="password" size="10" name="passw" value="    "> 
  <span class="error">* <?php echo $passwErr?></span> <span> : parola numai din litere si cifre - minim 4 caractere, maxim 10></span>
  <br> 
  <input id="input" type="submit" name="submit" value="Trimite">  
</form>

<?php
echo '<h3 class="error">'.$existErr."</h3>";
//if (!(empty($name) || empty($email)) && (empty($nameErr)&&empty($emailErr)&&empty($existErr)))
if (empty($nameErr)&&empty($emailErr)&&empty($existErr))
{ //toate condittile sunt indeplinite //
  echo '<h3 style="text-align:right" >Acum aveti cont <a href="login_user.php">Logativa ca si Utilizator </a></h3>';
  // header("Location: login_user.php"); // nu se folosete pt. a putea afisa rezutatul crearii de cont
}
?>

</div>
 <div id="push"></div>
<div id="footer">
<p>Copyright 2016 Turbureanu Georgiana</p>
</div>
</div><!--aici se termina wrapperul-->

</body>
</html>
