<?php 
include 'db.php';


if (isset($_SESSION['id'])) {
	header('location:home.php');
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
</head>
<body>
<?php 

$db->login();
 ?>

<div align="center">
	<form method="POST">
		<input type="text" name="user" placeholder="username"><br><br>
		<input type="password" name="pw" placeholder="password"><br><br>
		<button type="submit" name="btn">LOGIN</button>
	</form>
</div>
</body>
</html>