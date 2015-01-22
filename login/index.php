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
          if (!isset($_COOKIE['login'])) {
            include ("login.php");
          } else {
            include ("loggedin.php");
          }
          ?>
        </div>
    </header>
    <article>

          <?php
          if (!isset($_COOKIE['login'])) {
            echo "<img id=\"p5logo\" src=\"pic/portal5Logo.png\"/>";
          } else {
            if (isset($_COOKIE['firstlogin'])) {
              include ("loginvalidation.php");
            } else {
              switch (isset($_COOKIE['team'])) {

                case ("sup"):
                include ("sup.html");
                break;

                case ("wer"):
                include ("sup.php");
                break;

                default:
                echo "Willkommen";
                break;
              }
            }
          }
          ?>


    </article>
    <footer>

    </footer>
</section>
</body>
</html>
