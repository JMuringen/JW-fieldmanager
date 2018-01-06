$(document).ready(function(){
   
    $('.refresh-gegevens').hide();
    $('#gebiedsection').hide();
	$('#straatsection').hide();
    $('#huidigegegevens').fadeIn();
	
 	setInterval(function() {
        $('.head-gegevens').load('../includes/tijd.php');
 	}, 1000);
   
	
	$('.bijwerkknop').click(bijwerkenfunctie);
	
	
	
	
	
	
	
});


function bijwerkenfunctie(){
		$('.bijwerkknop').addClass('selectedknop');
		$('.gebiedo').fadeOut();
		$('.gebiedb').fadeIn();
	
	var addnummer = [];
	var delnummer = [];
		
		//Bij het klikken op een straatnummer een borderkleur toevoegen
	$('.ab').click(function(){
			
	var nummer = $(this).find('.nummer').val();
	var nietbeller = $(this).find('.nietbeller').val();
	var anderstalig = $(this).find('.anderstalig').val();
	var straatcode = $(this).find('.scode').val();
	var datum = $(this).find('.nbdatum').val();
	var aanwezig = $(this).find('.aanwezig').val();
		
		if	($(this).hasClass('afw')) {
    

   		addnummer.push([nummer, straatcode]);
	
		$(this).removeClass('afw');
		$(this).addClass('aaw');
		
		} else if ($(this).hasClass('aaw')) { 
		
		delnummer.push([nummer, straatcode]);
		
		$(this).removeClass('aaw');
		$(this).addClass('afw');
		
		}	
			
		$('.bijwerkopslaan').click(function(){
			$('.gebiedb').fadeOut();
			$('.gebiedo').fadeIn().delay(3000).fadeOut();
			$('.bijwerkknop').removeClass('selectedknop');
		
			$.ajax({        
       			type: "POST",
       			url: "../includes/nummer_add.php",
       			data: {addnummer: addnummer},
       			success: function(laatzien) {}
			}); 
			
			$.ajax({        
       			type: "POST",
       			url: "../includes/nummer_add.php",
       			data: {delnummer: delnummer},
       			success: function(laatzien) {}
			});
		
		});	
			
});		
}

