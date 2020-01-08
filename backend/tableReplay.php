<?php 
include 'db.php';

if ($_SESSION['id'] == false && $_SESSION['username'] == false && $_SESSION['role'] == ""){
    header('location:./peepsloginusers.php');
}

require "header.php";
if($_SESSION['role'] != ""){?>
<h3 class='title-5 m-b-35'>Replay</h3>
                                
                                <div class='table-responsive m-b-40'>
                                    <table class='table table-data3'>
                                        <thead>
                                            <tr>
                                                <th>Comment</th>
                                                <th>Comment By</th>
                                                <th>Replay</th>
                                                <th>Date Created</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tampils">
                                        <?php
                        $query="SELECT comment.commentdata, users.username, replay.replaydata, replay.replaytime, replay.id from replay LEFT JOIN users on users.id_user = replay.replayUserId JOIN comment on comment.id = replay.commentID order by replay.id DESC";
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