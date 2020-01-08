
<?php
require 'connect.php';
?>
<!-- session Azka -->
<?php 
include 'db.php';

if ($_SESSION['id'] == false || strcmp($_SESSION['role'], 'admin') == 0 ){
    header('location:loginusers.php');
}
?>
<?php include "view_home.php"; ?>
