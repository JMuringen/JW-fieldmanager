<?php

include '../includes/db_connect.php';

if ($_POST["straat"]) {

	$straat = $_POST["street"];
	$vanaf = $_POST["vanaf"];
	$tot = $_POST["tot"];
	
if ($vanaf % 2 == 0 && $tot % 2 == 0 || $vanaf % 2 != 0 && $tot % 2 != 0 ||){
	while($vanaf <= $tot){
		$checkdata= mysqli_query($conn, "SELECT * FROM nummer WHERE Straatnaam = '$straat' AND Nummer = '$vanaf'");
		$rowcount=mysqli_num_rows($checkdata);
		$vanaf+2;
		
		if($rowcount>0){
		echo '<div class="fouts"><p>Deze straat i.c.m. met de huisnummers bestaat al</p></div>';
	}else{}
	}	

	
}	
}
?>