<!DOCTYPE html>
<html>
    <head>
        <title>
           home page
        </title>
    </head>
    <body>
    <?php
                session_start();
              echo "<h3 class='links' > Signed In as ".$_SESSION['userName'].'<a href="login.php?logout=1">Log Out</a></h3>';
          ?>
          <h1>parking management system</h1>
        <table>
        <h3><tr><a href="addcustomer.php">add customer</a></tr><br>
        <tr><a href="custdetails.php">customer details</a></tr><br>
        <tr><a href="addlot.php">add parking lot</a></tr><br>
        <tr><a href="newcarparked.php">new car parked?</a></tr><br>
        <tr><a href="createreceipt.php">create receipt?</a></tr><br>
        </h3>
    </body>
</html>
