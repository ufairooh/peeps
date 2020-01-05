<?php 
include 'db.php';


if (isset($_SESSION['id'])) {
	header('location:index.php');
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login User</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="logincss/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logincss/logincss/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logincss/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logincss/logincss/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="logincss/logincss/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logincss/logincss/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logincss/css/util.css">
	<link rel="stylesheet" type="text/css" href="logincss/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<?php 

$db->login();
 ?>
	<div class="limiter">
		<div class="page--header pt--60 pb--60 text-center" style="background-image: url('img/hardwood-1851071__340.jpg'); height: 695px;" data-overlay="0.85">
<br>
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="logincss/images/img-01.png" alt="IMG">
				</div>

				<form method="POST" class="login100-form validate-form">	
					<span class="login100-form-title">
						Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Username kosong">
						<input class="input100" type="text" name="user" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password kosong">
						<input class="input100" type="password" name="pw" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button  name="btn" class="login100-form-btn">
							Login
						</button>
					</div>
					<br>
					<a class="txt2" href="form_regis.php">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					<!-- <div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="logincss/#">
							Username / Password?
						</a>
					</div> -->

					<div class="text-center p-t-136" >
						
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="logincss/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="logincss/vendor/bootstrap/js/popper.js"></script>
	<script src="logincss/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="logincss/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="logincss/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="logincss/js/main.js"></script>

</body>
</html>