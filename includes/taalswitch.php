<?php
$taalnew = $_POST["taalc"];

if(isset($taalnew)) {
include 'db_connect.php';
$sqlo = $conn->prepare('SELECT * FROM taal WHERE Taalcode = ? ');
$sqlo->bind_param('s', $taalnew);
$sqlo->execute();
$result = $sqlo->get_result();
$rows = $result->fetch_assoc();

$ntaalcode = $rows['Taalcode'];
$ntaal = $rows['Taal'];

session_start();
if (isset($_SESSION['taalcode'])) {
    $_SESSION['taalcode'] = $ntaalcode;
	$_SESSION['taal'] = $ntaal;
} else {
    $_SESSION['taalcode'] = "NL";
	$_SESSION['taal'] = "Nederlands";
}
	
}


?>
