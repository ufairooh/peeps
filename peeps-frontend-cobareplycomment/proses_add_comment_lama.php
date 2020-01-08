<?php
include 'connect.php';
                            
if (isset($_POST['comment'])){
$comment_content = $_POST['comment_content'];
$id_post=$_POST['id'];
$id_user = $_POST['user'];

mysqli_query($konek, "insert into comment (commentdata,timeOfCmt,usr_id,post_id) values ('$comment_content','".strtotime(date("Y-m-d h:i:sa"))."','$id_user','$id_post')") or die('Error: ' . mysqli_error($konek));
header("Location: view_post_detail_3.php" .'?id='. urlencode($_POST['id']));
}
?>