<?php

include '../includes/db_connect.php';

$datum = $_POST["date"];
$straatnaam = $_POST["straatnaam"];
$nummer = $_POST["nummer"];

$sql = mysqli_query($conn, "UPDATE nummer SET nietbeller=TRUE, Nbdatum='$datum' WHERE Straatnaam='$straatnaam' AND Nummer='$nummer'");
?>