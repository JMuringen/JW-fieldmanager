<?php

include '../includes/db_connect.php';

$buurt = $_POST["buurt"];
$gebiednr = $_POST["gebiednr"];
$cor = $_POST["cor"];
$coord = $_POST["coord"];


$zoek = mysqli_query($conn, "SELECT * FROM buurt WHERE Gebiednaam='$buurt'");
while ($row=mysqli_fetch_object($zoek)) {
    $gebiedcode = $row->Gebiedcode;
}


$sql = mysqli_query($conn, "INSERT INTO gebied VALUES('$gebiedcode', '$gebiednr', '$cor', '$coord', NULL)");


?>




