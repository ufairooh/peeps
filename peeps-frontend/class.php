<?php 

class Main
{
	private $db;
	function __construct($db)
	{
		$this->_db = $db;
	}

	function login(){
		if (isset($_POST['btn'])) {
			//echo "hola";
			$user = addslashes(strip_tags($_POST['user']));
			$pw = addslashes(strip_tags($_POST['pw']));

			if (!empty($user)AND !empty($pw)) {
				$sql = $this->_db->prepare("SELECT * FROM `users` WHERE username = :user AND password = :pw");
				$sql->execute(array('user' => $user, 'pw' => $pw));

				if ($sql->rowCount()) {
					$data = $sql->fetch();
					$_SESSION['id'] = $data['id'];
					$_SESSION['id'] = true;
					$_SESSION["username"] = $_POST["username"];
					header('location:index.php?');
				}else{
					echo "username or password are wrong";
				}
			}else{
				echo "please enter username and password";
			}
		}
	}

		function logout(){
		if (isset($_POST['btnLogout'])) {
			session_start();
			session_destroy();
			// echo "logout ngapa";
			header('location:loginusers.php');
		}
	}
}
 ?>