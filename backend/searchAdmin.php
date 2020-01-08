<?php
include 'db.php';

if ($_SESSION['id'] == false && $_SESSION['username'] == false && $_SESSION['role'] == ""){
    header('location:./peepsloginusers.php');
}
if (isset($_POST['search'])) {
  require_once 'connect.php';
  $search = $_POST['search'];
  $query = mysqli_query($konek, "SELECT * from users WHERE username LIKE '%".$search."%' OR nama LIKE '%".$search."%' OR email LIKE '%".$search."%'");
  while ($row = mysqli_fetch_array($query)) {
 ?>
<tr>
                                                
                                                <td><?php
                                                echo"<p>".$row['nama']."</p>"
												?></td>
                                                <td><?php
                                                echo"<p>".$row['username']."</p>"
												?></td>
                                                <td><?php
                                                echo"<p>".$row['email']."</p>"
												?></td>
												<td><?php
                                                echo"<p>".$row['gender']."</p>"
												?></td>
                                                <td><?php
                                                echo"<p>".$row['hobi']."</p>"
												?></td>
												<td><?php 
                                                echo "<center><img class='card-img-top' src= 'data:image/jpeg;base64,".base64_encode($row['foto'])."'/></center>";
                                            ?></td>
                                                <td>
												<div class='table-data-feature'>
												<?php if($row['id_user']==$_SESSION['id'])
                                            {
                                            ?>
                                                        <button class='item' data-toggle='tooltip' data-placement='top' title='Edit'>
                                                            <a class="btn btn-light-green" href="editAdmin.php<?php echo '?id='.$id; ?>"><i class='zmdi zmdi-edit'></i></a>
                                                        </button>
											<?php }?>
                                                        <button class='item' data-toggle='tooltip' data-placement='top' title='Delete'>
                                                            <a class="btn btn-light-green" href="proses_delete_user.php<?php echo '?id='.$row['id_user']; ?>"><i class='zmdi zmdi-delete'></i></a>
                                                        </button>
                                                    </div>
													</td>

                                            </tr>
<?php }
}?>