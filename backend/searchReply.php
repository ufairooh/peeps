<?php
include 'db.php';

if ($_SESSION['id'] == false && $_SESSION['username'] == false && $_SESSION['role'] == ""){
    header('location:./peepsloginusers.php');
}
if (isset($_POST['search'])) {
  require_once 'connect.php';
  $search = $_POST['search'];
  $query = mysqli_query($konek, "SELECT comment.commentdata, users.username, replay.replaydata, replay.replaytime, replay.id from replay LEFT JOIN users on users.id_user = replay.replayUserId JOIN comment on comment.id = replay.commentID WHERE username LIKE '%".$search."%'order by replay.id DESC");
  while ($row = mysqli_fetch_array($query)) {
	  $id = $row['id'];
 ?>
<tr>
                                                
                                                <td><?php
                                                echo"<p>".$row['commentdata']."</p>"
                                                ?></td>
                                                <td><?php
                                                echo"<p>".$row['username']."</p>"
                                                ?></td>
                                                <td><?php
                                                echo"<p>".$row['replaydata']."</p>"
                                                ?></td>
                                                <td><?php echo date('F d, Y - H:i:sa', $row['replaytime']);?>
                                                    
                                                </td>
                                                <td>
                                                <div class='table-data-feature'>
                                                
                                                        <button class='item' data-toggle='tooltip' data-placement='top' title='Delete'>
                                                            <a class="btn btn-light-green" href="proses_delete_replay.php<?php echo '?id='.$id; ?>" onclick="return confirm('Are you sure want to delete replay?')"><i class='zmdi zmdi-delete'></i></a>
                                                        </button>
                                                    </div>
                                                    </td>

                                            </tr>
<?php }
}?>