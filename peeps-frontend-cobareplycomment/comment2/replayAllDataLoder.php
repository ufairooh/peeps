
<?php
include ('includeIt.php');
if (isset($_POST['id_comment_replay'])) {
  $id_comment_replay=$_POST['id_comment_replay'];?>
  <div class="form-group" style="overflow:hidden;">
    <label for="comment">Comment:</label>
    <textarea id="ReplayCmt-<?=$id_comment_replay?>" class="form-control ReplayCmt" rows="2" style="max-width:100%;"></textarea>
    <div class="col-sm-12" style="margin:2px;" id="plsTypecmt-<?=$id_comment_replay?>"></div>
    <button pid="<?=$id_comment_replay?>" id="ReplayCmtButt-<?=$id_comment_replay?>" type="submit" class="btn btn-warning ReplayCmtButt">comment</button>
  </div>

<?php

//  $con= mysqli_connect("localhost", "root", "", "comment");
  $query_R="SELECT * FROM replay WHERE id_comment_replay='$id_comment_replay'";
  $sql_R=mysqli_query($con,$query_R);

  if (mysqli_num_rows($sql_R)>0) {
    while ($row_R = mysqli_fetch_assoc($sql_R)) {
      $Rid= $row_R['id_replay'];
      $id_user_replay = $row_R['id_user_replay'];
      $id_comment_replay = $row_R['id_comment_replay'];//****can featch usr info***
      $replay_data = $row_R['replay_data'];
      $reply_time = $row_R['replay_time'];
      echo '
      <div class="col-sm-12" style="min-height:40px;background-color:#E0E0E0;margin-top:5px;padding:0;">

       <div class="col-sm-12" style="margin:0;padding:auto;background-color:#C8C8C8;">
         <p>Commented By Rohan Layek , Date: '.$reply_time.'  </p>
       </div>

        <p style="color:black;padding:10px;margin:5px;">'.nl2br($replay_data).'</p>

       <div class="col-sm-12" style="margin:0;padding:auto;background-color:#F5F5F5;">
       </div>
      </div>
      ';
     }
  }
}
?>
