<!-- header -->
<?php include 'header.php';?>

<?php include 'tijd.php';?>


<div class="wrapper"> <!--- Begin wrapper--->
    
<div class="s4"> <!--- BOX VOOR DE ZOEKFUNCTIES --->
	<div id="knoppen">
    	<form name="zoekgebied"  class="gebiedzoeken">
    		<div class="search"> 
			<input class="zoekopdracht" type='text' name='gebiednr' placeholder="type gebiednr of straat..." value=""> <!--- Zoeken input veld --->
        	</div>
        	<div class='searchbutton' type="button" name="Zoeken" value='Zoeken'><p>Zoeken</p></div> <!--- Zoek knop --->
		</form>
    	<a href="../includes/home.php">
			<div class="knop hmp"> <!--- Homeknop --->
				<p>Home pagina</p>
        	</div>
    	</a>
    	<div class="knop mpk"> <!--- Mail/Print knop  --->
        	<p>Mailen/Printen</p>
    	</div>
    	<div class="knop jok"> <!--- Jaaroverzicht knop --->
        	<p>Instellingen</p>
    	</div>
    	<div class="knop nbk"> <!--- Gebied afsluiten knop --->
        	<p>Gebied afsluiten</p>
    	</div>
	</div>
</div>

	<!--- BOX VOOR DE GEBIED & STRAATNUMMER RESULTATEN --->	
	
<div class="s5">
	<div class="overlay allpopup">
		
	</div>
	<div id="gebiedsection">           
    <!--- VOOR ALLE STRATEN PER GEBIED --->        
    </div>
	
    <div id="straatsection">   
		<div class="gelukt"></div>
    	<div class="nummerveld">
		</div>
	</div>
</div>
	
</div> <!--- Eind wrapper --->

<?php include 'footer.php';?> <!--- footer --->