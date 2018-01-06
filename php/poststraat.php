<?php

include '../includes/db_connect.php';

$buurt = $_POST["buurt"];
$gebiednr = $_POST["gebiednr"];
$totenmet = $_POST["straatnummers"];
$straatcode = $_POST["straatcode"];
$straat = $_POST["straat"];


$stmt = $conn->prepare('SELECT Gebiedcode FROM buurt WHERE Gebiednaam = ?');
$stmt->bind_param('s', $buurt);
$stmt->execute();

$result = $stmt->get_result();
while ($row = $result->fetch_object()) {
    $gebiedcode = $row->Gebiedcode;
}

$sql = $conn->prepare("INSERT INTO straat (Straatcode, Straatnummers, Gebiedcode, Straatnaam, Gebiednr) VALUES (?, ?, ?, ?, ?)");
$sql->bind_param("sssss", $straatcode, $totenmet, $gebiedcode, $straat, $gebiednr);
$sql->execute();

$stmt->close();
$sql->close();
$conn->close();
?>


								