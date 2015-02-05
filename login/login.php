<?php

	$host = "localhost";
	$dbuser = "root";
	$dbpass = "login";
	$database = "portal5";

	$_SESSION['USER'] = $_POST['NAME'];
	$_SESSION['PASSWORD'] = $_POST['PW'];

		echo "<form method='Post' action='index.php'>
		<input type='text' name='NAME' placeholder='Benutzername'>
		<input type='password' name='PW' placeholder='Passwort'>
		<input type='submit' value='login'>
		</form>";

	if ($_SESSION['USER'] != "" AND $_SESSION['PASSWORD'] != "") {

		mysql_connect($host, $dbuser, $dbpass) or die ("Fehler");
		mysql_select_db($database) or die ("Fehler");

		$sql = "SELECT * FROM user WHERE username ='".$_SESSION['USER']."' AND
				password = '".$_SESSION['PASSWORD'] = $_POST['PW']."' LIMIT 1";
		$res = mysql_query($sql);

				if (mysql_num_rows($res) == 0) {
					echo "invalid login";
				}

				if (mysql_num_rows($res) == 1) {
					$query = "SELECT newuser FROM user WHERE username ='".$_SESSION['USER']."' AND
							  password = '".$_SESSION['PASSWORD'] = $_POST["pw"]."'";
					$result = mysql_query($query);
					$row = mysql_fetch_object($result);

					if($row->newuser == 1) {
            $_SESSION['FIRSTLOGIN'] = "blah";
						header("Location: index.php");
					} else {
						$_SESSION['LOGIN'] = 1;
						$team = "SELECT team FROM user WHERE username ='".$_SESSION["user"]."' AND
						password = '".$_SESSION["password"] = $_POST["pw"]."'";
						$resultTeam = mysql_query($team);
						$rowTeam = mysql_fetch_object($resultTeam);

						setcookie("team", $rowTeam->team, 0, '/');
						header("Location: index.php");
					}
				}
		}
?>
