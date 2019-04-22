<!DOCTYPE html>
<html>
    <head>
        <title>
            My Web Page!
        </title>
    </head>
    <body>
    <?php
                session_start();
              echo "<h3 class='links' > Signed In as ".$_SESSION['userName'].'<a href="login.php?logout=1">Log Out</a></h3>';
          ?>
        Hello, world!
    </body>
</html>
