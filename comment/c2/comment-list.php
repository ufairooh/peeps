<?php
require_once ("db.php");

$sql = "SELECT* FROM post AS p JOIN tbl_comment AS c ON p.id_post=c.id_post";

$result = mysqli_query($conn, $sql);
$record_set = array();
while ($row = mysqli_fetch_assoc($result)) {
    array_push($record_set, $row);
}
mysqli_free_result($result);

mysqli_close($conn);
echo json_encode($record_set);
?>