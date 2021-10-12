<div class="comments  ">
						  <?php
						  // error_reporting(0);
						   if(isset($_GET['post_id'])){
						   $id = $_GET['post_id'];
						  $sql = mysqli_query($connection, "SELECT * FROM comments WHERE post_id=$id AND status='approved' ORDER BY id DESC LIMIT 10");
						   $num = mysqli_num_rows($sql);
							} ?>
							<h3 class="title"><?php if(mysqli_num_rows($sql) < 1){
								  echo "No comment yet"; }else{
									  echo $num ."Comments";
								  }
							?>
								  
							  </h3>
							  <div class="comment_area clearfix ">
                                <?php
                                // error_reporting(0);
                                 if(isset($_GET['post_id'])){
                                 $id = $_GET['post_id'];
                                $sql = mysqli_query($connection, "SELECT * FROM comments WHERE post_id=$id AND status='approved' ORDER BY id DESC LIMIT 5");
                                 $num = mysqli_num_rows($sql);
                                 $row = mysqli_fetch_array($sql);
								 $name = $row['name'];
								 $msg = $row['body'];

                                ?>
                            
							<div class="comment-list">
								<div class="item">
									<div class="user">                                
										<figure>
											<img src="images/img03.jpg">
										</figure>
										<div class="details">
											<h5 class="name"><?php echo $name ?></h5>
											<!-- <div class="time">24 Hours</div> -->
											<div class="description">
											<?php echo $msg ?>
											</div>
											
										</div>
									</div>
									<?php } ?>
								</div>