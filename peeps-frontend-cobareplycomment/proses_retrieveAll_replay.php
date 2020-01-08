
<?php
include ('connect_comment.php');

if (isset($_POST['commentID'])) {
  $commentID=$_POST['commentID'];?>
  <?php include 'form_add_replay.php'; ?>

<?php
  $id = isset($_GET['id']) ? $_GET['id'] : '';

//  $con= mysqli_connect("localhost", "root", "", "comment");
  $query_R="SELECT * ,UNIX_TIMESTAMP() - replaytime AS TimeSpent FROM replay JOIN comment on comment.usr_id = replay.replayUserId  join users on users.id_user=replay.replayUserId WHERE commentID='$commentID'";
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

    <?php include 'proses_retrieve_replay.php'; ?>

<?php
     }
  }
}
?>