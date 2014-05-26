<div id="perso_einsatzplanung_content">
	<div class="content_header">Einsatzplanung Flächenazubis</div>
	<table class="content_table">
		<tr>
			<th>ID</th>
			<th>Vorname</th>
			<th>Nachname</th>
			<th>Einsatzbeginn</th>
			<th>Einsatzende</th>
			<th>ABB</th>
		</tr>
		<tr>
			<?php
				
				connect_DB($localhost_DB, $username_DB, $password_DB, $database_DB);

				$abfrage = "SELECT e.ID, e.Vorname, e.Nachname, e.Einsatzbeginn, e.Einsatzende, m.Vorname as KVorname, m.Nachname as KNachname FROM Eingesetzte_Azubis e, Mitglieder m 
WHERE e.KoordinatorID = m.ID";
				$select = mysql_query($abfrage);

				while ($row = mysql_fetch_object($select)) {
					echo "<td>$row->ID</td><td>$row->Vorname</td><td>$row->Nachname</td><td>".date_mysql2german($row->Einsatzbeginn)."</td><td>".date_mysql2german($row->Einsatzende)."</td><td>$row->KVorname $row->KNachname</td>";
				}

			?>
		</tr>
	</table>
	<div class="button-dialog-open">+</div>
</div>
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
					<td><input id="startdate" type="text"></input></td>
					<td>bis: </td>
					<td><input id="enddate" type="text"></input></td>
				</tr>
				<tr>
					<td>Koordinator: </td>
					<td>
						<select>
						    <option value="" disabled="disabled" selected="selected">Please select a name</option>
						    <?php
						    	$abfrage_persoteam = "SELECT Mitglieder.ID, Mitglieder.Vorname, Mitglieder.Nachname FROM Mitglieder"; // !!!Tabelle Teamhistorie existiert nicht Teamhistorie WHERE Teamhistorie.KoordinatorID = Mitglieder.ID AND Teamhistorie.TeamID = Team.ID";
						    	$ausgabe_persoteam = mysql_query($abfrage_persoteam);
						    	while($row_persoteam = mysql_fetch_object($ausgabe_persoteam)) {
						    		echo "<option value='$row_persoteam->Mitglieder.ID'>$row_persoteam->Vorname $row_persoteam->Nachname</option>";
						    	}
						    ?>
						</select>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>