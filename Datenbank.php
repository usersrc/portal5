


<html>
<meta charset="utf-8"/>
<head>

<link rel="stylesheet" type="text/css" href="UserAnlegen.css"/>
<link rel="stylesheet" type="text/css" href="DatenbankStyle.css"/>
<link rel="stylesheet" type= "text/css" href="C:\Program Files\XAMPP\htdocs\portal5\css\c5portal.css"/>
<link type="text/css" rel="stylesheet" href="C:\Program Files\XAMPP\htdocs\portal5\css\css_reset.min.css"/>

</head>
<body>
<div id"databaseStyle">
	<table>
		<tr> 
			<th> Vorname </th>
			<th> Nachname </th>
			<th> Username </th>
			<th> Geburtstag </th>
			<th> Email </th> 
		</tr>
<?php
$localhost_DB  = "wp023.webpack.hosteurope.de";
$username_DB   = "dbu1055626";
$password_DB   = "cooperation5_xxl";
$database_DB   = "db1055626-projektdev";

$verbindung = mysql_connect ($localhost_DB,
$username_DB, $password_DB)
or die ("keine Verbindung möglich. Benutzername oder Passwort sind falsch");

mysql_select_db($database_DB)
or die ("Die Datenbank existiert nicht.");

$abfrage = "SELECT Vorname, Nachname, Username, Geburtstag, Email FROM Mitglieder";
$ergebnis = mysql_query($abfrage);
while($row = mysql_fetch_object($ergebnis))
   {
  
   echo " <tr class='test'> 
 	<td>  $row->Vorname </td> 
   	<td>  $row->Nachname </td> 
   	<td>  $row->Username </td> 
   	<td>  $row->Geburtstag </td> 
   	<td>  $row->Email </td>
   </tr>"; 
   }  

function date_german2mysql($date) {
    $d    =    explode(".",$date);
    return    sprintf("%02d-%02d-%04d", $d[2], $d[1], $d[0]);
}
?>
</table>
</div>

<?php
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

$ergebnis = mysql_query($abfrage); // <- Lieste Ariadne, diese Zeile ist wundervoll. Sie ist sehr wichtig.
while ($row = mysql_fetch_array($ergebnis, MYSQL_ASSOC)) {
	$usernameTest = $row['Username'];
	if ($usernameTest == $Username) {
			$existiertbereits = true;
			break;
	}
}

if($existiertbereits == true) { 
	echo  "Username schon vorhanden"; 


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





</body>
</html>