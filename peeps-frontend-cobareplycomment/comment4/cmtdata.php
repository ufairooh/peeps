<?php
// function filter_all($event){
//     $con= mysqli_connect("localhost", "root", "", "comment");
//     $eventSecure =strip_tags(htmlentities($event));
//     $eventSecure=mysqli_real_escape_string($con, $eventSecure);
//     return $eventSecure;
// }
//echo filter_all($string);
include ('includeIt.php');


    $post_id=$_POST['post_id'];
    $usr_id=$_POST['usr_id'];
    $commentdata=filter_all($_POST['CommentData']);
    $commentID=$_POST['commentID'];
    $query="INSERT INTO `cmt_all` (`id`, `post_id`, `usr_id`, `commentdata`, `timeOfCmt`)
                 VALUES (NULL, '$post_id', '$usr_id', '$commentdata', '".strtotime(date("Y-m-d h:i:sa"))."')";

    //$commentID= $commentID + 1;
if (mysqli_query($con,$query)) {
   $query="SELECT * ,UNIX_TIMESTAMP() - timeOfCmt AS TimeSpent FROM cmt_all";
   $sql=mysqli_query($con,$query);
   while ($row = mysqli_fetch_assoc($sql)) {
     $commentID = $row['id'];
   //  echo "$commentID";
   ?>

   <div class="col-sm-12" style="min-height:40px;background-color:#E0E0E0;margin-top:5px;padding:0;">

    <div class="col-sm-12" style="margin:0;padding:auto;background-color:#C8C8C8;">
      <p>Commented By Rohan Layek , Date: 
      <?php
              $days = floor($row['TimeSpent'] / (60 * 60 * 24));
              $remainder = $row['TimeSpent'] % (60 * 60 * 24);
              $hours = floor($remainder / (60 * 60));
              $remainder = $remainder % (60 * 60);
              $minutes = floor($remainder / 60);
              $seconds = $remainder % 60;
              if($days > 0)
              echo date('F d, Y - H:i:sa', $row['timeOfCmt']);
              elseif($days == 0 && $hours == 0 && $minutes == 0)
              echo "A few seconds ago";       
              elseif($days == 0 && $hours == 0)
              echo $minutes.' minutes ago';
          ?>   </p>
    </div>

     <p style="color:black;padding:10px;margin:5px;"><?php echo nl2br(strip_tags(htmlentities($_POST['CommentData']))) ?></p>

    <div class="col-sm-12" style="margin:0;padding:auto;background-color:#F5F5F5;">
      <p id="Replay" class="btn btn-primary btn-xs">Total Replays (0)</p>
     <p pid="'.$commentID.'" id="ReplayButt-'.$commentID.'" class="btn btn-primary btn-xs ReplayButt">Replay</p>

    <div id="ReplayViewer-'.$commentID.'" class="col-sm-12 ReplayViewer" style="margin:0;padding:auto;">  <!-- replay cmt -->

    </div>
    </div>
   </div>
   <?php
     }
  }else {
   echo "failed";
}
?>
