<?php 
include ('dbconn.php');
$id=$_GET['id'];

mysqli_query($con, "delete from post where post_id='$id'") or die (mysqli_error());
header ('location:home.php');

?>