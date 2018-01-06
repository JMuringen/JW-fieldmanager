<?php

include '../includes/db_connect.php';

$gebiednr = $_POST["gebiednr"];
$nummer = $_POST["nummer"];
$straatcode = $_POST["straatcode"];
$straat = $_POST["straat"];
$taal = "Nederlands";

$sql = $conn->prepare("INSERT INTO nummer (Straatnaam, Nummer, Straatcode, Anderstalig) VALUES (?, ?, ?, ?)");
$sql->bind_param("ssss", $straat, $nummer, $straatcode, $taal);
$sql->execute();

$sql->close();
$conn->close();
?>
