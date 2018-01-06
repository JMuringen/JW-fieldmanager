<?php
session_start(); 
include 'db_connect.php';


$vnaam = $_POST['voornaam']; 
$tvoegsels = $_POST['tussenvoegsels']; 
$anaam = $_POST['achternaam']; 
$email = $_POST['email']; 
$gemeente = $_POST['gemeente'];
$gnaam = $_POST['gebruikersnaam'];
$wwoord = $_POST['wachtwoord']; 

if (empty($vnaam)){
    header("location: ../registreren.php?error=empty");
    exit();
}

if (empty($anaam)){
    header("location: ../registreren.php?error=empty");
    exit();
}

if (empty($email)){
    header("location: ../registreren.php?error=empty");
    exit();
}

if (empty($gemeente)){
    header("location: ../registreren.php?error=empty");
    exit();
}

if (empty($gnaam)){
    header("location: ../registreren.php?error=empty");
    exit();
}

if (empty($wwoord)){
    header("location: ../registreren.php?error=empty");
    exit();
}

else {
$sql = "SELECT gebruikersnaam FROM gebruikers WHERE gebruikersnaam='$gnaam'";
$result = $conn->query($sql);
$gnaamcheck = mysqli_num_rows($result);
if($gnaamcheck > 0){
header("location: ../registreren.php?error=gebruikersnaam");
    exit();
} else {
    $encrypted_password = password_hash($wwoord, PASSWORD_DEFAULT, ['cost'=> 10]);
    $sql = "INSERT INTO Gebruikers (voornaam, tussenvoegsels, achternaam, email, gemeente, gebruikersnaam, wachtwoord)
VALUES ('$vnaam', '$tvoegsels', '$anaam', '$email', '$gemeente', '$gnaam', '$encrypted_password')";

$result = $conn->query($sql);
$uidcheck = mysqli_num_rows($result);
if ($uidcheck > 0) {}

header("location:../inloggen.php");
    
}
    


}

?>