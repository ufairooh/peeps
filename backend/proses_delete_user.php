<?php 
include ('connect.php');
$idp=$_GET['id'];

mysqli_query($konek, "delete from users where id_user='$idp'") or die (mysqli_error());
if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
?>