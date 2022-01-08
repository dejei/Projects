<?php 
require 'dbd.php'; 
if (!isset($_GET['code'])) {
	exit("can't find the page"); 
}

$code = $_GET['code']; 
$getCodequery = mysqli_query($con, "SELECT * FROM reset WHERE code = '$code'"); 
if (mysqli_num_rows($getCodequery) == 0) {
	exit("can't find the page because not same code"); 
}

// handling the form 
if (isset($_POST['password'])) {
	$password = $_POST['password']; 
	$password = md5($password); // not the best option but for demo simpilicity
	$row = mysqli_fetch_array($getCodequery); 
	$email = $row['email']; 
	$query = mysqli_query($con, "UPDATE users SET password = '$password' WHERE email_add = '$email'");

	if ($query) {
	 	$query = mysqli_query($con, "DELETE FROM reset WHERE code ='$code'"); 
	 	 echo ("<script>
    window.alert('Password updated');
    window.location.href='index.php';
    </script>");	
 	 }else {
 	 	header("Location: index.php");
     exit();
 	 } 	 
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <  <form method="post">
        <h2>Update Password</h2>
        <label>Enter new password</label>
        <input type="password" name="password" placeholder="Enter password"><br>
        <button type="submit">Update password</button>
    
</body>
</html>