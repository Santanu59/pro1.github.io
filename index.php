<?php
$insert =false;
if(isset($_POST['name'])){
   
$server = "localhost";
$username = "root";
$password ="";

$con = mysqli_connect($server, $username ,$password);
if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());
}
// echo "Suceess connecting to the db";
$name  = $_POST['name'];
$age  = $_POST['age'];
$email  = $_POST['email'];
$phone  = $_POST['phone'];
$desc  = $_POST['desc'];
$sql = " INSERT INTO `registration`.`reg` ( `name`, `age`, `email`, `phone`, `other`, `date`) VALUES ( '$name', '$age', '$email', '$phone', '$desc', current_timestamp());";
echo $sql;

if($con->query($sql) == true){
    // echo "Sucessfully inserted";
    $insert=true;
}
else{
    echo "ERROR: $sql <br> $con->error";
    
}
 
$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pro1</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
 <div class="bg">
    <div class="cont">
        <h1>Registration Form</h1>
        <p>Register here....</p>
        <?php
       if($insert == true){
        echo "<p class='b'>Thanks for registration</p>";
    }
        ?>
        <form action="" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="number" name="age" id="age" placeholder="Enter your age">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="number" name="phone" id="phone" placeholder="Enter your phone number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
           <input type="submit" placeholder="Submit" value="submit" class="a">
            
        </form>
    </div>
</div>
</body>
</html>