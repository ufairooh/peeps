<?php
include 'db.php';
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

$image = addslashes(file_get_contents($_FILES['userfile']['tmp_name']));
    //$image = base64_encode($image);
    $nama = $_POST['nama'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pass = $_POST['pw'];

    switch ($op){
    case 'post'://tambah data barang
        $query="INSERT INTO users (id_user, username, password, nama, email, gender, hobi, foto, role) VALUES (NULL,'$username', '$pass', '$nama', '$email', '$gender', '', '$image', 'admin')";
        $crud->addData($query,$konek);
        header("Location: tableAdmin.php?id=".$_SESSION['id']."");
    break;
        }
?>
