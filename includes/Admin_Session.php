<?php
    session_start();
    if(!isset($_SESSION['admin_id'])){
      echo '<script>alert("Please Login")</script>';
      header('location:login.php');
    }
 ?>