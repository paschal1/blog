<?php include 'extension/header.php'; ?>
		<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
							<h4>Login</h4>
							<?php
							error_reporting(0);
							 $error = []; 
							 if(isset($_POST['login'])){
								$email = $_POST['email'];
								$password = $_POST['password'];
								$sql = mysqli_query($connection, "SELECT * FROM subscribers WHERE email = '$email'");
								$row = mysqli_fetch_array($sql);
								$db_name = $row['name'];
								$db_email = $row['email'];
								$db_id  = $row['id'];
								$db_password = $row['password'];
								
							  //   $rehashedPwd = md5($pwd);
							 if(password_verify($password, $db_password) && ($email === $db_email)) {
									  $_SESSION['subscriber'] = $db_name;
									  $_SESSION['auth_user_id'] = $db_id;
									  $_SESSION['authuser_name'] = $db_name;
									  $_SESSION['status'] = "Login sccessful";
									  header("Location: index.php");
							 }elseif(empty($password) && empty($email)){
									array_push($error, "Input fields cannot be left blank");
								 }
								elseif(empty($email)){
									array_push($error, "email cannot be empty");	
								}elseif(empty($password)){
									array_push($error, "password cannot be empty");
								 }
								 else{
									  //  $_SESSION['email'] = $email;
								 array_push($error, "Incorrect Details");
							 }
								
							}
							?>
							<form method='post'>
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
									<input type="email" name="email" class="form-control">
								</div>
								<div class="form-group">
									<!-- <label class="fw">Password
										<a href="forgot.html" class="pull-right">Forgot Password?</a>
									</label> -->
									<input type="password" name="password" class="form-control">
								</div>
								<div class="form-group text-right">
									<input type='submit' class="btn btn-primary btn-block" name='login' style='background-color:#008489;border:none;' value='Login'>
								</div>
								<div class="form-group text-center">
									<span class="text-muted">Don't have an account?</span> <a href="register.php">Create one</a>
								</div>
								<!-- <div class="title-line">
									or
								</div>
              	                <a href="#" class="btn btn-social btn-block facebook"><i class="ion-social-facebook"></i> Login with Facebook</a> -->
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