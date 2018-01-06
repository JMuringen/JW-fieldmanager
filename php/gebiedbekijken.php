
<?php	
include '../includes/db_connect.php';

$gebiednr = $_POST['gebiednr'];

if(isset($gebiednr)) {
session_start();
$taal = $_SESSION['taal'];	
	

	
	
	

$stmts = $conn->prepare("SELECT (SELECT Qrcode FROM gebied WHERE Gebiednr='$gebiednr') AS qr, (SELECT Gebiednaam FROM buurt INNER JOIN gebied ON buurt.Gebiedcode=gebied.Gebiedcode WHERE Gebiednr='$gebiednr') AS streek, (SELECT Kaart FROM gebied WHERE Gebiednr='$gebiednr') AS Coord, COUNT(Nummer) AS Totaal, (SELECT COUNT(nummer) FROM straat INNER JOIN nummer ON straat.Straatcode=nummer.Straatcode  WHERE Gebiednr='$gebiednr' AND Nietbeller=TRUE) AS Nietbel, (SELECT COUNT(Nummer) FROM straat INNER JOIN nummer ON straat.Straatcode=nummer.Straatcode  WHERE Gebiednr='$gebiednr' AND Anderstalig!='$taal') AS Atalig FROM straat INNER JOIN nummer ON straat.Straatcode=nummer.Straatcode WHERE Gebiednr='$gebiednr'");
$stmts->execute();
$results = $stmts->get_result();
	
	
	
	
	
	
	
while ($rows = $results->fetch_object()) {



echo '<div class="gebiedinfo-overl unselectable">
	<div class="gebiedtitelstrook">
			<div class="gebiedinfotitelinf" id="'.$rows->Coord.'"><p>'.$rows->streek.' - Gebiednr '.$gebiednr.'</p></div><div class="gebiedinfotitelbr"><p>Laatst bewerkt 21 Jan 17</p></div><div class="gicancel"><img src="../img/cancell.png"/></div>
	</div>	
		<img class="qrcodes" id="'.$rows->qr.'" src="http://chart.apis.google.com/chart?cht=qr&chs=180x180&chl=http://www.google.com/maps/place/'.$rows->qr.'/"/>
			<div id="map-canvas"></div>
		
			<div class="info-b-links">
				<div class="infb pgeb">Print gebied</div>
				<div class="infb pkaa">Print kaart</div>
				<div class="infb pove">Print overzicht</div>
				<div class="infb pstr">Print straten</div>
				<div class="infb">gebied toewijzen</div>
				<div class="infb">gebied bewerken</div>
			</div>
			<div class="info-b-rechts">
				<div class="infbtit">Aantal straten </div>';
$stmt = $conn->prepare("SELECT straat.Straatnaam, straat.Straatnummers, COUNT(Nummer) AS Nummers, (SELECT COUNT(Nummer) FROM nummer WHERE Nietbeller=TRUE AND straat.Straatcode=nummer.Straatcode) AS Nietbel, (SELECT COUNT(Nummer) FROM nummer WHERE Anderstalig!='$taal' AND straat.Straatcode=nummer.Straatcode) AS Atalig FROM straat INNER JOIN nummer ON straat.Straatcode=nummer.Straatcode  WHERE Gebiednr='$gebiednr' GROUP BY straat.Straatcode");
$stmt->execute();

$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {

echo '<div class="infr-straat">
		<div class="infr-str">'.$row["Straatnaam"].'</div>
		<div class="infr-nr">'.$row["Straatnummers"].'</div>
		<div class="infr-nrs">'.$row["Nummers"].'</div>
		</div>';
}
$stmt->close();





echo '<div class="infr-nr inft">Totaal</div><div class="infr-nrs">'.$rows->Totaal.'</div>
				<div class="infr-nr ">Waarvan Anderstalig</div><div class="infr-nrs">'.$rows->Atalig.'</div>
				<div class="infr-nr ">Waarvan Nietbellers</div><div class="infr-nrs">'.$rows->Nietbel.'</div>
	</div></div>';
}
	
	$stmts->close();
	$conn->close();
}	
?>