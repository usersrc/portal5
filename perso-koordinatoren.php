
<!-- <html> 
<head> 
<meta charset="utf-8" >

<link rel="stylesheet" type= "text/css" href="UserAnlegen.css"/>
<link rel="stylesheet" type= "text/css" href="C:\Program Files\XAMPP\htdocs\portal5\css\c5portal.css"/>
<link type="text/css" rel="stylesheet" href="C:\Program Files\XAMPP\htdocs\portal5\css\css_reset.min.css"/>

</head>
</head>

<body> -->

<div id="koordinatoren_header"> 
	<ul class="nav-header">
		<li class ="nav_neuenUserAnlegen"><a href="?content=koordinatoren&new=UserAnlegen"> User Anlegen </a> </li> 
		<li class="nav_userÜbersicht"> Test </li>
		<li class="nav_userÜbersicht"> Test </li>
	</ul>



</div>

<div class="KoordinatorenContent">
<?php 

$new = $_GET["new"]; 

switch($_REQUEST['new']) {
		
		/*
		Perso
		*/
		case 'UserAnlegen': include 'UserAnlegen.php';
			break; 
		case 'Datenbank': include 'Datenbank.php';
			break; 
		 default: include 'home.php';

	}
		
?>
</div>