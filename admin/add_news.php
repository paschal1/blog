
 
<?php include 'pages/header.php';
include 'form_validation.php';
session_start();

$msg = [];
$success = [];
if(isset($_POST['add_news']) && $_FILES['post_image'] !==""
&& $_FILES['post_image'] !==" "){
  //  necesacry variables
  $title =  $_POST['title'];
    $content =  $_POST['content'];
    $category =  $_POST['category'];
    $status =  $_POST['status'];
    $type =  $_POST['type_news'];
    $tags =  $_POST['tags'];
    if(empty($title) || empty($content) || empty($tags)){
        array_push($msg, "Fields cannot be left blank");
    }elseif(strlen($content) <= 100){
        array_push($msg, "Content should be more than 100 characters");
    }elseif(strlen($title) < 10){
        array_push($msg, "Title must be more than 10 characters");
    }
  $filename = $_FILES['post_image']['name'];
  $filetmpname = $_FILES['post_image']['tmp_name'];
  $imageSize = $_FILES['post_image']['size'];
  $fileExt = explode('.',$filename);
  $fileActualExt = strtolower(end($fileExt));
  $allowed = ['jpg','jpeg','png'," "];
  $not_allowed = ['mkv','mp4','mp3','pdf','exe'];
  $type = $_FILES['post_image']['type'];
    if(!in_array($fileActualExt, $allowed)){
     array_push($msg, "invalid file type ");
  }
// if(!in_array($fileActualExt, $not_allowed)){
//     array_push($msg, "invalid file type not allowed");
//  }
  
    if($imageSize > 20000000){
      array_push($msg, "File is too large");
    }
    else{
     $filenewname  = uniqid(' ',true) . " ." .$fileActualExt;
      $dir = "news_images/";
      $target_file = $dir . basename($filenewname);
      move_uploaded_file($filetmpname, $target_file);
    }
    // if(!isset($_POST['upload'])){
    //      array_push($msg, "Image cannot be empty");
    //  }      
    if(empty($msg)){
        $post_obj->addnews($_POST['title'], $_POST['content'], $_POST['category'], $_POST['status'], $_POST['type_news'], $_POST['tags'], $target_file);
       array_push($success, "News added successfully");
    }
}

 ?>

<style>
    .fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);}
</style>


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
                <a href="index.php" class="logo text-center logo-dark">
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
                                        <span class="account-user-name"><?php echo $user_obj->getusername(); ?></span>
                                        <span class="account-position"><?php echo $user_obj->getrole();?></span>
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
<!--                            
                            <h5 class="text-bold font-20 mt-3 text-dark text-uppercase text-center"> <?php echo $username ?></h5>
                            -->
                        </div>
                    </div>
                    <!-- end Topbar -->
                  
                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        
                     
              
                        <div class="row">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                       
                                         <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="typeahead-preview">
                                                <div class="row">
                                                <?php foreach($msg as $error){
                                if(isset($error) && (count($msg)>0)){
                                 echo "<div class='alert alert-danger' role='alert'>
                                <strong>$error</strong>
                                </div>"; 
                                }
                            }?>
                                                <?php foreach($success as $error){
                                if(isset($error) && (count($success)>0)){
                                 echo "<div class='alert alert-success' role='alert'>
                                <strong>$error</strong>
                                </div>"; 
                                }
                            }
                                ?>  
                                                <form  action="" method="POST" role="form" class="col-lg-8" autocomplete="off" runat="server" enctype="multipart/form-data">
               <h3>Add News</h3>

                <div class="form-group">
