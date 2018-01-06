$(document).ready(function() {

	$('.lan, .langucontainer, .headertaal').hide();
	
	var au_refresh = setInterval(function (){

$('.b-container').load('../php/gebiedjes.php').fadeIn();
//$('.headertaal').load('../php/lan.php').fadeIn();
}, 1000); // refresh every 10000 milliseconds

	
	$('.filters .item').click(function(){
		var filteritem = $(this);
		var filtertekst = $(this).attr('id');
		$(filteritem).siblings().removeClass('selectedfilter');
		$(filteritem).addClass('selectedfilter');
		
		$.ajax({
		type: "POST",
		url: "../php/gebiedfilter.php",
		data: {filtertekst: filtertekst},
		success: function(){}
		});
	});
	
	
	
	function removeClick() {
	$(".lan").animate({
			top: '+=80px'
		}, 100);
	$(".afo").delay(500).fadeOut(500);	
	$('.taals').unbind('click', removeClick);
	$('.taals').bind('click', actieClick);
	}
	
	function actieClick() {
		$(".lan").fadeIn(500);
        $(".lan").animate({
			top: '-=80px'
		}, 100);
	$(".langucontainer").delay(1000).fadeIn(500);
		
	$(".taalgr").click(function(){
	$(this).siblings().removeClass('taalsel');
	$(this).addClass('taalsel');	
	
	var taalc = $(this).attr('id');
	
	$.ajax({
		type: "POST",
		url: "../includes/taalswitch.php",
		data: {taalc: taalc},
		success: function(){
			$(".lan").animate({
			top: '+=80px'
		}, 100);
		$(".afo").delay(500).fadeOut(500);	
		$('.taals').unbind('click', removeClick);
		$('.taals').bind('click', actieClick);
		}
	});	
	});
		
		
		
		
	$('.taals').unbind('click', actieClick);
	$('.taals').bind('click', removeClick);
		
	
	}
	
	$('.taals').bind('click', actieClick);
	
$('.menuicon').click(function(){
	$('.optionbar-m').fadeOut(300, function(){ 
		$(this).remove();
	});
	$('<div class="optionbar-m"><div class="op-m-title"><p>MENU</p><div class="xmark"><img src="/img/cancel.png" /></div></div><ul class="option"><li class="homeb"><p>Home</p></li><li class="gtoevoeg-knop"><p>Toevoegen gebied</p></li><li class="ogebied"><p>Overzicht gebied</p></li><li><p>Jaar overzicht</p></li><li class="loguit"><p>Uitloggen</p></li></ul></div>').hide().appendTo($('.wrapper')).fadeIn(500);
$(".homeb").click(function(){
	window.location.href = "/includes/home.php";
});
	
$(".ogebied").click(function(){
	window.location.href = "/includes/overzichtgebied.php";
});
	
	$('.xmark').click(function(){
		$('.optionbar-m').fadeOut(300, function(){ 
		$(this).remove();
		});	
	});
	$(".loguit").live("click", function(){
			window.location.href = "../classes/logout.php?logout=true";	
	});
});	
	

	
});