<?php
include('welcome.php');

require('db_connect.php');
$id=$_SESSION['id'];
$query = "SELECT * from users where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
    <div class = "container">
        <div class = "col-md-6 col-md-offset-3">
            <div class = "panel panel-primary">
                <div class = "panel-heading">
                    Pofile Details
                </div>
                <div class = "panel-body">
                    <img src="uploads/<?php echo $row['photo']; ?>" class="img-responsive center" height="100px" width="100px" style="float:right;"><br>
                    First Name: <b><?php echo $row['first_name']; ?></b><br>
                    Last Name: <b><?php echo $row['last_name']; ?></b><br>
                    Email: <b><?php echo $row['email']; ?></b><br>
                    Date of Birth: <b><?php echo $row['DOB']; ?></b><br>
                    Gender: <b><?php echo $row['gender']; ?></b><br>
                    Skills: <b><?php echo $row['skills']; ?></b><br>
                    Address: <b><?php echo $row['address']; ?></b><br>
                    City: <b><?php echo $row['city']; ?></b><br>
                    State: <b><?php echo $row['state']; ?></b><br>
                    Country: <b><?php echo $row['country']; ?></b><br>
                    Zip Code: <b><?php echo $row['zipcode']; ?></b><br>
                </div>
            </div>
        </div>
    </div>
