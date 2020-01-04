<?php 
include ('connect.php');
$idp=$_GET['id'];

mysqli_query($konek, "delete from post where id_post='$idp'") or die (mysqli_error());
header('location:index_user.php');
?>