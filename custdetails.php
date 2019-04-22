<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome to MyStore</title>
    <link rel="stylesheet" href="styles.css">
    <script type="text/javascript" src="js/main.js">  </script>
    
  </head>
  <body>



      <div class="card">
        <?php
                session_start();
              echo "<h3 class='links' > Signed In as ".$_SESSION['userName'].'<a href="login.php?logout=1">Log Out</a></h3>';
          ?>
         <form  class="searchForm" action="custdetails.php" name="searchForm" method="get">
           <input type="text" name="ph_no" value="" placeholder="mobile number" required>
                     <button type="submit">Search</button>
         </form>

         <?php

         require 'dbConnect.php';
         $conn=getConnection();
           if(isset($_GET['ph_no']))
         {
           $phone_no=$_GET['ph_no'];
         $sql = "SELECT * FROM customer where contact_no='$phone_no'" ;
         $result = $conn->query($sql);

         if ($result->num_rows > 0) {
             // output data of each row
             while($row = $result->fetch_assoc()) 
             {
                 echo 'customer I.D=' .$row["cust_id"].'<br>';
                 echo  'Vehicle No=' .$row["vehicle_no"].'<br>';
                 echo 'Registration Date'. $row["registration_date"].'<br>';
             }
            
         } else {

             echo 'customer Not found';
         }
       }
              ?>

<button type="submit" onclick="">



       </div>

  </body>
</html>
