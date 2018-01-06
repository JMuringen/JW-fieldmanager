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
		
		.dropd {
			    width: 169px;
   height: auto;
			    z-index: 99999;
    position: relative;
			background-color:#ffffff;
			margin:10% auto 0 auto;
			text-align:center;
			font-size:16px;
			font-family:sans-serif;
			border-radius:7px;
		}
		
		.dropd .dd-title {
    width: 100%;
    height: 30px;
    line-height: 1px;
    padding: 5px 0;
    float: left;
    margin: 0;
    background-color: #578e9e;
    border-radius: 7px;
    color: #ffffff;
	transition-timing-function: ease-in-out;
}
		
			.dropd .dd-title:hover {
    border-radius: 7px 7px 7px 7px;

}
		
		.dropd ul {
			width:100%;
			height:300px;
			overflow-y: auto;
			color:#2d697b;
			padding:0;
			
		}
		
	
		
		
		.dropd ul li {
			width:100%;
			height:30px;
			padding:5px 0;
			list-style: none;
			float:left;
			margin:0;
    		border-bottom-style: solid;
			border-color:#dedede;
			line-height:1px;
			border-width: 1px;
		}
			
			
			.svolledig {
	width: 100%;
	height:20p%;
	font-size:16px;
	display:flex;
	flex-direction: row;
	background-color: #b3ced6;
	border-radius:7px 7px 0 0;
}

.snaam {
	width:60%;
height:40px;
	line-height:0px;
	padding:5px 5%;
	
}

.terug {
	width:20%;
	height:40px;
	line-height:0px;
	padding:5px;
	text-align-last: center;
	
	
}

.terug:hover {
	color:#ffffff;
	background-color:#599eb1;
}

.annuleer, annu {
	width:20%;
	height:40px;
	line-height:0px;
	padding:5px;
	text-align-last: center;
	border-radius:0 7px 0 0;
	
}

.annuleer:hover, annu:hover {
	color:#ffffff;
	background-color: #cc5555;
	
}

.vraagveld {
	width:100%;
	height:60px;
	margin:10px auto 0 auto;
	
	
}

.vraagveld-button {
	width:100%;
	height:auto;
	margin:auto;

}

.vvb {
	width:40%;
	height:40px;
	margin:10px auto 10px auto;
	background-color:#599eb1;
	border-radius:5px;
	color:#ffffff;
	cursor:pointer;
}

.vvbhover {
	background-color:#599eb1;
}

.vvb >p {
	
	margin:10px auto 10px auto;
	text-align: center;
	padding:10px;
}

.inputnb {
	width:40%;
	margin:0px auto;
	height:40px;
	
}

.search {
	
    background-color:#b3ced6;
    margin:0 auto 20px auto;
    width:50%;
    min-width:154px;
    height:30px;
    border-radius: 5px;
    z-index: 2;
	
	
}

.search input {
	width:100%;
	height:30px;
	border-radius:5px;
}

.inputnb > input {
	width:100%;
	height:30px;
	margin:10px auto 10px auto;
 	border-radius:5px;
	background-color:#b3ced6;
	border:none;
	text-align:center;
	font-family: sans-serif;
	font-size: 16px;
}



.vraagveld > p {
	margin:10px auto 10px auto;
	text-align:center;
	height:20px;
	
}

.aangeven {
    width: 100%;
    height: 60%;
    display: flex;
}

.aangnb-veld, .aangat-veld, .aangan-veld {
	width:65%;

}

.aangnbk, .aangatk, .aangank{
	width:35%;
	height:auto;
	min-width:130px;
	min-height: 130px;
	flex:1;	
} 

.aangnb, .aangat, .aangan{
	width:30%;
	height:auto;
	min-width:130px;
	min-height: 130px;
	cursor: pointer;
	    flex: 1;
}

.popup {
    position: relative;
    top: 50%;
    transform: translateY(-50%);
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    width: 40%;
    min-width: 650px;
    margin: 0px auto;
    height: 20%;
    min-height: 300px;
    background-color: #ffffff;
    z-index: 999;
    border-radius: 7px;
    -webkit-box-shadow: 0px 0px 10px 1px rgba(122,122,122,1);
    -moz-box-shadow: 0px 0px 10px 1px rgba(122,122,122,1);
    box-shadow: 0px 0px 10px 1px rgba(122,122,122,1);
    border-radius: 7px;
    -webkit-transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
    font-family: sans-serif;
}

