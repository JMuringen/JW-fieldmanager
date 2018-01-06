$(document).ready(function(){

function inkorten(gegevens){
	var a = [];
	var c = 0;
	var d = 0;
	var e = 0;
	var naam = "H La Rose"
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
			c++;  //Telling + 1
			alert(vergelijking+" -  1ste van de 2de");
			
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
	uploadverkorting(optelmand);
}
	
function gebiedscannen(){
	var a = [];
	a[0] = [1,[2,3,9,8,14,12,13],"J Muringen"];
	var gegevens = a[0];
	gegevens[1].push(4);
	gegevens[1].sort(function(a, b){return a - b});
	inkorten(gegevens);
}
	
gebiedscannen();

});

