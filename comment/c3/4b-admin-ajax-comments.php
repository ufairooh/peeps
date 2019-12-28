<?php
/* [INIT] */
session_start();

/* PROTECT THE ADMIN FUNCTIONS!
// E.G. CHECK IF ADMIN IS SIGNED IN
if (!isset($_SESSION['admin'])) {
  die("ERR");
}
*/

// LIBRARIES
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "2a-config.php";
require PATH_LIB . "2b-lib-comments.php";
$pdo = new Comments();

/* [HANDLE AJAX REQUESTS] */
switch ($_POST['req']) {
  /* [INVALID REQUEST] */
  default:
    echo "ERR";
    break;

  /* [EDIT COMMENT] */
  case "edit":
    echo $pdo->edit($_POST['comment_id'], $_POST['name'], $_POST['message']) ? "OK" : "ERR";
    break;

  /* [DELETE COMMENT] */
  case "del":
    echo $pdo->delete($_POST['comment_id']) ? "OK" : "ERR";
    break;
}
?>