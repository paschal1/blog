<?php
  include_once 'config/config.php';
  include_once 'class/comments.php';
  
  $comment_obj = new comment($connection);
  
  header("Content-Type: Application/json");
  
  if(isset($_GET['fetch_comment'])){
    $id = $_GET['post_id'];
    // $post_id = $_GET['post_id'];
    $sql = mysqli_query($connection, "SELECT * FROM comments WHERE post_id=$id AND status='approved' ORDER BY id DESC");
    $comment = [];
    while ($row = mysqli_fetch_array($sql)) {
        $name = $row['name'];
        $body = $row['body'];
        $website = empty($row['website'])?'#':$row['website'];
        
        $data = ([
            'name' => $name,
            'body' => $body,
            'web' => $website
          ]);
        //   correction
        $comment_cnt = array_push($comment, $data) ;
    }
    if(empty($comment)){
        echo json_encode([
            'status' => 404,
            'comments' => 'NO COMMENT FOUND FOR THIS POST'
          ]);
    }
    else{
      echo json_encode([
          'status' => 200,
          'comments' =>  $comment
        ]);
    }
  

  }

  if(isset($_GET['update_comment'])){
    $id = $_GET['post_id'];
    $post_category = $_GET['cat_r'];
  
    $name = $_GET['name'];
    $email = $_GET['email'];
    $body = $_GET['body'];
    $website = $_GET['website'];
 
    if($comment_obj->addComment($name, $email, $body, $website, $id)){
        //      $msg = "<div class='alert alert-success'>You comment was added </div>";
        //     // unset($_POST['comment-add']);
        echo json_encode([
          'status' => 201,
          'message' => 'Comment has been updated successfully'
        ]);
    }
    else{
      echo json_encode([
        'status' => 400,
        'message' => 'An error occurred while updating your comment'
      ]);
    }
  }                                          
?>