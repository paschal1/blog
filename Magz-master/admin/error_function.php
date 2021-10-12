<?php 
//  function dd($value) // to be deleted
//  {
//      echo "<pre>", print_r($value, true), "</pre>";
//      die();
//  }
// include 'pages/header.php';
 function resp($msg, $type){
     $status =
    (($type=='error')?"danger":
    (($type=='sucess')?"sucess":"information"));
  
    "<div class='alert alert-<php echo $msg?>' role='alert'>
    <strong><?php echo $error;?></strong></div>";
 }