<?php
session_start();

echo "<div id=\"loggedin\">" .
      "Hallo " . $_SESSION['USER'] . " :)"
      . "</div>"
      . "<a id=\"loggedin\" href=\"login/logout.php\">Logout</a>";
?>
