<?php 
include 'db.php';


if (isset($_SESSION['id'])) {
	header('location:index.php');
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="stylelogin.css">
</head>
<body>
<?php 

$db->login();
 ?>

<div class="kotak_login">
		<p class="tulisan_login" style="">Login form</p>
	<form method="POST">
		<input type="text" name="user" class="form_login" placeholder="username"><br><br>
		<input type="password" name="pw" class="form_login" placeholder="password"><br><br>
		<button type="submit" name="btn" class="tombol_login">LOGIN</button>
		<br>
	</form>
</div>
</body>
</html>