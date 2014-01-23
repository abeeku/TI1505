<?php
include_once("db.php");

if (isset($_REQUEST['mode']) && $_REQUEST['mode']=='getArtikel'){
	$art = $_REQUEST['artikel'];
	
	$result = mysql_query("SELECT * FROM artikel WHERE art = " . $art . ";");
	if ($artrow = mysql_fetch_array($result, MYSQL_NUM)) {
		$result = mysql_query("SELECT afd FROM verkart WHERE art = " . $art . ";");
		while ($afdrow = mysql_fetch_array($result, MYSQL_NUM)) {
			array_push($artrow, $afdrow[0]);
		}
		print implode(';', $artrow);
	}
}

else if (isset($_REQUEST['mode']) && $_REQUEST['mode']=='getKlant'){
	//Request all the information from an customer
}


else if(isset($_REQUEST['mode']) && $_REQUEST['mode']=='saveAankoop'){
	//Save a purchase to the database
}

?>
