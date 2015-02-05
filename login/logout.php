<?php
    unset($_SESSION['USER']);
    unset($_SESSION['PASSWORD']);
    header("Location: ../index.php");
?>
