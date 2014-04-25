<?php
function date_mysql2german($date) {
		$d    =    explode("-",$date);
		return    sprintf("%02d.%02d.%04d", $d[2], $d[1], $d[0]);
}
?>