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
	$id_post = $_POST['post'];
	$category = $_POST['category'];
switch ($op){
    case 'post'://tambah data barang
        $query="UPDATE post SET judul='$judul', deskripsi='$deskripsi', category='$category' where id_post='$id_post'";
        $crud->addData($query,$konek);
	break;
	
}
?>