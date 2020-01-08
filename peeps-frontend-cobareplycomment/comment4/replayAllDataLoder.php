
<?php
include ('includeIt.php');
if (isset($_POST['commentID'])) {
  $commentID=$_POST['commentID'];?>
  <div class="form-group" style="overflow:hidden;">
    <label for="comment">Comment:</label>
    <textarea id="ReplayCmt-<?=$commentID?>" class="form-control ReplayCmt" rows="2" style="max-width:100%;"></textarea>
    <div class="col-sm-12" style="margin:2px;" id="plsTypecmt-<?=$commentID?>"></div>
    <button pid="<?=$commentID?>" id="ReplayCmtButt-<?=$commentID?>" type="submit" class="btn btn-warning ReplayCmtButt">comment</button>
  </div>

<?php

//  $con= mysqli_connect("localhost", "root", "", "comment");
  $query_R="SELECT * ,UNIX_TIMESTAMP() - replaytime AS TimeSpent FROM replay WHERE commentID='$commentID'";
  $sql_R=mysqli_query($con,$query_R);

  if (mysqli_num_rows($sql_R)>0) {
    while ($row_R = mysqli_fetch_assoc($sql_R)) {
      $Rid= $row_R['id'];
      $replayUserId = $row_R['replayUserId'];
      $commentID = $row_R['commentID'];//****can featch usr info***
      $replaydata = $row_R['replaydata'];
      $replytime = $row_R['replaytime'];
?>

      <div class="col-sm-12" style="min-height:40px;background-color:#E0E0E0;margin-top:5px;padding:0;">

       <div class="col-sm-12" style="margin:0;padding:auto;background-color:#C8C8C8;">
         <p>Commented By Rohan Layek , 
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

<?php
     }
  }
}
?>