<?php
		include('../connect.php');
		session_start();
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = mysqli_query($con, "SELECT * FROM user WHERE username='$username' AND password='$password'")or die(mysqli_error());
		$count = mysqli_num_rows($query);
		$row = mysqli_fetch_array($query);


		if ($count > 0){
		
		$_SESSION['id']=$row['id_user'];
		
		echo 'true';
		
		
		 }else{ 
		echo 'false';
		}	
				
		?>