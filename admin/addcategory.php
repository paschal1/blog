

<?php include 'pages/header.php';?>

<?php 
if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    $query = mysqli_query($connection, "SELECT * FROM  users WHERE id = $user_id");
    while($row = mysqli_fetch_assoc($query)){
        $id = $row['id'];
        $username = $row['username'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
        $role = $row['role'];
        $num_post =$row['num_post'];

    }
    if(isset($_POST['update_data'])){
        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $u_email = $_POST['email'];
        $pwd = md5($_POST['pwd']);
        $user_name = $f_name. " ". $l_name;
        $sql = mysqli_query($connection, "UPDATE users SET username ='$user_name',firstname= '$f_name',lastname='$l_name', email = '$u_email', password= '$pwd' WHERE id = '$id'");
        $_SESSION['admin'] = $user_name;
        header("location: profile.php?user_id=$id");
     }else{
         echo "Not Saved";
     }
    if(isset($_POST['upload']) && isset($_FILES['profile_pic'])){
        $dir = "asset/images/profile_pics/default/";
        $target = $dir .basename($_FILES['profile_pic']['name']);
        $type = $_FILES['profile_pic']['type'];
        $size = $_FILES['profile_pic']['size'];
         if($type !== "image/jpeg" || $type !=="image/png"){
           header("location: profile.php?user_id=$id&message=file_type_not_allowed");
    
       }
        if($size > 2000000){
          header("location: profile.php?user_id=$id&message=file_is_large");
        } else{
          move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target);
          mysqli_query($connection, "UPDATE users SET profile_pic = '$target' WHERE id=$id");
          header("location: profile.php?user_id=$id&message=profile_updated");
        }
      }
}
?>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">
    
                <!-- LOGO -->
                <a href="index.html" class="logo text-center logo-light">
                    <span class="logo-lg">
                    <img src="assets/images/xtragist.svg" alt="" height="40" class="bg-white p-1">
                    </span>
                    <span class="logo-sm">
                    <img src="assets/images/xtragist.svg" alt="" height="40" class="bg-white p-1">
                    </span>
                </a>

                <!-- LOGO -->
                <a href="index.html" class="logo text-center logo-dark">
                    <span class="logo-lg">
                    <img src="assets/images/xtragist.svg" alt="" height="40" class="bg-white p-1">
                    </span>
                    <span class="logo-sm">
                    <img src="assets/images/xtragist.svg" alt="" height="40" class="bg-white p-1">
                    </span>
                </a>
    
                <div class="h-100" id="leftside-menu-container" data-simplebar>

                    <!--- Sidemenu -->
                    <?php include 'pages/sidebar.php'?>
                    <!-- End Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <div class="navbar-custom">
                        <ul class="list-unstyled topbar-menu float-end mb-0">
                            <li class="dropdown notification-list d-lg-none">
                                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="dripicons-search noti-icon"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                                    <!-- <form class="p-3">
                                        <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                    </form> -->
                                </div>
                            </li>
                          

                          
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="account-user-avatar"> 
                                    <img src="<?php echo $user_obj->getprofilepic();?>" alt="" class="rounded-circle avatar-lg img-thumbnail ">
                                    </span>
                                    <span>
                                        <span class="account-user-name"><?php echo $username; ?></span>
                                        <span class="account-position"><?php echo $role;?></span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                    <!-- item-->
                                    <div class=" dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-circle me-1"></i>
                                        <span>My Account</span>
                                    </a>

                                    <!-- item-->
                                   

                                    <!-- item-->
                                  

                                    <!-- item-->
                                   

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="mdi mdi-logout me-1"></i>
                                        <span>Logout</span>
                                    </a>
                                </div>
                            </li>

                        </ul>
                        <button class="button-menu-mobile open-left">
                            <i class="mdi mdi-menu"></i>
                        </button>
                        <div class="app-search dropdown d-none d-lg-block">
                            <!-- <form>
                                <div class="input-group">
                                    <input type="text" class="form-control dropdown-toggle"  placeholder="Search..." id="top-search">
                                    <span class="mdi mdi-magnify search-icon"></span>
                                    <button class="input-group-text btn-primary" type="submit">Search</button>
                                </div>
                            </form> -->
                            <h5 class="text-bold font-20 mt-3 text-dark text-uppercase text-center"> <?php echo $username ?></h5>
                           
                        </div>
                    </div>
                    <!-- end Topbar -->
                    
                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                      
                                    </div>
                                    <h4 class="page-title">Profile Info</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                      

                        <div class="row" style="align-items:center;">
                            <div class="col-xl-4 col-lg-8">
                                <div class="card text-center">
                                    <div class="card-body">
                                 
                                       
                                        <h4 class="mb-0 mt-2 text-dark text-bold"><?php echo $username; ?></h4>
                                        <p class="text-muted font-14"><?php echo $role;?></p>
                                        <div class="align-center">
                                       
                                            <form action="" method="POST" enctype="multipart/form-data">
                                            <input type="file" name="profile_pic" class="btn btn-xm " value="Upload"  onchange="readURL(this)" style="color: rgba(0, 0, 0, 0); width:110px;" name="upload"> <br> 
                                            <input type="submit" name="upload" class="btn btn-success btn-sm ms-2" value="Update">
                                            </form>
                                        </div>
                                      
                                       <form class="form-horizontal" role="form" action="edit_profile.php?user_id='<?php echo $id;?>'" method = POST>
                                       <div class="text-start mt-3">
                                            <h4 class="font-13 text-uppercase text-dark">About Me :</h4>
                                            
                                            <input class="form-control mb-2" type="text" name="f_name" autocomplete="off" placeholder="FirstName" value="<?php echo $firstname; ?>">
                                               

                                            <input class="form-control mb-2" type="text" name="l_name" autocomplete="off" placeholder="FirstName" value="<?php echo $lastname; ?>">
                                             

                                            <input class="form-control mb-2" type="text" name="email" placeholder="FirstName" autocomplete="off" value="<?php echo $email; ?>">


                                            <input class="form-control mb-2" type="Password"  autocomplete="off" placeholder="Old Password">


                                            <input class="form-control mb-4" type="Password" name="pwd" autocomplete="off" placeholder="New Password">

                                            <center>
                                            <input type="submit" name="update_data" class="btn btn-success btn-sm mb-2" value="Edit Profile" >
                                            </center>

                                        </div> 
                                   
                                       </form>
                                     
                                    </div> 
                                </div> 
                                </div> 
                            </div>   
                        <!-- end row -->

                     
                      
                        <!-- end row -->

                    </div>
                    <!-- container -->

                </div>
                <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> © dstarite technoloy
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end footer-links d-none d-md-block">
                                    <a href="javascript: void(0);">About</a>
                                    <a href="javascript: void(0);">Support</a>
                                    <a href="javascript: void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <div class="end-bar">

            <div class="rightbar-title">
                <a href="javascript:void(0);" class="end-bar-toggle float-end">
                    <i class="dripicons-cross noti-icon"></i>
                </a>
                <h5 class="m-0">Settings</h5>
            </div>

            <div class="rightbar-content h-100" data-simplebar>

                <div class="p-3">
                    <div class="alert alert-warning" role="alert">
                        <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                    </div>

                    <!-- Settings -->
                    <h5 class="mt-3">Color Scheme</h5>
                    <hr class="mt-1" />

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="light" id="light-mode-check" checked>
                        <label class="form-check-label" for="light-mode-check">Light Mode</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark" id="dark-mode-check">
                        <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                    </div>
       

                    <!-- Width -->
                    <h5 class="mt-4">Width</h5>
                    <hr class="mt-1" />
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check" checked>
                        <label class="form-check-label" for="fluid-check">Fluid</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="width" value="boxed" id="boxed-check">
                        <label class="form-check-label" for="boxed-check">Boxed</label>
                    </div>
        

                    <!-- Left Sidebar-->
                    <h5 class="mt-4">Left Sidebar</h5>
                    <hr class="mt-1" />
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="theme" value="default" id="default-check">
                        <label class="form-check-label" for="default-check">Default</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="theme" value="light" id="light-check" checked>
                        <label class="form-check-label" for="light-check">Light</label>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="theme" value="dark" id="dark-check">
                        <label class="form-check-label" for="dark-check">Dark</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="fixed" id="fixed-check" checked>
                        <label class="form-check-label" for="fixed-check">Fixed</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="condensed" id="condensed-check">
                        <label class="form-check-label" for="condensed-check">Condensed</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="scrollable" id="scrollable-check">
                        <label class="form-check-label" for="scrollable-check">Scrollable</label>
                    </div>

                    <div class="d-grid mt-4">
                        <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
            
                        <a href="https://themes.getbootstrap.com/product/hyper-responsive-admin-dashboard-template/"
                            class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Purchase Now</a>
                    </div>
                </div> <!-- end padding-->

            </div>
        </div>

        <div class="rightbar-overlay"></div>
        <!-- /End-bar -->

        <!-- bundle -->
        <script>
//     function readURL(input){
//     if(input.files && input.files[0]) {
//       let reader = new FileReader();
//       reader.onload = function(e){
//         $("#img").attr("src", e.target.result);
//       }
//       reader.readAsDataURL(input.files[0]);
//     }
//   }
</script>
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>

        <!-- third party js -->
        <script src="assets/js/vendor/apexcharts.min.js"></script>
        <script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="assets/js/pages/demo.dashboard.js"></script>
        <!-- end demo js-->
    </body>

<!-- Mirrored from coderthemes.com/hyper/saas/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Aug 2021 23:25:47 GMT -->
</html>