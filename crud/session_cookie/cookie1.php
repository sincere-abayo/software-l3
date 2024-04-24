<?php

if (isset($_COOKIE['user'])) {
    echo "hello ". $_COOKIE['user'];
}

else{
    echo "cookie not available";
}
?>