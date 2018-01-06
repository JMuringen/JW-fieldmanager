<?php	

include '../includes/db_connect.php';

session_start();
$taal = $_SESSION['taal'];	
$taalcode = $_SESSION['taalcode'];	
$filteritem = $_SESSION['filteritem'];	


	

if($filteritem == "Alles"){
	
	$stmt = $conn->prepare("SELECT gebied.Gebiednr, COUNT(Nummer) AS total, (SELECT Straatnaam FROM straat WHERE straat.Straatcode=nummer.Straatcode AND  gebied.Gebiednr=straat.Gebiednr GROUP BY Straatnaam) AS straatn FROM gebied INNER JOIN straat ON gebied.Gebiednr=straat.Gebiednr INNER JOIN nummer ON straat.Straatcode=nummer.Straatcode WHERE Anderstalig='$taal' AND Nietbeller=FALSE GROUP BY gebied.Gebiednr ORDER BY gebied.Gebiednr, nummer.Nummer");
	
} elseif($filteritem == "Schoongebied"){
	
	$stmt = $conn->prepare("SELECT gebied.Gebiednr, COUNT(Nummer) AS total, (SELECT Straatnaam FROM straat WHERE straat.Straatcode=nummer.Straatcode AND  gebied.Gebiednr=straat.Gebiednr GROUP BY Straatnaam) AS straatn FROM gebied INNER JOIN straat ON gebied.Gebiednr=straat.Gebiednr INNER JOIN nummer ON straat.Straatcode=nummer.Straatcode AND Anderstalig='$taal' AND Nietbeller=FALSE GROUP BY gebied.Gebiednr ORDER BY gebied.Gebiednr, nummer.Nummer");
	
} elseif($filteritem == "Uitgegeven"){
	
	$stmt = $conn->prepare("SELECT gebied.Gebiednr, COUNT(Nummer) AS total, (SELECT Straatnaam FROM straat WHERE straat.Straatcode=nummer.Straatcode AND  gebied.Gebiednr=straat.Gebiednr GROUP BY Straatnaam) AS straatn FROM gebied INNER JOIN straat ON gebied.Gebiednr=straat.Gebiednr INNER JOIN nummer ON straat.Straatcode=nummer.Straatcode WHERE Anderstalig='$taal' AND Nietbeller=FALSE GROUP BY gebied.Gebiednr ORDER BY gebied.Gebiednr, nummer.Nummer");
	
} elseif($filteritem == "Inbezit"){
	
	$stmt = $conn->prepare("SELECT gebied.Gebiednr, COUNT(Nummer) AS total, (SELECT Straatnaam FROM straat WHERE straat.Straatcode=nummer.Straatcode AND  gebied.Gebiednr=straat.Gebiednr GROUP BY Straatnaam) AS straatn FROM gebied INNER JOIN straat ON gebied.Gebiednr=straat.Gebiednr INNER JOIN nummer ON straat.Straatcode=nummer.Straatcode WHERE Anderstalig='$taal' AND Nietbeller=FALSE GROUP BY gebied.Gebiednr ORDER BY gebied.Gebiednr, nummer.Nummer");
	
} elseif($filteritem == "Atjes"){
	
	$stmt = $conn->prepare("SELECT gebied.Gebiednr, COUNT(Nummer) AS total, (SELECT Straatnaam FROM straat WHERE straat.Straatcode=nummer.Straatcode AND  gebied.Gebiednr=straat.Gebiednr GROUP BY Straatnaam) AS straatn FROM gebied INNER JOIN straat ON gebied.Gebiednr=straat.Gebiednr INNER JOIN nummer ON straat.Straatcode=nummer.Straatcode WHERE Anderstalig='$taal' AND Nietbeller=FALSE GROUP BY gebied.Gebiednr ORDER BY gebied.Gebiednr, nummer.Nummer");
	
} elseif($filteritem == "Vervallen"){
	
	$stmt = $conn->prepare("SELECT gebied.Gebiednr, COUNT(Nummer) AS total, (SELECT Straatnaam FROM straat WHERE straat.Straatcode=nummer.Straatcode AND  gebied.Gebiednr=straat.Gebiednr GROUP BY Straatnaam) AS straatn FROM gebied INNER JOIN straat ON gebied.Gebiednr=straat.Gebiednr INNER JOIN nummer ON straat.Straatcode=nummer.Straatcode WHERE Anderstalig='$taal' AND Nietbeller=FALSE GROUP BY gebied.Gebiednr ORDER BY gebied.Gebiednr, nummer.Nummer");
	
} else {
	
	$stmt = $conn->prepare("SELECT gebied.Gebiednr, COUNT(Nummer) AS total, (SELECT Straatnaam FROM straat WHERE straat.Straatcode=nummer.Straatcode AND  gebied.Gebiednr=straat.Gebiednr GROUP BY Straatnaam) AS straatn FROM gebied INNER JOIN buurt ON buurt.Gebiedcode=gebied.Gebiedcode INNER JOIN straat ON gebied.Gebiednr=straat.Gebiednr INNER JOIN nummer ON straat.Straatcode=nummer.Straatcode WHERE Gebiednaam='$filteritem' AND Anderstalig='$taal' AND Nietbeller=FALSE GROUP BY gebied.Gebiednr ORDER BY gebied.Gebiednr, nummer.Nummer");
	
}




