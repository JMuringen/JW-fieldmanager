
<?php 
ini_set('session.cookie_httponly',true); //zorgt ervoor dat de sessie niet verkrijgbaar is via JavaScript

session_start();

if (isset($_SESSION['last_ip']) === false){
    $_SESSION['last_ip'] = $_SERVER['REMOTE_ADDR'];
} 

if ($_SESSION['last_ip']  !== $_SERVER['REMOTE_ADDR']){
    session_unset();
    session_destroy();
}

session_regenerate_id(true); //Veranderd de session ID 
if (!(isset($_SESSION['id']) && $_SESSION['id'] != '')) {

header ("Location:../includes/inloggen.php");

}

?>

<html>
<head>
<meta charset="UTF-8">
<title>JW Field Manager</title> <!-- titel website -->
<script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
<script src='../js/load.js' type='text/javascript'></script> <!--transitions-->
<script src='../js/functie.js' type='text/javascript'></script> <!--transitions-->
	<script src='../js/gebiedtoevoegen.js' type='text/javascript'></script> <!--transitions-->
	<script type="text/javascript" src="../js/polygonset.min.js"></script>
<script type="text/javascript" src="../js/gebiedbekijken.js"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyD7AWFwYqWaW7uw3Jaa_2R-QynppmUXk9s&libraries=places" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="/css/gebiedprint.css"><!--algemene style-->
<link rel="stylesheet" type="text/css" href="../css/gebiedtoevoeg.css">
<link rel="stylesheet" type="text/css" href="../css/algemeen.css"> <!--algemene style-->
<link rel="stylesheet" type="text/css" href="../css/bijwerken.css"> <!--bewerken style-->	
<link rel="stylesheet" type="text/css" href="../css/maps.css">
<link rel="stylesheet" type="text/css" href="../css/fonts.css"> <!--lettertypes style-->

</head>
<body>

<div class="header"> <!-- begin header -->
   <div class="menuicon"><img src="/img/menu.png"/></div> 
	<div class="logo"><img src="/img/JWfieldmanager.png"/></div>
    <div class="headertaal">
    
    </div>
    <div class="gebruiker">
    <p>Welkom br. <?php echo $_SESSION['naam']; ?></p><p></p>
    </div>
</div>  
<div class="head-gegevens">	
	<?php include 'tijd.php';?>
</div> 
<!-- eind header -->