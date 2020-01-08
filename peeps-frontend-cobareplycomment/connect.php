<?php
$konek=new mysqli('localhost','root','','db');
if ($konek->connect_errno){
    "Database Error".$konek->connect_error;
}

function filter_all($event){
    $konek= mysqli_connect("localhost", "root", "", "db");
    $eventSecure =strip_tags(htmlentities(htmlspecialchars($event)));
    $eventSecure=mysqli_real_escape_string($konek, $eventSecure);
    return $eventSecure;
}

?>