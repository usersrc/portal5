<?php

$host = "localhost";
$user = "root";
$pass = "login";
$database = "portal5";

	mysql_connect($host, $user, $pass) or die ("Fehler");
	mysql_select_db($database) or die ("Fehler");

	$sql = "SELECT email FROM user WHERE email = '".$_POST["mail"]."' LIMIT 1";
	$query = mysql_query($sql);
	$row = mysql_fetch_object($query);
 	
 	if($row->email == $_POST["mail"]){
 	

	$funzt = "rndm_string";

		function rndm_string($lng)
		   {
		   mt_srand(crc32(microtime()));

		   //Welche Buchstaben benutzt werden sollen (Charset)
		   $buchstaben = "abcdefghijkmnpqrstuvwxyz123456789";
		   
		   $str_lng = strlen($buchstaben)-1;
		   $rand= "";

		   for($i=0;$i<$lng;$i++)        
			  $rand.= $buchstaben{mt_rand(0, $str_lng)};

		   return $rand;
		   } 
		   	
					$newdata = "UPDATE user SET password = '".$funzt(8)."' WHERE email ='".$_POST["mail"]."'";
					$update = mysql_query($newdata);

		$msg = "test";

		// Send
		mail($mailTo, 'Mein Betreff', $msg);

			echo "versendet";

		 	} else {
		 	echo "eMail-Adresse nicht im System gefunden.";
		 }
 
?>
