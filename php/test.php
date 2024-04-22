<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>form</h2>
    <form method="post">
        <input type="text" name="name" placeholder="enter your name">
        <button type="submit" name="submit">submit </button>
    </form>

    <?php   

     if (isset($_POST['submit'])) {
        $name= $_POST['name'];
        echo "your name is ".$name;
     }
    ?>
</body>
</html>