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

connect_DB($localhost_DB, $username_DB, $password_DB, $database_DB);

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