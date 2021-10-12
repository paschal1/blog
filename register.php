<?php include 'extension/header.php'; ?>

		<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
							<h4>Register</h4>
                            <?php 
                          $error=[]; 
                          if(isset($_POST['register'])){ 
                          
                              $name = ($_POST['name']);
                              $email = ($_POST['email']);
                              $password = $_POST['password'];
                              $sql = mysqli_query($connection, "SELECT * FROM subscribers WHERE email = '$email'");
                               $row = mysqli_fetch_array($sql);
                              if(empty($name) &&  empty($email) && empty($password)){
                                  array_push($error, "Fields cannot be empty");
                              }elseif(empty($name)){
                                  array_push($error, "Name field cannot be empty");
                               }
                             elseif (empty($email)){
                                  array_push($error, "email is empty");

                              }elseif (empty($password)){
                                array_push($error, "password is empty");

                            }
                              elseif(mysqli_num_rows($sql) != 0){
                                  array_push($error, "email already exist");
                              }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                  array_push($error, "email is invalid");
                              }
                             
                                else
                                  if (strlen($password) < 4 ){
                                     array_push($error, "password must be up to 4 characters");
                                   
                                 
                                  }
                          if(empty($error)){
                             
                              $name = $name;
                              $email = $email;
                              $password = password_hash($password, PASSWORD_DEFAULT);
                              $query = mysqli_query($connection, "INSERT INTO subscribers VALUES('','$name','$email','$password');");
                              if($query){
                             
                            unset($_POST['register']);
                               header("location: login.php");
                          }
                          
                          }
                          
                          }
                              ?>
                        
							<form method='post' action=''>
                            <?php foreach($error as $errors){
                                if(isset($errors) && (count($error)>0)){
                                 echo "<div class='alert alert-danger' role='alert'>
                                <strong>$errors</strong>
                                </div>"; 
                                }
                            }
                                ?>
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" class="form-control" placeholder='Email'>
								</div>
								<div class="form-group">
									<label>Name</label>
									<input type="text" name="name" class="form-control" placeholder='Username'>
								</div>
								<div class="form-group">
									<label class="fw">Password</label>
									<input type="password" name="password" class="form-control" placeholder='Password'>
								</div>
								<div class="form-group text-right">
									<input type='submit' class="btn btn-primary btn-block" name='register' value='Register' style='background-color:#008489;border:none;'>
								</div>
								<div class="form-group text-center">
									<span class="text-muted">Already have an account?</span> <a href="login.php">Login</a>
								</div>
							</form>
						</div>
					</div>
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
		<!-- <script src="js/demo.js"></script> -->
		<script src="js/e-magz.js"></script>
	</body>
</html>