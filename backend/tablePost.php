<?php 
include 'db.php';

if ($_SESSION['id'] == false && $_SESSION['username'] == false){
    header('location:loginusers.php');
}

require "header.php";
?>
<h3 class='title-5 m-b-35'>Post Data</h3>
                                <div class='table-data__tool'>
                                    <div class='table-data__tool-right'>
                                        <a href='postAdmin.php'><button class='au-btn au-btn-icon au-btn--green au-btn--small'>
                                            <i class='zmdi zmdi-plus'></i>Input new post</button>  </a>                                      
                                    </div>
                                </div>
                                <div class='table-responsive m-b-40'>
                                    <table class='table table-data3'>
                                        <thead>
                                            <tr>
                                                <th>author</th>
                                                <th>post</th>
                                                <th>Category</th>
                                                <th>Deskripsi</th>
												<th>gambar</th>
                                                <th>date created</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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
                                            <tr>
                                                
                                                <td><?php
                                                echo"<p>".$row['username']."</p>"
												?></td>
                                                <td><?php
                                                echo"<p>".$row['judul']."</p>"
												?></td>
                                                <td><?php
                                                echo"<p>".$row['category']."</p>"
												?></td>
                                                <td><?php
                                                echo"<p>".$row['deskripsi']."</p>"
												?></td>
												<td><?php 
                                                echo "<center><img class='card-img-top' src= 'data:image/jpeg;base64,".base64_encode($row['gambar'])."'/></center>";
                                            ?></td>
                                                <td><p><?php               
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
                                        ?></td>
                                                <td><div class='table-data-feature'>
                                                        <button class='item' data-toggle='tooltip' data-placement='top' title='Edit'>
                                                            <a class="btn btn-light-green" href="editPost.php<?php echo '?id='.$id; ?>"><i class='zmdi zmdi-edit'></i></a>
                                                        </button>
                                                        <button class='item' data-toggle='tooltip' data-placement='top' title='Delete'>
                                                            <a class="btn btn-light-green" href="proses_delete_post.php<?php echo '?id='.$id; ?>"><i class='zmdi zmdi-delete'></i></a>
                                                        </button>
                                                    </div></td>

                                            </tr>
											<?php 
								}
								?>
                                        </tbody>
                                    </table>
                                </div>