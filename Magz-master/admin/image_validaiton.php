<?php
$error = [];
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
     }
    elseif($size > 3000000){
       header("location: edit_profile.php?user_id=$id&message=file_is_large");
       array_push($error, "File is too large");
  } 
   else{
         move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target);
         mysqli_query($connection, "UPDATE users SET profile_pic = '$target' WHERE id=$id");
         header("location: profile.php?user_id=$id&message=profile_updated");
 }
   
  }