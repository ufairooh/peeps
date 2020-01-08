<?php
require 'connect.php';
require 'class/crud.php';
$crud=new crud($konek);

$image = addslashes(file_get_contents($_FILES['userfile']['tmp_name']));
	//$image = base64_encode($image);
	$nama = $_POST['nama'];
    $gender = $_POST['gender'];
    $hobi = $_POST['hobi'];
	$email = $_POST['email'];
	$username = $_POST['username'];
    $pass = $_POST['pw'];

        if (!empty($nama) && !empty($gender) && !empty($hobi) && !empty($email) && !empty($username) && !empty($pass) && !empty($image) ){
            $query="INSERT INTO users (id_user, username, password, nama, email, gender, hobi, foto) VALUES (NULL,'$username', '$pass', '$nama', 'email', '$gender', '$hobi', '$image')";
                $crud->addData($query,$konek);
                header('location:loginusers.php?');
        } else {
            $message = "Data ada yang kosong, silakan isi kembali :)";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('location:form_regis.php?');
        }
?>
