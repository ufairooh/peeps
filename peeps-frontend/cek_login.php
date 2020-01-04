<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'connect.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['user'];
$password = $_POST['pw'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from admin where username='$user' and password='$pw'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$_SESSION['username'] = $user;
	$_SESSION['status'] = "login";
	header("location:index.php");
}else{
	header("location:loginuser.php?pesan=gagal");
}
?>