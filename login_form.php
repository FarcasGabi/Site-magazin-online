<!DOCTYPE >
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Doi</title>
<link rel="stylesheet" href="assets/css/meniu.css" />
<link rel="stylesheet" href="assets/css/login.css" />

</head>

<body>


<?php
include "meniu.php";
?>

<br>
<br>
<br>
<br><br>
<h2>Login</h2>
    <div class="login">
        <form action="login.php" method="post">
            <label><b>Mail    
        </b>    
        </label>
        <input type="text" name="Mail"  placeholder="Mail">
            <br><br>
            <label><b>Password     
        
        </b>    
        </label>
            <input type="text" name="Mail"  placeholder="Password">
            <br><br>
            <a href="register_form.php" class="ca">Don't have an account?</a>
            <input type="submit" name="log" id="log" value="Log in Here">
           

        </form>
    </div>


</div><!--aici se termina wrapperul-->


</body></html>