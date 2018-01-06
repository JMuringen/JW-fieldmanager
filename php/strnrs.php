<?php include "../includes/db_connect.php"; 

$gebiednr = $_POST['gebiednr']; 

$stmt = $conn->prepare("SELECT * FROM straat WHERE Gebiednr = ?");

$stmt->bind_param("s", $gebiednr); 

$stmt->execute(); 
$result = $stmt->get_result(); 



echo '<div class="optionbar-s">Selecteer een straat<ul class="option">';

while ($row = $result->fetch_object()) {
echo '<li data-id="'.$row->Straatcode.'"><p class="osstraat">'.$row->Straatnaam.'</p><p class="osnummers">'.$row->Straatnummers.'</p></li>';

}

$stmt->close(); 
$conn->close();
	
echo '</ul></div>';

?>