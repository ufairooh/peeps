
<?php
require 'connect.php';
?>
<!-- session Azka -->
<?php 
include 'db.php';

if ($_SESSION['id'] == false){
    header('location:loginusers.php');
}
?>
<?php include "view_home.php"; ?>
