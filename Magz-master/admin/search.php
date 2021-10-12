

<?php include 'pages/header.php';?>

<?php if(isset($_GET['s']) && $_GET['s'] !== "" && $_GET['s'] !==" "){
    $s = $_GET['s'];
}else{
    header("location: index.php");
}
// elseif(isset($_POST['submit']) && $_GET['s'] !== ""){
//     $s = $_GET['s'];
// }

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
                                    <form class="p-3" method="GET" action="search.php">
                                        <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username" name="s">
                                    </form>
                                </div>
                            </li>
                            

                            

                           

                            <li class="notification-list">
                                <a class="nav-link end-bar-toggle" href="javascript: void(0);">
                                    <i class="dripicons-gear noti-icon"></i>
                                </a>
                            </li>

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="account-user-avatar"> 
                                    <img src="<?php echo $user_obj->getprofilepic();?>" alt="user-image" class="rounded-circle">
                                    </span>
                                    <span>
                                    <span class="account-user-name"><?php echo $user_obj->getusername(); ?></span>
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
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-edit me-1"></i>
                                        <span>Settings</span>
                                    </a>

                                
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
                         <form method= "GET" action=" ">
                                <div class="input-group">
                                    <input type="text" class="form-control dropdown-toggle" name='s'  placeholder="Search..." id="top-search">
                                    <span class="mdi mdi-magnify search-icon"></span>
                                    <input class="input-group-text btn-primary" type="submit" value="Search" >
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end Topbar -->



                  
                    <!-- Start Content-->
                    <div class="container">

                        <!-- start page title -->
                        
         
                        <div class="row">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                       
                                         <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane table-responsive show active" id="typeahead-preview">


                                                    
             
                <table class="table table-hover table-striped table-bordered table-sucess"> 
                                          
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Post_cat_id</th>
                            <th>Image</th>
                            <th>Date Added</th>
                            <th>Tags</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Num of Likes</th>
                            <th>Num of comments</th>
                            <th>Num of views</th>
                            <th>Timetamp</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <?php 
             $query = mysqli_query($connection, "SELECT * FROM news  WHERE content LIKE '%$s%' OR tags LIKE '%$s%' OR added_by LIKE '%$s%'  OR type LIKE '%$s%' OR title LIKE '%$s%' ORDER BY id DESC LIMIT 20");
             if(mysqli_num_rows($query) === 0) {
                echo  $str = "<h1 class='text-center text-danger mt-5'>No results found!</h1>";
              }
                   while ($row = mysqli_fetch_assoc($query)){
                       
                       $id = $row['id'];
                       $title = $row['title'];
                       $content = substr($row['content'],0, 50);
                       $added_by = $row['added_by'];
                       $category = $row['post_category'];
                       $post_id = $row['post_cat_id'];
                       $image = $row['post_image'];
                       $date_added = $row['date_added'];
                       $tags = $row['tags'];
                       $status = $row['status'];
                       $type = $row['type'];
                       $num_likes = $row['num_likes'];
                       $num_comments = $row['num_comments'];
                       $num_views = $row['num_views'];
                       $timestamped = $row['timestamped'];
                       echo "<tr>";
                       echo "<td>{$id}</td>"; 
                       echo "<td>{$title}</td>"; 
                       echo "<td>{$content}</td>"; 
                       echo "<td>{$added_by}</td>"; 
                       echo "<td>{$category}</td>"; 
                       echo "<td>{$post_id}</td>"; 
                       echo "<td><img src='{$image}' width='50px'></td>"; 
                       echo "<td>{$date_added}</td>"; 
                       echo "<td>{$tags}</td>"; 
                       echo "<td>{$status}</td>"; 
                       echo "<td>{$type}</td>"; 
                       echo "<td>{$num_likes}</td>"; 
                       echo "<td>{$num_comments}</td>"; 
                       echo "<td>{$num_views}</td>"; 
                       echo "<td>{$timestamped}</td>"; 
                       echo "<td><a href='edit_news.php?edit_post=$id' class = 'btn btn-primary bg-primary btn-sm'>Edit</td>"; 
                       echo "<td><a href='managepost.php?delete_post=$id' class = 'btn btn-primary bg-danger btn-sm'>Delete</td>"; 
                       echo "<tr>";
                       
                   }
             





                    if(isset($_GET['delete_post']) && $_GET['delete_post'] !==" "){
                        $id = $_GET['delete_post'];
                        $query = mysqli_query($connection, "DELETE FROM news WHERE id=$id");
                         if($query) {
                            header("location: managepost.php");
                        } else {
                             return false;
                         }
                        // $viewpost_obj->deletepost();
                    }
               
                    ?>
                    <tbody>
                    </tbody>
                </table>          
                                         
                                                  
                                        
                                                 
                                               
                                             <!-- end row -->
        
                                                
                                                <!-- end row -->
        
                                                
                                               
        
                                               
                                                <!-- end row -->                      
                                            </div> <!-- end preview-->
                                        
                                            <!-- end tab-content-->

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
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
                    
                </div> <!-- end padding-->

            </div>
        </div>

        <div class="rightbar-overlay"></div>
        <!-- /End-bar -->

        <!-- bundle -->
        <script>
    function readURL(input){
    if(input.files && input.files[0]) {
       let reader = new FileReader();
       reader.onload = function(e){
       $("#img").attr("src", e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
     }
   }
//     = document.getElementById('');
$(document).ready(function(){
	 $(".selectbtn").click(function (){
	 	$(".file").trigger('click');
          $(".file").css("opacity", "0");
	 });
	 $(".file").change(function (){
	 	$(".file").removeClass();
	 	$(".button").addClass("submitbtn");
	 	 $(".submitbtn").text("Upload");
	 	$(".submitbtn").click(function (){
	 	$("#submit").trigger('click');
        
	 	
	 
	 });
	 });
	});

    // function readURL(input) {
    //     if(input.files && input.files[0]) {
    //       let reader = new FileReader();
    //       reader.onload = function(e) {
    //         $("#img").attr("src", e.target.result);
    //       }
    //       reader.readAsDataURL(input.files[0]);
    //     }
    //   }

var loadFile = function(event){
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function(){
        URL.revokeObjectURL(output.src)
    }
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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

<!-- Mirrored from coderthemes.com/hyper/saas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Aug 2021 23:25:47 GMT -->
</html>