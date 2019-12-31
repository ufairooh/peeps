<?php
$page=htmlspecialchars(@$_GET['page']);
switch ($page){
    case null:
        include 'page/beranda.php';
        break;
    case 'beranda':
        include 'page/beranda.php';
        break;
    case 'hobies':
        include 'page/hobies.php';
        break;
    case 'account':
        include 'page/account.php';
        break;
    case 'myaccount':
        include 'page/myaccount.php';
        break;
    default:
        include 'page/404.php';
}