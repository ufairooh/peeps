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
                                                <td>
												<div class='table-data-feature'>
												<?php if($row['id_user']==$_SESSION['id'])
                                            {
                                            ?>
                                                        <button class='item' data-toggle='tooltip' data-placement='top' title='Edit'>
                                                            <a class="btn btn-light-green" href="editPost.php<?php echo '?id='.$id; ?>"><i class='zmdi zmdi-edit'></i></a>
                                                        </button>
											<?php }?>
                                                        <button class='item' data-toggle='tooltip' data-placement='top' title='Delete'>
                                                            <a class="btn btn-light-green" href="proses_delete_post.php<?php echo '?id='.$id; ?>"><i class='zmdi zmdi-delete'></i></a>
                                                        </button>
                                                    </div>
													</td>

                                            </tr>
<?php }
}?>