 // QRCODE reader Copyright 2011 Lazar Laszlo
// http://www.webqr.com

var gCtx = null;
var gCanvas = null;
var c=0;
var stype=0;
var gUM=false;
var webkit=false;
var moz=false;
var v=null;

var imghtml='<div id="qrfile"><canvas id="out-canvas" width="150" height="150"></canvas>'+
    '<div id="imghelp">drag and drop a QRCode here'+
	'<br>or select a file'+
	'<input type="file" onchange="handleFiles(this.files)"/>'+
	'</div>'+
'</div>';

var vidhtml = '<video id="v" autoplay></video>';

$(document).ready(function(){
	var formattedDate = new Date();
	var d = formattedDate.getDate();
	var m =  formattedDate.getMonth();
	m += 1;  // JavaScript months are 0-11
	var y = formattedDate.getFullYear();

	$('.vandaag').val(y+"-"+m+"-"+d);
});


function dragenter(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover(e) {
  e.stopPropagation();
  e.preventDefault();
}
function drop(e) {
  e.stopPropagation();
  e.preventDefault();

  var dt = e.dataTransfer;
  var files = dt.files;
  if(files.length>0)
  {
	handleFiles(files);
  }
  else
  if(dt.getData('URL'))
  {
	qrcode.decode(dt.getData('URL'));
  }
}

function handleFiles(f)
{
	var o=[];
	
	for(var i =0;i<f.length;i++)
	{
        var reader = new FileReader();
        reader.onload = (function(theFile) {
        return function(e) {
            gCtx.clearRect(0, 0, gCanvas.width, gCanvas.height);

			qrcode.decode(e.target.result);
        };
        })(f[i]);
        reader.readAsDataURL(f[i]);	
    }
}

function initCanvas(w,h)
{
    gCanvas = document.getElementById("qr-canvas");
    gCanvas.style.width = w + "px";
    gCanvas.style.height = h + "px";
    gCanvas.width = w;
    gCanvas.height = h;
    gCtx = gCanvas.getContext("2d");
    gCtx.clearRect(0, 0, w, h);
}


function captureToCanvas() {
    if(stype!=1)
        return;
    if(gUM)
    {
        try{
            gCtx.drawImage(v,0,0);
            try{
                qrcode.decode();
            }
            catch(e){       
                console.log(e);
                setTimeout(captureToCanvas, 500);
            };
        }
        catch(e){       
                console.log(e);
                setTimeout(captureToCanvas, 500);
        };
    }
}

function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}

function setgegevens() {
	var naam = "Br. H La Rose";
	var nummer = "1";
	var gid = "2"
	authenticate(gid ,naam, nummer);
}
	
function authenticate(gid, naam, nummer) {	
	var gebied = $(".gebied-result");
	
	//Voor elk gebied kijken of 
	$(gebied).each(function() {
		
		var gebied = $(this);
		
		var gnummer = $(this).find(".rnr").text();
		var gnummervol = $(this).find(".rnr-vol").val();
		var id = $(this).find(".rid").val();
		var gname = $(this).find(".rn").text();	
		var space = "&nbsp;";
		var comma = ",";
		
		//Als de naam van het gescande gebied al gebruikt is, gebied nummer nakijken
		if (gid == id && naam == gname) {
			var result = gebied;
			gebiedscannen(result, id, gname, nummer, gnummervol);
		} else {
		//Als de naam nog niet eerder gebruikt is
		}
	});
}

function uploadverkorting(result, nummer, gegevens, optelmand) {
	var ingekort = optelmand.toString();
	$(result).find(".rnr").text(ingekort);
	$(result).find(".rnr-vol").val(gegevens);
	
	alert("Nummer(s) "+optelmand+" zijn toegevoegd aan de lijst van "+gegevens[2]+"");
}

