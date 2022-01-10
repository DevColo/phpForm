<?php

  // making database connection
$con =mysqli_connect('localhost','root','project360','task');
if (!$con) {
         echo "Error: ". mysqli_error($con);
       }

?>