<?php
require 'connect.php';
$nama=$_GET['id'];
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
        <!-- Header Navbar Start -->
            <div class="header--navbar navbar bg-black" data-trigger="sticky">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#headerNav">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Header Navbar Logo Start -->
                        <div class="header--navbar-logo navbar-brand">
                            <a href="index.php">
                                <h2 style="color: #99cccc">PEEPS</h2>
                            </a>
                        </div>
                        <!-- Header Navbar Logo End -->
                    </div>

                    <div id="headerNav" class="navbar-collapse collapse float--right">
                        <!-- Header Nav Links Start -->
                        <ul class="header--nav-links style--1 nav ff--primary">
                            <li class="dropdown">
                                <a href="index.php">
                                    <span>Home</span>
                                </a>
                            </li>
                            <!-- session username -->
                            <li>
                                <a href="index_user.php<?php echo '?id='.$_SESSION['id']; ?>" class="btn-link">
                                    <i class="fa mr--8 fa-user-o"></i>
                                    <span>
                                        Profile
                                    </span>
                                </a>
                            </li>

                            <li>
                             <!-- DISINI KODINGAN LOGOUT -->
                               <?php 
                                $db->logout();
                                ?>
                               <form method="POST">
                                    <button type="submit" name="btnLogout" class="btn-link" style="margin-top: 45%;">Logout</button>
                                </form>
                            </li>
                        </ul>
                        <!-- Header Nav Links End -->
                    </div>
                </div>
            </div>
            <!-- Header Navbar End -->
    </header>


    <div class="page--header pt--60 pb--60 text-center" style="background-image: url('img/hardwood-1851071__340.jpg'); height: 300px;" data-overlay="0.85" >
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
        <div class="container">
                <!-- <img src="img/desai.jpg" style="height: 150px; width: 150px; border-radius: 50%;"> -->
            <div class="title">
                <?php 
                  echo "<center><img src= 'data:image/jpeg;base64,".base64_encode($row['foto'])."' style='height: 90px; width: 90px;border-radius: 50%;'/></center>";
                ?>
                
                <h2 class="h1 text-white"> Halo <?php echo "".$row['username'].""; ?></h2>
                <center>
                <h4  style="color: white;"><?php echo "".$row['nama']." | ".$row['gender']." | ".$row['hobi'].""; ?></h4>
                <h4 style="color: white;"><?php echo "".$row['email']."" ?></h4>
            </center>
        </div>
        <?php } ?>
    </div>
	</div>
    <div id="main-body">
    <section class="page--wrapper pt--80 pb--20 " style="margin-top: -30px;">
        <div class="container">
            <div class="row">