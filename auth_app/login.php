<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center>
        <form method="post">
            <h2>authontication / login form</h2>
            <div>
           email     <input type="email" placeholder="enter your email" name="email" required>
            </div>
            <br>
            <div>
             password   <input type="password" placeholder="enter your password" name="password" required>
            </div>
            <br>
            <div>
                <button type="submit" name="login">login</button>
            </div>
        </form>
        <?php
     if (isset($_POST['login'])) {
        include 'config.php';
        $email=$_POST['email'];
        $password=$_POST['password'];
        $hiddenPass=md5($password);
        $selectQuery="SELECT * FROM users where user_email='$email' AND 
        user_password='$hiddenPass'";
        $executeSelectQuery=mysqli_query($connect,$selectQuery);
        $record=mysqli_num_rows($executeSelectQuery);
        if ($record) {
            $_SESSION['user_email']=$email;
           echo "you are athenticated well";
           header("refresh:1;url=index.php");
        }
        else{
           echo "incorect email or password";

        }
     }
        ?>
    </center>
</body>

</html>