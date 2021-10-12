<?php 
include 'config/config.php';
$user = (isset($_SESSION['admin'])) ? $_SESSION['admin'] : "user";
 include 'class/user.php'; 
 include 'class/category.php';
 include 'class/comments.php';
 include 'class/post.php';
 include 'admin/includes/like.php';
$cat_obj = new Category($connection, $user);
$post_obj = new Post($connection, $user);
$comment_obj = new comment($connection);

$error = [];

if(isset($_GET['post_id']) && isset($_GET['cat_r'])){
     $id = $_GET['post_id'];
     $post_category = $_GET['cat_r'];
   

  if(isset($_POST['add-comment'])){
   $name = $_POST['name'];
     $email = $_POST['email'];
     $body = $_POST['body'];
    $website = $_POST['website'];
      $date = $_POST['date'];
      if(empty($name)){
          array_push($error, "Name is required");
          $error .= "<p class='text-danger'>Name is required</p>";
      }elseif(empty($email)){
        array_push($error, "email is required");
        $error .= "<p class='text-danger'>email is required</p>";
      }elseif(empty($body)){
        array_push($error, "comment is required");
        $error .= "<p class='text-danger'>comment is required</p>";
      }
  } if($comment_obj->addComment($name, $email, $body, $website, $id)){
  $msg = "<div class='alert alert-success'>You comment was added </div>";
  unset($_POST['comment-add']);
  }else{
          return false;
     }
 }
}
 ?> 