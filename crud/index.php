<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert data</title>
    <style>
       
        .container{
            display: flex;
            flex-direction: row;
            justify-content: center;
          
        }
        .main
        {
            display: block;
            justify-content: center;
             width: 400px;
            height: auto;
            background-color: darkcyan;
            gap: 20px;
            box-shadow: 4px 4px 5px black;
        }
        .form{
            padding-bottom: 30px;
            padding-left: 80px;
        }
        .form button{
            width: 60px;
            height: 30px;
            background-color: greenyellow;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container">
    <form method="post" >
        <div class="main">

       
<div class="form">
    <h2>Insert operation</h2>
<label for="names">enter names</label> <input type="text" name="names" placeholder="enter names" required>
</div>   
<div class="form">
    <label for="male">male</label><input type="radio" name="gender" value="male" >
    <label for="female">female</label><input type="radio" name="gender" value="female" >
</div>
<div class="form">
<select name="province" required>
    <option selected disabled>enter province</option>
    <option value="kigali">KIGALI City</option>
    <option value="northern">Northern Province</option>
    <option value="southern">Southern Province</option>
    <option value="western"> Western Province</option>
    <option value="eastern">Eastern Province</option>   
</select>
</div>
<div class="form">
    <select name="district" >
    <option selected disabled>select district</option>

    <option>gasabo</option>
    <option>kicukiro</option>
    <option>nyanza</option>
    <option>Gicumbi</option>
    <option>Nyamagabe</option>
    <option>Rusizi</option>
    </select>
   
</div>

<div class="form">
<input type="number" name="number" placeholder="enter your number" required>
</div>
<div class="form">
    <input type="date" name="dob" required>
</div>
<div class="form">
    <button type="submit" name="submit">insert</button>
</div>
</div>
 </form>
 <?php
if (isset($_POST['submit'])) {
 $name=$_POST['names'];
 $gender=$_POST['gender'];
 $province=$_POST['province'];
 $district=$_POST['district'];
 $contact=$_POST['number'];
 $dob=$_POST['dob'];

 include 'config.php';

//  mysqli_query($connect,"query");
//  $connect->query("query");

//preparing sql query to insert data into database
$insertQuery="INSERT into students values('','$name','$gender','$province',
'$district','$contact','$dob',now())";

//exucuting qury on selected database
// $executeQuery=mysqli_query($connect,$insertQuery);

$executeQuery=$connect->query($insertQuery);

if ($executeQuery) {

    echo "insert operation succed";
    header("refresh:1;url=read.php");
}

else{
    echo "insert operation failed";
}


}

 ?>
    </div>
</body>
</html>