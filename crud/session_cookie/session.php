<?php

//start or creat session
session_start();

$_SESSION['student']="student one";

echo $_SESSION['student'];

?>

<a href="destroy.php">destroy session</a>