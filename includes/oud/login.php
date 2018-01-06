<?php


$gnaam = $_POST['gebruikersnaam'];
$wwoord = $_POST['wachtwoord']; 

$sqlo = $mysqli->prepare('SELECT * FROM gebruikers WHERE Gebruikersnaam = ? ');
$sqlo->bind_param('s', $gnaam);
$sqlo->execute();
$result = $sqlo->get_result();
$rows = $result->fetch_assoc();

$hash_ww = $rows['Wachtwoord'];
$hash = password_verify($wwoord, $hash_ww);

if ($hash == 0){
    $fout = "<p class='foutmelding'>Een of meer van de ingevoerde gegevens zijn incorrect!</p>";
    
} else {
  	$sql = $mysqli->prepare('SELECT * FROM gebruikers WHERE Gebruikersnaam = ? AND Wachtwoord = ?');
	$sql->bind_param('ss', $gnaam, $hash_ww );
	$sql->execute();

	$result = $sql->get_result();

	if (!$row = $result->fetch_assoc()) {
    	$fout = "<p class='foutmelding'>Een of meer van de ingevoerde gegevens zijn incorrect!</p>";
	} else {
		if($row['id'] == FALSE) {
			$fout = "<p class='foutmelding'>Dit account is nog niet geactiveerd!</p>";
		} else {
			//echo "U bent succesvol ingelogd!"; 
			$_SESSION['id'] = $row['id'];
			$_SESSION['gid'] = $row['Gebruikersid'];
			$_SESSION['naam'] = substr($row['Voornaam'], 0, 1)." ".$row['Achternaam'];
			$_SESSION['taalcode'] = "NL";
			$_SESSION['taal'] = "Nederlands";
			$_SESSION['filteritem'] = "Alles";
		}
			header("location: ../includes/home.php");
    }
}

?>