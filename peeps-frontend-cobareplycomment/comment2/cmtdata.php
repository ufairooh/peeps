<?php
// function filter_all($event){
//     $con= mysqli_connect("localhost", "root", "", "comment");
//     $eventSecure =strip_tags(htmlentities($event));
//     $eventSecure=mysqli_real_escape_string($con, $eventSecure);
//     return $eventSecure;
// }
//echo filter_all($string);
include ('includeIt.php');


    $id_post=$_POST['id_post'];
    $id_user=$_POST['id_user'];
    $content=filter_all($_POST['content']);
    $id_comment_replay=$_POST['id_comment_replay'];
    $query="INSERT INTO `comment` (`id_comment`, `id_post`, `id_user`, `content`, `date_posted`)
                 VALUES (NULL, '$id_post', '$id_user', '$content', CURRENT_TIMESTAMP)";


    $timestamp = date('Y-m-d G:i:s');
    //$id_comment_replay= $id_comment_replay + 1;
if (mysqli_query($con,$query)) {
   $query="SELECT * FROM comment";
   $sql=mysqli_query($con,$query);
   while ($row = mysqli_fetch_assoc($sql)) {
     $id_comment_replay = $row['id_replay'];
   //  echo "$id_comment_replay";
   }
   // $query_R="SELECT * FROM replay WHERE id_comment_replay='$id_comment_replay'";
   // $sql_R=mysqli_query($con,$query_R);
   // $ReplayCount=mysqli_num_rows($sql_R);
   echo '
   <div class="col-sm-12" style="min-height:40px;background-color:#E0E0E0;margin-top:5px;padding:0;">

    <div class="col-sm-12" style="margin:0;padding:auto;background-color:#C8C8C8;">
      <p>Commented By Rohan Layek , Date: '.$timestamp.'  </p>
    </div>

     <p style="color:black;padding:10px;margin:5px;">'.nl2br(strip_tags(htmlentities($_POST['content']))).'</p>

    <div class="col-sm-12" style="margin:0;padding:auto;background-color:#F5F5F5;">
      <p id="Replay" class="btn btn-primary btn-xs">Total Replays (0)</p>
     <p pid="'.$id_comment_replay.'" id="ReplayButt-'.$id_comment_replay.'" class="btn btn-primary btn-xs ReplayButt">Replay</p>

    <div id="ReplayViewer-'.$id_comment_replay.'" class="col-sm-12 ReplayViewer" style="margin:0;padding:auto;">  <!-- replay cmt -->

    </div>
    </div>
   </div>
   ';
}else {
   echo "failed";
}













?>
