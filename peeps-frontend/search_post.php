<?php
include 'db.php';

if ($_SESSION['id'] == false && $_SESSION['username'] == false && $_SESSION['role'] == ""){
    header('location:./peepsloginusers.php');
}
if (isset($_POST['search'])) {
  require_once 'connect.php';
  $search = $_POST['search'];
  $query = mysqli_query($konek, "SELECT *,UNIX_TIMESTAMP() - tanggal AS TimeSpent from post LEFT JOIN users on users.id_user = post.id_user WHERE judul LIKE '%".$search."%' OR username LIKE '%".$search."%' OR category LIKE '%".$search."%' order by id_post DESC");
  while ($row = mysqli_fetch_array($query)) {
	  $id = $row['id_post']; 
 ?>

                    <li>
                        <input type="text" hidden="true" value="<?php echo $no++; ?>"/>
                        <!-- Activity Item Start -->
                        <div class="activity--item">
                            <div class="activity--avatar">
                                <a href="member-activity-personal.html">
                                    <?php 
                                    if ($row['foto'] == null){
                                        echo "<img src='img/activity-img/avatar-05.jpg' alt=''>";
                                    }
                                    else{
                                                echo "<img class='card-img-top' src= 'data:image/jpeg;base64,".base64_encode($row['foto'])."'/>";
                                    }?>
                                </a>
                            </div>

                            <div class="activity--info fs--14">
                                <div class="activity--header">
                                    <a href="index_user.php<?php echo '?id='.$row['id_user']; ?>"><p>
                                        <?php echo "".$row['username'].""; ?>
                                    </p></a>
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
                                            <div class="link--rel ff--primary text-uppercase">
                                                <p class="fa fa-folder-o"> [ <?php echo "".$row['category'].""; ?> ]</p>
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
                    }
                    ?>