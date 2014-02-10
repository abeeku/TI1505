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
	$klant = $_REQUEST['klant'];
	
	$result = mysql_query("SELECT * FROM klant WHERE klant = " . $klant . ";");
	if ($klantrow = mysql_fetch_array($result, MYSQL_NUM)) {
		print implode(';', $klantrow);
	}
}


else if(isset($_REQUEST['mode']) && $_REQUEST['mode']=='saveAankoop'){
	$art = $_REQUEST['art'];
	$afd = $_REQUEST['afd'];
	$hoeveelheid = $_REQUEST['hoeveelheid'];
	$bedrag = $_REQUEST['bedrag'];
	$klant = $_REQUEST['klant'];
	$aanbet = $_REQUEST['aanbet'];
	$sql = "INSERT INTO verkoop
		VALUES (null,
			\"" . $art . "\",
			\"" . $afd . "\",
			\"" . $hoeveelheid . "\",
			\"" . $bedrag . "\",
			\"" . $klant . "\",
			\"" . DATE("Y-m-d") . "\",
			\"" . $aanbet . "\");";
	$result = mysql_query($sql);
}

?>
