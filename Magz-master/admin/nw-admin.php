<?php
include '../config/config.php';
$query = mysqli_query($connection, "select * FROM users");
if(mysqli_num_rows($query)===0){ //if the number of row retured by the query(i.e if there is no record in the database)
    include 'register.php';
    }else{
    include 'login.php';
    }
?>   