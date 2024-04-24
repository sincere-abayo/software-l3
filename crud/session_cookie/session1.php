<?php
session_start();
if(!isset($_SESSION['student']))
 {
    echo "session not found";
 }

 else{
    echo "session found";
 }

?>