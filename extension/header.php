<?php include 'config/config.php'; 
$user = (isset($_SESSION['admin'])) ? $_SESSION['admin'] : "user";
 include 'class/user.php'; 
 include 'class/category.php'; 
 include 'class/post.php'; 
 include 'class/comments.php';
   include 'admin/includes/like.php';
// include 'admin/includes/like_unlike.php';
// include 'like_unlike.php';

$cat_obj = new Category($connection, $user);
$post_obj = new Post($connection, $user);
$comments_obj = new Comment($connection);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="description" content="Magz is a HTML5 & CSS3 magazine template is based on Bootstrap 3.">
		<meta name="author" content="Kodinger">
		<meta name="keyword" content="magz, html5, css3, template, magazine template">
		<!-- Shareable -->
		<meta property="og:title" content="HTML5 & CSS3 magazine template is based on Bootstrap 3" />
		<meta property="og:type" content="article" />
		<meta property="og:url" content="http://github.com/nauvalazhar/Magz" />
		<meta property="og:image" content="https://raw.githubusercontent.com/nauvalazhar/Magz/master/images/preview.png" />
		<title>Magz &mdash; Responsive HTML5 &amp; CSS3 Magazine Template</title>
		<!-- Bootstrap -->
		<link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
		<!-- IonIcons -->
		<link rel="stylesheet" href="scripts/ionicons/css/ionicons.min.css">
		<!-- Toast -->
		<link rel="stylesheet" href="scripts/toast/jquery.toast.min.css">
		<!-- OwlCarousel -->
		<link rel="stylesheet" href="scripts/owlcarousel/dist/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="scripts/owlcarousel/dist/assets/owl.theme.default.min.css">
		<!-- Magnific Popup -->
		<link rel="stylesheet" href="scripts/magnific-popup/dist/magnific-popup.css">
		<link rel="stylesheet" href="scripts/sweetalert/dist/sweetalert.css">
		<!-- Custom style -->
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/skins/all.css">
		<link rel="stylesheet" href="css/demo.css">
		<link rel="" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js">
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
		<!-- <link
  rel="stylesheet"
  href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
/> -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 
	</head>
	<style>
	/* .like { */
    /* background-image:url(like.png); */
    /* background-color: white;  */
     /* background-color: #f1f1f1;  
   background-repeat: no-repeat; 
   background-position: 4px 5px;
   color: white;
   border: none;           
   cursor: pointer;       
   height: 30px;          
   padding-left: 24px;    
   vertical-align: middle;
   color: black; */
   /* color: hsl(0, 0%, 33%); */
   /* border-color: hsl(0, 0%, 60%); */
   /* outline:none; */
   /* -webkit-box-shadow: inset 0 1px 0 hsl(0, 100%, 100%),0 1px 0 hsla(0, 0%, 0%, .08); */
   /* box-shadow: inset 0 1px 0 hsl(0, 100%, 100%),0 1px 0 hsla(0, 0%, 0%, .08);  */

}
/* .like::before{
  content:url(thumbs-ups.svg);
}
.unlike::before{
  content:url(thumbs-down.svg);
} */

/* .unlike { */
	   /* background-image:url(unlike.png);
    background-color: white;  */
     /* background-color: #f1f1f1;  
   background-repeat: no-repeat; 
   background-position: 4px 5px;
   color: white;
   border: none;           
   cursor: pointer;       
   height: 30px;          
   padding-left: 24px;    
   vertical-align: middle;
   color: black; */
   /* color: hsl(0, 0%, 33%); */
   /* border-color: hsl(0, 0%, 60%); */
   /* outline:none; */
   /* -webkit-box-shadow: inset 0 1px 0 hsl(0, 100%, 100%),0 1px 0 hsla(0, 0%, 0%, .08); */
   /* box-shadow: inset 0 1px 0 hsl(0, 100%, 100%),0 1px 0 hsla(0, 0%, 0%, .08);  */

   }
	</style>

	<body class="bg-body" style="background-color:#f1f1f1;">
		<header class="primary">
			<div class="firstbar ">
				<div class="container">
					<div class="row padding-0">
						<!-- =================================== -->
						<div class="col-md-2 col-lg-2 col-sm-12 padding-0" >
							<div class="brand padding-0">
								<a href="index.php">
									<img src="images/xtragist.svg" class='img-responsive w-75 padding-0' style='height:80px;width:80px;'>
								</a> 
							</div>
						<!-- ================================================= -->
						</div>
						<div class="col-md-6 col-sm-12">
							<form class="search" autocomplete="off" method='get' action='search.php'>
								<div class="form-group">
									<div class="input-group">
										<input type="text" name="q" class="form-control" placeholder="Type something here">									
										<div class="input-group-btn">
											<button class="btn btn-success bg-success" type='submit' ><i class="ion-search"></i></button>
										</div>
									</div>
								</div>
							 
							</form>								
						</div>
						<!-- <div class="col-md-3 col-sm-12 text-dark z-index">
							<ul class="nav-icons text-color">
								<li><a href="register.html"><i class="ion-person-add text-dark"></i><div>Register</div></a></li>
								<li><a href="login.html"><i class="ion-person"></i><div>Login</div></a></li>
							</ul>
						</div> -->
					</div>
				</div>
			</div>

			<!-- Start nav -->
			<nav class="menu">
				<div class="container">
					<div class="brand">
						<a href="#">
							<img src="images/xtragist.svg" >
						</a>
					</div>
					<div class="mobile-toggle">
						<a href="#" data-toggle="menu" data-target="#menu-list"><i class="ion-navicon-round"></i></a>
					</div>
					<div class="mobile-toggle">
						<a href="#" data-toggle="sidebar" data-target="#sidebar"><i class="ion-ios-arrow-left"></i></a>
					</div>
					<div id="menu-list">
						<ul class="nav-list">
							<li class="for-tablet nav-title"><a>Menu</a></li>
							<li class="for-tablet"><a href="login.html">Login</a></li>
							<li class="for-tablet"><a href="register.html">Register</a></li>
							<!-- <li><a href="category.html">Home</a></li> -->
							<li><a href="index.php">Home</a></li>
							<?php $cat_obj->getallcategory(); ?>
						
						
						</ul>
					</div>
				</div>
			</nav>
			<!-- End nav -->
		</header>