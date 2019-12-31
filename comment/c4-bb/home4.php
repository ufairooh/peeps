<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ==== Document Title ==== -->
    <title>Peeps</title>

    <!-- database dan session -->
    <?php include('dbconn.php'); ?>
    <?php include('session.php'); ?>
    
    <!-- ==== Document Meta ==== -->
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- ==== Favicon ==== -->
    <link rel="icon" href="favicon.png" type="image/png">

    <!-- ==== Google Font ==== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700%7CRoboto:300,400,400i,500,700">

    <!-- ==== Plugins Bundle ==== -->
    <link rel="stylesheet" href="css/plugins.min.css">
    
    <!-- ==== Main Stylesheet ==== -->
    <link rel="stylesheet" href="style.css">
    
    <!-- ==== Responsive Stylesheet ==== -->
    <link rel="stylesheet" href="css/responsive-style.css">
    
    <!-- ==== Color Scheme Stylesheet ==== -->
    <link rel="stylesheet" href="css/colors/color-1.css" id="changeColorScheme">
    
    <!-- ==== Custom Stylesheet ==== -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- ==== HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries ==== -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <!-- Preloader Start -->
    <div id="preloader">
        <div class="preloader--inner"></div>
    </div>
    <!-- Preloader End -->

    <!-- Wrapper Start -->
    <div class="">
        <!-- Header Section Start -->
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
                            <a href="index.html">
                                <img src="img/logo-white.png" class="normal" alt="">
                                <img src="img/logo-black.png" class="sticky" alt="">
                            </a>
                        </div>
                        <!-- Header Navbar Logo End -->
                    </div>

                    <div id="headerNav" class="navbar-collapse collapse float--right">
                        <!-- Header Nav Links Start -->
                        <ul class="header--nav-links style--1 nav ff--primary">
                            <li class="dropdown">
                                <a href="#">
                                    <span>Home</span>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#">
                                    <span>Hobies</span>
                                </a>
                            </li>

                            <!-- session username -->
                            <li>
                                <a href="logout.php" class="btn-link">
                                    <i class="fa mr--8 fa-user-o"></i>
                                    <span>
                                        <?php echo $member_row['username'];?>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <!-- Header Nav Links End -->
                    </div>
                </div>
            </div>
            <!-- Header Navbar End -->
        </header>
        <!-- Header Section End -->

        <!-- Page Header Start -->
        <div class="page--header pt--60 pb--60 text-center" style="background-image: url('<?=$image?>');" data-overlay="0.85">
            <div class="container">
                <div class="title">
                    <h2 class="h1 text-white">peeps for finding a new friend with the same hoby</h2>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Page Wrapper Start -->
        <section class="page--wrapper pt--80 pb--20">
            <div class="container">
                <div class="row">
                    <!-- Main Content Start -->
                    <div class="main--content col-md-8 pb--30" data-trigger="stickyScroll">
                        <div class="main--content-inner">
                            <!-- Post Item Start -->

                            <?php
                                    $id = $_GET['id'];   
                                    $query = mysqli_query($con, "SELECT *,UNIX_TIMESTAMP() - tanggal AS TimeSpent from post LEFT JOIN user on user.id_user = post.id_user where id_post='$id' order by id_post DESC")or die(mysqli_error());
                                    while($post_row=mysqli_fetch_array($query)){
                                    $upid = $post_row['id_user'];   
                                    $posted_by = $post_row['username'];
                                    ?>

                            <div class="post--item post--single pb--30">
                                <!-- Post Image Start -->
                                <div class="post--img">
                                    <a href="blog-details.html">
                                        <?php 
                                            echo "<img class='card-img-top' src= 'data:image/jpeg;base64,".base64_encode($post_row['gambar'])."' height ='378' width='800'/>";
                                        ?>
                                    </a>
                                </div>
                                <!-- Post Image End -->

                                <!-- Post Info Start -->
                                <div class="post--info">
                                        <!-- kodingan NAMPILIN POSTINGAN BY -->
                                    

                                    <!-- Post Meta Start -->
                                    <div class="post--meta">
                                        <ul class="nav">
                                            <li>
                                                <a href="#">
                                                    <i class="mr--8 fa fa-user-o"></i>
                                                    <span>Posted by: <?php echo $posted_by; ?></span>
                                                </a>
                                            </li>
                                            <li>
                                                <i class="mr--8 fa fa-calendar-o">
                                                </i>
                                                <span>
                                                    <?php               
                                                        $days = floor($post_row['TimeSpent'] / (60 * 60 * 24));
                                                        $remainder = $post_row['TimeSpent'] % (60 * 60 * 24);
                                                        $hours = floor($remainder / (60 * 60));
                                                        $remainder = $remainder % (60 * 60);
                                                        $minutes = floor($remainder / 60);
                                                        $seconds = $remainder % 60;
                                                        if($days > 0)
                                                        echo date('F d, Y - H:i:sa', $post_row['tanggal']);
                                                        elseif($days == 0 && $hours == 0 && $minutes == 0)
                                                        echo "A few seconds ago";       
                                                        elseif($days == 0 && $hours == 0)
                                                        echo $minutes.' minutes ago';
                                                    ?>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Post Meta End -->

                                    <!-- Post Title Start -->
                                    <div class="post--title mt--10">
                                        <h2 class="h2"><?php echo $post_row['judul']; ?></h2 >
                                    </div>
                                     <!-- Post Member Start -->
                                    <div class="post--title mt--10">
                                        <h3 class="h4">
                                            For <?php echo $post_row['member']; ?> Member
                                        </h3> 
                                    </div>
                                    <!-- Post Title End -->

                                    <!-- Post Content Start -->
                                    <div class="post--content text-darker mt--10">
                                    <p>
                                        <?php echo $post_row['deskripsi']; ?>
                                    </p>

                                       
                                    </div>
                                    <!-- Post Content End -->

                                </div>
                                <!-- Post Info End -->
                            </div>
                            <!-- Post Item End -->


                            <!-- Comment List Start -->
                            <div class="comment--list pt--40">
                                <h4 class="h4 pb--20">
                                    <?php 
                                        $comment_query = mysqli_query ($con, "SELECT count(id_post) FROM `comment` where id_post='$id'") or die (mysqli_error());
                                         while ($comment_row=mysqli_fetch_array($comment_query)){
                                            $comment_count = $comment_row['count(id_post)'];
                                    ?>
                                    <?php echo $comment_count; ?> Comments
                                    <?php
                                    }
                                    ?>
                                </h4>

                                <ul class="comment--items nav">
                                    <li>
                                        <!-- Comment Item Start -->
                                        <!-- LIHAT KOMEN -->
                                        <?php 
                                            $comment_query = mysqli_query ($con, "SELECT * ,UNIX_TIMESTAMP() - date_posted AS TimeSpent FROM comment LEFT JOIN user on user.id_user = comment.id_user where id_post = '$id' order by date_posted DESC") or die (mysqli_error());
                                            while ($comment_row=mysqli_fetch_array($comment_query)){
                                            $id_comment = $comment_row['id_comment'];
                                            $comment_by = $comment_row['firstname']." ".  $comment_row['lastname'];
                                        ?>
                                        <div class="comment--item mr--15 clearfix">
                                            <div class="img float--left" data-overlay="0.3" data-overlay-color="primary">
                                                <img src="img/comments-img/avatar-01.jpg" alt="">
                                            </div>
                                            <div class="info ov--h">
                                                <div class="header clearfix">
                                                    <div class="meta float--left">
                                                        <p class="fs--14 fw--700 text-darkest">
                                                            <a href="#">
                                                                <?php echo $comment_by; ?>
                                                            </a>
                                                        </p>

                                                        <p>
                                                            <i class="mr--10 fa fa-clock-o"></i>
                                                            <span>
                                                                <!-- TIME -->
                                                                <?php   
                                                                    $days = floor($comment_row['TimeSpent'] / (60 * 60 * 24));
                                                                    $remainder = $comment_row['TimeSpent'] % (60 * 60 * 24);
                                                                    $hours = floor($remainder / (60 * 60));
                                                                    $remainder = $remainder % (60 * 60);
                                                                    $minutes = floor($remainder / 60);
                                                                    $seconds = $remainder % 60;
                                                                    if($days > 0)
                                                                    echo date('F d, Y - H:i:sa', $comment_row['date_posted']);
                                                                    elseif($days == 0 && $hours == 0 && $minutes == 0)
                                                                    echo "A few seconds ago";       
                                                                    elseif($days == 0 && $hours == 0)
                                                                    echo $minutes.' minutes ago';
                                                                ?>
                                                            </span>
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="content pt--8 fs--14">
                                                    <p>
                                                     <?php echo $comment_row['content']; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                            <hr>
                                            &nbsp;
                                            <?php 
                                            if ($u_id = $id){
                                            ?>
                                            <?php }else{ ?>
                                                
                                            <?php
                                            } } ?>
                                        </div>
                                        <!-- Comment Item End -->
                                    </li>
                                </ul>
                            </div>
                            <!-- Comment List End -->

                            <!-- Comment Form Start -->
                            <?php
                            
                                if (isset($_POST['comment'])){
                                $comment_content = $_POST['comment_content'];
                                $id_post=$_POST['id'];
                                
                                mysqli_query($con, "insert into comment (content,date_posted,id_user,id_post) values ('$comment_content','".strtotime(date("Y-m-d h:i:sa"))."','$id_user','$id_post')") or die (mysqli_error());
                                ?>
								<script>
								window.location = 'home4.php<?php echo '?id='.$id; ?>';
								</script>

								<?php
								}
								?>

                            <div class="comment--form pb--30" data-form="validate">
                                <h4 class="h4 pb--15">Leave A Comment</h4>

                                <form method="post">
                                    <div class="row gutter--15">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <textarea name="comment_content" placeholder="Comment *" class="form-control" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 pt--10">
                                            <button class="btn btn-sm btn-primary fs--14" type="submit" name="comment">Post Comment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Comment Form End -->
                        </div>
                    </div>
                    <!-- Main Content End -->

                </div>
            </div>
        </section>
        <!-- Page Wrapper End -->

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

</body>
</html>