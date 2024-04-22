<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>casino game</title>
</head>
<body>
<form  method="post">
    <h2>guess number to win</h2>

    <input type="text" name="names" placeholder="enter names" required>
    <input type="number" name="money" placeholder="enter money to bet" required>
    <input type="number" name="number" placeholder="enter winning number" required>
    <button type="submit" name="submit">play</button>

</form>

<?php
if (isset($_POST['submit'])) {
    $names=$_POST['names'];
    $moneyToBet=$_POST['money'];
    $number=$_POST['number'];

    if ($moneyToBet<10) {
        echo "money to bet must be greayter 10";
    }
     else {
        if ($number >10 || $number <0) {
            echo "guesing number must be from 0-10";
        }
        else{
            $winningNumber=rand(0,9);
            if($number == $winningNumber)
            {
                echo "you win 30 your money is ". $moneyToBet*30;
            }
            else {
                echo "you lost, winning number was ". $winningNumber;
            }

        }
    }
    

}

?>
</body>
</html>