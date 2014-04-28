<html>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<head>
	
	<title></title>
</head>
<body>
<?php

$verbindung = mysql_connect ($localhost_DB,$username_DB, $password_DB)
or die ("keine Verbindung möglich. Benutzername oder Passwort sind falsch");

mysql_select_db($database_DB)
or die ("Die Datenbank existiert nicht.");

//$abfrage_user = "SELECT Vorname, Nachname, ID FROM Mitglieder WHERE Username = '$username'";
//Anfrage der eigenen Abwesenheiteinträge
$abfrage_urlaub = "SELECT a.Abwesenheit_von AS abs_von, a.Abwesenheit_bis AS abs_bis, abs.Abwesenheitstatus AS Status
FROM Mitglieder m, Abwesenheit a, Abwesenheitstatus abs
WHERE a.AbwesenheitstatusID = abs.ID
AND m.ID = a.MitgliedID
AND m.ID = $userID;";
/*Wenn das Formular abgeschickt wurde, dann wird dies ausgeführt*/
if(isset($_POST['neueAbwesenheit'])){
	$add_status = $_POST["urlaubsstatus"];
	$add_von = date_german2mysql($_POST["startdate"]);
	$add_bis = date_german2mysql($_POST["enddate"]);
	if($add_von=="" OR $add_bis==""){
		echo "Bitte ein Startdatum UND ein Enddatum angeben!";
		} else {
		$add_urlaub = "INSERT INTO Abwesenheit (MitgliedID, AbwesenheitstatusID, Abwesenheit_von, Abwesenheit_bis) VALUES ('$userID', '$add_status', '$add_von', '$add_bis')";
		mysql_query($add_urlaub) or die ("Es ist ein Fehler aufgetreten</br>Bitte wende dich an <a href='support@cooperation5.de'>support@cooperation5.de</a>$userID, $add_status, $add_von, $add_bis </br></br> $add_urlaub");
		echo "<div class='abfrageErfolgt'>Deine Abwesenheit wurde hinzugefügt</div></br>";
		};
};

/*Abfrage aller Abwesenheitstaten für das Dropdown-Menü*/
$abfrage_urlaub_all = "SELECT * FROM Abwesenheitstatus";

//$ausgabe_user = mysql_query($abfrage_user);
$ausgabe_urlaub = mysql_query($abfrage_urlaub);
$ausgabe_urlaub_all = mysql_query($abfrage_urlaub_all);

?>
<h1>Abwesenheit</h1>
Hier hast du eine Übersicht über deine eingetragene <b>Abwesenheiten</b>. Hinzu kannst du deine Abwesenheiten editieren oder löschen.</br></br>
<form method="post" action="?content=edit-abwesenheit">
	Bitte <b>Abwesenheitgrund</b> auswählen:</br></br>
	Ich bin im / in der (Bitte auswählen): 
	<select id="abwesenheitgrund" name='urlaubsstatus'>
		<?php
		/*Erstellen des Dropdown-Menüs*/
		while($row_urlaub_all = mysql_fetch_object($ausgabe_urlaub_all))
					   {
					   echo "<option value='$row_urlaub_all->ID' name='urlaubsstatus'>$row_urlaub_all->Abwesenheitstatus</option>";
					   }
		?>
	</select></br></br>
	<table width="400px" align="center">
		<tr>
			<td>von</td>
			<td><input id="startdate" type="text" style="width: 150px;" name="startdate"></td>
			<td>bis </td>
			<td><input id="enddate" type="text" style="width: 150px" name="enddate"></td>
		</tr>
	</table></br>
	<input type="submit" value="absenden" name="neueAbwesenheit">
</form>
</br></br>
<b>Meine Abwesenheit</b></br></br>
<table class="abwesenheitliste" id="urlaub">
    <tr class="header">
        <td width="90px"></td>
        <td width="90px">Von</td>
        <td width="90px">Bis</td>
    </tr>
        <?php
			while($row_urlaub = mysql_fetch_object($ausgabe_urlaub))
			   {
			   $abs_von_ger = date_mysql2german($row_urlaub->abs_von);
			   $abs_bis_ger = date_mysql2german($row_urlaub->abs_bis);
			   echo "<tr><td>$row_urlaub->Status</td><td>$abs_von_ger</td><td>$abs_bis_ger</td></tr>";
			   }
		?>
    </tr>
</table>
</body>