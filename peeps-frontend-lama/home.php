<?php 
include 'db.php';

if ($_SESSION['id'] == false ){
	header('location:index.php');
}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>HOME</title>
 </head>
 <body>
 <?php 

$db->logout();
 ?>

 <div align="center">
 	<form method="POST">
 		LOOK THIS HOME SO CUTE!!!!<br>
 		<button type="submit" name="btnLogout">logout</button>
 	</form>
 </div>
 </body>
 </html>