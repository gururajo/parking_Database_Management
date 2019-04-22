<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>customer details</title>
    <link rel="stylesheet" href="styles.css">
    <script type="text/javascript" src="js/main.js">  </script>
    
  </head>
  <body>

<h1>parking management</h1>

          <?php
                session_start();
              echo "<h3 class='links' > Signed In as ".$_SESSION['userName'].'<a href="login.php?logout=1">Log Out</a></h3>';
          ?>
          <h3>customer  details</h3>
         <form  action="custdetails.php" name="searchForm" method="get">
           <input type="text" name="ph_no" value="" placeholder="mobile number" required>
                     <button type="submit">Search</button>
         </form>

         <?php

         require 'dbConnect.php';
         $conn=getConnection();
         $isgot=0;
           if(isset($_GET['ph_no']))
         {
           $phone_no=$_GET['ph_no'];
         $sql = "SELECT * FROM customer where contact_no='$phone_no'" ;
         $result = $conn->query($sql);

         if ($result->num_rows > 0) {
             // output data of each row
             $isgot=1;
             while($row = $result->fetch_assoc()) 
             {
                 echo 'customer I.D=' .$row["cust_id"].'<br>Vehicle No=' .$row["vehicle_no"].'<br> Contact no='. $phone_no .'<br> Registration Date'. $row["registration_date"].'<br>';
                 
             }
            
         } else {

             echo 'customer Not found';
         }
       }
             
if($isgot==1)
{
 echo '<a href="custdetails.php">search for another customer?</a><br><a href="main.php">Go to Home</a>';
}
else
{
  echo '<a href="main.php">Go to Home</a>';
}
?>

      

  </body>
</html>
