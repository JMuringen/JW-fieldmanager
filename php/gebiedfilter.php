<?php
$filteritem = $_POST["filtertekst"];

session_start();
if (isset($_SESSION['filteritem'])) {
	$_SESSION['filteritem'] = $filteritem;
} else {
    $_SESSION['filteritem'] = "Alles";
}

?>
