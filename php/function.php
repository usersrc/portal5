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
?>