<html>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<head>
<title></title></head>
<body>
<?php

$verbindung = mysql_connect ($localhost_DB,
$username_DB, $password_DB)
or die ("keine Verbindung möglich. Benutzername oder Passwort sind falsch");

mysql_select_db($database_DB)
or die ("Die Datenbank existiert nicht.");

$abfrage_user = "SELECT Vorname, Nachname, ID FROM Mitglieder WHERE Username = '$username'";
$abfrage_urlaub = "SELECT a.Abwesenheit_von AS abs_von, a.Abwesenheit_bis AS abs_bis, abs.Abwesenheitstatus AS Status
FROM Mitglieder m, Abwesenheit a, Abwesenheitstatus abs
WHERE a.AbwesenheitstatusID = abs.ID
AND m.ID = a.MitgliedID
AND m.ID = $userID;";
$abfrage_urlaub_all = "SELECT * FROM Abwesenheitstatus";

$ausgabe_user = mysql_query($abfrage_user);
$ausgabe_urlaub = mysql_query($abfrage_urlaub);
$ausgabe_urlaub_all = mysql_query($abfrage_urlaub_all);
?>
</br>
Hier hast du eine Übersicht über deine eingetragene <b>Abwesenheiten</b>. Hinzu kannst du deine Abwesenheiten editieren oder löschen.</br></br>
Bitte <b>Abwesenheitgrund</b> auswählen:</br></br>
Ich bin im / in der (Bitte auswählen): <select id="abwesenheitgrund">
<?php
while($row_urlaub_all = mysql_fetch_object($ausgabe_urlaub_all))
			   {
			   echo "<option value='$row_urlaub_all->ID'>$row_urlaub_all->Abwesenheitstatus</option>";
			   }
?>
</select></br></br>
<table width="400px">
    <tr>
        <td>von</td>
        <td><input id="startdate" type="text" style="width: 150px;"></td>
        <td>bis </td>
        <td><input id="enddate" type="text" style="width: 150px"></td>
    </tr>
</table></br></br>
<b>Meine Abwesenheit</b></br>
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