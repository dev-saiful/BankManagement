<?php

session_start();

if($_SERVER['REQUEST_METHOD']=='POST')
{
	include 'dbconfig.php';

	$uname = mysqli_real_escape_string($conn, $_POST['username']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
	$acc_id = mysqli_real_escape_string($conn, $_POST['account_id']);
	$curr_amt = mysqli_real_escape_string($conn, $_POST['amount']);
	$curr_amt = (float) $curr_amt;
	// password hasing
	$pass = password_hash($password, PASSWORD_BCRYPT);
	$cpass = password_hash($cpassword, PASSWORD_BCRYPT);

	$emailquery = "SELECT * FROM `user` WHERE email='$email'";
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
	 		$sql = "INSERT INTO `user`(username,email,password,confirm_password,account_id,current_amt) values('$uname','$email','$pass','$cpass','$acc_id','$curr_amt')";
	 		$res = mysqli_query($conn,$sql);
			 if($res)
			 {
			 	echo "User Added Successfully!!!";
			 	header('location:../client/emphome.php');
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