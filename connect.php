<?php
session_start();
include("db_connect.php");

if (isset($_POST['email']) && isset($_POST['password'])) {
      // username and password sent from form 
     // echo $_POST['email']. $_POST['password'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $pwd  = md5($password);
        $email = stripcslashes($email);  
        $password = stripcslashes($password);  
        $email = mysqli_real_escape_string($con, $email);  
        $password = mysqli_real_escape_string($con, $password);
      
        $sql = "SELECT * from users where email = '$email' and password = '$pwd'"; 
        //var_dump($sql);
       // die(); 
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          // var_dump($row);
          // die();
        if($count > 0){  
           $_SESSION["id"] = $row['id'];
        $_SESSION["email"] = $row['email']; 
        $_SESSION["first_name"] = $row['first_name'];
        }  
        else{  
            header("Location:login.php?error=invalidAccount"); 
        }     
        if(isset($_SESSION["id"]) && isset($_SESSION["first_name"])) {
           header("Location:welcome.php");
        }


  }


?>