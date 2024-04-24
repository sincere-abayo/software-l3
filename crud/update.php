<?php
if (!isset($_GET['id'])) {
    header("location:read.ph");
}

$id = $_GET['id'];

include 'config.php';
$selectQuery = "SELECT * from students where id ='$id'";
$selectData = mysqli_query($connect, $selectQuery);

$data = mysqli_fetch_array($selectData);

$name = $data['names'];
$gender = $data['gender'];
$contact = $data['contact'];
$province = $data['province'];
$district = $data['district'];
$dob = $data["dob"];

if (isset($_POST['update'])) {
    $nm = $_POST['name'];
    $cont = $_POST['contact'];
    $gend = $_POST['gender'];

    // echo "name is $nm and contact is $cont";

    $updateQuery = "UPDATE students set names='$nm',contact='$cont',gender='$gend' where id='$id'";
    $executeUpdateQuery = mysqli_query($connect, $updateQuery);
    if ($executeUpdateQuery) {
        echo "data updated well";
        header("refresh:1;url=read.php");
    } else {
        echo "failed to update data";
    }
}

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
            <h2>update operation</h2>
            <div>
                names <input type="text" name="name" value="<?php echo $name;  ?>">
            </div>
            <br>
            <div>
                contact <input type="number" name="contact" value="<?php echo $contact ?>">
            </div>
            <div>
                <?php
                if ($gender == "male") {

                ?>
                    <label for="male">male</label><input type="radio" value="male" name="gender" checked>
                    <label for="female">female</label><input type="radio" value="female" name="gender">

                <?php

                } else {
                ?>
                    <label for="female">female</label><input type="radio" value="female" name="gender" checked>
                    <label for="male">male</label><input type="radio" value="male" name="gender">



                <?php

                }

                ?>
            </div>
            <div>
                <label for="dob">Dob</label><input type="text" value="<?php echo $dob ?>" readonly>

            </div>
            <div>
                <select name="province">
                    <option checked><?php echo $province ?></option>
                    <option value="kigali">Kigali city</option>
                    <option value="northern">Northern Province</option>
                    <option value="southern">Southern Province</option>
                    <option value="eastern">Eastern Province</option>
                    <option value="western">Western Province</option>

                </select>
            </div>
            <div>
                <button type="submit" name="update">update</button>
            </div>
        </form>
    </center>
</body>

</html>