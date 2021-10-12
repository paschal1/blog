<?php include 'extension/header.php'; ?>

		<section class="home">
			<div class="container">
				<marquee behavior="" direction="left" scrollamount="10" class="col-lg-12">Welcome to Xtragist <span>So much more to read now 
					News, Events, Entertainment, Lifestyle, Fashion, Beauty, Inspiration and yes... Gossip! *Wink*</span></marquee>
				<div class="row">
					<div class="col-md-8 col-sm-12 col-xs-12">
					<div class="headline">
							<div class="nav" id="headline-nav">
								<a class="left carousel-control" role="button" data-slide="prev">
									<span class="ion-ios-arrow-left" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" role="button" data-slide="next">
									<span class="ion-ios-arrow-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
							<div class="owl-carousel owl-theme" id="headline">							
								<div class="item">
									<a href="#"><div class="badge">Breaking</div> Vestibulum ante ipsum primis in faucibus orci</a>
								</div>
								<div class="item">
									<a href="#">Ut rutrum sodales mauris ut suscipit</a>
								</div>
							</div>
						</div>
						<div class="owl-carousel owl-theme owl-slider" id="featured">
							
							<?php $post_obj->getbreakingnews(); ?>
						</div>
						<!-- 550px	 -->
								
					<!-- =================== STOP BREAKING NEWS ========================----->
						<div class="line">
							<div>Latest News</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="row">
									<?php $post_obj->getcasualnews(); ?>
								
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="row">
                                <?php $post_obj->getrecentbreakingnews(); ?>	
								</div>
							</div>
						</div>
						<div class="banner">
							<a href="#">
								<img src="images/ads.png" alt="Sample Article">
							</a>
						</div>
						<!-- <div class="line transparent little"></div> -->
						<div class="row">
                        <!-- <div class="body-col    padding hidden-lg  hidden-md d-col-md-none">
                                
								</div> -->
							<div class="col-md-12 col-sm-12 hidden-lg hidden-md" >
								
								<div class="body-col vertical-slider  mx-auto padding " data-max="4" data-nav="#hot-news-nav" data-item="article" style='padding-top:25px;padding-bottom:15px;margin-top:15px;margin-bottom:10px;'>

								<h1 class="title-col" style="margin-bottom:35px;">
									Top News
									<div class="carousel-nav" id="hot-news-nav">
										<div class="prev">
											<i class="ion-ios-arrow-left"></i>
										</div>
										<div class="next">
											<i class="ion-ios-arrow-right"></i>
										</div>
									</div>
								</h1>
									<?php $post_obj->getsidetopnews(); ?>
                     

								</div>
                                
							</div>
						</div>
						<div class="line top">
							<div class='bg-none'>Trending Now</div>
						</div> <br>
						<div class="row padding" style='margin-bottom:30px;'>
							
							<?php $post_obj->getlatestnews(); ?>

