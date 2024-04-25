<?php
session_start();

if (!isset($_SESSION['user_email'])) {
   header("location:login.php");
}
$user_email = $_SESSION['user_email'];

include 'config.php';

$selectQuery = "SELECT * from users where user_email='$user_email'";
$executeQuery = mysqli_query($connect, $selectQuery);
$data = mysqli_fetch_array($executeQuery);

$user_id = $data['user_id'];
// echo $user_id;

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
         <h2>
            create product

         </h2>
         <a href="logout.php">logout</a>
         <div>
            <label for="name"> product name</label><input type="text" name="product" placeholder="enter product name" required>
         </div>
         <br>
         <div>
            <label for="qty">product quantity</label><input type="number" name="qty" placeholder="enter product quatity">

         </div>
         <br>

         <div>
            <button type="submit" name="upload">add product</button>
         </div>

      </form>

      <?php
      if (isset($_POST['upload'])) {
         $product = $_POST['product'];
         $qty = $_POST['qty'];

         $insert = "INSERT INTO products values ('','$user_id','$product','$qty')";
         $executeinsert = mysqli_query($connect, $insert);
         if ($executeinsert) {
            echo "product created well";
         } else {
            echo "failed to create product";
         }
      }

      ?>
      <br>
      <div>
         <h3>
            my product
         </h3>

         <?php
         $checkproduct = "SELECT * FROM products where user_id='$user_id'";
         $executeProductQuery = mysqli_query($connect, $checkproduct);
         $record = mysqli_num_rows($executeProductQuery);
         if ($record) {
            echo "
         <table>

         <tr>
         <td>no</td>
         <td>product name</td>
         <td>product quantity</td>
         </tr>
         ";
            $i = 1;
            while ($row = mysqli_fetch_array($executeProductQuery)) {
               $prod = $row['pro_name'];
               $qty = $row['pro_qty'];
               echo "<tr>
            <th>$i</th>
            <th>$prod</th>
            <th>$qty</th>

            </tr>";

               $i++;
            }
         } else {

            echo "no product updated yet";
         }

         ?>
      </div>
   </center>
</body>

</html>