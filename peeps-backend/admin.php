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
            <!-- Required meta tags-->
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="au theme template">
            <meta name="author" content="Hau Nguyen">
            <meta name="keywords" content="au theme template">

            <!-- Title Page-->
            <title>Tables</title>

            <!-- Fontfaces CSS-->
            <link href="css/font-face.css" rel="stylesheet" media="all">
            <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
            <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
            <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

            <!-- Bootstrap CSS-->
            <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

            <!-- Vendor CSS-->
            <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
            <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
            <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
            <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
            <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
            <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
            <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

            <!-- Main CSS-->
            <link href="css/theme.css" rel="stylesheet" media="all">
			<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
			<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
			<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
        </head>
        <body>

<aside class="menu-sidebar d-none d-lg-block">

    <?php include "nav.php"; ?>
</aside>
<div class="page--header pt--60 pb--60 text-center" style="background-image: url('<?=$image?>');" data-overlay="0.85">
            <div class="container">
                <div class="title">
                    <h2 class="h1 text-white">peeps for finding a new friend with the same hoby</h2>
                </div>
            </div>
        </div>
    
<!-- Main Content Start -->
                     <!-- PAGE CONTAINER-->
        <div class='page-container'>
            <!-- HEADER DESKTOP-->
            <header class='header-desktop'>
                <div class='section__content section__content--p30'>
                    <div class='container-fluid'>
                        <div class='header-wrap'>
                            <form class='form-header' action='' method='POST'>
                                <input class='au-input au-input--xl' type='text' name='search' placeholder='Search for datas &amp; reports...' />
                                <button class='au-btn--submit' type='submit'>
                                    <i class='zmdi zmdi-search'></i>
                                </button>
                            </form>
                            <div class='header-button'>
                                <div class='account-wrap'>
                                    <div class='account-item clearfix js-item-menu'>
                                        <div class='content'>
                                            <a class='js-acc-btn' href='#'>john doe</a>
                                        </div>
                                        <div class='account-dropdown js-dropdown'>
                                            <div class='info clearfix'>
                                                <div class='image'>
                                                    <a href='#'>
                                                        <img src='images/icon/avatar-01.jpg' alt='John Doe' />
                                                    </a>
                                                </div>
                                                <div class='content'>
                                                    <h5 class='name'>
                                                        <a href='#'>john doe</a>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class='account-dropdown__body'>
                                                <div class='account-dropdown__item'>
                                                    <a href='#'>
                                                        <i class='zmdi zmdi-settings'></i>Setting</a>
                                                </div>   
                                            <div class='account-dropdown__footer'>
                                                <a href='#'>
                                                    <i class='zmdi zmdi-power'></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class='main-content'>
                <div class='section__content section__content--p30'>
                    <div class='container-fluid'>
                        <div class='row'>
                            <div class='col-md-12'>
                                <?php include"page.php"; ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
    </div>
</body>
</html>