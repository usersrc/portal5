<?php
$username = $_COOKIE['login'];

echo "<div id=\"loggedin\">" .
      "Hallo " . $username . " :)"
      . "</div>"
      . "<a id=\"loggedin\" href=\"logout.php\">Logout</a>";
?>
