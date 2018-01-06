<?php

include '../includes/db_connect.php';



	$straat = $_POST["straat"];
	$vanaf = $_POST["vanaf"];
	$tot = $_POST["tot"];

if (($vanaf % 2 == 0 && $tot % 2 == 0) || ($vanaf % 2 != 0 && $tot % 2 != 0)){
	$start = $vanaf;
	
	while($start <= $tot){
		$stmt = $conn->prepare("SELECT * FROM nummer WHERE Straatnaam = ? AND Nummer = ?");
		$stmt->bind_param('ss', $straat, $vanaf);
		$stmt->execute();
		$stmt->store_result();
		// Get the number of rows
		
	
		
	$start = $start+2;
	}
	if($stmt->num_rows >= "1"){
		echo '<div class="fouts"><p>Deze straat i.c.m. met de huisnummers bestaat al</p></div>';
	}
	
	} else {
	$stmt = $conn->prepare("SELECT * FROM nummer WHERE Straatnaam = ? AND Nummer = ?");
	$stmt->bind_param('ss', $straat, $vanaf);
	$stmt->execute();
	// Store the result (so you can get the properties, like num_rows)
	$stmt->store_result();
	// Get the number of rows

	if($stmt->num_rows >= "1"){
		echo '<div class="fouts"><p>Deze straat i.c.m. met de huisnummers bestaat al</p></div>';
	}	
	}



?>

