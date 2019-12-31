<?php
session_start();
if (!isset($_SESSION['id'])){
header('location:account.php');
}

$id_user=$_SESSION['id'];
$member_query = mysqli_query($con, "select * from user where id_user = '$id_user'")or die(mysqli_error());
$member_row = mysqli_fetch_array($member_query);

$fullname = $member_row['firstname']." ".$member_row['lastname'];
?>