<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="block">
							<h1 class="block-title">Xtragist</h1>
							<div class="block-body">
								<figure class="foot-logo">
									<img src="images/xtragist.svg" class="img-responsive" alt="Logo">
								</figure>
								<p class="brand-description">
								Get latest Nigerian celebrity gossip &amp; All Kind of Article @ Xtragist 
								</p>
								<a href="page.html" class="btn btn-magz white">About Us <i class="ion-ios-arrow-thin-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						 <div class="block"> 
					 <h1 class="block-title">Popular Tags <div class="right"></i></a></div></h1> 
						 <div class="block-body">
								<ul class="tags">
									<?php
									$query = mysqli_query($connection, "SELECT tags from news order by num_views limit 15");
									while($row = mysqli_fetch_array($query)){
										$tags = explode(',', $row['tags']);
										$str_tags = " ";
										foreach ($tags as $tag) {
											// $str_tags .= "<a href='tags.php?tag=$tag' class='btn btn-danger small rounded-0 '>$tag</a>";
											$str_tags .= "<li><a href='tags.php?tag=$tag'>$tag</a></li>" . " ";
										}echo $str_tags;
											
									}
								
									?>
								</ul>
							</div> 
						</div> 
						<div class="line"></div>
						<div class="block ">
							<h1 class="block-title">Newsletter</h1>
							<div class="block-body ">
								<p>By subscribing you will receive new articles in your email.</p>
								<?php 

                        
                          if(isset($_POST['subscribe'])){ 
                          
                            //   $name = ($_POST['name']);
                              $email = ($_POST['email']);
                            //   $pwd = $_POST['pwd'];
                            //   $cpwd = $_POST['cpwd'];
                              $query = mysqli_query($connection, "INSERT INTO subscribers VALUES('','','$email','');");
                              if($query){ 
								echo 'alert("Thanks for subscribing")';
                            // unset($_POST['subscribe']);
                          }else{
							echo 'alert("Pls subscribe")';
						  }
                          
                          }
                              ?>
                        
                        
								<form class="newsletter"  id="formdata" action="" method='post'>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="ion-ios-email-outline"></i>
										</div>
										<input type="email" class="form-control email" name='email' placeholder="Your mail">
									</div>
									<input class="btn btn-primary btn-block white" type='submit' name='subscribe' value='Subscribe'>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="block">
							<h1 class="block-title">Latest News</h1>
							<div class="block-body">
								
								<?php $post_obj->latestfooter(); ?>
								
							
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
										<a href="#" class="whatsapp">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-whatsapp-outline"></i>
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
									
									
									<!-- <li>
										<a href="#" class="linkedin">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-linkedin"></i>
										</a>
									</li>
									 -->
									
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
							COPYRIGHT &copy; Xtragist 
							<div>
								Designed and developed by Gabriel Godsent
								<!-- <i class="ion-heart"></i> by <a href="http://kodinger.com">Kodinger</a> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>