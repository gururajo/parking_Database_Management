<?php
 session_start();
 $_SESSION['username']=$_GET['user'];
 $_SESSION['useremail']=$_GET['useremail'];

 header("Location: main.php")

 ?>
