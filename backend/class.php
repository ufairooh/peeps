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
					if($data['role']==user){
					$_SESSION['id'] = $data['id_user'];
					$_SESSION['username'] = $data['username'];
					header('location:index.php?');}
					else{
						$_SESSION['id'] = $data['id_user'];
					$_SESSION['username'] = $data['username'];
					$_SESSION['role'] = $data['role'];
						header('location:../backend/postAdmin.php');
					}
				}else{
					    $message = "Maaf anda tidak bisa login, silakan buat akun terlebih dahulu :)";
						echo "<script type='text/javascript'>alert('$message');</script>";
				}
			}
		}
	}

		function logout(){
		if (isset($_POST['btnLogout'])) {
			session_start();
			session_destroy();
			// echo "logout ngapa";
			header('location:../peeps-frontend/loginusers.php');
		}
	}
}
 ?>