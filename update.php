<?php

include("db_connect.php");
//$con =mysqli_connect('localhost','root','project360','task');

//storing form data in variables
if(isset($_POST['submit'])) {
$id = $_POST['id']; 
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
// encrypting the password
//$password_h=md5($password);
$DOB = $_POST['DOB'];
$gender = $_POST['gender'];
//$skills= $_POST['skills'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$zipcode = $_POST['zipcode'];
$photo = $_FILES['photo']['name'];

$skills="";
foreach($_POST['skills'] as $checkbox)
{
$skills=$skills.$checkbox.',';
}
 $fileName = $_FILES['photo']['name'];
    $tempName = $_FILES['photo']['tmp_name'];
    
    if(isset($fileName))
    {
        if(!empty($fileName))
        {
            $location = "img/";
            if(move_uploaded_file($tempName, $location.$fileName))
            {
                echo 'File Uploaded';
            }
        }
    }
$sql = "SELECT `password` FROM `users` WHERE id = 50";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
if ($row['password']== $password) {
    $password_h=$password;
}else{
    $password_h=md5($password);
}
 //updating datas into d-base
    $update ="UPDATE `users` SET `first_name`='$fname',`last_name`='$lname',`email`='$email',`password`='$password_h',`DOB`='$DOB',`gender`='$gender',`skills`='$skills',`address`='$address',`city`='$city',`state`='$state',`country`='$country',`zipcode`='$zipcode',`photo`='$photo' WHERE id= $id";
//var_dump($oldPwd);

if(mysqli_query($con, $update)){
    header("Location:editAccount.php?success=Updated");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 
// Close connection
mysqli_close($con);
    }
?>

