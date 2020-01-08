<?php 
include ('connect.php');
$id_comment=$_GET['id'];

mysqli_query($konek, "delete from comment where id='$id_comment'") or die (mysqli_error());
//header("Location: view_post_detail.php" .'?id='. urlencode($_POST['id']));
  if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
?>