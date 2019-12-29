<?php
require './connect.php';

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

</body>
</html>