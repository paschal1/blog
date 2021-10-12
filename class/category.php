<?php 

 class Category {
 	private $conn;
 	private $user_obj;

 	public function __construct($conn, $user) {
 		$this->conn = $conn;
 		$this->user_obj = new User($conn, $user);
 	}

 	public function addCategory($category) {
 		if (!empty($category)) {
 			$query = mysqli_query($this->conn, "INSERT INTO category VALUES('','$category');");
 			($query) ?  true :  false;
 		}else {
 			return false;
 		}
 	}

 	public function getAdminCategory() {
 		$query = mysqli_query($this->conn, "SELECT * FROM category ORDER BY cat_title ASC");
 		$str = "";
 		$role = $this->user_obj->getRole();

 		while ($row = mysqli_fetch_array($query)) {
 			$id = $row['id'];
 			$cat_title = $row['cat_title'];

 			if($role === 'Admin') {
 				$str .= "<tr>" .
 						"<td>{$id}</td>".
 						"<td>{$cat_title}</td>".
 						"<td><a href='edit_category.php?cat_id=$id' class='btn btn-info btn-sm '>Edit</a></td>".
 						"<td><a href='category.php?d_cat_id=$id' class='btn btn-danger btn-sm'>Delete</a></td>".
 						"</tr>";
 			}else {
 				$str .= "<tr>" .
 						"<td>{$id}</td>".
 						"<td>{$cat_title}</td>".
 						"</tr>";
 			}
 		}

 		echo $str; 
 	}

 	public function updateCategory($id, $category) {
 		$query = mysqli_query($this->conn, "UPDATE category SET cat_title='$category' WHERE id=$id");
 		if ($query) {
 			return true;
 		} else{
 			return false;
 		}
 	}

 	public function deleteCategory($id) {
 		$query = mysqli_query($this->conn, "DELETE FROM category WHERE id=$id");
 		if($query) {
 			return true;
 		} else {
 			return false;
 		}
 	}

 	public function getAllCategory() {
 		$query = mysqli_query($this->conn, "SELECT * FROM category ORDER BY cat_title ASC");
 		$str = "";
 		while ($row = mysqli_fetch_array($query)) {
 			$cat_title = $row['cat_title'];
 			$cat_id = $row['id'];
 			$str .= "<li><a class='' href='category.php?c_id=$cat_id'>$cat_title</a></li>";
 		}
 		echo $str;
 	}
 	public function getsideCategory() {
 		$query = mysqli_query($this->conn, "SELECT * FROM category ORDER BY cat_title ASC");
 		$str = "";
 		while ($row = mysqli_fetch_array($query)) {
 			$cat_title = $row['cat_title'];
 			$cat_id = $row['id'];
 			$str .= "<li ><a  href='category.php?c_id=$cat_id'>$cat_title</a></li>";
 		}
 		echo $str;
 	}

	


	 public function getPostBycat($id)
	 {
		 $query = mysqli_query($this->conn, "SELECT * FROM news WHERE post_cat_id = $id ORDER BY id DESC LIMIT 24");
		 $str = "";
	 if(mysqli_num_rows($query) === 0) {
		 $str = "<h3 class='text-center text-danger mt-5'>No post yet</h3>";
	 }	
	 else {
		 while ($row = mysqli_fetch_array($query)) {
			 $id = $row['id'];
			 $content = $row['content'];
			 if (strlen($content) > 200) {
				 $content = substr($content, 0, 100) . "...";
			 }
			 $category = $row['post_category'];
			 $id = $row['id'];
			 $title = $row['title'];
			 $post_cat_id = $row['post_cat_id'];
			 $added_by = $row['added_by'];
			 $date_added = $row['date_added'];
			 $image = $row['post_image'];
			 $num_likes = $row['num_likes'];
			 $num_comments = $row['num_comments'];

			 $str .= "<div class='col-sm-6 col-md-6 col-lg-4 mb-1'>
                      
	 		<div class='post mt-2  mx-auto  ' style = 'margin-bottom:5px;'>
	 			<div class='thumb '>
					  
	 				
	 					<div class='inner casual'>
						 <a href='singlepost.php?post_id=$id&cat_r=$category'><img src='admin/$image' alt='' class='img-responsive   img-fluid'; style='max-width:auto; max-height:auto;object-position: 5px 10%; 25%;object-fit:cover;'></a>
	 					</div>
	 				
	 			</div>
				   
				   
	 			<small> <a href='category.php?c_id=$post_cat_id' class='category-badge mt-3'>$category</a></small>
	 			<h6 class='post-title  mb-3 mt-3'>
	 				<a href='singlepost.php?post_id=$id&cat_r=$category' class='fw-bold text-dark'>$title</a>
	 			</h6>
	 			<h6 class='post-title  mt-2'>
	 				<a href='singlepost.php?post_id=$id&cat_r=$category' class='fw-normal fs-6 small text-dark'><small> $content </small></a>
					 <ul class='meta list-inline mt-2 text-dark mb-0'>
	 					
	 					<li class='list-inline-item text-secondary fw-normal small'> <a href='author_post.php?added_by=$added_by&id=$id' class='fw-bold text-dark'> $added_by</a>  &nbsp;&nbsp;$date_added  </li>
	 				</ul> 
	 			</h6>
	 			
	 		</div> 
	 	</div>";
		 }
	 }
		 echo $str;
	 }
	
	 
	}

 