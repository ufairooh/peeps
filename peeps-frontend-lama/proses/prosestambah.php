<?php
require '../connect.php';
require '../class/crud.php';
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
	$member = $_POST['jumlah'];
	$deskripsi = $_POST['message'];
	$id_user = $_POST['user'];
switch ($op){
    case 'post'://tambah data barang
        $query="INSERT INTO post (judul, member, deskripsi, gambar, tanggal, id_user) VALUE ('$judul', '$member', '$deskripsi', '$image', now(), '$id_user')";
        $crud->addData($query,$konek);
    break;
	
}