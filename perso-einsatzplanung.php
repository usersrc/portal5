<div id="perso_einsatzplanung_content">
	<?php
	connect_DB($localhost_DB, $username_DB, $password_DB, $database_DB);
	// Bei submit:
	if(isset($_POST['neuerAzubi'])) {
		$vorname = $_POST['vorname'];
		$nachname = $_POST['nachname'];
		$startdate = date_german2mysql($_POST['startdate']);
		$enddate = date_german2mysql($_POST['enddate']);
		$koordinatorID = $_POST['koordinator'];
		// $koordinatorID = (int)$koordinatorIDtest;

		$eintrag = ("INSERT INTO Eingesetzte_Azubis (Vorname, Nachname, Einsatzbeginn, Einsatzende, KoordinatorID)
					VALUES('$vorname', '$nachname', '$startdate', '$enddate', '$koordinatorID')");

		// mysql_query($eintrag) or die('Houston, wir haben immer noch ein Problem!');
		$eintrag_query = mysql_query($eintrag);
		if($eintrag_query) {
			echo 'Erfolgreich!';
		} else {
			echo 'Houston, wir haben ein Problem!'.$koordinatorID;
		}
	}
?>
	<div class="content_header">Einsatzplanung Flächenazubis</div>
	<table class="content_table">
		<tr>
			<th>ID</th>
			<th>Vorname</th>
			<th>Nachname</th>
			<th>Einsatzbeginn</th>
			<th>Einsatzende</th>
			<th>ABB</th>
			<th>Bearbeitung<th>
		</tr>

			<?php

				connect_DB($localhost_DB, $username_DB, $password_DB, $database_DB);

				$abfrage = "SELECT e.ID, e.Vorname, e.Nachname, e.Einsatzbeginn, e.Einsatzende, m.Vorname as KVorname, m.Nachname as KNachname, e.deleted FROM Eingesetzte_Azubis e, Mitglieder m
WHERE e.KoordinatorID = m.ID";
				$select = mysql_query($abfrage);

				while ($row = mysql_fetch_object($select)) {
					if(!$row->deleted) {
						echo "<tr><td>$row->ID</td><td>$row->Vorname</td><td>$row->Nachname</td><td>".date_mysql2german($row->Einsatzbeginn)."</td><td>".date_mysql2german($row->Einsatzende)."</td><td>$row->KVorname $row->KNachname</td><td class='remove-table'>löschen</td></tr>";
					}
				}
			?>

	</table>
	<div class="button-dialog-open">hinzufügen</div>
</div>

<!-- Dialog 'hinzufügen' -->
<div id="background"></div>
<div class="dialog">
	<div class="dialog_header"><div class="dialog_headline">Azubi hinzufügen</div><div class="dialog_close"></div></div>
	<div class="dialog_content">
		<form class="dialog_form" method="post" action="?content=einsatzplanung">
			<table>
				<tr>
					<td>Vorname:</td>
					<td><input type="text" name="vorname"></input></td>
				</tr>
				<tr>
					<td>Nachname:</td>
					<td><input type="text" name="nachname"></input></td>
				</tr>
				<tr>
					<td>von: </td>
					<td><input id="startdate" name="startdate" type="text"></input></td>
					<td>bis: </td>
					<td><input id="enddate" name="enddate" type="text"></input></td>
				</tr>
				<tr>
					<td>Koordinator: </td>
					<td>
						<select name="koordinator">
						    <option value="" disabled="disabled" selected="selected">Please select a name</option>
						    <?php
						    	$abfrage_persoteam = "SELECT Mitglieder.ID, Mitglieder.Vorname, Mitglieder.Nachname FROM Mitglieder"; // !!!Tabelle Teamhistorie existiert nicht Teamhistorie WHERE Teamhistorie.KoordinatorID = Mitglieder.ID AND Teamhistorie.TeamID = Team.ID";
						    	$ausgabe_persoteam = mysql_query($abfrage_persoteam);
						    	while($row_persoteam = mysql_fetch_object($ausgabe_persoteam)) {
						    		echo "<option value='$row_persoteam->ID'>$row_persoteam->Vorname $row_persoteam->Nachname $row_persoteam->ID</option>";
						    	}
						    ?>
						</select>
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="hinzufügen" name="neuerAzubi"></input></td>
				</tr>
			</table>
		</form>
	</div>
</div>
