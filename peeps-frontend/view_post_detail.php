<?php
require "header.php";
?>
<div class='main--content col-md-8 pb--60' data-trigger='stickyScroll'>
    <div class='main--content-inner drop--shadow'>
                            <!-- Post Item Start -->

                            <?php
                            $konek=new mysqli('localhost','root','','db');
                            if ($konek->connect_errno){
                                "Database Error".$konek->connect_error;
                            }
                            ?>

                            <?php
                                    $id = isset($_GET['id']) ? $_GET['id'] : '';
                                    $query = mysqli_query($konek, "SELECT *,UNIX_TIMESTAMP() - tanggal AS TimeSpent from post LEFT JOIN users on users.id_user = post.id_user where id_post='$id' order by id_post DESC");
                                    if (!$query) {
                                        printf("Error: %s\n", mysqli_error($konek));
                                        exit();
                                    }
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
                                        $comment_query = mysqli_query ($konek, "SELECT count(id_post) FROM `comment` where id_post='$id'") or die (mysqli_error());
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
                                            $comment_query = mysqli_query ($konek, "SELECT * ,UNIX_TIMESTAMP() - date_posted AS TimeSpent FROM comment LEFT JOIN users on users.id_user = comment.id_user where id_post = '$id' order by date_posted DESC") or die (mysqli_error());
                                            while ($comment_row=mysqli_fetch_array($comment_query)){
                                            $id_comment = $comment_row['id_comment'];
                                            $comment_by = $comment_row['username'];
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
                            <?php include 'form_add_comment.php'; ?>
                            <!-- Comment Form End -->
                        </div>
                    </div>
                    <!-- Main Content End -->
<?php
require "footer.php";
?>