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
              echo "<h3 class='links' > Signed In as ".$_SESSION['userName'].'<a href="endsession.php">Log Out</a></h3>';
          ?>
        Hello, world!
    </body>
</html>
