

<?php
if(isset($_SESSION['userName']))
{
  if(isset($_GET['logout']))
  {
    session_destroy();
  }else {
  header("Location: hello.php");
  }

  }
 ?>
 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <title>Login</title>
      <link rel="stylesheet" href="styles.css">
      
   </head>
    <body>
      <script type="text/javascript" src="js/main.js"> </script>
      <div >
<h1>PARKING MANAGEMENT</h1>

<h3>Login</h3>


      <form name="signupform" action="auth.php" onsubmit="return validateLogin()" method="post">
       E-Mail  <input type="email" name="email" value="" placeholder="example@gmail.com" required> <br>
       Password  <input type="password" name="password" placeholder="password" > <br>


  <?php
  if(isset($_GET['status']))
  {
    echo "<h3 class='links' > ERROR";
    echo '<p2 id="error" class="error"> Invalid Email or Password  <br></p2><br>';
  }else {
    echo '<p2 id="error" class="error">   <br></p2><br>';
  }
  ?>

  <button type="submit" name="Submit">Log In</button><br>
         <p class="links"> <a  href="signUp.php">New User ? Click Here To Register</a>  </p> <br> 

      </form>

</div>
   </body>


 </html>
