<?php

ini_set('session.cookie_httponly',true); //zorgt ervoor dat de sessie niet verkrijgbaar is via JavaScript

session_start();



session_regenerate_id(true); //Veranderd de session ID 

    error_reporting(E_ALL ^ E_NOTICE);
?>

<html>
<head>
<meta charset="UTF-8">
<title>JW Field Manager</title> <!-- titel website -->
<link rel="stylesheet" type="text/css" href="/css/inloggen.css"> <!--homepagina style-->
<link rel="stylesheet" type="text/css" href="/css/algemeen.css"> <!--algemene style-->
<link rel="stylesheet" type="text/css" href="/css/fonts.css"> <!--lettertypes style-->
<script src='js/algemeen.js' type='text/javascript'></script> <!--transitions-->
</head>
<body>

<?php
if(isset($_POST['submit'])){

include '../includes/db_connect.php';

include 'login.php';
}
?>
    
<div class="wrapperlogin"><!-- begin wrapper -->

    <form class='loginform' action='' method='post'>
        <div class="block">
            <p class='hoofdtekst'>Login</p>   
        </div>
        <!--<div class="block">
            <input type='text' name='gemeente' placeholder="Gemeente">
        </div>--->
        <div class="block">
            <input type='text' name='gebruikersnaam' placeholder="Gebruikersnaam">
        </div>
        <div class="block">
            <input type='password' name='wachtwoord' placeholder="Wachtwoord">
        </div>
        <div class="block"> 
            <input class='button r' type='reset' value='annuleren'>
            <input class='button s' type='submit' value='inloggen' name='submit'> 
        </div>
        <div class="block">
            <a href="includes/reset.php" class="gwreset">Gebruikersnaam en/of wachtwoord vergeten?</a>
            <?php echo $fout; ?>
        </div>
        </form>
        
            <?php
                if(isset($_SESSION['id'])) {
                    header("location:../includes/home.php");
                } 
            ?>
    
    
    

    
</div> <!-- eind wrapper -->
    
</body>
</html>