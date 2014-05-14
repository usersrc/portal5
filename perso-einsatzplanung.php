<div id="perso_einsatzplanung_content">
	<div id="perso_einsatzplanung_header">Einsatzplanung Flächenazubis</div>
	<table id="perso_einsatzplanung_table">
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
	<div class="dialog_header"><div class="dialog_headline">Azubi hinzufügen</div><div class="dialog_close">X</div></div>
</div>