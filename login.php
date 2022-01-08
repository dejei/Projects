<?php 
session_start(); 
include "dbd.php";

if (isset($_POST['ename']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$ename = validate($_POST['ename']);
	$pass = validate($_POST['password']);

	if (empty($ename)) {
		header("Location: index.php?error=Email Address is required.");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required.");
	    exit();
	}else{
		// hashing the password
        $pass = md5($pass);

        
		$sql = "SELECT * FROM users WHERE email_add='$ename' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['email_add'] === $ename && $row['password'] === $pass) {
            	$_SESSION['email_add'] = $row['email_add'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: home.php");
		        exit();
            }else{
				header("Location: index.php?error=Incorrect Email Address or password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorrect Email Address or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}