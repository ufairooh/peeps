<?php
require ("SinglePage.php");

$homepage = new SinglePage();

$homepage -> setImageLink("https://www.thelocal.de/userdata/images/article/ae56fc05831d6ab26b82dc0840dab79182b8c0e70b44416c7228e4f9c8f45931.jpg");
$homepage -> setPageTitle("Ticket Reservation");
$homepage -> setPageSubtitle("Buy Ticket for Europe Trips!");
$homepage -> setContent(array("Where are we ?" => "We are at Reservation Page", "Writings" => "Reiseticket Reservationen"));
$homepage -> renderAll();