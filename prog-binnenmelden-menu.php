<?php include '/includes/header.php';?>
<style>
/* PROGRAMMAS */
	
.programma {
    width: 200px;
    height: auto;
    float: left;
    text-align: center;
    font-family: sans-serif;
    margin: 50px;
    border-radius: 3px;
    cursor: pointer;
}
	
.programma:hover{
box-shadow: 0px 0px 2px 3px rgba(77, 167, 204, 0.6);
}
	
.prog-icoon {
    width: 40%;
    height: auto;
    float: left;
    padding: 10% 30% 0 30%;
}
	
	.prog-icoon img{
		width: 100%;
		height:auto;
		float:left;
	}
	
.p-naam {
    width: 90%;
    height: auto;
    float: left;
    padding: 0 5%;
    line-height: 0px;
	color: #4c698a;
}
	
	.permissieicoon {
		width: 100%;
		height:auto;
		float:left;
	}
	
.pi-icoon {
    width: 10%;
    height: auto;
    float: left;
    padding: 0 45% 10% 45%;
}
	
	.pi-icoon img{
		width: 100%;
		height:auto;
		float:left;
	}

/*
	
#2980b9; Programma blauw
#4c698a; Programma naam grijs
0px 0px 2px 3px rgba(77, 167, 204, 0.6); programma schaduw blauw

*/
	
/* DOWNLOAD BUTTONS */

.download-items, .download-name {
	width: 280px;
	height: auto;
	float: left;
	font-family:sans-serif;
}
	
.download-name {
	margin:3px;
}
	
.download-btn {
	width: auto;
	height: auto;
	float: left;
}
	
.download-btn .btn {
    width: auto;
    height: auto;
    float: left;
    font-size: 12px;
    border-radius: 5px;
    padding: 10px 20px;
    margin: 3px;
    color: #fff;
    background-color:#8199b4;
    border: none;
    box-shadow: none;
	cursor:pointer;
}

.download-btn .btn:hover {
    background-color:#2980b9;
    border: none;
    box-shadow: none;
}


	
/*Pop-ups*/

.pop-up p, .pop-up h4 {
	margin:0;
}
	
.pop-up .pop-header p {
	font-size:18px;
}
	
.pop-up .pop-image .keuze, .pop-up .pop-aangeven-image .keuze {
	width:100%;
	height:auto;
	float:left;
	margin:20px 0;
	text-align: center;
}

.pop-up {
	width:40%;
    min-width: 650px;
	height:auto;
	margin:auto;
	float:left;
	z-index: 99999;
	/* position: absolute;
    position: fixed;
    top: 25%;
    right: 0;
    left: 0;*/
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    font-family: sans-serif;
	box-shadow: 0px 0px 2px 3px rgba(77, 167, 204, 0.6);
}
	
.pop-header {
	width:100%;
	height:auto;
	float:left;
	text-align: center;
	border-bottom: 1px #8199b4 solid;
}
	
.pop-75 {
    width: 70%;
    height: auto;
    padding: 20px 0 20px 5%;
    float: left;
    background: #ffffff;
    color: #628ca7;
    border-radius: 5px 0 0 0;
	font-weight: 700;
}
	
.pop-25 {
	width:25%;
	height: auto;
	padding: 0;
	float:left;
	color: #4c698a;
}
	
.pop-sluiten {
    width: 150px;
    min-width: 100px;
    padding: 20px 0 20px 0;
    height: auto;
    float: right;
    background-color: #ffdada;
    border-radius: 0 5px 0 0;
    border-left: 1px #8199b4 solid;
	cursor:pointer;
}
	
.pop-annuleer:hover, .pop-sluiten:hover {
	color:#fff;
	background-color:#ed3700;
}
	
.pop-title {
    width: 90%;
    height: auto;
    padding: 10px 5%;
    float: left;
    text-align: center;
    background: #f7fafc;
}
	
.pop-image {
	width:30%;
	height:auto;
	float:left;
	margin:10%;
	cursor: pointer;
}
	
.pop-aangeven-image {
	width:28.3333333333%;
	height:auto;
	float:left;
	margin:2.5%;
	cursor: pointer;
}
	
.pop-image .image, .pop-aangeven-image .image {
	width:90px;
	height:auto;
	margin:auto;
	text-align: center;
}
	
.pop-image .image img, .pop-aangeven-image .image img{
	width:100%;
	height:auto;
	float:left;	
}
	
.grow { transition: all .2s ease-in-out; }
.grow:hover { transform: scale(1.1); }
	
.pop-text {
	width: 90%;
    padding: 10px 5%;
    height: 80px;
    float: left;
}

.pop-14 {
    width: 16%;
    height: auto;
    float: left;
    margin: 10px 3%;
    padding: 10px 4%;		
}
	
.pop-34 {
    width: 60%;
    height: auto;
    float: left;
    margin: 10px 3%;
    padding: 10px 2%;		
}