<!-- ============================================================================================================= -->
<!-- ======================================== Small and midi screen sidepost -->
                            <aside class='hidden-lg hidden-md '>
							<ul class="nav nav-tabs nav-justified" role="tablist" >
								<li class="active" style="width:100%;">
									<a href="#recomended" aria-controls="recomended" role="tab" data-toggle="tab" class='h1'>
										<i class="ion-android-star-outline"></i> Today's News
									</a>
								</li>
								<li>
									
							</ul>
							<div class="tab-content bg-white">
								<div class="tab-pane active" id="recomended">
									<?php $post_obj->gettodayNews(); ?>
									
								</div>
							</div>
						</aside>
						<!-- ============================================================== -->
                        <!-- <aside id="sponsored" class='hidden-lg hidden-md'>
							<h1 class="aside-title">Xtragist's Forum</h1>
							<div class="aside-body">
								<ul class="sponsored">
									<li>
										<a href="#">
											<img src="images/img01.jpg" alt="Sponsored">
										</a>
									</li> 
									<li>
										<a href="#">
											<img src="images/sponsored.png" alt="Sponsored">
										</a>
									</li> 
									<li>
										<a href="#">
											<img src="images/sponsored.png" alt="Sponsored">
										</a>
									</li> 
									<li>
										<a href="#">
											<img src="images/sponsored.png" alt="Sponsored">
										</a>
									</li> 
								</ul>
							</div>
						</aside> -->
                        <div class='hidden-lg hidden-md '>
                        <?php $post_obj->getadvert(); ?>
                        </div> <br>
                        <div class="body-col hidden-lg  hidden-md padding" style='margin-top:20px:'>
                                <h1 class="title-col" >Categories</h1>
									<ul class="tags-list" >
										<?php $cat_obj->getallcategory(); ?>
                                    </ul>
						</div>
						<aside class='hidden-lg hidden-md '>
							<ul class="nav nav-tabs nav-justified" role="tablist" >
								<li class="active" style="width:100%;">
									<a href="#recomended" aria-controls="recomended" role="tab" data-toggle="tab" class='h1'>
									<h5>Older post</h5>
									</a>
								</li>
								<li>
									
							</ul>
							<div class="tab-content bg-white">
								<div class="tab-pane active" id="recomended">
									<?php $post_obj->getolderpost(); ?>
									
								</div>
							</div>
						</aside>
						<aside>
							<div class="aside-body hidden-lg hidden-md ">
								<?php

									if(isset($_POST['subscribe'])){ 
															
										//   $name = ($_POST['name']);
										$email = ($_POST['email']);
										//   $pwd = $_POST['pwd'];
										//   $cpwd = $_POST['cpwd'];
										$query = mysqli_query($connection, "INSERT INTO subscribers VALUES('','','$email','');");
										if($query){	
											echo "<div class='alert alert-danger'>Thanks for subscribing</div>";
										unset($_POST['subscribe']);
									}
									}
								?>
								<form class="newsletter" method='post' action=''>
									<div class="icon">
										<i class="ion-ios-email-outline"></i>
										<h1>Newsletter</h1>
									</div>
									<div class="input-group">
										<input type="email" class="form-control email" placeholder="Your mail">
										<div class="input-group-btn">
											<button class="btn btn-primary" type='submit' name='subscribe'><i class="ion-paper-airplane" ></i></button>
										</div>
									</div>
									<p>By subscribing you will receive new articles in your email.</p>
								</form>
							</div>
						</aside>
                        <!-- =========================================================================== -->
						</div>
					</div>
					<div class="col-xs-6 col-md-4 sidebar mt-0 hidden-md" id="sidebar" style="margin-top: 0;">
						<div class="sidebar-title for-tablet">Sidebar</div>
						
						<aside >
							
							<div class="aside-body hidden-md hidden-sm" >
                            <h1 class="aside-title" style="margin-bottom:5px;">Top News <a href="#" class="all"><i class=""></i></a></h1>
                           <?php $post_obj->getfeaturednews(); ?>
                           
							</div>
						</aside>
                       
						<aside>
							<div class="aside-body hidden-md hidden-sm ">
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
						<aside class='hidden-md hidden-sm'>
							<ul class="nav nav-tabs nav-justified" role="tablist" >
								<li class="active" style="width:100%;">
									<a href="#recomended" aria-controls="recomended" role="tab" data-toggle="tab" class='h1'>
									<h5>Most Recent Posts</h5>
									</a>
								</li>
								<li>
									
							</ul>
							<div class="tab-content bg-white">
								<div class="tab-pane active" id="recomended">
									<?php $post_obj->gettodayNews(); ?>
									
								</div>
							</div>
						</aside>
						
						<!-- <aside id="sponsored">
							<h1 class="aside-title">Xtragist's Forum</h1>
							<div class="aside-body">
								<ul class="sponsored">
									<li>
										<a href="#">
											<img src="images/img01.jpg" alt="Sponsored">
										</a>
									</li> 
									
								</ul>
							</div>
						</aside> -->
                    <div class="hidden-md hidden-sm">
					<?php $post_obj->getadvert(); ?>
					</div>
                       
								<div class="body-col  hidden-md hidden-sm padding" style='margin-top:20px;'>
                                <h1 class="title-col">Categories</h1>
									<ul class="tags-list" >
										<?php $cat_obj->getallcategory(); ?>
                                    </ul>
								</div>
								<aside class='hidden-md hidden-sm'>
							<ul class="nav nav-tabs nav-justified" role="tablist" >
								<li class="active" style="width:100%;">
									<a href="#recomended" aria-controls="recomended" role="tab" data-toggle="tab" class='h1'>
									<h5>Older post</h5>
									</a>
								</li>
								<li>
									
							</ul>
							<div class="tab-content bg-white">
								<div class="tab-pane active" id="recomended">
									<?php $post_obj->getolderpost(); ?>
									
								</div>
							</div>
						</aside>
						
						<!-- ================================ At small width -->
					</div>
				</div>
			</div>

		<section class="best-of-the-week">
			<div class="container bg-none" >
				<h1><div class="text box-shadow padding">Top Highlights</div>
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
					<?php $post_obj->getsportsnews(); ?>
					
				</div>
			</div>
		</section>
		
	

		<!-- Start footer -->
		<?php include 'extension/footer.php'; ?>
		<!-- End Footer -->

		<!-- JS -->
		<script>
			if (window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
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
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
		<!-- <script src="js/demo.js"></script> -->
		<script src="js/e-magz.js"></script>
		<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
		<!-- <script src="{{base_url()}}assests/new/js/owl-carousel.js"></script>
    <script src="{{base_url()}}assests/new/js/owl.autoplay.js"></script> -->
	</body>
</html>