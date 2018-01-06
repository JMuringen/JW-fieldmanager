<?php

         


include 'db_connect.php';

$straat = ($_POST['straatnaamvar']);
$nummers = ($_POST['straatnummervar']);
     

if (empty($straat . $nummers)) {
    echo 'U heeft geen straat geselecteerd, probeer het nogmaals';
	echo $straat;
	 echo $nummers;
} else {

echo '<div class="nummertitel"><p>Huisnummers</p></div><div class="bewerkalert"><div class="gebiedb"><p>Let op, u bent nu het gebied aan het bijwerken!</p></div><div class="gebiedo"><p>Het gebied is met succes bijgewerkt!</p></div></div>';
 
$nummerquery = "SELECT Nummer, Nietbeller, Nummer.Straatcode, Nbdatum, Anderstalig, Aanwezig FROM nummer, Straat WHERE Straat.Straatnaam = '$straat' AND Straat.Straatcode = Nummer.Straatcode AND Straat.Straatnummers = '$nummers'"; 

$result = mysqli_query($conn, $nummerquery);

while($row = mysqli_fetch_array($result)){
    
$nummer = $row['Nummer'];
$nietbeller = $row["Nietbeller"];
$straatcode = $row["Straatcode"];
$datum = $row['Nbdatum'];
$anderstalig = $row['Anderstalig'];
$aanwezig = $row["Aanwezig"];
	
if($nietbeller == TRUE) {
    $nb = "nb";
} else if ($anderstalig != "")  {
    $nb = "att";
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