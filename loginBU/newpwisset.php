<?php
	session_start();
	setcookie ("firstlogin", "", time() - 3600);
	setcookie ("login", "", time() - 3600);

	header('refresh:3;http://mobile.dev/portal5');

	echo "Dein Passwort wurde erfolgreich geaendert. Du wirst nun automatisch vom System ausgeloggt und auf die Startseite weitergeleitet. Falls nicht, klicke bitte hier."
?>
