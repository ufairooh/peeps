<?php
include 'connect_comment.php';
if (isset($_POST['commentID'])) {
  $commentID=$_POST['commentID'];?>
  <?php include 'form_add_replay.php'; ?>

<?php
  $id = isset($_GET['id']) ? $_GET['id'] : '';

//  $con= mysqli_connect("localhost", "root", "", "comment");
  $query_R="SELECT * ,UNIX_TIMESTAMP() - replaytime AS TimeSpent FROM replay  join users on users.id_user=replay.replayUserId WHERE commentID='$commentID'";
  $sql_R=mysqli_query($konek,$query_R);

  if (mysqli_num_rows($sql_R)>0) {
    while ($row_R = mysqli_fetch_assoc($sql_R)) {
      $Rid= $row_R['id'];
      $replayUserId = $row_R['replayUserId'];
      $commentID = $row_R['commentID'];//****can featch usr info***
      $username = $row_R['username'];
      $replaydata = $row_R['replaydata'];
      $replytime = $row_R['replaytime'];
?>



<ul class="comment--items nav">
  <li>
      <!-- Comment Item Start -->
      <div class="comment--item mr--15 clearfix">
          <div class="img float--left" data-overlay="0.3" data-overlay-color="primary">
              <img src="img/comments-img/avatar-02.jpg" alt="">
          </div>

          <div class="info ov--h">
              <div class="header clearfix">
                  <div class="meta float--left">
                      <p class="fs--14 fw--700 text-darkest">
                          <a href="#"><?php echo $username ?></a>
                      </p>

                      <p>
                          <i class="mr--10 fa fa-clock-o"></i>
                          <span>
                            <?php
                              $days = floor($row_R['TimeSpent'] / (60 * 60 * 24));
                              $remainder = $row_R['TimeSpent'] % (60 * 60 * 24);
                              $hours = floor($remainder / (60 * 60));
                              $remainder = $remainder % (60 * 60);
                              $minutes = floor($remainder / 60);
                              $seconds = $remainder % 60;
                              if($days > 0)
                              echo date('F d, Y - H:i:sa', $row_R['replaytime']);
                              elseif($days == 0 && $hours == 0 && $minutes == 0)
                              echo "A few seconds ago";       
                              elseif($days == 0 && $hours == 0)
                              echo $minutes.' minutes ago';
                              elseif($days == 0)
                              echo $hours.' hours ago';
                            ?>
                          </span>
                      </p>
                  </div>
              </div>

              <div class="content pt--8 fs--14">
                  <p><?php echo nl2br($replaydata)?></p>
              </div>
          </div>
      </div>
      <!-- Comment Item End -->
  </li>
</ul>

<?php
     }
  }
}
?>