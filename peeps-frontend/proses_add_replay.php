<?php
include ('connect_comment.php');
    $idd=$_POST['idd'];
    $ReplayCmtData=filter_all($_POST['ReplayCmtData']);
    $replayUserId=$_POST['replayUserId'];
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
                        <p> '.$username.' </p>
                        <i class="mr--10 fa fa-clock-o"></i>
                        <span> '.$timestamp.'  </span>
                      </div>
                </div>
                <div class="content pt--8 fs--14">
                <p>'.nl2br(strip_tags(htmlentities($_POST['ReplayCmtData']))).'</p>
            </div>
            </div>
            
        </div>
        <!-- Comment Item End -->
    </li>
  </ul>
   ';
}else {
   echo "failed<br>$replayUserId";
}
?>