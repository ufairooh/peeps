<?php
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $konek= mysqli_connect("localhost", "root", "", "db");
    $query="SELECT * ,UNIX_TIMESTAMP() - replaytime AS TimeSpent FROM replay JOIN comment on comment.usr_id = replay.replayUserId  join users on users.id_user=replay.replayUserId";
    $sql=mysqli_query($konek,$query);
    while ($row_R = mysqli_fetch_assoc($sql)) {
     $username = $row_R['username'];
     $replaydata = $row_R['replaydata'];
   }
?>
<div class="col-sm-12" style="min-height:40px;background-color:#E0E0E0;margin-top:5px;padding:0;">

       <div class="col-sm-12" style="margin:0;padding:auto;background-color:#C8C8C8;">
         <p>Commented By  <?php echo $username; ?>, 
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
          ?>  </p>
       </div>

        <p style="color:black;padding:10px;margin:5px;"><?php echo nl2br($replaydata)?></p>

       <div class="col-sm-12" style="margin:0;padding:auto;background-color:#F5F5F5;">
    </div>
</div>