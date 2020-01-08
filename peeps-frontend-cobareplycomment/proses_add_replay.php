<?php
include ('connect_comment.php');
    $idd=$_POST['idd'];
    $ReplayCmtData=filter_all($_POST['ReplayCmtData']);
    $replayUserId=$_POST['replayUserId'];
    $konek= mysqli_connect("localhost", "root", "", "db");
    $query="INSERT INTO `replay` (`id`,`replayUserId`, `commentID`, `replaydata`, `replaytime`)
                   VALUES (NULL,'$replayUserId','$idd', '$ReplayCmtData', '".strtotime(date("Y-m-d h:i:sa"))."')";

    $commentID=$idd;
    $timestamp = date('Y-m-d G:i:s');
    $commentID= $commentID + 1;

if (mysqli_query($konek,$query)) {
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $query="SELECT * ,UNIX_TIMESTAMP() - replaytime AS TimeSpent FROM replay JOIN comment on comment.usr_id = replay.replayUserId  join users on users.id_user=replay.replayUserId";
    $sql=mysqli_query($konek,$query);
    while ($row = mysqli_fetch_assoc($sql)) {
     $username = $row['username'];
   }
   echo '
   <div class="col-sm-12" style="min-height:40px;background-color:#E0E0E0;margin-top:5px;padding:0;">

    <div class="col-sm-12" style="margin:0;padding:auto;background-color:#C8C8C8;">
      <p>Commented By '.$username.' , Date: '.$timestamp.'  </p>
    </div>

     <p style="color:black;padding:10px;margin:5px;">'.nl2br(strip_tags(htmlentities($_POST['ReplayCmtData']))).'</p>

    <div class="col-sm-12" style="margin:0;padding:auto;background-color:#F5F5F5;">
    </div>
   </div>
   ';
}else {
   echo "failed<br>$replayUserId";
}


?>
