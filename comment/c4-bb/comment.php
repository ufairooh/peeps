<?php
include("dbconn.php");
include("session.php");


if (isset($_POST['comment'])){
$comment = $_POST['content'];

mysqli_query($con, "insert into comment (content,user_id,post_id) values ('$comment','$user_id','$content')") or die (mysql_error());

?>
<script>
window.location = 'home.php';
</script>

<?php
}
?>