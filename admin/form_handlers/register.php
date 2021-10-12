<?php

$mysqli = new mysqli("localhost","root","","admin") or die (mysqli_error($mysqli));
$error=[]; 



if(isset($_POST['register'])){ 

    $firstname = ($_POST['firstname']);
    $lastname = ($_POST['lastname']);
    $email = ($_POST['email']);
    $pwd = $_POST['pwd'];
    $cpwd = $_POST['cpwd'];
    $sql = mysqli_query($mysqli, "SELECT * FROM users WHERE email = '$email'");
    $row = mysqli_fetch_array($sql);
    if(empty($firstname) && (empty($lastname) && (empty($email) && (empty($pwd) && (empty($cpwd)))))){
        array_push($error, "Fields cannot be empty");
    }elseif(empty($firstname)  && (empty($lastname))){
        array_push($error, "Name field cannot be empty");
     }
    elseif(strlen($firstname) <=4 || (strlen($lastname)<=4)){
    array_push($error, "Name field is too short ");
  
    }elseif (empty($email)){
        array_push($error, "email is empty");
        

    }elseif(mysqli_num_rows($sql) != 0){
        array_push($error, "email already exist");
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($error, "email is invalid");
    }
    elseif (empty($password) && (empty($cpwd))){
     
        array_push($error, "Password field cannot be empty");
    }else
        if (strlen($pwd) <=4 && (strlen($cpwd) <=4)){
           array_push($error, "password must be up to 6 characters");
         
       
    }elseif ($pwd !== $cpwd){
       array_push($error, "Password do not match");
       
    }
if(empty($error)){
   
    $username = $firstname." ".$lastname;
    $hashedpwd = md5($pwd);
    $chashedpwd = md5($cpwd);
    $rand = rand(1,3);
    switch ($rand){
        case '1';
        $profile_pic = "asset/images/profile_pics/default/head_1.png";
        break;
        case '2';
        $profile_pic = "asset/images/profile_pics/default/head_2.png";
        break;
        case '3';
        $profile_pic = "asset/images/profile_pics/default/head_3.png";
        break;
    } 
    $role ="Admin";
    $query = mysqli_query($mysqli, "INSERT INTO users VALUES('','$username','$firstname','$lastname','$email','$hashedpwd','$chashedpwd','$profile_pic','$role','0');");
    if($query){
   
  unset($_POST['register']);
     header("location: nw-admin.php");
}

} 

}
    ?>





     

</body>
 </html>
