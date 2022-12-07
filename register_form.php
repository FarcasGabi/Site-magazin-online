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
<h2>Register</h2>
<div class="login" >
<form action="register_insert.php" method="post">
     	
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Name</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"
                      value="<?php echo $_GET['name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"><br>
          <?php }?>

          <label>Mail</label>
          <?php if (isset($_GET['mail'])) { ?>
               <input type="text" 
                      name="mail" 
                      placeholder="Mail"
                      value="<?php echo $_GET['mail']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="mail" 
                      placeholder="Mail"><br>
          <?php }?>


     	<label>Password</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Password"><br>

          <label>Re Password</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Re_Password"><br>

     	<button type="submit">Sign Up</button>
          <a href="login_form.php" class="ca">Already have an account?</a>
     </form>


</div><!--aici se termina wrapperul-->


</body></html>