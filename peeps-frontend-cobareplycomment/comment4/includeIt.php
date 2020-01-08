<?php
//fill all the details. localhost , DB user name , DB password , DB name...
$con= mysqli_connect("localhost", "root", "", "db");

function filter_all($event){
    $con= mysqli_connect("localhost", "root", "", "db");
    $eventSecure =strip_tags(htmlentities(htmlspecialchars($event)));
    $eventSecure=mysqli_real_escape_string($con, $eventSecure);
    return $eventSecure;
}

?>
