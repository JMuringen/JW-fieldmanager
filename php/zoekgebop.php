<?php 

	
		
	echo "<div class='filtercontainer'>
			<div class='filterzoek'>
			
		<input type='search'  class='zveld' placeholder='bijv. Paradijsstraat 12'>
		<input type='button' class='zoekgeb' name='Zoeken' value='Zoeken'>
			
			
		</div>
		<div class='filters'>";
		
		include '../includes/db_connect.php';

$stmts = $conn->prepare("SELECT * FROM buurt");
$stmts->execute();
$results = $stmts->get_result();
while ($rows = $results->fetch_object()) {
	
		echo "<div class='item' id='".$rows->Gebiednaam."'>
			<p>".$rows->Gebiednaam."</p>
		</div>";
}


		echo "<div class='item standitem selectedfilter' id='Alles'>
			<p>Alles</p>
		</div><div class='item standitem' id='Schoongebied'>
			<p>Schoon gebied</p>
		</div>
		<div class='item standitem' id='Uitgegeven'>
			<p>Uitgegeven</p>
		</div>
		<div class='item standitem' id='Inbezit'>
			<p>In bezit</p>
		</div>
		<div class='item standitem' id='Atjes'>
			<p>A'tjes</p>
		</div>
		<div class='item standitem' id='Vervallen'>
			<p>Vervallen</p>
		</div>
		</div>
	</div>";
	
?>