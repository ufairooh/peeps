<?php
$page=htmlspecialchars(@$_GET['page']);
switch ($page){
    case null:
        include 'page/beranda.php';
        break;
    case 'beranda':
        include 'page/beranda.php';
        break;
    case 'lomba':
        include 'page/lomba.php';
        break;
    case 'peserta':
        include 'page/peserta.php';
        break;
    case 'kriteria':
        include 'page/kriteria.php';
        break;
    case 'subkriteria':
        include 'page/subkriteria.php';
        break;
    case 'bobot':
        include 'page/bobot.php';
        break;
    case 'penilaian':
        include 'page/nilai.php';
        break;
    case 'hasil':
        include 'page/hasil.php';
        break;
    case 'tambahbobot':
        include 'page/tambahbobot.php';
        break;
	case 'akun':
        include 'page/akun.php';
        break;
    default:
        include 'page/404.php';
}