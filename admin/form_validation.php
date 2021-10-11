<?php
$error = []; 
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
    if(isset($_POST['update_data'])){
        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $u_email = $_POST['email'];
        $pwd = md5($_POST['pwd']);
        $user_name = $f_name. " ". $l_name;
        $sql = mysqli_query($connection, "UPDATE users SET username ='$user_name',firstname= '$f_name',lastname='$l_name', email = '$u_email', password= '$pwd' WHERE id = '$id'");
        $_SESSION['admin'] = $user_name;
        header("location: profile.php?user_id=$id");
     }else{
         echo "Not Saved";
     }
    if(isset($_POST['upload']) && isset($_FILES['profile_pic'])){
        $dir = "asset/images/profile_pics/default/";
        $target = $dir .basename($_FILES['profile_pic']['name']);
        $imageFileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));
        $filename = $_FILES['profile_pic']['name'];
        $fileExt = explode('.',$filename);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg','jpeg','png','gif');
        $type = $_FILES['profile_pic']['type'];
        $size = $_FILES['profile_pic']['size'];
        if(!in_array($fileActualExt, $allowed)) {
            header("Location: edit_profile.php?user_id=$id&File_is_not_an_image");
            array_push($error, "File is not an image");
            $error1 = "File is not an image";
            echo $error1;
         }
        elseif($size > 3000000){
           header("location: edit_profile.php?user_id=$id&message=file_is_large");
           array_push($error, "File is too large"); 
           $error2 = "File is too large";
           echo $error2;
      } 
       else{
             move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target);
             mysqli_query($connection, "UPDATE users SET profile_pic = '$target' WHERE id=$id");
             header("location: profile.php?user_id=$id&message=profile_updated");
     }
       
      }
}