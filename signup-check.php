<?php 
session_start(); 
include "dbd.php";

if (isset($_POST['ename']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['confirm_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$ename = validate($_POST['ename']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['confirm_password']);
	$name = validate($_POST['name']);

	$user_data = 'ename='. $ename. '&name='. $name;


	if (empty($ename)) {
		header("Location: signup.php?error=Email Address is required.&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: signup.php?error=Password is required.&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Confirm Password is required.&$user_data");
	    exit();
	}

	else if(empty($name)){
        header("Location: signup.php?error=Name is required.&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: signup.php?error=The confirmation password  does not match.&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM users WHERE email_add='$ename' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The email address is taken. Try again.&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO users(email_add, password, name) VALUES('$ename', '$pass', '$name')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: signup.php?success=Your account has been created successfully!");
	         exit();
           }else {
	           	header("Location: signup.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}