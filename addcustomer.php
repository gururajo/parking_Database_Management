<!DOCTYPE html>
<html>
<head>
<title>add customer</title>
<link rel="stylesheet" href="styles.css">
<script type="text/javascript" src="js/main.js"> </script>
</head>
<body>
<h1> ADD CUSTOMER</h1>
<?php
                session_start();
                
                if(isset($_SESSION['username']))
              echo "<h3 class='links' > Signed In as ".$_SESSION['username'].'<a href="login.php?logout=1">Log Out</a></h3>';
              else
              die ("not logged in, please log in!!!!<br> <a href=\"login.php\">login</a>");
          ?>
<form name="addcust" action="addcustomer.php" method="post">


        customer Name  <input type="text" name="Name" value="" required><br>
        Mobile Phone  <input type="text" name="mobile"  required ><br>
       vehicle  <input type="text" name="vehicle_no" value="" placeholder="example-ka291234" required><br>
      <!-- Is regular?<input type="text" name="isregular" value="" placeholder="yes/no" required><br>  -->
       <button type="submit" name="Submit">Add customer</button><br><br><br><br>
       <?php
       echo '<a href="main.php">Go To Home?</a>';
       ?>

       
</form>

<?php
require 'dbConnect.php';
  $conn = getConnection();
  if($conn->connect_error)
  {
  header("Location: signUp.php?status=&failed" );
  }
  if($_POST)
  {
  $Name=$_POST['Name'];
  $ph_no=$_POST['mobile'];
  $vehicle_no=$_POST['vehicle_no'];
 // $isregular=$_POST['isregular'];
  $isWritten=false;
  $errorcode=-1;


  //echo $fName."<br>".$mName."<br>".$lName."<br>".$email."<br>".$password."<br>".$confirmPasss;

if(!empty($Name)&&!empty($ph_no)&&!empty($vehicle_no))
{
  $stmt = $conn->prepare("INSERT INTO customer (name,contact_no,vehicle_no) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $Name, $ph_no, $vehicle_no);
  //echo $Name.$ph_no.$vehicle_no.$isregular;
  if($stmt->execute())
  {
       $isWritten=true;
       $errorcode=100;
  }else {
    $isWritten=false;
    $errorcode=100;

  }


}
else {
echo "No input";
}
  }
  


if($_POST)
{
   if($isWritten)
    {
        echo "<h2 >Customer Added</h2>";
       
    }else {
      echo "<h2 class='error'>Something went wrong please try later</h2>";
      echo '<a href="main.php">Take me to Home </a>';

    }
    if($errorcode<0)
    {
      echo "<h2 >Adding user.... Please Wait </h2>";
     
    }

      }    ?>

    






</body>
</html>
