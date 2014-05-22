

<!-- Eingabe von UserDaten -->


<html>
<meta charset="utf-8"/>
<head>

<link rel="stylesheet" type= "text/css" href="UserAnlegen.css"/>

<link rel="stylesheet" type= "text/css" href="C:\Program Files\XAMPP\htdocs\portal5\css\c5portal.css"/>
<link type="text/css" rel="stylesheet" href="C:\Program Files\XAMPP\htdocs\portal5\css\css_reset.min.css"/>

</head>



<body>

<?php
$localhost_DB  = "wp023.webpack.hosteurope.de";
$username_DB   = "dbu1055626";
$password_DB   = "cooperation5_xxl";
$database_DB   = "db1055626-projektdev";

$verbindung = mysql_connect ($localhost_DB,
$username_DB, $password_DB)
or die ("keine Verbindung möglich. Benutzername oder Passwort sind falsch");

mysql_select_db($database_DB)
or die ("Die Datenbank existiert nicht.");


 ?>  
<form id="Geruest" action="?content=koordinatoren&new=Datenbank" method="post">

 Vorname :<br>
<input type="text" size="24" maxlength="50"
name="Vorname"><br>

Nachname :<br>
<input type="text" size="24" maxlength="50"
name="Nachname"><br>

Username:<br>
<input type="text" size="24" maxlength="50"
name="Username"><br>

Geburtstag:<br>
<input type="date"("Y-m-d") size="24" maxlength="50"
name="Geburtstag"><br><br>

Team:<br>
<?php
$abfrage = "SELECT * FROM Team";
$ergebnis = mysql_query($abfrage);
echo "<select name='TeamID'> ";
while($row = mysql_fetch_object($ergebnis))
   {
   echo "<option value ='$row->ID'> $row->Name </option> <br>";
   }  
   ?>
   </select> <br><br>

Positions:<br>
<?php
$abfrage = "SELECT * FROM Position";
$ergebnis = mysql_query($abfrage);
echo "<select name='PositionsID'> ";
while($row = mysql_fetch_object($ergebnis))
   {
   echo "<option value ='$row->ID'> $row->Name </option> <br>";
   }  
   ?>
   </select> <br><br>

Ausbildungsberuf:<br>
<?php
$abfrage = "SELECT * FROM 
Ausbildungsberufe";
$ergebnis = mysql_query($abfrage);
echo "<select name='AusbildungsberufID'> ";
while($row = mysql_fetch_object($ergebnis))
   {
   echo "<option value ='$row->ID'> $row->Name </option> <br>";
   }  
   ?>
   </select> <br><br>

Email:<br>
<input type="Email" size="24" maxlength="50"
name="Email"><br> <br>

<input type="submit" value="Neues Mitglied anlegen">

</form> </a>



</body>

</html>