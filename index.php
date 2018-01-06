<?php
session_start();
require_once("/classes/class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
	$login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
	$uname = strip_tags($_POST['txt_uname_email']);
	$umail = strip_tags($_POST['txt_uname_email']);
	$upass = strip_tags($_POST['txt_password']);
		
	if($login->doLogin($uname,$umail,$upass))
	{
		$login->redirect('home.php');
	}
	else
	{
		$error = "De gegevens komen niet overeen!";
	}	
}
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


      
<div class="wrapperlogin"><!-- begin wrapper -->

    <form class='loginform' method='post'>
        <div class="block">
            <p class='hoofdtekst'>Login</p>   
        </div>
        <!--<div class="block">
            <input type='text' name='gemeente' placeholder="Gemeente">
        </div>--->
        <div class="block">
            <input type='text' name='txt_uname_email' placeholder="Gebruikersnaam">
        </div>
        <div class="block">
            <input type='password' name='txt_password' placeholder="Wachtwoord">
        </div>
        <div class="block"> 
            <input class='button r' type='reset' value='annuleren'>
            <input class='button s' type='submit' value='inloggen' name='btn-login'> 
        </div>
        <div class="block">
			 <a href="sign-up.php" class="gwreset">Gebruikersnaam en/of wachtwoord vergeten?</a>
		<?php
			if(isset($error))
			{
				?>
                <div class="alert alert-danger">
                   <i class="text-center foutmelding"><?php echo $error; ?></i>
                </div>
                <?php
			}
		?>
        </div>
		
        </form>
        

    
    
 

    
</div> <!-- eind wrapper -->
    
</body>
</html>