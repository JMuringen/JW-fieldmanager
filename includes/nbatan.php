<?php

$straat = ($_POST['straatnaamvar']);
$nummer = ($_POST['straatnummervar']);
     

if (empty($straat . $nummer)) {
    echo 'U heeft geen straatnummer geselecteerd, probeer het nogmaals';
	
} else {

$popup =  '<div class="popup allpopup">
			<div class="svolledig allpopup">
				<div class="snaam">
					<p>'.$straat.' '.$nummer.'</p>
				</div>
				<div class="terug">
					<p>Ga terug</p>
				</div>
				<div class="annuleer">
					<p>Annuleer</p>
				</div>
			</div>
			<div class="aangeven allpopup ">
				
				<div class="aangnb allpopup allhm">
					<img class="nbn" src="/img/nbpic.png">
				</div>
				<div class="aangat allpopup allhm">
					<img class="atn" src="/img/atpic.png">
					
				</div>
				<div class="aangan allpopup allhm">
					<img class="ann" src="/img/anpic.png">
					
				</div>
				<div class="aangnbk allw allpopup allnib">
					<img class="nbh" src="../img/nbpichover.png">
				</div>
				<div class="aangnb-veld allw allpopup allnib">
					<div class="vraagveld">
						<p>'.$straat.' nummer '.$nummer.' is een nietbeller sinds?<br><br>Voer hieronder de datum in</p>
					</div>
					
						<div class="inputnb allnib">
							<input type="date" name="nbdate"> <!--- nietbeller input veld --->
						</div>
				
					<div class="vraagveld-button allnib">
						<div class="vvb" type="button" value="voernbin"><p>Opslaan</p></div> <!--- Zoek knop --->
					</div>
				</div>
				<div class="aangatk allw allat">
					<img class="ath" src="../img/atpichover.png">
				</div>
				<div class="aangat-veld allw allpopup allat">
					<div class="vraagveld">
						<p>Spreken de bewoners een andere taal?<br><br>Voer hieronder de taal in</p>
					</div>
					
						<div class="inputnb allat">
							<input type="text" name="nbdate"> <!--- nietbeller input veld --->
						</div>
				
					<div class="vraagveld-button allat">
						<div class="vvb" type="button" value="voernbin"><p>Opslaan</p></div> <!--- Zoek knop --->
					</div>
				</div>
				<div class="aangank allw allab">
					<img class="anh" src="../img/anpichover.png">
				</div>
				<div class="aangan-veld allw allpopup allab">
					<div class="vraagveld">
						<p>Zijn er bijzonderheden omtrent '.$straat.' nummer '.$nummer.'?<br><br>Plaats hieronder een korte omschrijving</p>
					</div>
					
						<div class="inputnb allab">
							<input type="text" name="nbdate"> <!--- nietbeller input veld --->
						</div>
				
					<div class="vraagveld-button allab">
						<div class="vvb" type="button" value="voernbin"><p>Opslaan</p></div> <!--- Zoek knop --->
					</div>
				</div>
			</div>
			<div class="pictexten allpopup">
			<p class="pictext nib">Nietbeller</p>
			<p class="pictext ant">Anderstalig</p>
			<p class="pictext and">Anders</p>
			</div>
			
		</div>';
             echo $popup;  


}

?>