.pop-invoerveld {
    width: 90%;
    height: auto;
    float: left;
    margin: 10px 3%;
    padding: 10px 2%;
}
	
.pop-buttons {
    width: 100%;
    height: auto;
    float: left;
	text-align: center;
}

.pop-buttons .btn {
	width: 50%;
    height: auto;
    padding: 10px 0 5% 0;
    float: left;
    float: left;
}
	
.pop-annuleer, .pop-verder {
	width: 200px;
    height: auto;
	padding:15px 15px;
	margin:auto;
	border: 1px #c7d0d9 solid;
    border-radius: 5px;
	cursor:pointer;
}
	
.pop-verder:hover {
	color:#fff;
	background-color: #4c698a;
}
	
label {
	/*display: inline-block;*/
  	width: 140px;
    text-align:left;
    margin:10px 0;
}
	
textarea.anders-text {
    min-width: 100%;
    max-width: 100%;
    min-height: 60px;
    float: left;
    background: #f7fafc;
    -webkit-appearance: textarea;
    border: 1px #eee solid;
    border-radius: 5px;
    max-height: 100px;
	padding:5px;
	font-size:16px;
	font-family: sans-serif;
}
	
/* DROPDOWN KEUZE MENU */
	
@import url("https://fonts.googleapis.com/css?family=Lato");




.select-hidden {
  display: none;
  visibility: hidden;
  padding-right: 10px;
}

.select {
	
    cursor: pointer;
    display: inline-block;
    position: relative;
    font-size: 18px;
    color: #3e5f75;
    width: 220px;
    height: 50px;
}

.select-styled {
	    width: 174.9px;
  line-height: 30px;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-color: #fff;
  padding: 10px 15px;
	border-radius:5px;
  border: 1px solid #c5c5c5; 
  -moz-transition: all 0.2s ease-in;
  -o-transition: all 0.2s ease-in;
  -webkit-transition: all 0.2s ease-in;
  transition: all 0.2s ease-in;
}
.select-styled:after {
    content: "";
    width: 0;
    height: 0;
    border: 7px solid transparent;
    border-color: #c5c5c5 transparent transparent transparent;
    position: absolute;
    top: 20px;
    right: 10px;
}
.select-styled:hover {
  background-color: #4c698a;
	color:#fff;
}
.select-styled:active, .select-styled.active {
  background-color: #4c698a;
	color:#fff;
}
.select-styled:active:after, .select-styled.active:after {
  top: 9px;
  border-color: transparent transparent #fff transparent;
}

.select-options {;
    display: none;
    position: absolute;
    top: 100%;
    right: 0;
    left: 0;
    z-index: 999;
    margin: 0;
    padding: 0;
    list-style: none;
    border-left: 1px  #c5c5c5 solid;
	border-right: 1px  #c5c5c5 solid;
	border-bottom: 1px  #c5c5c5 solid;
	border-radius:5px;
    background-color: #ffffff;
    width: 204px;
	height:120px;
	overflow-y:scroll;
}
.select-options li {
  margin: 0;
  padding: 12px 0;
  text-indent: 15px;
  border-top: 1px solid  #c5c5c5;
  -moz-transition: all 0.15s ease-in;
  -o-transition: all 0.15s ease-in;
  -webkit-transition: all 0.15s ease-in;
  transition: all 0.15s ease-in;
}
.select-options li:hover {
  color:#fff;
background-color: #4c698a;
}
.select-options li[rel="hide"] {
  display: none;
}

/* A few custom styles for date inputs */
input[type="date"] {
    appearance: none;
    -webkit-appearance: none;
    color: #95a5a6;
    font-family: "Helvetica", arial, sans-serif;
    font-size: 18px;
    border: 1px solid #c5c5c5;
    background: #ffffff;
    margin: 5px auto;
    padding: 10px;
    text-align: center;
    border-radius: 5px;
    display: inline-block !important;
    visibility: visible !important;
}

input[type="date"], focus {
    color: #3e5f75;
    box-shadow: none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
}


	
/*GEBIED PROGRAMMA */
.pop-image-13 {
	width:23%;
	height:auto;
	float:left;
	padding:1%;
}
	
.pop-image-23 {
	width:73%;
	height:auto;
	float:left;	
	padding:1%;
}
	
.pop-14 .pop-icon {
	width:90%;
	height:auto;
	margin:auto;
	padding:5%;
}
	
.pop-14 .pop-icon img {
	width:100%;
	height:auto;
	float:left;
}
	
.camera {
    width: 150px;
    height: 150px;
    margin: auto;
    border:3px #3a9999 solid;
    border-radius: 3px;
	overflow:hidden;
}
	
.camera-results {
	width: 100%;
	min-width:400px;
	height:auto;
	float:left;
}
	
.camera-results .gebied-result {
    width: 150px;
    height: auto;
    float: left;
    padding: 5px;
    margin: 5px;
    text-align: center;
    background: #d2e8f1;
    border-radius: 3px;
}

