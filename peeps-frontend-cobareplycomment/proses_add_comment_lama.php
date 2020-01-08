
<?php
include 'connect.php';
                            
if (isset($_POST['comment'])){
$comment_content = $_POST['comment_content'];
$id_post=$_POST['id'];
$id_user = $_POST['user'];

mysqli_query($konek, "insert into comment (content,date_posted,id_user,id_post) values ('$comment_content','".strtotime(date("Y-m-d h:i:sa"))."','$id_user','$id_post')") or die (mysqli_error());
header("Location: view_post_detail.php" .'?id='. urlencode($_POST['id']));
}
?>