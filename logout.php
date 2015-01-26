<?php
    setcookie ("login", "", time() - 3600, ’/’);
    setcookie("team", "", time() - 3600, ’/’);
    header("Location: index.php");
exit;
?>
