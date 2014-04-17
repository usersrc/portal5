<html>
<head>
	<link type="text/css" rel="stylesheet" href="c5portal.css"/>
	<link type="text/css" rel="stylesheet" href="css_reset.min.css"/>
</head>
<body>
	<div id="navigation">
	<?
		include "p5.php";
	?>
	</div>
	<div id="content">
        <?php
            switch($_REQUEST['content']) {
            case 'home': include 'home.php';
				break;
			case 'home': include 'home.php';
				break;
			default: include 'home.php';
			}
        ?>
    </div>
</body>
</html>