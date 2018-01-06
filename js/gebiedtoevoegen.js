$(document).ready(function() {


	
$('.gtoevoeg-knop').live('click', function() {
	
					  $('.wrapper').load('../php/buurtkiezen.php');
				
					$('<div class="stepcontainer debuurtaanmaak"><div class="annuleerbar"><div class="annuleer"><p>Annuleer</p></div><div class="terugp"><p>Terug</p></div></div><div class="alert"><div class="steptitle stap1con"><h2>Stap 1: Een buurt binnen het gebied kiezen</h2><div class="nieuwebuurt"><p>Type hieronder de desbetreffende buurt in</p><input class="nieuweb-inp" type="text" placeholder="Bijv. Landgoederenbuurt"/><div class="buttoneerst"><div class="button step2"><p>Naar stap 2</p></div></div></div><div class="melding-nb"></div></div></div></div>').hide().appendTo($('body'));
	
	
	$('<div class="stepcontainer de2destap"><div class="annuleerbar"><div class="annuleer"><p>Annuleer</p></div></div><div class="alert"><div class="steptitle"><h2>Stap 2: Gebiedskaart aanmaken</h2></div><div class="steptekst"><p>Hieronder kun je zoeken naar het betreffende gebied.<br> Vervolgens kun je op de kaart klikken met je linkermuisknop om een markeerpunt neer te zetten.<br>Klik vervolgens op een ander stukje van de kaart en markeer om het gebied heen dat je wil highlighten. Je sluit het af door op het eerst geplaatste markeerpunt te klikken.</p></div><div class="gbenmelding"><div class="gbn-con"><label>Gebiednummer</label><input class="gn-inp inp" type="number" /></div><div class="meldcontainer"></div></div></div><input id="pac-input" class="controls" type="text" placeholder="Search Box" value="Amsterdam"><div id="map-canvas"></div><div class="stepalert"><div class="buttonalert"><div class="button opnieuw"><p>Opnieuw selecteren</p></div></div><div class="buttonalert"><div class="button step3"><p>Naar stap 3</p></div></div></div></div>').hide().appendTo($('body'));
	
	
						
				
	
});	
	

	
function nummertoevoeging(gnum) {
			$('.abcont').remove();
			
	
			$('<div class="abcont"><div class="abcboven"><input class="vanafnr nrinput inp" type="text" minlength="1" maxlength="1" style="text-transform:uppercase"><label>tot</label><input class="totnr nrinput inp" type="text" minlength="1" maxlength="1" style="text-transform:uppercase"></div><div class="abconder"><div class="button abvoeg"><p>Voeg toe</p></div></div><div class="bottomv"><img src="/img/bottomvink.png"></div></div>').hide().appendTo($(gnum).parent()).fadeIn(500);
	
			$(".abcboven .inp").keyup(function() {
			
			var regexp = /[^a-zA-Z]/g;
			if($(this).val().match(regexp)){
				$(this).val( $(this).val().replace(regexp,'') );
			}	
				
			var vn = $('.abcboven').find('.vanafnr');
			var tt = $('.abcboven').find('.totnr');	
				
			if (vn.val() > tt.val() || tt.val() == ''|| vn.val() == '') {
				$(vn).parent().removeClass('don');
				$(vn).parent().addClass('ndon');	
				$(tt).parent().removeClass('don');
				$(tt).parent().addClass('ndon');	
				
			} else {
				$(vn).parent().removeClass('ndon');
				$(vn).parent().addClass('don');	
				$(tt).parent().removeClass('ndon');
 				$(tt).parent().addClass('don');
				
				$('.abvoeg').click(function() {
				
				var nbox = $(this).parent().parent().parent();
				var bcont = nbox.parent();
				var cijfer = nbox.find('.gnum').text();
				var vanaf = $('.abcont').find('.vanafnr').val();
				var tot = $('.abcont').find('.totnr').val();
				
				var vanafn = vanaf;
				while(vanafn <= tot) {
					$('<div class="gnumcon"><div class="gnum"><p>'+cijfer+vanafn+'</p></div></div>').hide().insertAfter(nbox).delay(500).fadeIn(500);
					vanafn = String.fromCharCode(vanafn.charCodeAt(0) + 1);
				}

				
				$('.abcont').remove();
			});
			}	
 
			});		
		}	
	
function honderdtallen(honderdt) {
			$('.abcont').remove();
			$('<div class="abcont"><div class="abcboven"><input class="vanafnr nrinput inp" type="number" minlength="1" maxlength="3" style="text-transform:uppercase"><label>tot</label><input class="totnr nrinput inp" type="number" minlength="1" maxlength="3" style="text-transform:uppercase"></div><div class="abconder"><div class="button abvoeg"><p>Voeg toe</p></div></div><div class="bottomv"><img src="/img/bottomvink.png"></div></div>').hide().appendTo($(honderdt).parent()).fadeIn(500);
			
			$(".abcboven .inp").keyup(function() {
	
			var vn = $('.abcboven').find('.vanafnr');
			var tt = $('.abcboven').find('.totnr');	
	
			if (parseInt(vn.val()) >= parseInt(tt.val()) || tt.val() == ''|| vn.val() == '') {
				$(vn).parent().removeClass('don');
				$(vn).parent().addClass('ndon');		
			} else {
				$(vn).parent().removeClass('ndon');
				$(vn).parent().addClass('don');	
	
			$('.abvoeg').click(function() {
				
				var nbox = $(this).parent().parent().parent().parent().parent().siblings('.bigncont');
				var cijfer = nbox.find('.gnum').text();
				var vanaf = $('.abcont').find('.vanafnr').val();
				var tot = $('.abcont').find('.totnr').val();
		
				if (parseInt(vanaf) <= 0){
		
					$(nbox.find('.gnum')).each(function() {
				var vanafn = '1';
				while(vanafn <= tot) {
					
					var cijfer = $(this).text();
					$('<div class="gnumcon"><div class="gnum"><p>'+vanafn+cijfer+'</p></div></div>').hide().appendTo(nbox).delay(500).fadeIn(500);

					vanafn = String.fromCharCode(vanafn.charCodeAt(0) + 1);
				}
				});	
			
				} else {
					$(nbox.find('.gnum')).each(function() {
				var vanafn = vanaf;
				while(vanafn <= tot) {
					
					var cijfer = $(this).text();
					$(this).parent().remove();
					$('<div class="gnumcon"><div class="gnum"><p>'+vanafn+cijfer+'</p></div></div>').hide().appendTo(nbox).delay(500).fadeIn(500);
		
					
					vanafn = String.fromCharCode(vanafn.charCodeAt(0) + 1);
				}
				});	
		
				}
				
				
				$('.abcont').remove();
				});	
			}
			});
		}
	

	
	
function werkbijatnb(straatcode, straatnaam, nummer, nrblokje){
		$('<div class="overlay"><div class="popup allpopup"><div class="svolledig allpopup"><div class="snaam"><p>'+straatnaam+' '+nummer+'</p></div><div class="terug"><p>Ga terug</p></div><div class="annu"><p>Annuleer</p></div></div><div class="aangeven allpopup "><div class="aangnb allpopup allhm"><img class="nbn" src="/img/nbpic.png"></div><div class="aangat allpopup allhm"><img class="atn" src="/img/atpic.png"></div><div class="aangan allpopup allhm"><img class="ann" src="/img/anpic.png"></div><div class="aangnbk allw allpopup allnib"><img class="nbh" src="../img/nbpichover.png"></div><div class="aangnb-veld allw allpopup allnib"><div class="vraagveld"><p>'+straatnaam+' nummer '+nummer+' is een nietbeller sinds?<br><br>Voer hieronder de datum in</p></div><div class="inputnb allnib"><input class="nbelinput" type="date" name="nbdate"></div><div class="vraagveld-button allnib"><div class="vvb vvnb" type="button" value="voernbin"><p>Opslaan</p></div></div></div><div class="aangatk allw allat"><img class="ath" src="../img/atpichover.png"></div><div class="aangat-veld allw allpopup allat"><div class="vraagveld"><p>Spreken de bewoners een andere taal?<br><br>Voer hieronder de taal in</p></div><div class="inputnb allat"><div class="dropd"><div class="dd-title"><p>Kies een taal</p></div><ul><li><p>Nederlands</p></li><li><p>Engels</p></li><li><p>Sranantongo</p></li><li><p>Papiamentu</p></li><li><p>Twi</p></li><li><p>Duits</p></li><li><p>Spaans</p></li><li><p>Italiaans</p></li><li><p>Frans</p></li><li><p>Portugees</p></li><li><p>Armeens</p></li><li><p>Pools</p></li><li><p>Arabisch</p></li><li><p>Farsi</p></li><li><p>Marokaans</p></li><li><p>Turks</p></li></ul></div></div><div class="vraagveld-button allat"><div class="vvb vvat" type="button" value="voernbin"><p>Opslaan</p></div></div></div><div class="aangank allw allab"><img class="anh" src="../img/anpichover.png"></div><div class="aangan-veld allw allpopup allab"><div class="vraagveld"><p>Zijn er bijzonderheden omtrent '+straatnaam+' nummer '+nummer+'?<br><br>Plaats hieronder een korte omschrijving</p></div><div class="inputnb allab"><input class="anders" type="text" name="nbdate"></div><div class="vraagveld-button allab"><div class="vvb vvan" type="button" value="voernbin"><p>Opslaan</p></div></div></div></div><div class="pictexten allpopup"><p class="pictext nib">Nietbeller</p><p class="pictext ant">Anderstalig</p><p class="pictext and">Anders</p></div></div></div>').hide().appendTo($('body')).fadeIn(500);
	
				$('.allw').hide();
				$('.terug').hide();
				$('.snaam').delay(500).css("width", '70%');
			
				$('.annu').click(function(){
					$('.allpopup').hide().remove();
					$('.overlay').fadeOut(300, function(){ 
    				$(this).remove();
					});	
				});	

				function nietbelopgeven(){
					$('.snaam').css("width", '50%');
					$('.allhm').fadeOut().remove();
					$('.allnib').delay(500).fadeIn(500);
					$('.terug').slideDown(500);
					
					
					
					$('.vvnb').click(function(){
						var dates = $(".nbelinput").val();
						
						$.ajax({
							type: "POST",
							url: "../php/nietbelupdate.php",
							data: {date: dates, straatnaam: straatnaam, nummer: nummer},
							success: function(){
								
								$('.overlay').fadeOut(300, function(){ 
    								$(this).remove();
								});	
								$(nrblokje).removeClass("ab").addClass("nb");

							}
						});

						var dates = $(".nbelinput").val("");
					});	
					
				}
				
				function anderstopgeven(){
					$('.snaam').css("width", '50%');	
					$('.allhm').fadeOut().remove();
					$('.allat').delay(1000).fadeIn(500);
					$('.terug').slideDown(500);
					$('.dropd ul').hide();
	$('.dd-title').click(function() {
        
		$('.dropd ul').fadeIn(500);
		
		$('.dropd ul li').click(function() {
		
        var taal = $(this).text();
		$('.dd-title').html("<p>"+taal+"</p>");
		$('.dropd ul').fadeOut(500);

  		$('.vvat').click(function(){
						$.ajax({
							type: "POST",
							url: "../php/taalupdate.php",
							data: {taal: taal, straatnaam: straatnaam, nummer: nummer},
							success: function(){
								$('.overlay').fadeOut(300, function(){ 
    								$(this).remove();
								});	
								$(nrblokje).removeClass("ab").addClass("att");
							}
						});
						
						
		});	
		
	});
  		
		
	});
				}
	
				
	
				function andersopgeven(){
					$('.snaam').css("width", '50%');
					$('.allhm').fadeOut().remove();
					$('.allab').delay(500).fadeIn(500);
					$('.terug').slideDown(500);
					
					$('.vvan').click(function(){
					var anders = $(".anders").val();

					
						$.ajax({
							type: "POST",
							url: "../php/andersupdate.php",
							data: {anders: anders, straatnaam: straatnaam, nummer: nummer},
							success: function(){
								$('.overlay').fadeOut(300, function(){ 
    								$(this).remove();
								});	
							}
						});
					var anders = $(".anders").val("");
					});	
				}
	
				$('.aangnb').click(function(){
					nietbelopgeven()
				});
				
				$('.aangat').click(function(){
					anderstopgeven()
				});

				$('.aangan').click(function(){
					andersopgeven()
				});
function teruggaan(){
		$('.snaam').css("width", '70%');
		$('.allnib, .allab, .allat').fadeOut(500);
		$('.terug').slideUp(500);
		$('<div class="aangnb allpopup allhm"><img class="nbn" src="/img/nbpic.png"></div><div class="aangat allpopup allhm"><img class="atn" src="/img/atpic.png"></div><div class="aangan allpopup allhm"><img class="ann" src="/img/anpic.png"></div>').hide().appendTo($('.aangeven')).delay(500).fadeIn(500);
		
			$('.aangnb').click(function(){
					nietbelopgeven()
				});
				
				$('.aangat').click(function(){
					anderstopgeven()
				});

				$('.aangan').click(function(){
					andersopgeven()
				});
}

$('.terug').live('click', function(){	
	teruggaan();
});

	
$('.voltooien').live('click', function(){	
	$('<div class="overlay"><div class="letopcontainer letop-verder"><div class="alert"><div class="steptitle letop-tit"><h2>Gebied opslaan</h2><p>Wil je dit gebied opslaan?</p></div></div><div class="stepalert "><div class="buttonalert"><div class="button verderk"><p>Opslaan</p></div><div class="button afsluitk"><p>Annuleren</p></div></div><div class="buttonalert"></div></div></div></div></div>').hide().appendTo($('body')).fadeIn(500);
	
	$('.afsluitk').click(function(){
		$('.overlay').fadeOut(300, function(){ 
		$(this).remove();
		});
	});
	
	$('.verderk').click(function(){
		$('.overlay').fadeOut(300, function(){ 
    		$('.stepcontainer').remove();
			$('.overlay').remove();
			$('.hoverlay').remove();
			$('<div class="s5"><div class="g-container"><div class="b-container"></div></div>').hide().appendTo($('.wrapper')).fadeIn(500);
		});
	});
});	
	
	
	
}
	

	

		
		
		
	

	
	
	
	
	
	
	
	
	

	
$('.annuleer').live('click', function() {
	$('<div class="overlay"><div class="letopcontainer"><div class="alert"><div class="steptitle"><h2>Annuleren</h2><p>Weet je zeker dat je het toevoegen van gebied wil afbreken?</p></div></div><div class="stepalert "><div class="buttonalert"><div class="button verderk"><p>Afsluiten</p></div></div><div class="buttonalert"><div class="button afsluitk"><p>Annuleren</p></div></div></div></div></div></div>').hide().appendTo($('body')).fadeIn(500);
	
	$('.afsluitk').click(function() {
		$('.overlay').fadeOut(300, function(){ 
    		$(this).remove();
		});
	});
	
	$('.verderk').click(function() {
		$('.overlay').fadeOut(300, function(){ 
    		$('.stepcontainer').remove();
			$('.overlay').remove();
			$('.hoverlay').remove();
			window.location.href = "/includes/overzichtgebied.php";
		});
	});
});
	
	
function naarstap2(nieuweb){
	$(".de2destap").fadeIn();


	
function PolygonCreator(map){
	this.map=map;
	this.pen=new Pen(this.map);
	var thisOjb=this;
	
	this.event=google.maps.event.addListener(thisOjb.map,'click',function(event){
		thisOjb.pen.draw(event.latLng);
	
	});
	
	this.showData=function(){
		return this.pen.getData();
	}

	this.showColor=function(){
		return this.pen.getColor();
	}

	this.destroy=function(){
		this.pen.deleteMis();
		if(null!=this.pen.polygon){
			this.pen.polygon.remove();
		}
		google.maps.event.removeListener(this.event);
		}
	}

var cor;
function Pen(map){
	this.map=map;
	this.listOfDots=new Array();
	this.polyline=null;
	this.polygon=null;
	this.currentDot=null;
	
	this.draw=function(latLng){
		if(null!=this.polygon){
			$('<div class="overlay"><div class="letopcontainer"><div class="alert"><div class="steptitle"><h2>Annuleren</h2><p>Weet je zeker dat je de markering wilt annuleren?</p></div></div><div class="stepalert "><div class="buttonalert"><div class="button verderk"><p>Verder gaan</p></div></div><div class="buttonalert"><div class="button afsluitk" ><p>Afsluiten</p></div></div></div></div></div></div>').hide().appendTo($('body')).fadeIn(500);
			
		$('.afsluitk').click(function() {
			$('.overlay').fadeOut(300, function(){ 
				$(this).remove();
			});
		});
			
		}else{
			if(this.currentDot!=null&&this.listOfDots.length>1&&this.currentDot==this.listOfDots[0]){
				this.drawPloygon(this.listOfDots);
			}else{
				if(null!=this.polyline){
					this.polyline.remove();
				}
				var dot=new Dot(latLng,this.map,this);
				this.listOfDots.push(dot);
				
				if (typeof cor === 'undefined'){
					cor = latLng;	
					
				} else {
				
				}
			
				if(this.listOfDots.length>1){
					this.polyline=new Line(this.listOfDots,this.map);
				}
			 }
		}
		
		
			
}
	
this.drawPloygon=function(listOfDots,color,des,id){
	this.polygon=new Polygon(listOfDots,this.map,this,color,des,id);
	this.deleteMis();
}

this.deleteMis=function(){
	$.each(this.listOfDots,function(index,value){
		value.remove();
		
	});
	this.listOfDots.length=0;
	
	if(null!=this.polyline){
		this.polyline.remove();
		this.polyline=null;
	}
}
this.cancel=function(){
	if(null!=this.polygon){
	(this.polygon.remove());
}
this.polygon=null;this.deleteMis();
}
this.setCurrentDot=function(dot){
	this.currentDot=dot;
}
this.getListOfDots=function(){
	return this.listOfDots;
}

this.getData=function(){
	if(this.polygon!=null){
		var data="";
		var paths=this.polygon.getPlots();
		paths.getAt(0).forEach(function(value,index){
			data+=(value.toString());
		});
		return data;
	}else{
		return null;
	}				   
}

this.getColor=function(){
	if(this.polygon!=null){
		var color=this.polygon.getColor();
		return color;
	}else{return null;
		 }
	}

}

function Dot(latLng,map,pen){
	this.latLng=latLng;
	this.parent=pen;
	this.markerObj=new google.maps.Marker({
		position:this.latLng,
		map:map
	});
	
	this.addListener=function(){
		var parent=this.parent;
		var thisMarker=this.markerObj;
		var thisDot=this;
		google.maps.event.addListener(thisMarker,'click',function(){
			parent.setCurrentDot(thisDot);
			parent.draw(thisMarker.getPosition());
			
		});
	}
	
	this.addListener();
	this.getLatLng=function(){
		return this.latLng;
	}
	this.getMarkerObj=function(){
		return this.markerObj;
	}
	this.remove=function(){
		this.markerObj.setMap(null);
	}
	
}


function Line(listOfDots,map){
	this.listOfDots=listOfDots;
	this.map=map;
	this.coords=new Array();
	this.polylineObj=null;
	
	if(this.listOfDots.length>1){
		var thisObj=this;
		$.each(this.listOfDots,function(index,value){
			thisObj.coords.push(value.getLatLng());
		});
		
		this.polylineObj=new google.maps.Polyline({
			path:this.coords,
			strokeColor:"#599eb1",
			strokeOpacity:1.0,
			strokeWeight:2,
			map:this.map
		});
	}
	
	this.remove=function(){
		this.polylineObj.setMap(null);
	}
}

function Polygon(listOfDots,map,pen,color){
	this.listOfDots=listOfDots;
	this.map=map;
	this.coords=new Array();
	this.parent=pen;this.des='Hello';
	var thisObj=this;
	
	$.each(this.listOfDots,function(index,value){
		thisObj.coords.push(value.getLatLng());
	});
	
	this.polygonObj=new google.maps.Polygon({
		paths:this.coords,
		strokeColor:"#599eb1",
		strokeOpacity:0.8,
		strokeWeight:2,
		fillColor:"#b3ced6",
		fillOpacity:0.60,
		map:this.map});
	
	this.remove=function(){
		this.info.remove();
		this.polygonObj.setMap(null);
	}
	
	this.getContent=function(){
		return this.des;
	}

	this.getPolygonObj=function(){
		return this.polygonObj;
	}

	this.getListOfDots=function(){
		return this.listOfDots;
	}

	this.getPlots=function(){
		return this.polygonObj.getPaths();
	}

	this.getColor=function(){
		return this.getPolygonObj().fillColor;
	}

	this.setColor=function(color){
		return this.getPolygonObj().setOptions({fillColor:color,strokeColor:color,strokeWeight:2});
	}

	this.info=new Info(this,this.map);
	this.addListener=function(){
		var info=this.info;
		var thisPolygon=this.polygonObj;
		google.maps.event.addListener(thisPolygon,'rightclick',function(event){
			info.show(event.latLng);
		});
	}
	this.addListener();
}

function Info(polygon,map){
	this.parent=polygon;
	this.map=map;
	this.color=document.createElement('input');
	this.button=document.createElement('input');
	$(this.button).attr('type','button');
	$(this.button).val("Change Color");
	var thisOjb=this;
	
	this.changeColor=function(){
		thisOjb.parent.setColor($(thisOjb.color).val());
	}
	
	this.getContent=function(){
		var content=document.createElement('div');
		$(this.color).val(this.parent.getColor());
		$(this.button).click(function(){
			thisObj.changeColor();
		});
		$(content).append(this.color);
		$(content).append(this.button);
		return content;
	}
	thisObj=this;
	
	this.infoWidObj=new google.maps.InfoWindow({
		content:thisObj.getContent()
	});
	
	this.show=function(latLng){
		this.infoWidObj.setPosition(latLng);
		this.infoWidObj.open(this.map);
	}
this.remove=function(){
	this.infoWidObj.close();
}
}
	



		

	
	
function initialize() {

    var markers = [];
    var map = new google.maps.Map(document.getElementById('map-canvas'), {
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var defaultBounds = new google.maps.LatLngBounds(
    new google.maps.LatLng(52.3802035,5.2572211));
    map.fitBounds(defaultBounds);
					
    // Create the search box and link it to the UI element.
    var input = /** @type {HTMLInputElement} */
    (document.getElementById('pac-input'));
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    var searchBox = new google.maps.places.SearchBox(
    /** @type {HTMLInputElement} */
    (input));

	 var creator = new PolygonCreator(map);
	
				
				
				
		 //reset
		 $('.buttonalert .opnieuw').click(function(){ 
		 		creator.destroy();
		 		creator=null;
		 		cor = undefined;
		 		creator=new PolygonCreator(map);
			 
		 });		 
		 
	
				
		 $(".gn-inp").keyup(function(){
			var val = $('.gn-inp').val();
			if( !val || val === '0') { 
				$(".step3").fadeOut();
				$('.meld').remove();
			} else {
				
			$.ajax({
				type: "POST",
				url: "../php/validation.php",
				data: { 'gebiednr' : val},
				success: function(data){
					
					$('.meld').remove();
					$(data).hide().appendTo(".gbenmelding").fadeIn(500);
					if (($(".meld").css('background-color')) === 'rgba(78, 239, 48, 0.309804)') {
			$(".step3").fadeIn();
		} else if (($(".meld").css('background-color')) === 'rgba(239, 48, 48, 0.309804)') {
			$(".step3").fadeOut();
		}

				}
			});
			}

		});
		 
	
	function naarstap4(gebiednr){
		$('<div class="stepcontainer de4destap"><div class="annuleerbar"><div class="annuleer"><p>Annuleer</p></div></div><div class="alert"><div class="steptitle"><h2>Stap 4: Anderstaligen &amp; Nietbellers</h2></div><div class="steptekst"><p>Geef hieronder de anderstalige en nietbellers op.<br><br></p></div><div class="stepalert"></div><div class="stap4container"><div class="stap4left"></div><div class="stap4right"></div></div><div class="stepalert"><div class="buttonalert"><div class="button voltooien"><p>Voltooien</p></div></div></div></div></div>').hide().appendTo($('body'));
		$('.step4').hide();
		
		$(".de4destap").fadeIn();
	
			$.ajax({
				type: "POST",
				url: "../php/strnrs.php",
				data: {gebiednr: gebiednr},
				success: function(straatinstellen){
							
				$(".stap4left").hide().html(straatinstellen).delay(200).fadeIn(500);
			
					
				$('.option li').click(function(){ 
				var straat = $(this);
				$('.option li').removeClass('geselecteerd');
				$(straat).addClass('geselecteerd');
				var straatcode = $(straat).attr('data-id');
				var straatnaam = $(straat).find('.osstraat').text();
				
				$(".stap4left").animate({width: '30%'});
				$(".stap4right").animate({width: '60%'});
				$(".optionbar-n").fadeOut(200);
				
				$.ajax({
				type: "POST",
				url: "../php/straatbewerking.php",
				data: { 'straatcode' : straatcode},
				success: function(nummerverschijning){
						$(".stap4right").html(nummerverschijning).hide();
					
						$(".stap4right").html(nummerverschijning).delay(200).fadeIn(500); 	//Toont de output van het script
						
							
						
						 $(".ab").mouseover(function(){
        					$(this).css("background-color", "#b3ced6");
    					});
						$(".ab").mouseout(function(){
        					$(this).css("background-color", "");
    					});
							$('.ab').click(function(){
								var nrblokje = $(this);
								var nummer = $(this).find('p').text();
								werkbijatnb(straatcode, straatnaam, nummer, nrblokje);
							});
				}
			});
	});		
					
					
					
	
					
				}
			});
		
			
	}
	
	
	
	
	
	
	
	

		 //show paths
		 $('.step3').click(function(){ 
	
	
					if(null==creator.showData()){

		 			$('<div class="overlay"><div class="letopcontainer letop-verder"><div class="alert"><div class="steptitle letop-tit"><h2>Je hebt niet alles ingevoerd</h2><p>Sorry, maar je moet eerst een gebied markeren</p></div></div><div class="stepalert "><div class="buttonalert"><div class="button verderk"><p>Opnieuw markeren</p></div></div><div class="buttonalert"></div></div></div></div></div>').hide().appendTo($('body')).fadeIn(500);
	
					$('.verderk').click(function() {
						$('.overlay').fadeOut(300, function(){ 
							$(this).remove();
						});
					});
					
		 		} else {
					
					var gebiednr = $('.gn-inp').val();
					var buurt = nieuweb;
					var coord = creator.showData();
					var cord = (String(cor));
					
					$.ajax({
						type: "POST",
						url: "../php/postgebied.php",
						data: {cor: cord, gebiednr: gebiednr, buurt: buurt, coord: coord},
						success: function(){
								
						}
					}); 
						
					function naarstap3(nieuweb){
							$('<div class="stepcontainer de3destap"><div class="annuleerbar"><div class="annuleer"><p>Annuleer</p></div></div><div class="alert"><div class="steptitle"><h2>Stap 3: Straten toevoegen</h2></div><div class="steptekst"><p>Hieronder kun je het aantal straten toevoegen<br><br></p></div><div class="stepalert"><div class="button adds"><p>Toevoegen</p></div><div class="button deletes"><p>Verwijderen</p></div><div class="button bind"><p>Annuleer</p></div></div><div class="vscontainer"><div class="heelvol"><div class="volstraatennrs"><div class="straatennrs"><input class="straatinput inp" type="text" name="straat" value="" placeholder="Straatnaam"><label>huisnrs</label><input class="vanafnr nrinput inp" type="number"><label>tot en met</label><input class="totnr nrinput inp" type="number"><div class="aansl">Aansluitend</div><div class="ht"><div class="honderdt">123</div></div><div class="straatveldt"><img src="/img/plus.png"></div></div></div></div></div></div><div class="stepalert"><div class="buttonalert"><div class="button opnieuw"><p>Opnieuw selecteren</p></div></div><div class="buttonalert"><div class="button step4"><p>Naar stap 4</p></div></div></div><div id="dataPanel"></div></div>').hide().appendTo($('body'));
		
		
						$(".de3destap").fadeIn();
						$(".optionbar-n, .straatveldt img, .bind, .step3, .deletes").hide();
						function verwijderstr(vknop) {
	var dknop = $('.deletes');
	var tknop = $('.adds');
	var bind = $('.bind');
	var destraat = $(vknop).parent().parent().parent().parent();
$(destraat).fadeOut(300, function(){ 
    $(this).remove();
	
	if ($(".volstraatennrs").length == 1) {
  		$(bind).fadeOut();
		$(tknop).removeClass('nonactive');
		$(".volstraatennrs").removeClass("straatrood");
		$(".straatveldt img").css("transform","rotate(0deg)");
	}
});
}	
$('.deletes').click(function() {
	var dknop = $('.deletes');
	var tknop = $('.adds');
	var vknop = $('.straatveldt img');
	
	if ($(tknop).hasClass('nonactive')) {
		$(tknop).removeClass('nonactive');
	} else {
		$(tknop).addClass('nonactive');
		$('.deletes').fadeOut(500);
		$('.bind').delay(600).fadeIn(500);	
		$(".straatveldt img").fadeIn();
		$(vknop).css("transform","rotate(45deg)");
		$(".volstraatennrs").addClass("straatrood");	
	}
});

$('.straatveldt img').live('click', function() {
	var vknop = $(this);
	var tknop = $('.adds');
	if ($(tknop).hasClass('nonactive')) {
		verwijderstr(vknop);
	}
});
	
$('.adds').click(function() {
	var tknop = $('.adds');
	var vknop = $('.straatveldt img');
	
	if (!$(tknop).hasClass('nonactive')) {
		voegstraat();
	} 
});
$('.bind').click(function() {
	var tknop = $('.adds');
	if ($(tknop).hasClass('nonactive')) {
		$(tknop).removeClass('nonactive');
		$(".volstraatennrs").removeClass("straatrood");
		$(".straatveldt img").css("transform","rotate(0deg)");
		$(".straatveldt img").fadeOut();
		$('.bind').fadeOut(500);
		$('.deletes').delay(600).fadeIn(500);
	}
});
						$('.step4').click(function() {
							$('<div class="overlay"><div class="letopcontainer letop-verder"><div class="alert"><div class="steptitle letop-tit"><h2>Straten toevoegen</h2><p>Weet je zeker dat je deze straten wilt toevoegen aan het gebied?</p></div></div><div class="stepalert "><div class="buttonalert"><div class="button verderk"><p>Opslaan</p></div></div><div class="buttonalert"><div class="button afsluitk" ><p>Annuleren</p></div></div></div></div></div></div>').hide().appendTo($('body')).fadeIn(500);
						$('.verderk').click(function() {
							
							$('.overlay').fadeOut(300, function(){ 
								$(this).remove();
							});
						
							
							
							
							
							$('.heelvol').each(function() {
								var ncon = $(this).find('.bigncont');
								var buurt = nieuweb;
								var coord = creator.showData();
								var cord = (String(cor));
								var straat = $(this).find('.straatinput').val();
								var nummer = $(this).find('.gnum');
								var firstn = $(this).find('.gnum:first').text();
								var lastn = $(this).find('.gnum:last').text();
								var totenmet = firstn + " - " + lastn;
								var straatcode = straat.substring(0, 5) + gebiednr + firstn + lastn;
							
								$.ajax({
									type: "POST",
									url: "../php/poststraat.php",
									data: {straatcode: straatcode, straatnummers: totenmet, straat: straat, buurt: buurt, gebiednr: gebiednr},
									success: function(){}
								});
								
								$(nummer).each(function() {
									var nr = $(this).text();
								$.ajax({
									type: "POST",
									url: "../php/postnummer.php",
									data: {straatcode: straatcode, straat: straat, nummer: nr},
									success: function(){}
								});
							});
							});
							
							var delayen = 3000;
							setTimeout(function() {
								naarstap4(gebiednr);
							}, 3000);	
							
							$($(".de3destap").delay(3000).fadeOut()).remove();	
									

						});	
							
						$('.afsluitk').click(function() {
							$('.overlay').fadeOut(300, function(){ 
								$(this).remove();
							});
						});
					
					});
					}
					$($(".de2destap").fadeOut()).remove();	
					
					naarstap3(nieuweb);	
		 			
	
	
	}
	
	 		 
		 		
		
			 
		 });	 							
	
	
	
	
	
	
		 	
		
    // [START region_getplaces]
    // Listen for the event fired when the user selects an item from the
    // pick list. Retrieve the matching places for that item.
    google.maps.event.addListener(searchBox, 'places_changed', function () {
        var places = searchBox.getPlaces();
		
		
		
		
		
        if (places.length == 0) {
            return;
        }
        for (var i = 0, marker; marker = markers[i]; i++) {
            marker.setMap(null);
			
        }
		
		

        // For each place, get the icon, place name, and location.
        markers = [];
        var bounds = new google.maps.LatLngBounds();
        for (var i = 0, place; place = places[i]; i++) {
            var image = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            var marker = new google.maps.Marker({
                map: map,
                icon: image,
                title: place.name,
                position: place.geometry.location
            });

            markers.push(marker);

            bounds.extend(place.geometry.location);
        }

        map.fitBounds(bounds);
    });
    // [END region_getplaces]

    // Bias the SearchBox results towards places that are within the bounds of the
    // current map's viewport.
    google.maps.event.addListener(map, 'bounds_changed', function () {
        var bounds = map.getBounds();
        searchBox.setBounds(bounds);
		
    });
				
	

    // Trigger search on button click
    document.getElementById('trigger-search').onclick = function () {

        var input = document.getElementById('pac-input');

        google.maps.event.trigger(input, 'focus')
        google.maps.event.trigger(input, 'keydown', {
            keyCode: 13
        });
    };
}
initialize();
}	
	

function buurtaanmaak(nieuweb){
	$.ajax({
		type: "POST",
		url: "../php/postbuurt.php",
		data: { 'buurt' : nieuweb },
		success: function(voerbuurt){
		
		}
		
	});
	
	$($(".debuurtaanmaak").fadeOut()).remove();	
		naarstap2(nieuweb);	
	
}	
	
	

	
// FUNCTIE: Checkt of de aansluitknop de classe bewerken heeft (door KNOP AANSLUITEND)	
function checkeven(aansluit) {
	
	if($(aansluit).hasClass("aansl-bew")) {
		//Dan gebeurt er niks
	} else {
		var evan = $(aansluit).siblings(".vanafnr").val();
		var etot = $(aansluit).siblings(".totnr").val();
		if ((evan % 2 == 1) && (etot % 2 == 0) || (evan % 2 == 0) && (etot % 2 == 1)) {
			$(aansluit).siblings(".totnr").val(+parseInt(etot) + 1);	
		}
	}		
}

function nummerpopup(kleur){
	if($(kleur).hasClass('klaar')){
		$(".step4").fadeIn();
		
		var blok = $(kleur).parent().parent();
		var valv = $(kleur).find(".vanafnr").val();
		var valt = $(kleur).find(".totnr").val();
		var ncontainer = $(kleur).parent();
		var bigncon = $(ncontainer).find('.bigncont');
		var aansluit = $(kleur).find('.aansl')
		
		$(bigncon).slideUp(50).remove();	
		$('<div class="bigncont"><div class="selectie"><div class="selectiem"><p class=".selecttext">Een selectie maken</p></div></div></div>').hide().appendTo(ncontainer).delay(250).slideDown(250);
		
		var nieuwnr = parseInt(valv);
		var nieuwvt = parseInt(valt);
		
		if($(aansluit).hasClass("aansl-bew")) {
			while(nieuwnr <= nieuwvt) {
				$('<div class="gnumcon"><div class="gnum"><p>'+nieuwnr+'</p></div></div>').hide().appendTo($(ncontainer).find('.bigncont')).delay(500).fadeIn(500);
				nieuwnr = nieuwnr + 1;	
			}
		
		} else {
			while(nieuwnr <= nieuwvt) {
				$('<div class="gnumcon"><div class="gnum"><p>'+nieuwnr+'</p></div></div>').hide().appendTo($(ncontainer).find('.bigncont')).delay(500).fadeIn(500);
				nieuwnr = nieuwnr + 2;	
			}
		}

	} else {
		$(".step4").fadeOut();
		// Niks gebeurt als de balk niet groen is
	}
}	

// FUNCTIE: Checkt of de knop volgorde is ingedrukt
function volgorde(aansluit) {
		
	if($(aansluit).hasClass("aansl-bew")) {
		$(aansluit).removeClass("aansl-bew");
	} else {
		$(aansluit).addClass("aansl-bew");
	}
}
	
$('.honderdt').live('click', function() {
	var honderdt = $(this);
	if($(honderdt).hasClass('aansl-bew')) {
		$('.abcont').remove();
		$(honderdt).removeClass('aansl-bew');
	} else {
			$('.abcont').remove();
			$(honderdt).addClass('aansl-bew');
			honderdtallen(honderdt);
		}
});	
	
	
	

// KNOP AANSLUITEND: Geeft of verwijderd de class bewerken en opent de functie CHECKEVEN		
$(".aansl").live('click', function() {
	var aansluit = $(this);
	var kleur = $(aansluit).parent().parent();
	
	if($(aansluit).hasClass("aansl-bew")) {
		//Dan word de class toegevoegd
		$(aansluit).removeClass("aansl-bew")
		checkeven(aansluit);
		nummerpopup(kleur);
	} else {
		//Dan word de class verwijderd
		$(aansluit).addClass("aansl-bew")
		checkeven(aansluit);
		nummerpopup(kleur);
	}
});

// FUNCTIE: Checkt of de straten en nummers zijn ingevuld
function checkinputs(inputs) {
	var street = $(inputs).parent().find(".straatinput").val();
	var straatin = $(inputs).parent().find(".straatinput").val().length;
	var valv = $(inputs).parent().find(".vanafnr").val();
	var valt = $(inputs).parent().find(".totnr").val();
	var kleur = $(inputs).parent().parent();

	
			
		$.ajax({
			type: "POST",
			url: "../php/validationstraat.php",
			data: { straat: street, vanaf: valv, tot: valt},
			success: function(atat){
			$(kleur).find('.fouts').remove();
				$(atat).hide().appendTo($(kleur).find('.straatennrs')).fadeIn(500);
				
			
					
				
		}
			
			
		});
		

			if (($(kleur).find('.fouts').length) || (straatin < 6) || (valv == '') || (valt == '') || (valv <= 0) || (valt <= 0) ||(parseInt(valt) < parseInt(valv))) {
				$(kleur).removeClass('klaar');
				$(kleur).addClass('nietklaar');	
				
				} else {
					
				$(kleur).removeClass('nietklaar');
				$(kleur).addClass('klaar');		
				}
	
		
	

	nummerpopup(kleur);
}
	
// INPUT FOUTEN KEYUP - CHECKEVEN & CHECKSTRATEN
$('.inp').live('keyup',function() {
	
	var aansluit = $(this).siblings(".aansl");
	checkeven(aansluit);
	var inputs = $(aansluit).siblings(".inp")
	checkinputs(inputs);
});




		
	
var container = $(".heelvol");

var indicator = $(".heelvol").find('.volstraatennrs');	
	
function voegstraat() {
	if ($(".volstraatennrs").length > 0) {
  		$(".deletes").fadeIn();
		$('<div class="heelvol"><div class="volstraatennrs"><div class="straatennrs"><input class="straatinput inp" type="text" name="straat" value="" placeholder="Straatnaam"><label>huisnrs</label><input class="vanafnr nrinput inp" type="number"><label>tot en met</label><input class="totnr nrinput inp" type="number"><div class="aansl">Aansluitend</div><div class="ht"><div class="honderdt">123</div></div><div class="straatveldt"><img src="/img/plus.png"></div></div></div></div>').hide().appendTo(".vscontainer").fadeIn(500);
		$(".straatveldt img").hide();
		
		
	} else {
		$(".deletes").fadeOut();
	} 	
}

$(".optionbar ul li").live('click',function() {
	var nieuweb = $(this).text();
	
	if (nieuweb === 'Nieuwe buurt aanmaken') {
		$($(".de1stestap").fadeOut()).remove();
		$(".debuurtaanmaak").fadeIn();
		$(".buttoneerst").hide();
	
$(".nieuweb-inp").keyup(function(){
	var val = $(".nieuweb-inp").val();
	if(!val) { 
		
		$(".buttoneerst").fadeOut();
		$('.meld').remove();
	
	} else {
	
		$.ajax({
			type: "POST",
			url: "../php/validationbuurt.php",
			data: { 'buurtn' : val},
			success: function(buurt){

				$('.meld').remove();
				$(buurt).hide().appendTo(".melding-nb").fadeIn(500);

				if (($(".buurtbestaat").css('background-color')) === 'rgba(78, 239, 48, 0.309804)') {
					$(".buttoneerst").fadeIn();

				} else if (($(".buurtbestaat").css('background-color')) === 'rgba(239, 48, 48, 0.309804)') {
					$(".buttoneerst").fadeOut();
				}
			}
		});
	}
});
		$(".step2").click(function() {
			nieuweb = $('.nieuweb-inp').val();
			buurtaanmaak(nieuweb);
		});
	} else {
		$($(".de1stestap").fadeOut()).remove();
		var invb = nieuweb;
		naarstap2(invb);
	}
});	
	
$('.gnum').live('dblclick', function() {
	var gnum = $(this);
	nummertoevoeging(gnum);
});	

function selectieverwijder(selm, selc, bc) {
	var selv = $(selm).siblings('.selectiev');
	
	
	if ($(selm).next().is('.selectiev')){
		$(bc.find('.gnum')).bind("click", (function () {

	var gnum = $(this);
	$(gnum).addClass('selectieges');
			$(selv).click(function() {
				$(bc.find('.selectieges')).fadeOut(500, function(){
					$(this).parent().remove();
				});
			});
	}));	
	}
}
	
$('.selectiem').live('click', function() {
	var selm = $(this);
	var selc = $(selm).parent();
	var bc = $(selm).parent().parent();
	
	if($(selm).next().is('.selectiev')) {
		$('.selectiev').fadeOut(500, function(){ 
    		$(this).remove();
		});	
		$(bc.find('.gnum')).removeClass('selectieges');
    	$(selm).html("<p>Een selectie maken</p>");
    	$(selm).delay(500).animate({width:"100%"},500);
		$(selm).animate({borderRadius:"7px"},500);
		$(bc.find('.gnum')).unbind("click");
	} else {
		$(selm).html("<p>Annuleren</p>");
    	$(selm).animate({width:"50%"},500);
		$(selm).animate({borderRadius:"7px 0 0 7px"},500);
		$('<div class="selectiev"><p>Selectie verwijderen</p></div>').hide().appendTo(selc).delay(500).fadeIn(500);
		
		selectieverwijder(selm, selc, bc);
	}
	
	
});	
	

	

});
