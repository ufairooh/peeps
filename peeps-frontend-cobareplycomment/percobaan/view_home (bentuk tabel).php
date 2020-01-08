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
                <div class="filter--link float--left">
                    <h2 class="h4"><a href="members.html" class="btn-link">All Members : 30,000</a></h2>
                </div>

                <div class="filter--options float--right">
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
                        $query="SELECT *,UNIX_TIMESTAMP() - tanggal AS TimeSpent from post LEFT JOIN users on users.id_user = post.id_user order by id_post DESC";
                        $result = mysqli_query($konek, $query);
                        if (!$result) {
                            printf("Error: %s\n", mysqli_error($konek));
                            exit();
                        }
                        while ($row = mysqli_fetch_array($result))
                        {
                            $id = $row['id_post']; 
                    ?>
                    <li>
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
                                        <?php echo "".$row['tanggal'].""; ?>
                                    </p>
                                </div>

                                <div class="activity--content">
                                    <div class="link--embed">
                                        <table>
                                            <tr>
                                                <td>
                                                     <div class="img--embed">
                                                        <?php 
                                                            echo "<img class='card-img-top' src= 'data:image/jpeg;base64,".base64_encode($row['gambar'])."' style='height: 100; weight:100;'/>";
                                                        ?>
                                                    </div>
                                                </td>
                                                <td>
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
                                                </td>
                                            </tr>
                                        </table>
                                       


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
            <a href="#" class="btn btn-animate">
                <span>See More Activities<i class="fa ml--10 fa-caret-right"></i></span>
            </a>
        </div>
        <!-- Load More Button End -->
    </div>
    <!-- Main Content End -->

<?php
require "footer.php";
?>