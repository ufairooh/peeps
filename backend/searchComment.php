<?php
include 'db.php';

if ($_SESSION['id'] == false && $_SESSION['username'] == false && $_SESSION['role'] == ""){
    header('location:./peepsloginusers.php');
}
if (isset($_POST['search'])) {
  require_once 'connect.php';
  $search = $_POST['search'];
  $query = mysqli_query($konek, "SELECT * from comment LEFT JOIN users on users.id_user = comment.usr_id JOIN post on post.id_post = comment.post_id WHERE judul LIKE '%".$search."%' OR username LIKE '%".$search."%'order by id DESC");
  while ($row = mysqli_fetch_array($query)) {
	  $id = $row['id_post']; 
 ?>
<tr>
                                                
                                                <td><?php
                                                echo"<p>".$row['judul']."</p>"
												?></td>
                                                <td><?php
                                                echo"<p>".$row['username']."</p>"
												?></td>
                                                <td><?php
                                                echo"<p>".$row['commentdata']."</p>"
												?></td>
                                                <td></td>
                                                <td>
												<div class='table-data-feature'>
												
                                                        <button class='item' data-toggle='tooltip' data-placement='top' title='Delete'>
                                                            <a class="btn btn-light-green" href="proses_delete_comment.php<?php echo '?id='.$id; ?>"><i class='zmdi zmdi-delete'></i></a>
                                                        </button>
                                                    </div>
													</td>

                                            </tr>
<?php }
}?>