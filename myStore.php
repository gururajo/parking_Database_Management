<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome to MyStore</title>
    <link rel="stylesheet" href="styles.css">
    <script type="text/javascript" src="js/main.js">  </script>
    <link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no" >


  </head>
  <body>



      <div class="card">
        <?php
                session_start();
              echo "<h3 class='links' > Signed In as ".$_SESSION['userName'].'<a href="login.php?logout=1">Log Out</a></h3>';
          ?>
         <form  class="searchForm" action="myStore.php" name="searchForm" method="get">
           <input type="text" name="keyword" value="" placeholder="Search My Store" required>
                     <button type="submit">Search</button>
         </form>

         <?php

         require 'dbConnect.php';
         $conn=getConnection();
           if(isset($_GET['keyword']))
         {
           $keyword=$_GET['keyword'];
         $sql = "SELECT * FROM product where p_name like '%$keyword%' or p_category like '%$keyword%' or other_det like '%$keyword%'" ;
         $result = $conn->query($sql);

         if ($result->num_rows > 0) {
             // output data of each row
             echo '<div class="flexDiv">';
             while($row = $result->fetch_assoc()) {
                echo '<div class="flexItem">';
                echo '<img src="images/product.png"></p>';
                 echo '<p1>'. $row["p_name"].'</p1>';
                 echo '<p> in ' . $row["p_category"].'</p>';
                 echo '<p id="price"> Rs.'. $row["p_price"].'</p>';
                echo "</div>";

             }
             echo "</div>";
         } else {

             header("Location: login.php?status=&failed");
         }
       }
              ?>





       </div>

  </body>
</html>
