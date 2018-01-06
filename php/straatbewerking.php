<?php	
include '../includes/db_connect.php';
echo '<div class="optionbar-n"><div class="option-titel"><p>Selecteer een huisnummer</p></div>';
/*$buurt = $_POST["buurt"];
$gebiednr = $_POST["gebiednr"];
$totenmet = $_POST["straatnummers"];
$straatcode = $_POST["straatcode"];
$straat = $_POST["straat"];*/
$straatcode = $_POST["straatcode"];

$stmt = $conn->prepare('SELECT * FROM nummer WHERE Straatcode = ? ORDER BY Nummer ASC');
$stmt->bind_param('s', $straatcode);
$stmt->execute();

$result = $stmt->get_result();


while ($row = $result->fetch_object()) {
	if($row->Nietbeller == TRUE) {
		$nb = "nb";
	} else {
		$nb = "ab";
	}

	if(!$row->Anderstalig == 'Nederlands') {
		$at = "att";
	} else {
		$at = "";
	}
	

echo '<div class="straatnummers '.$nb.' '.$at.'">
            	<p class="nummer">'.$row->Nummer.'</p>
			</div>';


}

echo '</div>';
	$stmt->close();
	$conn->close();
		
?>