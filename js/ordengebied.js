$(document).ready(function(){

     $('.allprint').each(function() {
		var printcon = $(this);
	
		var nummercon = $(this).children('.printnummer');
		var straatcode = $(printcon).attr("id");
	 
		 


	for(var i = 0; i < nummercon.length; i+=20) {
		$(nummercon).slice(i, i+20).wrapAll("<div class='nummerlijst'></div>");
	}
		 
	});
		
	
	
 

	var divg = $(".printcong");
	for(var e = 0; e < $(".printcong").length; e+=4) {
		divg.slice(e, e+4).wrapAll("<div class='printcontainer'></div>");
	}	

	var divs = $('.printcon');
	for(var i = 0; i < $(divs).length; i+=4) {
		divs.slice(i, i+4).wrapAll("<div class='printcontainer'></div>");
	}
	

});
		
	
	
