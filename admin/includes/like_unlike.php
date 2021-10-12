<?php
include 'config/config.php';
if(isset($_POST['liked']) && (isset($_GET['post_id']) && $_GET['post_id'] !== "")){
    $post_id = $_GET['post_id'];
    $result = mysqli_query($connection,"SELECT * from news WHERE id = $post_id");
    $row = mysqli_fetch_array($result);
    $n = $row['num_likes'];
    mysqli_query($connection, "INSERT INTO likes VALUES('',$post_id)");
    mysqli_query($connection, "UPDATE news set num_likes=n+1 where id=$post_id");
    echo $n+1;
    exit();
}
if(isset($_POST['unliked']) && (isset($_GET['post_id']) && $_GET['post_id'] !== "")){
// "INSERT INTO likes VALUES('','$user','$id','like');"
$post_id = $_GET['post_id'];
$result = mysqli_query($connection,"SELECT * from news WHERE id = $post_id");
$row = mysqli_fetch_array($result);
$n = $row['num_likes'];
mysqli_query($connection, "DELETE FROM likes WHERE post_id=$post_id AND");
mysqli_query($connection, "UPDATE news set num_likes= n-1 where id = $post_id");
echo $n+1;
exit();
}