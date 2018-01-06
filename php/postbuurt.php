<?php

include '../includes/db_connect.php';

if ($_POST["buurt"]) {
	$nieuweb = $_POST["buurt"];
	$checkdata = mysqli_query($conn, "INSERT INTO buurt VALUES(NULL, '$nieuweb')");
	mysqli_close($conn);
}



?>