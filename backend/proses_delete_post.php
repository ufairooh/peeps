<?php 
include 'db.php';
include ('connect.php');
$idp=$_GET['id'];

mysqli_query($konek, "delete from post where id_post='$idp'") or die (mysqli_error());
if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: tablePost.php?id=".$_SESSION['id']."");
    }
?>