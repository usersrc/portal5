<?php
if (isset($_POST['line']) === true && empty($_POST['line']) === false) {
	require "database.php";
	require "function.php";
	
	$verbindung = mysql_connect ($localhost_DB,$username_DB, $password_DB)
	or die ("keine Verbindung möglich. Benutzername oder Passwort sind falsch");
	
	mysql_select_db($database_DB)
	or die ("Die Datenbank existiert nicht.");
	
	$delete_line = $_POST['line'];
	$abfrage_id_urlaub = "SELECT a.ID, a.Abwesenheit_von AS abs_von, a.Abwesenheit_bis AS abs_bis
	FROM Abwesenheit a
	WHERE a.ID = $delete_line";
	$delete_id_urlaub = "DELETE FROM Abwesenheit WHERE Abwesenheit.ID = $delete_line";
	$id_urlaub_query = mysql_query($abfrage_id_urlaub) OR die("Error: $abfrage_id_urlaub <br>".mysql_error());
	mysql_query($delete_id_urlaub);
	
	while($id_urlaub_row = mysql_fetch_object($id_urlaub_query))
		{
		$abs_von_ger = date_mysql2german($id_urlaub_row->abs_von);
		$abs_bis_ger = date_mysql2german($id_urlaub_row->abs_bis);
		
		echo "Deine Abwesenheit vom $abs_von_ger bis $abs_bis_ger wurde gelöscht!";
		}
};
?>