

<?php
require 'dbConnect.php';
  $conn = getConnection();
  if($conn->connect_error)
  {
  header("Location: signUp.php?status=&failed" );
  }
  session_start();
  if(isset($_SESSION['username']))
  echo "<h3 class='links' > Signed In as ".$_SESSION['username'].'<a href="login.php?logout=1">Log Out</a></h3>';
else
  die ("not logged in, please log in!!!!<br> <a href=\"login.php\">login</a>");


  if(!isset($_POST['car_type']))
  {
  if(isset($_GET['cust_id']))
$_SESSION['cust_id']=$_GET['cust_id'];
//echo $cust_id;
else
echo ("not set");

if(isset($_GET['start_time']))
{
    $_SESSION['start_time']=$_GET['start_time'];
//echo $start_time.'<br>';
} else
die ("not set");
  }

function getseconds($start_time)
{
$mon=((int)$start_time[5])*10+(int)$start_time[6];
$day=((int)$start_time[8])*10+(int)$start_time[9];
$hr=((int)$start_time[11])*10+(int)$start_time[12];
$min=((int)$start_time[14])*10+(int)$start_time[15];
$sec=((int)$start_time[17])*10+(int)$start_time[18];
$seconds=mktime($hr,$min.$sec,$mon,$day,2019);
return($seconds);
}
 
$startseconds=getseconds($_SESSION['start_time']);
$parkedtime=$startseconds- (time());
$parkedtime=(int)(($parkedtime/3600)/36000)+1;
//echo $parkedtime;

 // echo("hello  ".$_SESSION['username']);
  
  //echo $fName."<br>".$mName."<br>".$lName."<br>".$email."<br>".$password."<br>".$confirmPasss;

/*  $stmt = $conn->prepare("INSERT INTO users (first_name, middle_name, last_name, ph_no, email, password) VALUES (?, ?, ? , ? , ? , ?)");
  $stmt->bind_param("sssssi", $fName, $mName, $lName, $mobile, $email ,$password);
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
//echo "Am i joke to you";
}

*/
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles.css">
<style>

</style>
</head>
<body>
<form  action="bill.php" name="searchForm" method="POST">
           car type id  <input type="number" name="car_type" value="" placeholder="car type id" required>
           penalty<input type="number" name="penalty" value=""  required>
                     <button type="submit">submit</button>
         </form>


<?php
if(isset($_POST['car_type']))
{
    $car_type=$_POST['car_type'];
    $penalty=$_POST['penalty'];
    
    
         $isgot=0;
         $sql = "SELECT * FROM price_scheme where vehicle_type_id='$car_type'" ;
         $result = $conn->query($sql);

         if ($result->num_rows > 0)
          {
             // output data of each row
             $isgot=1;
             while($row = $result->fetch_assoc()) 
             {
                 $base_price=$row['base_price_perhour'];
                 $totalprice=$base_price+$penalty;
                 echo '<h3>TOTOAL PRICE=  '.$totalprice.'</h3>';
                echo '<a href="addreceipt.php?cust_id='.$_SESSION['cust_id'].'&baseprice='.$base_price.'&penalty='.$penalty.'">PAID?</a>';
             }
            }
            else {

                die("car type not found");
            }
            

           

         }  
       



?>


</body>
</html>