.aangnb > img, .aangat > img, .aangan > img{
width:40%;
height:auto;
margin:0px auto;
	display:block;
		-webkit-transform: translateY(50%);
  	-ms-transform: translateY(50%);
  	transform: translateY(50%);
}

.aangnbk > img, .aangatk > img, .aangank > img{
width:30%;
height:auto;
margin:0px auto;
	display:block;
	
	-webkit-transform: translateY(100%);
  	-ms-transform: translateY(100%);
  	transform: translateY(100%); 
}


.pictexten {
	width:100%;
	height:20%;
	display:flex;
}

.pictext {
	flex:1;
	height:auto;
	height:40px;
	text-align: center;
	display:inline-block;
	font-size:16px;
	color:#237084;
	
}

.nbn {
	margin:0 5% 0 0;
}
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    /* display: none; <- Crashes Chrome on hover */
    -webkit-appearance: none;
    margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
}
			html, body {
    width: 100%;
    height: auto;
    position: absolute;
    margin: 0;
}	
			
			.geselecteerd {
				background-color:#74a8b7 !important;
			}
		.stepcontainer {
    position: fixed;
    z-index: 5;
    font-family: sans-serif;
    margin: 10%;
    float: left;
    width: 80%;
    height: auto;
    background-color: #ffffff;
    border-radius: 7px;
    -webkit-box-shadow: 0px 0px 5px 0px rgba(50, 50, 50, 0.75);
    -moz-box-shadow: 0px 0px 5px 0px rgba(50, 50, 50, 0.75);
    box-shadow: 0px 0px 5px 0px rgba(50, 50, 50, 0.75);
}
			
	.letopcontainer {
    position: fixed;
    font-family: sans-serif;
    margin: 0 30%;
    top: 30%;
    float: left;
    width: 40%;
    z-index: 999;
    height: auto;
    background-color:#ffffff;
    border-radius: 7px;
    -webkit-box-shadow: 0px 0px 5px 0px rgba(50, 50, 50, 0.75);
    -moz-box-shadow: 0px 0px 5px 0px rgba(50, 50, 50, 0.75);
    box-shadow: 0px 0px 5px 0px rgba(50, 50, 50, 0.75);
}
		
		.stepcontainer .alert, .letopcontainer .alert {
			width:94%;
			padding:3%;
			height:auto;
			float:left;
			}
			
		.stepcontainer .alert .steptitle, .stepcontainer .alert .steptitle {
			height:auto;
			float:left;
			text-align:center;
		}	
			
		.fouts {
				width:180px;
				height:60px;
				background-color: rgba(230, 71, 71, 0.8);
				color:#ffffff;
				float:left;
				position:relative;
				z-index:1;
				top:-60;
				left:800px;
				border-radius:7px;
				padding:10px;
				line-height:1;
			}	
			
		.stepcontainer .alert .steptitle {
			width:100%;
			color:#599eb1;
		}	
		
		.letopcontainer .alert .steptitle {
    		width: 100%;
			color: #7e0000;
    		text-align: center;
    		font-size: 16px;
		}
	
		.stepcontainer .alert .steptekst {
			float:left;
			width:100%;
			height:auto;
			font-size:16px;
		}
			
		.stepcopcontainer .alert .steptekst {
			color:#676767;
		}
			
		.letopcontainer .alert .steptekst {
			color:#676767;
		}
			
		.stepcontainer .stepalert .buttonalert {
				width:50%;
				float:left;	
			}
			
			.letopcontainer.stepalert .buttonalert, .de4destap .alert .stepalert .buttonalert{
				width:100%;
				
			}
			
			.buttonalert {
				margin:20px 0 0 0;
				height:auto;
			}
			
			.nb {
	background-color:#ce2f2f;
	color:#ffffff;
}
.att {
	background-color:#599eb1;
	color:#ffffff;
}		
			
			.volstraatennrs {
    margin: 0 0 20px 0;
    width: 760px;
    padding: 20px;
    height: 40px;
    border-radius: 7px;
    float: left;
    background-color: rgba(89, 158, 177, 0.37);
}
			
			.volstraatennrs:hover {
				background-color:rgba(89, 158, 177, 0.69);
			}
			
			.straatennrs {
    width: 750px;
    height: 40px;
    float: left;
}
			
	.gbn-con {
    position: relative;
    z-index: 10;
    float: left;
    padding: 25px;
    width: 200px;
    height: 40px;
    background-color: #e4eff3;
    border-radius: 5px;
}
			
			.gbn-con label {
    margin: 0 10px 0 0;
    color: #599eb1;
    font-size: 16px;
}
			
			
.straatnummers {
    display: inline-block;
    width: auto;
    min-width: 40px;
    padding: 10px;
    height: 40px;
    margin: 15px;
    border-radius: 7px;
    line-height: 10px;
}

