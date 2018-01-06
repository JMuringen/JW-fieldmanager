<?php

	require_once("/classes/session.php");
	
	require_once("/classes/class.user.php");
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>

<html>
<head>
<meta charset="UTF-8">
<title>welcome - <?php print($userRow['user_email']); ?></title>
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
    	<p>NL</p>
    </div>
    <div class="gebruiker">
    <p>Welkom br. <?php echo($userRow['user_name']); ?></p><p></p>
    </div>
</div>  <!-- eind header -->
<div class="head-gegevens"> <!-- begin header -->
</div>    

	