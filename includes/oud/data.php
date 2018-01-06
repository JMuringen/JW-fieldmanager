<?php


            
         

    
include 'db_connect.php';

$gebiednr = ($_POST['gebiednr']);

if ($gebiednr==NULL) {
    echo '<p class="foutmelding">U heeft geen gebiednummer ingevoerd, probeer het nogmaals.<br>Voer een gebiednummer in en klik op Zoeken.</p>';
} else {
    
    echo '<div class="gebiednaam">
                <p class="gebiednr">Gebiednummer</p><p class="gebiednr"> '.$gebiednr.'</p>
            </div>'; 
    
$straatquery = "SELECT * FROM Straat WHERE Gebiednr = '$gebiednr'";

$result = mysqli_query($conn, $straatquery);

while($row = $result->fetch_object()){

$gebiedstraat = '<div class="straten" value="'.$row->Straatnaam.'">
  
               <input class="straatnaamvar" name="straat" value="'.$row->Straatnaam.'" type="hidden">
			   <input class="straatnummervar" name="nummers" value="'.$row->Straatnummers.'" type="hidden">
                <div class="straat"  >
                    <p>'.$row->Straatnaam.'</p>
                </div>
                <div class="nummer">
                    <p class="nrs">Nrs: </p><p class="tot">'.$row->Straatnummers.'</p>
                </div></div>';
             echo $gebiedstraat;  
                
}


    mysqli_close($conn);

}



?>