<?php 
include ('connect.php');
$id_comment=$_GET['idc'];
$idp=$_GET['id'];

mysqli_query($konek, "delete from comment where id_comment='$id_comment'") or die (mysqli_error());
header("Location: view_post_detail.php" .'?id='. urlencode($_POST['id']));

?>