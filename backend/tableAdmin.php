<?php 
include 'db.php';

if ($_SESSION['id'] == false && $_SESSION['username'] == false && $_SESSION['role'] == ""){
    header('location:./peepsloginusers.php');
}

require "header.php";
if($_SESSION['role'] != ""){?>
<h3 class='title-5 m-b-35'>Admin</h3>
                                <div class='table-data__tool'>
                                    <div class='table-data__tool-right'>
                                        <a href='addAdmin.php'><button class='au-btn au-btn-icon au-btn--green au-btn--small'>
                                            <i class='zmdi zmdi-plus'></i>Input new admin</button>  </a>                                      
                                    </div>
                                </div>
                                <div class='table-responsive m-b-40'>
                                    <table class='table table-data3'>
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Gender</th>
												<th>hobi</th>
                                                <th>foto profil</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
                        $query="SELECT * from users where role='admin'";
                        $result = mysqli_query($konek, $query);
                        if (!$result) {
                            printf("Error: %s\n", mysqli_error($konek));
                            exit();
                        }
                        while ($row = mysqli_fetch_array($result))
                        {
                             
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
											<?php 
								}
								?>
                                        </tbody>
                                    </table>
                                </div>
								<?php	
}else{
	header("Location: ../peeps-frontend/index.php");
}?>