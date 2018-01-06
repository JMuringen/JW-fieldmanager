$(document).ready(function() {
		
		
	
		$('.gebiedc').live('click', function(){
			
			
			var gebiedblok = $(this);
			var gebiedid = $(gebiedblok).attr('id');
			
			
		$('.gicancel').live("click", function(){
						$('.gebiedinfo-overl').fadeOut(300, function(){ 
    				$(".gebiedinfo-overl").remove();
					});	
						
					});					
			
			
			$.ajax({
				type: "POST",
				url: "../php/gebiedbekijken.php",
				data: {gebiednr: gebiedid},
				success: function(gebieduitgebreid){
					$('.gebiedinfo-overl').remove();
					$(".wrapper").append(gebieduitgebreid);
					
					$(function(){
					var kaartcor = $('.gebiedinfotitelinf').attr('id');
					var qrcor = $('.qrcodes').attr('id');
					
					
					var qrcod = qrcor.split("(").join(" ").split(")").join(" ");
				
					var commaPos = qrcod.indexOf(',');

					var coordinatesLat = parseFloat(qrcod.substring(0, commaPos));

					var coordinatesLong = parseFloat(qrcod.substring(commaPos + 1, qrcod.length));


					
					
         // create map
          var singapoerCenter=new google.maps.LatLng(coordinatesLat, coordinatesLong);
 
         var myOptions = {
            zoom: 16,
            center: singapoerCenter,
            mapTypeId: google.maps.MapTypeId.ROADMAP
         }
          
         var map = new google.maps.Map(document.getElementById('map-canvas'), myOptions);
 
         // attached a polygon creator drawer to the map
         var creator = new PolygonCreator(map);

		 		 var coordinaten = "[" + kaartcor + "]";
				
	var str = coordinaten.split(")(").join("], [");
		var volcor = str.split("(").join("[");
		var triangleCoords = volcor.split(")").join("]");
		var objpolygon = $.parseJSON(triangleCoords);
			 
 	var points = [];
  	for (var i = 0; i < objpolygon.length; i++) {
    	points.push({
      		lat: objpolygon[i][0],
      		lng: objpolygon[i][1]
    	});
  	}
        // Construct the polygon.
        var bermudaTriangle = new google.maps.Polygon({
          	paths: points,
          	strokeColor:"#599eb1",
			strokeOpacity:1.0,
			strokeWeight:1,
          	fillColor:"#599eb1",
          	fillOpacity: 0.35
        });
			 
        bermudaTriangle.setMap(map);
 
	
							
						
						
        function nWin() {
		
					$.ajax({
							type: "POST",
							url: "../php/gebiedprint.php",
							data: {gebiednr: gebiedid},
							success: function(gebiedprint){
							$('.gebiedinfo-overl').remove();
					$(".wrapper").append(gebiedprint);
								
					
								
					var divs = $(".printnummer");
					
							
					$(function(){
					var kaartcor = $('.mapcon').attr('id');
					var qrcor = $('.qrcodesgk').attr('id');
					
					
					var qrcod = qrcor.split("(").join(" ").split(")").join(" ");
				
					var commaPos = qrcod.indexOf(',');

					var coordinatesLat = parseFloat(qrcod.substring(0, commaPos));

					var coordinatesLong = parseFloat(qrcod.substring(commaPos + 1, qrcod.length));


					
					
         // create map
          var singapoerCenter=new google.maps.LatLng(coordinatesLat, coordinatesLong);
 
         var myOptions = {
            zoom: 15,
            center: singapoerCenter,
            mapTypeId: google.maps.MapTypeId.ROADMAP
         }
          
         var map = new google.maps.Map(document.getElementById('map-canvas'), myOptions);
 
         // attached a polygon creator drawer to the map
         var creator = new PolygonCreator(map);

		 		 var coordinaten = "[" + kaartcor + "]";
				
	var str = coordinaten.split(")(").join("], [");
		var volcor = str.split("(").join("[");
		var triangleCoords = volcor.split(")").join("]");
		var objpolygon = $.parseJSON(triangleCoords);
			 
 	var points = [];
  	for (var i = 0; i < objpolygon.length; i++) {
    	points.push({
      		lat: objpolygon[i][0],
      		lng: objpolygon[i][1]
    	});
  	}
        // Construct the polygon.
        var bermudaTriangle = new google.maps.Polygon({
          	paths: points,
          	strokeColor:"#599eb1",
			strokeOpacity:1.0,
			strokeWeight:1,
          	fillColor:"#599eb1",
          	fillOpacity: 0.35
        });
			 
        bermudaTriangle.setMap(map);
				
		setTimeout(function(){
  window.print()
  window.close()
}, 6000);		
					
					});
								

							}
						});
			
			
		
			
	
		}

		$(function() {
			$(".pgeb").click(nWin);
		});
       
		});   
				}
			});
			
			
			
			
			
		 
		});             
    });