function inkorten(result, nummer, gegevens){
	var a = [];
	var c = 0;
	var d = 0;
	var e = 0;
	var eerste = gegevens[1][0];
	var laatste = gegevens[1].slice(-1)[0];
	var enelaatste = gegevens[1].slice(-2)[0];
	var vergelijking = [];
	var optelmand = [];
	
	//Zolang de lengte van de array groter is dan NULL
	while(gegevens[1].length > c) {

		var cijfer = (gegevens[1][c]); //Huidige telling waarde
		
		//Als Cijfer index telling gelijk is aan de eerste waarde		
		if(cijfer == eerste) {
			vergelijking.push(cijfer); //Push het 1ste vergelijkingscijfer in optelmand-array

			if(gegevens[1].length == 1) {
				optelmand.push(cijfer); //Push het 2de vergelijkingscijfer in optelmand-array	
			}
			c++;  //Telling + 1
			
		//Zolang Cijfer niet gelijk staat aan de vorige waarde in vergelijking-array + 1
		} else if (cijfer != vergelijking[d] + 1) {
			
			vergelijking.push(cijfer); //Push het huidige cijfer in vergelijk-array
			
			//Als Cijfer gelijk staat aan de 2de waarde in vergelijking-array
			if(cijfer == vergelijking[1]) {

				if(vergelijking[0] == enelaatste && cijfer == laatste) {
					optelmand.push(vergelijking[0]); //Push het 1ste vergelijkingscijfer in optelmand-array	
					optelmand.push(cijfer); //Push het 2de vergelijkingscijfer in optelmand-array	
					c++; //Telling + 1
				} else {
					optelmand.push(vergelijking[0]); //Push het 1ste vergelijkingscijfer in optelmand
					vergelijking = []; //Maak de vergelijking-array leeg
					vergelijking.push(cijfer); //Push het 1ste vergelijkingscijfer in optelmand-array
					d = 0; //Maak de vergelijking-array leeg
				}

			//Als Cijfer gelijk staat aan de 3de waarde in vergelijking-array	
			} else if (cijfer == vergelijking[2]) {

				
				if(vergelijking[2] == laatste) {
					optelmand.push(vergelijking[0]); //Push het 1ste vergelijkingscijfer in optelmand-array	
					optelmand.push(vergelijking[1]); //Push het 2de vergelijkingscijfer in optelmand-array	
					optelmand.push(cijfer); //Push het 2de vergelijkingscijfer in optelmand-array	
					c++; //Telling + 1
				} else {
					optelmand.push(vergelijking[0]); //Push het 1ste vergelijkingscijfer in optelmand-array	
					optelmand.push(vergelijking[1]); //Push het 2de vergelijkingscijfer in optelmand-array	
					vergelijking = []; //Maak de vergelijking-array leeg
					vergelijking.push(cijfer); //push het 1ste vergelijkingscijfer in optelmand-array
					d = 0; //Maak de vergelijking-array leeg
				}
			
			//Als Cijfer gelijk/hoger staat aan de 4de waarde in vergelijking-array
			} else if (cijfer >= vergelijking[3]) {
				optelmand.push(vergelijking[0]+"-"+vergelijking[d]); //Push de 1ste - laatste waarde van vergelijking-array in de optelmand-array	
				vergelijking = []; //Maak de vergelijking-array leeg
				vergelijking.push(cijfer); //Push het cijfer in een nieuwe Array nieuwelijst (verhoog de index met +1)
				d = 0; //Maak de vergelijking-array leeg

				if(cijfer == laatste) {
				   optelmand.push(cijfer);		
				}
			} 
			c++;  //Telling + 1
			
		//Als Cijfer gelijk staat aan de laatste waarde van de loop	
		} else if(vergelijking[0] == enelaatste && cijfer == laatste) {
			optelmand.push(vergelijking[0]); //Push het 1ste vergelijkingscijfer in optelmand-array	
			optelmand.push(cijfer); //Push het 2de vergelijkingscijfer in optelmand-array	
			c++; //Telling + 1
		} else {
			vergelijking.push(cijfer); //Push het Cijfer in vergelijking-array
			c++; //Telling + 1
			d++; //Telling + 1		
			
			if(cijfer == laatste) {
				optelmand.push(vergelijking[0]+"-"+vergelijking[d]); //Push de 1ste - laatste waarde van vergelijking-array in de optelmand-array	
				vergelijking = []; //Maak de vergelijking-array leeg
				vergelijking.push(cijfer); //Push het cijfer in een nieuwe Array nieuwelijst (verhoog de index met +1)
				d = 0; //Maak de vergelijking-array leeg
			}
		}
	} 
	uploadverkorting(result, nummer, gegevens, optelmand);
}
	

	
function gebiedscannen(result, id, gname, nummer, gnummervol){
	var a = [];
	a[0] = [id,[gnummervol],gname];
	var gegevens = a[0];
	gegevens[1].push(nummer);
	gegevens[1].sort(function(a, b){return a - b});
	inkorten(result, nummer, gegevens);
}
	


