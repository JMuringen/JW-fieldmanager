<!-- header -->
<?php include 'header.php';?>

<?php include 'tijd.php';?>
<link rel="stylesheet" type="text/css" href="../css/circle.css">
<style>
	
	

	

	
.gebiedc .gebied-midb, .gebiedc .gebied-midg, .gebiedc .gebied-mido{
    width: 100%;
    height: auto;
    float: left;
}
	
.gebiedc .gebied-midb{
background-color: #b6cad0;
}
	
.gebiedc .gebied-midg{
background-color:rgba(136, 178, 178, 0.46);
}

.gebiedc .gebied-mido{
    background-color: #ffcf81;
}
	
	.bitel {
		width:100%;
		padding:10px 20px;
		background-color:rgba(158, 185, 193, 0.75) !important;
		color:#ffffff !important;
		font-size:20px !important;
	}
	
.gebiedinfo-overl {
    display: block;
    font-family: sans-serif;
    position: absolute;
    z-index: 7;
    background-color: #ffffff;
    width: 60%;
    top: 15%;
    left: 20%;
    height: auto;
    min-width: 500px;
    height: auto;
    -moz-box-shadow: -5px 0px 5px 0px rgba(158, 185, 193, 1);
    box-shadow: 0px 0px 2px 1px rgba(158, 185, 193, 1);
    border-radius: 5px;
}
	
	.gebiedinfotitel {
		border-radius: 5px;
		float:left;
		background-color:#ffffff;
		color: rgb(71, 136, 183);
		width:96%;
		padding:10px 2%;
		height:auto;
		font-size:18px
	}

	



.gebiedc .statusc {
	width: 100%;
    /* margin-bottom: 0; */
    height: auto;
    padding: 5px 0;
    text-align: center;
    float: left;
    bottom: 0;
    font-size: 16px;
}
	
		.gct-af{
    background-color: rgba(36, 144, 113, 0.56);
}
	.gct-uit{
   background-color: #ffbe55 ;
}


	

	
	.statusc p {
    height: 18px;
    width: 100%;
    margin: 5px 0;
}
	
	.info-b-links {
		width:46%;
		height:auto;
		float:left;
		
		padding:2%;
	}
	
	.info-b-rechts {
		width:46%;
		height:auto;
		float:left;
		
		padding:2%;
	}	
	
	.infr-straat {
		width:100%;
		height:auto;
		float:left;
		margin:10px 0;
	}
	
	.infr-str {
		width:100%;
		height:auto;
		float:left;
		font-weight:600;
		color: rgb(71, 136, 183);
		
	}
	
	.infr-nr {
		width:60%;
		height:auto;
		float:left;
		
	}
	
	.infr-nrs {
    width: 40%;
    height: auto;
    float: left;
    text-align: center;
}
	
	.inft {
		font-weight:600;
		color: rgb(71, 136, 183);
	}
	
	.infbtit {
		width:100%;
		height:auto;
		padding:10px 0;

		font-size:20px;
	}
	
	.g-container{
		width:100%;
		height:auto;
		float:left;
	}
	
	.infb {
		width:40%;
		height:auto;
		padding:10px;
		background-color: #9eb9c1;
		color: rgb(255, 255, 255);
		margin:20px auto;
		text-align:center;
		border-radius:3px;
		text-align: center;
		cursor:pointer;
		
	}
	
	.infb:hover {
		background-color: rgb(71, 136, 183);
	}

	
/* Let's get this party started */
::-webkit-scrollbar {
    width: 10px;
}
 
/* Track */
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    -webkit-border-radius: 10px;
    border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
    -webkit-border-radius: 10px;
    border-radius: 10px;
    background:#9eb9c1;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}

::-webkit-scrollbar-thumb:window-inactive {
	background:#9eb9c1;
}
</style>



<div class="wrapper"> <!--- Begin wrapper--->

	<!--- BOX VOOR DE GEBIED & STRAATNUMMER RESULTATEN --->	
	<?php include '../php/zoekgebop.php';?>
<div class="s5">
	
<div class="g-container unselectable">
		<div class="b-container">

</div>
	</div>
	
</div> <!--- Eind wrapper --->
	<div class="langucontainer afo">

		<div title="Nederlands" class="taalgr" id="NL"><p>NL</p></div>
		<div title="Engels" class="taalgr" id="EN"><p>EN</p></div>
		<div title="Sranantongo" class="taalgr" id="SR"><p>SR</p></div>

	</div>
	<div title="Een taalgroep kiezen" class="lan afo">
		<img src="/img/lan.png" />
	</div>
	<div title="Uitvoeren" class="taals">
		<img src="/img/cancel.png" />
	</div>
</div>
<?php include 'footer.php';?> <!--- footer --->