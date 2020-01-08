<?php 
include 'db.php';

if ($_SESSION['id'] == false || strcmp($_SESSION['role'], 'user') == 0 ){
    header('location:../peeps-frontend/loginusers.php');
}

require "header.php";
if($_SESSION['role'] != ""){?>
<h3 class='title-5 m-b-35'>Comment</h3>
                                
                                <div class='table-responsive m-b-40'>
                                    <table class='table table-data3'>
                                        <thead>
                                            <tr>
                                                <th>post</th>
                                                <th>User</th>
                                                <th>Comment</th>
                                                <th>date created</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tampils">
										<?php
                        $query="SELECT * from comment LEFT JOIN users on users.id_user = comment.usr_id JOIN post on post.id_post = comment.post_id order by id DESC";
                        $result = mysqli_query($konek, $query);
                        if (!$result) {
                            printf("Error: %s\n", mysqli_error($konek));
                            exit();
                        }
                        while ($row = mysqli_fetch_array($result))
                        {
							$id = $row['id'];
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
                                                <td><?php echo date('F d, Y - H:i:sa', $row['timeOfCmt']);?>
                                                    
                                                </td>
                                                <td>
												<div class='table-data-feature'>
												
                                                        <button class='item' data-toggle='tooltip' data-placement='top' title='Delete'>
                                                            <a class="btn btn-light-green" href="proses_delete_comment.php<?php echo '?id='.$id; ?>"><i class='zmdi zmdi-delete' onclick="return confirm('Are you sure want to delete comment?')"></i></a>
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
								<script type="text/javascript">
    $(document).ready( function() {
      $('#search').on('keyup', function() {
        $.ajax({
          type: 'POST',
          url: 'searchComment.php',
          data: {
            search: $(this).val()
          },
          cache: false,
          success: function(data) {
            $('#tampils').html(data);
          }
        });
      });
    });
  </script>
								<?php	
}else{
	header("Location: ../peeps-frontend/index.php");
}?>