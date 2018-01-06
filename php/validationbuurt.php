<?php

include '../includes/db_connect.php';

if ($_POST["buurtn"]) {

	$buurtn = $_POST["buurtn"];

	$checkdata= mysqli_query($conn, "SELECT * FROM buurt WHERE Gebiednaam = '$buurtn'");

	$rowcount=mysqli_num_rows($checkdata);
 
	if($rowcount>0){
		echo '<div class="buurtbestaat melding-gn meld"><p>Deze buurt is al aangemaakt</p></div>';
	} else {
		echo '<div class="buurtbestaat melding-gw meld"><p>Deze buurt is beschikbaar</p></div>';
	}
}

?>