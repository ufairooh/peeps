<?php
require 'connect.php';

//session_start();
//if($_SESSION['nama_admin']=='')
//{
  //  header("location:./login.php");
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PEEPS</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700%7CRoboto:300,400,400i,500,700">
	<link rel="stylesheet" href="css/plugins.min.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/responsive-style.css">
	<link rel="stylesheet" href="css/colors/color-1.css" id="changeColorScheme">
	<link rel="stylesheet" href="css/custom.css">

	<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
	<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

        <!-- ==== Favicon ==== -->
    <link rel="icon" href="favicon.png" type="image/png">




<body>
    <header class="header--section style--1">
        <?php include "nav.php"; ?>
    </header>

    <div class="page--header pt--60 pb--60 text-center" style="background-image: url('<?=$image?>');" data-overlay="0.85">
        <div class="container">
            <div class="title">
                <h2 class="h1 text-white">peeps for finding a new friend with the same hoby</h2>
            </div>
        </div>
    </div>
    <div id="main-body">
    <section class="page--wrapper pt--80 pb--20">
        <div class="container">
    		<div class="row">
                <?php 
            	include "page.php"; 
            	include 'page/sidebar.php';
                ?>
            </div>
        </div>
    </section>
        <!-- Footer Section Start -->
        <footer class="footer--section">
            <!-- Footer Copyright Start -->
            <div class="footer--copyright pt--30 pb--30 bg-darkest">
                <div class="container">
                    <div class="text fw--500 fs--14 text-center">
                        <p>Copyright &copy; Soci<span>fly</span>. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
            <!-- Footer Copyright End -->
        </footer>
        <!-- Footer Section End -->
    </div>
    <!-- Wrapper End -->

    <!-- Back To Top Button Start -->
    <div id="backToTop">
        <a href="#" class="btn"><i class="fa fa-caret-up"></i></a>
    </div>
    <!-- Back To Top Button End -->

    <!-- ==== Plugins Bundle ==== -->
    <script src="js/plugins.min.js"></script>

    <!-- ==== Main Script ==== -->
    <script src="js/main.js"></script>