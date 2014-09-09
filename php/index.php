<html>
<?php
$username='kkosche';
?>
<head>
	<meta charset="utf-8" />
	<link type="text/css" rel="stylesheet" href="css/c5portal.css"/>
	<link type="text/css" rel="stylesheet" href="css/css_reset.min.css"/>
	<link type="text/css" rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" type="text/css" href="DatenbankStyle.css"/>
	<link type="text/css" rel="stylesheet" href="UserAnlegen.css"/>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<?php
	include "php/database.php";
	include "php/function.php";
	?>
</head>
<body>
<div id="header">
Portal5 (interne Administration)
</div>
<div id="navigation_back">
	<div id="navigation">
		<ul class="nav_section" id="nav_myc5">
			<li class="nav_header nav_header_myC5"><a href="?content=start">myC5</a></li>
			<li class="nav_link nav_visible" id="abwesenheit"><a href="?content=abwesenheit">Abwesenheitübersicht</a></li>
			<li class="nav_link nav_visible" id="edit-abwesenheit"><a href="?content=edit-abwesenheit">Meine Abwesenheiten</a></li>
		</ul>

		<ul class="nav_section" id="nav_perso">
			<li class="nav_header">Perso</li>
			<li class="nav_link nav_visible" id="einsatzplanung"><a href="?content=einsatzplanung">Einsatzplanung</a></li>		
			<li class="nav_link nav_visible" id="koordinatoren"><a href="?content=koordinatoren">Koordinatoren</a></li>
			<li class="nav_link nav_visible" id="bewerbung"><a href="?content=bewerbung">Bewerbung</a></li>
		</ul>

		<ul class="nav_section" id="nav_finanzen">			
			<li class="nav_header">Finanzen</li>			
			<li class="nav_link nav_visible" id="fib"><a href="?content=fib">FIB</a></li>			
			<li class="nav_link nav_visible" id="kva"><a href="?content=kva">KVA</a></li>
			<li class="nav_link nav_visible" id="rechnung"><a href="?content=rechnung">Rechnung</a></li>
		</ul>

		<ul class="nav_section" id="nav_event">			
			<li class="nav_header">Event</li>
			<li class="nav_link nav_visible" id="fib-werbe"><a href="?content=fib-werbe">FIB</a></li>
		</ul>

		<ul class="nav_section" id="nav_werbeteam">			
			<li class="nav_header">Werbeteam</li>
			<li class="nav_link nav_visible" id="fib-event"><a href="?content=fib-event">FIB</a></li>
		</ul>

		<ul class="nav_section" id="nav_support">			
			<li class="nav_header">Support</li>			
			<li class="nav_link nav_visible" id="auftrag"><a href="?content=auftrag">Report</a></li>
		</ul>
	</div>
</div>

<div id="content">
	<?php
		switch($_REQUEST['content']) {
		/*
		myC5
		*/
		case 'abwesenheit': include 'c5-abwesenheit.php';
			break;
		case 'edit-abwesenheit': include 'c5-edit-abwesenheit.php';
			break;
		/*
		Perso
		*/
		case 'einsatzplanung': include 'perso-einsatzplanung.php';
			break;
		case 'koordinatoren': include 'perso-koordinatoren.php';
			break;
		case 'bewerbung': include 'perso-bewerbung.php';
			break;
		case 'UserAnlegen': include 'UserAnlegen.php';
			break;
		case 'UserAnlegen' : include 'Datenbank.php'; 
			break; 
		
			
		/*
		Finanzen
		*/
		case 'fib': include 'finanz-fib.php';
			break;
		case 'kva': include 'finanz-kva.php';
			break;
		case 'rechnung': include 'finanz-rechnung.php';
			break;
		/*
		Werbeteam
		*/
		case 'fib-werbe': include 'werbe-fib.php';
			break;
		/*
		Werbeteam
		*/
		case 'fib-event': include 'event-fib.php';
			break;
		/*
		Finanzen, Werbeteam & Eventteam
		*/
		case 'auftrag': include 'auftrag.php';
			break;
		default: include 'home.php';
		}
	?>
</div>
<script language="javascript" type="text/javascript" src="jquery/jquery-1.11.0.min.js"></script>
<script language="javascript" type="text/javascript" src="jquery/jquery-ui-1.10.4.min.js"></script>
<script language="javascript" type="text/javascript" src="jquery/c5portal.js"></script>
<script language="javascript" type="text/javascript" src="jquery/c5abwesenheit.js"></script>
</body>
</html>
