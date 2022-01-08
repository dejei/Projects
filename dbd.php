<?php
$con = mysqli_connect('localhost','root','','taltal');
if($con){
	
}else{
	echo "Connection Failed!";
}

?>

<?php

$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "taltal";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}