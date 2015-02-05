<!DOCTYPE html>
<html>
<head lang="de">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>portal5</title>
    <link href="css/stylesheet.css" type="text/css" rel="stylesheet">
</head>
<body>
<section>
    <header>
        <div class="login">
          <?php
          session_start();
          if (!isset($_SESSION['FIRSTLOGIN']) AND !isset($_SESSION['LOGIN'])) {
            include ("login/login.php");
          }

          if (isset($_SESSION['FIRSTLOGIN'])) {
            echo "first login";
          }

          if (isset($_SESSION['LOGIN'])) {
            include ("login/loggedin.php");
          }
          ?>
        </div>
    </header>
    <article>
          <?php
          if (!isset($_SESSION['FIRSTLOGIN']) AND !isset($_SESSION['LOGIN'])) {
            echo "<img id=\"p5logo\" src=\"images/portal5Logo.png\"/>";
          }

          if (isset($_SESSION['FIRSTLOGIN'])) {
            include ("login/loginvalidation.php");
          }

          if (isset($_SESSION['LOGIN'])) {
            include ("administration.php");
          }
          ?>
    </article>
    <footer>

    </footer>
</section>
</body>
</html>
