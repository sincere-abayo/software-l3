<?php

//start/create cookie
setcookie("student","student
 one", time() + 60);
setcookie("user","user one"
, time() + (60*3));


if (isset($_COOKIE['student'])) 
{
   echo "cookie available " . $_COOKIE['student'];
}

else{
    echo "cookie not available or expired";
}


?>