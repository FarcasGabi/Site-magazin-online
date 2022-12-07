<?php
function conectare_mysql()
 {  $host = "localhost";
	$user = "root";
	$pass = "";
	$db = "site";
	// Create connection
	$con =  mysqli_connect($host, $user, $pass, $db);
	// Check connection
	if (mysqli_connect_errno()) {
		echo "failed to connect:".mysqli_connect_error();
	 }
	 else { return $con;}
}

function sanitize($data)
{ // testare si curartire pt. SQL injection si XSS 
  // De asemenea poate sa fie folosit si pentru getting POST/GET variables
  //$_POST = sanitize($_POST);
  //$_GET  = sanitize($_GET);
 if (is_array($data))
	    foreach($data as $var=>$val) {
        $output[$var] = sanitize($val);
    } 
  else 
    {
		// remove whitespaces (not a must though)
		$data = trim($data); 
		// apply stripslashes if magic_quotes_gpc is enabled
		if(get_magic_quotes_gpc()) 
		{	$data = stripslashes($data); }
		// curatire p. atacuri XSS cros site scripting 
		$data  = cleanInput($data);
		// a mySQL connection is required before using this function
		// transforma caracterele speciale in escape (\x00, \n, \r, \, ', " and \x1a.) 
		$data = mysql_real_escape_string($data);
	}
return $data;
}

function test_input($data)
{ // testare si curatire data intrare 
  $data = trim($data); // elimina spatii inceput si sfarsit
  $data = stripslashes($data); // elimina backslash
  $data = htmlspecialchars($data); // pune caractere speciale conform html
  return $data;
}

function cleanInput($input) {
 // curatire pt. atacuri XSS cros site scripting 
 $search = array(
    '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
    '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
    '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
    '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
  );
  $output = preg_replace($search, '', $input);
  return $output;
  }
function curata($data)
{ // curatire contra SQL Injection si XSS(cross site scripting)	
	$data  = cleanInput($data); // curatire pt. atacuri XSS cros site scripting 
	// a mySQL connection is required before using this function
	// transforma caracterele speciale in escape (\x00, \n, \r, \, ', " and \x1a.) 
	// $data = mysql_real_escape_string($data);
 return $data;
}
?>  