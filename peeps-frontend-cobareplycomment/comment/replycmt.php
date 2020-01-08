<?php
include ('includeIt.php');
    $idd=$_POST['idd'];
    $ReplayCmtData=filter_all($_POST['ReplayCmtData']);
    $replayUserId=$_POST['replayUserId'];
    $con= mysqli_connect("localhost", "root", "", "comment-php-ajax");
    $query="INSERT INTO `replay` (`id_reply`,`id_user_replay`, `id_comment_replay`, `replay_data`, `replay_time`)
                   VALUES (NULL,'$replayUserId','$idd', '$ReplayCmtData', CURRENT_TIMESTAMP)";

    $commentID=$idd;
    $timestamp = date('Y-m-d G:i:s');
    $commentID= $commentID + 1;
if (mysqli_query($con,$query)) {
   echo '
   <div class="col-sm-12" style="min-height:40px;background-color:#E0E0E0;margin-top:5px;padding:0;">

    <div class="col-sm-12" style="margin:0;padding:auto;background-color:#C8C8C8;">
      <p>Commented By Rohan Layek , Date: '.$timestamp.'  </p>
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
