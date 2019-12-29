<?php
$page=htmlspecialchars(@$_GET['page']);
switch ($page){
    case null:
        include 'page/beranda.php';
        break;
    case 'post_admin':
        include 'page/postAdmin.php';
        break;
	case 'table_post':
        include 'page/table_post.php';
        break;
    
    default:
        include 'page/404.php';
}