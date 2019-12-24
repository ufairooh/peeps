<?php

include "Connection.php";


if(isset($_POST['submit'])){
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	//$image = base64_encode($image);
	$judul = $_POST['subject'];
	$member = $_POST['jumlah'];
	$deskripsi = $_POST['message'];
	$id_user = $_POST['user'];
	
	$sql = "INSERT INTO post (judul, member, deskripsi, gambar, tanggal, id_user) VALUE ('$judul', '$member', '$deskripsi', '$image', now(), '$id_user')";
	$query = mysqli_query($db, $sql);
	echo "berhasil";
}

function getPost(){
	$server = "localhost";
$user = "root";
$password = "";
$nama_database = "db";

$db = mysqli_connect($server, $user, $password, $nama_database);
        $sql2 = "SELECT * FROM post";
        $result = mysqli_query($db, $sql2);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
?>