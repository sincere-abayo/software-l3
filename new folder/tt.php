<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <h1>application form</h1>
        <input type="text" name="names" placeholder="names">
        <input type="text" name="location" placeholder="enter your location">
        <input type="date" name="date">
        <input type="radio" name="gender" value="female">female
        <input type="radio" name="gender" value="male">male
        <button type="submit" name="apply">apply</button>

    </form>

    <?php
    if (isset($_POST['apply'])) {
     $names=$_POST['names'];
     $location =$_POST['location'];
     $date=$_POST['date'];

     $gender=$_POST['gender'];
     $now=date("Y-m-d");
     $age=date_diff(date_create($date),date_create($now));
     $age=$age->format("%y");
     if ($age<18) {
         echo "you are not eligible";
     }
     else
     {
        echo "you are eligible";
     }

    //  echo "your name is $names your gender is $gender located in $location born at $date";
    }

    ?>
</body>
</html>