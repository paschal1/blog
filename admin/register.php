<?php include 'pages/css_links.php';?>
<?php 
 
?>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

        <div class="account-pages  mt-3  ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">
                            <!-- Logo-->
                            <div class="card-header  text-center ">
                                <a href="index.php">
                                    <span>  <img src="assets/images/xtragist.svg" alt="" height="100"  width = "100"class=""></span>
                                </a>
                            </div>
                            
                            <div class="card-body p-4">
                            <?php 
                          
                        
                        ?>
                   
                                <h2 class="text-dark">Registration Form</h2>
                                <form action="" method="POST">
                                <?php include 'form_handlers/register.php'; ?>
                                <?php foreach($error as $errors){
                                if(isset($errors) && (count($error)>0)){
                                 echo "<div class='alert alert-danger' role='alert'>
                                <strong>$errors</strong>
                                </div>"; 
                                }
                            }
                                ?>
                                <div class="form-group ">
                                            <div class="col-xs-12 mb-2">
                                                <input class="form-control" type="text"  name="firstname" placeholder="firstname" autocomplete="off" value="<?php if(isset($_POST['register'])){
                                                echo "$firstname";}
                                                ?>">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="col-xs-12 mb-2">
                                                <input class="form-control" type="text"  name="lastname" placeholder="lastname" autocomplete="off" value="<?php if(isset($_POST['register'])){
                                                echo "$lastname";}
                                                ?>">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="col-xs-12 mb-2">
                                                <input class="form-control" type="text"  name="email" placeholder="email" autocomplete="off" value="<?php if(isset($_POST['register'])){
                                                echo "$email";}
                                                ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-12 mb-2">
                                                <input class="form-control" type="password" name="pwd"  placeholder="Password" autocomplete="off" >
                                            </div>
                                        </div>
                                        <div class="form-group"   oncut="return false" oncopy="return false" onpaste="return false" >
                                            <div class="col-xs-12 mb-2">
                                                <input class="form-control" type="password" name="cpwd"  placeholder="Confirm Password" autocomplete="off" >
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="password" name="password"  placeholder="Confirm Password" autocomplete="off">
                                            </div>
                                        </div> -->


                     
                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                               <input type="submit" class="btn btn-success btn-sm" name="register" value="register">
                                            </div>
                                        </div>


                                </form>
                            </div> <!-- end card-body -->
                        </div>
                       
                </div>
                        <!-- end card -->

                        <!-- <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Already have account? <a href="pages-login.html" class="text-muted ms-1"><b>Log In</b></a></p>
                            </div> <!-- end col-->
                        <!-- </div>  -->
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

       

        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
        
    </body>

<!-- Mirrored from coderthemes.com/hyper/saas/pages-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Aug 2021 23:27:56 GMT -->
</html>
