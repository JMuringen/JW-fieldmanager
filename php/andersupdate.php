<?php

include '../includes/db_connect.php';

$anders = $_POST["anders"];
$straatnaam = $_POST["straatnaam"];
$nummer = $_POST["nummer"];

$sql = mysqli_query($conn, "UPDATE Nummer SET Anders='$anders' WHERE Straatnaam='$straatnaam' AND Nummer='$nummer'");
?>