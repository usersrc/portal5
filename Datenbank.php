<?php
$localhost_DB  = "xxx";
$username_DB   = "xxx";
$password_DB   = "xxx";
$database_DB   = "xxx";

$verbindung = mysql_connect ($localhost_DB,
$username_DB, $password_DB)
or die ("keine Verbindung möglich. Benutzername oder Passwort sind falsch");

mysql_select_db($database_DB)
or die ("Die Datenbank existiert nicht.");

$abfrage = "SELECT Vorname, Nachname, Username, Geburtstag, Email FROM Mitglieder";
$ergebnis = mysql_query($abfrage);
while($row = mysql_fetch_object($ergebnis))
   {
   
   echo "$row->Vorname, $row->Nachname, $row->Username, $row->Geburtstag, $row->Email <br>";
   }  

function date_german2mysql($date) {
                        $d    =    explode(".",$date);
                        return    sprintf("%02d-%02d-%04d", $d[2], $d[1], $d[0]);
}

$neuerUser = $row->Username; 

/*$ID = $_POST["ID"];*/
$Vorname = $_POST["Vorname"]; 
$Nachname = $_POST["Nachname"]; 
$Username = $_POST["Username"];
$Geburtstag = $_POST["Geburtstag"]; 
$TeamID = $_POST ["TeamID"]; 
$PositionsID = $_POST ["PositionsID"]; 
$AusbildungsberufID = $_POST["AusbildungsberufID"];
$Email = $_POST ["Email"]; 

$geb = date_german2mysql($Geburtstag); 
$existiertbereits = false; 

while($row = mysql_fetch_array($ergebnis, MYSQL_ASSOC)) {
	$usernameTest = $row["Username"]; 
	if ($Username == $usernameTest) {

			$existiertbereits = true;

	}
}

if($existiertbereits == true) { 
	echo "Username schon vorhanden"; 


} else {
$eintrag = "INSERT INTO Mitglieder
(Vorname, Nachname, Username, Geburtstag , TeamID,  PositionsID, AusbildungsberufID, Email)   
VALUES
('$Vorname', '$Nachname', '$Username' , '$geb', '$TeamID' ,'$PositionsID', '$AusbildungsberufID', '$Email')";      


$eintragen = mysql_query($eintrag); 
if ($eintragen == true) { 
echo "Der Eintrag war erfolgreich";

} else { 
echo "Der Eintrag ist leider fehlgeschlagen";
}


} 







?>