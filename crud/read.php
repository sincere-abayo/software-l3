<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>read data</title>
    <style>
        table{
            width: 100%;
            text-align: center;
        }
        
    </style>
</head>
<body>

    <h1>Displaying data from database</h1>
    <?php

    include 'config.php';

    $selectQuery="SELECT * FROM students";
    
    $executeSelectQuery=mysqli_query($connect,$selectQuery);

  //checking the affected rows selected in query
    $record=mysqli_num_rows($executeSelectQuery);
    
 if ($record <1) {
   echo "no record found on the table";
 }

 else{

    echo "
    <table><tr>
    <th>id</th>
    <th>name</th>
    <th>gender</th>
    <th>contact</th>
    <th>province</th>
    <th>district</th>
    <th>dob</th>
    <th>created_at</th>
    <th colspan='2'>action</th>

    </tr>
    ";
    // echo "some record found in table : $record";

    //displaying data from table
 //fetching  data from table using  associative array
    // mysqli_fetch_assoc();
    // $data=mysqli_fetch_assoc($executeSelectQuery);
    // print_r($data);
   
    //fetching  data from table using both numeric and associative array
   $n=1;
   while ( $data=mysqli_fetch_array($executeSelectQuery))

   {
//  print_r($data);
    $id= $data['id'];
    $name=$data['names'];
    $province=$data['province'];
    $district=$data['district'];
    $contact=$data['contact'];
    $gender=$data['gender'];
    $dob=$data['dob'];
    $created_at=$data['created_at'];

    echo "<tr>
    <td>$n</td>
    <td>$name</td>
    <td>$gender</td>
    <td>$contact</td>
    <td>$province</td>
    <td>$district</td>
    <td>$dob</td>
    <td>$created_at</td>
    <td><a href='update.php?id=$id'>edit</a>
    ||
    <a href='delete.php?id=$id'>delete</a></td>
    </tr>";
$n++;

   }
   

 echo "</table>";

   

 }



?>
</body>
</html>