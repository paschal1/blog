<?php  
	class Post
	{
		private $conn;
		private $user_obj;

		public function __construct($conn, $user)
		{
			$this->conn = $conn;
			$this->user_obj = new User($conn, $user);
			// $this->user = new User($conn, $user);
		}

		public function addNews($title, $content, $category, $status, $type, $tags, $image)
		{
			if(!empty($title) && !empty($content)) 
			{
				$time = time();
				$date = (date("F d, Y h:i A",  $time));
				$title = ucfirst($title);
				$title = mysqli_real_escape_string($this->conn, $title);
				$content = nl2br($content);
				$content = mysqli_real_escape_string($this->conn, $content);
				$added_by = $this->user_obj->getUserName();
				$sql = mysqli_query($this->conn, "SELECT id FROM category WHERE cat_title='$category'");
				$row = mysqli_fetch_array($sql);
				$cat_id = $row['id'];
				$user_id = $this->user_obj->getID();
				// $date = date("Y-m-d H:i:s");
				$query = mysqli_query($this->conn, "INSERT INTO news VALUES('','$title','$content','$added_by','$user_id','$category','$cat_id','$image','$date','$tags','$status','$type','0','0','0',NOW());");
			}
		}

	 	 public function getbreakingnews(){
	 	 	$query = mysqli_query($this-> conn, "SELECT * FROM news WHERE type = 'breaking news' ORDER BY id DESC LIMIT 6");
	 	 	$str = "";
	 	 	while ($row = mysqli_fetch_array($query)) {
				  $post_cat_id = $row['post_cat_id'];
	 	 		$id = $row['id'];
	 	 		$title = $row['title'];
				  $cnt_title = substr($title,0,100)."...";
	 	 		$content = $row['content'];
	 	 		if(strlen($content) > 50) {
	 	 		$content = substr($content, 0, 100) . "...";
	 	 		}
	 	 		$cat_title = $row['post_category'];
				  $category = $row['post_category'];
	 	 		$cat_id = $row['post_cat_id'];
				  $image = $row['post_image'];
				  $added_by = $row['added_by'];
				  $date_added = $row['date_added'];
	 	 		$num_likes = $row['num_likes'];
			   $num_comments = $row['num_comments'];
			  $date_time_now = date("Y-m-d H:i:s");
				   $startCount = new DateTime($date_added);
			   $endCount = new DateTime($date_time_now);
			   $interval = $startCount->diff($endCount);
			   if($interval->h < 10 && $interval->d < 1  ) {
					$rand = rand(5,5);
	 			$str .= "<div class='item '>
				 <article class='featured' style='height:400px;'>
					 <div class='overlay'></div>
						<div class='inner'>
						<a href=''>
						<div class='figure'>
						<img src='admin/$image' style=' height:100%;object-position:  10%;object-fit:cover;'>
						</div>
						</a>
						</div>
					 <div class='details'>
						 <div class='category'><a href='category.php?c_id=$post_cat_id'>$category</a></div>
						 <h1><a href='singlepost.php?post_id=$id&cat_r=$category'>$title</a></h1>
						 <h6 class='text-white small'><a href='' class='text-white'>$added_by</a></h6>
						 <h6 class='text-white small'><small class='text-white' style='font-family:arial;'>$date_added</small></h6>
					 </div>
				 </article>
			 </div>
				 ";	
	 	  }
	 	}
 echo $str;
		  }
	

		  public function getfeaturednews()
		  {		
			  $query = mysqli_query($this->conn, "SELECT * FROM news WHERE type !='advert' ORDER BY rand() LIMIT 8");
			  $str = "";
			  while ($row = mysqli_fetch_array($query)) {
				  $post_cat_id = $row['post_cat_id'];
				  $image = $row['post_image'];
				  $content = substr($row['content'],0,72)."...";
				//   $time = time();
				//   $date = (date("F d, Y h:i A",  $time));
				  $date_added = $row['date_added'];
				  $cat_title = $row['post_category'];
				  $title = $row['title'];
				  $cnt_title = substr($title,0,70)."";
				  $category = $row['post_category'];
				  $id = $row['id'];
				  $added_by = $row['added_by'];
				  $title = $row['title'];
				  $post_category = $row['post_category'];
				  $str .= "<article class='article-mini'>
				  <div class='inner'>
					  <figure>
						  <a href=''>
							  <img src='admin/$image'>
						  </a>
					  </figure>
					  <div class='padding'>
						  <h1><a href=''>$cnt_title</a></h1>
						  <ul class='meta list-inline'>
						
						  <li class='list-inline-item small text-muted text-capitalize'><small>$date_added</small></a></li>
					   </ul>
					  </div>
				  </div>
			  </article>
				 
			  ";
			  }
			  echo $str;
		  }
		  public function getsidetopnews()
		  {		
			  $query = mysqli_query($this->conn, "SELECT * FROM news WHERE type !='advert' ORDER BY rand() LIMIT 4");
			  $str = "";
			  while ($row = mysqli_fetch_array($query)) {
				  $post_cat_id = $row['post_cat_id'];
				  $image = $row['post_image'];
				  $content = substr($row['content'],0,72)."...";
				//   $time = time();
				//   $date = (date("F d, Y h:i A",  $time));
				  $date_added = $row['date_added'];
				  $cat_title = $row['post_category'];
				  $title = $row['title'];
				  $cnt_title = substr($title,0,60)."";
				  $category = $row['post_category'];
				  $id = $row['id'];
				  $added_by = $row['added_by'];
				  $title = $row['title'];
				  $post_category = $row['post_category'];
				  $str .= "<article class='article-mini ' style='margin-bottom:20px;'>
				  <div class='inner'>
					  <figure>
						  <a href='singlepost.php?post_id=$id&cat_r=$category'>
							  <img src='admin/$image' >
						  </a>
					  </figure>
					  <div class='padding'>
						  <h1><a href='singlepost.php?post_id=$id&cat_r=$category'>$cnt_title</a></h1>
						  <div class='detail'>
							  <div class='category'><a href='category.php?c_id=$post_cat_id small'><small>$category</small></a></div>
							  <div class='time small'><small class='small text-secondary'>$date_added</small></div>
						  </div>
					  </div>
				  </div>
			  </article>
				 
			  ";
			  }
			  echo $str;
		  }
		  public function getfeatured()
		  {
			  $query = mysqli_query($this->conn, "SELECT * FROM news WHERE timestamped>curdate() ORDER BY id DESC LIMIT 6");
			  $str = "";
			  while ($row = mysqli_fetch_array($query)) {
				  $post_cat_id = $row['post_cat_id'];
				  $time = time();
				  $date = (date("F d, Y h:i A",  $time));
				  $image = $row['post_image'];
				  $content = substr($row['content'],0,70)."...";
				  $date = $row['date_added'];
				  $cat_title = $row['post_category'];
				  	$category = $row['post_category'];
				  $id = $row['id'];
				  $post_category = $row['post_category'];
				  $str .= " <div class='post  mt-4 mb-5 mx-auto'>
				  <div class='thumb '>
					   
					  <a href='singlepost.php?post_id=$id&cat_r=$category'>
						  <div class='inner casual'>
							  <img src='admin/$image' alt='' class='img-responsive mx-auto  img-fluid'; style='max-width:auto; max-height:auto;object-position: 5px 10%; object-fit:cover;'>
						  </div>
					  </a>
				  </div>
					
					
				  <small> <a href='category.php?c_id=$post_cat_id' class='category-badge rounded-0 bg-dark mt-3'>$category</a></small>
				  <h6 class='post-title mb-2 mt-3 fs-6 fw-100'>
					  <a href='singlepost.php?post_id=$id&cat_r=$post_category' class='text-dark'>$content</a>
				  </h6>
				 
			  </div> 
		  </div>";
			  }
			  echo $str;
		  }
		 
	   public function getcasualnews(){
		
	 	$query = mysqli_query($this->conn, "SELECT * FROM news WHERE type='Casual news' ORDER by id DESC LIMIT 5");
	 	$str = "";
	 	while ($row = mysqli_fetch_array($query)) {
			 $post_cat_id = $row['post_cat_id'];
	 		$id = $row['id'];
	 		$content = $row['content'];
	 		if (strlen($content) > 50) {
	 		$content = substr($content, 0, 100) . "...";
	 		}
			 $time = time();
			 $date = (date("F d, Y h:i A"));
	 		$date = $row['date_added'];
			 $title = $row['title'];
			 $cnt_title = substr($title,0,70)."...";
	 		$added_by = $row['added_by'];
	 		$category = $row['post_category'];
	 		$image = $row['post_image'];
	 		$num_likes = $row['num_likes'];
	 		$num_comments = $row['num_comments'];
	 		$post_category = $row['post_category'];

	 		$str .= "
			 <article class='article col-md-12'>
			 <div class='inner'>
				 <figure>
					 <a href='singlepost.php?post_id=$id&cat_r=$category'>
						 <img src='admin/$image' >
					 </a>
				 </figure>
				 <div class='padding'>
					 <div class='detail'>
						 <div class='time'>$date</div>
						 <div class='category'><a href='category.php?c_id=$post_cat_id'>$category</a></div>
					 </div>
					 <h2><a href='singlepost.php?post_id=$id&cat_r=$category'>$cnt_title</a></h2>
					 <p>$content</p>
					 <footer>
						 <a href='#' class='love text-dark small'>$added_by</a>
						 <a class='btn btn-primary more' href='singlepost.php?post_id=$id&cat_r=$category'>
							 <div>More</div>
							 <div><i class='ion-ios-arrow-thin-right'></i></div>
						 </a>
					 </footer>
				 </div>
			 </div>
		 </article>";
	 	}
	 	echo $str;
	 }
	   public function getrecentbreakingnews(){
		$rand = rand(1,5);
	 	$query = mysqli_query($this->conn, "SELECT * FROM news WHERE timestamped>DATE_SUB(curdate(),INTERVAL 1 day
		 ) AND type ='breaking news' ORDER BY $rand DESC  LIMIT 5");
	 	$str = "";
	 	while ($row = mysqli_fetch_array($query)) {
			 $post_cat_id = $row['post_cat_id'];
	 		$id = $row['id'];
	 		$content = $row['content'];
	 		if (strlen($content) > 50) {
	 		$content = substr($content, 0, 100) . "...";
	 		}
			 $time = time();
			 $date = (date("F d, Y h:i A"));
	 		$date = $row['date_added'];
			 $title = $row['title'];
			 $cnt_title = substr($title,0,70)."...";
	 		$added_by = $row['added_by'];
	 		$category = $row['post_category'];
	 		$image = $row['post_image'];
	 		$num_likes = $row['num_likes'];
	 		$num_comments = $row['num_comments'];
	 		$post_category = $row['post_category'];

	 		$str .= "
			 <article class='article col-md-12'>
			 <div class='inner'>
				 <figure>
					 <a href='singlepost.php?post_id=$id&cat_r=$category'>
						 <img src='admin/$image' >
					 </a>
				 </figure>
				 <div class='padding'>
					 <div class='detail'>
						 <div class='time'>$date</div>
						 <div class='category'><a href='category.php?c_id=$post_cat_id'>$category</a></div>
					 </div>
					 <h2><a href='singlepost.php?post_id=$id&cat_r=$category'>$cnt_title</a></h2>
					 <p>$content</p>
					 <footer>
						 <a href='#' class='love text-dark small'>$added_by</a>
						 <a class='btn btn-primary more' href='singlepost.php?post_id=$id&cat_r=$category'>
							 <div>More</div>
							 <div><i class='ion-ios-arrow-thin-right'></i></div>
						 </a>
					 </footer>
				 </div>
			 </div>
		 </article>";
	 	}
	 	echo $str;
	 }


	 public function getPostBySearch($keyword)
	 {
		
		$per_page = 1;
		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}else{
			$page = " ";
		}
		if($page ==" " || $page ==1){
			$page_1 = 0;
		}else{
			$page_1 = ($page * $per_page) - $per_page;
		}
		$post_query_count = "SELECT * FROM news";
		$find_count = mysqli_query($this->conn, $post_query_count);
		$count = mysqli_num_rows($find_count);
		$count = ceil($count / 5);
		if(isset($_GET['s']) && $_GET['s'] !== ""){
			$s = ($_GET['s']);
			echo   "<h6 >Search Result for &nbsp; <i class='text-danger'>'$s'</i> </h6>";
			//  $post_obj->getpostbysearch($_GET['s']);
			
	

}else{
			 header("location: index.php");

}
$query = mysqli_query($this->conn, "SELECT * FROM news WHERE content LIKE '%$s%' ORDER BY id DESC LIMIT $page_1, $per_page");
$str = "";
if(mysqli_num_rows($query) === 0) {
$str = "<h1 class='text-center text-danger mt-5'>No results found!</h1>";
}	
else {
while ($row = mysqli_fetch_array($query)) {
$post_cat_id = $row['post_cat_id'];
$id = $row['id'];
$content = $row['content'];
if (strlen($content) > 200) {
 $content = substr($content, 0, 100) . "...";
}
//  $time = time();
//  $date = (date("F d, Y h:i A"));
$category = $row['post_category'];
$added_by = $row['added_by'];
$date = $row['date_added'];
$image = $row['post_image'];
$num_likes = $row['num_likes'];
$num_comments = $row['num_comments'];
$str .= "<div class='col-sm-6 col-md-6 col-lg-4 mb-1'>
	  
<div class='post mt-2 mx-auto ' style = 'margin-bottom:2px;'>
 <div class='thumb '>
	  
	 <a href='singlepost.php?post_id=$id&cat_r=$category'>
		 <div class='inner casual'>
			 <img src='admin/$image' alt='' class='img-responsive   img-fluid'; style='max-width:auto; max-height:auto;object-position: 5px 10%'>
		 </div>
	 </a>
 </div>
   
   
 <small> <a href='category.php?c_id=$post_cat_id' class='category-badge mt-3'>$category</a></small>
 <h6 class='post-title mb-2 mt-3'>
	 <a href='singlepost.php?post_id=$id&cat_r=$category'class='text-danger'>$content</a>
	 <ul class='meta list-inline mb-0 mt-1'>
		 <li class='list-inline-item'>
		 <a href='author_post.php?added_by=$added_by&id=$id' class='text-dark fw-bold small'> <span>$added_by</span></a>
		 </li>
		
		  <li class='list-inline-item fw-normal  small'>$date &nbsp; <a href='' style='color:#9faabb;'><i class='fas fa-thumbs-up fw-normal small text-dark'><span class='num_likes'>&nbsp;$num_likes</span></i></a> &nbsp; <a href='' style='color:#9faabb;'><i class='fas fa-comment small text-dark fw-normal'><span> &nbsp;$num_comments</span></i></a></li>
	 </ul>
 </h6>
 
</div> 
</div>";

}


for($i = 1; $i <= $count; $i++){
	if($i == $page){
		  echo "<li class ='active'><a href='search.php?s= $s &&page={$i}'>{$i}</a></li>";
	}else{
		  echo "<li><a href='search.php?s= $s &&page={$i}'>{$i}</a></li>";
	}
}

}

echo $str;

	 }
	
		public function getmostreadnews() 
		{
			$query = mysqli_query($this->conn, "SELECT * FROM news WHERE  timestamped>DATE_SUB(curdate(),INTERVAL 1 DAY ORDER BY id DESC LIMIT 8");
			$str = "";
			while ($row = mysqli_fetch_array($query)) {
				$content = substr($row['content'], 0, 30). "...";
		$image = $row['post_image'];
		$title = $row['title'];
		$id = $row['id'];
		$title = $row['title'];
		$cnt_title = substr($title,0,70)."...";
		// $time = time();
		// $date = (date("F d, Y h:i A"));
		$content =($row['content']);
		if (strlen($content) > 200) {
			$content = substr($content, 0, 100) . "...";
		}
		$date = $row['date_added'];
		$added_by = $row['added_by'];
		$date = $row['date_added'];
		$category = $row['post_category'];
		$post_cat_id = $row['post_cat_id'];

				$str .= "<article class='col-md-12 article-list'>
				<div class='inner'>
					<figure>
						<a href='singlepost.php?post_id=$id&cat_r=$category'>
							<img src='admin/$image' alt='Sample Article'>
						</a>
					</figure>
					<div class='details'>
						<div class='detail'>
							<div class='category'>
								<a href='#'>$category</a>
							</div>
							<div class='time'>$date</div>
						</div>
						<h1><a href='singlepost.php?post_id=$id&cat_r=$category'>$cnt_title</a></h1>
						<p>
						$content
						</p>
						<ul class='meta list-inline'>
						<li class='list-inline-item'>
						<small class='text-dark bold'><a href='' class='text-dark'>$added_by</a></small>
						</li>
						</ul>
					</div>
				</div>
			</article>";
			}
			echo $str;
		}
	public function getNewsbytags($tags)
	 {
		 $query = mysqli_query($this->conn, "SELECT * FROM news WHERE tags LIKE '%$tags%' ORDER BY id DESC LIMIT 24");
		 $str = "";
	 if(mysqli_num_rows($query) === 0) {
		 $str = "<h1 class='text-center text-danger mt-5'>No results found!</h1>";
	 }	
	 else {
		 while ($row = mysqli_fetch_array($query)) {
			 $post_cat_id = $row['post_cat_id'];
			 $id = $row['id'];
			 $content = $row['content'];
			 if (strlen($content) > 200) {
				 $content = substr($content, 0, 100) . "...";
			 }
			 $time = time();
			//  $date = (date("F d, Y h:i A"));
			 $category = $row['post_category'];
			 $added_by = $row['added_by'];
			 $date = $row['date_added'];
			 $image = $row['post_image'];
			 $num_likes = $row['num_likes'];
			 $num_comments = $row['num_comments'];

			 $str .= "<div class='col-sm-6 col-md-6 col-lg-4 mb-1'>
                      
	 		<div class='post mt-2 mx-auto ' style = 'margin-bottom:2px;'>
	 			<div class='thumb '>
					  
	 				<a href='singlepost.php?post_id=$id&cat_r=$category'>
	 					<div class='inner casual'>
	 						<img src='admin/$image' alt='' class='img-responsive   img-fluid'; style='max-width:auto; max-height:auto;object-position: 5px 10%'>
	 					</div>
	 				</a>
	 			</div>
				   
				   
	 			<small> <a href='category.php?c_id=$post_cat_id' class='category-badge mt-3'>$category</a></small>
	 			<h6 class='post-title mb-2 mt-3'>
	 				<a href='singlepost.php?post_id=$id&cat_r=$category'>$content</a>
	 			</h6>
	 			<ul class='meta list-inline mb-0'>
	 					<li class='list-inline-item'>
						 <a href='author_post.php?added_by=$added_by&id=$id' class='fw-bold text-dark small'><span>$added_by</span></a>
	 					</li>
						
	 					<!---- <li class='list-inline-item'>$date &nbsp; <a href='' style='color:#9faabb;'><i class='fas fa-thumbs-up '><span> &nbsp;$num_likes</span></i></a> &nbsp; <a href='' style='color:#9faabb;'><i class='fas fa-comment'><span> &nbsp;$num_comments</span></i></a></li>--->
	 				</ul>
	 		</div> 
	 	</div>";
		 }
	 }
		 echo $str;
}
	public function getpopulartags($tags)
	 {
		 $query = mysqli_query($this->conn, "SELECT * FROM news WHERE tags LIKE '%$tags%' ORDER BY id DESC LIMIT 24");
		 $str = "";
	 if(mysqli_num_rows($query) === 0) {
		 $str = "<h1 class='text-center text-danger mt-5'>No results found!</h1>";
	 }	
	 else {
		 while ($row = mysqli_fetch_array($query)) {
			 $post_cat_id = $row['post_cat_id'];
			 $id = $row['id'];
			 $content = $row['content'];
			 if (strlen($content) > 200) {
				 $content = substr($content, 0, 100) . "...";
			 }
			//  $time = time();
			//  $date = (date("F d, Y h:i A"));
			 $category = $row['post_category'];
			 $added_by = $row['added_by'];
			 $date = $row['date_added'];
			 $image = $row['post_image'];
			 $num_likes = $row['num_likes'];
			 $num_comments = $row['num_comments'];

			 $str .= "<div class='col-sm-6 col-md-6 col-lg-4 mb-1'>
                      
	 		<div class='post mt-2 mx-auto ' style = 'margin-bottom:2px;'>
	 			<div class='thumb '>
					  
	 				<a href='singlepost.php?post_id=$id&cat_r=$category'>
	 					<div class='inner casual'>
	 						<img src='admin/$image' alt='' class='img-responsive   img-fluid'; style='max-width:auto; max-height:auto;object-position: 5px 10%'>
	 					</div>
	 				</a>
	 			</div>
				   
				   
	 			<small> <a href='category.php?c_id=$post_cat_id' class='category-badge mt-3'>$category</a></small>
	 			<h6 class='post-title mb-2 mt-3'>
	 				<a href='singlepost.php?post_id=$id&cat_r=$category'>$content</a>
	 			</h6>
	 			<ul class='meta list-inline mb-0'>
	 					<li class='list-inline-item'>
						 <a href='author_post.php?added_by=$added_by&id=$id'><i></i>:<span>$added_by</span></a>
	 					</li>
						
	 					<!---- <li class='list-inline-item'>$date &nbsp; <a href='' style='color:#9faabb;'><i class='fas fa-thumbs-up '><span> &nbsp;$num_likes</span></i></a> &nbsp; <a href='' style='color:#9faabb;'><i class='fas fa-comment'><span> &nbsp;$num_comments</span></i></a></li>--->
	 				</ul>
	 		</div> 
	 	</div>";
		 }
	 }
		 echo $str;
}
public function getentertainmentnews(){
	$query = mysqli_query($this->conn, "SELECT * FROM news WHERE post_category = 'entertainment' ORDER BY id DESC LIMIT 10");
	$str = "";
	while($row = mysqli_fetch_array($query)){
		$content = substr($row['content'], 0, 100). "...";
				$image = $row['post_image'];
				$title = $row['title'];
				$cnt_title = substr($title,0,45)."...";
				$id = $row['id'];
				$time = time();
				// $date = (date("F d, Y h:i A"));
				$added_by = $row['added_by'];
				$date = $row['date_added'];
				$category = $row['post_category'];
				$post_cat_id = $row['post_cat_id'];
		$str .= "<article class='article'>
		<div class='inner'>
			<figure>
				<a href='singlepost.php?post_id=$id&cat_r=$category'>
					<img src='admin/$image' >
				</a>
			</figure>
			<div class='padding'>
				<div class='detail'>
						<div class='time' style='font-size:8px;'>$date</div>
						<div class='category'><a href='category.php?c_id=$post_cat_id' class='small' >$category</a></div>
				</div>
				<h2><a href='singlepost.php?post_id=$id&cat_r=$category'>$cnt_title</a></h2>
				<p>$content</p>
			</div>
		</div>
	</article>";
			}
			echo $str;
}
public function getlatestentertainmentnews(){
	$query = mysqli_query($this->conn, "SELECT * FROM news WHERE post_category = 'celebrity gossip' ORDER BY RAND() DESC LIMIT 8");
	$str = "";
	while($row = mysqli_fetch_array($query)){
		$content = substr($row['content'], 0, 30). "...";
		$image = $row['post_image'];
		$title = $row['title'];
		$id = $row['id'];
		$time = time();
		// $date = (date("F d, Y h:i A"));
		$added_by = $row['added_by'];
		$date = $row['date_added'];
		$category = $row['post_category'];
		$post_cat_id = $row['post_cat_id'];
		$str .= " <div class='post post-over-content  col-sm-3 mb-3 col-6 col-md-3'>
		<div class='details clearfix mt-5'>
			
			<h6 class='post-title mt-5'>
				<a href='#' class='   small fs-6' style='top:-30px;'><small>$title   </small></a>
			</h6>
			<ul class='meta list-inline mb-0'>
				<li class='list-inline-item'>
					<a href='author_post.php?added_by=$added_by&id=$id' class='  small text-white'>$added_by</a>
				</li>
				
			</ul>
		</div>
		<a href='singlepost.php?post_id=$id&cat_r=$category'>
			<div class='thumb'>
				<div class='inner'>
					<img src='admin/$image' alt='' class='img-responsive img-fluid' style='width:600px; height:200px;object-position: 5px 10%;object-fit:cover;'>
				</div>
			</div>
		</a>
	</div>";
			}
			echo $str;
}
public function getmostpopular() 
		{
			$query = mysqli_query($this->conn, "SELECT * FROM news WHERE timestamped>DATE_SUB(curdate(),INTERVAL 1 HOUR) ORDER BY num_views DESC LIMIT 4");
			$str = "";
			while ($row = mysqli_fetch_array($query)) {
				$post_cat_id = $row['post_cat_id'];
				$id = $row['id'];
				$content = $row['content'];
				$date = $row['date_added'];
				$title = $row['title'];
				if (strlen($content) > 200) {
					$content = substr($content, 0, 100) . "...";
				}
				// $time = time();
				// $date = (date("F d, Y h:i A"));
				$category = $row['post_category'];
				$image = $row['post_image'];
				$num_likes = $row['num_likes'];
				$post_cat_id = $row['post_cat_id'];
				$num_comments = $row['num_comments'];

				$str .= "<div class='col-md-12  col-sm-12'>
				<!-- post  -->
				<div class='post post-list clearfix'>
					<div class='thumb '>
					   
						<a href='singlepost.php?post_id=$id&cat_r=$category' >
							<div class='inner'>
								<img src='admin/$image' alt='' class='img-responsive img-fluid' style='width:600px; height:220px;object-position: 5px 10%;object-fit:cover;'>
							</div>
						</a>
					</div>
					<div class='details'>
						<ul class='meta list-inline mb-3'>
							<li class='list-inline-item'>
							<a href='category.php?c_id=$post_cat_id' class='category-badge   rounded-0 text-white'>$category</a>
							</li>
						
						</ul>
						<h6 class='post-tile text-danger'>
							<a href='singlepost.php?post_id=$id&cat_r=$category' class='text-danger fw-bold'>
								$title
							</a>
						</h6>
						<p class='excerpt mb-0'>
						<a href='singlepost.php?post_id=$id&cat_r=$category'>
						$content
						<li class='list-inline-item text-secondary small'>$date</li> 
						</a>

						</p>
						
					</div>
				</div>
			</div>";
			}
			echo $str;
		}
		public function getcelebritygossip(){
			$query = mysqli_query($this->conn, "SELECT * FROM news WHERE post_category = 'celebrity gossip' ORDER BY id DESC LIMIT 10");
			$str = "";
			while($row = mysqli_fetch_array($query)){
				$content = substr($row['content'], 0, 100). "...";
				$image = $row['post_image'];
				$title = $row['title'];
				$cnt_title = substr($title,0,45)."...";
				$id = $row['id'];
				$time = time();
				// $date = (date("F d, Y h:i A"));
				$added_by = $row['added_by'];
				$date = $row['date_added'];
				$category = $row['post_category'];
				$post_cat_id = $row['post_cat_id'];
				$str .= "
				<article class='article'>
				<div class='inner'>
					<figure>
						<a href='singlepost.php?post_id=$id&cat_r=$category'>
							<img src='admin/$image' >
						</a>
					</figure>
					<div class='padding'>
						<div class='detail'>
								<div class='time' style='font-size:8px;'>$date</div>
								<div class='category'><a href='category.php?c_id=$post_cat_id' class='small' style='font-size:7px;'>$category</a></div>
						</div>
						<h2><a href='singlepost.php?post_id=$id&cat_r=$category'>$cnt_title</a></h2>
						<p>$content</p>
					</div>
				</div>
			</article>";
					}
					echo $str;
				}
		public function getviralnews(){
			$query = mysqli_query($this->conn, "SELECT * FROM news WHERE post_category = 'viral news' ORDER BY id DESC LIMIT 6");
			$str = "";
			while($row = mysqli_fetch_array($query)){
				$content = substr($row['content'], 0, 30). "...";
				$image = $row['post_image'];
				$title = $row['title'];
				$id = $row['id'];
				$time = time();
				// $date = (date("F d, Y h:i A"));
				$added_by = $row['added_by'];
				$date = $row['date_added'];
				$category = $row['post_category'];
				$post_cat_id = $row['post_cat_id'];
				$str .= "
			
				<div class='post post-over-content col-md-6'>
					<div class='details clearfix'>
						<a href='category.php?c_id=$post_cat_id' class='category-badge'>$category</a>
						<h6 class='post-title'>
							<a href='#' class='fw-bold'>$title</a>
						</h6>
						<ul class='meta list-inline mb-0'>
							<li class='list-inline-item'>
								<a href='author_post.php?added_by=$added_by&id=$id' class='fw-bold text-white small'>$added_by</a>
							</li>
							<li class='list-inline-item text-white small'><small> $date</small></li>
						</ul>
					</div>
					<a href='singlepost.php?post_id=$id&cat_r=$category'>
						<div class='thumb'>
							<div class='inner'>
								<img src='admin/$image' alt='' class='img-responsive img-fluid' style='width:600px; height:220px;object-position: 5px 10%;object-fit:cover;'>
							</div>
						</div>
					</a>
				</div>
				";
					}
					echo $str;
				}
		public function getsportsnews(){
			$query = mysqli_query($this->conn, "SELECT * FROM news WHERE post_category = 'sports' or post_category = 'entertainment' or post_category='celebrity gossip' or post_category = 'sport' or post_category = 'viral news'  ORDER BY timestamped DESC limit 10 ");
			$str = "";
			while($row = mysqli_fetch_array($query)){
				$content = substr($row['content'], 0, 100). "...";
				$image = $row['post_image'];
				$title = $row['title'];
				$cnt_title = substr($title,0,45)."...";
				$id = $row['id'];
				$time = time();
				// $date = (date("F d, Y h:i A"));
				$added_by = $row['added_by'];
				$date = $row['date_added'];
				$category = $row['post_category'];
				$post_cat_id = $row['post_cat_id'];
				$str .= "
			
				
				<article class='article'>
				<div class='inner'>
					<figure>
						<a href='singlepost.php?post_id=$id&cat_r=$category'>
							<img src='admin/$image' >
						</a>
					</figure>
					<div class='padding'>
						<div class='detail'>
								<div class='time small' style='font-size:7px;'>$date</div>
								<div class='category'><a href='category.php?c_id=$post_cat_id'>$category</a></div>
						</div>
						<h2><a href='singlepost.php?post_id=$id&cat_r=$category'>$cnt_title</a></h2>
						<p>$content</p>
					</div>
				</div>
			</article>
				";
					}
					echo $str;
				}

			public function getlatestNews() {
		
			$query = mysqli_query($this->conn, "SELECT * FROM news WHERE timestamped >= DATE_SUB(now(), INTERVAL 1 DAY) AND type != 'advert' ORDER BY timestamped DESC LIMIT 7");
			$str = "";
			while ($row = mysqli_fetch_array($query)) {
				$content = substr($row['content'], 0, 30). "...";
		$image = $row['post_image'];
		$title = $row['title'];
		$id = $row['id'];
		$title = $row['title'];
		$cnt_title = substr($title,0,70)."...";
		// $time = time();
		// $date = (date("F d, Y h:i A"));
		$content =($row['content']);
		if (strlen($content) > 200) {
			$content = substr($content, 0, 100) . "...";
		}
		$date = $row['date_added'];
		$added_by = $row['added_by'];
		$date = $row['date_added'];
		$category = $row['post_category'];
		$post_cat_id = $row['post_cat_id'];

				$str .= "<article class='col-md-12 article-list box-shadow bg-white padding-0 mx-auto' style='margin-bottom:65px;'>
				<div class='inner'>
					<figure>
						<a href='singlepost.php?post_id=$id&cat_r=$category'>
							<img src='admin/$image' class='padding-0' >
						</a>
					</figure>
					<div class='details mx-auto padding'  style='margin-top:10px;'>
						<div class='detail mt-5'>
							<div class='category'>
								<a href='category.php?c_id=$post_cat_id'>$category</a>
							</div>
							<div class='time'>$date</div>
						</div>
						<h1><a href='singlepost.php?post_id=$id&cat_r=$category'>$title</a></h1>
						<p>
						$content 
						</p>
					   
						 <!-- <footer>
							<a href='#' class='love'>Gabriel Godsent</a>
						</footer>  -->
					</div>
				</div>
			</article>";
			}
			echo $str;
		}
			public function gettodayNews() {
		
			$query = mysqli_query($this->conn, "SELECT * FROM news WHERE timestamped > curdate() AND type != 'advert' ORDER BY timestamped DESC LIMIT 3");
			$str = "";
			while ($row = mysqli_fetch_array($query)) {
				$content = substr($row['content'], 0, 30). "...";
		$image = $row['post_image'];
		$title = $row['title'];
		$id = $row['id'];
		$title = $row['title'];
		$cnt_title = substr($title,0,70)."...";
		// $time = time();
		// $date = (date("F d, Y h:i A"));
		$content =($row['content']);
		if (strlen($content) > 200) {
			$content = substr($content, 0, 100) . "...";
		}
		$date = $row['date_added'];
		$added_by = $row['added_by'];
		$date = $row['date_added'];
		$category = $row['post_category'];
		$post_cat_id = $row['post_cat_id'];

				$str .= "<article class='article-fw' style='margin-top:10px;'>
				<div class='inner'>
					<figure>
						<a href='singlepost.php?post_id=$id&cat_r=$category'>
							<img src='admin/$image' >
						</a>
					</figure>
					<div class='details'>
						<div class='detail'>
							<div class='time'>$date</div>
							<div class='category'><a href='category.php?c_id=$post_cat_id'>$category</a></div>
						</div>
						<h1><a href='singlepost.php?post_id=$id&cat_r=$category'>$cnt_title</a></h1>
						<p>
							$content
						</p>
						<small><a href=''>$added_by</a></small>
					</div>
				</div>
			</article>";
			}
			echo $str;
		}
			public function getolderpost() {
		
			$query = mysqli_query($this->conn, "SELECT * FROM news WHERE timestamped<CURDATE() AND type != 'advert' ORDER BY id DESC LIMIT 4");
			$str = "";
			while ($row = mysqli_fetch_array($query)) {
				$content = substr($row['content'], 0, 30). "...";
		$image = $row['post_image'];
		$title = $row['title'];
		$id = $row['id'];
		$title = $row['title'];
		$cnt_title = substr($title,0,70)."...";
		// $time = time();
		// $date = (date("F d, Y h:i A"));
		$content =($row['content']);
		if (strlen($content) > 200) {
			$content = substr($content, 0, 100) . "...";
		}
		$date = $row['date_added'];
		$added_by = $row['added_by'];
		$date = $row['date_added'];
		$category = $row['post_category'];
		$post_cat_id = $row['post_cat_id'];

				$str .= "<article class='article-fw' style='margin-top:10px;'>
				<div class='inner'>
					<figure>
						<a href='singlepost.php?post_id=$id&cat_r=$category'>
							<img src='admin/$image' >
						</a>
					</figure>
					<div class='details'>
						<div class='detail'>
							<div class='time'>$date</div>
							<div class='category'><a href='category.php?c_id=$post_cat_id'>$category</a></div>
						</div>
						<h1><a href='singlepost.php?post_id=$id&cat_r=$category'>$cnt_title</a></h1>
						<p>
							$content
						</p>
						<small><a href=''>$added_by</a></small>
					</div>
				</div>
			</article>";
			}
			echo $str;
		}
		public function gettopfortheweek() 
		{
			$query = mysqli_query($this->conn, "SELECT * FROM news WHERE timestamped>DATE_SUB(curdate(),INTERVAL 1 WEEK) ORDER BY num_views DESC LIMIT 6");
			$str = "";
			while ($row = mysqli_fetch_array($query)) {
				$post_cat_id = $row['post_cat_id'];
				$id = $row['id'];
				$content = $row['content'];
				$date = $row['date_added'];
				$title = $row['title'];
				if (strlen($content) > 200) {
					$content = substr($content, 0, 50) . "...";
				}
				// $time = time();
				// $date = (date("F d, Y h:i A"));
				$category = $row['post_category'];
				$image = $row['post_image'];
				$num_likes = $row['num_likes'];
				$post_cat_id = $row['post_cat_id'];
				$num_comments = $row['num_comments'];

				$str .= "<div class='insta-item col-sm-2 col-6 col-md-2'>
				<a href='#'>
					<img src='admin/$image' alt='' height='40px'>
				</a>
			</div>";
			}
			echo $str;
		}public function getfulladvert($id){
			$query = mysqli_query($this->conn, "SELECT * FROM news WHERE id=$id");
			$str = "";
			$time = time();
			// $date = (date("F d, Y h:i A"));
			$row = mysqli_fetch_array($query);
			$id = $row['id'];
			$title = $row['title'];
			$content = $row['content'];
			$added_by = $row['added_by'];
			$post_category = $row['post_category'];
			$post_cat_id = $row['post_cat_id'];
			$image = $row['post_image'];
			$tags = explode(',', $row['tags']);
			$date = $row['date_added'];
			$type = $row['type'];
			$views = $row['num_views'];
			$comments = $row['num_comments'];
			$num_likes = $row['num_likes'];
			$str_tags = "";
			foreach ($tags as $tag) {
				// $str_tags .= "<a href='tags.php?tag=$tag' class='btn btn-danger small rounded-0 '>$tag</a>";
				$str_tags .= "<a href='tags.php?tag=$tag' class='btn btn-danger small rounded-0 '>$tag</a>" . " ";
			}

			$str .= "<div class='details clearfix '>
       
	
			</div>
			<h5 class=' fs-3 text-dark mb-2 text-capitalize'>$title</h5>
				<a href='singlepost.php?post_id=$id&type=$type'>
			<div class='thumb '>
			<div class='inner mt-5 breaking'>
		
				<img src='admin/$image' alt='' class=' img-responive img-fluid w-100' style=';object-position: 5px 10%;'>
			</a>
			</div>
			 </div>
			
			
			
		
			</div>
			<!-- =============================================== -->
			<div class='single-post mt-3'>
			<div class='single-post-cat post'>
			
	
					</div>
					<div class='single-post-cnt mt-4 '>
			 
				   <p class='text-justify text-dark mt-4 fs-5 mx-auto' style='word-spacing:-2px;'>
				   	$content
				   </p>
			  
			</div>
		
			<div class='widget '>	
			</div>";
            return $str;

		}public function getautorpost($username){
			// $query = mysqli_query($this->conn, "SELECT * FROM news WHERE id=$id");
			// $username = $row['username'];
			// while($row = mysqli_fetch_array($sql)){
			// 	$username = $row['username'];
			// }
			// $added_by = $this->user_obj->$user();
			$author = $this->user_obj->userName();
			$query = mysqli_query($this->conn, "SELECT * FROM news WHERE added_by = $username ORDER BY id DESC LIMIT 24");
			$str = " ";
			// $role = $this->user_obj->getRole();
			if(mysqli_num_rows($query) === 0){
				$str = "<h1 class='text-center text-danger mt-5'>No post yet</h1>";
			}
			while ($row = mysqli_fetch_array($query)){
				$id = $row['id'];
				$post_cat_id = $row['post_cat_id'];
				$id = $row['id'];
				$content = $row['content'];
				$date = $row['date_added'];
				$title = $row['title'];
				if (strlen($content) > 200) {
					$content = substr($content, 0, 100) . "...";
				}
				// $time = time();
				// $date = (date("F d, Y h:i A"));
				$category = $row['post_category'];
				$image = $row['post_image'];
				$num_likes = $row['num_likes'];
				$post_cat_id = $row['post_cat_id'];
				$num_comments = $row['num_comments'];
				$str .= " <div class='col-md-12  col-sm-12'>
				<!-- post  -->
				<div class='post post-list clearfix'>
					<div class='thumb '>
					   
						<a href='singlepost.php?post_id=$id&cat_r=$category' >
							<div class='inner'>
								<img src='admin/$image' alt='' class='img-responsive img-fluid' style='width:600px; height:220px;object-position: 5px 10%;object-fit:cover;'>
							</div>
						</a>
					</div>
					<div class='details'>
						<ul class='meta list-inline mb-3'>
							<li class='list-inline-item'>
							<a href='category.php?c_id=$post_cat_id' class='category-badge   rounded-0 text-white'>$category</a>
							</li>
						<!----	<li class='list-inline-item' class=>$date</li> ---->
						</ul>
						<h6 class='post-tile text-danger'>
							<a href='singlepost.php?post_id=$id&cat_r=$category' class='text-danger fw-bold'>
								$title
							</a>
						</h6>
						<p class='excerpt mb-0'>
						<a href='singlepost.php?post_id=$id&cat_r=$category'>
						$content
						</a>
						</p>
						<div class='post-bottom clearfix d-flex align-items-center'>
							<div class='social-share me-auto'>
								<button class='toggle-button icon-share'></button>
								<ul class='icons list-unstyled list-inline mb-0'>
									<li class='list-inline-item'>
										<a href='#'><i class='fab fa-facebook-f'></i></a>
									</li>
									<li class='list-inline-item'>
										<a href='#'><i class='fab fa-twitter'></i></a>
									</li>
									<li class='list-inline-item'>
										<a href='#'><i class='fab fa-whatsapp'></i></a>
									</li>
								   
								</ul>
							</div>
							<div class='more-button float-end'>
								<a href='#'><span class='icon-options'></span></a>
							</div>
						</div>
					</div>
				</div>
			</div>";
			}echo $str;
		}public function getadvert(){
			$query = mysqli_query($this->conn, "SELECT * FROM news WHERE type = 'advert' ORDER BY id DESC LIMIT 1");
			$str = "";
			while($row = mysqli_fetch_array($query)){
				$content = substr($row['content'], 0, 100). "...";
						$image = $row['post_image'];
						$title = $row['title'];
						$cnt_title = substr($title,0,45)."...";
						$id = $row['id'];
						$time = time();
						// $date = (date("F d, Y h:i A"));
						$added_by = $row['added_by'];
						$date = $row['date_added'];
						$category = $row['post_category'];
						$post_cat_id = $row['post_cat_id'];
				$str .= "<aside>
				<div class='aside-body'>
				  <figure class='ads'>
					  <a href='singlepost.php?post_id=$id&cat_r=$category'>
						<img src='admin/$image'>
					  </a>
					<figcaption>Advertisement</figcaption>
				  </figure>
				</div>
			  </aside>";
					}
					echo $str;
		}public function latestfooter(){
			$query = mysqli_query($this->conn, "SELECT * FROM news WHERE timestamped>curdate() AND type != 'advert' ORDER BY num_views DESC LIMIT 4");
			$str = "";
			while ($row = mysqli_fetch_array($query)) {
				$content = substr($row['content'], 0, 30). "...";
		$image = $row['post_image'];
		$title = $row['title'];
		$id = $row['id'];
		$title = $row['title'];
		$cnt_title = substr($title,0,50)."...";
		// $time = time();
		// $date = (date("F d, Y h:i A"));
		$content =($row['content']);
		if (strlen($content) > 200) {
			$content = substr($content, 0, 100) . "...";
		}
		$date = $row['date_added'];
		$added_by = $row['added_by'];
		$date = $row['date_added'];
		$category = $row['post_category'];
		$post_cat_id = $row['post_cat_id'];

				$str .= "<article class='article-mini'>
				<div class='inner'>
					<figure>
						<a href='singlepost.php?post_id=$id&cat_r=$category'>
							<img src='admin/$image' >
						</a>
					</figure>
					<div class='padding'>
						<h1><a href='singlepost.php?post_id=$id&cat_r=$category'>$cnt_title</a></h1>
					</div>
				</div>
			</article>";
			}
			echo $str;
		}

		public function getFullNews($id)
		{
			$query = mysqli_query($this->conn, "SELECT * FROM news WHERE id=$id");
			$str = "";
			$time = time();
			// $date = (date("F d, Y h:i A"));
			$row = mysqli_fetch_array($query);
			$id = $row['id'];
			$title = $row['title'];
			$content = $row['content'];
			$added_by = $row['added_by'];
			$category = $row['post_category'];
			$post_cat_id = $row['post_cat_id'];
			$image = $row['post_image'];
			$tags = explode(',', $row['tags']);
			$date = $row['date_added'];
			$views = $row['num_views'];
			$comments = $row['num_comments'];
			$num_likes = $row['num_likes'];
			$date = $row['date_added'];
			$str_tags = "";
			$hash = "#";
			$user_id = $row['user_id'];
			if(isset($_GET['post_id']) && $_GET['post_id'] !=""){
				$id = $_GET['post_id'];
				$sql = mysqli_query($this->conn, "SELECT * FROM comments WHERE post_id=$id AND status='approved'");
				$num = mysqli_num_rows($sql);
			}
			foreach ($tags as $tag) {
				// $str_tags .= "<a href='tags.php?tag=$tag' class='btn btn-danger small rounded-0 '>$tag</a>";
				$str_tags .= "<a href='tags.php?tag=$tag'>$tag</a>" . " ";
			}

			$str .= "<article class='article main-article'>
			<header>
				<h3>$title</h3>
				<ul class='details col-md-12 '>
					<li style='color:black;'>$date</li>
					<li><a href='category.php?c_id= $post_cat_id 'class='bold'>$category</a></li>
					
					<span><li style='color:black;'>By &nbsp;<a href='author_post.php?user_id=$user_id' class='bold'>$added_by</a></li></span>
					<li class='fa fa-eye' class='text-dark' style='color:black;'>&nbsp;&nbsp;$views</li>
					<li class='fa fa-comments' style='font-weight:bold;color:black;'>&nbsp;&nbsp;$comments</li>
				</ul>
			</header><br><br>
			<div class='main'>
				<div class='featured'>
					<figure>
						<img src='admin/$image'>
					</figure>
				</div>
		
				<p>$content</p>
			</div>
			 <footer>
				<div class='col d-flex'>
					<ul class='tags list-inline '>
						<li>$str_tags</li>
					</ul>
				</div>
				<div class='col'>
				<!--- <a href='#' class='love'><i class='ion-android-favorite-outline'></i> <div>$num_likes</div></a>
			</div> ---->
				
			<!------ <a href='singlepost.php?post_id=$id&cat_r=$category&like_id=$id' name='liked'  class='loved btn btn-sm btn-danger liked'><i class='ion-android-favorite-outline'></i><div>$num_likes</div></a>---->
				
				 <!----<a href='singlepost.php?post_id=$id&cat_r=$category&like_id=$id' name='unliked' class='love btn btn-sm btn-info unliked'><i class='fa fa-thumbs-down'></i>$num_likes</a>
				 ---->
				
			</footer> 
		</article>";
        return $str;
		}
	}
	