.straatnummers p {
    text-align: center;
}

.straatnummers {
	cursor: pointer;
}
			
			.gn-inp {
				
				width:40px;
				height:40px;
				
				border-radius:5px;
				border:none;
				font-size:16px;
				text-align:center;
			}
			
			.meld {
				position: relative;
				z-index: 1;
				margin: 0 0 0 -10px;
    			float: left;
    			text-align: center;
    			padding: 25px;
    			width: 330px;
    			line-height: 10px;
    			height: 40px;
				border-radius: 5px;
			}
			.melding-gw {
    			color: #218a0e;
    			background-color: rgba(78, 239, 48, 0.31);
			}
			
			.melding-gn {
    			color: #8a0e0e;
    			background-color: rgba(239, 48, 48, 0.31);
			}
			
			.nrinput {
				width:40px;
				height:40px;
				margin:0 20px;
				border-radius:5px;
				border:none;
				font-size:16px;
				text-align:center;
			}
			
			.vnht {
				width: 40px;
				height: 40px;
				margin: 0 20px;
				border-radius: 5px;
				border: none;
				font-size: 16px;
				text-align: center;
				float: left;
				line-height: 40px;
				background-color: #b3ced6;
				color: #397287;
			}
			
			.vnht:hover {
				background-color: #ffcf82;
				color: #ffffff;
			}
			
			
			.checkinput {
				width:16px;
				height:16px;
				margin:0 0 0 10px;
				border-radius:5px;
				border:none;
			}
			
			.gbenmelding {
    		float: left;
    		width: 620px;
    		height: auto;
				background-color: rgb(255, 255, 255);
			}
			
			.straatinput{
				padding:5px;
				float:left;
				width:200px;
				height:40px;
				margin:0 20px;
				border-radius:5px;
				border:none;
				font-size:16px;
			}
			
			.vscontainer, .stap4container {
				width:100%;
				height:auto;
				float:left;
			}
			
			.stepalert {
				width:100%;
				float:left;
				height:auto;
			}
			
			.straatveldt {
				width:40px;
				height:40px;
				float:right;
			}
			
			.straatveldt img {
				width:40px;
				height:40px;
				float:right;
				-webkit-transition: -webkit-transform 0.2s ease-in-out;
			}
			
			.straatveldt img {
				
			}

			.stepcontainer .stepalert .buttonalert .button, .letopcontainer .stepalert .buttonalert .button, .buttoneerst .button {
				font-size:16px;
				width:200px;
				height:auto;
				padding:1%;
				text-align: center;
				line-height: 1px;
				border-radius:7px;
				margin:20px auto;
			}
			.buttonalert .button:hover, .buttoneerst .button:hover, .adds:hover, .deletes:hover, .bind:hover {
    background-color: #276d81;
    color: #ffffff;
}
			.stepcontainer .stepalert .buttonalert .button {
    color: #265664;
    background-color: #d3e3e9;
}
			.stepcontainer .stepalert .buttonalert .button:hover {
   color: #ffffff;
    		background-color: #276d81;
}
			
			.letopcontainer .stepalert .buttonalert .verderk {
			color: #ffffff;
    		background-color: #77abba;
			}
			
			.letopcontainer .stepalert .buttonalert .afsluitk {
				color: #ffffff;
    			background-color: rgba(136, 20, 20, 0.20);	
			}
			
			.letopcontainer .stepalert .buttonalert .verderk:hover {
			color: #ffffff;
    		background-color: #276d81;
			}
			
			.letopcontainer .stepalert .buttonalert .afsluitk:hover {
				color: #ffffff;
    			background-color: rgba(136, 20, 20, 0.74);	
			}
			
				
			
			.adds, .deletes, .bind {
				float:left;
				font-size:16px;
				width:150px;
				height:auto;
				padding:0.1%;
				color:#265664;
				background-color: #b3ced6;
				text-align: center;
				line-height: 1px;
				border-radius:7px;
				margin:20px 20px 20px 0;
			}
			
			.bigncont {
				margin:0 0 20px 0;
				width:700px;
				height:auto;
				padding:20px;
				border-radius:7px;
				float:left;
				background-color:rgba(179, 206, 214, 0.27);
			}
			
			.gnum {
				float:left;
				width:30px;
				height:30px;
				padding:10px;
				border-radius:7px;
				background-color:#b3ced6;
				text-align:center;
				line-height:1px;
			}
			.gnumcon {
    float: left;
    /* margin: 10px; */
    width: 50px;
    height: 50px;
    padding: 10px;
    border-radius: 7px;
 
}
			
			.abvoeg {
    font-size: 16px;
    width: 150px;
    height: auto;
    padding: 0.1%;
    color: #265664;
    background-color: rgba(25, 72, 95, 0.51);
    text-align: center;
    line-height: 1px;
    border-radius: 7px;
    margin: auto;
    color: rgba(195, 215, 220, 0.8);
}

