

<!-- Eingabe von UserDaten -->


<html>
<head></head>

<body>

<?php
$localhost_DB  = "xxx";
$username_DB   = "xxx";
$password_DB   = "xxx";
$database_DB   = "xxx";

$verbindung = mysql_connect ($localhost_DB,
$username_DB, $password_DB)
or die ("keine Verbindung möglich. Benutzername oder Passwort sind falsch");

mysql_select_db($database_DB)
or die ("Die Datenbank existiert nicht.");


 ?>
<form action="Datenbank.php"  method="post">

 Dein Vorname :<br>
<input type="text" size="24" maxlength="50"
name="Vorname"><br><br>

Dein Nachname :<br>
<input type="text" size="24" maxlength="50"
name="Nachname"><br>

Dein Username:<br>
<input type="text" size="24" maxlength="50"
name="Username"><br>

Dein Geburtstag:<br>
<input type="date"("Y-m-d") size="24" maxlength="50"
name="Geburtstag"><br>

Team ID:<br>
<?php
$abfrage = "SELECT * FROM Team";
$ergebnis = mysql_query($abfrage);
echo "<select name='TeamID'> ";
while($row = mysql_fetch_object($ergebnis))
   {
   echo "<option value ='$row->ID'> $row->Name </option> <br>";
   }  
   ?>
   </select> <br>

Positions ID:<br>
<?php
$abfrage = "SELECT * FROM Position";
$ergebnis = mysql_query($abfrage);
echo "<select name='TeamID'> ";
while($row = mysql_fetch_object($ergebnis))
   {
   echo "<option value ='$row->ID'> $row->Name </option> <br>";
   }  
   ?>
   </select> <br>

Ausbildungsberuf ID:<br>
<?php
$abfrage = "SELECT * FROM 
Ausbildungsberufe";
$ergebnis = mysql_query($abfrage);
echo "<select name='TeamID'> ";
while($row = mysql_fetch_object($ergebnis))
   {
   echo "<option value ='$row->ID'> $row->Name </option> <br>";
   }  
   ?>
   </select> <br>

 Deine Email:<br>
<input type="Email" size="24" maxlength="50"
name="Email"><br> 

<input type="submit" value="Neues Mitglied anlegen">

</form> </a>



</body>

</html>