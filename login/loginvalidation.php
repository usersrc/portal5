<?php
	session_start();
	$host = "localhost";
	$user = "root";
	$pass = "login";
	$database = "portal5";

	echo "Hallo ".$_SESSION["user"].". Da dies deine erste Anmeldung ist, musst du aus Sicherheitsgruenden dein Passwort aendern.</br>";

	$_SESSION["pw1"] = $_POST["newpw"];
	$_SESSION["pw2"] = $_POST["newpwrepeat"];

		echo "<form method='Post' action='index.php'>
		Neues Passwort (mind. 6 Zeichen):<br><input type='password' name='newpw' placeholder='Neues Passwort'><br>
		Wiederhole dein neues Passwort:<br>
		<input type='password' name='newpwrepeat' placeholder='Passwort wiederholen'><br>
		<input type='submit' value='submit'>
		</form>";

	if (isset($_SESSION["pw1"]) AND isset($_SESSION["pw2"])) {
		if ($_SESSION["pw1"] != $_SESSION["pw2"]) {
			echo "Password doesn't match.";
		}

		if ($_SESSION["pw1"] == $_SESSION["pw2"]) {
			if(strlen($_SESSION["pw1"]) < 8) {
				echo "Password is to short.";
			} else {
			mysql_connect($host, $user, $pass) or die ("Fehler");
			mysql_select_db($database) or die ("Fehler");

			$newdata = "UPDATE user SET password = '".$_POST["newpw"]."', newuser = '0'
						WHERE username ='".$_SESSION["user"]."'";
			$update = mysql_query($newdata);

			header("Location: newpwisset.php");

			exit();
			}
		}
	}
?>
