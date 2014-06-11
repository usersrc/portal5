

<div class="content_header">Koordinatorenübersicht</div>
<div class="KoordinatorenContent">
	<table class="content_table">
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
			while($row = mysql_fetch_object($ergebnis)) {
				echo "<tr><td>  $row->Vorname </td><td>  $row->Nachname </td><td>  $row->Username </td><td>  $row->Geburtstag </td><td>  $row->Email </td></tr>";
			}


			// bei submit:
			if(isset($_POST['neuerKoordinator'])) {
				$vorname = $_POST['vorname'];
				$nachname = $_POST['nachname'];
				$username = $_POST['username'];
				$mail = $_POST['mail'];
				$geburtstag = $_POST['geburtstag'];
				$team = $_POST['team'];
				$position = $_POST['position'];
				$beruf = $_POST['beruf'];

				$eintrag = "INSERT INTO Mitglieder
							(Vorname, Nachname, Username, Geburtstag, TeamID, PositionsID, AusbildungsberufID, Email)
							VALUES 
							('$vorname', '$nachname', '$username', '$geburtstag', '$team', '$position', '$beruf', '$mail')";

				$eintrag_query = mysql_query($eintrag);
				if($eintrag_query) {
					echo 'Erfolgreich!';
				} else {
					echo 'Houston, wir haben ein Problem!';
				}
			}
  		?>
		
	</table>
	<div class="button-dialog-open">Koordinator hinzufügen</div>
</div>

<div id="background"></div>
<div class="dialog">
	<div class="dialog_header"><div class="dialog_headline">Koordinator hinzufügen</div><div class="dialog_close"></div></div>
	<div class="dialog_content">
		<form class="dialog_form" method="post" action="?content=koordinatoren">
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
					<td>Username:</td>
					<td><input type="text" name="username"></input></td>
				</tr>
				<tr>
					<td>E-Mail:</td>
					<td><input type="text" name="mail"></input></td>
				</tr>
					<td>Geburtstag:</td>
					<td><input type="date" name="geburtstag"></input></td>
				<tr>
					<td>Team: </td>
					<td>
						<select>
						    <option value="" disabled="disabled" selected="selected">Team...</option>
						    <?php
						    	$abfrage_team = "SELECT ID, Name FROM Team";
						    	$ausgabe_team = mysql_query($abfrage_team);
						    	while($row_team = mysql_fetch_object($ausgabe_team)) {
						    		echo "<option value='$row_team->ID' name='team'>$row_team->Name</option>";
						    	}
						    ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Position: </td>
					<td>
						<select>
						    <option value="" disabled="disabled" selected="selected">Position...</option>
						    <?php
						    	$abfrage_position = "SELECT ID, Name FROM Position";
						    	$ausgabe_position = mysql_query($abfrage_position);
						    	while($row_position = mysql_fetch_object($ausgabe_position)) {
						    		echo "<option value='$row_position->ID' name='position'>$row_position->Name</option>";
						    	}
						    ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Ausbildungsberuf: </td>
					<td>
						<select>
						    <option value="" disabled="disabled" selected="selected">Beruf...</option>
						    <?php
						    	$abfrage_beruf = "SELECT ID, Name FROM Ausbildungsberufe";
						    	$ausgabe_beruf = mysql_query($abfrage_beruf);
						    	while($row_beruf = mysql_fetch_object($ausgabe_beruf)) {
						    		echo "<option value='$row_beruf->ID' name='beruf'>$row_beruf->Name</option>";
						    	}
						    ?>
						</select>
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="hinzufügen" name="neuerKoordinator"></td>
				</tr>
			</table>
		</form>
	</div>
</div>
