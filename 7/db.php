<?php

	$mysqlhost = "localhost"; 
	$user = "root";
	$passwd = "kepouT12";
	
	
	$mysql = mysql_connect($mysqlhost, $user, $passwd);
	if (!$mysql) {
		die('Could not connect: ' . mysql_error());
	}

	mysql_select_db('winkel2006');


?>
