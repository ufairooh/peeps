<?php
include ('includeIt.php');
    $idd=$_POST['idd'];
    $ReplayCmtData=filter_all($_POST['ReplayCmtData']);
    $id_user_replay=$_POST['id_user_replay'];
    $con= mysqli_connect("localhost", "root", "", "db");
    $query="INSERT INTO `replay` (`id_replay`,`id_user_replay`, `id_comment_replay`, `replay_data`, `replay_time`)
                   VALUES (NULL,'$id_user_replay','$idd', '$ReplayCmtData', CURRENT_TIMESTAMP)";

    $id_comment_replay=$idd;
    $timestamp = date('Y-m-d G:i:s');
    $id_comment_replay= $id_comment_replay + 1;
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
   echo "failed<br>$id_user_replay";
}









?>
