<?php

session_start();

if($_SERVER['REQUEST_METHOD']=='POST')
{
	include 'dbconfig.php';

	$uname = mysqli_real_escape_string($conn, $_POST['uname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
	// password hasing
	$pass = password_hash($password, PASSWORD_BCRYPT);
	$cpass = password_hash($cpassword, PASSWORD_BCRYPT);

	$emailquery = "SELECT * FROM `employee` WHERE email='$email'";
	$query = mysqli_query($conn,$emailquery);
	$emailcount = mysqli_num_rows($query);

	if($emailcount>0)
	{
		echo 'Email already exists!!!';
	}
	else
	{
		if($password === $cpassword)
		{
			// Insert Query
	 		$sql = "INSERT INTO `employee`(name,email,password) values('$uname','$email','$pass')";
	 		$res = mysqli_query($conn,$sql);
			 if($res)
			 {
			 	echo "User Added Successfully!!!";
			 	header('location:../client/adminhome.php');
			 }
			 else
			 {
			 	echo "User Not Added!!!";
			 }
		}
		else
		{
			echo 'Password mismatch!!!';
		}
	}

	

	 
}