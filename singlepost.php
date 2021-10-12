


<?php include 'extension/header.php'; ?>

		<section class="single">
			<div class="container">

				<div class="col-md-8" style='margin-top:20px;'>
						<!-- <ol class="breadcrumb">
						  <li><a href="#">Home</a></li>
						</ol> -->
						<!-- =============== -->
						<?php   if(isset($_GET['post_id']) & $_GET['post_id'] !== ""){
                                    $id = $_GET['post_id'];
                                    $sql = mysqli_query($connection, "SELECT num_views FROM news WHERE id = $id");
                                    $row = mysqli_fetch_array($sql); 
                                    $view = $row['num_views'];
                                    $view++;
                                    mysqli_query($connection, "UPDATE news SET num_views='$view',timestamped=NOW() WHERE id=$id");
						 echo $post_obj->getFullNews($_GET['post_id']); 
						 } 
						 ?>
						 
						
					
					
						<!-- =================== -->
						<div class="sharing">
						<div class="title"><i class="ion-android-share-alt"></i> Sharing</div>
							<ul class="social">
								<li>
									<a href="#" class="facebook">
										<i class="ion-social-facebook"></i> Facebook
									</a>
								</li>
								<li>
									<a href="#" class="twitter">
										<i class="ion-social-twitter"></i> Twitter
									</a>
								</li>
								<li>
									<a href="#" class="whatsapp">
										<i class="ion-social-whatsapp"></i> whatsapp
									</a>
								</li>
								
								<li>
									<a href="#" class="instagram">
										<i class="ion-social-instagram"></i> Instagram
									</a>
								</li>
								
							</ul>
							
						</div>
						
						<div class="line">
							<!-- <div>Author</div> -->
						 </div> 
						
								<!-- <div class="job">Web Developer</div> -->
								<?php 
							//  if(isset($_GET['post_id']) & $_GET['post_id'] !== "") {
							// 	$id = $_GET['post_id'];
							// 	$query = mysqli_query($connection, "SELECT * FROM news WHERE id  = $id");
							// 	$row = mysqli_fetch_array($query);
							// 	 $user_id = $row['user_id'];
							// 	 $num_posts = mysqli_num_rows($query);
							// 	 $sql = mysqli_query($connection, "SELECT * from users where id=$user_id");
							// 	 $row =mysqli_fetch_array($sql);
							// 	 $profile = $row['profile_pic'];
							// 	 $username = $row['username'];
							// 	 $email = $row['email'];
							// 	 $sql = mysqli_query($connection, "SELECT * FROM news WHERE user_id=$user_id");
							// 	 $row = mysqli_fetch_array($sql);
							// 	 $num_posts = mysqli_num_rows($sql);
								 ?>
								 <div class="author">
							<!-- <figure>
								<?php #echo "<img src='admin/$profile'>"; ?>
							</figure> -->
							<!-- <div class="details">
								<h5 class="name"><?php #echo $username ?></h5>
								<p class='small'><?php #echo $email ?></p>
								<p class='small'>Posts: &nbsp;<?php #echo  $num_posts;?></p>
								
							</div> -->
							<?php #} ?>
							
						</div>

					

						<!-- ===================comment start -->


								<!-- ========================================================================== -->
								<!-- ==============my comment start -->
								<div class="comments">
							<h2 class="title">3 Responses <a href="#">Write a Response</a></h2>
							<div class="comment-list">
								
								<div class="item">
									<div class="user">                                
										<figure>
											<img src="images/img03.jpg">
										</figure>
										<div class="details">
											<h5 class="name">Mark Otto</h5>
											<div class="time">24 Hours</div>
											<div class="description">
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore <a href="#">magna</a> aliqua. Ut enim ad minim veniam,
												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
											</div>
											<footer>
												<a href="#">Reply</a>
											</footer>
										</div>
									</div>
									<div class="reply-list">
										<div class="item">
											<div class="user">                                
												<figure>
													<img src="images/img03.jpg">
												</figure>
												<div class="details">
													<h5 class="name">Mark Otto</h5>
													<div class="time">24 Hours</div>
													<div class="description">
														Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
														consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
														cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
														proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
													</div>
													<footer>
														<a href="#">Reply</a>
													</footer>
												</div>
											</div>
										</div>
									</div>
								</div>
							
							</div>
							<form class="row" id="submit_comment" method="POST">
								<div class="col-md-12">
									<h3 class="title">Leave Your Response</h3>
								</div>
								<div class="form-group col-md-4">
									<label for="name">Name <span class="required"></span></label>
									<input type="text" id="name" name="name" class="form-control">
								</div>
								<div class="form-group col-md-4">
									<label for="email">Email <span class="required"></span></label>
									<input type="email" id="email" name="email" class="form-control">
								</div>
								<div class="form-group col-md-4">
									<label for="website">Website</label>
									<input type="url" id="website" name="website" class="form-control">
								</div>
								<div class="form-group col-md-12">
									<label for="message">Response <span class="required"></span></label>
									<textarea class="form-control" id="body" name="body" placeholder="Write your response ..."></textarea>
								</div>
								<div class="form-group col-md-12">
									<button class="btn btn-primary">Send Response</button>
								</div>
								<div class="form-group">
                                            <input type="hidden" name="update_comment" value="true">
                                            <?php
                                                if(isset($_GET['post_id'])){
                                                    ?>  
                                                        <input type="hidden" name="post_id" value="<?php echo $_GET['post_id']; ?>">
                                                        <input type="hidden" name="cat_r" value="<?php echo $_GET['cat_r']; ?>">
                                                    <?php
                                                }
                                            ?>
                                        </div>
							</form>
						</div>
					</div>
				<!-- ===================comment stop -->
				<div class="row">
					<div class="col-md-4 sidebar" id="sidebar">
						<aside>
							<div class="aside-body">
								<?php $post_obj->getadvert(); ?>
							</div>
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
		                  <h1><a href="singlepost.php?post_id=$id&cat_r=$category"><?php echo $title ?></a></h1>
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
					  $query = mysqli_query($connection, "SELECT * FROM news WHERE timestamped>=curdate() ORDER BY rand()  limit 6");
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
		                  <div class="category"><a href="category.php?c_id=<?php echo $post_cat_id ?>" style='font-size:8px;'><?php echo $category ?></a></div>
		                  <div class="time small"><?php echo $date_added ?></div>
		                </div>
		              </div>
		              </div>
		            </article>
		           
		          <?php } ?>
		          </div>
		        </aside>
						<!-- <aside>
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
						</aside> -->
					</div>
				
				</div>
			</div>
								
			<section class="best-of-the-week " style='margin-left:0;margin-right:0;padding-left:0;padding-right:0;'>
					
					<div class="container bg-none" >
						<h1><div class="text box-shadow padding">Related Articles</div>
						
							<div class="carousel-nav" id="best-of-the-week-nav">
								<div class="prev">
									<i class="ion-ios-arrow-left"></i>
								</div>
								<div class="next">
									<i class="ion-ios-arrow-right"></i>
								</div>
							</div>
						</h1>
						<div class="owl-carousel owl-theme carousel-1">
							<?php #$post_obj->getsportsnews(); 
							if (isset($_GET['cat_r']) && $_GET['cat_r'] !== "") {
								$cat_r = $_GET['cat_r'];
								$sql = mysqli_query($connection, "SELECT * FROM news WHERE post_category = '$cat_r'  ORDER BY RAND() LIMIT 9");
								while ($row = mysqli_fetch_assoc($sql)):
								 $id = $row['id'];
									$date_added = $row['date_added'];
									$title = $row['title'];
									$category = $row['post_category'];
									$content = substr($row['content'], 0, 60)."...";
									$image = $row['post_image'];
									$added_by = $row['added_by'];
									$num_likes = $row['num_likes'];
									$num_comments = $row['num_comments']
							?>
							<article class='article'>
						<div class='inner'>
							<figure>
								<a href='singlepost.php?post_id=<?php echo $id ?> &cat_r=<?php echo $category ?>'>
									<img src='<?php echo "admin/$image" ?>' >
								</a>
							</figure>
							<div class='padding'>
								<div class='detail'>
										<div class='time small' style='font-size:7px;'><?php echo $date_added ?></div>
										<div class='category'><a href='category.php?c_id=<?php echo $post_cat_id ?> small'><?php echo $category ?></a></div>
								</div>
								<h2><a href='singlepost.php?post_id=<?php echo $id ?> &cat_r=<?php echo $category ?>'><?php echo $title ?></a></h2>
								<p><?php echo $content ?> </p>
							</div>
						</div>
					</article>
					<?php endwhile;
							}
										
						?>
						</div>
					</div>
				</section>
		</section>

	
		<!-- Start footer -->
        <?php include 'extension/footer.php'; ?>
		<!-- End Footer -->

		<!-- JS -->
		<script>
			$(document).ready(function(){
				$('#submit_comment').on('submit', function(event){
					event.preventDefault();
					var form_data = $(this).serialize();
					$.ajax({
						url: "add_comment.php",
						method: "POST",
						data:form_data,
						dataType:"JSON",
						success: function(data){
							if(data.error != ''){
								$('#submit_comment')[0].reset();
								$('#comment_message').html(data.error);
							}
						}
					})
				});
			});
		</script>
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
		<!-- <script src="like.js"></script> -->
		<!-- <script src="js/demo.js"></script> -->
		<script src="js/e-magz.js"></script>
		<script src="comment.js"></script>
	
	<script>
// 			if (window.history.replaceState ) {
//   window.history.replaceState( null, null, window.location.href );
// }
</script>
	</body>
</html>