.volstraatennrs .abcont {
    bottom: 190px !important;
    left: 559px !important;
}
			
.abcont {
    border-radius: 7px;
    width: 198px;
    height: auto;
    float: left;
    background-color: rgba(89, 158, 177, 0.95);
    z-index: 9999;
    position: relative;
    bottom: 195px;
    right: 75px;
}
			
			.abcboven {
    			padding: 10px;
    			width: 178px;
    			height: 40px;
    			float: left;
    			border-radius: 5px 5px 0 0;
			}
			
			.abconder {
				padding:10px;
				width:178px;
				height:40px;
				float:left;
				border-radius:  0 0 5px 5px;
			}
			
			.bottomv {
				width:50px;
				height:40px;
				margin:auto;
				
			}
			
			.bottomv img {
				width:50px;
				height:auto;
				opacity:0.95;
			}
			
			.buttoneerst .button {
    background-color: rgba(179, 206, 214, 0.36);
}
			
			
			.bind {
				color:#ffffff;
				background-color:red;
			}
			
			.abvoeg:hover{
				color:#ffffff;
				    background-color: rgb(25, 72, 95);
			
			}
			
			.buttonalert .button:hover, .buttoneerst .button:hover, .adds:hover, .deletes:hover, .bind:hover{
				background-color:#599eb1;
				color:#ffffff;
			}
			.option-titel {
    width: 86%;
    text-align: center;
    height: 30px;
    padding: 15px 7%;
    background-color: #578e9e;
    border-radius: 5px 5px 0 0;
    line-height: 1px;
    color: #ffffff;
}
			
.optionbar, .optionbar-s {
    margin: 50px auto;
    text-align: center;
    padding: 20px 0;
    /* border: 2px solid #578e9e; */
    background-color: #578e9e;
    color: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px 5px 0 0;
    font-size: 16px;
}

.optionbar{
	 width: 30%;
    min-width: 300px;	
}
			
.optionbar-n {
    width: 100%;
    min-width: 468px;
    background-color: rgba(195, 218, 224, 0.18);
	border-radius:7px;
}			

.optionbar-s {
	 width: 50%;
    min-width: 300px;	
}
   		
			
.nieuwebuurt {
    position: relative;
    z-index: 2;
    height: 160px;
    margin: 50px auto 0 auto;
    text-align: center;
    padding: 20px 0;
    /* border: 2px solid #578e9e; */
    background-color: rgb(228, 239, 243);
    color: #ffffff;
    width: 400px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    font-size: 16px;
    color: #599eb1;
}
			
.buurtbestaat {
    position: relative;
    z-index: 1;
    margin: -10 auto 20px auto;
    text-align: center;
    padding: 20px 0 10px 0;
    line-height: 1px;
    width: 400px;
    height: 30px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
}
			
