<?php

include '../connect.php';
                            
if (isset($_POST['comment'])){
$comment_content = $_POST['comment_content'];
$id_post=$_POST['id'];

mysqli_query($konek, "insert into comment (content,date_posted,id_user,id_post) values ('$comment_content','".strtotime(date("Y-m-d h:i:sa"))."',2,'$id_post')") or die (mysqli_error());
?>
<script>
window.location = '../page/post-detail.php';
</script>

<?php
}
?>