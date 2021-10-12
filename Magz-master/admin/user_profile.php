<?php
if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    $query = mysqli_query($connection, "SELECT * FROM  users WHERE id = $user_id");
    while($row = mysqli_fetch_assoc($query)){
        $id = $row['id'];
        $username = $row['username'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
        $role = $row['role'];
        $num_post =$row['num_post'];

    }