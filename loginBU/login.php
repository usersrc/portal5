<?php
  session_start();
	$host = "localhost";
	$dbuser = "root";
	$dbpass = "login";
	$database = "portal5";

	$_SESSION["user"] = $_POST["name"];
	$_SESSION["password"] = $_POST["pw"];

		echo "<form method='Post' action='index.php'>
		<input type='text' name='name' placeholder='Benutzername'>
		<input type='password' name='pw' placeholder='Passwort'>
		<input type='submit' value='login'>
		</form>";

	if ($_SESSION["user"] != "" AND $_SESSION["password"] != "") {

		mysql_connect($host, $dbuser, $dbpass) or die ("Fehler");
		mysql_select_db($database) or die ("Fehler");

		$sql = "SELECT * FROM user WHERE username ='".$_SESSION["user"]."' AND
				password = '".$_SESSION["password"] = $_POST["pw"]."' LIMIT 1";
		$res = mysql_query($sql);

				if (mysql_num_rows($res) == 0) {
					echo "invalid login";
				}

				if (mysql_num_rows($res) == 1) {
					$query = "SELECT newuser FROM user WHERE username ='".$_SESSION["user"]."' AND
							  password = '".$_SESSION["password"] = $_POST["pw"]."'";
					$result = mysql_query($query);
					$row = mysql_fetch_object($result);

					if($row->newuser == 1) {
						setcookie("firstlogin", $query, 0);
						setcookie("login",$_SESSION["user"],0);
						header("Location: index.php");
					} else {
						$team = "SELECT team FROM user WHERE username ='".$_SESSION["user"]."' AND
						password = '".$_SESSION["password"] = $_POST["pw"]."'";
						$resultTeam = mysql_query($team);
						$rowTeam = mysql_fetch_object($resultTeam);

						//setcookie("login",$_SESSION["user"],0, '/');
						setcookie("team", $rowTeam->team, 0, '/');
						header("Location: index.php");
					}
				}
		}
?>
