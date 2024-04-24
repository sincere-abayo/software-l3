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
            <h2>registration form</h2>
            <div>
                <input type="text" name="names" placeholder="enter your names" required>
            </div>
            <br>
            <div>
                <input type="email" name="email" placeholder="enter your email" required>
            </div>
            <br>

            <div>
               <select name="department" required>
                <option selected disabled>select department</option>
                <option value="secretary">secretary</option>
                <option value="accountant">accountant</option>
                <option value="teacher">teacher</option>
                <option value="DOS">DOS</option>
                <option value="director">director</option>                
               </select>
            </div>
            <br>

            <div>
                <input type="password" name="password" placeholder="enter your password" required> 
            </div>
            <div>
                <input type="password" name="password2" placeholder="confirm your password" required> 
            </div>
            <br>

            <div>
                <button type="submit" name="register">register</button>
            </div>
        </form>
        <?php
        
       if (isset($_POST['register'])) {
        include 'config.php';
        $names=$_POST['names'];
        $email=$_POST['email'];
        $department=$_POST['department'];
        $pass1=$_POST['password'];
        $pass2=$_POST['password2'];
        if ($pass1 == $pass2)
        {
             $hiddenPass=md5($pass1);
         $checkemailquery="SELECT user_email from users where user_email='$email'";
         $executecheckemailquery=mysqli_query($connect,$checkemailquery);
        $record=mysqli_num_rows($executecheckemailquery);
        if ($record >0) {
           echo "email allready taken, try anther email";
        }
         else {
            $insert="INSERT into users values('','$names','$email','$hiddenPass','$department',now())";
            $executeInsert=mysqli_query($connect,$insert);
            if ($executeInsert) {
                $_SESSION['user_email']=$email;
                echo "registred well";
                header("refresh:1;url=index.php");
            }
            else{
                echo "registred failed";

            }
        }
        

        }
        else {
            echo "password not matching!!!";
        }
       }
        ?>
    </center>
</body>
</html>