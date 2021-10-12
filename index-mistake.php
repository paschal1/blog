<?php include 'extension/header.php'; ?>
		<section class="home">
			<div class="container">
				<marquee behavior="" direction="left" class="col-lg-12">Lorem ipsum dolor sit amet consectetur adipisicing elit. At consequatur ipsa fugiat, odio amet cumque.</marquee>
				<div class="row">
					<div class="col-md-12 col-lg-5 col-sm-12  " >
						
						<!-- ===============START BREAKING NEWS -->
							
								<?php $post_obj->getbreakingnews(); ?>
								
					<!-- ===================STOP BREAKING NEWS======================== -->
                    <aside class="hidden-lg d-lg-none hidden-md hidden-sm ml-3 padding">
							<h1 class="aside-title">Featured News<a href="#" class="all"><i class=""></i></a></h1>
							<div class="aside-body">
								<?php 
                                $post_obj->getfeaturednews(); ?>
							</div>
						</aside>
						<div class="line">
							<div>Latest News</div>
                          
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12 ">
								<div class="row ">
									<?php $post_obj->getheadlines(); ?>							</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 ">
								<div class="row ">
                                    <!-- ------- breaking news that are less than one hour from posting and it is gotte randomly 
									it displays all btraking news that are posted within an interval of 1day and it is gotten randomly
								-->
                                <?php $post_obj->getrandheadlines(); ?>		
								</div>
							</div>
						</div>
						<div class="banner">
							<a href="#">
								<img src="images/ads.png" alt="Sample Article">
							</a>
						</div>
						<div class="line transparent little"></div>
						<div class="row">
							
							<div class="col-md-6 col-sm-6 hidden-lg hidden-xs">
								<h1 class="title-col">
									Hot News
									<div class="carousel-nav" id="hot-news-nav">
										<div class="prev">
											<i class="ion-ios-arrow-left"></i>
										</div>
										<div class="next">
											<i class="ion-ios-arrow-right"></i>
										</div>
									</div>
								</h1>
								<div class="body-col vertical-slider" data-max="4" data-nav="#hot-news-nav" data-item="article">
									<article class="article-mini">
										<div class="inner">
											<figure>
												<a href="single.html">
													<img src="images/news/img09.jpg" alt="Sample Article">
												</a>
											</figure>
											<div class="padding">
												<h1><a href="single.html">Duis aute irure dolor in reprehenderit in voluptate velit</a></h1>
												<div class="detail">
													<div class="category"><a href="category.html">Lifestyle</a></div>
													<div class="time">December 22, 2016</div>
												</div>
											</div>
										</div>
									</article>
									<article class="article-mini">
										<div class="inner">
											<figure>
												<a href="single.html">
													<img src="images/news/img01.jpg" alt="Sample Article">
												</a>
											</figure>
											<div class="padding">
												<h1><a href="single.html">Duis aute irure dolor in reprehenderit in voluptate velit</a></h1>
												<div class="detail">
													<div class="category"><a href="category.html">Lifestyle</a></div>
													<div class="time">December 22, 2016</div>
												</div>
											</div>
										</div>
									</article>
									<article class="article-mini">
										<div class="inner">
											<figure>
												<a href="single.html">
													<img src="images/news/img05.jpg" alt="Sample Article">
												</a>
											</figure>
											<div class="padding">
												<h1><a href="single.html">Duis aute irure dolor in reprehenderit in voluptate velit</a></h1>
												<div class="detail">
													<div class="category"><a href="category.html">Lifestyle</a></div>
													<div class="time">December 22, 2016</div>
												</div>
											</div>
										</div>
									</article>
									<article class="article-mini">
										<div class="inner">
											<figure>
												<a href="single.html">
													<img src="images/news/img02.jpg" alt="Sample Article">
												</a>
											</figure>
											<div class="padding">
												<h1><a href="single.html">Fusce ullamcorper elit at felis cursus suscipit</a></h1>
												<div class="detail">
													<div class="category"><a href="category.html">Travel</a></div>
													<div class="time">December 21, 2016</div>
												</div>
											</div>
										</div>
									</article>
									<article class="article-mini">
										<div class="inner">
											<figure>
												<a href="single.html">
													<img src="images/news/img13.jpg" alt="Sample Article">
												</a>
											</figure>
											<div class="padding">
												<h1><a href="single.html">Duis aute irure dolor in reprehenderit in voluptate velit</a></h1>
												<div class="detail">
													<div class="category"><a href="category.html">International</a></div>
													<div class="time">December 20, 2016</div>
												</div>
											</div>
										</div>
									</article>
									<article class="article-mini">
										<div class="inner">
											<figure>
												<a href="single.html">
													<img src="images/news/img08.jpg" alt="Sample Article">
												</a>
											</figure>
											<div class="padding">
												<h1><a href="single.html">Aliquam et metus convallis tincidunt velit ut rhoncus dolor</a></h1>
												<div class="detail">
													<div class="category"><a href="category.html">Computer</a></div>
													<div class="time">December 19, 2016</div>
												</div>
											</div>
										</div>
									</article>
								</div>
							</div>
							<!-- ========Small and medium screen category -->
							<div class="col-md-12 col-sm-12 trending-tags hidden-lg">
								<h1 class="title-col">Trending Tags</h1>
								<div class="body-col">
									<ol class="tags-list">
										<li><a href="#">HTML5</a></li>
										<li><a href="#">CSS3</a></li>
										<li><a href="#">JavaScript</a></li>
										<li><a href="#">jQuery</a></li>
										<li><a href="#">Bootstrap</a></li>
										<li><a href="#">Responsive</a></li>
										<li><a href="#">AuteIrure</a></li>
										<li><a href="#">Voluptate</a></li>
										<li><a href="#">Veit</a></li>
										<li><a href="#">Reprehenderit</a></li>
									</ol>
								</div>
							</div>
							<!-- =======End small and medium screen category -->
						</div>

						<div class="line top">
							<div>Trending</div>
						</div>
						<div class="row container">
							<div class="col-md-12 col-lg-8 col-sm-12">
							<?php $post_obj->getlatestNews(); ?>
							<!-- <div class="aside-body hidden-lg padding" >
								<form class="newsletter">
									<div class="icon">
										<i class="ion-ios-email-outline"></i>
										<h1>Newsletter</h1>
									</div>
									<div class="input-group">
										<input type="email" class="form-control form-control email" placeholder="Your mail">
										<div class="input-group-btn">
											<button class="btn btn-primary"><i class="ion-paper-airplane"></i></button>
										</div>
									</div>
									<p>By subscribing you will receive new articles in your email.</p>
								</form>
							</div> -->
							</div>
						</div>

					

					</div>
					<div class="col-xs-6 col-md-4 sidebar mt-0 hidden-md hidden-sm" id="sidebar" >
						<div class="sidebar-title for-tablet">Sidebar</div>
						<aside>
							<div class="aside-body">
								<div class="featured-author">
									<div class="featured-author-inner">
									</div>
								</div>
							</div>
						</aside>
						<br>
						<aside >
							<h1 class="aside-title">Featured News <a href="#" class="all"><i class=""></i></a></h1>
							<div class="aside-body ">
								<?php 
                                $post_obj->getfeaturednews(); ?>
							</div>
						</aside>
						<aside>
							
						</aside>
						<aside>
							<ul class="nav nav-tabs nav-justified" role="tablist">
								<li class="active">
									<a href="#recomended" aria-controls="recomended" role="tab" data-toggle="tab">
										<i class="ion-android-star-outline"></i> Recomended
									</a>
								</li>
								<li>
									<a href="#comments" aria-controls="comments" role="tab" data-toggle="tab">
										<i class="ion-ios-chatboxes-outline"></i> Comments
									</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="recomended">
									<article class="article-fw">
										<div class="inner">
											<figure>
												<a href="single.html">
													<img src="images/news/img16.jpg" alt="Sample Article">
												</a>
											</figure>
											<div class="details">
												<div class="detail">
													<div class="time">December 31, 2016</div>
													<div class="category"><a href="category.html">Sport</a></div>
												</div>
												<h1><a href="single.html">Donec congue turpis vitae mauris</a></h1>
												<p>
													Donec congue turpis vitae mauris condimentum luctus. Ut dictum neque at egestas convallis. 
												</p>
											</div>
										</div>
									</article>
									<div class="line"></div>
									<article class="article-mini">
										<div class="inner">
											<figure>
												<a href="single.html">
													<img src="images/news/img05.jpg" alt="Sample Article">
												</a>
											</figure>
											<div class="padding">
												<h1><a href="single.html">Duis aute irure dolor in reprehenderit in voluptate velit</a></h1>
												<div class="detail">
													<div class="category"><a href="category.html">Lifestyle</a></div>
													<div class="time">December 22, 2016</div>
												</div>
											</div>
										</div>
									</article>
									<article class="article-mini">
										<div class="inner">
											<figure>
												<a href="single.html">
													<img src="images/news/img02.jpg" alt="Sample Article">
												</a>
											</figure>
											<div class="padding">
												<h1><a href="single.html">Fusce ullamcorper elit at felis cursus suscipit</a></h1>
												<div class="detail">
													<div class="category"><a href="category.html">Travel</a></div>
													<div class="time">December 21, 2016</div>
												</div>
											</div>
										</div>
									</article>
									<article class="article-mini">
										<div class="inner">
											<figure>
												<a href="single.html">
													<img src="images/news/img10.jpg" alt="Sample Article">
												</a>
											</figure>
											<div class="padding">
												<h1><a href="single.html">Duis aute irure dolor in reprehenderit in voluptate velit</a></h1>
												<div class="detail">
													<div class="category"><a href="category.html">Healthy</a></div>
													<div class="time">December 20, 2016</div>
												</div>
											</div>
										</div>
									</article>
								</div>
								<div class="tab-pane comments" id="comments">
									<div class="comment-list sm">
										<div class="item">
											<div class="user">                                
												<figure>
													<img src="images/img01.jpg" alt="User Picture">
												</figure>
												<div class="details">
													<h5 class="name">Mark Otto</h5>
													<div class="time">24 Hours</div>
													<div class="description">
														Lorem ipsum dolor sit amet, consectetur adipisicing elit.
													</div>
												</div>
											</div>
										</div>
										<div class="item">
											<div class="user">                                
												<figure>
													<img src="images/img01.jpg" alt="User Picture">
												</figure>
												<div class="details">
													<h5 class="name">Mark Otto</h5>
													<div class="time">24 Hours</div>
													<div class="description">
														Lorem ipsum dolor sit amet, consectetur adipisicing elit.
													</div>
												</div>
											</div>
										</div>
										<div class="item">
											<div class="user">                                
												<figure>
													<img src="images/img01.jpg" alt="User Picture">
												</figure>
												<div class="details">
													<h5 class="name">Mark Otto</h5>
													<div class="time">24 Hours</div>
													<div class="description">
														Lorem ipsum dolor sit amet, consectetur adipisicing elit.
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</aside>
						
						<aside>
							<h1 class="aside-title">Videos
								<div class="carousel-nav" id="video-list-nav">
									<div class="prev"><i class="ion-ios-arrow-left"></i></div>
									<div class="next"><i class="ion-ios-arrow-right"></i></div>
								</div>
							</h1>
							<div class="aside-body">
								<ul class="video-list" data-youtube='"carousel":true, "nav": "#video-list-nav"'>
									<li><a data-youtube-id="SBjQ9tuuTJQ" data-action="magnific"></a></li>
									<li><a data-youtube-id="9cVJr3eQfXc" data-action="magnific"></a></li>
									<li><a data-youtube-id="DnGdoEa1tPg" data-action="magnific"></a></li>
								</ul>
							</div>
						</aside>
						<aside id="sponsored">
							<h1 class="aside-title">Sponsored</h1>
							<div class="aside-body">
								<ul class="sponsored">
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
									<li>
										<a href="#">
											<img src="images/sponsored.png" alt="Sponsored">
										</a>
									</li> 
								</ul>
							</div>
						</aside>
						<!-- ========== large screen category -->
						<div class="col-md-12 hidden-md hidden-sm col-sm-6 col-lg-5 trending-tags">
								<h1 class="title-col">Trending Tags</h1>
								<div class="body-col">
									<ol class="tags-list">
										<li><a href="#">HTML5</a></li>
										<li><a href="#">CSS3</a></li>
										<li><a href="#">JavaScript</a></li>
										<li><a href="#">jQuery</a></li>
										<li><a href="#">Bootstrap</a></li>
										<li><a href="#">Responsive</a></li>
										<li><a href="#">AuteIrure</a></li>
										<li><a href="#">Voluptate</a></li>
										<li><a href="#">Veit</a></li>
										<li><a href="#">Reprehenderit</a></li>
									</ol>
								</div>
							</div>
					</div>
					<!-- -----=======End large screen category======== -->
				</div>
			</div>
		</section>

        <section class="best-of-the-week">
			<div class="container">
				<h1><div class="text">Sports</div>
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
					
				
				
				
				<article class='article'>
						<div class='inner'>
							<figure>
								<a href='single.html'>
									<img src='images/news/img11.jpg' alt='Sample Article'>
								</a>
							</figure>
							<div class='padding'>
								<div class='detail'>
									<div class='time'>December 26, 2016</div>
									<div class='category'><a href='category.html'>Travel</a></div>
								</div>
								<h2><a href='single.html'>Donec consequat arcu at ultrices sodales</a></h2>
								<p>Proin venenatis pellentesque arcu, ut mattis nulla placerat et.</p>
							</div>
						</div>
					</article>
				</div>
			</div>
		</section>


       

		<!-- Start footer -->
		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="block">
							<h1 class="block-title">Company Info</h1>
							<div class="block-body">
								<figure class="foot-logo">
									<img src="images/logo-light.png" class="img-responsive" alt="Logo">
								</figure>
								<p class="brand-description">
									Magz is a HTML5 &amp; CSS3 magazine template based on Bootstrap 3.
								</p>
								<a href="page.html" class="btn btn-magz white">About Us <i class="ion-ios-arrow-thin-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="block">
							<h1 class="block-title">Popular Tags <div class="right"><a href="#">See All <i class="ion-ios-arrow-thin-right"></i></a></div></h1>
							<div class="block-body">
								<ul class="tags">
									<li><a href="#">HTML5</a></li>
									<li><a href="#">CSS3</a></li>
									<li><a href="#">Bootstrap 3</a></li>
									<li><a href="#">Web Design</a></li>
									<li><a href="#">Creative Mind</a></li>
									<li><a href="#">Standing On The Train</a></li>
									<li><a href="#">at 6.00PM</a></li>
								</ul>
							</div>
						</div>
						<div class="line"></div>
						<div class="block">
							<h1 class="block-title">Newsletter</h1>
							<!-- <div class="block-body">
								<p>By subscribing you will receive new articles in your email.</p>
								<form class="newsletter">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="ion-ios-email-outline"></i>
										</div>
										<input type="email" class="form-control email" placeholder="Your mail">
									</div>
									<button class="btn btn-primary btn-block white">Subscribe</button>
								</form>
							</div> -->
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="block">
							<h1 class="block-title">Latest News</h1>
							<div class="block-body">
								<article class="article-mini">
									<div class="inner">
										<figure>
											<a href="single.html">
												<img src="images/news/img12.jpg" alt="Sample Article">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="single.html">Donec consequat lorem quis augue pharetra</a></h1>
										</div>
									</div>
								</article>
								<article class="article-mini">
									<div class="inner">
										<figure>
											<a href="single.html">
												<img src="images/news/img14.jpg" alt="Sample Article">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="single.html">eu dapibus risus aliquam etiam ut venenatis</a></h1>
										</div>
									</div>
								</article>
								<article class="article-mini">
									<div class="inner">
										<figure>
											<a href="single.html">
												<img src="images/news/img15.jpg" alt="Sample Article">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="single.html">Nulla facilisis odio quis gravida vestibulum </a></h1>
										</div>
									</div>
								</article>
								<article class="article-mini">
									<div class="inner">
										<figure>
											<a href="single.html">
												<img src="images/news/img16.jpg" alt="Sample Article">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="single.html">Proin venenatis pellentesque arcu vitae </a></h1>
										</div>
									</div>
								</article>
								<a href="#" class="btn btn-magz white btn-block">See All <i class="ion-ios-arrow-thin-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-xs-12 col-sm-6">
						<div class="block">
							<h1 class="block-title">Follow Us</h1>
							<div class="block-body">
								<p>Follow us and stay in touch to get the latest news</p>
								<ul class="social trp">
									<li>
										<a href="#" class="facebook">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-facebook"></i>
										</a>
									</li>
									<li>
										<a href="#" class="twitter">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-twitter-outline"></i>
										</a>
									</li>
									<li>
										<a href="#" class="youtube">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-youtube-outline"></i>
										</a>
									</li>
									<li>
										<a href="#" class="googleplus">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-googleplus"></i>
										</a>
									</li>
									<li>
										<a href="#" class="instagram">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-instagram-outline"></i>
										</a>
									</li>
									<li>
										<a href="#" class="tumblr">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-tumblr"></i>
										</a>
									</li>
									<li>
										<a href="#" class="dribbble">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-dribbble"></i>
										</a>
									</li>
									<li>
										<a href="#" class="linkedin">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-linkedin"></i>
										</a>
									</li>
									<li>
										<a href="#" class="skype">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-skype"></i>
										</a>
									</li>
									<li>
										<a href="#" class="rss">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-rss"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="line"></div>
						<div class="block">
							<div class="block-body no-margin">
								<ul class="footer-nav-horizontal">
									<li><a href="index.html">Home</a></li>
									<li><a href="#">Partner</a></li>
									<li><a href="contact.html">Contact</a></li>
									<li><a href="page.html">About</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="copyright">
							COPYRIGHT &copy; MAGZ 2017. ALL RIGHT RESERVED.
							<div>
								Made with <i class="ion-heart"></i> by <a href="http://kodinger.com">Kodinger</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
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