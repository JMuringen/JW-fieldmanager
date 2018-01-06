<?php

include 'db_connect.php';

$nummer = ($_POST["nummer"]);
$nietbeller = ($_POST["nietbeller"]);
$anderstalig = ($_POST["anderstalig"]);
$straatcode = ($_POST["straatcode"]);
$datum = ($_POST["datum"]);
$aanwezig = ($_POST["aanwezig"]);


$query = "UPDATE Nummer SET Aanwezig=true WHERE Nummer = '$nummer' AND Straatcode = '$straatcode'";

if (mysqli_query($conn, $query)) {
   

$nummerquery = "SELECT Nummer, Nietbeller, Nummer.Straatcode, Nbdatum, Anderstalig, Aanwezig FROM Nummer, Straat WHERE Straat.Straatcode = '$straatcode'"; 


while($row = mysqli_fetch_array($nummerquery)){
    
$nummer = $row['Nummer'];
$nietbeller = $row["Nietbeller"];
$straatcode = $row["Straatcode"];
$datum = $row['Nbdatum'];
$anderstalig = $row['Anderstalig'];
$aanwezig = $row["Aanwezig"];
	
if($nietbeller == TRUE) {
    $nb = "nb";
} else {
	$nb = "ab";
}
	
if($aanwezig == TRUE) {
    $aw = "aaw";
} else {
	$aw = "afw";
}

$nummers =  '<div class="straatnummers '.$nb.' '.$aw.'">
				<input class="nummer" name="nummer" value="'.$nummer.'" type="hidden">
				<input class="nietbeller" name="nietbeller" value="'.$nietbeller.'" type="hidden">
				<input class="scode" name="scode" value="'.$straatcode.'" type="hidden">
			   	<input class="nbdatum" name="nbdatum" value="'.$datum.'" type="hidden">
			    <input class="anderstalig" name="anderstalig" value="'.$anderstalig.'" type="hidden">
			   	<input class="aanwezig" name="aanwezig" value="'.$aanwezig.'" type="hidden">
            	<p class="nummer">'.$nummer.'</p>
			</div>';
             echo $nummers;  
	
}
			echo '<div class="werkbij"><div class="bijwerkknop"><p>Bijwerken</p></div><div class="bijwerkopslaan"><p>Opslaan</p></div></div>';

    mysqli_close($conn);
}
?>