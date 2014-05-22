

<!-- Eingabe von UserDaten -->
<?php

connect_DB($localhost_DB,
$username_DB, $password_DB, $database_DB);


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
