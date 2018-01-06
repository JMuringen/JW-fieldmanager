function initialize() {

    var markers = [];
    var map = new google.maps.Map(document.getElementById('map-canvas'), {
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var defaultBounds = new google.maps.LatLngBounds(
    new google.maps.LatLng(-33.8902, 151.1759),
    new google.maps.LatLng(-33.8474, 151.2631));
    map.fitBounds(defaultBounds);

    // Create the search box and link it to the UI element.
    var input = /** @type {HTMLInputElement} */
    (
    document.getElementById('pac-input'));
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    var searchBox = new google.maps.places.SearchBox(
    /** @type {HTMLInputElement} */
    (input));

	 var creator = new PolygonCreator(map);
		 
		 //reset
		 $('.buttonalert .opnieuw').click(function(){ 
		 		creator.destroy();
		 		creator=null;
		 		
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
		 
		 //show paths
		 $('.buttonalert. .step3').click(function(){ 
		 		$('#dataPanel').empty();
		 		if(null==creator.showData()){
		 			$('#dataPanel').append('Please first create a polygon');
		 		}else{
					
					
					
			$('.step3').click(function(){
				var val = $('.gn-inp').val();
				$.ajax({
					type: "POST",
					url: "../php/postgebiednr.php",
					data: { 'gebiednr' : val, 'coord' : creator.showData()},
					success: function(invoeren){
							
						

					}
				});

			});
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

		
		
google.maps.event.addDomListener(window, 'load', initialize);