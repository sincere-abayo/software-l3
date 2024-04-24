<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "auth_db";

//connecting to mysqli server
$connect = mysqli_connect($server, $user, $password, $database) or die("failed to connect");

// if ($connect) {
//     echo "connection succed";
// }
// else
// {
//     echo "connection failed";
// }
