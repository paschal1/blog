<?php 

$mysqli = new mysqli("localhost","root","","admin") or die(mysqli_error($mysqli));
$error = [];
error_reporting(0);
session_start(); 

if(isset($_POST['login'])){
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	$sql = mysqli_query($mysqli, "SELECT * FROM users WHERE email = '$email'");
	$row = mysqli_fetch_array($sql);
	$db_email = $row['email'];
	$db_password = $row['password'];
	$db_username = $row['username'];
	$rehashedPwd = md5($pwd);
 if($db_email === $email && $db_password === $rehashedPwd) {
  		$_SESSION['admin'] = $db_username;
  		header("Location: index.php");
	}elseif(empty($email)){
        array_push($error, "email cannot be empty");	
	}elseif(empty($pwd)){
		array_push($error, "password cannot be empty");
	 }
	 else{
  		 $_SESSION['email'] = $email;
     array_push($error, "Wrong Entries");
 }
	
}