$stmt->execute();

$result = $stmt->get_result();


while ($row = $result->fetch_object()) {

$gebiednr = $row->Gebiednr;	
	
$aanw = $conn->prepare("SELECT COUNT(Nummer) AS aanwezig FROM gebied INNER JOIN straat ON gebied.Gebiednr=straat.Gebiednr INNER JOIN nummer ON straat.Straatcode=nummer.Straatcode WHERE Aanwezig=TRUE AND Anderstalig='$taal' AND Nietbeller=FALSE AND gebied.Gebiednr='$gebiednr'");
$aanw->execute();
$resultaat = $aanw->get_result();
	
while ($rows = $resultaat->fetch_object()) {	
$aanwezigen = $rows->aanwezig;	
$eprocent = 100 / $row->total;
$afwezig = $row->total - $aanwezigen;
$percentage = $eprocent * $aanwezigen;

if($filteritem == "Schoongebied"){
if($aanwezigen == 0){
echo '<div class="gebiedc" id="'.$row->Gebiednr.'">
<div class="gebiedctitel"><p>Gebied '.$row->Gebiednr.'</p></div>
	<div class="gebied-midb">
		<div class="c100 p'.round($percentage).' small">
			<span>schoon</span>
			<div class="slice">
			<div class="bar"></div>
			<div class="fill"></div>
		</div>
	</div>
</div>
				
<div class="gebied-contain sc-nuit"><div class="gebied-con sc-nuit"><p>Totaal '.$row->total.'</p></div></div></div>';
}
 } else if($filteritem == "Atjes"){
	if($aanwezigen > 0){
	echo '<div class="gebiedc" id="'.$row->Gebiednr.'">
<div class="gebiedctitel"><p>Gebied '.$row->Gebiednr.'</p></div>
	<div class="gebied-midb">
		<div class="c100 p'.round($percentage).' small">
			<span>'.$afwezig.'</span>
			<div class="slice">
			<div class="bar"></div>
			<div class="fill"></div>
		</div>
	</div>
</div>
				
<div class="gebied-contain sc-nuit"><div class="gebied-con sc-nuit"><p>Totaal '.$row->total.'</p></div></div></div>';	
	}
	
}else{
	

	if($aanwezigen == 0){
echo '<div class="gebiedc" id="'.$row->Gebiednr.'">
<div class="gebiedctitel"><p>Gebied '.$row->Gebiednr.'</p></div>
	<div class="gebied-midb">
		<div class="c100 p'.round($percentage).' small">
			<span>schoon</span>
			<div class="slice">
			<div class="bar"></div>
			<div class="fill"></div>
		</div>
	</div>
</div>
				
<div class="gebied-contain sc-nuit"><div class="gebied-con sc-nuit"><p>Totaal '.$row->total.'</p></div></div></div>';
} else {
echo '<div class="gebiedc" id="'.$row->Gebiednr.'">
<div class="gebiedctitel"><p>Gebied '.$row->Gebiednr.'</p></div>
	<div class="gebied-midb">
		<div class="c100 p'.round($percentage).' small">
			<span>'.$afwezig.'</span>
			<div class="slice">
			<div class="bar"></div>
			<div class="fill"></div>
		</div>
	</div>
</div>
				
<div class="gebied-contain sc-nuit"><div class="gebied-con sc-nuit"><p>Totaal '.$row->total.'</p></div></div></div>';	
}	
	
}
	
	
	
	
}
}
	$stmt->close();
	$conn->close();	
?>




