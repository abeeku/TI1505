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
	$$("#artikelen li.active").forEach(function(e) { e.removeClassName("active"); });
	
	var art = art.target;
	if (art.tagName == "SPAN")
	  art = art.parentNode;
	
	art.addClassName("active");
	
	//perform an Ajax request
	new Ajax.Request(
	  "server.php",
	  {
	    method: "get",
	    parameters: { mode: "getArtikel", artikel: art.id.substring(1) },
	    onSuccess: updateFieldsArtikel,
	    onException: ajaxFailure,
	    onFailure: ajaxFailure
	  }
	);
}

/*This  functieis ois called when a 'klant' is selected in the list*/
function klantSelect(klant){
	//highlight the selected list element
	$$("#klanten li.active").forEach(function(e) { e.removeClassName("active"); });
	
	var klant = klant.target;
	if (klant.tagName == "SPAN")
	  klant = klant.parentNode;
	  
	klant.addClassName("active");
	
	//perform an Ajax request
	new Ajax.Request(
	  "server.php",
	  {
	    method: "get",
	    parameters: { mode: "getKlant", klant: klant.id.substring(1) },
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
	  $("bedrag").innerHTML = bedrag.toFixed(2);
}

/*This function is called when an artikel is searched using the search fields */
function updateListArtikel(event){
	var searchArt = $("searchArt").value;
	var searchBeschrijving = $("searchBeschrijving").value;
	
	$$("#artikelen li").forEach(function(e) {
	  var art = e.id.substring(1);
	  var beschrijving = e.getElementsByClassName("beschrijving")[0].innerHTML;
	  
	  if (beschrijving.indexOf(searchBeschrijving) == -1 || art.indexOf(searchArt) == -1)
	    e.style.display = "none";
	  else
	    e.style.display = "";
	});
}

/*This function is called when a klant is searched using the search fields*/
function updateListKlant(event){
	var searchKlant = $("searchKlant").value;
	var searchNaam = $("searchNaam").value;
	var searchWoonpl = $("searchWoonplaats").value;
	
	$$("#klanten li").forEach(function(e) {
	  var klant = e.id.substring(1);
	  var naam = e.getElementsByClassName("naam")[0].innerHTML;
	  var woonpl = e.getElementsByClassName("woonpl")[0].innerHTML;
	  
	  if (klant.indexOf(searchKlant) == -1
	      || naam.indexOf(searchNaam) == -1
	      || woonpl.indexOf(searchWoonpl) == -1)
	    e.style.display = "none";
	  else
	    e.style.display = "";
	});
}


/*
This function performs a Ajax request that connects with server.php where a sale is added
*/
function saveAankoop(){
	var art = parseInt($("art").innerHTML);
	var afd = $("afd").options[$("afd").selectedIndex].text;
	
	var hoeveelheid = parseInt($("hoeveelheid").value);
	if (isNaN(hoeveelheid)) {
	  alert("hoeveelheid niet juist ingevuld");
	  return;
	}
	
	var bedrag = parseFloat($("bedrag").innerHTML);
	var klant = parseInt($("klant").innerHTML);
	
	var aanbet = $("aanbet").value;
	if (aanbet == "") {
	  aanbet = 0;
	} else {
	  aanbet = parseFloat(aanbet);
	  if (isNaN(aanbet)) {
	    alert("aanbetaling niet juist ingevuld");
	    return;
	  }
	}
	  
	//perform an Ajax request
	new Ajax.Request(
	  "server.php",
	  {
	    method: "get",
	    parameters: { mode: "saveAankoop",
			  art: art,
			  afd: afd,
			  hoeveelheid: hoeveelheid,
			  bedrag: bedrag,
			  klant: klant,
			  aanbet: aanbet },
	    onSuccess: updateVerkopen,
	    onException: ajaxFailure,
	    onFailure: ajaxFailure
	  }
	);
}

/*When a sale is done, update the list of 'verkopen', using Scriptaculous!!!*/
function updateVerkopen(ajax){
	var item = document.createElement('li');
	item.innerHTML = $("art").innerHTML + " - " + $("beschrijving").value + " - " + $("naam").value;
	$("verkooplist").appendChild(item);
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
