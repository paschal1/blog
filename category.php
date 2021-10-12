<?php include 'extension/header.php'; ?>



		<section class="category">
		  <div class="container ">
		    <div class="row container">
		      <div class="col-md-8 text-left">
		        <div class="row ">
		          <div class=" col-md-12 col-lg-8 col-sm-12">        
		            <ol class="breadcrumb">
		              <li><a href="#">Home</a></li> 
					  <?php
					  $category = $_GET['c_id'];
					  $query = mysqli_query($connection, "SELECT  cat_title FROM category WHERE id=$category");
					  while($row = mysqli_fetch_array($query)){
						$category = $row['cat_title'];
					  ?>
		              <li class="active"><?php echo $category ?></li>
		            </ol>
		            <h4 class="page-title"><?php echo $category ?></h4>
		           <?php } ?>
		          </div>
				 
		        </div>
		        <div class="line"></div>
				<div >
		        <div class="row ">

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
						if(isset($_GET['c_id']) && $_GET['c_id'] !==""){     
							$c_id = $_GET['c_id'];
							}else{
							header("location: index.php");
							}
						$query = mysqli_query($connection, "SELECT * FROM news WHERE post_cat_id = $c_id ORDER BY id DESC LIMIT $page_1, $per_page");
						$str = "";
					if(mysqli_num_rows($query) === 0) {
						$str = "<h1 class='text-center text-danger mt-5'>No post yet!</h1>";
					}	
					else {
						while ($row = mysqli_fetch_array($query)) {
							$id = $row['id'];
							$content = $row['content'];
							if (strlen($content) > 200) {
								$content = substr($content, 0, 120) . "...";
							}
							$category = $row['post_category'];
							$id = $row['id'];
							$title = $row['title'];
							$cnt_title = substr($title,0,70)."...";
							$post_cat_id = $row['post_cat_id'];
							$added_by = $row['added_by'];
							$date_added = $row['date_added'];
							$image = $row['post_image'];
							$num_likes = $row['num_likes'];
							$num_comments = $row['num_comments'];
			   
							$str .= "<article class='col-md-12 article-list bg-white padding-0 box-shadow ' style='padding-bottom:0px;'>
							<div class='inner'>
							  <figure>
								  <a href='singlepost.php?post_id=$id&cat_r=$category'>
									<img src='admin/$image'>
								</a>
							  </figure>
							  <div class='details' >
								<div class='detail'>
								  <div class='category'>
								   <a href='category.php?c_id=$post_cat_id'>$category</a>
								  </div>
								  <div class='time'>$date_added</div>
								</div>
								<h1><a href='singlepost.php?post_id=$id&cat_r=$category'>$cnt_title</a></h1>
								<p>
								<a href='singlepost.php?post_id=$id&cat_r=$category' class='text-dark'>$content</a>
								</p>
								<small><a href='' class='bold' style='line-height:0;'>$added_by</a></small>
							<!-----	<footer>
								  <a href='#' class='love'><small><a href='' class='love bold text-color'></a></small><div></div></a>
								  <a class='btn btn-primary more' href='singlepost.php?post_id=$id&cat_r=$category'>
									/<div>More</div>
									 <div><i class='ion-ios-arrow-thin-right'></i></div>
								  </a>	  
								</footer> ---->
							  </div>
							</div>
						  </article>";
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
								  
									echo "<li class='active small' ><a href='category.php?c_id=$c_id&page={$i}' style='margin-bottom:12px;'>{$i}</a></li>
									";
							  }
							}
					?>
						 <!-- <li class="prev"><a href="#"><i class="ion-ios-arrow-left"></i></a></li> -->
						
						
		
						</ul>
		          																																																																																																																																																																																																																																																																																																																																																																																													</div>
		          
		         
		     

		        </div>
		      </div>
		      </div>
		      <div class="col-md-4 sidebar">
              <div class="aside-body hidden-md hidden-sm">
					<?php $post_obj->getadvert(); ?>
                </di>
		        <aside>
		         
		        </aside>
				
		        <aside>
		          <h1 class="aside-title">Recent Post</h1>
		          <div class="aside-body ">
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
			                <a href="singlepost.php?post_id=$id&cat_r=$category">
			                <?php echo  "<img src='admin/$image' class='padding-0'>"; ?>
			                </a>
		                </figure>
		                <div class="details padding" style='padding:15px;'>
		                  <h1><a href="singlepost.php?post_id=$id&cat_r=$category"><?php echo $cnt_title ?></a></h1>
		                  <p>
		                    <?php echo $content ?>
		                  </p>
		                  <div class="detail">
		                    <div class="time" style='font-size:8px;'><?php echo $date_added ?></div>
		                    <div class="category"><a href="category.php?c_id=<?php echo $post_cat_id ?>"><?php echo $category ?></a></div>
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
			              <a href="singlepost.php?post_id=$id&cat_r=$category">
			              <?php echo  "<img src='admin/$image'>" ?>
		                </a>
		              </figure>
		              <div class="padding">
		                <h1><a href="singlepost.php?post_id=$id&cat_r=$category"><?php echo $title ?></a></h1>
		                <div class="detail">
		                  <div class="category"><a href="category.php?c_id=$post_cat_id" ><?php echo $category ?></a></div>
		                  <div class="time small" style='font-size:8px;'><?php echo $date_added ?></div>
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