<!--                    
                    <input type="text" name="title" id="title" placeholder="News Title" class="form-control" > 
                    <span class="input-group-addon " id="left">60</span> -->
                    <input type="text" placeholder="News Title" maxlength="100" data-max-chars="100" class="form-control count-chars" name="title" value="<?php if(isset($_POST['add_news'])){ echo "$title";} ?>">
                                             
                                               
                    <div class="input-msg text-red mb-3" style="color:red;"></div>
                </div>
                <div class="form-group">
                  <textarea name="content"  cols="30" rows="30" class="form-control mb-3 text-dark  fw-4" id="editor" style="  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;font-size:20px;color:black;" placeholder="News Content"><?php if(isset($_POST['add_news'])){
                                                echo "$content";}
                                                ?></textarea> 
                                      
                              
                </div> 
                <br>
                <!-- News category -->

                <div class="form-group">
                    <label for="">Choose category</label>
                 <select name="category" class="form-control mb-3">
                 <?php
                    $query = mysqli_query($connection, "SELECT DISTINCT * FROM category ORDER BY cat_title ASC");
                    while ($row = mysqli_fetch_array($query)){
                      $cat_title = $row['cat_title'];
                      echo "<option value = '{$cat_title}'>$cat_title</option>";
                    }
                    ?>
                 </select>
                </div>
                <div class="form-group mb-3">
                    <label>Status</label>
                 <select name="status" class="form-control">
                     <option value="Published">Published</option>
                     <option value="Draft">Draft</option>
                 </select>
                </div>

                <div class="form-group mb-3">
                    <label>Type of News</label>
                 <select name="type_news" class="form-control">
                 <option vlaue="casual">Casual News</option>
                     <option value="breaking news">Breaking News</option>
                <?php  $role = $user_obj->getrole();
                      if($role === 'Admin'){
                      echo  "<option value='Advert' >Advert </option>";
                      }else{
                    echo    "<option value='Advert' disabled>Advert (Not an admin)</option>";
                      }
                        ?>
                    
                      <?php #endif ?>
                    
                     
                 </select>
                </div>

                <div class="mb-3"> 
                    <label for="">Tags</label>
                    <input type="text" name="tags" placeholder="News Tags(seperate by a comma)" class="form-control" value="<?php if(isset($_POST['add_news'])){
                                                echo "$tags";}
                                                ?>">
                </div>
                <div class="mb-3">
                    <label for="">Image</label>
                    <!-- <input type="file" name="post_image" onchange="readURL(this)"> -->
                    <div class="fileUpload btn btn-info" id="fileupload" name="upload" disable>
                                                     <span>Upload Image</span>
                                                  <input type="file" id ="upload" name = "post_image" class="upload btn btn-info btn-sm " onchange="readURL(this)" accept="image/*"/>
                                                </div>
                    <br>
                    <img src="#" alt="Insert Image" class="img-rounded img-fluid mt-3" id="img" height="350" width="300" >
                </div>
                
                <br>
                <div>
                    <input type="submit" name="add_news" value="Add News" class="btn btn-success btn-sm mt-3 align-items-center">
                </div>

                <!-- <button class="selectbtn button btn btn-link" style="color:rgb(10, 207, 151);">
                                                         <i class="fa fa-camera "></i>
                                                       </button> -->

                                                       
            </form>
                                                
                                                    
                                                  
                   
                                               
                                                 
                                               
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
                                <!-- <div class="text-md-end footer-links d-none d-md-block">
                                    <a href="javascript: void(0);">About</a>
                                    <a href="javascript: void(0);">Support</a>
                                    <a href="javascript: void(0);">Contact Us</a>
                                </div> -->
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
	 	 $(".submitbtn").text("Upload Image");
	 	$(".submitbtn").click(function (){
	 	$("#submit").trigger('click');
        
	 	
	 
	 });
	 });
	});

    (function(){
    document.addEventListener("keyup", function(event){
    	if(event.target.matches(".count-chars")){
    		// get input value and length
    		const value = event.target.value;
    		const valueLength = event.target.value.length;
    		// get data value
    		const maxChars = parseInt(event.target.getAttribute("data-max-chars"));
    		const remainingChars = maxChars - valueLength;
    		if(valueLength > maxChars){
    			// limit chars to maxChars
    			event.target.value = value.substr(0, maxChars);
    			return;  //end function execution
    		}
    		event.target.nextElementSibling.innerHTML = remainingChars + " characters remaining";
        event.target.value.style.color = "red";
    	}
    })
})();

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
         <script src="ckeditor/ckeditor.js"></script>  
     <script src="ckfinder/ckfinder.js"></script>   
        <script>
        CKEDITOR.replace('editor');
        //CKEDITOR.config.allowedContent = 'true';
//         (function ($) {
//    $(document).ready(function () {
//     CKEDITOR.replace($('.ckeditor').get(0), {
//      });
//  });
//   })
// (jQuery);
var editor = CKEDITOR.replace('editor');
CKFinder.setupCKEditor(editor);
CKEDITOR.config.allowedContent = true;
//CKEDITOR.replace('editor',{
//     filebrowserUploadUrl: '',
//     filebrowserUploadmethod:'form'
// });
//  CKEDITOR.editorConfig = function( config ) {
//   config.extraPlugins = 'imageuploader';
// /};
// var editor1 = new RichTextEditor("#div_editor1");
        //  </script>
         <script>
    //   ClassicEditor
    //       .create( document.querySelector( '#editor' ) )
    //       .catch( error => {
    //         console.error( error );
    //       } );
</script>
  
        <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="assets/js/pages/demo.dashboard.js"></script>
    
         
        <!-- end demo js-->
    </body>

<!-- Mirrored from coderthemes.com/hyper/saas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Aug 2021 23:25:47 GMT -->
</html>
