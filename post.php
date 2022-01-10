<?php

require("db_connect.php");

//storing form data in variables
if(isset($_POST['submit'])) {
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
// encrypting the password
$password_h=md5($password);
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
//print_r($_FILES['photo']);
$img_name = $_FILES['photo']['name'];
$img_size = $_FILES['photo']['size'];
$tmp_name = $_FILES['photo']['tmp_name'];
$error = $_FILES['photo']['error'];

if ($error === 0) {
    if ($img_size > 125000) {
        $em = "Image size is too large!";
        header("Location:index.php?error=$em");
    }else{
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        $allowed_ex = array("jpg", "jpeg", "png");

        if (in_array($img_ex_lc, $allowed_ex)) {
            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
            $img_upload_path = 'js/'.$new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);
            
        }else{
            $em = "Please upload a file of jpg, jpeg, or png";
            header("Location: login.php?error=$em");
        }
    }
}else{
    $em = "unkown error occurred!";
    header("Location: login.php?error=$em");
}
 
       //inserting datas into d-base
       $sql = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`, `DOB`, `gender`, `skills`, `address`, `city`, `state`, `country`, `zipcode`, `photo`) VALUES ('$fname','$lname','$email','$password_h','$DOB','$gender','$skills','$address','$city','$state','$country','$zipcode','$photo') ";

if(mysqli_query($con, $sql)){
    header("Location:index.php?success=AccountCreated");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 
// Close connection
mysqli_close($con);
    }
?>