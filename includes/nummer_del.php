<?php



$delnummer = $_POST['delnummer'];

if (is_array($delnummer)){

foreach($delnummer as $huis=>$bewoner){
	
		$huisnummer = $bewoner[0];
		$straatcode = $bewoner[1];
	
		include 'db_connect.php';
	
		$query = "UPDATE Nummer SET Aanwezig=false WHERE Nummer = '$huisnummer' AND Straatcode = '$straatcode'";
		
		if (mysqli_query($conn, $query)) {
			
		}

		
	}
}
	


			 

?>