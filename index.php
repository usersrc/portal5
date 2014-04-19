<html>
<head>
	<meta charset="utf-8" />
	<link type="text/css" rel="stylesheet" href="c5portal.css"/>
	<link type="text/css" rel="stylesheet" href="css_reset.min.css"/>
</head>
<body>
<div id="header">
Portal5 (interne Administration)
</div>
<div id="navigation">
	<ul class="nav_section" id="nav_myc5">
		<li class="nav_header nav_header_myC5">myC5</li>
		<a href="?content=abwesenheit"><li class="nav_link nav_active">Abwesenheitübersicht</li></a>
		<a href="?content=edit-abwesenheit"><li class="nav_link nav_active">Meine Abwesenheiten</li></a>
	</ul>

	<ul class="nav_section" id="nav_perso">
		<li class="nav_header">Perso</li>
		<a href="?content=einsatzplanung"><li class="nav_link nav_active">Einsatzplanung</li></a>		
		<a href="?content=koordinatoren"><li class="nav_link nav_active">Koordinatoren</li></a>
		<a href="?content=bewerbung"><li class="nav_link nav_active">Bewerbung</li></a>
	</ul>

	<ul class="nav_section" id="nav_finanzen">			
		<li class="nav_header">Finanzen</li>			
		<li class="nav_link nav_active">A</li>			
		<li class="nav_link nav_active">B</li>
	</ul>

	<ul class="nav_section" id="nav_event">			
		<li class="nav_header">Event</li>
		<li class="nav_link nav_active">A</li>			
		<li class="nav_link nav_active">B</li>
	</ul>

	<ul class="nav_section" id="nav_werbeteam">			
		<li class="nav_header">Werbeteam</li>
		<li class="nav_link nav_active">A</li>			
		<li class="nav_link nav_active">B</li>

	</ul>

	<ul class="nav_section" id="nav_support">			
		<li class="nav_header">Support</li>			
		<li class="nav_link nav_active">A</li>			
		<li class="nav_link nav_active">B</li>
		<li class="nav_link nav_active">C</li>
	</ul>
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
</body>
</html>