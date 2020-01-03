<?php
require "header.php";
?> 

    <div class="main--content" data-trigger="stickyScroll">
        <!-- Section Title Start -->
                <div class="section--title text-center" style="margin-top: 0">
                    <div class="title lined">
                        <h2 class="h2">Activity</h2>
                    </div>
                </div>
        <!-- Section Title End -->
        <div class="main--content-inner drop--shadow">
            <!-- Filter Nav Start -->
            <div class="filter--nav pb--60 clearfix">
                <div class="filter--link float--right">
                    <div class="header--search style--1" data-form="validate">
                        <form action="#">
                            <input type="text" name="search" placeholder="Search here..." class="form-control form-sm" required  style="border-color: #e5e5e5">

                            <button type="submit" class="btn-link"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>

                <div class="filter--options float--left">
                    <label>
                        <span class="fs--14 ff--primary fw--500 text-darker">Show By :</span>

                        <select name="activityfilter" class="form-control form-sm" data-trigger="selectmenu">
                            <option value="everything" selected>— Everything —</option>
                            <option value="new-members">New Members</option>
                        </select>
                    </label>
                </div>
            </div>
            <!-- Filter Nav End -->

            <!-- Activity List Start -->
            <div class="activity--list">
                <!-- Activity Items Start -->
                <ul class="activity--items nav">
                    <?php
                        $page = 3;
                        $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
                        $mulai = ($page>1) ? ($page * $page) - $page : 0;
                        $result = mysqli_query($konek, "SELECT *,UNIX_TIMESTAMP() - tanggal AS TimeSpent from post LEFT JOIN users on users.id_user = post.id_user order by id_post DESC");
                        $total = mysqli_num_rows($result);
                        $pages = ceil($total/$page);            
                        $query = mysqli_query($konek, "SELECT *,UNIX_TIMESTAMP() - tanggal AS TimeSpent from post LEFT JOIN users on users.id_user = post.id_user  order by id_post DESC LIMIT $mulai, $page");
                        if (!$query) {
                            printf("Error: %s\n", mysqli_error($konek));
                            exit();
                        }
                        $no =$mulai+1;

                        while ($row = mysqli_fetch_assoc($query)) {
                        $id = $row['id_post']; 
                        ?>

                    <li>
                        <input type="text" hidden="true" value="<?php echo $no++; ?>"/>
                        <!-- Activity Item Start -->
                        <div class="activity--item">
                            <div class="activity--avatar">
                                <a href="member-activity-personal.html">
                                    <img src="img/activity-img/avatar-05.jpg" alt="">
                                </a>
                            </div>

                            <div class="activity--info fs--14">
                                <div class="activity--header">
                                    <p>
                                        <?php echo "".$row['username'].""; ?>
                                    </p>
                                </div>

                                <div class="activity--meta fs--12">
                                    <p>
                                        <i class="fa mr--8 fa-clock-o"></i>
                                        <?php               
                                            $days = floor($row['TimeSpent'] / (60 * 60 * 24));
                                            $remainder = $row['TimeSpent'] % (60 * 60 * 24);
                                            $hours = floor($remainder / (60 * 60));
                                            $remainder = $remainder % (60 * 60);
                                            $minutes = floor($remainder / 60);
                                            $seconds = $remainder % 60;
                                            if($days > 0)
                                            echo date('F d, Y - H:i:sa', $row['tanggal']);
                                            elseif($days == 0 && $hours == 0 && $minutes == 0)
                                            echo "A few seconds ago";       
                                            elseif($days == 0 && $hours == 0)
                                            echo $minutes.' minutes ago';
                                            elseif($days == 0)
                                            echo $hours.' hours ago';
                                        ?>
                                    </p>
                                </div>

                                <div class="activity--content">
                                    <div class="link--embed">
                                        <a href="view_post_detail.php<?php echo '?id='.$id; ?>">
                                        <div style="height: 100; width: :100;">
                                            <?php 
                                                echo "<center><img class='card-img-top' src= 'data:image/jpeg;base64,".base64_encode($row['gambar'])."' style='height: 100; weight:100;'/></center>";
                                            ?>
                                        </div>
                                        </a>

                                        <div class="link--info fs--12">
                                            <div class="link--title">
                                                <h4 class="h6">
                                                    <?php echo "".$row['judul'].""; ?>
                                                </h4>
                                            </div>
                                            <div class="link--desc">
                                                <p>
                                                    <?php echo "".$row['deskripsi'].""; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- Activity Item End -->
                    </li>
                    <?php 
                        }
                    ?>
                   </ul>
            </div>
            <!-- Activity List End -->
        </div>

        <!-- Load More Button Start -->
        <div class="load-more--btn pt--30 text-center">
            <?php for ($i=1; $i<=$pages ; $i++){ ?>
            <a href="?page=<?php echo $i; ?>" class="btn btn-animate"><?php echo $i; ?></a>
            <?php } ?>
        </div>
        <!-- Load More Button End -->
    </div>
    <!-- Main Content End -->

<?php
require "footer.php";
?>