<?php
$conn = mysqli_connect("localhost", "root", "1234", "jwnew");
/*$conn = mysqli_connect("ams.jwfieldmanager.nl", "jwfie_nl_jwfmams", "Jaahoor12", "jwfieldmanager_nl_jwfmams");*/
/*$conn = mysqli_connect("tdv.jwfieldmanager.nl", "jwfie_nl_jwfmtdv", "Jaahoor12", "jwfieldmanager_nl_jwfmtdv");*/
if (!$conn) { 
    die("Connection failed: ".mysqli_connect_error());
}
?>	
