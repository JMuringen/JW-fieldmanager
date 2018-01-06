$(document).ready(function(){

$(".searchbutton").click(function(){
	$.fn.getgebied();
});
	



$.fn.getgebied = function(){  //Functie voor na het klikken op de zoek knop
	//Stuurt de input informatie in de klasse gebiednr naar de data.php file
    $.post('../includes/data.php', { gebiednr: zoekgebied.gebiednr.value }, 
              
    function(output) { //Geeft alle verwerkte data uit de data.php file weer

	$('#gebiedsection').html(output).hide(); 		//Verbergt de output van het data.php script
    $('#gebiedsection').hide(); 					//Verbergt de gebiedsection div
	$('#gebiedsection').fadeIn(); 					//Toont de gebiedsection div
    $('#gebiedsection').css("width", '80%'); 		//Geeft de gebiedsection een breedte van 80%
	$('#straatsection').hide();						//Verbergt de straatsection div
	$('#straatsection').css("width", "50%"); 		//Geeft de straatsection een breedte van 50%
    $('#gebiedsection').html(output).fadeIn(1000); 	//Toont de output van het data.php script
	
    $('.straten').hover(function(){$(this).toggleClass('buttonhover');}); //Hover functie voor de straten
	
   	

$(".straten").click(function(){
	
		
    	$('.s5').css("padding", "0 2% 55px 2%");	//Geeft s5 een padding
		$('.straten').hover(function(){$(this).toggleClass('buttonhover');}); //Hover functie voor de straten (NA HET KLIKKEN OP EEN STRAAT) 
		
		/* Het geklikte object krijgt de klasse selected (groene achtergrond kleur), 
		voor de andere objecten met dezelfde class word de klasse selected verwijderd.*/
		$(this).addClass('selected').siblings().removeClass('selected'); 
		
		$('#gebiedsection').css("width", '300px');	//Geeft de gebiedsection een breedte van 300 pixels
		$('#straatsection').css("width", '60%');	//Geeft de straatsection een breedte van 60 procent
	
		
	var straatnaamvar = $(this).find('.straatnaamvar').val(); 		//Geeft variabele aan de straatnaam van de geklikte straat 
	var straatnummervar = $(this).find('.straatnummervar').val(); 	//Geeft variabele aan de straatnummers van de geklikte straat

//Post de variabelen in de straat.php file
$.post('../includes/straat.php', { straatnaamvar: straatnaamvar, straatnummervar: straatnummervar },
            
 function(output) { //Geeft alle verwerkte data uit de data.php file weer
	
 	$('.nummerveld').html(output).hide();	//Verbergt de output van de straat.php file
 	$('#straatsection').hide();				//Verbergt de div straatsection
 	$('#straatsection').fadeIn();			//Toont de straatsection (met een fadeIn)
 	$('.nummerveld').html(output).fadeIn(); //Toont de output van de straat.php file (met een fadeIn)
	
	//Bij het hoveren over een straat nummer krijgt het een borderkleur
	$('.straatnummers').hover(function(){$(this).toggleClass('buttonhover');});
	
	$('.straten').hover(function(){$(this).toggleClass('buttonhover');});
	
	$('.bijwerkknop').hover(function(){$(this).toggleClass('bijwerkknophover');});
	
	$('.bijwerkopslaan').hover(function(){$(this).toggleClass('bijwerkopslaanhover');});
	
	$('.gebiedb').hide();
	$('.gebiedo').hide();
	
	
	
	
	
	
	$('.bijwerkknop').click(function(){
	$.fn.bijwerkselect();
});
	



$.fn.bijwerkselect = function(){
	
		$('.bijwerkknop').addClass('selectedknop');
		$('.gebiedo').fadeOut();
		$('.gebiedb').fadeIn();
	
if ($('.bijwerkknop').hasClass('selectedknop')) {	
		
		//Bij het klikken op een straatnummer een borderkleur toevoegen
	$('.ab').click(function(){

	var addnummer = [];
	var delnummer = [];	
		
	var nummer = $(this).find('.nummer').val();
	var nietbeller = $(this).find('.nietbeller').val();
	var anderstalig = $(this).find('.anderstalig').val();
	var straatcode = $(this).find('.scode').val();
	var datum = $(this).find('.nbdatum').val();
	var aanwezig = $(this).find('.aanwezig').val();
		
		if	($(this).hasClass('afw')) {
    

   		addnummer.push([nummer, straatcode]);
	
		$(this).removeClass('afw').addClass('aaw');
		
		
		} else {
		
		delnummer.push([nummer, straatcode]);
		
		$(this).removeClass('aaw').addClass('afw');
		
		
		} 
		
		} else {}
			
		$('.bijwerkopslaan').click(function(){
			$.fn.opslaan();
			$.ajax({        
       			type: "POST",
       			url: "../includes/nummer_add.php",
       			data: {addnummer: addnummer},
       			success: function() {}
			}); 
			
			$.ajax({        
       			type: "POST",
       			url: "../includes/nummer_del.php",
       			data: {delnummer: delnummer},
       			success: function() {}
			});
			$('.bijwerkknop').click(function(){
				
				$.fn.bijwerkselect();
			});
			
		
		});	
		
		$.fn.opslaan = function(){	
			$('.gebiedb').fadeOut();
			$('.gebiedo').fadeIn();
			$('.bijwerkknop').removeClass('selectedknop');
		}
	
});

				   }
	
	
	});
}
	
	
});
	
	});
		

		   });