.melding-nb {
    width: 400px;
    margin: auto;
    height: 50px;
}


	
.buurtniet {
    position: relative;
    z-index: 1;
    margin: -10 auto 20px auto;
    text-align: center;
    padding: 20px 0 10px 0;
    line-height: 1px;
    width: 400px;
    height: 30px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
}	

.don {
	 background-color: rgba(136, 224, 158, 0.59) !important;
}	

.ndon {
	 background-color: rgba(255, 197, 85, 0.8) !important;
}	
    
			
.klaar {
	background-color:rgba(101, 204, 58, 0.54) !important;
}

.nietklaar {
	background-color:rgba(255, 168, 0, 0.50) !important;
}
	
.straatrood	{
	color:#ffffff;
	background-color:red !important;
}
			

			
.aansl {
    width: 100px;
    display: inline;
    height: 30px;
    background-color: rgb(221, 236, 241);
    padding: 10px;
    color: #599eb1;
    border-radius: 3px;
}
			
.aansl:hover{
    background-color:#ffcf82;
	 color:#ffffff;
}

.ht {
    width: 80px;
    height: 50px;
	display: inline;
}
				
			
.honderdt {
    width: 60px;
    display: inline;
    height: 30px;
    background-color: rgb(221, 236, 241);
    padding: 10px;
    margin: 10px;
    color: #599eb1;
    border-radius: 3px;
}
			
.optionbar-n:hover {
    width: 100%;
    min-width: 468px;
}		
			
		
.optionbar ul, .optionbar-s ul {
    float: left; 
	width:100%; 
	border-radius: 0 0 5px 5px;
    display: block; 
    padding: 0 !important;
    background-color: #b3ced6;
}			
			

.optionbar > ul > li{
	padding: 15px 0;
}

.optionbar > ul > li, .optionbar-s > ul > li{
    float: left;
    width: 100%;
    list-style: none;
}
			
.osstraat {
	float: left;
	width: 75%;
}
			
.osnummers {
	float: left;
	width: 25%;
}		
			
.stap4left {
    min-width: 330px;
    width: 100%;
    height: auto;
    float: left;
	transition:ease-in-out;
   -webkit-transition:ease-in-out;
}
			
.letop-verder {
	background-color: rgb(255, 255, 255);		
}
.letop-tit {
    color: #616161 !important;				
}
			
.stap4right {
	width:0%;
	height:auto;
	float:left;	
	background-color
}

.button, .terugp, .annuleer, .annu, .optionbar > ul > li, .optionbar-s > ul > li {
	cursor:pointer;
}
			
			
.optionbar ul li:last-child{		
		border-radius:0 0 5px 5px;	
		background-color: #ffcf82;
	
}
			
			.optionbar-s ul li:last-child {
					border-radius:0 0 5px 5px;
			}			

.optionbar:hover > ul > li:hover, .optionbar-s:hover > ul > li:hover {  
	background-color: rgba(75, 132, 148, 0.53);
	
}
.optionbar ul li:last-child:hover{				
			background-color: #e4ac44;
}		

			.aansl-bew {
				background-color: #ffcf82;
				color:#ffffff;
			}
			
.nieuweb-inp {
    width: 250px;
    height: 40px;
    border: none;
    background-color:#ffffff;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 16px;
    text-align: center;
}
			
.annuleerbar {
    width: 100%;
    height: 50px;
    float: left;
    border-radius: 5px;
}
		
			
.annuleerbar .annuleer, .annuleerbar .terugp{
    float: right;
	height: 40px;
    line-height: 10px;
    padding: 5px;
    text-align-last: center;
}
.annuleerbar .annuleer {
    width:15%;
    border-radius: 0 7px 0 0;
    background-color: rgba(204, 85, 85, 0.33);
}
			
.annuleerbar .terugp {
    float: right;
    width: 10%;
    border-radius: 0 0 0 7px;
    background-color: rgba(228, 239, 243, 0.4);
}

.annuleerbar .annuleer:hover, .annuleerbar .terugp:hover  {
	color:#ffffff;
}

.annuleerbar .annuleer:hover {
	background-color: #cc5555;
}

.annuleerbar .terugp:hover  {
	background-color: #b3ced6;
}
			
.overlay {
    position: absolute;
    float: left;
    z-index: 999;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.56);
}
			
.hoverlay {
    position: absolute;
    float: left;
    z-index: 4;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.56);
}