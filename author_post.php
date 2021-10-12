<?php include 'extension/header.php'; ?>
		<section class="category">
		  <div class="container">
		    <div class="row">
		      <div class="col-md-8 text-left">
		        <div class="row">
		          
                  
		        </div>
		        <?php
							  if(isset($_GET['user_id'])){
								$user = $_GET['user_id'];
								$query = mysqli_query($connection, "SELECT * FROM users WHERE id = '$user' ");
								$row = mysqli_fetch_array($query);
								$profile_pic = $row['profile_pic'];
								$username = $row['username'];
								$firstname = $row['firstname'];
								$email = $row['email'];
								
								$query = mysqli_query($connection, "SELECT * FROM news WHERE user_id='$user'");
								$row = mysqli_fetch_array($query);
								$num_posts = mysqli_num_rows($query);
							?>
		        <div class="row">
                <div class="line ">
							<div >More post by <?php echo $firstname ?></div>
						</div>
						<div class="author">
							
							<figure>
							
								<?php echo "<img src='admin/$profile_pic'>" ?>
							</figure>
							<div class="details">
								<div class="job">Blogger</div>
								<h5 class="name"><?php echo $username ?></h5>
								<?php } ?>
								<p><?php echo $email ?></p>
								<p> Number of post:&nbsp;<?php echo $num_posts?></p>
								
							</div>
						
						</div>
                    <?php
                $per_page = 8;
                       
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    } else {
                        $page = "";
                    }
                if($page == "" || $page == 1){
                    $page_1 = 0;
                } else {
                    $page_1 = ($page * $per_page) - $per_page;
                }
                $post_query_count = "SELECT * FROM news";
                $find_count = mysqli_query($connection, $post_query_count);
                $count = mysqli_num_rows($find_count);
                $count = ceil($count / 6);
                if(isset($_GET['user_id'])){
                    $user = $_GET['user_id'];
                    $query = mysqli_query($connection, "SELECT * FROM news WHERE user_id = '$user' ORDER BY id DESC LIMIT $page_1, $per_page");
                    $str = "";
                }else{
					header("location: index.php");
				}
               echo "<div class='line'></div>";
               
                if(mysqli_num_rows($query) === 0) {
                $str = "<h1 class='text-center text-danger mt-5'>No More Post</h1>";
                }else{
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
			 $title = $row['title'];
			 $date = $row['date_added'];
			 $image = $row['post_image'];
			 $num_likes = $row['num_likes'];
			 $num_comments = $row['num_comments'];
            $str .= "<article class='col-md-12 article-list bg-white box-shadow'>
            <div class='inner'>
              <figure>
                  <a href='single.html'>
                    <img src='admin/$image'>
                </a>
              </figure>
              <div class='details'>
                <div class='detail'>
                  <div class='category'>
                   <a href='category.php?c_id=$post_cat_id'>$category</a>
                  </div>
                  <div class='time'>$date_added</div>
                </div>
                <h1><a href='single.html'>$title</a></h1>
                <p>
                <a href='' class='text-dark'> $content</a>
                </p>
               <small class='small bold'><a href='''>$added_by</a></small>
              </div>
            </div>
          </article> ";
        }
    }
          echo $str;
                  
              ?> 
		          <div class="col-md-12 text-center">
                  <ul class="pagination">
                  <?php
						   for($i=1; $i <= $count; $i++){
							if($i == $page){
							}
							 elseif($i != $page){
								  
									echo "<li class='active small'><a href='author_post.php?user_id=$user&&page={$i}'>{$i}</a></li>
									";
							  }
							}
					?>
                </ul>
		          </div>
		        </div>
		      </div>
		      <div class="col-md-4 sidebar">
		        <aside>
		          <div class="aside-body">
		           <?php $post_obj->getadvert(); ?>
		          </div>
		        </aside>
		        <aside>
		          <h1 class="aside-title">Recent Post</h1>
                  <div class="aside-body  ">
					  <?php
					  $query = mysqli_query($connection, "SELECT * FROM news WHERE timestamped>=curdate() ORDER BY id DESC limit 1");
					  while($row = mysqli_fetch_array($query)){
						  $title = $row['title'];
						  $content = $row['content'];
						 if (strlen($content) > 200){
							$content = substr($content,0,50)."...";
						 }
						  $added_by = $row['added_by'];
						  $date = $row['date_added'];
						  $image = $row['post_image'];
						  $category = $row['post_category'];
						
					  
					  ?>
		            <article class="article-fw bg-white box-shadow padding-0">
		              <div class="inner">
		                <figure>
			                <a href="single.html">
			                <?php echo  "<img src='admin/$image' class='padding-0'>"; ?>
			                </a>
		                </figure>
		                <div class="details padding" style='padding:15px;'>
		                  <h1><a href="single.html"><?php echo $title ?></a></h1>
		                  <p>
		                    <?php echo $content ?>
		                  </p>
		                  <div class="detail">
		                    <div class="time"><?php echo $date_added ?></div>
		                    <div class="category"><a href="category.php?c_id=$post_cat_id"><?php echo $category ?></a></div>
		                  </div>
		                </div>
		              </div>
		            </article>
					<?php } ?>

		            <div class="line"></div>
					<?php
					  $query = mysqli_query($connection, "SELECT * FROM news WHERE timestamped>=curdate() ORDER BY rand()  limit 4");
					  while($row = mysqli_fetch_array($query)){
						  $title = $row['title'];
						  $content = $row['content'];
						 if (strlen($content) > 200){
							$content = substr($content,0,50)."...";
						 }
						  $added_by = $row['added_by'];
						  $date = $row['date_added'];
						  $image = $row['post_image'];
						  $category = $row['post_category'];
					  
					  ?>
		            <article class="article-mini">
		              <div class="inner">
		              <figure>
			              <a href="single.html">
			              <?php echo  "<img src='admin/$image'>" ?>
		                </a>
		              </figure>
		              <div class="padding">
		                <h1><a href="single.html"><?php echo $title ?></a></h1>
		                <div class="detail">
		                  <div class="category"><a href="category.php?c_id=$post_cat_id" style='font-size:8px;'><?php echo $category ?></a></div>
		                  <div class="time small"><?php echo $date_added ?></div>
		                </div>
		              </div>
		              </div>
		            </article>
		           
		          <?php } ?>
		          </div>
		        </aside>
		        <aside>
		          <div class="aside-body">
		            <form class="newsletter">
		              <div class="icon">
		                <i class="ion-ios-email-outline"></i>
		                <h1>Newsletter</h1>
		              </div>
		              <div class="input-group">
		                <input type="email" class="form-control email" placeholder="Your mail">
		                <div class="input-group-btn">
		                  <button class="btn btn-primary"><i class="ion-paper-airplane"></i></button>
		                </div>
		              </div>
		              <p>By subscribing you will receive new articles in your email.</p>
		            </form>
		          </div>
		        </aside>
		      </div>
		    </div>
		  </div>
		</section>

		<!-- Start footer -->
		<?php include 'extension/footer.php'; ?>
		<!-- End Footer -->

		<!-- JS -->
		<script src="js/jquery.js"></script>
		<script src="js/jquery.migrate.js"></script>
		<script src="scripts/bootstrap/bootstrap.min.js"></script>
		<script>var $target_end=$(".best-of-the-week");</script>
		<script src="scripts/jquery-number/jquery.number.min.js"></script>
		<script src="scripts/owlcarousel/dist/owl.carousel.min.js"></script>
		<script src="scripts/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
		<script src="scripts/easescroll/jquery.easeScroll.js"></script>
		<script src="scripts/sweetalert/dist/sweetalert.min.js"></script>
		<script src="scripts/toast/jquery.toast.min.js"></script>
		<!-- <script src="js/demo.js"></script> -->
		<script src="js/e-magz.js"></script>
	</body>
</html>