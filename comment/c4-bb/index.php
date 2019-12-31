<!DOCTYPE html>
<html>
<head>
	<link href="jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen"/>
	<script src="js/jquery-1.9.1.min.js"></script>
	<?php include('dbconn.php'); ?>
</head>

<body>

	   <form id="login_form"  method="post">
        <h3>Please Login</h3>
        <input type="text"  id="username" name="username" placeholder="Username" required><br><br>
        <input type="password" id="password" name="password" placeholder="Password" required><br><br>
        <button name="login" type="submit">Sign in</button>
		
		      </form>
				<script>
			jQuery(document).ready(function(){
			jQuery("#login_form").submit(function(e){
					e.preventDefault();
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "login.php",
						data: formData,
						success: function(html){
						if(html=='true')
						{
						$.jGrowl("Welcome Back!", { header: 'Access Granted' });
						var delay = 2000;
							setTimeout(function(){ window.location = 'home.php'  }, delay);  
						}
						else
						{
						$.jGrowl("Please Check your username and Password", { header: 'Login Failed' });
						}
						}
						
					});
					return false;
				});
			});
			</script>  

  
  
		</div>
		</div><!--form-->
		
		<br><br>
		
		
		
        <h3>Register here</h3>

			<form method="POST" action="signup.php" id="signup">
		
				<input type="text" name="username" Placeholder="Username here.."><br /><br />
				<input type="password" name="password" Placeholder="Password here.."><br /><br />
				<input type="text" name="firstname" Placeholder="First Name here.."><br /><br />
				<input type="text" name="lastname" Placeholder="Last Name here.."><br /><br><br />
				<input type="submit" name="save" value="Save">
			</form>

			
<br>
</center>
<?php include('scripts.php');?>

</body>
</html>