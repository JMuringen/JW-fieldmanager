<?php include "../includes/db_connect.php"; 

echo '<div class="hoverlay"><div class="stepcontainer de1stestap"><div class="annuleerbar"><div class="annuleer"><p>Annuleer</p></div></div><div class="alert"><div class="steptitle"><h2>Stap 1: Een buurt binnen het gebied kiezen</h2><div class="optionbar">Selecteer een buurt<ul class="option">';

$sql = mysqli_query($conn, "SELECT gebiednaam FROM buurt");
			while($row = $sql->fetch_object())
 			{
	
echo '<li value="'.$row->gebiednaam.'">'.$row->gebiednaam.'</li>';
			}
echo '<li value="nieuweb">Nieuwe buurt aanmaken</li></ul></div></div></div></div>';

mysqli_close($conn);

				
?>


	
 			
	
    	
	  	
	  		
		
	