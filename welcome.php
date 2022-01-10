<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap1.min.css">
  <style>
    .primary{
        color:blue;
        font-style: italic;
        font-weight: bold;
        text-align: center;
    }
  </style>
</head>
<body>

<?php
if($_SESSION["email"]) {
?>
Welcome <?php echo $_SESSION["email"].' '.$_SESSION["first_name"]; ?> 
	<a href="">Home</a>|
	<a href="viewProfile.php">View Profile</a>|
	<a href="editAccount.php">Edit Account Details</a>|
	<a href="logout.php" tite="Logout">Logout</a>
<?php
}else header("Location:login.php");;
?>
<script src="js/jquery.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/register.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
</body>
</html>