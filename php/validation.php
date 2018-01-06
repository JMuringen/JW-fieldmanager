<?php

include '../includes/db_connect.php';




if ($_POST["gebiednr"]) {
	$gebiednr = $_POST["gebiednr"];
	if(strpos($gebiednr, '0') === 0){
	  echo '<div class="meld melding-gn"><p>Dit gebiednummer is niet beschikbaar</p></div>';
	 } else {
		$checkdata= mysqli_query($conn, "SELECT * FROM gebied WHERE Gebiednr = '$gebiednr'");
		$rowcount=mysqli_num_rows($checkdata);

		if($rowcount>0){
			echo '<div class="meld melding-gn"><p>Dit gebiednummer is niet beschikbaar</p></div>';
		} else {
			echo '<div class="meld melding-gw"><p>Dit gebiednummer is beschikbaar</p><div>';
		}
	}
	mysqli_close($conn);
}




?>