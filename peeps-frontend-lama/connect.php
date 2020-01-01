<?php
$konek=new mysqli('localhost','root','','db');
if ($konek->connect_errno){
    "Database Error".$konek->connect_error;
}


?>