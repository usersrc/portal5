<?php
	session_start();
	
	$host = "localhost";
	$dbuser = "root";
	$dbpass = "login";
	$database = "portal5";
	
	$_SESSION["user"] = $_POST["name"];
	$_SESSION["password"] = $_POST["pw"];
	

	
	#if ($_SESSION["user"] == "" AND $_SESSION["password"] == "") {
		echo "<form method='Post' action='index.php'>
		Name:<br>
		<input type='text' name='name' value=''><br>
		Passwort:<br>
		<input type='password' name='pw' value=''><br>
		<input type='submit' value='login'>
		</form>";
		#}
			
	if ($_SESSION["user"] != "" AND $_SESSION["password"] != "") {
	
		mysql_connect($host, $dbuser, $dbpass) or die ("Fehler");
		mysql_select_db($database) or die ("Fehler");
		
		$sql = "SELECT * FROM user WHERE username ='".$_SESSION["user"]."' AND 
				password = '".$_SESSION["password"] = $_POST["pw"]."' LIMIT 1";
		$res = mysql_query($sql);

				if (mysql_num_rows($res) == 0) {
					echo "<p>invalid login</p>";
				}
				
				if (mysql_num_rows($res) == 1) {
					$query = "SELECT default_pw FROM user WHERE username ='".$_SESSION["user"]."' AND 
							  password = '".$_SESSION["password"] = $_POST["pw"]."'";
					$result = mysql_query($query);
					$row = mysql_fetch_object($result);
							
					if($row->default_pw == 1) {
						header("Location: loginvalidation.php");
						exit();
					} else {
						header("Location: geheim.html");
						exit();
					}
				} 
		}
?>
