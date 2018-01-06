<?php

include '../includes/db_connect.php';

$taal = $_POST["taal"];
$straatnaam = $_POST["straatnaam"];
$nummer = $_POST["nummer"];

$sql = mysqli_query($conn, "UPDATE nummer SET Anderstalig='$taal' WHERE Straatnaam='$straatnaam' AND Nummer='$nummer'");
?>