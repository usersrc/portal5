<?php
/*Für die Formatierung von MySQL (yyyy-mm-dd) zur deutschen Datumanzeige (dd.mm.yyyy)*/
function date_mysql2german($date) {
		$d    =    explode("-",$date);
		return    sprintf("%02d.%02d.%04d", $d[2], $d[1], $d[0]);
};

/*Für die Formatierung von der deutschen Datumsanzeige (dd.mm.yyyy) in die MySQL-Schreibweise (yyyy-mm-dd)*/
function date_german2mysql($date) {
		$d    =    explode(".",$date);
		return    sprintf("%04d-%02d-%02d", $d[2], $d[1], $d[0]);
};

function connect_DB($localhost_DB, $username_DB, $password_DB, $database_DB) {
	$verbindung = mysql_connect ($localhost_DB,
	$username_DB, $password_DB)
	or die ("keine Verbindung möglich. Benutzername oder Passwort sind falsch");

	mysql_select_db($database_DB)
	or die ("Die Datenbank existiert nicht.");
}

// compare two dates
function isAGreaterThanB($timeA, $timeB) {
	//return strtotime($timeA) > strtotime($timeB);
	if (strtotime($timeA) > strtotime($timeB)) {
		return true;
	} else {
		return false;
	}
}
?>
