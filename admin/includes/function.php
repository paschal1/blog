<?php 
include '../../config/config.php';

function clean($data){
	global $connection;
	$data = htmlspecialchars($data);
	$data = stripslashes($data);
	$data = trim($data);
	$data = mysqli_real_escape_string($connection, $data);
	return $data;
}

function addusers(){
	global $connection;
	if(isset($_POST['register'])){
		//Do this
		$fname = clean($_POST['fname']);
		$lname = clean($_POST['lname']);
		$email = clean($_POST['email']);
		$pwd = $_POST['pwd'];
	echo	$role = $_POST['role'];
        $cpwd = $_POST['cpwd']; 

		if(empty($fname) && empty($lname)){
			header("Location: ../addusers.php?message=fields_are_required");
		}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			header("Location: ../addusers.php?message=email_is_invalid");
		} elseif(empty($email)){
			header("Location: ../addusers.php?message=fields_are_required");
		} elseif(empty($pwd)){
			header("Location: ../addusers.php?message=fields_are_required");
		} elseif (strlen($pwd) < 6) {
			header("Location: ../addusers.php?message=password_is_short");
		}elseif($pwd !== $cpwd){
            header("Location: ../addusers.php?password_do_not_match");
        } 
        else{
			$hashPwd = md5($pwd);
            $cpwd = md5($cpwd);
			$ProfilePic = 'asset/images/profile_pics/default/head_1.png';
			$username = $fname . ' ' .$lname;
			$query = mysqli_query($connection, "INSERT INTO users VALUES('','$username','$fname','$lname','$email','$hashPwd','$cpwd','$ProfilePic','$role','0')");
			if($query){
				header("Location: ../addusers.php");
			} else{
				die("Failed " . mysqli_error($connection));
			}
		}
	}
	// else{
	// 	header("Location: ../addusers.php");
	// }
}

addusers();

function approvecomment(){
	global $connection;
	if (isset($_GET['a_com_id'])){
		$id = $_GET['a_com_id'];
		$sql = mysqli_query($connection, "UPDATE comments SET status ='approved' WHERE id=$id");
		if($sql){
			header("location: ../comments.php");
		}else{
			die(mysqli_error($connection));
		}
	}
}
approvecomment();

function unapprovecomment(){
	global $connection;
	if (isset($_GET['u_com_id'])){
		$id = $_GET['u_com_id'];
		$sql = mysqli_query($connection, "UPDATE comments SET status ='Unapproved' WHERE id=$id");
		if($sql){
			header("location: ../comments.php");
		}else{
			die(mysqli_error($connection));
		}
	}
}

unapprovecomment();