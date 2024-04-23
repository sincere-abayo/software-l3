<?php

if (!isset($_GET['id'])) {
   header(("location:read.php"));
}
$id= $_GET['id'];

include 'config.php';

$deleteQuery="DELETE from students where id='$id'";

$executeDeteleQuery=mysqli_query($connect,$deleteQuery);

if ($executeDeteleQuery) {
   echo "record deleted weel";
   header("refresh:1;url=read.php");
}
else{
    echo "record not deleted weel";
    header("refresh:1;url=read.php");
}
?>