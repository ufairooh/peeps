<?php
require 'connect.php';
$nama=$_GET['id'];
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

    <div class="logo">
                    <a href="index.html">
                        <h1>PEEPS
                        </h1>
                    </a>
                </div>
                <div class="menu-sidebar__content js-scrollbar1">
                    <?php $query1="SELECT * FROM users WHERE id_user =".$nama."";
                        $result1 = mysqli_query($konek, $query1);
                        if (!$result1) {
                            printf("Error: %s\n", mysqli_error($konek));
                            exit();
                        }
                        while ($row = mysqli_fetch_array($result1))
                        {
                            $id = $row['id_user']; 
                    ?>
                    <nav class="navbar-sidebar">
                         <ul class="list-unstyled navbar__list">
                         <li>Halo Admin <?php echo "".$row['nama']; ?></li>
                            <li><a href="tablePost.php<?php echo '?id='.$_SESSION['id']; ?>">Post</a></li>
        <li><a href="tableUser.php<?php echo '?id='.$_SESSION['id']; ?>">User</a></li>
		<li><a href="tableAdmin.php<?php echo '?id='.$_SESSION['id']; ?>">Admin</a></li>
                        </ul>
                    </nav>
                    <?php } ?>
                </div>
</aside>

    <div class='page-container'>
            <!-- HEADER DESKTOP-->
            <header class='header-desktop'>
                <div class='section__content section__content--p30'>
                    <div class='container-fluid'>
                        <div class='header-wrap'>
                            <form class='form-header' action='' method='POST'>
                                <input class='au-input au-input--xl' type='text' name='search' id='search' placeholder='Search for datas &amp; reports...' />
                                <button class='au-btn--submit' type='submit'>
                                    <i class='zmdi zmdi-search'></i>
                                </button>
                            </form>
                            <div class='header-button'>
                                <div class='account-wrap'>
                                    <div >
                                        <div class='content'>
                                            <?php 
                                $db->logout();
                                ?>
                               <form method="POST">
                                    <button type="submit" name="btnLogout" class="btn-link" style="margin-top: 45%;">Logout</button>
                                </form>
                                        </div>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
    <div class='main-content'>
                <div class='section__content section__content--p30'>
                    <div class='container-fluid'>
                        <div class='row'>
                            <div class='col-md-12'>
							
	
							