.camera-results .gebied-result .result-nr {
	width: 100%;
	height:auto;
	float:left;	
	font-weight:600;
	padding: 5px 0;
}

.camera-results .gebied-result .result-name {
	width: 100%;
	height:auto;
	float:left;	
	padding: 5px 0;
}

.melding-title {
    width: 90%;
    height: auto;
    padding: 50px 5% 10px;
    margin: 0 0 30px;
    float: left;
    text-align: center;
    background: #f7fafc;
    color: #d53030;	
}
	
.pb-13, .pb-23, .pb-33 {
    height: 98%;
    padding: 1%;
    float: left;	
	
}
	
.pb-13 {
	width:23%;
}
	
.pb-23 {
	width:33%;
}

.pb-33 {
	width:38%;		
}
	
.pb-br-gb {
    width: 250px;
    height: auto;
    float: left;
    background: #fdfdfd;
    border-radius: 5px;
    margin: 10px;
}
	
.br-veld {
    width: 96%;
    height: 30px;
    line-height: 1px;
    float: left;
    background: #d2e2ec;
    color: #3a6d8e;
    padding: 2%;
    border-radius: 5px 5px 0 0;
}
	
.gb-veld {
    width: 100%;
    height: auto;
    float: left;
    padding: 10px 0;
}
	
.gb-nummer {
    width: 40px;
    height: 40px;
    line-height: 8px;
    margin: 5px;
    border-radius: 5px;
    text-align: center;
    float: left;
    border: 1px #7699af solid;
   	cursor:pointer;
    color: #3a6d8e;
}
	
.container {
	width:100%;
	height:auto;
	float:left;
}

.gb-nummer:hover {
    border: 1px #7699af solid;
	background: #7699af;
    color: #ffffff;
}

.pb-straten:hover {
    border: 1px #d2e2ec solid;
    background: #d2e2ec;
    color: #3a6d8e;
}


	
.pb-straten {
    min-width: 400px;
    height: auto;
    float: left;
    background: #ffffff;
    border-radius: 5px;
    padding: 5px;
    margin: 10px;
    border: 1px #b5cad8 solid;
	cursor:pointer;
}

.bp-straat {
	width: 300px;
    height: auto;
    float: left;
    margin: 5px 10px;
}

.bp-nrs {
	width: 80px;
    height: auto;
    float: left;
    margin: 5px 10px;		
}

	.subtitle {
	    background: #ffffff;
    border-radius: 5px;	
	}

</style>
<div class="wrapper">
	<div class="pop-title">
		<h2>Gebied binnenmelden</h2>
	</div>
	<div class="container">
	<div class="pb-13">
		<div class="pop-title subtitle">
			<h3>Binnengemelde gebieden</h3>
		</div>
		<div class="pb-br-gb">
			<div class="br-veld">
				<h4>Br. H La Rose</h4>
			</div>
			<div class="gb-veld">
				<div class="gb-nummer">
					<p>1</p>
				</div>
				<div class="gb-nummer">
					<p>3</p>
				</div>
				<div class="gb-nummer">
					<p>4</p>
				</div>
				<div class="gb-nummer">
					<p>6</p>
				</div>
				<div class="gb-nummer">
					<p>74</p>
				</div>
				<div class="gb-nummer">
					<p>122</p>
				</div>				
			</div>
		</div>
		<div class="pb-br-gb">
			<div class="br-veld">
				<h4>Br. H La Rose</h4>
			</div>
			<div class="gb-veld">
				<div class="gb-nummer">
					<p>1</p>
				</div>
				<div class="gb-nummer">
					<p>3</p>
				</div>
				<div class="gb-nummer">
					<p>4</p>
				</div>
				<div class="gb-nummer">
					<p>6</p>
				</div>
				<div class="gb-nummer">
					<p>74</p>
				</div>
				<div class="gb-nummer">
					<p>122</p>
				</div>				
			</div>
		</div>
	</div>
	
	<div class="pb-23">
		<div class="pop-title subtitle">
			<h3>Straten van gebied 2</h3>
		</div>
		<div class="pb-straten">
			<div class="bp-straat">
				<h4>Gladiolenstraat</h4>
			</div>
			<div class="bp-nrs">
				<h4>1 - 24</h4>			
			</div>
		</div>
	</div>
	
	<div class="pb-33">
		<div class="pop-title subtitle">
			<h3>Huisnummers van Gladiolenstraat</h3>
		</div>	
			<div class="gb-veld">
				<div class="gb-nummer">
					<p>1</p>
				</div>
				<div class="gb-nummer">
					<p>3</p>
				</div>
				<div class="gb-nummer">
					<p>4</p>
				</div>
				<div class="gb-nummer">
					<p>6</p>
				</div>
				<div class="gb-nummer">
					<p>74</p>
				</div>
				<div class="gb-nummer">
					<p>122</p>
				</div>				
			</div>		
	</div>
	
</div>	
</div>

<!-- footer -->
<?php include '/includes/footer.php';?>