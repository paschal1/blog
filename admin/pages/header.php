<?php 
include '../config/config.php';
include '../class/user.php';
include '../class/category.php';
include '../class/comments.php';
include '../class/post.php';
include '../class/misc.php';
include '../class/viewpost.php';

if(isset($_SESSION['admin'])){
    $user = $_SESSION['admin']; 
    }
    else{
    header("Location: nw-admin.php");
      }
$user_obj = new User($connection, $user);
$cat_obj = new Category($connection, $user);     
$post_obj = new Post($connection, $user);
 $comment_obj = new comment($connection);
 $viewpost_obj = new managepost($connection);
 $misc = new misc($connection);
?>

<!DOCTYPE html>
    <html lang="en">

    
<!-- Mirrored from coderthemes.com/hyper/saas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Aug 2021 23:23:46 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Xtragist</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <meta content="A fully featured admin thee which can be used to build CRM, CMS, etc." name="description" /> -->
        <meta content="Xtragist" name="author" />
        <!-- App favicon -->
        <!-- <link rel="shortcut icon" href="assets/images/favicon.ico"> -->
        <link rel="shortcut icon" href="assets/images/xtragist.svg" type="image/jpg">

        <!-- third party css -->
        <link href="assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

        <!-- App css -->
         <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
         <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />  
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />    
        <link rel="stylesheet" href="assets/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/js/jquery/jquery.min.js">
      
        <link rel="stylesheet"
  href="http://ajax.googleapis.com/ajax/libs/dojo/1.6/dijit/themes/claro/claro.css"/>
<script src="http://ajax.googleapis.com/ajax/libs/dojo/1.6.0/dojo/dojo.xd.js"
data-dojo-config="isDebug: true,parseOnLoad: true"></script>
        
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        
       
        <script type="text/javascript" src='assets/richtexteditor/plugins/all_plugins.js'></script>
<div id="div_editor1">
    
    <script src="jquery-3.3.1.js" type="text/javascript"><script>
  
    
    </head>
    
    
 
    //  <script src="ckeditor/ckeditor.js"><script>    
    </script>
 