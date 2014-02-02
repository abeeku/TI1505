window.onload = function(){
	$("submit").observe('click', saveAankoop);
	$("searchArt").observe('keyup', updateListArtikel);
	$("searchBeschrijving").observe('keyup', updateListArtikel);	
	$("searchKlant").observe('keyup', updateListKlant);
	$("searchNaam").observe('keyup', updateListKlant);	
	$("searchWoonplaats").observe('keyup', updateListKlant);
	$("hoeveelheid").observe('keyup', updateBedrag);
	
	$("artikelen").observe('click', artSelect);
	$("klanten").observe('click', klantSelect);
}
/*This functie is called when an artikel is selected in the list*/
function artSelect(art){
	//highlight the selected list element
	$$("#artikelen li").forEach(function(e) { e.removeClassName("active"); });
	art.target.addClassName("active");
	
	//perform an Ajax request
	new Ajax.Request(
	  "server.php",
	  {
	    method: "get",
	    parameters: { mode: "getArtikel", artikel: art.target.id.substring(1) },
	    onSuccess: updateFieldsArtikel,
	    onException: ajaxFailure,
	    onFailure: ajaxFailure
	  }
	);
}

/*This  functieis ois called when a 'klant' is selected in the list*/
function klantSelect(klant){
	//highlight the selected list element
	$$("#klanten li").forEach(function(e) { e.removeClassName("active"); });
	klant.target.addClassName("active");
	
	//perform an Ajax request
	new Ajax.Request(
	  "server.php",
	  {
	    method: "get",
	    parameters: { mode: "getKlant", klant: klant.target.id.substring(1) },
	    onSuccess: updateFieldsKlant,
	    onException: ajaxFailure,
	    onFailure: ajaxFailure
	  }
	);
}

/*This functie should be called to update the artikel fields*/
function updateFieldsArtikel(ajax) {
	//call transformIntoArray and update all information fields on the right to display all artikel information
	var artikel = transformIntoArray(ajax.responseText);
	$("art").innerHTML = artikel[0];
	$("beschrijving").value = artikel[1];
	$("kleur").value = artikel[2];
	$("voorraad").value = artikel[3];
	$("prijs").value = artikel[4];
	$("srtc").value = artikel[5];
	
	//Create new options for every afdeling
	var afd = $("afd");
	afd.innerHTML = "";
	for (var i = 6; i < artikel.length; i++) {
	  var option = document.createElement("option");
	  option.innerHTML = artikel[i];
	  afd.appendChild(option);
	}
	
	updateBedrag();
}

/*Deze functie vult daadwerkelijk de klant velden in*/
function updateFieldsKlant(ajax) {
	//call transformIntoArray and update all information fields on the right to display all klant information
	var klant = transformIntoArray(ajax.responseText);
	$("klant").innerHTML = klant[0];
	$("naam").value = klant[1];
	$("voorl").value = klant[2];
	$("adres").value = klant[3];
	$("postc").value = klant[4];
	$("woonplaats").value = klant[5];
	$("schuld").value = klant[6];
}

/*The bedrag (=hoeveelheid * artikel.prijs) is calculated and displayed in this function*/
function updateBedrag(event){
	var bedrag = parseInt($("hoeveelheid").value) * parseFloat($("prijs").value)
	if (isNaN(bedrag))
	  $("bedrag").innerHTML = "0.00";
	else
	  $("bedrag").innerHTML = bedrag;
}

/*This function is called when an artikel is searched using the search fields */
function updateListArtikel(event){

}

/*This function is called when a klant is searched using the search fields*/
function updateListKlant(event){

}


/*
This function performs a Ajax request that connects with server.php where a sale is added
*/
function saveAankoop(){
	
}

/*When a sale is done, update the list of 'verkopen', using Scriptaculous!!!*/
function updateVerkopen(ajax){

}

function transformIntoArray(accessoriesString) {
    return accessoriesString.strip().split(";");
}

function ajaxFailure(ajax, exception) {
	alert("Error making Ajax request:" + 
		"\n\nServer status:\n" + ajax.status + " " + ajax.statusText + 
		"\n\nServer response text:\n" + ajax.responseText);
	if (exception) {
		throw exception;
	}
}
