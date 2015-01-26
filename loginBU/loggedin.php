<?php
$username = $_COOKIE['login'];

echo "<div id=\"loggedin\">" .
      "Hallo " . $username . " :)"
      . "</div>"
      . "<a id=\"loggedin\" href=\"login/logout.php\">Logout</a>";
?>
