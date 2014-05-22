
<!-- <html> 
<head> 
<meta charset="utf-8" >

<link rel="stylesheet" type= "text/css" href="UserAnlegen.css"/>
<link rel="stylesheet" type= "text/css" href="C:\Program Files\XAMPP\htdocs\portal5\css\c5portal.css"/>
<link type="text/css" rel="stylesheet" href="C:\Program Files\XAMPP\htdocs\portal5\css\css_reset.min.css"/>

</head>
</head>

<body> -->
<div class="content_header">Koordinatorenübersicht</div>


<div class="KoordinatorenContent">
	<table>
		<tr> 
			<th> Vorname </th>
			<th> Nachname </th>
			<th> Username </th>
			<th> Geburtstag </th>
			<th> Email </th> 
		</tr>
		<tr>
		<?php 
			$abfrage = "SELECT Vorname, Nachname, Username, Geburtstag, Email FROM Mitglieder";
			$ergebnis = mysql_query($abfrage);
			while($row = mysql_fetch_object($ergebnis)) {
				echo "<td>  $row->Vorname </td><td>  $row->Nachname </td><td>  $row->Username </td><td>  $row->Geburtstag </td><td>  $row->Email </td>";
			}
  		?>
		</tr>
	</table>



<div class="button-dialog-open">Koordinator hinzufügen</div>

<?php 

$new = $_GET["new"]; 

// switch($_REQUEST['new']) {
		
// 		/*
// 		Perso
// 		*/
// 		case 'UserAnlegen': include 'UserAnlegen.php';
// 			break; 
// 		case 'Datenbank': include 'Datenbank.php';
// 			break; 
// 		 default: include 'home.php';

// 	}
		
?>

<div id="background"></div>
<div class="dialog">
	<div class="dialog_header"><div class="dialog_headline">Azubi hinzufügen</div><div class="dialog_close"></div></div>
	<div class="dialog_content">
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
	</div>
</div>

</div>