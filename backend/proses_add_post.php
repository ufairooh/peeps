<?php
require 'connect.php';
require 'class/crud.php';
$crud=new crud($konek);

if ($_SERVER['REQUEST_METHOD']=='GET') {
    $id=@$_GET['id'];
    $op=@$_GET['op'];
}else if ($_SERVER['REQUEST_METHOD']=='POST'){
    $id=@$_POST['id'];
    $op=@$_POST['op'];
}
$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	//$image = base64_encode($image);
	$judul = $_POST['subject'];
	$deskripsi = $_POST['message'];
	$id_user = $_POST['user'];
	$category = $_POST['category'];
switch ($op){
    case 'post'://tambah data barang
        $query="INSERT INTO post (judul, deskripsi, gambar, tanggal, id_user, category) VALUE ('$judul', '$deskripsi', '$image', '".strtotime(date("Y-m-d h:i:sa"))."', '$id_user','$category')";
        $crud->addData($query,$konek);
		header("Location: tablePost.php");
    break;
	
}