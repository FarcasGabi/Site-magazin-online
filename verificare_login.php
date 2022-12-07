<?php
function verif_login(&$nameErr,&$name,&$emailErr,&$email,&$passwErr,&$passw){
 $amVerificat=""; // OK daca s-a verificat complet
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Nume este obligatoriu";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z 1-9]*$/",$name)) {
      $nameErr = "Doar litere cifre si spatii permise";
    }
  }
   if (empty($_POST["passw"])) {
    $passwErr = "Parola este obligatorie";
  } else {
    $passw = test_input($_POST["passw"]);
    }
//if (!empty($email)) 
//{	// avem si email de testat
 if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
//}  
  if (empty($nameErr)&&empty($emailErr)&&empty($passwErr))
	 $amVerificat = "OK"; 
 }
 return $amVerificat;
}
function verif_login_admin(&$nameErr,&$name,&$passwErr,&$passw){
 $amVerificat=""; // OK daca s-a verificat complet
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Nume este obligatoriu";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z 1-9]*$/",$name)) {
      $nameErr = "Doar litere cifre si spatii permise";
    }
  }
   if (empty($_POST["passw"])) {
    $passwErr = "Parola este obligatorie";
  } else {
    $passw = test_input($_POST["passw"]);
    }
  if (empty($nameErr)&&empty($emailErr)&&empty($passwErr))
	 $amVerificat = "OK"; 
 }
 return $amVerificat;
}

?> 