function read(a)
{
    var html="<br>";
    if(a.indexOf("http://") === 0 || a.indexOf("https://") === 0)
        html+="<a target='_blank' href='"+a+"'>"+a+"</a><br>";
    html+="<b>"+htmlEntities(a)+"</b><br><br>";
    document.getElementById("result").innerHTML=html;
    
	var dataString = { send : true , credential : htmlEntities(a) };
		
					$.ajax({
		
						type: "POST",
						url: "authenticate.php",
						data: dataString,
						dataType: "json",
						cache : false,
						success: function(data){

							if(data.success == true){
                            alert("Gebiednummer 1 is toegevoegd!");
							setgegevens();
							setwebcam();	
	
							} else {
                             alert("Dit gebied is onbekend");
                            }
							
							setwebcam();
					
				  
						} ,error: function(xhr, status, error) {
							alert(error);
						},
					}); 

}	

function isCanvasSupported(){
  var elem = document.createElement('canvas');
  return !!(elem.getContext && elem.getContext('2d'));
}
function success(stream) {
    if(webkit)
        v.src = window.webkitURL.createObjectURL(stream);
    else
    if(moz)
    {
        v.mozSrcObject = stream;
        v.play();
    }
    else
        v.srcObject = stream
    gUM=true;
    setTimeout(captureToCanvas, 500);
}
		
function error(error) {
    gUM=false;
    return;
}

function load()
{
	if(isCanvasSupported() && window.File && window.FileReader)
	{
		initCanvas(150, 150);
		qrcode.callback = read;
		document.getElementById("mainbody").style.display="inline";
        setwebcam();
	}
	else
	{
		document.getElementById("mainbody").style.display="inline";
		document.getElementById("mainbody").innerHTML='<p id="mp1">QR code scanner for HTML5 capable browsers</p><br>'+
        '<br><p id="mp2">sorry your browser is not supported</p><br><br>'+
        '<p id="mp1">try <a href="http://www.mozilla.com/firefox"><img src="firefox.png"/></a> or <a href="http://chrome.google.com"><img src="chrome_logo.gif"/></a> or <a href="http://www.opera.com"><img src="Opera-logo.png"/></a></p>';
	}
}

function setwebcam()
{
	document.getElementById("result").innerHTML="- scanning -";
    if(stype==1)
    {
        setTimeout(captureToCanvas, 500);    
        return;
    }
    var n=navigator;
    document.getElementById("outdiv").innerHTML = vidhtml;
    v=document.getElementById("v");

    if(n.getUserMedia)
        n.getUserMedia({video: true, audio: false}, success, error);
    else
    if(n.webkitGetUserMedia)
    {
        webkit=true;
        n.webkitGetUserMedia({video: true, audio: false}, success, error);
    }
    else
    if(n.mozGetUserMedia)
    {
        moz=true;
        n.mozGetUserMedia({video: true, audio: false}, success, error);
    }

    //document.getElementById("qrimg").src="qrimg2.png";
    //document.getElementById("webcamimg").src="webcam.png";
    document.getElementById("qrimg").style.opacity=0.2;
    document.getElementById("webcamimg").style.opacity=1.0;

    stype=1;
    setTimeout(captureToCanvas, 500);
}

function setimg()
{
	document.getElementById("result").innerHTML="";
    if(stype==2)
        return;
    document.getElementById("outdiv").innerHTML = imghtml;
    //document.getElementById("qrimg").src="qrimg.png";
    //document.getElementById("webcamimg").src="webcam2.png";
    document.getElementById("qrimg").style.opacity=1.0;
    document.getElementById("webcamimg").style.opacity=0.2;
    var qrfile = document.getElementById("qrfile");
    qrfile.addEventListener("dragenter", dragenter, false);  
    qrfile.addEventListener("dragover", dragover, false);  
    qrfile.addEventListener("drop", drop, false);
    stype=2;
}
