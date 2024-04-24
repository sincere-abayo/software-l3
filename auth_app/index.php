<?php
session_start();

if (!isset($_SESSION['user_email'])) {
   header("location:login.php");
}
echo $_SESSION['user_email'];
?>