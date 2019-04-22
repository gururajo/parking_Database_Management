<?php
 session_start();
 $_SESSION['userName']=$_GET['user'];
 $_SESSION['userEmail']=$_GET['useremail'];

 header("Location: hello.php")

 ?>
