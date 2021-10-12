<?php
//  include 'helpers.php';
 class managepost{

    private $conn;
    private $user;


    public function __construct($conn){
        $this->conn = $conn;
        // $this->user_obj = new User($conn, $user);
    }

    public function managepost(){

        $user = $_SESSION['admin'];
            $query = mysqli_query($this->conn, "SELECT * FROM news WHERE added_by = '$user'");
            $row = mysqli_fetch_array($query);
            $username = $row['added_by'];
             $admin = mysqli_query($this->conn, "SELECT * FROM users");
             $res = mysqli_fetch_array($admin);
             $username = $res['username'];
             $role = $res['role'];
             if($user === $username && $role === 'Admin'){
                $query = "SELECT * FROM news";
             }
            else{
                 $query = "SELECT * FROM news WHERE added_by='$username'";
            }
            $result = mysqli_query($this->conn, "SELECT * FROM news LIMIT 15");
           while ($row = mysqli_fetch_assoc($result)){
               $id = $row['id'];
               $title = $row['title'];
               $content = substr($row['content'],0, 50);
               $added_by = $row['added_by'];
               $category = $row['post_category'];
               $post_id = $row['post_cat_id'];
               $image = $row['post_image'];
               $date_added = $row['date_added'];
               $tags = $row['tags'];
               $status = $row['status'];
               $type = $row['type'];
               $num_likes = $row['num_likes'];
               $num_comments = $row['num_comments'];
               $num_views = $row['num_views'];
               $timestamped = $row['timestamped'];
               echo "<tr>";
               echo "<td>{$id}</td>"; 
               echo "<td>{$title}</td>"; 
               echo "<td>{$content}</td>"; 
               echo "<td>{$added_by}</td>"; 
               echo "<td>{$category}</td>"; 
               echo "<td>{$post_id}</td>"; 
               echo "<td><img src='{$image}' width='50px'></td>"; 
               echo "<td>{$date_added}</td>"; 
               echo "<td>{$tags}</td>"; 
               echo "<td>{$status}</td>"; 
               echo "<td>{$type}</td>"; 
               echo "<td>{$num_likes}</td>"; 
               echo "<td>{$num_comments}</td>"; 
               echo "<td>{$num_views}</td>"; 
               echo "<td>{$timestamped}</td>"; 
               echo "<td><a href='edit_news.php?edit_post=$id' class = 'btn btn-primary bg-primary btn-sm'>Edit</td>"; 
               echo "<td><a href='managepost.php?delete_post=$id' class = 'btn btn-primary bg-danger btn-sm'>Delete</td>"; 
               echo "<tr>";
           }
       
    }

    // public function deletepost($id) {
    //     $query = mysqli_query($this->conn, "DELETE FROM news WHERE id=$id");
    //     if($query) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
}

 