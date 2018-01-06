<?php 

$gebiednr = $_POST['gebiednr'];

if(isset($gebiednr)){

session_start();
$taal = $_SESSION['taal'];	
$taalcode = $_SESSION['taalcode'];
include '../includes/db_connect.php';
echo'<html>
<head>	
<meta charset="UTF-8">

<link rel="stylesheet" type="text/css" href="/css/gebiedprint.css"><!--algemene style-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script><!--jquery library style-->
<script type="text/javascript" src="/js/ordengebied.js"></script><!--jquery voor de markering van de map style-->
<script type="text/javascript" src="/js/polygon.min.js"></script><!--jquery voor de markering van de map style-->
<script src="/js/jquery.js"></script>
<script src="/js/jquery.PrintArea.js"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyBk-zgNl5zyJKv5Q4z--YlbsEn89mvOwX4&libraries=places" type="text/javascript"></script><!--jquery google maps-->
</head>
<body>
<div class="overlay">
<div class="printcong">
		<div class="gegcon">
			<div class="straatcon">
				<div class="straatturn">';

if($taal != "Nederlands") {
	
$stmts = $conn->prepare("SELECT (SELECT Qrcode FROM gebied WHERE Gebiednr='$gebiednr') AS qr, (SELECT Gebiednaam FROM buurt INNER JOIN gebied ON buurt.Gebiedcode=gebied.Gebiedcode WHERE Gebiednr='$gebiednr') AS streek, (SELECT Kaart FROM gebied WHERE Gebiednr='$gebiednr') AS Coord, COUNT(Nummer) AS Totaal FROM straat INNER JOIN nummer ON straat.Straatcode=nummer.Straatcode WHERE Gebiednr='$gebiednr' AND Anderstalig='$taal' AND Nietbeller=FALSE");
//eenmalige informatie + totaal opzoeken

$stmt = $conn->prepare("SELECT straat.Straatnaam, straat.Straatnummers, COUNT(Nummer) AS Nummers, (SELECT COUNT(Nummer) FROM nummer WHERE Nietbeller=TRUE AND straat.Straatcode=nummer.Straatcode) AS Nietbel, (SELECT COUNT(Nummer) FROM nummer WHERE Anderstalig!='Nederlands' AND straat.Straatcode=nummer.Straatcode) AS Atalig FROM straat INNER JOIN nummer ON straat.Straatcode=nummer.Straatcode  WHERE Gebiednr='$gebiednr' AND Anderstalig='$taal' AND Nietbeller=FALSE GROUP BY straat.Straatcode"); //straten opzoeken + de nummers

$stmta = $conn->prepare("SELECT * FROM bewerkingen WHERE Bewerkingscode = (SELECT MAX(Bewerkingscode) FROM bewerkingen WHERE Gebiednr='$gebiednr' AND Taalcode='$taalcode')"); //straten opzoeken + de nummers	
	
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {

						echo'
					<div class="straatb">
					<div class="straatv">
							<p class="skleur">'.$row["Straatnaam"].'</p>
						</div>
						<div class="straatv">
							<div class="nrt">
								<p>'.$row["Straatnummers"].'</p>
							</div>
							<div class="nrvt">
								<p>'.$row["Nummers"].'</p>
							</div>
						</div>
					</div>';				
}
	
$stmt->close();					

$stmta->execute();
$resulta = $stmta->get_result();

  
if($resulta->num_rows > 0) {
   
       while ($row = $resulta->fetch_assoc()) {
	
$bdate = strtotime($row["Bdatum"]);
$edate = strtotime($row["Edatum"]);
	
		echo'<div class="printcong">
				<div class="aturn">
					<div class="astrookt">
						<div class="ablok1"><p>BEWERKING</p></div><div class="ablok2"><p>D.D. '.date("d.m.y", $edate).' ('.date("d.m.y", $bdate).')</p></div><div class="ablok3"><p>Gebiednr. '.$gebiednr.'</p></div>
					</div>
					<div class="astrookc">
						<p>Na bewerking graag de datum in de kolom "Datum bewerkt" noteren en het dagdeel omcirkelen. Tevens het totaal overgeblevenen afwezigen noteren in de juiste kolom.</p>
					</div>
					<div class="astrook grays">
						<div class="adateb"><p class="atitle">Datum bewerkt</p></div><div class="adate"><p class="atitle">Dagdeel</p></div><div class="addv"><p class="atitle">MA</p></div><div class="addv"><p class="atitle">DI</p></div><div class="addv"><p class="atitle">WO</p></div><div class="addv"><p class="atitle">DO</p></div><div class="addv"><p class="atitle">VR</p></div><div class="addv"><p class="atitle">ZA</p></div><div class="addv"><p class="atitle">ZO</p></div>
					</div>
					<div class="astrook">
						<div class="anr"><p>1</p></div><div class="adate"><p></p></div><div class="adate"><p>Ochtend / Middag / Avond</p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div>
					</div>
					<div class="astrook">
						<div class="anr"><p>2</p></div><div class="adate"><p></p></div><div class="adate"><p>Ochtend / Middag / Avond</p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div>
					</div>
					<div class="astrook">
						<div class="anr"><p>3</p></div><div class="adate"><p></p></div><div class="adate"><p>Ochtend / Middag / Avond</p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div>
					</div>
					<div class="astrook">
						<div class="anr"><p>4</p></div><div class="adate"><p></p></div><div class="adate"><p>Ochtend / Middag / Avond</p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div>
					</div>
					<div class="astrook">
						<div class="anr"><p>5</p></div><div class="adate"><p></p></div><div class="adate"><p>Ochtend / Middag / Avond</p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div>
					</div>
					<div class="astrook">
						<div class="anr"><p>6</p></div><div class="adate"><p></p></div><div class="adate"><p>Ochtend / Middag / Avond</p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div>
					</div>
					<div class="astrook">
						<div class="anr"><p>7</p></div><div class="adate"><p></p></div><div class="adate"><p>Ochtend / Middag / Avond</p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div>
					</div>
					
					<div class="anstrook">
						<div class="aop"><p><b>Opmerkingen:</b><br>(bijv. nieuw NBA)</p></div><div class="aopmerkingen"></div>
					</div>
				</div>
			</div>';

}
    
} else {
 
		echo'<div class="printcong">
				<div class="aturn">
					<div class="astrookt">
						<div class="ablok1"><p>BEWERKING</p></div><div class="ablok2"><p>D.D.</p></div><div class="ablok3"><p>Gebiednr. '.$gebiednr.'</p></div>
					</div>
					<div class="astrookc">
						<p>Na bewerking graag de datum in de kolom "Datum bewerkt" noteren en het dagdeel omcirkelen. Tevens het totaal overgeblevenen afwezigen noteren in de juiste kolom.</p>
					</div>
					<div class="astrook grays">
						<div class="adateb"><p class="atitle">Datum bewerkt</p></div><div class="adate"><p class="atitle">Dagdeel</p></div><div class="addv"><p class="atitle">MA</p></div><div class="addv"><p class="atitle">DI</p></div><div class="addv"><p class="atitle">WO</p></div><div class="addv"><p class="atitle">DO</p></div><div class="addv"><p class="atitle">VR</p></div><div class="addv"><p class="atitle">ZA</p></div><div class="addv"><p class="atitle">ZO</p></div>
					</div>
					<div class="astrook">
						<div class="anr"><p>1</p></div><div class="adate"><p></p></div><div class="adate"><p>Ochtend / Middag / Avond</p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div>
					</div>
					<div class="astrook">
						<div class="anr"><p>2</p></div><div class="adate"><p></p></div><div class="adate"><p>Ochtend / Middag / Avond</p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div>
					</div>
					<div class="astrook">
						<div class="anr"><p>3</p></div><div class="adate"><p></p></div><div class="adate"><p>Ochtend / Middag / Avond</p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div>
					</div>
					<div class="astrook">
						<div class="anr"><p>4</p></div><div class="adate"><p></p></div><div class="adate"><p>Ochtend / Middag / Avond</p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div>
					</div>
					<div class="astrook">
						<div class="anr"><p>5</p></div><div class="adate"><p></p></div><div class="adate"><p>Ochtend / Middag / Avond</p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div>
					</div>
					<div class="astrook">
						<div class="anr"><p>6</p></div><div class="adate"><p></p></div><div class="adate"><p>Ochtend / Middag / Avond</p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div>
					</div>
					<div class="astrook">
						<div class="anr"><p>7</p></div><div class="adate"><p></p></div><div class="adate"><p>Ochtend / Middag / Avond</p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div>
					</div>
					
					<div class="anstrook">
						<div class="aop"><p><b>Opmerkingen:</b><br>(bijv. nieuw NBA)</p></div><div class="aopmerkingen"></div>
					</div>
				</div>
			</div>';


}	
	



$stmta->close();	
	
$stmts->execute();
$results = $stmts->get_result();
while ($rows = $results->fetch_object()) {
	
	
	
		echo'</div>
			</div><div class="strtotaal" >
				<div class="totalturn">
					<div class="straatv">
						<div class="nrt">
							<p class="skleur">Totaal</p>
						</div><div class="nrvt">
							<p>'.$rows->Totaal.'</p>
						</div>
					</div>		
				</div>
			</div>
		</div>
		<div class="gkinfo">
			<div class="gkinfoturn">
				<div class="infognr "><p>Gn. '.$gebiednr.'</p></div>
				<div class="infobuurt"><p>'.$rows->streek.'</p></div>
				<div class="infocou"><p>'.$taalcode.'</p></div>
			</div>
		</div>
		<div class="mapcon" id="'.$rows->Coord.'">
			<img class="qrcodesgk" id="'.$rows->qr.'" src="http://chart.apis.google.com/chart?cht=qr&chs=180x180&chl=http://www.google.com/maps/place/'.$rows->qr.'/"/>
			<div class="mapturn" >
			<div id="map-canvas"></div>
		</div>
	</div>
</div>';	

}

$stmts->close();
	
	
	
	

	
$stmtl = $conn->prepare("SELECT straat.Straatnaam, straat.Straatnummers, COUNT(Nummer) AS Nummers, straat.Straatcode, (SELECT Gebiednaam FROM buurt INNER JOIN gebied ON buurt.Gebiedcode=gebied.Gebiedcode WHERE Gebiednr='$gebiednr') AS streek, (SELECT COUNT(Nummer) FROM nummer WHERE Nietbeller=TRUE AND straat.Straatcode=nummer.Straatcode) AS Nietbel, (SELECT COUNT(Nummer) FROM nummer WHERE Anderstalig!='Nederlands' AND straat.Straatcode=nummer.Straatcode) AS Atalig FROM straat INNER JOIN nummer ON straat.Straatcode=nummer.Straatcode  WHERE Gebiednr='$gebiednr' AND Anderstalig='$taal' AND Nietbeller=FALSE GROUP BY straat.Straatcode"); //straten opzoeken + de nummers



$stmtl->execute();
$resultl = $stmtl->get_result();
while ($rows = $resultl->fetch_assoc()) {
	
$straatcode = $rows['Straatcode'];
$straatnaam = $rows['Straatnaam'];
$straatnrs = $rows['Straatnummers'];
$streek = $rows['streek'];


	
$stmtn = $conn->prepare("SELECT Nummer, Nietbeller, Anderstalig, Aanwezig, (SELECT COUNT(Nummer) FROM nummer WHERE nummer.Straatcode = '$straatcode' AND Anderstalig='$taal' AND Nietbeller=FALSE) AS telling FROM nummer WHERE nummer.Straatcode = '$straatcode' AND Anderstalig='$taal' AND Nietbeller=FALSE ORDER BY Nummer * 1 ASC"); //straten opzoeken + de nummers
$stmtn->execute();
$resultn = $stmtn->get_result();

$i = 1;
$p = 1;
$num_rows = $resultn->num_rows;
$totaalnrs = $num_rows/60;
while ($row = $resultn->fetch_assoc()) {

if ($i == 1) { // <-- If larger than 60 then do this statement
		echo'<div class="printcon" id="'.$straatcode.'"><div class="lijstinfo"><div class="lijstva"><p>LIJST VAN AFWEZIGEN</p></div><div class="gtaal"><p>'.$taalcode.'</p></div><div class="lijst r1"><p class="pleft">Straat</p><p class="pcen pstraatnaam">'.$straatnaam.'</p><p class="pright pnrs">P'.$p.'/'.(ceil($totaalnrs)).'. Nrs: '.$straatnrs.'</p></div><div class="lijst r2"><p class="pleft">Plaats</p><p class="pcen pgebiednaam">'.$streek.'</p><p class="pright gnr">Geb. nr. '.$gebiednr.'</p></div><div class="lijst r3"><p>Aanwezigen doorhalen | Taal &amp; NB + datum + dagdeel (o, m of a) noteren | printdat: '.date("d-m-y").'</p></div><div class="printkop"><div class="huisnrtitel"><p>Huisnummers</p></div><div class="datums"><p>Datum</p></div><div class="dagdeel"><p>DD</p></div></div></div><div class="allprint">';	
		$p++;
}

if($row['Aanwezig'] == TRUE) {
	echo'<div class="printnummer">
			<p class="strikethrough">'.$row['Nummer'].'</p>
		</div>';
} else {
	echo'<div class="printnummer">
			<p>'.$row['Nummer'].'</p>
		</div>';
}

if($i == 60 || $i == $row['telling']){
	echo'</div><div class="datumlijst"></div><div class="oma"><div class="omablock"></div></div><div class="lijst td"><p class="terugdatum">Verloopdatum 22-05-2017</p></div></div>'; 
	$i = 1;
} else {
	$i++;
}	


        
	       
    
	
	
}
	
}

$stmtn->close();
$stmtl->close();
$conn->close();	
	
} else {
	
$stmts = $conn->prepare("SELECT (SELECT Qrcode FROM gebied WHERE Gebiednr='$gebiednr') AS qr, (SELECT Gebiednaam FROM buurt INNER JOIN gebied ON buurt.Gebiedcode=gebied.Gebiedcode WHERE Gebiednr='$gebiednr') AS streek, (SELECT Kaart FROM gebied WHERE Gebiednr='$gebiednr') AS Coord, COUNT(Nummer) AS Totaal FROM straat INNER JOIN nummer ON straat.Straatcode=nummer.Straatcode WHERE Gebiednr='$gebiednr' AND Anderstalig='$taal' AND Nietbeller=FALSE");
//eenmalige informatie + totaal opzoeken

$stmt = $conn->prepare("SELECT straat.Straatnaam, straat.Straatnummers, COUNT(Nummer) AS Nummers, (SELECT COUNT(Nummer) FROM nummer WHERE Nietbeller=TRUE AND straat.Straatcode=nummer.Straatcode) AS Nietbel, (SELECT COUNT(Nummer) FROM nummer WHERE Anderstalig!='Nederlands' AND straat.Straatcode=nummer.Straatcode) AS Atalig FROM straat INNER JOIN nummer ON straat.Straatcode=nummer.Straatcode  WHERE Gebiednr='$gebiednr' AND Anderstalig='$taal' AND Nietbeller=FALSE GROUP BY straat.Straatcode"); //straten opzoeken + de nummers
	
$stmta = $conn->prepare("SELECT * FROM bewerkingen WHERE Bewerkingscode = (SELECT MAX(Bewerkingscode) FROM bewerkingen WHERE Gebiednr='$gebiednr' AND Taalcode='$taalcode')"); //straten opzoeken + de nummers

$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {

						echo'
					<div class="straatb">
					<div class="straatv">
							<p class="skleur">'.$row["Straatnaam"].'</p>
						</div>
						<div class="straatv">
							<div class="nrt">
								<p>'.$row["Straatnummers"].'</p>
							</div>
							<div class="nrvt">
								<p>'.$row["Nummers"].'</p>
							</div>
						</div>
					</div>';	
	
}
	
$stmt->close();					

$stmta->execute();
$resulta = $stmta->get_result();

  
if($resulta->num_rows > 0) {
   
       while ($row = $resulta->fetch_assoc()) {
	
$bdate = strtotime($row["Bdatum"]);
$edate = strtotime($row["Edatum"]);
	
		echo'<div class="printcong">
				<div class="aturn">
					<div class="astrookt">
						<div class="ablok1"><p>BEWERKING</p></div><div class="ablok2"><p>D.D. '.date("d.m.y", $edate).' ('.date("d.m.y", $bdate).')</p></div><div class="ablok3"><p>Gebiednr. '.$gebiednr.'</p></div>
					</div>
					<div class="astrookc">
						<p>Na bewerking graag de datum in de kolom "Datum bewerkt" noteren en het dagdeel omcirkelen. Tevens het totaal overgeblevenen afwezigen noteren in de juiste kolom.</p>
					</div>
					<div class="astrook grays">
						<div class="adateb"><p class="atitle">Datum bewerkt</p></div><div class="adate"><p class="atitle">Dagdeel</p></div><div class="addv"><p class="atitle">MA</p></div><div class="addv"><p class="atitle">DI</p></div><div class="addv"><p class="atitle">WO</p></div><div class="addv"><p class="atitle">DO</p></div><div class="addv"><p class="atitle">VR</p></div><div class="addv"><p class="atitle">ZA</p></div><div class="addv"><p class="atitle">ZO</p></div>
					</div>
					<div class="astrook">
						<div class="anr"><p>1</p></div><div class="adate"><p></p></div><div class="adate"><p>Ochtend / Middag / Avond</p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div>
					</div>
					<div class="astrook">
						<div class="anr"><p>2</p></div><div class="adate"><p></p></div><div class="adate"><p>Ochtend / Middag / Avond</p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div>
					</div>
					<div class="astrook">
						<div class="anr"><p>3</p></div><div class="adate"><p></p></div><div class="adate"><p>Ochtend / Middag / Avond</p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div>
					</div>
					<div class="astrook">
						<div class="anr"><p>4</p></div><div class="adate"><p></p></div><div class="adate"><p>Ochtend / Middag / Avond</p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div>
					</div>
					<div class="astrook">
						<div class="anr"><p>5</p></div><div class="adate"><p></p></div><div class="adate"><p>Ochtend / Middag / Avond</p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div>
					</div>
					<div class="astrook">
						<div class="anr"><p>6</p></div><div class="adate"><p></p></div><div class="adate"><p>Ochtend / Middag / Avond</p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div>
					</div>
					<div class="astrook">
						<div class="anr"><p>7</p></div><div class="adate"><p></p></div><div class="adate"><p>Ochtend / Middag / Avond</p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div>
					</div>
					
					<div class="anstrook">
						<div class="aop"><p><b>Opmerkingen:</b><br>(bijv. nieuw NBA)</p></div><div class="aopmerkingen"></div>
					</div>
				</div>
			</div>';

}
    
} else {

		echo'<div class="printcong">
				<div class="aturn">
					<div class="astrookt">
						<div class="ablok1"><p>BEWERKING</p></div><div class="ablok2"><p>D.D.</p></div><div class="ablok3"><p>Gebiednr. '.$gebiednr.'</p></div>
					</div>
					<div class="astrookc">
						<p>Na bewerking graag de datum in de kolom "Datum bewerkt" noteren en het dagdeel omcirkelen. Tevens het totaal overgeblevenen afwezigen noteren in de juiste kolom.</p>
					</div>
					<div class="astrook grays">
						<div class="adateb"><p class="atitle">Datum bewerkt</p></div><div class="adate"><p class="atitle">Dagdeel</p></div><div class="addv"><p class="atitle">MA</p></div><div class="addv"><p class="atitle">DI</p></div><div class="addv"><p class="atitle">WO</p></div><div class="addv"><p class="atitle">DO</p></div><div class="addv"><p class="atitle">VR</p></div><div class="addv"><p class="atitle">ZA</p></div><div class="addv"><p class="atitle">ZO</p></div>
					</div>
					<div class="astrook">
						<div class="anr"><p>1</p></div><div class="adate"><p></p></div><div class="adate"><p>Ochtend / Middag / Avond</p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div>
					</div>
					<div class="astrook">
						<div class="anr"><p>2</p></div><div class="adate"><p></p></div><div class="adate"><p>Ochtend / Middag / Avond</p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div>
					</div>
					<div class="astrook">
						<div class="anr"><p>3</p></div><div class="adate"><p></p></div><div class="adate"><p>Ochtend / Middag / Avond</p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div>
					</div>
					<div class="astrook">
						<div class="anr"><p>4</p></div><div class="adate"><p></p></div><div class="adate"><p>Ochtend / Middag / Avond</p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div>
					</div>
					<div class="astrook">
						<div class="anr"><p>5</p></div><div class="adate"><p></p></div><div class="adate"><p>Ochtend / Middag / Avond</p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div>
					</div>
					<div class="astrook">
						<div class="anr"><p>6</p></div><div class="adate"><p></p></div><div class="adate"><p>Ochtend / Middag / Avond</p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div>
					</div>
					<div class="astrook">
						<div class="anr"><p>7</p></div><div class="adate"><p></p></div><div class="adate"><p>Ochtend / Middag / Avond</p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div><div class="addv"><p></p></div>
					</div>
					
					<div class="anstrook">
						<div class="aop"><p><b>Opmerkingen:</b><br>(bijv. nieuw NBA)</p></div><div class="aopmerkingen"></div>
					</div>
				</div>
			</div>';

}	
	



$stmta->close();
	
$stmts->execute();
$results = $stmts->get_result();
while ($rows = $results->fetch_object()) {
	
	
	
		echo'</div>
			</div><div class="strtotaal" >
				<div class="totalturn">
					<div class="straatv">
						<div class="nrt">
							<p class="skleur">Totaal</p>
						</div><div class="nrvt">
							<p>'.$rows->Totaal.'</p>
						</div>
					</div>		
				</div>
			</div>
		</div>
		<div class="gkinfo">
			<div class="gkinfoturn">
				<div class="infognr "><p>Gn. '.$gebiednr.'</p></div>
				<div class="infobuurt"><p>'.$rows->streek.'</p></div>
				<div class="infocou"><p>'.$taalcode.'</p></div>
			</div>
		</div>
		<div class="mapcon" id="'.$rows->Coord.'">
			<img class="qrcodesgk" id="'.$rows->qr.'" src="http://chart.apis.google.com/chart?cht=qr&chs=180x180&chl=http://www.google.com/maps/place/'.$rows->qr.'/"/>
			<div class="mapturn" >
			<div id="map-canvas"></div>
		</div>
	</div></div>';	

}

$stmts->close();

	
$stmtl = $conn->prepare("SELECT straat.Straatnaam, straat.Straatnummers, COUNT(Nummer) AS Nummers, straat.Straatcode, (SELECT Gebiednaam FROM buurt INNER JOIN gebied ON buurt.Gebiedcode=gebied.Gebiedcode WHERE Gebiednr='$gebiednr') AS streek, (SELECT COUNT(Nummer) FROM nummer WHERE Nietbeller=TRUE AND straat.Straatcode=nummer.Straatcode) AS Nietbel, (SELECT COUNT(Nummer) FROM nummer WHERE Anderstalig!='Nederlands' AND straat.Straatcode=nummer.Straatcode) AS Atalig FROM straat INNER JOIN nummer ON straat.Straatcode=nummer.Straatcode  WHERE Gebiednr='$gebiednr' AND Anderstalig='$taal' AND Nietbeller=FALSE GROUP BY straat.Straatcode"); //straten opzoeken + de nummers


$stmtl->execute();
$resultl = $stmtl->get_result();
while ($rows = $resultl->fetch_assoc()) {
	
$straatcode = $rows['Straatcode'];
$straatnaam = $rows['Straatnaam'];
$straatnrs = $rows['Straatnummers'];
$streek = $rows['streek'];


	
$stmtn = $conn->prepare("SELECT Nummer, Nietbeller, Anderstalig, Aanwezig, (SELECT COUNT(Nummer) FROM nummer WHERE nummer.Straatcode = '$straatcode') AS telling FROM nummer WHERE nummer.Straatcode='$straatcode' ORDER BY Nummer * 1 ASC"); //straten opzoeken + de nummers
$stmtn->execute();
$resultn = $stmtn->get_result();

$i = 1;
$p = 1;
$num_rows = $resultn->num_rows;
$totaalnrs = $num_rows/60;
while ($row = $resultn->fetch_assoc()) {

if ($i == 1) { // <-- If larger than 60 then do this statement
		echo'<div class="printcon" id="'.$straatcode.'"><div class="lijstinfo"><div class="lijstva"><p>LIJST VAN AFWEZIGEN</p></div><div class="gtaal"><p>'.$taalcode.'</p></div><div class="lijst r1"><p class="pleft">Straat</p><p class="pcen pstraatnaam">'.$straatnaam.'</p><p class="pright pnrs">Nrs: '.$straatnrs.'</p></div><div class="lijst r2"><p class="pleft">Plaats</p><p class="pcen pgebiednaam">'.$streek.'</p><p class="pright gnr">Geb. nr. '.$gebiednr.'   p'.$p.'/'.(ceil($totaalnrs)).'</p></div><div class="lijst r3"><p>Aanwezigen doorhalen | Taal &amp; NB + datum + dagdeel (o, m of a) noteren | printdat: '.date("d-m-y").'</p></div><div class="printkop"><div class="huisnrtitel"><p>Huisnummers</p></div><div class="datums"><p>Datum</p></div><div class="dagdeel"><p>DD</p></div></div></div><div class="allprint">';	
		$p++;
}

if($row['Anderstalig'] != "$taal") {
	echo'<div class="printnummer atkleur">
			<p>'.$row['Nummer'].'</p>
		</div>';
} else if($row['Nietbeller'] == TRUE) {
	echo'<div class="printnummer nbkleur">
			<p>'.$row['Nummer'].'</p>
		</div>';
} else if($row['Aanwezig'] == TRUE) {
	echo'<div class="printnummer">
			<p class="strikethrough">'.$row['Nummer'].'</p>
		</div>';
} else {
	echo'<div class="printnummer">
			<p>'.$row['Nummer'].'</p>
		</div>';
}

if($i == 60 || $i == $row['telling']){
	echo'</div><div class="datumlijst"></div><div class="oma"><div class="omablock"></div></div><div class="lijst td"><p class="terugdatum">Verloopdatum 22-05-2017</p></div></div>'; 
	$i = 1;
} else {
	$i++;
}	


        
	       
    
	
	
}
	
}

$stmtn->close();
$stmtl->close();
$conn->close();
	
}
	
	
	
	


 
	

echo'<script>

</script>	
</div>
</body>
</html>';
}
?>